<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OAuthController extends Controller
{
    use HelperTrait;

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6|max:20'
        ]);

        $user = User::where('email',$request->input('email'))->first();
        if (!Hash::check($request->input('password'),$user->password))
            return response()->json(['success' => false, 'error' => trans('auth.wrong_password')], 403);

        if (!$user->active)
            return response()->json(['success' => false, 'error' => trans('auth.not_confirmed_account')], 403);

        if ($this->checkAuth($user))
            return response()->json(['success' => false, 'error' => trans('auth.already_authorized')], 400);
        
        list($token, $expired) = $this->createAccessToken($user);
        $authToken = $this->getRandToken();
        $user->auth_token = $authToken;
        $user->save();

        return response()->json(['success' => true, 'auth_token' => $authToken, 'access_token' => $token, 'expired_at' => $expired], 200);
    }

    public function auth(Request $request)
    {
        $this->validate($request, ['auth_token' => 'required|size:32|exists:users']);
        $user = User::where('auth_token',$request->input('auth_token'))->first();

        if (!$user->active)
            return response()->json(['success' => false, 'error' => trans('auth.not_confirmed_account')], 403);

        if ($this->checkAuth($user))
            return response()->json(['success' => false, 'error' => trans('auth.wrong_password')], 400);

        list($token, $expired) = $this->createAccessToken($user);
        return response()->json(['success' => true, 'access_token' => $token, 'expired_at' => $expired], 200);
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:20|confirmed'
        ]);

        $email = $request->input('email');
        $token = $this->getRandToken();

        User::create([
            'email' => $email,
            'password' => bcrypt($request->input('password')),
            'confirm_email_token' => $token
        ]);

        $this->sendMail($email, 'registration', ['token' => $token]);
        return response()->json(['success' => true]);
    }
    
    public function confirmRegistration($token)
    {
        if (!$user = User::where('confirm_email_token',$token)->first())
            return response()->json(['success' => false, 'error' => trans('auth.token_error')], 400);
        
        if ($user->active)
            return response()->json(['success' => false, 'error' => trans('auth.already_active')], 403);

        list($token, $expired) = $this->createAccessToken($user);
        $authToken = $this->getRandToken();
        $user->confirm_email_token = null;
        $user->auth_token = $authToken;
        $user->active = 1;
        $user->save();
        return response()->json(['success' => true, 'auth_token' => $authToken, 'access_token' => $token, 'expired_at' => $expired], 200);
    }

    public function reConfirmRegistration(Request $request)
    {
        $this->validate($request, ['email' => 'required|email|exist:users']);
        $user = User::where('email',$request->input('email'))->first();

        if ($user->active)
            return response()->json(['success' => false, 'error' => trans('auth.already_active')], 403);
        
        $this->sendMail($request->input('email'), 'registration', ['token' => $this->getRandToken()]);
        return response()->json(['success' => true]);
    }

    public function restorePassword(Request $request)
    {
        $this->validate($request, ['email' => 'required|email|exist:users']);
        $user = User::where('email',$request->input('email'))->first();

        if (!$user->active)
            return response()->json(['success' => false, 'error' => trans('auth.not_confirmed_account')], 403);

        $passwordToken = $this->getRandToken();
        $user->restore_password_token = $passwordToken;
        $user->save();

        $this->sendMail($request->input('email'), 'restore_password', ['token' => $passwordToken]);
        return response()->json(['success' => true]);
    }

    public function completeRestorePassword(Request $request)
    {
        $this->validate($request, [
            'restore_password_token' => 'required|size:32|exists:users',
            'password' => 'required|min:6|max:20|confirmed'
        ]);

        $user = User::where('restore_password_token',$request->input('restore_password_token'))->first();
        $user->password = bcrypt($request->input('password'));
        $user->restore_password_token = null;
        $user->save();

        return response()->json(['success' => true]);
    }

    public function logout(Request $request)
    {
        $this->validate($request, ['access_token' => 'required|size:32|exists:users']);
        $user = User::where('access_token',$request->input('access_token'))->first();
        $user->access_token = null;
        $user->access_token_expired = null;
        $user->save();
        return response()->json(['success' => true], 200);
    }
}
