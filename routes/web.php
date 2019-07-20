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
use Illuminate\Http\Request;
use App\Product;

// Landing Page
Route::get('/', function () {
    return view('welcome');
});

// Users Routes 
Auth::routes();

// set to send verify link
// Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout')->middleware('auth');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout')->middleware('auth');

// ProductsConstroller
Route::get('/home/products/', 'ProductsController@products')->name('products')->middleware('auth');
Route::get('/home/product/{product}', 'ProductsController@single_product')->name('single.product')->middleware('auth');

// Cash On Delivery
Route::get('/home/products/{product}/cod', 'ProductsController@order_cod')->name('order.cod')->middleware('auth');
Route::post('/home/products/{product}/cod', 'ProductsController@product_cod')->name('product.cod')->middleware('auth');

// Paypal Routes
Route::get('/home/products/paypal/{product}', 'PaypalController@index')->name('paypal');
Route::post('/home/products/paypal/checkout', 'PaypalController@createPayment')->name('create-paypal');
Route::get('/home/products/paypal/confirm', 'PaypalController@confirmPayment')->name('confirm-paypal');

// Pay On Bank
Route::get('/home/product/{create}/bank', 'ProductsController@order_bank')->name('order.bank')->middleware('auth');
Route::post('/home/product/{product}/bank', 'ProductsController@product_bank')->name('product.bank')->middleware('auth');

Route::get('/home/product/show/{id}', 'ProductsController@summary')->name('summary')->middleware('auth');
Route::get('/home/products/show/orders', 'ProductsController@myorders')->name('myorders')->middleware('auth');

// Pay On Bank
Route::get('/home/payonbank/', 'ProductsController@payonbank')->name('payonbank');
// Route::get('/home/product/show/{id}/edit', 'ProductsController@edit_summary')->name('edit.summary');
// Route::patch('/home/product/show/{id}', 'ProductsController@update_summary')->name('update.summary');

// Administrator Routes 
Route::prefix('admin')->group(function(){
		Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.form');
		Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login');
		Route::get('/', 'AdminController@index')->name('admin.dashboard');
		Route::get('/logout', 'Auth\AdminLoginController@adminLogout')->name('admin.logout');

		// Dashboard Routes
		Route::get('products', 'AdProductsController@products')->name('admin.products')->middleware('auth:admin');
		Route::get('products/create', 'AdProductsController@create')->name('admin.products.create')->middleware('auth:admin');
		Route::post('products', 'AdProductsController@store')->name('admin.products.store')->middleware('auth:admin');
		Route::get('products/{product}', 'AdProductsController@show')->name('admin.products.show')->middleware('auth:admin');
		Route::get('products/{product}/edit', 'AdProductsController@edit')->name('admin.products.edit')->middleware('auth:admin');
		Route::put('products/{product}', 'AdProductsController@update')->name('admin.products.update')->middleware('auth:admin');
		Route::delete('products/{product}', 'AdProductsController@destroy')->name('admin.products.delete')->middleware('auth:admin');
		
		// Users Routes
		Route::get('users','AdUsersController@index')->name('admin.users')->middleware('auth:admin');
		Route::get('pending','AdUsersController@pending')->name('admin.users.pending')->middleware('auth:admin');	

		// Products Import and Export Routes
		Route::post('products/import', 'ImportExportController@import')->name('admin.products.import')->middleware('auth:admin');
		Route::get('product/export', 'ImportExportController@export')->name('admin.products.export')->middleware('auth:admin'); 
});

