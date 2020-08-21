<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use HelperTrait;
    
    public function changeParameters(Request $request)
    {
        $dateBorn = date('Y') - 10;
        $this->validate($request, [
            'birthday_year' => 'required|integer|min:1900|max:'.$dateBorn,
            'height' => 'required|integer|min:50|max:400',
            'weight' => 'required|integer|min:20|max:500',
            'waist_girth' => 'required|integer|min:20',
            'hip_girth' => 'required|integer|min:20'
        ]);

        $fields = $this->processingFields($request);
        $user = $request->user();
        $user->update($fields);

        return response()->json(['success' => true], 200);
    }
}
