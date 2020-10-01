<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\UserParam;
use App\Program;
use App\Training;
use App\Payment;
use App\TrainingDay;

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
        $lastParams = $user->lastParams[0];
        $lastUpdate = $lastParams->updated_at->today();
        $checkDate = Carbon::today()->subDays(2);

        if ($lastUpdate <= $checkDate) {
            $fields['user_id'] = $user->id;
            UserParam::create($fields);
        } else {
            $lastParams->update($fields);
        }
        return response()->json(['success' => true], 200);
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
            'height' => $request->user()->lastParams[0]->height,
            'weight' => $request->user()->lastParams[0]->weight,
            'waist_girth' => $request->user()->lastParams[0]->waist_girth,
            'hip_girth' => $request->user()->lastParams[0]->hip_girth
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
        $training['days'] = [];
        $days = TrainingDay::where('training_id',$id)->get();
        foreach ($days as $day) {
            $training['days'][] = count($day->videos);
        }
        return response()->json([
            'success' => true,
            'training' => $training
        ], 200);
    }

    public function getPaidTrainings(Request $request)
    {
        return response()->json([
            'success' => true,
            'trainings' => Payment::where('user_id',$request->user()->id)->where('active',1)->pluck('training_id')->toArray()
        ], 200);
    }

    public function getTraining(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer|exists:trainings,id',
            'day' => 'required|integer'
        ]);
        $id = $request->input('id');
        $training = Training::with('goals')->with('photos')->where('active',1)->where('id',$id)->first()->toArray();
        if (!$this->checkPaid($request, $training['price'])) return response()->json(['success' => false, 'error' => trans('auth.training_access_err')], 403);
        $day = TrainingDay::where('training_id',$id)->with('videos')->get()->toArray();
        $training['day'] = $day[($request->input('day')-1)];
        return response()->json([
            'success' => true,
            'training' => $training
        ], 200);
    }

    public function trainingCheck()
    {
        $this->checkTrainings();
    }

    private function checkPaid(Request $request, $price, $id=null)
    {
        $paid = Payment::where('user_id',$request->user()->id)->where('training_id', ($id ? $id : $request->input('id')))->where('active',1)->first();
        return $paid && isset($paid->value) && $paid->value == $price;
    }
}
