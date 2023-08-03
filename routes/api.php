<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasLombaController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ResultController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user;
});

Route::get('/test', function (Request $request) {
    return ('Online');
});

/* kelas lomba */
Route::group(['prefix' => 'KelasLomba'], function () {
    Route::get('/', [KelasLombaController::class,'index']);
});
 
Route::resource('participant', ParticipantController::class);
Route::post('login', [ParticipantController::class,'login']);
Route::resource('result', ResultController::class);
Route::middleware('auth:sanctum')->get('participants/result', [ResultController::class,'index']);