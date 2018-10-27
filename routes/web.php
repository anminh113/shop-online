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

//---
Route::get('addtocart/{id}', [
    'as'=>'gio-hang',
    'uses'=>'PageController@getAddToCart'
]);
Route::post('addtocart', [
    'as'=>'post-gio-hang',
    'uses'=>'PostController@postAddToCart'
]);
//---

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

//---
Route::get('productlist', [
    'as'=>'danhsach-sanpham',
    'uses'=>'PageController@getProductList'
]);

Route::post('productlist', [
    'as'=>'post-danhsach-sanpham',
    'uses'=>'PostController@postProductList'
]);

Route::get('search-producttype-productlist/{id}', [
    'as'=>'post-producttype-danhsach-sanpham',
    'uses'=>'PostController@postProductTypeProductList'
]);

//---

//---
Route::get('register', [
    'as'=>'dang-ky',
    'uses'=>'PageController@getRegister'
]);

Route::post('register', [
    'as'=>'post-dang-ky',
    'uses'=>'PostController@postRegister'
]);
//---

//---
Route::get('login', [
    'as'=>'dang-nhap',
    'uses'=>'PageController@getLogin'
]);

Route::post('login', [
    'as'=>'post-dang-nhap',
    'uses'=>'UserController@postLogin'
]);

//---

Route::get('profileshop/{id}', [
    'as'=>'profileshop',
    'uses'=>'PageController@getProfileShop'
]);

Route::get('cart', [
    'as'=>'cart',
    'uses'=>'PageController@getCart'
]);
//---
Route::get('check-cart', [
    'as'=>'check-cart',
    'uses'=>'PageController@getCheckCart'
]);
Route::post('check-cart', [
    'as'=>'post-check-cart',
    'uses'=>'PostController@postCheckCart'
]);

Route::post('check-deliveryaddress-cart', [
    'as'=>'post-deliveryAddress-check-cart',
    'uses'=>'PostController@postdeliveryAddressCheckCart'
]);
//---
Route::post('wishList', [
    'as'=>'post-wishList',
    'uses'=>'PostController@postwishList'
]);
Route::delete('delete-wishList', [
    'as'=>'delete-wishList',
    'uses'=>'DeleteController@deleteWishList'
]);
Route::post('follow', [
    'as'=>'post-follow',
    'uses'=>'PostController@postFollow'
]);
Route::delete('delete-follow', [
    'as'=>'delete-follow',
    'uses'=>'DeleteController@deleteFollow'
]);
//---
Route::get('check-out/{id}', [
    'as'=>'check-out',
    'uses'=>'PageController@getCheckOut'
]);

Route::post('check-out', [
    'as'=>'post-check-out',
    'uses'=>'PostController@postCheckOut'
]);
//--


//---
Route::get('profile-user/{id}', [
    'as'=>'profile-user',
    'uses'=>'PageController@getProfileUser'
]);

Route::post('post-profile-user', [
    'as'=>'post-profile-user',
    'uses'=>'PostController@postProfileUser'
]);
//---

Route::get('delete-delivery-profile-user/{id}', [
    'as'=>'delete-delivery-profile-user',
    'uses'=>'DeleteController@deleteDeliveryProfileUser'
]);

Route::post('profile-user', [
    'as'=>'post-update-profile-user',
    'uses'=>'PostController@postUpdateProfileUser'
]);

Route::post('delivery-profile-user', [
    'as'=>'post-delivery-profile-user',
    'uses'=>'PostController@postDeliveryProfileUser'
]);

Route::patch('update-profile-user', [
    'as'=>'update-delivery-profile-user',
    'uses'=>'UpdateController@updateDeliveryProfileUser'
]);

Route::patch('update-password-profile-user', [
    'as'=>'update-password-profile-user',
    'uses'=>'UpdateController@updatePasswordProfileUser'
]);
//---

//---
Route::get('profile-user-shop/{id}', [
    'as'=>'profile-user-shop',
    'uses'=>'PageController@getProfileUserShop'
]);

//---

Route::get('register-shop/{id}', [
    'as'=>'register-shop',
    'uses'=>'PageController@getRegisterShop'
]);
Route::post('register-shop', [
    'as'=>'post-register-shop',
    'uses'=>'PostController@postRegisterShop'
]);
//--

Route::get('review-shop/{id}', [
    'as'=>'review-shop',
    'uses'=>'PageController@getReviewShop'
]);
//---
Route::get('write-review-shop/{id}', [
    'as'=>'write-review-shop',
    'uses'=>'PageController@getWriteReviewShop'
]);
Route::post('write-review-shop', [
    'as'=>'post-write-review-shop',
    'uses'=>'PostController@postWriteReviewShop'
]);


//---

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
Route::get('order-admin', [
    'as'=>'order-admin',
    'uses'=>'PageController@getOrderAdmin'
]);

Route::patch('order-admin-update-state', [
    'as'=>'update-state-order-admin',
    'uses'=>'UpdateController@updateOrderAdmin'
]);
//---

Route::get('order-admin-watning', [
    'as'=>'order-admin-watning',
    'uses'=>'PageController@getOrderWatningAdmin'
]);

Route::patch('order-admin-update-watning', [
    'as'=>'update-watning-order-admin',
    'uses'=>'UpdateController@updateOrderAdminWatning'
]);
//---


Route::get('order-admin-shipping', [
    'as'=>'order-admin-shipping',
    'uses'=>'PageController@getOrderShippingAdmin'
]);

Route::patch('order-admin-update-shipping', [
    'as'=>'update-shipping-order-admin',
    'uses'=>'UpdateController@updateOrderAdminShipping'
]);
//---

Route::get('order-admin-done', [
    'as'=>'order-admin-done',
    'uses'=>'PageController@getOrderDoneAdmin'
]);


//---



//Admin hệ thống

Route::get('admin', [
    'as'=>'trang-chu-admin-he-thong',
    'uses'=>'PageController@getAdmin'
]);
Route::post('admin-post', [
    'as'=>'post-trang-chu-admin-he-thong',
    'uses'=>'PostController@postAdmin'
]);
Route::patch('admin-patch', [
    'as'=>'update-trang-chu-admin-he-thong',
    'uses'=>'UpdateController@updateAdmin'
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


Route::get('profile-shop', [
    'as'=>'profile-shop-admin',
    'uses'=>'PageController@getProfileShopAdmin'
]);



