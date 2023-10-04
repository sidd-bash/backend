<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// User Authentication Routes
Route::post('/signup', 'AuthController@signup');
Route::post('/login', 'AuthController@login');

// User Routes
Route::middleware('auth:api')->group(function () {
    Route::get('/user', 'UserController@index');
    Route::put('/user', 'UserController@update');
    Route::delete('/user', 'UserController@destroy');
});

// Product Routes
Route::middleware('auth:api')->group(function () {
    Route::post('/products', 'ProductController@store');
    Route::get('/products', 'ProductController@index');
    Route::get('/products/{user}', 'ProductController@getUserProducts');
    Route::get('/products/type/{type}', 'ProductController@getProductsByType');
    Route::get('/products/search', 'ProductController@searchProducts');
});

// Comment Routes
Route::middleware('auth:api')->group(function () {
    Route::post('/comments', 'CommentController@store');
    Route::get('/comments/{product}', 'CommentController@getProductComments');
    Route::delete('/comments/{comment}', 'CommentController@destroy');
    Route::put('/comments/{comment}', 'CommentController@update');
});

