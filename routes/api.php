<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//login routes
Route::post('/login','AuthController@login');

//register
Route::post('/register','AuthController@register');

//forgot password
Route::post('/forgot_password','Api\AuthController@forgotPassword');


//reset password
Route::post('/reset_password','Api\AuthController@resetPassword');

//get user
Route::get('/user','UserController@getUser')->middleware('auth:api');

//person
Route::get('/person','PeopleController@getAllPerson');
Route::post('/store_person','PeopleController@storePerson');
Route::get('/edit_person/{id}','PeopleController@editPerson');
Route::post('/update_person/{id}','PeopleController@updatePerson');
Route::delete('/delete_person/{id}','PeopleController@deletePerson');


//category
Route::get('/categories','Api\CategoryController@allCategory');

//product
Route::get('/products','Api\ProductController@allProducts');
Route::get('/product/{id}','Api\ProductController@singleProduct');

//whishlist
Route::post('add_wishlist/{id}', 'Api\ProductController@addWishlist')->middleware('auth:api');

//cart
Route::post('/add_cart/{id}','Api\CartController@addToCart')->middleware('auth:api');
Route::post('/remove_cart/{id}','Api\CartController@removeCart')->middleware('auth:api');
Route::post('/cart_flash','Api\CartController@flashCart')->middleware('auth:api');
Route::get('/cart_get', 'Api\CartController@getCarts')->middleware('auth:api');

//orders
Route::get('/my_cart', 'Api\OrderController@myCart')->middleware('auth:api');
