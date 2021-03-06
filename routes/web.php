<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;

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

Route::get('/', function () {
    return view('index');
})->name('home');

// 2022-04-19
Route::view('/ex/pusher-client', 'examples/pusher-client');
Route::view('/ex/pusher-server', 'examples/pusher-server');
// 2022-04-20
Route::view('/ex/elem-in-viewport', 'examples/elem-in-viewport');
// 2022-04-21
Route::view('/ex/google-oauth', 'examples/google-oauth');
// 2022-04-22
Route::view('/ex/facebook-oauth', 'examples/facebook-oauth');
// 2022-05-02
Route::get('/login/facebook', [LoginController::class, 'facebookLogin']);
Route::get('/login/facebook/callback', [LoginController::class, 'facebookLoginCallback']);
// 2022-05-03
Route::get('/login/google', [LoginController::class, 'googleLogin']);
Route::get('/login/google/callback', [LoginController::class, 'googleLoginCallback']);
// 2022-05-04
Route::get('/login/line', [LoginController::class, 'lineLogin']);
Route::get('/login/line/callback', [LoginController::class, 'lineLoginCallback']);
// 2022-05-19
Route::view('/privacy-policy', 'privacy-policy');
