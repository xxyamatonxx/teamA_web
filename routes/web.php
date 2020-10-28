<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/mypage', 'MypageController@show')->name('mypage.show')->middleware('auth');
Route::post('/edit', 'HomeController@show')->name('edit.profile');
Route::get('/edit', 'HomeController@show')->name('edit.profile.show');
Route::post('/editprofile', 'HomeController@edit')->name('edit.data');
Route::resource('projects', 'ProjectController',['only' => ['upate', 'edit', 'destroy']])->middleware('admin_auth');
Route::resource('projects', 'ProjectController',['only' => ['create', 'store']])->middleware('auth');
Route::resource('projects', 'ProjectController',['only' => ['index', 'show']]);
