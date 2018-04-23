<?php

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



Route::get('/', 'BlogController@index')->name('home');

Route::get('/newblog/create', 'BlogController@create');

Route::post('/newblog', 'BlogController@store');

Route::get('/newblog/{post}', 'BlogController@show');

Route::post('/newblog/{post}/comments', 'CommentsController@store');


Route::get('/register','RegistartionController@create');

Route::post('/register', 'RegistartionController@store');

Route::get('/login','SessionController@create');

Route::post('/login', 'SessionController@store');


Route::get('/logout','SessionController@destroy');

