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

Route::get('/', function () {
    return view('index');
});

// 2022-04-19
Route::view('/ex/pusher-client', 'examples/pusher-client');
Route::view('/ex/pusher-server', 'examples/pusher-server');
// 2022-04-20
Route::view('/ex/elem-in-viewport', 'examples/elem-in-viewport');
// 2022-04-21
Route::view('/ex/google-oauth', 'examples/google-oauth');
// 2022-04-22
Route::view('/ex/facebook-oauth', 'examples/facebook-oauth');
