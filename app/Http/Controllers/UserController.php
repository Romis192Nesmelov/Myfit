<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Program;
use App\Training;
use App\Payment;
use App\TrainingDay;

class UserController extends Controller
{
    use HelperTrait;
    
    public function changeParameters(Request $request)
    {
        $dateBorn = date('Y') - 10;
        $this->validate($request, [
            'birthday_year' => 'required|integer|min:1900|max:'.$dateBorn,
            'height' => 'integer|max:400',
            'weight' => 'integer|max:500',
            'waist_girth' => 'integer|min:20',
            'hip_girth' => 'integer|min:20'
        ]);

        $fields = $this->processingFields($request);
        $user = $request->user();
        $user->update($fields);

        return response()->json(['success' => true], 200);
    }
    
    public function getUser(Request $request)
    {
        if (!$request->user()->active) return response()->json(['success' => false, 'error' => trans('auth.not_confirmed_account')], 403);
        $user = [
            'name' => $request->user()->name,
            'email' => $request->user()->email,
            'location' => $request->user()->location,
            'birthday_year' => $request->user()->birthday_year,
            'height' => $request->user()->height,
            'weight' => $request->user()->weight,
            'waist_girth' => $request->user()->waist_girth,
            'hip_girth' => $request->user()->hip_girth
        ];
        return response()->json(['success' => true, 'user' => $user], 200);
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
        return response()->json([
            'success' => true,
            'trainings' => Training::with('goals')->where('active',1)->where('program_id',$request->input('id'))->select(
                'id',
                'photo',
                'complexity',
                'need_previous_completed',
                'its_cardio',
                'price'
            )->get()->toArray()
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
            'trainings' => Payment::where('user_id',$request->user()->id)->pluck('training_id')->toArray()
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

    private function checkPaid(Request $request, $price)
    {
        $paid = Payment::where('user_id',$request->user()->id)->where('training_id',$request->input('id'))->first();
        return $paid && isset($paid->value) && $paid->value == $price;
    }
}
