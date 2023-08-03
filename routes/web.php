<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimelimitController;
use App\Http\Controllers\ParticipantController;
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
    return view('welcome');
});

Route::get('/download-apk', function () {
    return Storage::download('public/rallyPeserta.apk');
});
Route::post('/limit',[TimelimitController::class,'store'])->name('store.timelimit');
Route::get('/show',[TimelimitController::class,'show'])->name('show');
Route::get('/register',[ParticipantController::class,'createStepOne'])->name('participants.create.step.one');
Route::post('participant/create-step-one', [ParticipantController::class,'postCreateStepOne'])->name('participants.create.step.one.post');
 
Route::get('participants/create-step-two', [ParticipantController::class,'createStepTwo'])->name('participants.create.step.two');
Route::post('participants/create-step-two', [ParticipantController::class,'postCreateStepTwo'])->name('participants.create.step.two.post');
  
Route::get('participants/create-step-three', [ParticipantController::class,'createStepThree'])->name('participants.create.step.three');
Route::post('participants/create-step-three', [ParticipantController::class,'postCreateStepThree'])->name('participants.create.step.three.post');
Route::get('participants/create-step-final', [ParticipantController::class,'createStepFinal'])->name('participants.create.step.final');
Route::post('participants/create-step-final', [ParticipantController::class,'postCreateStepFinal'])->name('participants.create.step.final.post');