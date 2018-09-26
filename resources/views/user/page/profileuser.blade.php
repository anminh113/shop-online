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
                <div class=" tablink bottombar w3-padding border-red text-center">Quản lý tài khoản</div>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
            <a href="javascript:void(0)" style="text-decoration: none;color: #000" onclick="openCity(event, 'hoso');">
                <div class=" tablink bottombar w3-padding text-center">Đơn hàng của tôi</div>
            </a>
        </div>
        <div class="col-lg-5 col-md-4 col-sm-6 col-6">
                <a href="javascript:void(0)" style="text-decoration: none;color: #000" onclick="window.location='profile-user-shop';">
                    <div class=" tablink  w3-padding border-red text-center">Sản phẩm yêu thích & Gian hàng đang theo dõi</div>
                </a>
            </div>
        <div class="col-lg-12">
            <div id="sanpham" class="tabcontent" style="display: block;">
                <div class="characteristics">
                    <div class="row">
                        <!-- Char. Item -->
                        <div class="col-lg-6 col-md-6 char_col">
                            <div class="char_item " style="height: 235px;">
                                <div class="char_title_top"><b>Personal Profile </b><span>|</span> <a href=""
                                        data-toggle="modal" data-target="#informationuser">Chỉnh Sửa</a></div>
                                <div class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="char_content">
                                        <div class="char_title" style="padding-bottom: 7px; font-size: 14px">Duy
                                            Huynh</div>
                                        <div class="char_title" style="padding-bottom: 7px; font-size: 14px">anminh113@gmail.com</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Char. Item -->
                        <div class="col-lg-6 col-md-6 char_col">
                            <div class="char_item " style="height: 235px;">
                                <div class="char_title_top"><b>Address Book </b><span>|</span> <a href="" data-toggle="modal"
                                        data-target="#information">Chỉnh Sửa</a></div>
                                <div class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="char_content">
                                        <div class="char_title" style="padding-bottom: 7px; font-size: 14px; color:#878F90">DEFAULT
                                            SHIPPING ADDRESS</div>
                                        <div class="char_title" style="padding-bottom: 7px; font-size: 15px"><b>Huỳnh
                                                Khắc Duy</b> </div>
                                        <div class="char_title" style="padding-bottom: 7px; font-size: 15px">32-34
                                            đường số 3 - khu TĐC - ĐHYD, KV4 - P.An khánh - Q.Ninh kiều</div>
                                        <div class="char_title" style="padding-bottom: 7px; font-size: 15px">Cần
                                            Thơ - Quận Ninh Kiều - Phường An Khánh</div>
                                        <div class="char_title" style="padding-bottom: 7px; font-size: 15px">01697186707</div>

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
                        <div class="accordion order-info">Đơn hàng #206505315631747 <span> |</span> <span>1</span> Sản phẩm</div>
                        
                        <div class="panel order-item">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="item-pic"><img src="source/user/images/new_5.jpg" alt=""> </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="item-main item-main-mini">
                                        <div>
                                            <div class="text title item-title" data-spm="details_title">Chuột quang
                                                KHÔNG DÂY Logitech M331 - HÃNG PHÂN PHỐI CHÍNH THỨC</div>
                                            <p class="text desc"></p>
                                            <p class="text desc bold"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="item-quantity"><span><span class="text desc info multiply">Qty:</span><span
                                                class="text">&nbsp;1</span></span></div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="item-status item-capsule">
                                        <p class="capsule">Đã huỷ đơn</p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="item-info">Đã giao ngày 20 thg 11 2017
                                        <button type="button" class="btn btn-outline-warning btn-save" onclick="window.location='review-shop';" style="width: 100%;font-size: 14px; margin-top: 10px">Viết đánh giá</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space10">&nbsp;</div>
                    <div class="order">
                        <div class="accordion order-info">Đơn hàng #206505315631747 <span> |</span> <span>2</span> Sản phẩm</div>
                        <div class=" panel order-item ">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="item-pic"><img src="source/user/images/new_5.jpg" alt=""> </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="item-main item-main-mini">
                                        <div>
                                            <div class="text title item-title" data-spm="details_title">Chuột quang
                                                KHÔNG DÂY Logitech M331 - HÃNG PHÂN PHỐI CHÍNH THỨC</div>
                                            <p class="text desc"></p>
                                            <p class="text desc bold"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="item-quantity"><span><span class="text desc info multiply">Qty:</span><span
                                                class="text">&nbsp;1</span></span></div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="item-status item-capsule">
                                        <p class="capsule">Đã huỷ đơn</p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="item-info">Đã giao ngày 20 thg 11 2017
                                        <button type="button" class="btn btn-outline-warning btn-save" onclick="window.location='review-shop';" style="width: 100%; font-size: 14px; margin-top: 10px">Viết đánh giá</button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                    <div class="col-lg-2">
                                        <div class="item-pic"><img src="source/user/images/new_5.jpg" alt=""> </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="item-main item-main-mini">
                                            <div>
                                                <div class="text title item-title" data-spm="details_title">Chuột quang
                                                    KHÔNG DÂY Logitech M331 - HÃNG PHÂN PHỐI CHÍNH THỨC</div>
                                                <p class="text desc"></p>
                                                <p class="text desc bold"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="item-quantity"><span><span class="text desc info multiply">Qty:</span><span
                                                    class="text">&nbsp;1</span></span></div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="item-status item-capsule">
                                            <p class="capsule">Đã huỷ đơn</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="item-info">Đã giao ngày 20 thg 11 2017
                                            <button type="button" class="btn btn-outline-warning btn-save" onclick="window.location='review-shop';" style="width: 100%;font-size: 14px; margin-top: 10px">Viết đánh giá</button>
                                        </div>

                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="space15">&nbsp;</div>
                  
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
<!-- Modal -->
<div class="modal fade" id="information" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="viewed_title" style="border-right:solid 1px #dadada;" id="exampleModalLabel">Địa chỉ nhận
                    hàng&nbsp;</h4>&nbsp;
                <h5 style="margin-top: 4px"><a href="" data-dismiss="modal" aria-label="Close" data-toggle="modal"
                        data-target="#information1">Thêm địa chỉ mới</a></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row order_cart_title1">
                    <div class="col-lg-2 col-md-2">Tên</div>
                    <div class="col-lg-3 col-md-3">Địa chỉ</div>
                    <div class="col-lg-3 col-md-3">Mã vùng</div>
                    <div class="col-lg-2 col-md-2">Số điện thoại</div>
                    <div class="col-lg-2 col-md-2"></div>
                </div>
                <div class="row order_cart_title2 ">
                    <div class="col-lg-2 col-md-2">Huỳnh Khắc Duy</div>
                    <div class="col-lg-3 col-md-3">32-34 đường số 3 - khu TĐC - ĐHYD, KV4 - P.An khánh - Q.Ninh kiều</div>
                    <div class="col-lg-3 col-md-3">Cần Thơ - Quận Ninh Kiều - Phường An Khánh</div>
                    <div class="col-lg-2 col-md-3">01697186707</div>
                    <div class="col-lg-2 col-md-1">
                        <a href="" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#informationuser1">Chỉnh
                            sửa</a>

                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="information1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="viewed_title" id="exampleModalLabel">Thêm thông tin và địa chỉ nhận hàng mới</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" class="clearfix">
                    <div class="row">
                        <div class="col-lg-6 order-lg-1 order-1">
                            <div class="form-group">
                                <label for="">Họ tên</label>
                                <input type="email" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-2 order-4">
                            <div class="form-group">
                                <label for="">Tỉnh/ Thành phố</label>
                                <select name="tinh-thanhpho" id="tinh-thanhpho" class="form-control" style="margin-left: 0px;"
                                    id="">
                                    <option value="">Chọn tỉnh thành</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-3 order-2">
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="email" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-4 order-5">
                            <div class="form-group">
                                <label for="">Quận/ Huyện</label>
                                <select name="quan-huyen" id="quan-huyen" class="form-control" style="margin-left: 0px;"
                                    id="">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-5 order-3">
                            <div class="form-group">
                                <label for="">Địa chỉ nhận hàng</label>
                                <input type="email" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-6 order-6">
                            <div class="form-group">
                                <label for="">Phường/ Xã</label>
                                <select name="xa-phuong" id="xa-phuong" class="form-control" style="margin-left: 0px;">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-7 order-7">
                            <div class="space15">&nbsp;</div>
                        </div>
                        <div class="col-lg-6 order-lg-8 order-8">
                            <!-- <div class="space15">&nbsp;</div> -->
                            <button type="button" class="btn btn-outline-warning btn-save text-right">Lưu thông tin</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="informationuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="viewed_title" id="exampleModalLabel">Chỉnh sửa thông tin cá nhân</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="#" class="clearfix">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Họ Tên</label>
                                    <input type="email" class="form-control" id="hoten" aria-describedby="" placeholder="   ">
                                </div>
                                <div class="space10">&nbsp;</div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" id="email" aria-describedby="" placeholder="  ">
                                </div>
                                <div class="space10">&nbsp;</div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số Điện Thoại</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby=""
                                        placeholder="Enter email">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Ngày Sinh</label>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4">
                                            <select class="form-control" name="month" onchange="call()">
                                                <option value="">Tháng</option>
                                                <option value="1">Tháng 1</option>
                                                <option value="2">Tháng 2</option>
                                                <option value="3">Tháng 3</option>
                                                <option value="4">Tháng 4</option>
                                                <option value="5">Tháng 5</option>
                                                <option value="6">Tháng 6</option>
                                                <option value="7">Tháng 7</option>
                                                <option value="8">Tháng 8</option>
                                                <option value="9">Tháng 9</option>
                                                <option value="10">Tháng 10</option>
                                                <option value="11">Tháng 11</option>
                                                <option value="12">Tháng 12</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-md-4">
                                            <select class="form-control" name="day" onchange="call()">
                                                <option>Ngày</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-md-4">
                                            <select class="form-control" id="years" name="year">
                                                <option>Năm</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Giới Tính</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Nam</option>
                                        <option>Nữ</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-info btn-change"><a href="" data-dismiss="modal"
                        aria-label="Close" data-toggle="modal" data-target="#informationchangepass">Thay đổi mật khẩu</a></button>
                <button type="button" class="btn btn-outline-warning btn-save">Lưu thông tin</button>
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Thoát</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="informationuser1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="viewed_title" id="exampleModalLabel">Thêm thông tin và địa chỉ nhận hàng mới</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" class="clearfix">
                    <div class="row">
                        <div class="col-lg-6 order-lg-1 order-1">
                            <div class="form-group">
                                <label for="">Họ tên</label>
                                <input type="email" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-2 order-4">
                            <div class="form-group">
                                <label for="">Tỉnh/ Thành phố</label>
                                <select name="tinh-thanhpho" id="tinh-thanhpho-user" class="form-control" style="margin-left: 0px;"
                                    id="">
                                    <option value="">Chọn tỉnh thành</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-3 order-2">
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="email" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-4 order-5">
                            <div class="form-group">
                                <label for="">Quận/ Huyện</label>
                                <select name="quan-huyen" id="quan-huyen-user" class="form-control" style="margin-left: 0px;"
                                    id="">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-5 order-3">
                            <div class="form-group">
                                <label for="">Địa chỉ nhận hàng</label>
                                <input type="email" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-6 order-6">
                            <div class="form-group">
                                <label for="">Phường/ Xã</label>
                                <select name="xa-phuong" id="xa-phuong-user" class="form-control" style="margin-left: 0px;">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-7 order-7">
                            <div class="space15">&nbsp;</div>
                        </div>
                        <div class="col-lg-6 order-lg-8 order-8">
                            <!-- <div class="space15">&nbsp;</div> -->
                            <button type="button" class="btn btn-outline-warning btn-save text-right">Lưu thông tin</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="informationchangepass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="viewed_title" id="exampleModalLabel">Thay đổi mật khẩu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" class="clearfix">
                    <div class="row">
                        <div class="col-lg-12 order-lg-1 order-1">
                            <div class="form-group">
                                <label for="">Mật khẩu cũ</label>
                                <input type="email" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                        </div>

                        <div class="col-lg-12 order-lg-3 order-2">
                            <div class="form-group">
                                <label for="">Mật khẩu mới</label>
                                <input type="email" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                        </div>

                        <div class="col-lg-12 order-lg-5 order-3">
                            <div class="form-group">
                                <label for="">Xác nhận mật khẩu mới</label>
                                <input type="email" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-warning btn-save">Lưu thông tin</button>
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Thoát</button>
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
