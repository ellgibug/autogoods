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

Route::get('/', 'FrontPagesController@index')->name('main');

Route::get('level/{level}', 'FrontPagesController@getProductsByLevels')->name('products.list');
Route::get('product/{product}', 'FrontPagesController@getSingleProduct')->name('product.single');

Route::get('home', 'UserController@index')->name('home');
Route::get('getModels', 'UserController@getModels');
Route::get('getModifications', 'UserController@getModifications');

Route::post('cars', 'CarController@store')->name('car.store');
Route::get('cars/{id?}', 'CarController@edit')->name('car.edit');
Route::put('cars/{id?}', 'CarController@update')->name('car.update');
Route::delete('cars/{id?}', 'CarController@destroy')->name('car.destroy');

Route::get('search', 'FrontPagesController@search')->middleware('remove.token')->name('products.search');

Route::any('apicall2', 'FrontPagesController@apiCall2')->name('api.call2');
Route::any('excel', 'FrontPagesController@exProd')->name('ex.prod');



Route::prefix('admin')->group(function () {

    Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::get('categories', 'AdminController@categories')->name('admin.categories');
    Route::post('categories', 'AdminController@add_category')->name('admin.categories.add');

    Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});