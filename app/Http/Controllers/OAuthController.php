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

    public function auth($token)
    {
        if (!$user = User::where('auth_token',$token)->first())
            return response()->json(['success' => false, 'error' => trans('auth.token_error')], 400);

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
            'name' => 'required|min:2|max:700',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:20|confirmed'
        ]);

        $token = $this->getRandToken();
        $fields = $this->processingFields($request);
        $fields['password'] = bcrypt($fields['password']);
        $fields['confirm_email_token'] = $token;

        User::create($fields);

        $this->sendMail($fields['email'], 'registration', ['token' => $token]);
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

        $token = $this->getRandToken();
        $user->confirm_email_token = $token;
        $user->save();

        $this->sendMail($request->input('email'), 'registration', ['token' => $token]);
        return response()->json(['success' => true]);
    }

    public function restorePassword(Request $request)
    {
        $this->validate($request, ['email' => 'required|email|exists:users']);
        $user = User::where('email',$request->input('email'))->first();

        if (!$user->active)
            return response()->json(['success' => false, 'error' => trans('auth.not_confirmed_account')], 403);

        $passwordToken = $this->getRandToken();
        $user->restore_password_token = $passwordToken;
        $user->save();

        $this->sendMail($request->input('email'), 'restore_password', ['token' => $passwordToken]);
        return response()->json(['success' => true]);
    }

    public function completeRestorePassword(Request $request, $token)
    {
        $this->validate($request, ['password' => 'required|min:6|max:20|confirmed']);
        if (!$user = User::where('restore_password_token',$token)->first())
            return response()->json(['success' => false, 'error' => trans('auth.token_error')], 400);
            
        $user->password = bcrypt($request->input('password'));
        $user->restore_password_token = null;
        $user->save();

        return response()->json(['success' => true]);
    }

    public function logout(Request $request, $token)
    {
        $user = $request->user();
        $user->auth_token = null;
        $user->access_token = null;
        $user->access_token_expired = null;
        $user->save();
        return response()->json(['success' => true], 200);
    }
}
