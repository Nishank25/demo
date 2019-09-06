<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');

Route::group(['middleware' => 'auth.jwt'], function () {
    Route::post('/logout', 'AuthController@logout');

	Route::group(["prefix" => "admin", 'middleware' => ['is_admin']], function (){
		Route::get('/company', 'CompanyController@index');
		Route::post('/company/create', 'CompanyController@create');
	});
	Route::group(['prefix' => 'product'],function(){
		Route::get('get-all', 'ProductController@getAll');
		Route::post('get-product', 'ProductController@productDetails');
		Route::post('create', 'ProductController@create');
		Route::post('edit', 'ProductController@edit');
		Route::post('delete', 'ProductController@delete');
		Route::post('search', 'ProductController@search');
	});
});