<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users/edit', 'UserController@edit')->middleware('auth');
Route::patch('/users/{user}', 'UserController@update')->middleware('auth');

Route::get('/articles/create', 'ArticleController@create')->middleware(isUser::class);
Route::post('/articles', 'ArticleController@store')->middleware(isUser::class);
