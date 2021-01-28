<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::apiResource('users', 'API\UsersController');
Route::get('users', 'API\UsersController@index');
Route::get('users/{user}', 'API\UsersController@show');
Route::put('users/{user}/update', 'API\UsersController@update');
Route::delete('users/{user}/delete', 'API\UsersController@destroy');
