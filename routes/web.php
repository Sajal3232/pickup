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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['namespace'=>'frontEnd',], function(){

    Route::get('/', [App\Http\Controllers\frontEnd\frontEndController::class, 'index']);
    Route::get('/client', [App\Http\Controllers\frontEnd\frontEndController::class, 'clientlogin']);
    Route::get('/client/register', [App\Http\Controllers\frontEnd\frontEndController::class, 'register']);
    Route::post('/save', [App\Http\Controllers\frontEnd\frontEndController::class, 'save']);
    Route::post('/client/login', [App\Http\Controllers\frontEnd\frontEndController::class, 'login']);
    Route::post('/key/create', [App\Http\Controllers\frontEnd\frontEndController::class, 'generatekey']);
    Route::post('/key/save', [App\Http\Controllers\frontEnd\frontEndController::class, 'savekey']);





});
