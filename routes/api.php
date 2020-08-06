<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    var_dump(333);
//});

Route::match(['get', 'post'], '/login', 'OAuthController@login');
Route::match(['get', 'post'], '/auth/{token}', 'OAuthController@auth');
Route::match(['get', 'post'], '/vk-auth', 'OAuthController@vkAuth');
Route::match(['get', 'post'], '/fb-auth', 'OAuthController@fbAuth');
Route::match(['get', 'post'], '/google-auth', 'OAuthController@googleAuth');
Route::match(['get', 'post'], '/register', 'OAuthController@register');
Route::match(['get', 'post'], '/confirm-registration/{token}', 'OAuthController@confirmRegistration');
Route::match(['get', 'post'], '/re-confirm-registration', 'OAuthController@reConfirmRegistration');
Route::match(['get', 'post'], '/restore-password', 'OAuthController@restorePassword');
Route::match(['get', 'post'], '/complete-restore-password/{token}', 'OAuthController@completeRestorePassword');

Route::group(['middleware' => 'auth.access'], function() {
    Route::match(['get', 'post'], '/logout/{token}', 'OAuthController@logout');
});

Route::match(['get', 'post'], '/test', function (){ return response()->json(['success' => true], 200); });