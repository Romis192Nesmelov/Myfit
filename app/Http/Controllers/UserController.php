<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Program;
use App\Training;

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

    public function getPrograms()
    {
        return response()->json([
            'success' => true,
            'programs' => Program::where('active',1)->select('id','photo','title','description')->get()->toArray()
        ], 200);
    }
    
    public function getTrainings(Request $request)
    {
        $this->validate($request, ['program_id' => 'required|integer|exists:programs,id']);
        return response()->json([
            'success' => true,
            'trainings' => Training::with('descriptions')->where('active',1)->select('id','photo','complexity','need_previous_completed','its_cardio','price')->get()->toArray()
        ], 200);
    }
}
