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
Route::resource('category_group','Controller\CategoryGroupController');
Route::resource('category','Controller\CategoryController');

Route::group(['prefix'=>'category'],function(){
    Route::get('/show_details/{$id}','Controller\CategoryController@showDetails');
});

Route::group(['prefix' => 'user'],function(){
    Route::post('/login','Controller\UserController@login');
    Route::get('/refresh', 'Controller\UserController@refresh')->middleware('jwt.refresh');
    Route::get('/data', 'Controller\UserController@user')->middleware('jwt.auth');
});

Route::resource('comment','Controller\CommentController');
Route::resource('tag','Controller\TagController');
Route::resource('content','Controller\ContentController');
Route::resource('user','Controller\UserController');
