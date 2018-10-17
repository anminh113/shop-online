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

        <div class="col-lg-2 col-md-4 col-sm-6 col-6">
            <a href="javascript:void(0)" style="text-decoration: none;color: #000" onclick="openCity(event, 'sanpham');">
                <div class=" tablink bottombar w3-padding border-red text-center">Quản lý tài khoản</div>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
            <a href="javascript:void(0)" style="text-decoration: none;color: #000" onclick="openCity(event, 'hoso');">
                <div class=" tablink bottombar w3-padding text-center">Đơn hàng của tôi</div>
            </a>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-6">
            <a href="javascript:void(0)" style="text-decoration: none;color: #000" onclick="window.location='review-shop';">
                <div class=" tablink bottombar w3-padding text-center">Nhận xét của tôi</div>
            </a>
        </div>
        <div class="col-lg-5 col-md-4 col-sm-6 col-6">
            <a href="javascript:void(0)" style="text-decoration: none;color: #000" onclick="window.location='profile-user-shop';">
                <div class=" tablink  w3-padding border-red text-center">Sản phẩm yêu thích & Gian hàng đã theo dõi</div>
            </a>
        </div>
        <div class="col-lg-12">
            <div id="sanpham" class="tabcontent" style="display: block;">
                <div class="characteristics">
                    <div class="row">
                        <!-- Char. Item -->
                        <div class="col-lg-6 col-md-6 char_col">
                            <div class="char_item " style="height: 235px;">
                                <div class="char_title_top"><b> Thông tin cá nhân </b><span>|</span> <a href=""
                                        data-toggle="modal" data-target="#informationuser">Chỉnh Sửa</a></div>
                                <div class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="char_content">
                                        <div class="char_title" style="padding-bottom: 7px; font-size: 14px">{{$datacustomer['customer']['name']}}</div>
                                        <div class="char_title" style="padding-bottom: 7px; font-size: 14px">{{$datacustomer['customer']['email']}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Char. Item -->
                        <div class="col-lg-6 col-md-6 char_col">
                            <div class="char_item " style="height: 235px;">
                                <div class="char_title_top"><b> Địa chỉ </b><span>|</span> <a href="" data-toggle="modal"
                                        data-target="#information">Chỉnh Sửa</a></div>
                                <div class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="char_content">
                                        @if($dataaddress['count']!=0)
                                        <div class="char_title" style="padding-bottom: 7px; font-size: 14px; color:#878F90">ĐỊA
                                            CHỈ VẬN CHUYỂN</div>
                                        <div class="char_title" style="padding-bottom: 7px; font-size: 15px"><b>{{$dataaddress['deliveryAddresses'][0]['presentation']}}</b></div>
                                        <div class="char_title" style="padding-bottom: 7px; font-size: 15px">{{$dataaddress['deliveryAddresses'][0]['address']}}</div>
                                        <div class="char_title" style="padding-bottom: 7px; font-size: 15px">{{$dataaddress['deliveryAddresses'][0]['phoneNumber']}}</div>
                                        @else
                                        <div class="char_title" style="padding-bottom: 7px; font-size: 14px; color:#878F90">ĐỊA
                                            CHỈ VẬN CHUYỂN</div>
                                        <div class="char_title" style="padding-bottom: 7px; font-size: 15px"><b>Chưa có
                                                địa chỉ giao hàng</b></div>
                                        @endif
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
                        <div class="accordion order-info">Đơn hàng #206505315631747 <span> |</span> <span>1</span> Sản
                            phẩm</div>

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
                                        {{-- <button type="button" class="btn btn-outline-warning btn-save" onclick="window.location='review-shop';"
                                            style="width: 100%;font-size: 14px; margin-top: 10px">Viết đánh giá</button>
                                        --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space10">&nbsp;</div>
                    <div class="order">
                        <div class="accordion order-info">Đơn hàng #206505315631747 <span> |</span> <span>2</span> Sản
                            phẩm</div>
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
                                        {{-- <button type="button" class="btn btn-outline-warning btn-save" onclick="window.location='review-shop';"
                                            style="width: 100%; font-size: 14px; margin-top: 10px">Viết đánh giá</button>
                                        --}}
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
                                        {{-- <button type="button" class="btn btn-outline-warning btn-save" onclick="window.location='review-shop';"
                                            style="width: 100%;font-size: 14px; margin-top: 10px">Viết đánh giá</button>
                                        --}}
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
                                <div class="viewed_image"><img src="https://phongvu.vn/media/catalog/product/cache/23/small_image/200x200/9df78eab33525d08d6e5fb8d27136e95/o/-/o-cung-hdd-1tb-wd-wd10ezex-5.jpg"
                                        width="115" height="115" alt=""></div>
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
                                <div class="viewed_image"><img src="https://phongvu.vn/media/catalog/product/cache/23/small_image/200x200/9df78eab33525d08d6e5fb8d27136e95/o/-/o-cung-hdd-1tb-wd-wd10ezex-5.jpg"
                                        width="115" height="115" alt=""></div>
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
                                <div class="viewed_image"><img src="https://phongvu.vn/media/catalog/product/cache/23/small_image/200x200/9df78eab33525d08d6e5fb8d27136e95/o/-/o-cung-hdd-1tb-wd-wd10ezex-5.jpg"
                                        width="115" height="115" alt=""></div>
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
                                <div class="viewed_image"><img src="https://phongvu.vn/media/catalog/product/cache/23/small_image/200x200/9df78eab33525d08d6e5fb8d27136e95/o/-/o-cung-hdd-1tb-wd-wd10ezex-5.jpg"
                                        width="115" height="115" alt=""></div>
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
                                <div class="viewed_image"><img src="https://phongvu.vn/media/catalog/product/cache/23/small_image/200x200/9df78eab33525d08d6e5fb8d27136e95/o/-/o-cung-hdd-1tb-wd-wd10ezex-5.jpg"
                                        width="115" height="115" alt=""></div>
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
                                <div class="viewed_image"><img src="https://phongvu.vn/media/catalog/product/cache/23/small_image/200x200/9df78eab33525d08d6e5fb8d27136e95/o/-/o-cung-hdd-1tb-wd-wd10ezex-5.jpg"
                                        width="115" height="115" alt=""></div>
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
                    <div class="col-lg-2 ">Tên</div>
                    <div class="col-lg-6 ">Địa chỉ</div>
                    <div class="col-lg-2 ">Số điện thoại</div>
                    <div class="col-lg-2 "></div>
                </div>
                <div class="row order_cart_title2 ">
                    @foreach($dataaddress['deliveryAddresses'] as $item)
                    <div class="col-lg-2 ">{{$item['presentation']}}</div>
                    <div class="col-lg-6 ">{{$item['address']}}</div>
                    <div class="col-lg-2 ">{{$item['phoneNumber']}}</div>
                    <div class="col-lg-2 ">
                        <a href="" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#informationuser{{$item['_id']}}">Chỉnh
                            sửa</a>
                    </div>
                    @endforeach
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
                <form action="{{route('post-delivery-profile-user')}}"  method="POST">
                    <div class="row">
                        <div class="col-lg-6 order-lg-1 order-1">
                            <div class="form-group">
                                <label for="">Họ tên</label>
                                <input type="text" class="form-control" id="" name="hoten"  placeholder="">
                                <input type="text" hidden name="customerid" value="{{$datacustomer['customer']['_id']}}">
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
                                <input type="text" class="form-control" id="" name="sdt">
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
                                <input type="text" class="form-control" id="" name="diachi">
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-6 order-6">
                            <div class="form-group">
                                <label>Phường/ Xã</label>
                                <select name="xa-phuong" id="xa-phuong" class="form-control" style="margin-left: 0px;">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-10 order-lg-7 order-7">
                            <div class="space15">&nbsp;</div>
                        </div>
                        <div class="col-lg-2 order-lg-8 order-8">
                            <button type="submit" class="btn btn-outline-warning btn-save text-right">Lưu thông tin</button>
                        </div>
                    </div>
                    {{ csrf_field() }}
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
                <h4 class="viewed_title" id="exampleModalLabel">Thông tin cá nhân</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{route('post-update-profile-user')}}" id="change" method="POST">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="hoten">Họ Tên</label>
                                    <input type="text" class="form-control" id="hoten" name="hoten" aria-describedby=""
                                        value="{{$datacustomer['customer']['name']}}">
                                        <input type="text" hidden name="customerid" value="{{$datacustomer['customer']['_id']}}">
                                </div>
                                <div class="space10">&nbsp;</div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" aria-describedby="" value="{{$datacustomer['customer']['email']}}">
                                </div>
                                <div class="space10">&nbsp;</div>
                                <div class="form-group">
                                    <label for="sdt">Số Điện Thoại</label>
                                    <input type="text" class="form-control" id="sdt" name="sdt" aria-describedby=""
                                        value="{{$datacustomer['customer']['phoneNumber']}}">
                                </div>
                                <div class="form-group row" hidden>
                                    <label for="example-date-input" class="col-2 col-form-label">Date</label>
                                    <div class="col-10">
                                        <input class="form-control" type="date"  value="2011-08-19" id="example-date-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-date-input">Ngày sinh</label>
                                    <input class="form-control" type="date" name="date" value="{{$start}}" id="example-date-input">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label for="gender">Giới Tính</label>
                                    <select class="form-control" id="gender" name="gender">
                                        @if($datacustomer['customer']['gender'] =="Nam")
                                        <option selected>Nam</option>
                                        <option>Nữ</option>
                                        @else
                                        <option>Nam</option>
                                        <option selected>Nữ</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-info btn-change"><a href="" data-dismiss="modal"
                        aria-label="Close" data-toggle="modal" data-target="#informationchangepass">Thay đổi mật khẩu</a></button>
                <button type="submit" form="change" class="btn btn-outline-warning btn-save">Lưu thông tin</button>
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Thoát</button>
            </div>
        </div>
    </div>
</div>

@foreach($dataaddress['deliveryAddresses'] as $item)
<div class="modal fade" id="informationuser{{$item['_id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="viewed_title" id="exampleModalLabel">Cập nhật thông tin và địa chỉ nhận hàng mới</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{route('update-delivery-profile-user')}}" id="info{{$item['_id']}}" method="POST">
                    <div class="row">
                        <div class="col-lg-6 order-lg-1 order-1">
                            <div class="form-group">
                                <label for="">Họ tên</label>
                                <input type="text" class="form-control" name="hoten"  value="{{$item['presentation']}}">
                                <input type="text" hidden name="id"  value="{{$item['_id']}}">
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-2 order-4">
                            <div class="form-group">
                                <label for="">Tỉnh/ Thành phố</label>
                                <select name="tinh-thanhpho" id="tinh-thanhpho-user{{$item['_id']}}" class="form-control" style="margin-left: 0px;"
                                   >
                                 
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-3 order-2">
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="text" class="form-control"  value="{{$item['phoneNumber']}}" name="sdt">
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-4 order-5">
                            <div class="form-group">
                                <label for="">Quận/ Huyện</label>
                                <select name="quan-huyen" id="quan-huyen-user{{$item['_id']}}" class="form-control" style="margin-left: 0px;" >
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-5 order-3">
                            <div class="form-group">
                                <label for="">Địa chỉ nhận hàng</label>
                                <input type="text" class="form-control" id="diachi{{$item['_id']}}" name="diachi" >
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-6 order-6">
                            <div class="form-group">
                                <label for="">Phường/ Xã</label>
                                <select name="xa-phuong" id="xa-phuong-user{{$item['_id']}}" class="form-control" style="margin-left: 0px;">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-8 order-lg-7 order-7">
                            <div class="space15">&nbsp;</div>
                        </div>
                        <div class="col-lg-4 order-lg-8 order-8">
                            <!-- <div class="space15">&nbsp;</div> -->
                            <button type="button" class="btn btn-outline-info btn-change"><a href="{{route('delete-delivery-profile-user',$item['_id'])}}">Xóa địa chỉ</a></button>
                            <button type="submit" form="info{{$item['_id']}}" class="btn btn-outline-warning btn-save text-right">Lưu thông tin</button>
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Thoát</button>
                        </div>
                    </div>
            @method('PATCH')
            {{ csrf_field() }}
            </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        load_json_data('tinh-thanhpho-user{{$item['_id']}}');
        function load_json_data(id, parent_id) {
            var html_code = '';
            var html_add = '';
            $.getJSON("source/user/datacontry/tinh_tp.json", function(data) {
                var text = "{{$item['address']}}";
                var text1 = text.split(",");
                var html1 = [];
                for(var i=((text1.length)-1); i <= ((text1.length)-1); i++){
                    html1 = text1[i]; 
                    var htmltext = html1.slice(1,100); 
                }
               
                html_code = '<option value="">Chọn tỉnh thành</option>';
                $.each(data, function(key, value) {

                    if (id == 'tinh-thanhpho-user{{$item['_id']}}') {
                        if (value.type == 'tinh' || value.type == 'thanh-pho') {
                            html_code += '<option value="' + value.code + '"> ' + value.name_with_type + '</option>';
                            if(value.name_with_type == htmltext){
                            html_add = '<option value="' + value.code + '" selected> ' + value.name_with_type + '</option>';
                            }
                        }
                    } else {
                        if (value.code == parent_id) {
                            if(value.name_with_type == htmltext){
                            html_add = '<option value="' + value.code + '" selected> ' + value.name_with_type + '</option>';
                            }
                            html_code += '<option value="' + value.code + '"> ' + value.name_with_type + '</option>';  
                        }  
                    }
                });
                
           
                $('#tinh-thanhpho-user{{$item['_id']}}').html(html_code);
                $('#tinh-thanhpho-user{{$item['_id']}}').append(html_add);
                
            });
        }

       


        
        function load_json_data1(id, parent_id) {
            var html_code = '';
            var html_add = '';
            $.getJSON("source/user/datacontry/quan_huyen.json", function(data) {
                var quan = "{{$item['address']}}";
                var quan1 = quan.split(",");
                var htmlquan;
                for(var i=((quan1.length)-2); i <= ((quan1.length)-2); i++){
                    htmlquan = quan1[i]; 
                    var htmltext1 = htmlquan.slice(1,100); 
                }
                html_code += '<option value="">Chọn quận huyện</option>';
                $.each(data, function(key, value) {
                    if (id == 'tinh-thanhpho-user{{$item['_id']}}') {
                        if (value.type == 'thanh-pho' || value.type == 'huyen' || value.type == 'thi-xa') {
                            // html_add = '<option value="' + value.code + '" selected> ' +htmltext1  + '</option>';
                            html_code += '<option value="' + value.code + '"> ' + value.name_with_type + '</option>';
                            if(value.name_with_type == htmltext1){
                            html_add = '<option value="' + value.code + '" selected> ' + value.name_with_type + '</option>';
                            }
                        }
                    } else {
                        if (value.parent_code == parent_id) {
                            html_code += '<option value="' + value.code + '"> ' + value.name_with_type + '</option>';
                            if(value.name_with_type == htmltext1){
                            html_add = '<option value="' + value.code + '" selected> ' + value.name_with_type + '</option>';
                            }
                        }
                    }
                });
              
                $('#quan-huyen-user{{$item['_id']}}').html(html_code);
                $('#quan-huyen-user{{$item['_id']}}').append(html_add);
            });

        }
        function load_json_data2(id, parent_id) {
            var html_code = '';
            var html_add = '';
            $.getJSON("source/user/datacontry/xa_phuong.json", function(data) {
                var quan = "{{$item['address']}}";
                var quan1 = quan.split(",");
                var htmlquan;
                for(var i=((quan1.length)-3); i <= ((quan1.length)-3); i++){
                    htmlquan = quan1[i]; 
                    var htmltext1 = htmlquan.slice(1,100); 
                }

                html_code += '<option value="">Chọn xã phường</option>';
                $.each(data, function(key, value) {
                    if (id == 'tinh-thanhpho-user{{$item['_id']}}') {
                        if (value.type == 'phuong' || value.type == 'xa') {
                            if(value.name_with_type == htmltext1){
                            html_add = '<option value="' + value.path_with_type + '" selected> ' + value.name_with_type + '</option>';
                            }
                            html_code += '<option value="' + value.path_with_type + '"> ' + value.name_with_type + '</option>';
                           
                        }
                    } else {
                        if (value.parent_code == parent_id) {
                            if(value.name_with_type == htmltext1){
                            html_add = '<option value="' + value.path_with_type + '" selected> ' + value.name_with_type + '</option>';
                            }
                            html_code += '<option value="' + value.path_with_type + '"> ' + value.name_with_type + '</option>';
                           
                        }
                    }
                });
              
                $('#xa-phuong-user{{$item['_id']}}').html(html_code);
                $('#xa-phuong-user{{$item['_id']}}').append(html_add);
            });

        }


     
        $(document).one('click', '#tinh-thanhpho-user{{$item['_id']}}', function() {
            var country_id = $(this).val();
            console.log("ID: " + country_id);
            if (country_id != '') {
                load_json_data1('quan-huyen', country_id);
            } else {
                $('#quan-huyen-user{{$item['_id']}}').html('<option value="">Chọn quận huyện</option>');
                $('#xa-phuong-user{{$item['_id']}}').html('<option value="">Chọn xã phường</option>');
            }
        });
      

        $(document).one('click', '#quan-huyen-user{{$item['_id']}}', function() {
            var state_id = $(this).val();
            console.log("ID: " + state_id);
            if (state_id != '') {
                load_json_data2('xa-phuong', state_id);
            } else {
                $('#quan-huyen-user{{$item['_id']}}').html('<option value="">Chọn quận huyện</option>');
                $('#xa-phuong-user{{$item['_id']}}').html('<option value="">Chọn xã phường</option>');
            }
        });

        $(document).on('change', '#tinh-thanhpho-user{{$item['_id']}}', function() {
            var country_id = $(this).val();
            console.log("ID: " + country_id);
            if (country_id != '') {
                load_json_data1('quan-huyen', country_id);
            } else {
                $('#quan-huyen-user{{$item['_id']}}').html('<option value="">Chọn quận huyện</option>');
                $('#xa-phuong-user{{$item['_id']}}').html('<option value="">Chọn xã phường</option>');
            }
        });
    
    
    
        $(document).on('change', '#quan-huyen-user{{$item['_id']}}', function() {
            var state_id = $(this).val();
            console.log("ID: " + state_id);
            if (state_id != '') {
                load_json_data2('xa-phuong', state_id);
            } else {
                $('#quan-huyen-user{{$item['_id']}}').html('<option value="">Chọn quận huyện</option>');
                $('#xa-phuong-user{{$item['_id']}}').html('<option value="">Chọn xã phường</option>');
            }
        });
    
        
       
      
  


        

        if (html.length>0) {
            setTimeout(function() {
                document.getElementById('tinh-thanhpho-user{{$item['_id']}}').click();
            }, 100);
        }
        if (html.length>0) {
            setTimeout(function() {
                document.getElementById('quan-huyen-user{{$item['_id']}}').click();
            }, 350);
        }
    });


    var text = "{{$item['address']}}";
    var text1 = text.split(",");
    var html = [];


    for(var i=0; i <= ((text1.length)-4); i++){
        html.push(text1[i]); 
        document.getElementById('diachi{{$item['_id']}}').value = html;
    }
   
</script>


    
@endforeach


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
            <form action="{{route('update-password-profile-user')}}" id="changepass" method="POST">
                    <div class="row">
                        <div class="col-lg-12 order-lg-1 order-1">
                            <div class="form-group">
                                <label for="">Mật khẩu cũ</label>
                                <input type="password" class="form-control"  name="oldpass" >
                            </div>
                        </div>

                        <div class="col-lg-12 order-lg-3 order-2">
                            <div class="form-group">
                                <label for="">Mật khẩu mới</label>
                                <input type="password" class="form-control"  name="newpass">    
                            </div>
                        </div>

                        <div class="col-lg-12 order-lg-5 order-3">
                            <div class="form-group">
                                <label for="">Xác nhận mật khẩu mới</label>
                                <input type="password" class="form-control" name="checkpass" >         
                            </div>
                        </div>
                    </div>
                    @method('PATCH')
                    {{ csrf_field() }}
                </form>
            </div>
            <div class="modal-footer">
                <button type="subnit" form="changepass" class="btn btn-outline-warning btn-save">Lưu thông tin</button>
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

<script>
    var day = "{{$datacustomer['customer']['birthday']}}";
    var dtstart = moment('{{$datacustomer['customer']['birthday']}}').format('MM/DD/YYYY');
    var text1 = dtstart.split("/", 6);
    document.getElementById('example-date-input').value = dtstart;

</script>


@endsection
