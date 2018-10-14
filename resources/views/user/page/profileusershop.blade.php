@extends('user/master')
@section('head')
<link rel="stylesheet" type="text/css" href="source/user/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/shop_responsive.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/shop_styles.css">

<link rel="stylesheet" type="text/css" href="source/user/styles/css/header_css.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/profileshop.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/check-cart.css">

<link rel="stylesheet" type="text/css" href="source/user/styles/css/index.css">
<style>
    @media (min-width: 1023px){
.modal-lg {
    max-width: 1024px;
}
}
</style>

@endsection

@section('content')




<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="home">
                <div class="home_background " style="background: #12c2e9;background: -webkit-linear-gradient(to right, #f64f59, #c471ed, #12c2e9);background: linear-gradient(to right, #f64f59, #c471ed, #12c2e9); "></div>
                <div class="home_overlay"></div>
                <div class="home_content d-flex flex-column align-items-left justify-content-center">
                    <div class="text-center"></div>
                </div>
            </div>
            <div class="space20">&nbsp;</div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
            <a href="javascript:void(0)" style="text-decoration: none;color: #000" onclick="openCity(event, 'sanpham');">
                <div class=" tablink bottombar w3-padding border-red text-center">Danh sách yêu thích(4)</div>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
            <a href="javascript:void(0)" style="text-decoration: none;color: #000" onclick="openCity(event, 'hoso');">
                <div class=" tablink bottombar w3-padding text-center">Gian hàng đã theo dõi</div>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
            <a href="javascript:void(0)" style="text-decoration: none;color: #000" onclick="window.location='{{ route('profile-user',Session::get('keyuser')['_id'] )}}';">
                <div class=" tablink  w3-padding border-red text-center">Thông tin cá nhân</div>
            </a>
        </div>
        <div class="col-lg-12">
            <div id="sanpham" class="tabcontent" style="display: block;">
                <div class="characteristics">

                    <div class="order">
                        <div class="order-info">SEICOO STORE</div>
                        <div class="order-item">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="item-pic"><img src="source/user/images/new_5.jpg" alt=""> </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="item-main item-main-mini">
                                        <div>
                                            <div class="text title item-title">Chuột quang
                                                KHÔNG DÂY Logitech M331 - HÃNG PHÂN PHỐI CHÍNH THỨC</div>
                                            <p class="text desc"></p>
                                            <p class="text desc bold"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="item-quantity">
                                        <div class="price"><span><span class="currPrice">618.652.000đ</span></span>
                                            <div class="originPrice">
                                                <span class="origin-price-value">772.350₫</span> <span class="promotion">-20%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="item-status item-capsule">
                                        <div class="price">
                                            <button type="button" class="btn btn-outline-warning btn-save" style="width: 125px;font-size: 14px">Thêm
                                                vào giỏ</button>
                                            <div style="margin-bottom: 10px "></div>
                                            <button type="button" class="btn btn-outline-danger " style="width: 125px;font-size: 14px">Xóa</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="space10">&nbsp;</div>
                    <div class="order">
                        <div class="order-info">SEICOO STORE</div>
                        <div class="order-item">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="item-pic"><img src="source/user/images/new_5.jpg" alt=""> </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="item-main item-main-mini">
                                        <div>
                                            <div class="text title item-title">Chuột quang
                                                KHÔNG DÂY Logitech M331 - HÃNG PHÂN PHỐI CHÍNH THỨC</div>
                                            <p class="text desc"></p>
                                            <p class="text desc bold"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="item-quantity">
                                        <div class="price"><span><span class="currPrice">618.652.000đ</span></span>
                                            {{-- <div class="originPrice">
                                                <span class="origin-price-value">772.350₫</span> <span class="promotion">-20%</span>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="item-status item-capsule">
                                        <div class="price">
                                            <button type="button" class="btn btn-outline-warning btn-save" style="width: 125px;font-size: 14px">Thêm
                                                vào giỏ</button>
                                            <div style="margin-bottom: 10px "></div>
                                            <button type="button" class="btn btn-outline-danger " style="width: 125px;font-size: 14px">Xóa</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div id="hoso" class="tabcontent" style="display:none">
                <div class="characteristics">

                    <div class="order">
                        <div class="order-info">
                            <div class="row">
                                <div class="col-lg-6 text-left">SEICOO STORE</div>
                                <div class="col-lg-6 text-right" style="font-size: 12px;">
                                    ĐANG THEO DÕI <span>|</span> <a href="profileshop">THAM QUAN</a>
                                </div>
                            </div>
                        </div>
                        <div class="order-item">
                            <div class="row">
                                <div class="col-lg-2">
                                    <!-- Product Item -->
                                    <div class="product_item is_new product-shop">
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img
                                                src="source/user/images/new_5.jpg" alt=""></div>
                                        <div class="product_content">
                                            <div class="product_price">$2250</div>
                                            <div class="product_name">
                                                <div><a href="#" tabindex="0">Philips BT6900A</a></div>
                                            </div>
                                        </div>
                                        <ul class="product_marks">
                                            <li class="product_mark product_discount">-25%</li>
                                            <li class="product_mark product_new">new</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <!-- Product Item -->
                                    <div class="product_item discount product-shop">
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img
                                                src="source/user/images/featured_1.png" alt=""></div>
                                        <div class="product_content">
                                            <div class="product_price">$225<span>$300</span></div>
                                            <div class="product_name text-type-product">
                                                <div><a href="#" tabindex="0" class="text-type-product">Huawei MediaPad
                                                        Huawei MediaPad Huawei MediaPad </a></div>
                                            </div>
                                        </div>
                                        <ul class="product_marks">
                                            <li class="product_mark product_discount">-25%</li>
                                            <li class="product_mark product_new">new</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <!-- Product Item -->
                                    <div class="product_item product-shop">
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img
                                                src="source/user/images/featured_1.png" alt=""></div>
                                        <div class="product_content">
                                            <div class="product_price">$225<span>$300</span></div>
                                            <div class="product_name">
                                                <div><a href="#" tabindex="0">Huawei MediaPad...</a></div>
                                            </div>
                                        </div>
                                        <ul class="product_marks">
                                            <li class="product_mark product_discount">-25%</li>
                                            <li class="product_mark product_new">new</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <!-- Product Item -->
                                    <div class="product_item product-shop">
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img
                                                src="source/user/images/featured_1.png" alt=""></div>
                                        <div class="product_content">
                                            <div class="product_price">$225<span>$300</span></div>
                                            <div class="product_name">
                                                <div><a href="#" tabindex="0">Huawei MediaPad...</a></div>
                                            </div>
                                        </div>
                                        <ul class="product_marks">
                                            <li class="product_mark product_discount">-25%</li>
                                            <li class="product_mark product_new">new</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <!-- Product Item -->
                                    <div class="product_item product-shop">
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img
                                                src="source/user/images/featured_1.png" alt=""></div>
                                        <div class="product_content">
                                            <div class="product_price">$225<span>$300</span></div>
                                            <div class="product_name">
                                                <div><a href="#" tabindex="0">Huawei MediaPad...</a></div>
                                            </div>
                                        </div>
                                        <ul class="product_marks">
                                            <li class="product_mark product_discount">-25%</li>
                                            <li class="product_mark product_new">new</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <!-- Product Item -->
                                    <div class="product_item product-shop">
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img
                                                src="source/user/images/featured_1.png" alt=""></div>
                                        <div class="product_content">
                                            <div class="product_price">$225<span>$300</span></div>
                                            <div class="product_name">
                                                <div><a href="#" tabindex="0">Huawei MediaPad...</a></div>
                                            </div>
                                        </div>
                                        <ul class="product_marks">
                                            <li class="product_mark product_discount">-25%</li>
                                            <li class="product_mark product_new">new</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space10">&nbsp;</div>
                    <div class="order">
                            <div class="order-info">
                                <div class="row">
                                    <div class="col-lg-6 text-left">SEICOO STORE</div>
                                    <div class="col-lg-6 text-right" style="font-size: 12px;">
                                        ĐANG THEO DÕI <span>|</span> <a href="profileshop">THAM QUAN</a>
                                    </div>
                                </div>
                            </div>
                            <div class="order-item">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <!-- Product Item -->
                                        <div class="product_item is_new product-shop">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img
                                                    src="source/user/images/new_5.jpg" alt=""></div>
                                            <div class="product_content">
                                                <div class="product_price">$2250</div>
                                                <div class="product_name">
                                                    <div><a href="#" tabindex="0">Philips BT6900A</a></div>
                                                </div>
                                            </div>
                                            <ul class="product_marks">
                                                <li class="product_mark product_discount">-25%</li>
                                                <li class="product_mark product_new">new</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <!-- Product Item -->
                                        <div class="product_item discount product-shop">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img
                                                    src="source/user/images/featured_1.png" alt=""></div>
                                            <div class="product_content">
                                                <div class="product_price">$225<span>$300</span></div>
                                                <div class="product_name text-type-product">
                                                    <div><a href="#" tabindex="0" class="text-type-product">Huawei MediaPad
                                                            Huawei MediaPad Huawei MediaPad </a></div>
                                                </div>
                                            </div>
                                            <ul class="product_marks">
                                                <li class="product_mark product_discount">-25%</li>
                                                <li class="product_mark product_new">new</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <!-- Product Item -->
                                        <div class="product_item product-shop">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img
                                                    src="source/user/images/featured_1.png" alt=""></div>
                                            <div class="product_content">
                                                <div class="product_price">$225<span>$300</span></div>
                                                <div class="product_name">
                                                    <div><a href="#" tabindex="0">Huawei MediaPad...</a></div>
                                                </div>
                                            </div>
                                            <ul class="product_marks">
                                                <li class="product_mark product_discount">-25%</li>
                                                <li class="product_mark product_new">new</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <!-- Product Item -->
                                        <div class="product_item product-shop">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img
                                                    src="source/user/images/featured_1.png" alt=""></div>
                                            <div class="product_content">
                                                <div class="product_price">$225<span>$300</span></div>
                                                <div class="product_name">
                                                    <div><a href="#" tabindex="0">Huawei MediaPad...</a></div>
                                                </div>
                                            </div>
                                            <ul class="product_marks">
                                                <li class="product_mark product_discount">-25%</li>
                                                <li class="product_mark product_new">new</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <!-- Product Item -->
                                        <div class="product_item product-shop">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img
                                                    src="source/user/images/featured_1.png" alt=""></div>
                                            <div class="product_content">
                                                <div class="product_price">$225<span>$300</span></div>
                                                <div class="product_name">
                                                    <div><a href="#" tabindex="0">Huawei MediaPad...</a></div>
                                                </div>
                                            </div>
                                            <ul class="product_marks">
                                                <li class="product_mark product_discount">-25%</li>
                                                <li class="product_mark product_new">new</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <!-- Product Item -->
                                        <div class="product_item product-shop">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img
                                                    src="source/user/images/featured_1.png" alt=""></div>
                                            <div class="product_content">
                                                <div class="product_price">$225<span>$300</span></div>
                                                <div class="product_name">
                                                    <div><a href="#" tabindex="0">Huawei MediaPad...</a></div>
                                                </div>
                                            </div>
                                            <ul class="product_marks">
                                                <li class="product_mark product_discount">-25%</li>
                                                <li class="product_mark product_new">new</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space10">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recently Viewed -->
<div class="viewed">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="viewed_title_container">
                    <h3 class="viewed_title">Sản phẩm đã xem</h3>
                    <div class="viewed_nav_container">
                        <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>
                <div class="viewed_slider_container">
                    <!-- Recently Viewed Slider -->
                    <div class="owl-carousel owl-theme viewed_slider">
                       
                        <!-- Recently Viewed Item -->
                        <div class="owl-item">
                            <div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image"><img src="https://phongvu.vn/media/catalog/product/cache/23/small_image/200x200/9df78eab33525d08d6e5fb8d27136e95/o/-/o-cung-hdd-1tb-wd-wd10ezex-5.jpg" width="115" height="115" alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">990.000 ₫</div>
                                    <div class="viewed_name"><a href="#">Ổ cứng HDD WD 1TB WD10EZEX Sata 3 (Xanh)</a></div>
                                </div>
                                <ul class="item_marks">
                                    <li class="item_mark item_discount">-25%</li>
                                    <li class="item_mark item_new">new</li>
                                </ul>
                            </div>
                        </div>
                        <!-- Recently Viewed Item -->
                        <div class="owl-item">
                                <div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image"><img src="https://phongvu.vn/media/catalog/product/cache/23/small_image/200x200/9df78eab33525d08d6e5fb8d27136e95/o/-/o-cung-hdd-1tb-wd-wd10ezex-5.jpg" width="115" height="115" alt=""></div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price">990.000 ₫</div>
                                        <div class="viewed_name"><a href="#">Ổ cứng HDD WD 1TB WD10EZEX Sata 3 (Xanh)</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>
                             <!-- Recently Viewed Item -->
                        <div class="owl-item">
                                <div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image"><img src="https://phongvu.vn/media/catalog/product/cache/23/small_image/200x200/9df78eab33525d08d6e5fb8d27136e95/o/-/o-cung-hdd-1tb-wd-wd10ezex-5.jpg" width="115" height="115" alt=""></div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price">990.000 ₫</div>
                                        <div class="viewed_name"><a href="#">Ổ cứng HDD WD 1TB WD10EZEX Sata 3 (Xanh)</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>
                             <!-- Recently Viewed Item -->
                        <div class="owl-item">
                                <div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image"><img src="https://phongvu.vn/media/catalog/product/cache/23/small_image/200x200/9df78eab33525d08d6e5fb8d27136e95/o/-/o-cung-hdd-1tb-wd-wd10ezex-5.jpg" width="115" height="115" alt=""></div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price">990.000 ₫</div>
                                        <div class="viewed_name"><a href="#">Ổ cứng HDD WD 1TB WD10EZEX Sata 3 (Xanh)</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>
                             <!-- Recently Viewed Item -->
                        <div class="owl-item">
                                <div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image"><img src="https://phongvu.vn/media/catalog/product/cache/23/small_image/200x200/9df78eab33525d08d6e5fb8d27136e95/o/-/o-cung-hdd-1tb-wd-wd10ezex-5.jpg" width="115" height="115" alt=""></div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price">990.000 ₫</div>
                                        <div class="viewed_name"><a href="#">Ổ cứng HDD WD 1TB WD10EZEX Sata 3 (Xanh)</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>
                             <!-- Recently Viewed Item -->
                        <div class="owl-item">
                                <div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image"><img src="https://phongvu.vn/media/catalog/product/cache/23/small_image/200x200/9df78eab33525d08d6e5fb8d27136e95/o/-/o-cung-hdd-1tb-wd-wd10ezex-5.jpg" width="115" height="115" alt=""></div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price">990.000 ₫</div>
                                        <div class="viewed_name"><a href="#">Ổ cứng HDD WD 1TB WD10EZEX Sata 3 (Xanh)</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Brands -->
<div class="brands">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="brands_slider_container">
                    <!-- Brands Slider -->
                    <div class="owl-carousel owl-theme brands_slider">
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/logo_intel.png"
                                    style="width: 140px; height: 70px;" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/logo_amd.png"
                                    style="width: 160px; height: 200px;" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/logo_msi.png"
                                    style="width: 150px; height: 45px;" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/logo_asus.png"
                                    style="width: 150px; height: 45px;" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/logo_gigabyte.jpg"
                                    style="width: 180px; height: 70px;" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/razer-logo.png"
                                    style="width: 180px; height: 225px;" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/logo_corsair.png"
                                    style="width: 250px; height: 100px;" alt=""></div>
                        </div>
                    </div>
                    <!-- Brands Slider Navigation -->
                    <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection


@section('footer')
<script src="source/user/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="source/user/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="source/user/plugins/parallax-js-master/parallax.min.js"></script>
<script src="source/user/styles/js/datacontry.js"></script>
<script src="source/user/js/shop_custom.js"></script>
<script src="source/user/styles/js/register.js"></script>
<script>
    function openCity(evt, cityName) {
        var i, x, tablinks;
        x = document.getElementsByClassName("tabcontent");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < x.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" border-red", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.firstElementChild.className += " border-red";
    }

</script>
<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active1");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }

</script>

@endsection
