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

Route::group(['prefix' => 'user'],function(){
    Route::post('/login','Controller\UserController@login');
    Route::get('/refresh', 'Controller\UserController@refresh')->middleware('jwt.refresh');
    Route::get('/data', 'Controller\UserController@user')->middleware('jwt.auth');
});
Route::group(['prefix' => 'post_group'],function(){
    Route::get('/get_post/{id_postGroup}','Controller\PostGroupController@getPost');
});

Route::get('/post/getTag', 'Controller\PostController@getTag');

Route::post('/image/store', 'Controller\ImageController@store');
Route::post('/image/saveImageProvisional', 'Controller\ImageController@saveImageProvisional');

Route::resource('comment','Controller\CommentController');
Route::resource('tag','Controller\TagController');
Route::resource('post_group','Controller\PostGroupController');
Route::resource('post','Controller\PostController');
Route::resource('post_tag','Controller\PostTagController');
