<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home',function(){
	return view('backend.home');
});

//category
Route::get('/categories','CategoryController@categories');
Route::post('/categories/add','CategoryController@categoriesAdd');

//products
Route::get('/products','ProductController@allProduct');
Route::post('/add/product','ProductController@addProduct');
Route::get('/update/product','ProductController@updateProduct');
