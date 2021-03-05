<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) return redirect('/admin');
        else return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function attempt(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users',
            'password' => 'required|min:5|max:20'
        ]);

        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'active' => 1
        ], $request->input('remember'))) return redirect()->intended('admin/users');
        else return redirect()->back()->withInput()->withErrors(['email' => trans('auth.wrong_password')]);
    }

}
