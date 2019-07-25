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

// Administrator Routes 
Route::prefix('admin')->group(function(){
		Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.form');
		Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login');
		Route::get('/', 'AdminController@index')->name('admin.dashboard');
		Route::get('/logout', 'Auth\AdminLoginController@adminLogout')->name('admin.logout');

		// Products Routes
		Route::get('products', 'AdProductsController@products')->name('admin.products')->middleware('auth:admin');
		Route::get('products/create', 'AdProductsController@create')->name('admin.products.create')->middleware('auth:admin');
		Route::post('products', 'AdProductsController@store')->name('admin.products.store')->middleware('auth:admin');
		Route::get('products/{product}', 'AdProductsController@show')->name('admin.products.show')->middleware('auth:admin');
		Route::get('products/{product}/edit', 'AdProductsController@edit')->name('admin.products.edit')->middleware('auth:admin');
		Route::put('products/{product}', 'AdProductsController@update')->name('admin.products.update')->middleware('auth:admin');
		Route::delete('products/{product}', 'AdProductsController@destroy')->name('admin.products.delete')->middleware('auth:admin');
		
		// Users Routes
		Route::get('users','AdUsersController@index')->name('admin.users')->middleware('auth:admin');
		Route::get('users/{user}','AdUsersController@user_show')->name('admin.user.show')->middleware('auth:admin');
		Route::get('pending','AdUsersController@pending')->name('admin.users.pending')->middleware('auth:admin');	
		Route::delete('users/{user}','AdUsersController@destroy')->name('admin.users.delete')->middleware('auth:admin');	

		// Order Routes
		Route::get('orders','AdOrdersController@index')->name('admin.order')->middleware('auth:admin');
		Route::put('orders/{order}/','AdOrdersController@update')->name('admin.order.update')->middleware('auth:admin');
		Route::delete('orders/{order}/','AdOrdersController@destroy')->name('admin.order.delete')->middleware('auth:admin');

		// Order Export
		Route::get('orders/export', 'ImportExportController@export_order')->name('admin.order.export')->middleware('auth:admin');
		
		// Products Import and Export Routes
		Route::post('products/import', 'ImportExportController@import')->name('admin.products.import')->middleware('auth:admin');
		Route::get('product/export', 'ImportExportController@export')->name('admin.products.export')->middleware('auth:admin');
});

