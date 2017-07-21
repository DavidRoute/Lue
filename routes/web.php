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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');



Route::middleware(['auth'])->prefix('admin')->group(function () {
	
	//position
	Route::get('position/list','Position\JobPositionController@index')->name('position_list');
	Route::get('position/add','Position\JobPositionController@add')->name('position_add');
	Route::post('position/add','Position\JobPositionController@store')->name('position_store');

	Route::get('position/edit/{id}','Position\JobPositionController@edit')->name('position_edit');
	Route::post('position/edit/{id}','Position\JobPositionController@update')->name('position_update');

	Route::post('position/delete/{id}','Position\JobPositionController@delete')->name('position_delete');

	//location
	Route::get('location/list','Location\JobLocationController@index')->name('location_list');
	Route::get('location/add','Location\JobLocationController@add')->name('location_add');
	Route::post('location/add','Location\JobLocationController@store')->name('location_store');

	Route::get('location/edit/{id}','Location\JobLocationController@edit')->name('location_edit');
	Route::post('location/edit/{id}','Location\JobLocationController@update')->name('location_update');

	Route::post('location/delete/{id}','Location\JobLocationController@delete')->name('location_delete');


	//user
	Route::get('user/profile','User\UserController@edit_profile')->name('profile');
	Route::post('user/profile','User\UserController@update_profile')->name('profile_update');
	Route::get('user/list','User\UserController@showList')->name('user_list');
	Route::get('user/add','User\UserController@add')->name('add_user');
	Route::post('user/add','User\UserController@store')->name('store_user');
	Route::get('user/edit/{id}','User\UserController@edit')->name('edit_user');
	Route::post('user/edit/{id}','User\UserController@user_update')->name('user_update');
	
	Route::get('user/search/ajax','User\UserController@ajax_search')->name('user_ajax_search');


	Route::get('time-off/apply','Leave\LeaveController@index')->name('apply_timeoff');
	Route::post('time-off/apply','Leave\LeaveController@store')->name('post_timeout');

});