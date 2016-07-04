<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    })->middleware('guest');

    Route::get('/tasks', 'TaskController@index');
    Route::post('/task', 'TaskController@store');
    Route::delete('/task/{task}', 'TaskController@destroy');

    Route::auth();

    Route::get('/countries', 'CountryController@index')->middleware('guest');
    Route::post('/country', 'CountryController@store')->middleware('guest');
    Route::delete('/country/{country}', 'CountryController@destroy')->middleware('guest');

    Route::get('/cities', 'CityController@index')->middleware('guest');
    Route::post('/city', 'CityController@store')->middleware('guest');
    Route::delete('/city/{city}', 'CityController@destroy')->middleware('guest');

    // Route::resource('population', 'PopulationController');

    Route::get('/population', 'PopulationController@index')->middleware('guest');
    Route::post('/population', 'PopulationController@store')->middleware('guest');
    Route::delete('/population/{population}', 'PopulationController@destroy')->middleware('guest');

});
