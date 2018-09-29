
@extends('user/master')
@section('head')
<link rel="stylesheet" type="text/css" href="source/user/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/shop_responsive.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/header_css.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/index.css">

@endsection
@section('content')



<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- Home -->
            <div class="home">
                <div class="home_background" style="background: #bdc3c7; background: -webkit-linear-gradient(to right, #2c3e50, #bdc3c7); background: linear-gradient(to right, #2c3e50, #bdc3c7); "></div>
                <div class="home_overlay"></div>
                <div class="home_content d-flex flex-column align-items-left justify-content-center">
                </div>
            </div>
            <!-- Shop -->
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
                        {{-- <h3 class="viewed_title">HARA Shop</h3> --}}
                        <!-- Shop Content -->
                        <div class="shop_content">
                            <div class="shop_bar clearfix">
                            <div class="shop_product_count" style="font-size: 16px"><span>{{count($data['products'] )}}</span> Sản phẩm</div>
                                <div class="shop_sorting">
                                    <span>Sắp xếp theo:</span>
                                    <ul>
                                        <li>
                                            <span class="sorting_text">Độ phổ biến <i class="fas fa-chevron-down"></span></i>
                                            <ul>
                                                <li class="shop_sorting_button" data-isotope-option='original-order'>Độ phổ biến</li>
                                                <li class="shop_sorting_button" data-isotope-option='PriceIncrease'>Giá tăng dần</li>
                                                <li class="shop_sorting_button" data-isotope-option='PriceReduction'>Giá giảm dần</li>
                                                <!-- <li class="shop_sorting_button" data-filter="numberGreater">300 > number > 5000</li> -->
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_grid">
                                <div class="product_grid_border"></div>
                                @foreach ($data['products'] as $item )
                                    <!-- Product Item -->
                                    <div class="product_item discount">
                                        <div class="product_border"></div>
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                @foreach ($result['datatext'] as $da )
                                                @foreach ($da['images'] as $da1)   
                                                    @if($item['productId']== $da1['productId']) 
                                                    <img src={{$da1["imageURL"]}} width="115" height="115" alt="">
                                                        @break
                                                    @endif
                                                @endforeach 
                                            @endforeach
                                        </div>
                                        
                                        <div class="product_content">
                                        <div class="product_price" style="font-size: 16px" id="price{{$item['productId']}}">{{$item['price']}} ₫<span>{{$item['price']}} ₫</span></div>
                                            <div class="product_name">
                                                <div><a href="{{ route('san-pham',[$item['productId'], preg_replace('/\+/', '-', urlencode($item['productName'])) ])}}" tabindex="0">{{$item['productName']}}</a></div>
                                            </div>
                                        </div>
                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="product_marks">
                                            <li class="product_mark product_discount">-{{$item['saleOff']['discount']}}%</li>
                                            <li class="product_mark product_new">new</li>
                                        </ul>
                                        <a href="{{route('gio-hang',$item['productId'])}}" class="btn btn-outline-info btn-change" style="font-size: 12px; bottom: 2px">Thêm vào giỏ</a>
                                    </div>
                                    <script>
                                            var a = {{$item['price']}} - ({{$item['price']}} * {{$item['saleOff']['discount']}}/100);
                                            document.getElementById('price{{$item['productId']}}').innerHTML = a.toPrecision(4)+".000₫ <span>{{$item['price']}}.000₫</span>";
                                    </script>
                                   
                                @endforeach
                               
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
<!-- Newsletter -->
<!--  <div class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                    <div class="newsletter_title_container">
                        <div class="newsletter_icon"><img src="images/send.png" alt=""></div>
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
</div> -->

@endsection


@section('footer')
<script src="source/user/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="source/user/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="source/user/plugins/parallax-js-master/parallax.min.js"></script>
<script src="source/user/js/shop_custom.js"></script>


@endsection

