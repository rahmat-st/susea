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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth');
Route::put('password/change', 'DashboardController@userChangePassword')->name('user.password')->middleware('auth');
Route::put('/update/user/{id}', 'DashboardController@userUpdate')->name('user.update')->middleware('auth');

// PRODUCT
Route::get('product/{slug}', 'ProductController@index')->name('product.index');
Route::get('create/product', 'ProductController@showAddProduct')->name('product.show')->middleware('auth');
Route::post('create/product', 'ProductController@store')->name('product.create')->middleware('auth');
Route::get('edit/product/{id}', 'ProductController@edit')->name('product.edit')->middleware('auth');
Route::put('update/product/{id}', 'ProductController@update')->name('product.update')->middleware('auth');
Route::delete('delete/product/{id}', 'ProductController@destroy')->name('product.delete')->middleware('auth');

// CATEGORY
Route::get('create/category', 'ProductController@showAddCategory')->name('category.show')->middleware('auth');
Route::post('create/category', 'ProductController@storeCategory')->name('category.store')->middleware('auth');

// ORDER
Route::get('order/{slug}', 'OrderController@create')->middleware('auth');
Route::post('order/{slug}', 'OrderController@store')->middleware('auth')->name('order.store');
Route::get('order/details/{no_order}', 'OrderController@detail')->middleware('auth')->name('order.detail');
Route::get('order/update/{no_order}', 'OrderController@edit')->middleware('auth')->name('order.edit');
Route::put('order/update/{no_order}', 'OrderController@update')->middleware('auth')->name('order.update');

// RATING
Route::post('rating/{id}', 'RatingController@store')->middleware('auth')->name('rating.create');

// SEARCH
Route::get('search', 'ProductController@search');

// Route::get('/md', function() {
//   $password = 'password';
//   echo $password . '<br>';
//   echo md5($password).'<br>';
//   echo password_hash($password, PASSWORD_DEFAULT) . '<br>';
//   echo password_hash($password, PASSWORD_BCRYPT);
// });
