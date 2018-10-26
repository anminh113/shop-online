@extends('user/master')
@section('head')
<link rel="stylesheet" type="text/css" href="source/user/plugins/slick-1.8.0/slick.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/responsive.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/header_css.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/trangchu.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/index.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/star-rating-svg.css">


@endsection
@section('content')


<!-- Banner -->
<div class="banner">
    @foreach ($data['products'] as $item)
    @if(!empty($item['saleOff']) && $item['saleOff']['dateEnd'] > $time)
    <div class="banner_background" style="background: #C9D6FF; background: -webkit-linear-gradient(to right, #E2E2E2, #C9D6FF); background: linear-gradient(to right, #E2E2E2, #C9D6FF); "></div>
    <div class="container fill_height">
        <div class="row fill_height">
            <div class="banner_product_image">
                @foreach ($result['datatext'] as $da )
                @foreach ($da['imageList'] as $da1)
                @if($item['_id'] == $da['productId'])
                {{-- @foreach($da1['imageList'] as $da2) --}}
                <img src={{$da1['imageURL']}} class="rounded float-right" width="400" alt="">
                @break
                {{-- @endforeach --}}
                @endif
                @endforeach
                @endforeach
            </div>
            <div class="col-lg-8 offset-lg-12 fill_height">
                <div class="banner_content">
                    <h1 class="banner_text" style="">{{$item['overviews'][0]['title']}}</h1>

                    <div class="banner_price" style="">
                        <span> {{number_format($item['price'])}},000₫
                        </span>
                       
                        {{number_format($item['price'] - ($item['price'] *
                            $item['saleOff']['discount'])/100)}},000₫
                    </div>

                    <div class="banner_product_name">{{$item['productName']}}</div>
                    <div class="btn banner_button"><a href="{{ route('san-pham',$item['_id'] )}}">Xem chi tiết</a></div>
                </div>
            </div>
        </div>
    </div>
    {{-- @continue --}}
    @break
    @endif
    @endforeach
</div>

<!-- Hot New Arrivals -->
<div class="new_arrivals" style="padding-bottom: 0px;">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabbed_container">
                    <div class="tabs clearfix tabs-right">
                        <div class="new_arrivals_title">Sản phẩm bán chạy</div>
                        <ul class="clearfix">
                            <li class="active"><a href="#" style="color:#000">Xem thêm</a> </li>
                        </ul>
                        <div class="tabs_line"><span></span></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12" style="z-index:1;">
                            <!-- Product Panel -->
                            <div class="product_panel panel active">
                                <div class="arrivals_slider slider">
                                        <?php $i = 0?>
                                    @foreach($resultproductPurchase['datatextproductPurchase'] as $item)
                                 
                                    <!-- Slider Item -->
                                    <div class="arrivals_slider_item" style="height:350px; float: left">
                                        <div class="border_active"></div>
                                        <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                @foreach ($resultproductPurchaseImage['datatextproductPurchaseImage'] as $da )
                                                @foreach ($da['imageList'] as $da1)
                                                @if($item['product']['_id'] == $da['productId'])
                                                <img src={{$da1['imageURL']}} class="rounded float-right" width="120" height="120" alt="">
                                                @break
                                                @endif
                                                @endforeach
                                                @endforeach
                                            </div>
                                            <div class="product_content">
                                                @if($item['product']['saleOff']['dateEnd'] > $time)
                                                <div class="product_price" style="color:#F00026; ">{{number_format($item['product']['price']
                                                    - ($item['product']['price'] *
                                                    $item['product']['saleOff']['discount'])/100)}},000₫<span style="text-decoration:line-through">{{number_format($item['product']['price'])}},000₫</span></div>
                                                @else
                                                <div class="product_price" style=" color:#000; ">{{number_format($item['product']['price'])}},000₫</div>
                                                @endif
                                                <div class="product_name">
                                                    <div><a href="{{ route('san-pham',$item['product']['_id'] )}}" tabindex="0">{{$item['product']['productName']}}</a></div>
                                                    <div id="parent">
                                                    <div class="text1 "><div class="my-rating-{{$item['product']['_id']}}" style="margin-right: 0px;display: inline-block;vertical-align: middle;"></div></div>
                                                    <div class="text2"> <div style="color: #9e9e9e;font-size: 12px;display: -webkit-inline-box;vertical-align: middle;">({{$resultproductPurchase['0'][$i]['count']}})</div> </div>
                                                    </div>
                                                </div>
                                                <div class="product_extras">
                                                    <a href="{{route('gio-hang',$item['product']['_id'])}}"><button
                                                        class="product_cart_button">Thêm vào giỏ</button></a>
                                                </div>
                                            </div>
                                            {{-- <div class="product_fav"><i class="fas fa-heart"></i></div> --}}
                                            <ul class="product_marks">
                                                <li class="product_mark product_discount">-25%</li>
                                                <li class="product_mark product_new">Hot</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Slider Item -->
                                    <?php $i = $i + 1?>
                                    @endforeach
                               


                                </div>
                                <div class="arrivals_slider_dots_cover"></div>
                            </div>

                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Popular Categories -->
<div class="popular_categories">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="popular_categories_content">
                    <div class="popular_categories_title">Danh mục phổ biến</div>
                    <div class="popular_categories_slider_nav">
                        <div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                        <div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                    </div>
                    {{-- <div class="popular_categories_link"><a href="#">full catalog</a></div> --}}
                </div>
            </div>
            <!-- Popular Categories Slider -->
            <div class="col-lg-9">
                <div class="popular_categories_slider_container">
                    <div class="owl-carousel owl-theme popular_categories_slider">
                        @foreach($dataproducttypes['productTypes'] as $item)
                        <!-- Popular Categories Item -->
                        <div class="owl-item" >
                            <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                <div class="popular_category_image"><img src="{{$item['imageURL']}}" width="50" height="60"  onclick="window.location='{{route('post-producttype-danhsach-sanpham',$item['_id'])}}';"></div>
                                <div class="popular_category_text"  onclick="window.location='{{route('post-producttype-danhsach-sanpham',$item['_id'])}}';">{{$item['productTypeName']}}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Deals of the week -->
<div class="deals_featured">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">
                <!-- Deals -->
                <div class="deals">
                    <div class="deals_title">Giảm giá trong tuần</div>
                    <div class="deals_slider_container">
                        <!-- Deals Slider -->
                        <div class="owl-carousel owl-theme deals_slider">
                            @foreach ($data['products'] as $item)
                            @if(!empty($item['saleOff']) && $item['saleOff']['dateEnd'] > $time)
                            <!-- Deals Item -->
                            <div class="owl-item deals_item">
                                <div class="deals_image">
                                    @foreach ($result['datatext'] as $da )
                                    @foreach ($da['imageList'] as $da1)
                                    @if($item['_id'] == $da['productId'])
                                    {{-- @foreach($da1['imageList'] as $da2) --}}
                                    <img src={{$da1['imageURL']}} alt="">
                                    @break
                                    {{-- @endforeach --}}
                                    @endif
                                    @endforeach
                                    @endforeach
                                </div>
                                <div class="deals_content">
                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                        <div class="deals_item_category"><a href="#">{{$item['productType']['productTypeName']}}</a></div>
                                        <div class="deals_item_price_a ml-auto"> {{number_format($item['price'])}},000₫</div>
                                    </div>
                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                        <div class="deals_item_name"><a href="{{ route('san-pham',$item['_id'] )}}"
                                                style="color: #000">{{$item['productName']}}</a></div>
                                        <div class="deals_item_price ml-auto">{{number_format($item['price'] -
                                            ($item['price'] * $item['saleOff']['discount'])/100)}},000₫</div>
                                    </div>
                                    <div class="deals_timer d-flex flex-row align-items-center justify-content-start">

                                        <div class="deals_timer_content ml-auto">
                                            <div class="deals_timer_box clearfix" data-target-time="{{$item['saleOff']['dateEnd']}}">
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer2_hr" class="deals_timer_hr"></div>
                                                    <span>Giờ</span>
                                                </div>
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer2_min" class="deals_timer_min"></div>
                                                    <span>Phút</span>
                                                </div>
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer2_sec" class="deals_timer_sec"></div>
                                                    <span>Giây</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- @break --}}
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="deals_slider_nav_container">
                            <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
                            <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
                        </div>
                </div>
                <!-- Featured -->
                <div class="featured">
                    <div class="tabbed_container">
                        <div class="tabs ">
                            <ul class="clearfix">
                                <li class="active">Đang giảm giá</li>
                              
                            </ul> 
                            <div class="tabs_line"><span></span></div>
                        </div>
                       
                        <!-- Product Panel -->
                        <div class="product_panel panel active">
                            <div class="featured_slider slider">
                                <!-- Slider Item -->
                                @foreach ($data['products'] as $item )                              
                                @if(!empty($item['saleOff']) && $item['saleOff']['dateEnd'] > $time)
                                <!-- Slider Item -->
                                <div class="featured_slider_item">
                                    <div class="border_active"></div>
                                    <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                            @foreach ($result['datatext'] as $da )
                                            @foreach ($da['imageList'] as $da1)
                                            @if($item['_id'] == $da['productId'])
                                            {{-- @foreach($da1['imageList'] as $da2) --}}
                                            <img src={{$da1['imageURL']}} width="115" height="115" alt="">
                                            @break
                                            {{-- @endforeach --}}
                                            @endif
                                            @endforeach
                                            @endforeach
                                        </div>
                                        <div class="product_content">
                                            <div class="product_price discount">{{number_format($item['price'] -
                                                ($item['price'] * $item['saleOff']['discount'])/100)}},000₫<span style="text-decoration:line-through">
                                                    {{number_format($item['price'])}},000₫</span></div>
                                            <div class="product_name">
                                                <div><a href="{{ route('san-pham',$item['_id'] )}}">{{$item['productName']}}</a></div>
                                            </div>
                                            <div class="product_extras">

                                                <a href="{{route('gio-hang',$item['_id'])}}"><button class="product_cart_button">Thêm
                                                        vào giỏ </button></a>
                                            </div>
                                        </div>
                                        {{-- <div class="product_fav"><i class="fas fa-heart"></i></div> --}}
                                        <ul class="product_marks">
                                            <li class="product_mark product_discount">-{{$item['saleOff']['discount']}}%</li>
                                            <li class="product_mark product_new">new</li>
                                        </ul>
                                    </div>
                                </div>
                                @endif
                               
                                @endforeach

                            </div>

                            <div class="featured_slider_dots_cover"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="brands"></div>

<!-- Best Sellers -->
<div class="best_sellers">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabbed_container">
                    <div class="tabs clearfix tabs-right">
                        <div class="new_arrivals_title">Gợi ý sản phẩm cho bạn</div>
                        <ul class="clearfix">
                                <li class="active"><a href="#" style="color:#000">Xem thêm</a> </li>
                        </ul>
                        <div class="tabs_line"><span></span></div>
                    </div>
                    <div class="bestsellers_panel panel active">
                        <!-- Best Sellers Slider -->
                     
                        <div class="bestsellers_slider slider">
                            <!-- Best Sellers Item -->
                            <?php $i = 1?>
                            <?php $j = 0?>
                            @foreach ($data['products'] as $item )
                            <?php $i = $i + 1?>
                            @if(!empty($item['saleOff']) )
                            <div class="bestsellers_item discount" style="height: 200px">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image">
                                            @foreach ($result['datatext'] as $da )
                                            @foreach ($da['imageList'] as $da1)
                                            @if($item['_id'] == $da['productId'])
                                            {{-- @foreach($da1['imageList'] as $da2) --}}
                                            <img src={{$da1['imageURL']}} width="115" height="115" alt="">
                                            @break
                                            {{-- @endforeach --}}
                                            @endif
                                            @endforeach
                                            @endforeach</div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="">{{$item['productType']['productTypeName']}}</a></div>
                                        <div class="bestsellers_name">
                                            <a href="{{ route('san-pham',$item['_id'] )}}">{{$item['productName']}}</a>
                                        </div>  
                                        <div id="parent">
                                            <div class="text1 "><div class="my-rating-{{$item['_id']}}" style="margin-right: 0px;display: inline-block;vertical-align: middle;"></div></div>
                                            <div class="text2"> <div style="color: #9e9e9e;font-size: 12px;display: -webkit-inline-box;vertical-align: middle;">({{$data['0'][$j]['count']}})</div> </div>
                                        </div>
                                        <div class="bestsellers_price discount">
                                             @if(empty($item['saleOff']) || $item['saleOff']['dateEnd'] > $time)
                                                {{number_format($item['price'] - ($item['price'] * $item['saleOff']['discount'])/100)}},000₫<span>{{number_format($item['price'])}},000₫</span>
                                                @else
                                               {{number_format($item['price'])}},000₫
                                                @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    @if(empty($item['saleOff']) || $item['saleOff']['dateEnd'] > $time)
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-{{$item['saleOff']['discount']}}%</li>
                                    </ul>
                                    @endif
                            </div>
                            @endif

                            @if(empty($item['saleOff']))
                            <div class="bestsellers_item " style="height: 200px">
                                <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image">
                                            @foreach ($result['datatext'] as $da )
                                            @foreach ($da['imageList'] as $da1)
                                            @if($item['_id'] == $da['productId'])
                                            {{-- @foreach($da1['imageList'] as $da2) --}}
                                            <img src={{$da1['imageURL']}} width="115" height="115" alt="">
                                            @break
                                            {{-- @endforeach --}}
                                            @endif
                                            @endforeach
                                            @endforeach</div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">{{$item['productType']['productTypeName']}}</a></div>
                                        <div class="bestsellers_name">
                                            <a href="{{ route('san-pham',$item['_id'] )}}">{{$item['productName']}}</a>
                                            <div id="parent">
                                                    <div class="text1 "><div class="my-rating-{{$item['_id']}}" style="margin-right: 0px;display: inline-block;vertical-align: middle;"></div></div>
                                                    <div class="text2"> <div style="color: #9e9e9e;font-size: 12px;display: -webkit-inline-box;vertical-align: middle;">({{$data['0'][$j]['count']}})</div> </div>
                                                </div>
                                        </div>
                                        <div class="bestsellers_price "> {{number_format($item['price'])}},000₫</div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                
                            </div>
                            @endif
                                @if($i>11)
                                @break
                                @endif
                                <?php $j = $j + 1?>
                            @endforeach
                        </div>
                      

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@include('user/RecentlyViewed')
@include('user/Brands')

@endsection


@section('footer')
<script src="source/user/plugins/slick-1.8.0/slick.js"></script>
<script src="source/user/js/custom.js"></script>
<script src="source/user/styles/js/jquery.star-rating-svg.js"></script>
@foreach($resultproductPurchase['datatextproductPurchase'] as $item)
@if(!empty($datajson1['countsar']))
    @foreach ($datajson1['countsar'] as $da )
        @if($da['id'] == $item['product']['_id']) 
        <script>
            $(function () {
                $(".my-rating-{{$item['product']['_id']}}").starRating({
                    readOnly: true,
                    initialRating: '{{$da['value']}}',
                    starGradient: {
                        start: '#F4E800',
                        end: '#F4E800'
                    },
                    starShape: '#F4E800',
                    emptyColor: '#FFF',
                    starSize: 20,
                    strokeColor: '#F4E800',
                    strokeWidth: 30,
                });
            });
        </script>
        @endif
    @endforeach
        @if($da['id'] != $item['product']['_id']) 
        <script>
            $(function () {
                $(".my-rating-{{$item['product']['_id']}}").starRating({
                    readOnly: true,
                    initialRating: 0,
                    starGradient: {
                        start: '#F4E800',
                        end: '#F4E800'
                    },
                    starShape: '#F4E800',
                    emptyColor: '#FFF',
                    starSize: 20,
                    strokeColor: '#F4E800',
                    strokeWidth: 30,
                });
            });
        </script>
        @endif
@else 
    <script>
        $(function () {
            $(".my-rating-{{$item['product']['_id']}}").starRating({
                readOnly: true,
                initialRating: 0,
                starGradient: {
                    start: '#F4E800',
                    end: '#F4E800'
                },
                starShape: '#F4E800',
                emptyColor: '#FFF',
                starSize: 20,
                strokeColor: '#F4E800',
                strokeWidth: 30,
 
            });
 
        });
 
    </script>
@endif

@endforeach



@foreach($data['products'] as $item)
@if(!empty($datajson_gus['id']) )
    @if($datajson_gus['id'] == $item['_id']) 
    <script>
         var countstar ='{{number_format((5 * $countstar_5_guss + 4 * $countstar_4_guss + 3 * $countstar_3_guss + 2 * $countstar_2_guss + 1 * $countstar_1_guss)/($countstar_5_guss+$countstar_4_guss+$countstar_3_guss+$countstar_2_guss+$countstar_1_guss), 1, '.', '')}}';
        $(function () {
            $(".my-rating-{{$item['_id']}}").starRating({
                readOnly: true,
                initialRating: countstar,
                starGradient: {
                    start: '#F4E800',
                    end: '#F4E800'
                },
                starShape: '#F4E800',
                emptyColor: '#FFF',
                starSize: 20,
                strokeColor: '#F4E800',
                strokeWidth: 30,

            });

        });

    </script>
   @else 
   <script>
       $(function () {
           $(".my-rating-{{$item['_id']}}").starRating({
               readOnly: true,
               initialRating: 0,
               starGradient: {
                   start: '#F4E800',
                   end: '#F4E800'
               },
               starShape: '#F4E800',
               emptyColor: '#FFF',
               starSize: 20,
               strokeColor: '#F4E800',
               strokeWidth: 30,

           });

       });

   </script>
   @endif
@else 
    <script>
        $(function () {
            $(".my-rating-{{$item['_id']}}").starRating({
                readOnly: true,
                initialRating: 0,
                starGradient: {
                    start: '#F4E800',
                    end: '#F4E800'
                },
                starShape: '#F4E800',
                emptyColor: '#FFF',
                starSize: 20,
                strokeColor: '#F4E800',
                strokeWidth: 30,
 
            });
 
        });
 
    </script>
@endif

@endforeach

@endsection
