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

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

/*Route::prefix('user')->group(function(){
    Route::get('account', 'UserController@account')->name('userAccount');
});*/

Route::get('myAccount', 'UserController@myAccount')->name('myAccount');

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('/', 'PublicController@index')->name('index');

Route::get('about', 'PublicController@about')->name('about');
Route::get('contact', 'PublicController@contact')->name('contact');
Route::post('contact', 'PublicController@contactPost')->name('contactPost');

Route::get('/add_to_cart/{id}', 'ProductController@addToCart')->name('addToCart');
Route::get('/remove_from_cart/{id}', 'ProductController@removeFromCart')->name('removeFromCart');
Route::get('/shopping_cart', 'ProductController@getCart')->name('shoppingCart');
Route::get('/shopping_cart_actual', 'ProductController@refreshCart')->name('refreshCart');

Route::get('/checkout', 'ProductController@getCheckout')->name('checkout');
Route::post('/checkout', 'ProductController@postCheckout')->name('checkout');

Route::get('/products/{category}', 'ProductController@getProducts')->name('getProducts');
Route::get('/product/{product}', 'ProductController@getSingleProduct')->name('getSingleProduct');

Route::get('/searchProduct', 'SearchController@searchProduct')->name('searchProduct');

Route::get('adminDashboard', 'AdminController@adminDashboard')->name('adminDashboard');
Route::get('editUser', 'AdminController@editUser')->name('editUser');
Route::post('editUser', 'AdminController@editUserPost')->name('editUserPost');
Route::post('deleteUser/{id}', 'AdminController@deleteUser')->name('deleteUser');

Route::get('editProduct', 'AdminController@editProduct')->name('editProduct');
Route::post('editProduct', 'AdminController@editProductPost')->name('editProductPost');
Route::post('deleteProduct/{id}', 'AdminController@deleteProduct')->name('deleteProduct');
