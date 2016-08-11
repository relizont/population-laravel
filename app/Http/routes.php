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

    Route::get('/',  function()
    {        
        return view('home.index');
    });

    Route::get('/tasks', 'TaskController@index');
    Route::post('/task', 'TaskController@store');
    Route::delete('/task/{task}', 'TaskController@destroy');

    Route::auth();

    Route::get('/countries', 'CountryController@index')->middleware('auth');
    Route::post('/country', 'CountryController@store')->middleware('auth');
    Route::delete('/country/{country}', 'CountryController@destroy')->middleware('auth');

    Route::get('/cities', 'CityController@index')->middleware('auth');
    Route::post('/city', 'CityController@store')->middleware('auth');
    Route::delete('/city/{city}', 'CityController@destroy')->middleware('auth');

    // Route::resource('population', 'PopulationController');
    Route::get('/population', 'PopulationController@index')->middleware('auth');
    Route::post('/population', 'PopulationController@store')->middleware('auth');
    Route::delete('/population/{population}', 'PopulationController@destroy')->middleware('auth');    

});

Route::group(['middleware' => 'web'], function () {

    Route::get('/api/population','PopulationController@getPopulationInformation')->middleware('guest');
    Route::get('/api/population/country','PopulationController@getCountryPopulation')->middleware('guest'); 
    Route::get('/api/population/city/{country}','PopulationController@getCityPopulationByCountry')->middleware('guest');
    Route::get('/api/population/gender/{country}/{city}','PopulationController@getGenderPopulationByCity')->middleware('guest');
    Route::get('/api/population/type/{country?}/{city?}/{gender?}','PopulationController@getTypePopulationByGender')->middleware('guest');
});
