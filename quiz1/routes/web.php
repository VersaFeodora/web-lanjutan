<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

$controller_path = 'App\Http\Controllers';

// Main Page Route
Route::get('/', $controller_path . '\dashboard\Analytics@index')->name('dashboard-analytics');

// pages
Route::get('/account', $controller_path . '\pages\AccountSettingsAccount@index')->name('account');
Route::post('/account', $controller_path . '\pages\AccountSettingsAccount@actionupdate')->name('update-acc');
Route::get('/account/deactivate', $controller_path . '\pages\AccountSettingsAccount@deactivate')->name('del-acc');

// authentication
Route::get('/auth/login-basic', $controller_path . '\authentications\LoginBasic@index')->name('auth-login-basic');
Route::get('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@index')->name('auth-register-basic');
Route::get('/auth/forgot-password-basic', $controller_path . '\authentications\ForgotPasswordBasic@index')->name('auth-reset-password-basic');

// tables
Route::get('/order', $controller_path . '\tables\transactiontblController@index')->name('transaction-tbl');
Route::get('/order/download/{id}', $controller_path . '\tables\transactiontblController@createPDF')->name('pdf-products');

// products
Route::get('/products', $controller_path . '\ProductController@index')->name('products');
Route::get('/products/delete/{id}', $controller_path . '\ProductController@delete')->name('delete-products');
Route::get('/products/category/{cat}', $controller_path . '\ProductController@filter')->name('products-category');
Route::post('/products', $controller_path . '\ProductController@search')->name('search-products');
Route::post('/products/category/{cat}', $controller_path . '\ProductController@search')->name('search-products');
Route::get('/products/add', $controller_path . '\ProductController@addPage')->name('add-products');
Route::post('/products/add', $controller_path . '\ProductController@create')->name('actionadd-products');
Route::get('/products/edit/{id}', $controller_path . '\ProductController@editPage')->name('edit-products');
Route::post('/products/edit/{id}', $controller_path . '\ProductController@update')->name('actionedit-products');
//cust side
Route::get('/products/addToCart/{id}', $controller_path . '\ProductController@addCartPage')->name('add-to-cart');
Route::post('/products/addToCart/{id}', $controller_path . '\ProductController@addCart')->name('actionadd-cart');

Route::get('/login', $controller_path . '\UserController@index')->name('login');
Route::post('actionlogin', $controller_path . '\UserController@actionlogin')->name('action-login');
Route::get('/register', $controller_path . '\UserController@register')->name('register');
Route::post('actionregister', $controller_path . '\UserController@actionregister')->name('action-register');
Route::get('logout', $controller_path . '\UserController@logout')->name('logout');