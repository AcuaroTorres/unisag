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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'rrhh', 'as' => 'rrhh.'], function(){
	Route::resource('users','rrhh\UsersController');

	Route::get('users/{id}/password', 'rrhh\UsersController@changePassword')->name('users.password');
	Route::post('users/{id}/password','rrhh\UsersController@updatePassword')->name('users.password');

	Route::get('users/{id}/roles', 'rrhh\RolesController@index')->name('roles.index');
	Route::post('users/{id}/roles','rrhh\RolesController@attach')->name('roles.index');
});