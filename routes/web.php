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


Route::get('/', 'HomeController@index')->name('admin.home');
Route::group(['namespace'=>'Admin'], function(){
	Route::get('admin/dashboard', 'DashboardController@index')->name('admin.dashboard');
	Route::get('admin/user/', 'UserController@index')->name('admin.user.show');
	// for user list, update, delete,edit, view routing
	Route::get('admin/user/create', 'UserController@create')->name('admin.user.create');
	Route::get('admin/user/view', 'UserController@view')->name('admin.user.list');
	Route::get('admin/user/show/{id}', 'UserController@show')->name('admin.user.show');
	Route::get('admin/user/edit/{id}', 'UserController@edit')->name('admin.user.edit');
	Route::post('admin/user/store', 'UserController@store')->name('admin.user.store');
	Route::post('admin/user/update/{id}', 'UserController@update')->name('admin.user.update');
	// for role list, update, delete,edit, view routing
	//Route::get('admin/user/rolelist', 'UserController@rolelist')->name('admin.user.rolelist');
	Route::get('admin/role/create', 'RoleController@create')->name('admin.role.create');
	Route::get('admin/role/view', 'RoleController@view')->name('admin.role.list');
	Route::get('admin/role/show/{id}', 'RoleController@show')->name('admin.role.show');
	Route::get('admin/role/edit/{id}', 'RoleController@edit')->name('admin.role.edit');
	Route::post('admin/role/store', 'RoleController@store')->name('admin.role.store');
	Route::post('admin/role/update/{id}', 'RoleController@update')->name('admin.role.update');
	// for permissions list, update, delete,edit, view routing
	Route::get('admin/permission/create', 'PermissionController@create')->name('admin.permission.create');
	Route::get('admin/permission/view', 'PermissionController@view')->name('admin.permission.list');
	Route::get('admin/permission/show/{id}', 'PermissionController@show')->name('admin.permission.show');
	Route::get('admin/permission/edit/{id}', 'PermissionController@edit')->name('admin.permission.edit');
	Route::post('admin/permission/store', 'PermissionController@store')->name('admin.permission.store');
	Route::post('admin/permission/update/{id}', 'PermissionController@update')->name('admin.permission.update');
	
	// for permissions list, update, delete,edit, view routing
	Route::get('admin/institute/create', 'InstituteController@create')->name('admin.institute.create');
	Route::get('admin/institute/view', 'InstituteController@view')->name('admin.institute.list');
	Route::get('admin/institute/show/{id}', 'InstituteController@show')->name('admin.institute.show');
	Route::get('admin/institute/edit/{id}', 'InstituteController@edit')->name('admin.institute.edit');
	Route::post('admin/institute/store', 'InstituteController@store')->name('admin.institute.store');
	Route::post('admin/institute/update/{id}', 'InstituteController@update')->name('admin.institute.update');
	
	// for profile routing
	Route::get('admin/dashboard/profile', 'DashboardController@profile')->name('admin.dashboard.profile');
	Route::post('admin/dashboard/profileUpdate/{id}', 'dashboardController@profileUpdate')->name('admin.dashboard.profileUpdate');
	
	// for assign role routing
	Route::post('admin/user/assignRole', 'UserController@assignRole')->name('admin.user.assignRole');
	
	// for assign Permission routing
	Route::post('admin/role/assignPermission', 'RoleController@assignPermission')->name('admin.role.assignPermission');
	
	
	
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



