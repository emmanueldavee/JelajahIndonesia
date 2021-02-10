<?php

use App\Http\Middleware\delArticle;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\isUser;
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

Route::get('/', 'ArticleController@index');

Auth::routes();

Route::get('/home', 'UserController@home');

Route::get('/admin/user', 'UserController@adminUser')->middleware(isAdmin::class);
Route::get('/admin/admin', 'UserController@adminAdmin')->middleware(isAdmin::class);

Route::get('/users/edit', 'UserController@edit')->middleware('auth');
Route::get('/users/{user}/blogs', 'UserController@blogs')->middleware('auth');
Route::patch('/users/{user}', 'UserController@update')->middleware('auth');
Route::delete('/users/{user}', 'UserController@destroy')->middleware(isAdmin::class);

Route::get('/categories/{category}', 'CategoryController@show');

Route::get('/articles/create', 'ArticleController@create')->middleware(isUser::class);
Route::post('/articles', 'ArticleController@store')->middleware(isUser::class);
Route::get('/articles/{article}', 'ArticleController@show');
Route::delete('/articles/{article}', 'ArticleController@destroy')->middleware(delArticle::class);
