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

Route::get('/', function () {
    return view('welcome');
});

// User

Route::get('index', [
    'as'=>'trang-chu',
    'uses'=>'PageController@getIndex'
]);

Route::get('product', [
    'as'=>'san-pham',
    'uses'=>'PageController@getProduct'
]);

Route::get('productlist', [
    'as'=>'danhsach-sanpham',
    'uses'=>'PageController@getProductList'
]);

Route::get('register', [
    'as'=>'dang-ky',
    'uses'=>'PageController@getRegister'
]);

Route::get('login', [
    'as'=>'dang-nhap',
    'uses'=>'PageController@getLogin'
]);

Route::get('profileshop', [
    'as'=>'profileshop',
    'uses'=>'PageController@getProfileShop'
]);

Route::get('cart', [
    'as'=>'cart',
    'uses'=>'PageController@getCart'
]);

Route::get('check-cart', [
    'as'=>'check-cart',
    'uses'=>'PageController@getCheckCart'
]);

Route::get('check-out', [
    'as'=>'check-out',
    'uses'=>'PageController@getCheckOut'
]);

Route::get('profile-user', [
    'as'=>'profile-user',
    'uses'=>'PageController@getProfileUser'
]);



//Admin

Route::get('index-admin', [
    'as'=>'trang-chu-admin',
    'uses'=>'PageController@getIndexAdmin'
]);

Route::get('category-admin', [
    'as'=>'danh-muc-admin',
    'uses'=>'PageController@getCategoryAdmin'   
]);

Route::get('product-admin', [
    'as'=>'san-pham-admin',
    'uses'=>'PageController@getProductAdmin'
]);

Route::get('product-detail-admin', [
    'as'=>'chi-tiet-san-pham-admin',
    'uses'=>'PageController@getProductDetailAdmin'
]);

Route::get('edit-product-detail-admin', [
    'as'=>'sua-chi-tiet-san-pham-admin',
    'uses'=>'PageController@getEditProductDetailAdmin'
]);

Route::get('add-product-detail-admin', [
    'as'=>'them-chi-tiet-san-pham-admin',
    'uses'=>'PageController@getAddProductDetailAdmin'
]);