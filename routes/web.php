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

Route::get('/', function () { 
    return view('welcome');
});

Auth::routes();

Route::get('/','HomeController@index');
Route::get('/home','HomeController@index');


Route::post('admin/matches/hidden/{id}/public', 'HiddenMatchController@publicMatch')->name('hidden.public');

Route::resource('admin/matches/public','PublicMatchController', ['except' => [
    'create'
]]);

Route::resource('admin/matches/hidden','HiddenMatchController', ['except' => [
    'show'
]]);


Route::get('/betting',['UserController@showListMatch'])->name('user.betting');
