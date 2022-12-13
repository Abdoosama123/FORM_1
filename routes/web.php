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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::group(['prefix' => LaravelLocalization::setLocale()], function () {


    Route::get('user/create', 'LoginController@create');
    Route::POST('user/create', 'LoginController@store')->name('userCreate');

    Route::get('/user/update/{id}', 'LoginController@edit');
    Route::post('/user/update/{id}', 'LoginController@update');


    Route::get('/user/showAll', 'LoginController@showAll');
    Route::get('/user/show/{id}', 'LoginController@show');

    Route::get('/user/delete/{id}', 'LoginController@destroy');


});

