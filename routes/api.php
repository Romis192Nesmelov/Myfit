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

Route::match(['get','post'], '/login', 'OAuthController@login');
Route::match(['get','post'], '/auth/{token}', 'OAuthController@auth');
Route::match('post', '/vk-auth', 'OAuthController@vkAuth');
Route::match('post', '/fb-auth', 'OAuthController@fbAuth');
Route::match('post', '/google-auth', 'OAuthController@googleAuth');
Route::match(['post','get'], '/register', 'OAuthController@register');
Route::match('get', '/confirm-registration/{token}', 'OAuthController@confirmRegistration');
Route::match('post', '/re-confirm-registration', 'OAuthController@reConfirmRegistration');
Route::match('post', '/restore-password', 'OAuthController@restorePassword');
Route::match('post', '/complete-restore-password/{token}', 'OAuthController@completeRestorePassword');

Route::group(['middleware' => 'auth.access'], function() {
    Route::match('post', '/logout/{token}', 'OAuthController@logout');
    Route::match(['post','get'], '/get-user/{token}', 'UserController@getUser');
    Route::match(['post','get'], '/user-change/{token}', 'UserController@changeParameters');
    Route::match(['post','get'], '/get-programs/{token}', 'UserController@getPrograms');
    Route::match(['post','get'], '/get-trainings/{token}', 'UserController@getTrainings');
    Route::match(['post','get'], '/get-paid-trainings/{token}', 'UserController@getPaidTrainings');
    Route::match(['post','get'], '/get-training-preview/{token}', 'UserController@getTrainingPreview');
    Route::match(['post','get'], '/get-training/{token}', 'UserController@getTraining');
});