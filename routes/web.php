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
//Route::get('/mypage', 'MypageController@show')->name('mypage.show')->middleware('auth');
Route::post('/edit', 'HomeController@show')->name('edit.profile');
Route::get('/edit', 'HomeController@show')->name('edit.profile.show');
Route::post('/editprofile', 'HomeController@edit')->name('edit.data');
Route::resource('projects', 'ProjectController',['only' => ['destroy']])->middleware('admin_auth');
Route::resource('projects', 'ProjectController',['only' => ['create','store','edit','upate']])->middleware('auth');
Route::resource('projects', 'ProjectController',['only' => ['index', 'show']]);

Route::group(['prefix' => 'admin', 'middleware' => 'admin_auth'], function () {
    Route::get('/','AdminController@index')->name('admin.index');
    Route::get('/projects','ProjectController@index')->name('admin.projects_release');
    Route::get('/projects/request','AdminController@request_projects')->name('admin.projects_request');
    Route::get('/projects/request/edit/{id}','AdminController@edit')->name('admin.release_projects_edit');
});