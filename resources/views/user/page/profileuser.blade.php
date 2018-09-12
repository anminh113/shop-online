@extends('user/master')
@section('head')
<link rel="stylesheet" type="text/css" href="source/user/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/shop_responsive.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/header_css.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/profileshop.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/index.css">

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
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
            <a href="javascript:void(0)" style="text-decoration: none;color: #000" onclick="openCity(event, 'sanpham');">
                <div class=" tablink bottombar w3-padding border-red text-center">Quản lý tài khoản</div>
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
                    <div class="characteristics">
                        <div class="row">
                            <!-- Char. Item -->
                            <div class="col-lg-4 col-md-6 char_col">
                                <div class="char_item ">
                                    <div class="char_title_top"><b>Personal Profile</b> </div>
                                    <div class="d-flex flex-row align-items-center justify-content-start">
                                        {{-- <div class="char_icon"><img style="width: 30px;height: 30px" src="source/user/images/icons8-place-marker-100.png" alt=""></div>
                                        <div class="char_content">
                                            <div class="char_title">Thị trấn Mường Ảng, Huyện Mường Ảng, Tỉnh Điện Biên</div>
                                        </div> --}}
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
 

   
  
