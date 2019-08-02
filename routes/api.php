<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', 'PostController@getAll')->name('posts.getAll');
Route::get('/posts/{postId}', 'PostController@findById')->name('posts.show');
Route::post('/posts/create', 'PostController@store')->name('posts.store');
Route::put('/posts/update/{postId}', 'PostController@update')->name('posts.update');
Route::delete('/posts/delete/{postId}', 'PostController@destroy')->name('posts.destroy');