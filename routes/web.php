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
Route::get('dashboard', 'DashboardController@index');
Route::get('login', 'AuthController@login');
Route::post('login', 'AuthController@userLogin');
Route::group(['middleware' => 'auth.web'], function() {
    Route::group(['prefix' => 'assessments'], function() {
        Route::get('create', 'AssessmentController@create');
        Route::post('get-data', 'AssessmentController@getDataTable');
        Route::get('import', 'AssessmentController@import');
        Route::post('import', 'AssessmentController@importData');
        Route::post('teams', 'AssessmentController@getTeams');
        Route::get('/', 'AssessmentController@index');
    });
    Route::group(['prefix' => 'participants'], function() {
        Route::get('create', 'ParticipantsController@create');
        Route::post('get-data', 'ParticipantsController@getDataTable');
        Route::get('import', 'ParticipantsController@import');
        Route::post('import', 'ParticipantsController@importData');
        Route::get('/', 'ParticipantsController@index');
    });
    Route::group(['prefix' => 'race'], function() {
        Route::group(['prefix' => 'scores'], function() {
            Route::post('get-data', 'Race\ScoresController@getDataTable');
            Route::get('import', 'Race\ScoresController@import');
            Route::post('import', 'Race\ScoresController@importData');
            Route::resource('/', 'Race\ScoresController');
        });
    });
    Route::post('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
});