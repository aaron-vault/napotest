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

Route::get('/posts', 'PostController@index')->name('posts');

Route::post('/posts/add', 'PostController@store')->name('postAdd');

Route::get('/posts/{post}', 'PostController@show')->name('postShow');

Route::patch('/posts/{post}/edit', 'PostController@show')->name('postEdit');

/**
 * User
 */



/**
 * Admin
 */

