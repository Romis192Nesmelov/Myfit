<?php

namespace App\Http\Controllers;
use App\TrainingPhoto;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\UserParam;
use App\Program;
use App\Training;
use App\Payment;
use App\VideoAdvice;
use App\Feed;
use App\Message;
use App\Settings;

class UserController extends Controller
{
    use HelperTrait;
    
    public function changeParameters(Request $request)
    {
        $validationArr = [
            'weight' => 'integer|max:500',
            'waist_girth' => 'integer|min:20',
            'hip_girth' => 'integer|min:20'
        ];

        if ($request->has('birthday_year')) {
            $dateBorn = date('Y') - 10;
            $validationArr['birthday_year'] = 'integer|min:1900|max:'.$dateBorn;
        }
        if ($request->has('height')) $validationArr['height'] = 'integer|max:400';

        $this->validate($request, $validationArr);

        $user = $request->user();
        $fields = $this->processingFields($request);
        $fields['user_id'] = $user->id;

        if (count($user->lastParams)) {
            $lastParams = $user->lastParams[0];
            $lastUpdate = $lastParams->created_at->startOfDay();
            $checkDate = Carbon::today()->subDays(2);

            if ($lastUpdate <= $checkDate) UserParam::create($fields);
            else  $lastParams->update($fields);

        } else {
            UserParam::create($fields);
        }
        return response()->json(['success' => true], 200);
    }
    
    public function uploadAvatar(Request $request)
    {
        $this->validate($request, ['avatar' => 'required|image|min:5|max:3000']);
        $user = $request->user();
        $fields = $this->processingImage($request, $user, 'avatar', $this->randString().'_'.$user->id, 'images/avatars');
        $user->update($fields);
        return response()->json(array_merge(['success' => true],$fields), 200);
    }
    
    public function getUser(Request $request)
    {
        if (!$request->user()->active) return response()->json(['success' => false, 'error' => trans('auth.not_confirmed_account')], 403);
        $user = [
            'avatar' => $request->user()->avatar,
            'name' => $request->user()->name,
            'email' => $request->user()->email,
            'location' => $request->user()->location,
            'birthday_year' => $request->user()->birthday_year,
            'height' => count($request->user()->lastParams) ? $request->user()->lastParams[0]->height : null,
            'weight' => count($request->user()->lastParams) ? $request->user()->lastParams[0]->weight : null,
            'waist_girth' => count($request->user()->lastParams) ? $request->user()->lastParams[0]->waist_girth : null,
            'hip_girth' => count($request->user()->lastParams) ? $request->user()->lastParams[0]->hip_girth : null
        ];
        return response()->json(['success' => true, 'user' => $user], 200);
    }

    public function getUserProgress(Request $request)
    {
        return response()->json(['success' => true, 'params' => $request->user()->params], 200);
    }

    public function getPrograms()
    {
        return response()->json([
            'success' => true,
            'programs' => Program::where('active',1)->select('id','photo','title','description')->get()->toArray()
        ], 200);
    }
    
    public function getTrainings(Request $request)
    {
        $this->validate($request, ['id' => 'required|integer|exists:programs,id']);
        $trainings = Training::with('goals')->where('active',1)->where('program_id',$request->input('id'))->select(
            'id',
            'photo',
            'complexity',
            'need_previous_completed',
            'its_cardio',
            'price'
        )->get()->toArray();

        for ($i=0;$i<count($trainings);$i++) {
            $trainings[$i]['its_paid'] = $this->checkPaid($request, $trainings[$i]['price'], $trainings[$i]['id']);
        }

        return response()->json([
            'success' => true,
            'trainings' => $trainings
        ], 200);
    }

    public function getTrainingPreview(Request $request)
    {
        $this->validate($request, ['id' => 'required|integer|exists:trainings,id']);
        $id = $request->input('id');
        $training = Training::with('goals')->where('active',1)->where('id',$id)->select(
                'id',
                'photo',
                'complexity',
                'duration',
                'periodicity',
                'equipment',
                'need_previous_completed',
                'warning_title',
                'warning_description',
                'recommendation_title',
                'recommendation_description',
                'its_cardio',
                'price'
            )->first()->toArray();

        $training['its_paid'] = $this->checkPaid($request, $training['price']);
        $training['periodicity'] = $this->setNumeralPeriodicity($training['periodicity']);
        return response()->json([
            'success' => true,
            'training' => $training
        ], 200);
    }

    public function getPaidTrainings(Request $request)
    {
        return response()->json([
            'success' => true,
            'trainings' => $request->user()->admin 
                ? Training::where('active',1)->pluck('id')->toArray() 
                : Payment::where('user_id',$request->user()->id)->where('active',1)->pluck('training_id')->toArray()
        ], 200);
    }
    
    public function setPaidTraining(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer|exists:trainings,id',
            'value' => 'required|integer'
        ]);
        $trainingId = $request->input('id');
        $value = $request->input('value');
        $payment = Payment::where('training_id',$trainingId)->where('user_id',$request->user()->id)->first();
        if ($payment && isset($payment->active) && $payment->active) return response()->json(['success' => false, 'error' => trans('payment.already_paid')], 403);
        elseif ($payment && isset($payment->active) && !$payment->active) {
            $payment->active = 1;
            $payment->save();
        } else {
            $message = Message::create(['new' => 1]);
            $payment = Payment::create([
                'value' => $value,
                'user_id' => $request->user()->id,
                'training_id' => $trainingId,
                'active' => 1,
                'message_id' => $message->id
            ]);

            $this->messageMailer([
                'head' => trans('messages.new_payment_head', ['value' => $value]),
                'message' => trans('messages.new_payment_text',[
                    'user' => view('admin._user_href_block',['user' => $request->user()])->render(),
                    'date' => $payment->created_at->format('d.m.Y'),
                    'value' => $value
                ]),
                'url' => '/admin/payments?id='.$payment->id,
                'buttonText' => trans('messages.new_payment_button_text')
            ]);
        }
        
        return response()->json([
            'success' => true,
            'payment_id' => $payment->id
        ], 200);
    }

    public function getTraining(Request $request)
    {
        $this->validate($request, ['id' => 'required|integer|exists:trainings,id']);
        $id = $request->input('id');
        $training = Training::with('goals')->with('videos')->where('active',1)->where('id',$id)->first()->toArray();
        if (!$this->checkPaid($request, $training['price'])) return response()->json(['success' => false, 'error' => trans('auth.training_access_err')], 403);
        $training['periodicity'] = $this->setNumeralPeriodicity($training['periodicity']);
        $training['photos'] = TrainingPhoto::get()->toArray();
        return response()->json([
            'success' => true,
            'training' => $training
        ], 200);
    }

    public function getVideoAdvicePrice()
    {
        return response()->json([
            'success' => true,
            'price' => Settings::where('name','video_advices_price')->pluck('value')[0]
        ], 200);
    }

    public function getVideoAdvice(Request $request)
    {
        if ($request->has('id') && $request->input('id')) {
            $advice = VideoAdvice::find($request->input('id'));
            if ($advice->user_id != $request->user()->id) {
                return response()->json(['success' => false, 'error' => trans('auth.access_denied')], 403);
            } else {
                return response()->json([
                    'success' => true,
                    'video_advice' => $advice->toArray()
                ], 200);
            }
        } else {
            return response()->json([
                'success' => true,
                'video_advice' => VideoAdvice::where('user_id',$request->user()->id)->get()->toArray()
            ], 200);
        }
    }

    public function setVideoAdvice(Request $request)
    {
        if ($request->has('id')) $validationArr['id'] = 'required|integer|exists:video_advices,id';
        if (isset($validationArr)) $this->validate($request, $validationArr);

        $duration = $request->has('duration') ? $request->input('duration') : 0;
        $paid = $request->has('paid') && $request->input('paid');

        if ($request->has('id')) {
            $advice = VideoAdvice::find($request->has('id'));
            if ($advice->user_id != $request->user()->id) return response()->json(['success' => false, 'error' => trans('auth.access_denied')], 403);
            $advice->duration = $duration;
            $advice->paid = $paid;
            $advice->save();
        } else {
            $message = Message::create(['new' => 1]);
            $advice = VideoAdvice::create([
                'user_id' => $request->user()->id,
                'duration' => $duration,
                'paid' => $paid,
                'message_id' => $message->id
            ]);

            $this->messageMailer([
                'head' => trans('messages.new_video_advice_head'),
                'message' => trans('messages.new_request_text',[
                    'user' => view('admin._user_href_block',['user' => $request->user()])->render(),
                    'date' => $advice->created_at->format('d.m.Y'),
                    'status' => $paid ? trans('content.payed') : trans('content.not_payed')
                ]),
                'url' => '/admin/video-advice?id='.$advice->id,
                'buttonText' => trans('messages.new_request_button_text')
            ]);
        }
        return response()->json(['success' => true, 'video_advice' => $advice->toArray()], 200);
    }

    public function getFeedsPrice()
    {
        return response()->json([
            'success' => true,
            'price' => Settings::where('name','feeds_price')->pluck('value')[0]
        ], 200);
    }

    public function getFeeds(Request $request)
    {
        if ($request->has('id') && $request->input('id')) {
            $feed = Feed::find($request->input('id'));
            if ($feed->user_id != $request->user()->id) {
                return response()->json(['success' => false, 'error' => trans('auth.access_denied')], 403);
            } else {
                return response()->json([
                    'success' => true,
                    'video_feed' => $feed->toArray()
                ], 200);
            }
        } else {
            return response()->json([
                'success' => true,
                'video_feeds' => Feed::where('user_id',$request->user()->id)->get()->toArray()
            ], 200);
        }
    }

    public function setFeed(Request $request)
    {
        if ($request->has('id')) $validationArr['id'] = 'required|integer|exists:feeds,id';
        if (isset($validationArr)) $this->validate($request, $validationArr);

        $paid = $request->has('paid') && $request->input('paid');

        if ($request->has('id')) {
            $feed = Feed::find($request->has('id'));
            if ($feed->user_id != $request->user()->id) return response()->json(['success' => false, 'error' => trans('auth.access_denied')], 403);
            $feed->paid = $paid;
            $feed->save();
        } else {
            $message = Message::create(['new' => 1]);
            $feed = Feed::create([
                'user_id' => $request->user()->id,
                'paid' => $paid,
                'comment' => $request->has('comment') ? $request->input('comment') : null,
                'message_id' => $message->id
            ]);

            $this->messageMailer([
                'head' => trans('messages.new_feed_head'),
                'message' => trans('messages.new_request_text',[
                    'user' => view('admin._user_href_block',['user' => $request->user()])->render(),
                    'date' => $feed->created_at->format('d.n.Y'),
                    'status' => $paid ? trans('content.payed') : trans('content.not_payed')
                ]),
                'url' => '/admin/feed?id='.$feed->id,
                'buttonText' => trans('messages.new_request_button_text')
            ]);
        }
        return response()->json(['success' => true, 'feed' => $feed->toArray()], 200);
    }

    private function checkPaid(Request $request, $price, $id=null)
    {
        $paid = Payment::where('user_id',$request->user()->id)->where('training_id', ($id ? $id : $request->input('id')))->where('active',1)->first();
        return $request->user()->admin || ($paid && isset($paid->value) && $paid->value == $price);
    }
}
