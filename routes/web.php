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

/**
 * Guest
 */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function(){
    return view('about');
});

Route::get('/auth', function(){
    return view('auth.auth');
});

/**
 * User
 */

Route::group(['middleware' => 'auth'], function(){
    Route::get('/posts', 'PostController@index')->name('posts');

    Route::get('/posts/{post}', 'PostController@show')->name('postShow');
});

/**
 * Admin
 */

Route::group(['middleware' => 'admin'], function (){
    Route::get('/users', 'UserController@index')->name('users');

    Route::post('/posts/add', 'PostController@store')->name('postAdd');

    Route::post('/users/add', 'UserController@store')->name('userAdd');

    Route::get('/posts/{post}/edit', 'PostController@edit')->name('postEdit');

    Route::get('/users/{user}/edit', 'UserController@edit')->name('userEdit');

    Route::patch('/users/{user}', 'UserController@update')->name('userUpdate');

    Route::patch('/posts/{post}', 'PostController@update')->name('postUpdate');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
