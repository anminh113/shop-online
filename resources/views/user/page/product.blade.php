@extends('user/master')
@section('head')
<link rel="stylesheet" type="text/css" href="source/user/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/product_responsive.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/product_css.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/header_css.css">
@endsection
@section('content')

<!-- Single Product -->
<div class="single_product">
    <div class="container">
        <div class="row">
            <!-- Images -->
            <div class="col-lg-2 order-lg-1 order-2">
                <ul class="image_list">
                    <li data-image="https://i.imgur.com/9rv7nCf.jpg"><img src="https://i.imgur.com/9rv7nCf.jpg" alt=""></li>
                    <li data-image="https://i.imgur.com/cRvQ900.jpg"><img src="https://i.imgur.com/cRvQ900.jpg" alt=""></li>
                    <li data-image="https://i.imgur.com/semuiGA.jpg"><img src="https://i.imgur.com/semuiGA.jpg" alt=""></li>
                </ul>
            </div>
            <!-- Selected Image -->
            <div class="col-lg-5 order-lg-2 order-1">
                <div class="image_selected"><img src="https://i.imgur.com/9rv7nCf.jpg" alt=""></div>
            </div>
            <!-- Description -->
            <div class="col-lg-5 order-3">
                <div class="product_description">
                    <div class="product_category">Laptops</div>
                    <div class="product_name">Bộ vi xử lý/ CPU AMD Ryzen 5 2400G (3.6/3.9GHz)</div>
                    <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i></div>
                    <div class="product_price">
                        <span class="text-danger" style="font-size: 22px">99.000.000 VND</span>
                        <span style="font-size: 16px; text-decoration: line-through;">100.000.000 VND</span>
                        <span style="font-size: 21px"> -5%</span>
                    </div>
                    <div class="product_text">
                        Kiến trúc "Zen" kiến trúc lõi x86 hiệu suất cao của AMD mang lại cải tiến hơn 52% về hướng dẫn mỗi chu kỳ trên lõi AMD thế hệ trước, mà không cần tăng công suất. Được sản xuất với quy trình 14nm, "Zen" kết hợp những ý tưởng mới nhất về phương pháp thiết kế có năng suất và công suất thấp để tạo ra một cấu trúc cân bằng và linh hoạt ngay tại nhà trên máy tính để bàn
                    </div>
                    <div class="order_info d-flex flex-row">
                        <form action="#">
                            <div class="clearfix" style="z-index: 1000;">
                                <!-- Product Quantity -->
                                <div class="product_quantity clearfix">
                                    <span>Số Lượng: </span>
                                    <input id="quantity_input" type="text" pattern="[1-9]*" value="1">
                                    <div class="quantity_buttons">
                                        <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                                        <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                                    </div>
                                </div>
                                <!-- Product Color -->
                                <!-- <ul class="product_color">
                                <li>
                                    <span>Color: </span>
                                    <div class="color_mark_container"><div id="selected_color" class="color_mark"></div></div>
                                    <div class="color_dropdown_button"><i class="fas fa-chevron-down"></i></div>

                                    <ul class="color_list">
                                        <li><div class="color_mark" style="background: #999999;"></div></li>
                                        <li><div class="color_mark" style="background: #b19c83;"></div></li>
                                        <li><div class="color_mark" style="background: #000000;"></div></li>
                                    </ul>
                                </li>
                            </ul> -->
                            </div>
                            <div class="button_container">
                                <button type="button" class="button cart_button">Add to Cart</button>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 order-3">
                <div class="characteristics">
                    <div class="container">
                        <div class="row">
                            <!-- Char. Item -->
                            <div class="col-lg-4 col-md-6 char_col">
                                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                                    <div class="char_icon"><img style="width: 30px;height: 30px" src="source/user/images/icons8-truck-50.png" alt=""></div>
                                    <div class="char_content">
                                        <div class="char_subtitle">Miễn phí vận chuyển với đơn hàng từ 500.000₫ trở lên</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Char. Item -->
                            <div class="col-lg-4 col-md-6 char_col">
                                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                                    <div class="char_icon"><img style="width: 30px;height: 30px" src="source/user/images/icons8-protect-50.png" alt=""></div>
                                    <div class="char_content">
                                        <div class="char_subtitle">Thanh toán bảo mật</div>
                                    </div>
                                </div>
                            </div>
                                <!-- Char. Item -->
                            <div class="col-lg-4 col-md-6 char_col">
                                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                                    <div class="char_icon"><img style="width: 30px;height: 30px" src="source/user/images/icons8-update-50.png" alt=""></div>
                                    <div class="char_content">
                                        <!-- <div class="char_title">Free Delivery</div> -->
                                        <div class="char_subtitle">Chính sách đổi trả</div>
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
<!-- Infomation Product -->
<div class="information_product">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-lg-7 col-md-7 order-lg-1 order-md-1 order-2 ">
                        <div class="viewed_title_container">
                            <h3 class="viewed_title">Tổng Quan Sản Phẩm</h3>
                        </div>
                        <div class="space15">&nbsp;</div>
                        <div class="single_post_title">Vivamus sed nunc in arcu cursus mollis quis et orci. Interdum et malesuada</div>
                        <div class="single_post_text">
                            <p>Mauris viverra cursus ante laoreet eleifend. Donec vel fringilla ante. Aenean finibus velit id urna vehicula, nec maximus est sollicitudin. Praesent at tempus lectus, eleifend blandit felis. Fusce augue arcu, consequat a nisl aliquet, consectetur elementum turpis. Donec iaculis lobortis nisl, et viverra risus imperdiet eu. Etiam mollis posuere elit non sagittis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis arcu a magna sodales venenatis. Integer non diam sit amet magna luctus mollis ac eu nisi. In accumsan tellus ut dapibus blandit.</p>
                            <div class="single_post_quote text-center">
                                <div class="quote_text"><img src="source/user/images/quote.png" alt=""> Quisque sagittis non ex eget vestibulum. Sed nec ultrices dui. Cras et sagittis erat. Maecenas pulvinar, turpis in dictum tincidunt, dolor nibh lacinia lacus. <img src="source/user/images/quote.png" alt=""></div>
                                <div class="quote_name">Liam Neeson</div>
                            </div>
                            <p>Praesent ac magna sed massa euismod congue vitae vitae risus. Nulla lorem augue, mollis non est et, eleifend elementum ante. Nunc id pharetra magna. Praesent vel orci ornare, blandit mi sed, aliquet nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
                        </div>
                        <div class="single_post_title">Vivamus sed nunc in arcu cursus mollis quis et orci. Interdum et malesuada</div>
                        <div class="single_post_text">
                            <p>Mauris viverra cursus ante laoreet eleifend. Donec vel fringilla ante. Aenean finibus velit id urna vehicula, nec maximus est sollicitudin. Praesent at tempus lectus, eleifend blandit felis. Fusce augue arcu, consequat a nisl aliquet, consectetur elementum turpis. Donec iaculis lobortis nisl, et viverra risus imperdiet eu. Etiam mollis posuere elit non sagittis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis arcu a magna sodales venenatis. Integer non diam sit amet magna luctus mollis ac eu nisi. In accumsan tellus ut dapibus blandit.</p>
                            <div class="single_post_quote text-center">
                                <div class="quote_text"><img src="source/user/images/quote.png" alt=""> Quisque sagittis non ex eget vestibulum. Sed nec ultrices dui. Cras et sagittis erat. Maecenas pulvinar, turpis in dictum tincidunt, dolor nibh lacinia lacus. <img src="source/user/images/quote.png" alt=""></div>
                                <div class="quote_name">Liam Neeson</div>
                            </div>
                            <p>Praesent ac magna sed massa euismod congue vitae vitae risus. Nulla lorem augue, mollis non est et, eleifend elementum ante. Nunc id pharetra magna. Praesent vel orci ornare, blandit mi sed, aliquet nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
                        </div>
                        <div class="single_post_title">Vivamus sed nunc in arcu cursus mollis quis et orci. Interdum et malesuada</div>
                        <div class="single_post_text">
                            <p>Mauris viverra cursus ante laoreet eleifend. Donec vel fringilla ante. Aenean finibus velit id urna vehicula, nec maximus est sollicitudin. Praesent at tempus lectus, eleifend blandit felis. Fusce augue arcu, consequat a nisl aliquet, consectetur elementum turpis. Donec iaculis lobortis nisl, et viverra risus imperdiet eu. Etiam mollis posuere elit non sagittis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis arcu a magna sodales venenatis. Integer non diam sit amet magna luctus mollis ac eu nisi. In accumsan tellus ut dapibus blandit.</p>
                            <div class="single_post_quote text-center">
                                <div class="quote_text"><img src="source/user/images/quote.png" alt=""> Quisque sagittis non ex eget vestibulum. Sed nec ultrices dui. Cras et sagittis erat. Maecenas pulvinar, turpis in dictum tincidunt, dolor nibh lacinia lacus. <img src="source/user/images/quote.png" alt=""></div>
                                <div class="quote_name">Liam Neeson</div>
                            </div>
                            <p>Praesent ac magna sed massa euismod congue vitae vitae risus. Nulla lorem augue, mollis non est et, eleifend elementum ante. Nunc id pharetra magna. Praesent vel orci ornare, blandit mi sed, aliquet nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 order-lg-2 order-md-1 order-1 ">
                        <div class="viewed_title_container">
                            <h3 class="viewed_title">Thông Số Kỹ Thuật</h3>
                        </div>
                        <div class="space15">&nbsp;</div>
                        <div class="container">
                            <ul>
                                <li>
                                    <div class="d-flex flex-md-row flex-column justify-content-between viewed_title_container">
                                        <div class="product_title">
                                            <p>Price Price Price Price Price Price Price Price</p>
                                        </div>
                                        &nbsp; &nbsp; &nbsp; &nbsp;
                                        <div class="product_title">
                                            <p>$2000 $2000 $2000 $2000 $2000 $2000 $2000 $2000 $2000 $2000</p>
                                        </div>
                                    </div>
                                    <div class="space15">&nbsp;</div>
                                </li>
                                <li>
                                    <div class="d-flex flex-md-row flex-column justify-content-between viewed_title_container">
                                        <div class="product_title">
                                            <p>Price Price </p>
                                        </div>
                                        &nbsp; &nbsp; &nbsp; &nbsp;
                                        <div class="product_title">
                                            <p>$2000 $2000 $2000 $2000 $2000 $2000 $2000 $2000 $2000 $2000</p>
                                        </div>
                                    </div>
                                    <div class="space15">&nbsp;</div>
                                </li>
                                <li>
                                    <div class="d-flex flex-md-row flex-column justify-content-between viewed_title_container">
                                        <div class="product_title">
                                            <p>Price Price Price Price Price Price Price Price</p>
                                        </div>
                                        &nbsp; &nbsp; &nbsp; &nbsp;
                                        <div class="product_title">
                                            <p>$2000 </p>
                                        </div>
                                    </div>
                                    <div class="space15">&nbsp;</div>
                                </li>
                                <li>
                                    <div class="d-flex flex-md-row flex-column justify-content-between viewed_title_container">
                                        <div class="product_title">
                                            <p>Price Price </p>
                                        </div>
                                        &nbsp; &nbsp; &nbsp; &nbsp;
                                        <div class="product_title">
                                            <p>$2000</p>
                                        </div>
                                    </div>
                                    <div class="space15">&nbsp;</div>
                                </li>
                                <li>
                                    <div class="d-flex flex-md-row flex-column justify-content-between viewed_title_container">
                                        <div class="product_title">
                                            <p>Price Price </p>
                                        </div>
                                        &nbsp; &nbsp; &nbsp; &nbsp;
                                        <div class="product_title">
                                            <p>$2000</p>
                                        </div>
                                    </div>
                                    <div class="space15">&nbsp;</div>
                                </li>
                                <li>
                                    <div class="d-flex flex-md-row flex-column justify-content-between viewed_title_container">
                                        <div class="product_title">
                                            <p>Price Price </p>
                                        </div>
                                        &nbsp; &nbsp; &nbsp; &nbsp;
                                        <div class="product_title">
                                            <p>$2000</p>
                                        </div>
                                    </div>
                                    <div class="space15">&nbsp;</div>
                                </li>
                            </ul>
                            <button type="button" class="button product_title_button" data-toggle="modal" data-target="#information">Xem thông số chi tiết</button>
                            <div class="space15">&nbsp;</div>
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
<!-- Newsletter -->
<div class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                    <div class="newsletter_title_container">
                        <div class="newsletter_icon"><img src="source/user/images/send.png" alt=""></div>
                        <div class="newsletter_title">Sign up for Newsletter</div>
                        <div class="newsletter_text">
                            <p>...and receive %20 coupon for first shopping.</p>
                        </div>
                    </div>
                    <div class="newsletter_content clearfix">
                        <form action="#" class="newsletter_form">
                            <input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
                            <button class="newsletter_button">Subscribe</button>
                        </form>
                        <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
                    </div>
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
                <h4 class="viewed_title" id="exampleModalLabel">Thông Số Kỹ Thuật</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12 col-md-5 ">
                    <div class="container">
                        <ul>
                            <li>
                                <div class="d-flex flex-md-row flex-column justify-content-between viewed_title_container">
                                    <div class="product_title">
                                        <p>Price Price Price Price Price Price Price Price</p>
                                    </div>
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    <div class="product_title">
                                        <p>$2000 $2000 $2000 $2000 $2000 $2000 $2000 $2000 $2000 $2000</p>
                                    </div>
                                </div>
                                <div class="space15">&nbsp;</div>
                            </li>
                            <li>
                                <div class="d-flex flex-md-row flex-column justify-content-between viewed_title_container">
                                    <div class="product_title">
                                        <p>Price Price </p>
                                    </div>
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    <div class="product_title">
                                        <p>$2000 $2000 $2000 $2000 $2000 $2000 $2000 $2000 $2000 $2000</p>
                                    </div>
                                </div>
                                <div class="space15">&nbsp;</div>
                            </li>
                            <li>
                                <div class="d-flex flex-md-row flex-column justify-content-between viewed_title_container">
                                    <div class="product_title">
                                        <p>Price Price Price Price Price Price Price Price</p>
                                    </div>
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    <div class="product_title">
                                        <p>$2000 </p>
                                    </div>
                                </div>
                                <div class="space15">&nbsp;</div>
                            </li>
                            <li>
                                <div class="d-flex flex-md-row flex-column justify-content-between viewed_title_container">
                                    <div class="product_title">
                                        <p>Price Price </p>
                                    </div>
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    <div class="product_title">
                                        <p>$2000</p>
                                    </div>
                                </div>
                                <div class="space15">&nbsp;</div>
                            </li>
                            <li>
                                <div class="d-flex flex-md-row flex-column justify-content-between viewed_title_container">
                                    <div class="product_title">
                                        <p>Price Price </p>
                                    </div>
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    <div class="product_title">
                                        <p>$2000</p>
                                    </div>
                                </div>
                                <div class="space15">&nbsp;</div>
                            </li>
                            <li>
                                <div class="d-flex flex-md-row flex-column justify-content-between viewed_title_container">
                                    <div class="product_title">
                                        <p>Price Price </p>
                                    </div>
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    <div class="product_title">
                                        <p>$2000</p>
                                    </div>
                                </div>
                                <div class="space15">&nbsp;</div>
                            </li>
                            <li>
                                <div class="d-flex flex-md-row flex-column justify-content-between viewed_title_container">
                                    <div class="product_title">
                                        <p>Price Price </p>
                                    </div>
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    <div class="product_title">
                                        <p>$2000</p>
                                    </div>
                                </div>
                                <div class="space15">&nbsp;</div>
                            </li>
                            <li>
                                <div class="d-flex flex-md-row flex-column justify-content-between viewed_title_container">
                                    <div class="product_title">
                                        <p>Price Price </p>
                                    </div>
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    <div class="product_title">
                                        <p>$2000</p>
                                    </div>
                                </div>
                                <div class="space15">&nbsp;</div>
                            </li>
                            <li>
                                <div class="d-flex flex-md-row flex-column justify-content-between viewed_title_container">
                                    <div class="product_title">
                                        <p>Price Price </p>
                                    </div>
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    <div class="product_title">
                                        <p>$2000</p>
                                    </div>
                                </div>
                                <div class="space15">&nbsp;</div>
                            </li>
                            <li>
                                <div class="d-flex flex-md-row flex-column justify-content-between viewed_title_container">
                                    <div class="product_title">
                                        <p>Price Price </p>
                                    </div>
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    <div class="product_title">
                                        <p>$2000</p>
                                    </div>
                                </div>
                                <div class="space15">&nbsp;</div>
                            </li>
                            <li>
                                <div class="d-flex flex-md-row flex-column justify-content-between viewed_title_container">
                                    <div class="product_title">
                                        <p>Price Price </p>
                                    </div>
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    <div class="product_title">
                                        <p>$2000</p>
                                    </div>
                                </div>
                                <div class="space15">&nbsp;</div>
                            </li>
                            <li>
                                <div class="d-flex flex-md-row flex-column justify-content-between viewed_title_container">
                                    <div class="product_title">
                                        <p>Price Price </p>
                                    </div>
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    <div class="product_title">
                                        <p>$2000</p>
                                    </div>
                                </div>
                                <div class="space15">&nbsp;</div>
                            </li>
                            <li>
                                <div class="d-flex flex-md-row flex-column justify-content-between viewed_title_container">
                                    <div class="product_title">
                                        <p>Price Price </p>
                                    </div>
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    <div class="product_title">
                                        <p>$2000</p>
                                    </div>
                                </div>
                                <div class="space15">&nbsp;</div>
                            </li>
                            <li>
                                <div class="d-flex flex-md-row flex-column justify-content-between viewed_title_container">
                                    <div class="product_title">
                                        <p>Price Price </p>
                                    </div>
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    <div class="product_title">
                                        <p>$2000</p>
                                    </div>
                                </div>
                                <div class="space15">&nbsp;</div>
                            </li>
                            <li>
                                <div class="d-flex flex-md-row flex-column justify-content-between viewed_title_container">
                                    <div class="product_title">
                                        <p>Price Price </p>
                                    </div>
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    <div class="product_title">
                                        <p>$2000</p>
                                    </div>
                                </div>
                                <div class="space15">&nbsp;</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('footer')
<script src="source/user/js/product_custom.js"></script>
@endsection