<?php

use Illuminate\Support\Facades\Route;

Route::put('session', [ 'as' => 'session', 'uses' => 'HomeController@session']);

Route::group(['middleware' => 'guest'], function()
{
 Route::get('/', [ 'as' => '/', 'uses' => 'AuthController@showLoginForm']);
 Route::get('login', [ 'as' => 'login', 'uses' => 'AuthController@showLoginForm']);
 Route::get('register', [ 'as' => 'register', 'uses' => 'AuthController@showRegisterForm']);
 Route::post('login', [ 'as' => 'login', 'uses' => 'AuthController@login']);
 Route::post('register', [ 'as' => 'register', 'uses' => 'AuthController@register']);
});

Route::group(['middleware' => 'auth'], function()
{
 Route::get('home', [ 'as' => 'home', 'uses' => 'HomeController@home']);
 Route::post('store/result', [ 'as' => 'store.result', 'uses' => 'HomeController@store_result']);
 Route::put('close', [ 'as' => 'close', 'uses' => 'AuthController@close']);
 Route::put('logout', [ 'as' => 'logout', 'uses' => 'AuthController@logout']);
});
