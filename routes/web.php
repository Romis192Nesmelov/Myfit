<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('welcome'); });
Route::get('/policy', function () { return view('policy'); });
Route::get('/confirm-registration/{token}', function () { return view('wrong_choice'); });
Route::get('/complete-restore-password/{token}', function () { return view('wrong_choice'); });
Route::match(['post','get'], '/apple-app-site-association', function(){
    return response()->json([
        'applinks' => [
            'apps' => [],
            'details' => [[
                'appID' => 'TTQXKM6K44.su.fitspace',
                'paths' => ['*']
            ]]
        ]
    ]);
});
Route::get('/login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');
Route::post('/login', 'AuthController@attempt');
Route::get('/admin', 'AdminController@index');

Route::get('/admin/users/{slug?}', 'AdminController@users');
Route::post('/admin/user', 'AdminController@editUser');
Route::post('/admin/delete-user', 'AdminController@deleteUser');

Route::get('/admin/programs', 'AdminController@programs');
Route::post('/admin/program', 'AdminController@editProgram');
Route::post('/admin/delete-program', 'AdminController@deleteProgram');

Route::get('/admin/trainings', 'AdminController@trainings');
Route::post('/admin/training', 'AdminController@editTraining');
Route::post('/admin/delete-training', 'AdminController@deleteTraining');

Route::get('/admin/settings', 'AdminController@settings');
Route::post('/admin/settings', 'AdminController@editSettings');


//Route::get('/avatar', function () { return view('avatar'); });