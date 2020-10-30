<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::resource('projects', 'ProjectController', ['only' => ['destroy']])->middleware('admin_auth');
Route::resource('projects', 'ProjectController', ['only' => ['create', 'store', 'edit', 'upate']])->middleware('auth');
Route::resource('projects', 'ProjectController', ['only' => ['index', 'show']]);
Route::get('/project/{id}/add/reward', 'RewardController@create')->name('reward.create')->middleware('auth');
Route::post('/project/{id}/add/reward', 'RewardController@store')->name('reward.store')->middleware('auth');

Route::group(['prefix' => 'admin', 'middleware' => 'admin_auth'], function () {
    Route::get('/', 'AdminController@index')->name('admin.index');//ボタンページ
    Route::get('/projects', 'AdminController@projects')->name('admin.projects_release');//公開中のプロジェクト一覧
    Route::get('/projects/request', 'AdminController@request_projects')->name('admin.projects_request');//申請中のプロジェクト一覧
    Route::get('/project/request/edit/{id}', 'AdminController@edit')->name('admin.release_project_edit');//プロジェクトの公開・非公開設定+詳細
    Route::post('/project/request/update/{id}', 'AdminController@update')->name('admin.release_project_update');//プロジェクトの公開・非公開設定保存
});
