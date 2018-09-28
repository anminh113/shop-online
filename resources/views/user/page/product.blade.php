@extends('user/master')
@section('head')
<link rel="stylesheet" type="text/css" href="source/user/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/product_responsive.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/product_css.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/header_css.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/index.css">

@endsection
@section('content')

@foreach ($resultdata['data'] as $item)
<!-- Single Product -->
<div class="single_product">
    <div class="container">
        <div class="row">
            <!-- Images -->
            <div class="col-lg-2 order-lg-1 order-2">
                <ul class="image_list">
                        @foreach ($resultimg['datatext'] as $da )
                        @foreach ($da['images'] as $da1)  
                        <li data-image={{$da1["imageURL"]}}><img src={{$da1["imageURL"]}} alt=""></li>
                        @endforeach 
                    @endforeach
                </ul>
            </div>
            <!-- Selected Image -->
            <div class="col-lg-5 order-lg-2 order-1">
                    @foreach ($resultimg['datatext'] as $da )
                    @foreach ($da['images'] as $da1)   
                    <div class="image_selected"><img src={{$da1["imageURL"]}} alt=""></div>
                            @break
                    @endforeach 
                @endforeach
            </div>
            <!-- Description -->
            <div class="col-lg-5 order-3">
                <div class="product_description">
                    <div class="product_category">{{$item['product']['productType']['productTypeName']}}</div>
                    <div class="product_name">{{$item['product']['productName']}}</div>
                    <div class="rating_r rating_r_2 product_rating"> <i></i> <i></i> <i></i> <i></i> <i></i> </div>
                    <div class="product_price">
                        <span class="text-danger" style="font-size: 22px" id="price">{{$item['product']['price']}}.000₫</span>
                        <span style="font-size: 16px; text-decoration: line-through;">{{$item['product']['price']}}.000₫</span>
                        <span style="font-size: 21px"> -{{$item['product']['saleOff']['discount']}}%</span>
                    </div>
                    <div class="product_text">
                        {{$item['product']['overviews'][0]['value']}} ...
                    </div>
                    <div class="order_info d-flex flex-row">
                        <form action="#">
                            <div class="clearfix" style="z-index: 1000;">
                                <!-- Product Quantity -->
                                <div class="product_quantity clearfix">
                                    <span>Số Lượng: </span>
                                    <input id="quantity_input" type="text" pattern="[1-9]*" value="1" disabled style="background-color: #fff;">
                                    <div class="quantity_buttons">
                                        <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                                        <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                                    </div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                               
                            </div>
                            <div class="button_container">
                                <a href="{{route('gio-hang',$item['product']['productId'])}}" class="btn btn-outline-info btn-change btn-buy" ><div class="img-buy"></div>Thêm Vào Giỏ </a>
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
                                    <div class="char_icon"><img style="width: 30px;height: 30px" src="source/user/images/icons8-truck-50.png"
                                            alt=""></div>
                                    <div class="char_content">
                                        <div class="char_subtitle">Miễn phí vận chuyển với đơn hàng từ 3 sản phẩm trở lên</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Char. Item -->
                            <div class="col-lg-4 col-md-6 char_col">
                                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                                    <div class="char_icon"><img style="width: 30px;height: 30px" src="source/user/images/icons8-protect-50.png"
                                            alt=""></div>
                                    <div class="char_content">
                                        <div class="char_subtitle">Thanh toán bảo mật</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Char. Item -->
                            <div class="col-lg-4 col-md-6 char_col">
                                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                                    <div class="char_icon"><img style="width: 30px;height: 30px" src="source/user/images/icons8-update-50.png"
                                            alt=""></div>
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

                        @foreach ($item['product']['overviews'] as $item2)
                            @if ( count($item2['title']) === 1)
                                
                            @else
                                <div class="single_post_title">{{$item2['title']}}</div>
                            @endif
                                <div class="single_post_text">
                                        <p>{{$item2['value']}}</p>
                                    </div>
                        @endforeach 


                    </div>
                    <div class="col-lg-5 col-md-5 order-lg-2 order-md-1 order-1 ">
                        <div class="viewed_title_container">
                            <h3 class="viewed_title">Thông Số Kỹ Thuật</h3>
                        </div>
                        <div class="space15">&nbsp;</div>
                        <div class="container">
                            <ul>

                                <?php $i = 1?>
                                @foreach ($item['product']['specifications'] as $item1)
                                <?php $i = $i + 1?>
                                <li>
                                    <div class="d-flex flex-md-row flex-column justify-content-between viewed_title_container">
                                        <div class="product_title">
                                            <p>{{$item1['title']}}</p>
                                        </div>
                                        &nbsp; &nbsp; &nbsp; &nbsp;
                                        <div class="product_title">
                                            <p>{{$item1['value']}}</p>
                                        </div>
                                    </div>
                                    <div class="space15">&nbsp;</div>
                                </li>
                                @if($i>5)
                                    @break
                                @endif
                                @endforeach
                                

                            </ul>
                            <button type="button" class="btn btn-outline-info btn-change" style="width: 100%" data-toggle="modal" data-target="#information">Xem
                                thông số chi tiết</button>
                            <div class="space15">&nbsp;</div>
                        </div>
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
                                @foreach ($item['product']['specifications'] as $item1)
                                <li>
                                    <div class="d-flex flex-md-row flex-column justify-content-between viewed_title_container">
                                        <div class="product_title">
                                            <p>{{$item1['title']}}</p>
                                        </div>
                                        &nbsp; &nbsp; &nbsp; &nbsp;
                                        <div class="product_title">
                                            <p>{{$item1['value']}}</p>
                                        </div>
                                    </div>
                                    <div class="space15">&nbsp;</div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach


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
<script src="source/user/js/product_custom.js"></script>

<script>
    var a = ('{{$item['product']['price']}}' - ('{{$item['product']['price']}}' * '{{$item['product']['saleOff']['discount']}}'/100) );
    document.getElementById('price').innerHTML = a.toPrecision(4)+".000₫";
</script>

@endsection