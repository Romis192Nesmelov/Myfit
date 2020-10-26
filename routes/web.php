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
    return response()->json(['applinks' => [
        'details' => [
            'appIDs' => ['TTQXKM6K44.su.fitspace', 'TTQXKM6K44.su.fitspace'],
            'components' => [
                ['/' => '/confirm-registration/*', 'comment' => 'Please confirm registration'],
                ['/' => '/complete-restore-password/*', 'comment' => 'Please complete restore password']
            ]
        ]
    ]]);
});

//Route::get('/avatar', function () { return view('avatar'); });