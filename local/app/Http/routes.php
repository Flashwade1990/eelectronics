<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::get('/', 'BaseController@index');
Route::post('/', 'BaseController@mail');
Route::get('/home', 'DashboardController@index');
Route::get('/adminka', 'DashboardController@index');
Route::get('/catalog', 'BaseController@catalog');
Route::get('/catalog/{id}', 'BaseController@onecat');
Route::get('/catalog/{id}/{id2}', 'BaseController@single');
Route::get('/catalog/{id}/{id2}/review', 'BaseController@review');
Route::post('/catalog/{id}/{id2}/review', 'BaseController@review');
Route::get('/cart', 'CartController@index');
Route::post('/cart', 'CartController@add');
Route::get('/contacts', 'BaseController@contacts');
Route::get('/search', 'BaseController@getSearch');
Route::post('/cart/count', 'CartController@count');
Route::get('/cart/count', 'CartController@count');
Route::post('cart/prep', 'CartController@prep');
Route::get('/currency/{id}', 'CartController@currency');
Route::get('/cart/delete/{id?}', 'CartController@delete');

Entrust::routeNeedsRole('users*', 'admin');
Route::get('/users', 'UsersController@index');
Route::get('/users/edit/{id?}', 'UsersController@edit');
Route::post('/users', 'UsersController@store');
Route::post('/users/destroy', 'UsersController@destroy');

//Products actions
Route::get('/products', 'ProductsController@index');
Route::get('/products/edit/{id?}', 'ProductsController@edit');
Route::post('/products', 'ProductsController@store');
Route::post('/products/destroy', 'ProductsController@destroy');

//Categories actions
Route::get('/categories', 'CategoriesController@index');
Route::get('/categories/edit/{id?}', 'CategoriesController@edit');
Route::post('/categories', 'CategoriesController@store');
Route::post('/categories/destroy', 'CategoriesController@destroy');


//Orders actions
Route::get('/orders', 'OrdersController@index');
Route::post('/orders/destroy', 'OrdersController@destroy');
Route::get('/adminka/orders/old/{id}', 'OrdersController@changeMethod');
Route::get('/adminka/orders/new/{id}', 'OrdersController@changeMethod');
Route::get('/adminka/orders/old', 'OrdersController@view');


//Account actions
Route::get('/account', 'AccountsController@index');
Route::get('/account/wishlist', 'AccountsController@wishlist');
Route::get('/account/wishlist/{id}', 'AccountsController@add');
Route::get('/account/wishlist/delete/{id?}', 'AccountsController@delete');

Route::controller('/account', 'AccountsController');
Route::controller('adminka/categories', 'CategoriesController');
Route::controller('adminka/products', 'ProductsController');
Route::controller('adminka/orders', 'OrdersController');


