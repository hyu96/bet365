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

/*Route::get('/', 'HomeController@index');*/

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'UserController@index')->name('user.index');

Route::get('/bet/{id}', 'UserController@show')->name('user.showMatch');

Route::post('/bet', 'UserController@store')->name('user.bet.store');

Route::get('/history', 'UserController@showHistory')->name('user.bet.history');

Route::get('/logout', 'Auth\LoginController@logout');

Route::post('admin/matches/hidden/{id}/public', 'HiddenMatchController@publicMatch')->name('hidden.public');

Route::resource('admin/matches/hidden', 'HiddenMatchController', ['except' => [
    'show'
]]);

Route::resource('admin/matches/public', 'PublicMatchController', ['except' => [
    'create'
]]);


