<?php

use Illuminate\Support\Facades\Route;

Route::get('/', ['uses' => 'AuthController@getLogin', 'as' => 'Auth.getLogin']);
Route::post('/login', ['uses' => 'AuthController@postLogin', 'as' => 'Auth.postLogin']);

Route::group(['middleware' => 'islogged'], function () {
  Route::get('/logout', ['uses' => 'AuthController@getLogout', 'as' => 'Auth.getLogout']);

  Route::get('/bus', ['uses' => 'BusController@getIndex', 'as' => 'Bus.getIndex']);
  Route::post('/bus', ['uses' => 'BusController@postBus', 'as' => 'Bus.postBus']);
});