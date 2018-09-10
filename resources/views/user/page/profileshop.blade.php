@extends('user/master')
@section('head')
<link rel="stylesheet" type="text/css" href="source/user/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/shop_responsive.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/header_css.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/profileshop.css">
<style type="text/css">
.bar-verygood {
    width: 60%;
    height: 16px;
    background-color: #FFCC40;
}

.bar-good {
    width: 30%;
    height: 16px;
    background-color: #FFCC40;
}

.bar-bad {
    width: 10%;
    height: 16px;
    background-color: #FFCC40;
}
.product_item {
    position: inherit;
    display: table-column;
}

.page-active {
    display: block;
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
                    <div class="home_shop">
                        <div class="char_icon"><img src="source/user/images/icons8-home-page-100.png" style="width: 70px" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">HARA Shop</div>
                            <div class="char_subtitle">903 Lượng theo dõi</div>
                            <div class="char_subtitle">77% Đánh giá tích cực</div>
                        </div>
                        <div class="char_icon" style="margin-left: 20px"><img src="source/user/images/icons8-plus-500.png" style="width: 45px" alt="">
                            <div class="char_subtitle">Theo dõi</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space10">&nbsp;</div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
            <a href="javascript:void(0)" style="text-decoration: none;color: #000" onclick="openCity(event, 'sanpham');">
                <div class=" tablink bottombar w3-padding border-red text-center">Tất cả sản phẩm</div>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
            <a href="javascript:void(0)" style="text-decoration: none;color: #000" onclick="openCity(event, 'hoso');">
                <div class=" tablink bottombar w3-padding text-center">Thông tin gian hàng </div>
            </a>
        </div>
        <div class="col-lg-12">
            <div id="sanpham" class="tabcontent" style="display: block;">
                <div class="shop">
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <!-- Shop Sidebar -->
                            <div class="sidebar_section">
                                <div class="sidebar_title">Danh mục liên quan</div>
                                <ul class="sidebar_categories">
                                    <li><a href="#">Computers & Laptops</a></li>
                                    <li><a href="#">Cameras & Photos</a></li>
                                    <li><a href="#">Hardware</a></li>
                                    <li><a href="#">Smartphones & Tablets</a></li>
                                    <li><a href="#">TV & Audio</a></li>
                                    <li><a href="#">Gadgets</a></li>
                                    <li><a href="#">Car Electronics</a></li>
                                    <li><a href="#">Video Games & Consoles</a></li>
                                    <li><a href="#">Accessories</a></li>
                                </ul>
                            </div>
                            <!--    <div class="sidebar_section filter_by_section">
                                        <div class="sidebar_title">Filter By</div>
                                        <div class="sidebar_subtitle">Price</div>
                                        <div class="filter_price">
                                            <div id="slider-range" class="slider_range"></div>
                                            <p>Range: </p>
                                            <p>
                                                <input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;">
                                            </p>
                                        </div>
                                    </div> -->
                            <hr>
                            <div class="sidebar_section">
                                <div class="sidebar_subtitle brands_subtitle">Giá</div>
                                <ul class="brands_list">
                                    <li class="brand shop_sorting_button1"><a href="">0 ₫ - 10.000.000 ₫</a></li>
                                    <li class="brand shop_sorting_button1"><a href="#">10.000.000 ₫ - 20.000.000 ₫</a></li>
                                    <li class="brand shop_sorting_button1"><a href="#">20.000.000 ₫ - 30.000.000 ₫</a></li>
                                    <li class="brand shop_sorting_button1"><a href="#">30.000.000 ₫ - 40.000.000 ₫</a></li>
                                    <li class="brand shop_sorting_button1"><a href="#">40.000.000 ₫ - 50.000.000 ₫</a></li>
                                    <li class="brand shop_sorting_button1"><a href="#">50.000.000 ₫ - 60.000.000 ₫</a></li>
                                    <li class="brand shop_sorting_button1"><a href="#">60.000.000 ₫ - 70.000.000 ₫</a></li>
                                </ul>
                            </div>
                            <hr>
                            <div class="sidebar_section">
                                <div class="sidebar_subtitle brands_subtitle">Thương hiệu</div>
                                <ul class="brands_list">
                                    <li class="brand"><a href="#">Apple</a></li>
                                    <li class="brand"><a href="#">Beoplay</a></li>
                                    <li class="brand"><a href="#">Google</a></li>
                                    <li class="brand"><a href="#">Meizu</a></li>
                                    <li class="brand"><a href="#">OnePlus</a></li>
                                    <li class="brand"><a href="#">Samsung</a></li>
                                    <li class="brand"><a href="#">Sony</a></li>
                                    <li class="brand"><a href="#">Xiaomi</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <h3 class="viewed_title">HARA Shop</h3>
                            <!-- Shop Content -->
                            <div class="shop_content">
                                <div class="shop_bar clearfix">
                                    <div class="shop_product_count"><span>186</span> products found</div>
                                    <div class="shop_sorting">
                                        <span>Sắp xếp theo:</span>
                                        <ul>
                                            <li>
                                                <span class="sorting_text">Độ phổ biến <i class="fas fa-chevron-down"></span></i>
                                                <ul>
                                                    <li class="shop_sorting_button" data-isotope-option='original-order'>Độ phổ biến</li>
                                                    <li class="shop_sorting_button" data-isotope-option='PriceIncrease'>Giá tăng dần</li>
                                                    <li class="shop_sorting_button" data-isotope-option='PriceReduction'>Giá giảm dần</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_grid">
                                <div class="product_grid_border"></div>
                                <!-- Product Item -->
                                <div class="product_item is_new">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="source/user/images/new_5.jpg" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$2250</div>
                                        <div class="product_name">
                                            <div><a href="#" tabindex="0">Philips BT6900A</a></div>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount">-25%</li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                                <!-- Product Item -->
                                <div class="product_item discount">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="source/user/images/featured_1.png" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$225<span>$300</span></div>
                                        <div class="product_name">
                                            <div><a href="#" tabindex="0">Huawei MediaPad...</a></div>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount">-25%</li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                                <!-- Product Item -->
                                <div class="product_item">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="source/user/images/featured_2.png" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$379</div>
                                        <div class="product_name">
                                            <div><a href="#" tabindex="0">Apple iPod shuffle</a></div>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount">-25%</li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                                <!-- Product Item -->
                                <div class="product_item">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="source/user/images/featured_3.png" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$225</div>
                                        <div class="product_name">
                                            <div><a href="#" tabindex="0">Sony MDRZX310W</a></div>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount">-25%</li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                                <!-- Product Item -->
                                <div class="product_item is_new">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="source/user/images/featured_4.png" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$379</div>
                                        <div class="product_name">
                                            <div><a href="#" tabindex="0">LUNA Smartphone</a></div>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount">-25%</li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                                <!-- Product Item -->
                                <div class="product_item is_new">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="source/user/images/shop_1.jpg" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$3790</div>
                                        <div class="product_name">
                                            <div><a href="#" tabindex="0">Canon IXUS 175...</a></div>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount">-25%</li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                                <!-- Product Item -->
                                <div class="product_item discount">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="source/user/images/featured_5.png" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$379<span>$390</span></div>
                                        <div class="product_name">
                                            <div><a href="#" tabindex="0">Canon STM Kit...</a></div>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount">-25%</li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                                <!-- Product Item -->
                                <div class="product_item">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="source/user/images/featured_6.png" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$225<span>$300</span></div>
                                        <div class="product_name">
                                            <div><a href="#" tabindex="0">Samsung J330F</a></div>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount">-25%</li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                                <!-- Product Item -->
                                <div class="product_item">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="source/user/images/featured_7.png" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$225</div>
                                        <div class="product_name">
                                            <div><a href="#" tabindex="0">Lenovo IdeaPad</a></div>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount">-25%</li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                                <!-- Product Item -->
                                <div class="product_item">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="source/user/images/featured_8.png" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$379</div>
                                        <div class="product_name">
                                            <div><a href="#" tabindex="0">Digitus EDNET...</a></div>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount">-25%</li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                                <!-- Product Item -->
                                <div class="product_item is_new">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="source/user/images/new_1.jpg" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$225</div>
                                        <div class="product_name">
                                            <div><a href="#" tabindex="0">Astro M2 Black</a></div>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount">-25%</li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                                <!-- Product Item -->
                                <div class="product_item is_new">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="source/user/images/new_2.jpg" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$225</div>
                                        <div class="product_name">
                                            <div><a href="#" tabindex="0">Transcend T.Sonic</a></div>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount">-25%</li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                                <!-- Product Item -->
                                <div class="product_item is_new">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="source/user/images/new_3.jpg" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$225</div>
                                        <div class="product_name">
                                            <div><a href="#" tabindex="0">Xiaomi Band 2...</a></div>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount">-25%</li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                                <!-- Product Item -->
                                <div class="product_item is_new">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="source/user/images/new_4.jpg" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$379</div>
                                        <div class="product_name">
                                            <div><a href="#" tabindex="0">Rapoo T8 White</a></div>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount">-25%</li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                                <!-- Product Item -->
                                <div class="product_item discount">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="source/user/images/featured_1.png" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$225<span>$300</span></div>
                                        <div class="product_name">
                                            <div><a href="#" tabindex="0">Huawei MediaPad...</a></div>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount">-25%</li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                                <!-- Product Item -->
                                <div class="product_item is_new">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="source/user/images/new_6.jpg" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$379</div>
                                        <div class="product_name">
                                            <div><a href="#" tabindex="0">Nokia 3310 (2017)</a></div>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount">-25%</li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                                <!-- Product Item -->
                                <div class="product_item is_new">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="source/user/images/new_7.jpg" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$225</div>
                                        <div class="product_name">
                                            <div><a href="#" tabindex="0">Rapoo 7100p Gray</a></div>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount">-25%</li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                                <!-- Product Item -->
                                <div class="product_item is_new">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="source/user/images/new_8.jpg" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$379</div>
                                        <div class="product_name">
                                            <div><a href="#" tabindex="0">Canon EF</a></div>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount">-25%</li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                                <!-- Product Item -->
                                <div class="product_item is_new">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="source/user/images/shop_2.jpg" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$225</div>
                                        <div class="product_name">
                                            <div><a href="#" tabindex="0">Gembird SPK-103</a></div>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount">-25%</li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                                <!-- Product Item -->
                                <div class="product_item is_new">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="source/user/images/featured_5.png" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$379</div>
                                        <div class="product_name">
                                            <div><a href="#" tabindex="0">Canon STM Kit...</a></div>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount">-25%</li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                            </div>
                                <!-- Shop Page Navigation -->
                                <div class="shop_page_nav d-flex flex-row">
                                    <div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>
                                    <ul class="page_nav d-flex flex-row">
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">...</a></li>
                                        <li><a href="#">21</a></li>
                                    </ul>
                                    <div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="hoso" class="tabcontent" style="display:none">
                <div class="characteristics">
                    <div class="row">
                        <!-- Char. Item -->
                        <div class="col-lg-4 col-md-6 char_col">
                            <div class="char_item ">
                                <div class="char_title_top">Địa điểm</div>
                                <div class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="char_icon"><img style="width: 30px;height: 30px" src="source/user/images/icons8-place-marker-100.png" alt=""></div>
                                    <div class="char_content">
                                        <div class="char_title">Thị trấn Mường Ảng, Huyện Mường Ảng, Tỉnh Điện Biên</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Char. Item -->
                        <div class="col-lg-4 col-md-6 char_col">
                            <div class="char_item ">
                                <div class="char_title_top">Danh mục Chính</div>
                                <div class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="char_icon"><img style="width: 30px;height: 30px" src="source/user/images/icons8-categorize-240.png" alt=""></div>
                                    <div class="char_content">
                                        <div class="char_title">Linh kiện máy tính, Case, Màn hình, Cameras</div>
                                        <!-- <div class="char_subtitle">Miễn phí vận chuyển với đơn hàng từ 500.000₫ trở lên</div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Char. Item -->
                        <div class="col-lg-4 col-md-6 char_col">
                            <div class="char_item ">
                                <div class="char_title_top">Thời gian trên CyberZone</div>
                                <div class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="char_icon"><img style="width: 30px;height: 30px" src="source/user/images/icons8-time-128.png" alt=""></div>
                                    <div class="char_content">
                                        <div class="char_title">Khoảng 1 tháng</div>
                                        <!-- <div class="char_subtitle">Miễn phí vận chuyển với đơn hàng từ 500.000₫ trở lên</div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="section-title"> Điểm đánh giá trung bình</div>
                            <div class="rating-overview">
                                <div class="left">
                                    <div class="score">
                                        <label class="average">88%</label>
                                    </div>
                                    <div class="count">
                                        <div class="countText">
                                            Đánh giá tích cực
                                        </div>
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="scoreItem">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="side">
                                                    <div class="tillet">Tốt</div>
                                                </div>
                                                <div class="middle">
                                                    <div class="bar-container">
                                                        <div class="bar-verygood"></div>
                                                    </div>
                                                </div>
                                                <div class="side right">
                                                    <div class="tillet"> 150</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="side">
                                                    <div class="tillet">Trung bình</div>
                                                </div>
                                                <div class="middle">
                                                    <div class="bar-container">
                                                        <div class="bar-good"></div>
                                                    </div>
                                                </div>
                                                <div class="side right">
                                                    <div class="tillet"> 63</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="side">
                                                    <div class="tillet">Chưa tốt</div>
                                                </div>
                                                <div class="middle">
                                                    <div class="bar-container">
                                                        <div class="bar-bad"></div>
                                                    </div>
                                                </div>
                                                <div class="side right">
                                                    <div class="tillet"> 20</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="section-title"> Nhận xét và đánh giá nhà bán hàng (40)</div>
                            <div>
                                <img class="filter__seller-rating" src="source/user/images/icon-verygood.png" width="24" height="24">
                                <img class="filter__seller-rating" src="source/user/images/icon-good.png" width="24" height="24">
                                <img class="filter__seller-rating" src="source/user/images/icon-bad.png" width="24" height="24">
                            </div>
                            <div class="space10">&nbsp;</div>
                            <div class="contact_form_text">
                                <textarea id="contact_form_message" data-autoresize class="text_field contact_form_message" name="message" rows="7" placeholder="Đánh giá..." required="required" data-error="Please, write us a message."></textarea>
                            </div>
                            <div class="space10">&nbsp;</div>
                            <div class="sis-seller-reviews">
                                <div class="seller-review-item">
                                    <div class="row rate"><img class="" src="source/user/images/icon-color-verygood.png" width="24" height="24">&nbsp;&nbsp;<span> Tốt</span></div>
                                    <div class="row">
                                        <label class="comments">Hàng giao rất nhanh, dung lượng thực tế là 29,7G thế là quá ngon cho 1 chiếc thẻ Sandisk chính hãng rồi. Về độ bền thì để thời gian mới biết đc, nhưng mà Sandisk quá nổi tiếng rồi mình có 1 cái 2G mà dùng hơn 5 năm chả hỏng j cả 😄</label>
                                    </div>
                                    <div class="row reviewer">
                                        <label class="itemFooter">An T. - 3 tháng trước</label>
                                    </div>
                                </div>
                                <div class="seller-review-item">
                                    <div class="row rate"><img class="" src="source/user/images/icon-color-good.png" width="24" height="24">&nbsp;&nbsp;<span> Trung bình</span></div>
                                    <div class="row">
                                        <label class="comments">Hàng giao rất nhanh, dung lượng thực tế là 29,7G thế là quá ngon cho 1 chiếc thẻ Sandisk chính hãng rồi. Về độ bền thì để thời gian mới biết đc, nhưng mà Sandisk quá nổi tiếng rồi mình có 1 cái 2G mà dùng hơn 5 năm chả hỏng j cả 😄</label>
                                    </div>
                                    <div class="row reviewer">
                                        <label class="itemFooter">An T. - 3 tháng trước</label>
                                    </div>
                                </div>
                                <div class="seller-review-item">
                                    <div class="row rate"><img class="" src="source/user/images/icon-color-bad.png" width="24" height="24">&nbsp;&nbsp;<span> Chưa tốt</span></div>
                                    <div class="row">
                                        <label class="comments">Hàng giao rất nhanh, dung lượng thực tế là 29,7G thế là quá ngon cho 1 chiếc thẻ Sandisk chính hãng rồi. Về độ bền thì để thời gian mới biết đc, nhưng mà Sandisk quá nổi tiếng rồi mình có 1 cái 2G mà dùng hơn 5 năm chả hỏng j cả 😄</label>
                                    </div>
                                    <div class="row reviewer">
                                        <label class="itemFooter">An T. - 3 tháng trước</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <h3 class="viewed_title">Recently Viewed</h3>
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
                            <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img src="source/user/images/view_1.jpg" alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$225<span>$300</span></div>
                                    <div class="viewed_name"><a href="#">Beoplay H7</a></div>
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
                                <div class="viewed_image"><img src="source/user/images/view_2.jpg" alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$379</div>
                                    <div class="viewed_name"><a href="#">LUNA Smartphone</a></div>
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
                                <div class="viewed_image"><img src="source/user/images/view_3.jpg" alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$225</div>
                                    <div class="viewed_name"><a href="#">Samsung J730F...</a></div>
                                </div>
                                <ul class="item_marks">
                                    <li class="item_mark item_discount">-25%</li>
                                    <li class="item_mark item_new">new</li>
                                </ul>
                            </div>
                        </div>
                        <!-- Recently Viewed Item -->
                        <div class="owl-item">
                            <div class="viewed_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img src="source/user/images/view_4.jpg" alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$379</div>
                                    <div class="viewed_name"><a href="#">Huawei MediaPad...</a></div>
                                </div>
                                <ul class="item_marks">
                                    <li class="item_mark item_discount">-25%</li>
                                    <li class="item_mark item_new">new</li>
                                </ul>
                            </div>
                        </div>
                        <!-- Recently Viewed Item -->
                        <div class="owl-item">
                            <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img src="source/user/images/view_5.jpg" alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$225<span>$300</span></div>
                                    <div class="viewed_name"><a href="#">Sony PS4 Slim</a></div>
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
                                <div class="viewed_image"><img src="source/user/images/view_6.jpg" alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$375</div>
                                    <div class="viewed_name"><a href="#">Speedlink...</a></div>
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
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/logo_intel.png" style="width: 140px; height: 70px;" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/logo_amd.png" style="width: 160px; height: 200px;" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/logo_msi.png" style="width: 150px; height: 45px;" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/logo_asus.png" style="width: 150px; height: 45px;" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/logo_gigabyte.jpg" style="width: 180px; height: 70px;" alt=""></div>
                        </div>
                    <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/razer-logo.png" style="width: 180px; height: 225px;" alt=""></div>
                            </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/logo_corsair.png" style="width: 250px; height: 100px;" alt=""></div>
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
<script src="source/user/js/shop_custom.js"></script>
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
@endsection
 

   
  
