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

Route::get('addtocart/{id}', [
    'as'=>'gio-hang',
    'uses'=>'PageController@getAddToCart'
]);

Route::get('deltocart/{id}', [
    'as'=>'xoa-gio-hang',
    'uses'=>'PageController@getDelToCart'
]);

Route::get('deltocart1/{id}', [
    'as'=>'xoa-mot-gio-hang',
    'uses'=>'PageController@getDelToCart1'
]);

Route::get('index', [
    'as'=>'trang-chu',
    'uses'=>'PageController@getIndex'
]);

Route::get('product/{id}', [
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

Route::get('profile-user-shop', [
    'as'=>'profile-user-shop',
    'uses'=>'PageController@getProfileUserShop'
]);

Route::get('register-shop', [
    'as'=>'register-shop',
    'uses'=>'PageController@getRegisterShop'
]);

Route::get('review-shop', [
    'as'=>'review-shop',
    'uses'=>'PageController@getReviewShop'
]);

Route::get('write-review-shop', [
    'as'=>'write-review-shop',
    'uses'=>'PageController@getWriteReviewShop'
]);

// Đăng nhập admin
Route::get('login-admin', [
    'as'=>'login-admin',
    'uses'=>'PageController@getLoginAdmin'
]);
Route::post('login-admin', [
    'as'=>'post-login-admin',
    'uses'=>'UserController@showProfileAdmin'
]);




//Admin gian hàng

Route::get('index-admin', [
    'as'=>'trang-chu-admin',
    'uses'=>'PageController@getIndexAdmin'
]);

//---
Route::get('category-admin', [
    'as'=>'danh-muc-admin',
    'uses'=>'PageController@getCategoryAdmin'   
]);

Route::post('category-admin', [
    'as'=>'post-danh-muc-admin',
    'uses'=>'PostController@postCategoryAdmin'   
]);

Route::delete('category-admin', [
    'as'=>'delete-danh-muc-admin',
    'uses'=>'DeleteController@deleteCategoryAdmin'   
]);

//---

Route::get('product-admin', [
    'as'=>'san-pham-admin',
    'uses'=>'PageController@getProductAdmin'
]);
Route::post('product-admin', [
    'as'=>'post-san-pham-admin',
    'uses'=>'PostController@postProductAdmin'
]);

Route::get('product-detail-admin/{id}', [
    'as'=>'chi-tiet-san-pham-admin',
    'uses'=>'PageController@getProductDetailAdmin'
]);

//---
Route::get('edit-product-detail-admin/{id}', [
    'as'=>'sua-chi-tiet-san-pham-admin',
    'uses'=>'PageController@getEditProductDetailAdmin'
]);
Route::patch('edit-product-detail-admin', [
    'as'=>'update-sua-chi-tiet-san-pham-admin',
    'uses'=>'UpdateController@updateEditProductDetailAdmin'
]);
//---

//---
Route::get('add-product-detail-admin/{id}', [
    'as'=>'them-chi-tiet-san-pham-admin',
    'uses'=>'PageController@getAddProductDetailAdmin'
]);
Route::post('add-product-detail-admin', [
    'as'=>'post-them-chi-tiet-san-pham-admin',
    'uses'=>'PostController@postAddProductDetailAdmin'
]);
//---

Route::get('review-admin', [
    'as'=>'xem-danh-gia',
    'uses'=>'PageController@getReview'
]);

//---
Route::get('discount-admin', [
    'as'=>'discount-admin',
    'uses'=>'PageController@getDiscount'
]);

Route::post('discount-admin', [
    'as'=>'post-discount-admin',
    'uses'=>'PostController@postDiscount'
]);

Route::post('search-discount-admin', [
    'as'=>'post-tim-kiem-discount-admin',
    'uses'=>'PostController@postSearchDiscount'
]);

Route::post('add-discount-admin', [
    'as'=>'post-add-discount-admin',
    'uses'=>'PostController@postAddDiscount'
]);

Route::post('delete-discount-admin', [
    'as'=>'post-delete-discount-admin',
    'uses'=>'PostController@postDeleteDiscount'
]);

Route::post('search-saleoff-discount-admin', [
    'as'=>'search-saleoff-admin',
    'uses'=>'PostController@postSaleoffAdmin'
]);
//---

//Admin hệ thống

Route::get('admin', [
    'as'=>'trang-chu-admin-he-thong',
    'uses'=>'PageController@getAdmin'
]);

Route::get('category-admin-shop', [
    'as'=>'danh-sach-shop-he-thong',
    'uses'=>'PageController@getCategoryAdminShop'
]);

Route::get('detail-admin-shop', [
    'as'=>'chi-tiet-shop-he-thong',
    'uses'=>'PageController@getDetailAdminShop'
]);

// ---
Route::get('add-category-admin', [
    'as'=>'them-danh-muc-admin',
    'uses'=>'PageController@getAddCategoryAdmin'
]);
Route::post('add-category-admin', [
    'as'=>'post-them-danh-muc-admin',
    'uses'=>'PostController@postAddCategoryAdmin'
]);
Route::delete('add-category-admin/{id}', [
    'as'=>'delete-them-danh-muc-admin',
    'uses'=>'DeleteController@deleteAddCategoryAdmin'
]);
Route::patch('add-category-admin', [
    'as'=>'update-them-danh-muc-admin',
    'uses'=>'UpdateController@updateAddCategoryAdmin'
]);
// ---

// ---
Route::get('add-producttype-admin/{id}', [
    'as'=>'them-loai-admin',
    'uses'=>'PageController@getAddProductTypeAdmin'
]);
Route::post('add-producttype-admin', [
    'as'=>'post-them-loai-admin',
    'uses'=>'PostController@postAddProductTypeAdmin'
]);
Route::delete('add-producttype-admin/{id}', [
    'as'=>'delete-them-loai-admin',
    'uses'=>'DeleteController@deleteAddProductTypeAdmin'
]);
Route::patch('add-producttype-admin', [
    'as'=>'update-them-loai-admin',
    'uses'=>'UpdateController@updateAddProductTypeAdmin'
]);
// ---

// ---
Route::get('add-specification-admin/{id}', [
    'as'=>'them-thong-so-ky-thuat-admin',
    'uses'=>'PageController@getAddSpecificationAdmin'
]);

Route::post('add-specification-admin', [
    'as'=>'post-them-thong-so-ky-thuat-admin',
    'uses'=>'PostController@postAddSpecificationAdmin'
]);
Route::delete('add-specification-admin', [
    'as'=>'delete-them-thong-so-ky-thuat-admin',
    'uses'=>'DeleteController@deleteAddSpecificationAdmin'
]);
Route::patch('add-specification-admin', [
    'as'=>'update-them-thong-so-ky-thuat-admin',
    'uses'=>'UpdateController@updateAddSpecificationAdmin'
]);
// ---



