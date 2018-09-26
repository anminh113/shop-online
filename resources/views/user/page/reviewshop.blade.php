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
                    {{-- <div class="home_shop">
                        <div class="char_icon"><img src="source/user/images/icons8-home-page-100.png" style="width: 70px"
                                alt=""></div>
                        <div class="char_content">
                            <div class="char_title">HARA Shop</div>
                            <div class="char_subtitle">903 Lượng theo dõi</div>
                            <div class="char_subtitle">77% Đánh giá tích cực</div>
                        </div>
                        <div class="char_icon" style="margin-left: 20px"><img src="source/user/images/icons8-plus-500.png"
                                style="width: 45px" alt="">
                            <div class="char_subtitle">Theo dõi</div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="space10">&nbsp;</div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
            <a style="text-decoration: none;color: #000">
                <div class=" tablink bottombar w3-padding border-red text-center">Đánh giá</div>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
            <a href="javascript:void(0)" style="text-decoration: none;color: #000" onclick="window.location='profile-user';">
                <div class=" tablink  w3-padding border-red text-center">Thông tin cá nhân</div>
            </a>
        </div>
        <div class="col-lg-5 col-md-4 col-sm-6 col-6">
            <a href="javascript:void(0)" style="text-decoration: none;color: #000" onclick="window.location='profile-user-shop';">
                <div class=" tablink  w3-padding border-red text-center">Sản phẩm yêu thích & Gian hàng đang theo dõi</div>
            </a>
        </div>

        <div class="col-lg-12">
            <div class="tabcontent" style="display: block;">
                <div class="characteristics">

                    <hr>
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="section-title" style="color: #757575;"> Đã mua ngày 15 thg 11 2017</div>
                            <div style="padding-left: 5px;font-size: 13px; padding-bottom: 10px;">Nhận xét và đánh giá
                                sản phẩm đã mua (5 sao: Rất Tốt - 1 sao: Rất Tệ)</div>
                            <div class="row" style="padding-left: 5px;">
                                <div class="col-lg-2">
                                    <img src="source/user/images/new_5.jpg" width="85" height="85">
                                </div>
                                <div class="col-lg-10">
                                    <div style="padding-left: 5px;font-size: 14px; padding-bottom: 10px;">Thẻ nhớ 16GB
                                        Class 10 Team MicroSDHC (Đen)</div>
                                    <span class="content-star-rate">
                                        <fieldset class="rating">
                                            <input type="radio" id="star5" name="rating" value="5" form="fb-form" />
                                            <label class="full" for="star5" data-toggle="tooltip" title="Tuyệt vời - 5 sao"></label>

                                            <input type="radio" id="star4" name="rating" value="4" form="fb-form" />
                                            <label class="full" for="star4" data-toggle="tooltip" title="Khá tốt - 4 sao"></label>

                                            <input type="radio" id="star3" name="rating" value="3" form="fb-form" />
                                            <label class="full" for="star3" data-toggle="tooltip" title="Bình thường - 3 sao"></label>

                                            <input type="radio" id="star2" name="rating" value="2" form="fb-form" />
                                            <label class="full" for="star2" data-toggle="tooltip" title="Tệ - 2 sao"></label>

                                            <input type="radio" id="star1" name="rating" value="1" form="fb-form" />
                                            <label class="full" for="star1" data-toggle="tooltip" title="Quá tệ - 1 star"></label>
                                        </fieldset>
                                    </span>
                                    <br>
                                    <div class="space10">&nbsp;</div>
                                    <div class="contact_form_text" style="padding-left: 5px;">
                                        <div style="color: #000;font-size: 14px; "> Đánh giá chi tiết</div>
                                        <textarea id="contact_form_message" data-autoresize class="text_field contact_form_message"
                                            name="message" rows="7" placeholder="Đánh giá..." required="required"
                                            data-error="Please, write us a message."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="section-title" style="font-size:16px"> Bán bởi <a href="">Kho Cực Sốc</a> </div>
                            <div style="color: #757575;padding-left: 5px;font-size: 14px; padding-bottom: 10px;"> Nhận
                                xét và đánh giá nhà bán hàng:</div>
                            <div class="text123">
                                <img alt="" class="filter__seller-rating" title="Rất tốt" src="source/user/images/icon-verygood.png"
                                    id="imgClickAndChangeVeryGood">
                                <img alt="" class="filter__seller-rating" title="Tốt" src="source/user/images/icon-good.png"
                                    id="imgClickAndChangeGood">
                                <img alt="" class="filter__seller-rating" title="Tệ" src="source/user/images/icon-bad.png"
                                    id="imgClickAndChangeBad">
                            </div>
                            <div class="space20">&nbsp;</div>
                            <div class="contact_form_text" style="padding-left: 5px;">
                                <div class="space20">&nbsp;</div>
                                <div style="color: #757575;font-size: 14px; "> Đánh giá chi tiết</div>
                                <textarea id="contact_form_message" data-autoresize class="text_field contact_form_message"
                                    name="message" rows="7" placeholder="Đánh giá..." required="required" data-error="Please, write us a message."></textarea>
                            </div>

                        </div>
                        <div class="col-lg-9"></div>
                        <div class="col-lg-3"><button type="button" class="btn btn-outline-warning btn-save" style="right:0;height: 50px;width: 100%;font-size: 16px; margin-top: 10px">Giử
                                đánh giá</button></div>

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


@endsection


@section('footer')
<script src="source/user/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="source/user/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="source/user/plugins/parallax-js-master/parallax.min.js"></script>
<script src="source/user/js/shop_custom.js"></script>
<script>
    $('.text123').on('click', 'img', function () {
        var id = $(this).attr('id');
        if (id == 'imgClickAndChangeVeryGood') {
            $('#imgClickAndChangeVeryGood').attr('src', 'source/user/images/icon-color-verygood.png');
            $('#imgClickAndChangeGood').attr('src', 'source/user/images/icon-good.png');
            $('#imgClickAndChangeBad').attr('src', 'source/user/images/icon-bad.png');

        } else if (id == 'imgClickAndChangeGood') {
            $('#imgClickAndChangeVeryGood').attr('src', 'source/user/images/icon-verygood.png');
            $('#imgClickAndChangeGood').attr('src', 'source/user/images/icon-color-good.png');
            $('#imgClickAndChangeBad').attr('src', 'source/user/images/icon-bad.png');
        } else {
            $('#imgClickAndChangeVeryGood').attr('src', 'source/user/images/icon-verygood.png');
            $('#imgClickAndChangeGood').attr('src', 'source/user/images/icon-good.png');
            $('#imgClickAndChangeBad').attr('src', 'source/user/images/icon-color-bad.png');
        }
    });

</script>

@endsection
