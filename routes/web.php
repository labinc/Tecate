<?php

use Illuminate\Support\Facades\Route;

Route::put('session', [ 'as' => 'session', 'uses' => 'HomeController@session']);

Route::group(['middleware' => 'guest'], function()
{
 Route::get('/', [ 'as' => '/', 'uses' => 'AuthController@showRegisterForm']);
 Route::get('login', [ 'as' => 'login', 'uses' => 'AuthController@showLoginForm']);
 Route::get('register', [ 'as' => 'register', 'uses' => 'AuthController@showRegisterForm']);
 Route::post('login', [ 'as' => 'login', 'uses' => 'AuthController@login']);
 Route::post('register', [ 'as' => 'register', 'uses' => 'AuthController@register']);
});

Route::group(['middleware' => 'auth'], function()
{
 Route::get('home', [ 'as' => 'home', 'uses' => 'HomeController@home']);
 Route::get('question', [ 'as' => 'question', 'uses' => 'HomeController@question']);
 Route::get('resume', [ 'as' => 'resume', 'uses' => 'HomeController@resume']);
 Route::post('store/answer', [ 'as' => 'store.answer', 'uses' => 'HomeController@store_answer']);
 Route::put('close', [ 'as' => 'close', 'uses' => 'AuthController@close']);
 Route::put('logout', [ 'as' => 'logout', 'uses' => 'AuthController@logout']);
});
