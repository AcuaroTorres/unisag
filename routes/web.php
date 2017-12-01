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
	Route::get('users/{id}/roles', [
		'uses' => 'rrhh\RolesController@index',
		'as'   => 'roles.index'
	]);
	Route::post('users/{id}/roles', [
		'uses' => 'rrhh\RolesController@attach',
		'as'   => 'roles.index'
	]);
});