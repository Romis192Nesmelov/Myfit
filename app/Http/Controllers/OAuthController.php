<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Google_Client;
use Google_Service_Oauth2;

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

        if (!$this->checkAuth($user)) {
            $this->createAccessToken($user);
            $authToken = $this->getRandToken();
            $user->auth_token = $authToken;
            $user->save();
        }
        return response()->json(['success' => true, 'auth_token' => $user->auth_token, 'access_token' => $user->access_token, 'expired_at' => $user->access_token_expired], 200);
    }

    public function auth($token)
    {
        if (!$user = User::where('auth_token',$token)->first())
            return response()->json(['success' => false, 'error' => trans('auth.token_error')], 400);

        if (!$user->active)
            return response()->json(['success' => false, 'error' => trans('auth.not_confirmed_account')], 403);

        list($token, $expired) = $this->createAccessToken($user);
        return response()->json(['success' => true, 'access_token' => $token, 'expired_at' => $expired], 200);
    }

    public function vkAuth(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'access_token' => 'required'
        ]);
        $result = json_decode(file_get_contents(
            'https://api.vk.com/method/users.get'
            .'?user_ids='.$request->input('user_id')
            .'&fields=country'
            .'&access_token='.$request->input('access_token')
            .'&v=5.21'));

        if (isset($result->error)) return $result->error->error_msg;

        return $this->getUser(
            'vk_id',
            $result->response[0]->id,
            $result->response[0]->last_name.' '.$result->response[0]->first_name,
            $request->input('email'),
            isset($result->response[0]->country) ? $result->response[0]->country->title : null
        );
    }

    public function fbAuth(Request $request)
    {
        $this->validate($request, ['access_token' => 'required']);
        $response = json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$request->input('access_token')));
        return $this->getUser(
            'fb_id',
            $response->id,
            isset($response->name) ? $response->name : null,
            null,
            null
        );
    }

    public function googleAuth(Request $request)
    {
        $this->validate($request, ['access_token' => 'required']);
        $googleClient = new Google_Client();
        $googleClient->setClientId(env('GOOGLE_CLIENT_ID'));
        $googleClient->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $googleClient->addScope("email");
        $googleClient->addScope("profile");
        $googleClient->setAccessToken($request->input('access_token'));

        // get profile info
        $googleOauth = new Google_Service_Oauth2($googleClient);
        $googleAccountInfo = $googleOauth->userinfo->get();
        $email = $googleAccountInfo->email;
        $name = $googleAccountInfo->name;

        return $this->getUser(null, null, $name, $email, null);
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
        $this->validate($request, ['email' => 'required|email|exists:users']);
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

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->auth_token = null;
        $user->access_token = null;
        $user->access_token_expired = null;
        $user->save();
        return response()->json(['success' => true], 200);
    }

    private function getUser($idFieldName, $userId, $name, $email, $location)
    {
        $user = $idFieldName && $userId ? User::where($idFieldName,$userId)->first() : User::where('email',$email)->first();
        if (!$user) {
            $user = User::create([
                $idFieldName => $userId,
                'name' => $name ? $name : '',
                'email' => $email ? $email : null,
                'password' => '',
                'active' => 1,
            ]);
        }

        if (!$user->location && $location) {
            $user->location = $location;
            $user->save();
        }

        if (!$user->name && $name) {
            $user->name = $name;
            $user->save();
        }

        if (!$user->auth_token) {
            $user->auth_token = $this->getRandToken();
            $user->save();
        }

        list($token, $expired) = $this->createAccessToken($user);
        return response()->json(['success' => true, 'auth_token' => $user->auth_token, 'access_token' => $token, 'expired_at' => $expired], 200);
    }
}
