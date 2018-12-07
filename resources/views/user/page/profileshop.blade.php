@extends('user/master')
@section('head')
<link rel="stylesheet" type="text/css" href="source/user/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/shop_responsive.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/header_css.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/profileshop.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/index.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/star-rating-svg.css">


<style type="text/css">
    .bar-verygood {
        height: 16px;
        background-color: #FFCC40;
    }

    .bar-good {
        height: 16px;
        background-color: #FFCC40;
    }

    .bar-bad {
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
                        <div class="char_icon"><img src="source/user/images/icons8-home-page-100.png" style="width: 70px"
                                alt=""></div>
                        <div class="char_content">
                            <div class="char_title">{{$datashop['store']['storeName']}}</div>
                            <div class="char_subtitle">{{$datafollowcount['count']}} Lượt theo dõi</div>
                            <div class="char_subtitle">{{$countrating}}% Đánh giá tích cực</div>
                        </div>
                        @if($datafollow == '')
                        <div class="char_icon" style="margin-left: 20px">
                            <button type="submit" form="Follow" style="border-radius: 53%;border: none">
                                <img src="source/user/images/icons8-plus-64.png" style="width: 65px; " alt="">
                            </button>
                            <div class="char_subtitle" style="text-align: center">Theo dõi</div>
                        </div>
                       @else
                        <div class="char_icon" style="margin-left: 20px">
                            <button type="submit" form="FollowDelete" style="border-radius: 53%;border: none">
                                <img src="source/user/images/icons8-cancel-64.png" style="width: 65px" alt="">
                            </button>
                            <div class="char_subtitle" style="text-align: center">Bỏ theo dõi</div>
                        </div>
                        @endif
                       
                        <form action="{{route('post-follow')}}" id="Follow" method="post">
                            <input type="text" hidden name="storeId" value="{{$datashop['store']['_id']}}">
                            {{ csrf_field() }}
                        </form>
                        <form action="{{route('delete-follow')}}" id="FollowDelete" method="post">
                            <input type="text" hidden name="storeId" value="{{$datashop['store']['_id']}}">
                            @method('DELETE')
                            {{ csrf_field() }}
                        </form>


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
                                <ul id="accordion" class="accordiontext">
                                    @foreach($result1['data1'] as $time => $item )
                                    <li>
                                        <div class="link">{{$data4[$time]['categoryName']}}<i class="fa fa-chevron-down"></i></div>
                                        <ul class="submenu">
                                            @foreach($item['productTypes'] as $text )
                                            <li><label><input type="checkbox" value=".{{$text['_id']}}" />
                                                    {{$text['productTypeName']}}</label></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="sidebar_section filter_by_section">
                                <div class="sidebar_subtitle brands_subtitle">Giá</div>
                                <div class="filter_price">
                                    <div id="slider-range" class="slider_range"></div>
                                    <p style="width: 100%">
                                        <input type="text" id="amount1" class="amount" readonly style="border:0; font-weight:bold; width: 100%">

                                        <input type="text" hidden id="amount" class="amount" readonly style="border:0; font-weight:bold; width: 100%">
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-9 col-md-9">
                            <h3 class="viewed_title">{{$datashop['store']['storeName']}}</h3>
                            <!-- Shop Content -->
                            <div class="shop_content">
                                <div class="shop_bar clearfix">
                                    <div class="shop_product_count" style="font-size: 16px"><span>{{count($data['products']
                                            )}}</span> Sản phẩm</div>
                                    {{-- <input type="text" id="quicksearch" placeholder="Search" /> --}}
                                    <div class="shop_sorting">
                                        <span>Sắp xếp theo:</span>
                                        <ul>
                                            <li>
                                                <span class="sorting_text">Độ phổ biến <i class="fas fa-chevron-down"></span></i>
                                                <ul>
                                                    <li class="shop_sorting_button" data-isotope-option='original-order'>Độ
                                                        phổ biến</li>
                                                    <li class="shop_sorting_button" data-isotope-option='PriceIncrease'>Giá
                                                        tăng dần</li>
                                                    <li class="shop_sorting_button" data-isotope-option='PriceReduction'>Giá
                                                        giảm dần</li>
                                                    <li class="shop_sorting_button" data-isotope-option='name'>name</li>
                                                    <!-- <li class="shop_sorting_button" data-filter="numberGreater">300 > number > 5000</li> -->
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>


                                <div class="product_grid">
                                    <div class="product_grid_border"></div>
                                    <?php $i = 0?>
                                    @foreach ($data['products'] as $item )

                                    <!-- Product Item -->
                                    @if(!empty($item['saleOff']) && $item['saleOff']['dateEnd'] > $time12)
                                    <div class="product_item {{$item['productType']['_id']}}  discount">
                                        <div class="product_border"></div>
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
                                            <div class="product_price1" hidden style="font-size: 16px" id="price{{$item['_id']}}">{{number_format($item['price']
                                                - ($item['price'] * $item['saleOff']['discount'])/100, 0, '',
                                                '')}}@if( $item['saleOff']['dateEnd'] > $time)<span>{{number_format($item['price'], 0, '',
                                                '')}}</span>@endif</div>
                                            <div class="product_price" style="font-size: 16px;color: #F00026;" id="price{{$item['_id']}}">{{number_format($item['price']
                                                - ($item['price'] *
                                                $item['saleOff']['discount'])/100)}},000₫@if($item['saleOff']['dateEnd']
                                                > $time)<span>{{number_format($item['price'])}},000₫</span>@endif</div>
                                            <div class="product_name">
                                                <div><a href="{{ route('san-pham',$item['_id'] )}}" tabindex="0">{{$item['productName']}}</a></div>
                                                <div id="parent">
                                                    <div class="text1 ">
                                                        <div class="my-rating-{{$item['_id']}}" style="margin-right: 0px;display: inline-block;vertical-align: middle;"></div>
                                                    </div>
                                                    <div class="text2">
                                                        <div style="color: #9e9e9e;font-size: 12px;display: -webkit-inline-box;vertical-align: middle;">({{$data['0'][$i]['count']}})</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <ul class="product_marks">
                                            <li class="product_mark product_discount">-{{$item['saleOff']['discount']}}%</li>
                                        </ul>

                                        @if($item['quantity'] > 0 )
                                            <a href="{{route('gio-hang',$item['_id'])}}" class="btn btn-outline-info btn-change"
                                               style="font-size: 12px; bottom: 2px">Thêm vào giỏ</a>
                                        @else
                                            <a href="" class="btn btn-outline-save btn-save"
                                               style="font-size: 12px; bottom: 2px;pointer-events: none;">Tạm hết hàng</a>
                                        @endif
                                    </div>
                                    @endif

                                    @if(empty($item['saleOff']) || $item['saleOff']['dateEnd'] < $time12) <div class="product_item {{$item['productType']['_id']}}">
                                        <div class="product_border"></div>
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
                                            <div class="product_price1" hidden style="font-size: 16px" id="price{{$item['_id']}}">{{number_format($item['price'],0,
                                                '', '')}}<span>{{number_format($item['price'], 0, '',
                                                '')}}</span></div>

                                            <div class="product_price" style="font-size: 16px;color: #F00026;" id="price{{$item['_id']}}">{{number_format($item['price'])}},000₫</div>

                                            <div class="product_name">
                                                <div><a href="{{ route('san-pham',$item['_id'] )}}" tabindex="0">{{$item['productName']}}</a></div>
                                                <div id="parent">
                                                    <div class="text1 ">
                                                        <div class="my-rating-{{$item['_id']}}" style="margin-right: 0px;display: inline-block;vertical-align: middle;"></div>
                                                    </div>
                                                    <div class="text2">
                                                        <div style="color: #9e9e9e;font-size: 12px;display: -webkit-inline-box;vertical-align: middle;">({{$data['0'][$i]['count']}})</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if(empty($item['saleOff']))
                                        <ul class="product_marks">
                                            <li class="product_mark product_discount">-{{$item['saleOff']['discount']}}%</li>
                                            <li class="product_mark product_new">new</li>
                                        </ul>
                                        @endif
                                            @if($item['quantity'] > 0 )
                                                <a href="{{route('gio-hang',$item['_id'])}}" class="btn btn-outline-info btn-change"
                                                   style="font-size: 12px; bottom: 2px">Thêm vào giỏ</a>
                                            @else
                                                <a href="" class="btn btn-outline-save btn-save"
                                                   style="font-size: 12px; bottom: 2px;pointer-events: none;">Tạm hết hàng</a>
                                            @endif
                                </div>
                                @endif

                                <?php $i = $i + 1?>
                                @endforeach

                            </div>

                            <!-- Shop Page Navigation -->
                                <div class="shop_page_nav d-flex flex-row" id="pagination">
                                    <div class="page_prev d-flex flex-column align-items-center justify-content-center" id="Previous">
                                    </div>
                                    <ul class="page_nav d-flex flex-row" id="test">
                                    </ul>
                                    <div class="page_next d-flex flex-column align-items-center justify-content-center"  id="testnext">
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
                                <div class="char_icon"><img style="width: 30px;height: 30px" src="source/user/images/icons8-place-marker-100.png"
                                        alt=""></div>
                                <div class="char_content">
                                    <div class="char_title">{{$datashop['store']['location']}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Char. Item -->
                    <div class="col-lg-4 col-md-6 char_col">
                        <div class="char_item ">
                            <div class="char_title_top">Danh mục Chính</div>
                            <div class="d-flex flex-row align-items-center justify-content-start">
                                <div class="char_icon"><img style="width: 30px;height: 30px" src="source/user/images/icons8-categorize-240.png"
                                        alt=""></div>
                                <div class="char_content">
                                    <div class="char_title">
                                        @foreach($datashop['store']['categories'] as $item)
                                        {{$item['category']['categoryName']}},
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Char. Item -->
                    <div class="col-lg-4 col-md-6 char_col">
                        <div class="char_item ">
                            <div class="char_title_top">Thời gian trên CyberZone</div>
                            <div class="d-flex flex-row align-items-center justify-content-start">
                                <div class="char_icon"><img style="width: 30px;height: 30px" src="source/user/images/icons8-time-128.png"
                                        alt=""></div>
                                <div class="char_content">
                                    <div class="char_title">Từ ngày {{$createdTime}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="section-title">Điểm đánh giá trung bình</div>
                        <div class="rating-overview">
                            <div class="left">
                                <div class="score">
                                    <label class="average">{{$countrating}}%</label>
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
                                        @if($datareviewshop['count'] != 0)
                                        <div class="col-lg-12">
                                            <div class="side">
                                                <div class="tillet">Tốt</div>
                                            </div>
                                            <div class="middle">
                                                <div class="bar-container">
                                                    <div class="bar-verygood" style=" width: {{number_format(($countstar_1 / $datareviewshop['count'])*100 , 0, '', '')}}%;"></div>
                                                </div>
                                            </div>
                                            <div class="side right">
                                                <div class="tillet">{{$countstar_1}}</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="side">
                                                <div class="tillet">Trung bình</div>
                                            </div>
                                            <div class="middle">
                                                <div class="bar-container">
                                                    <div class="bar-good" style=" width: {{number_format(($countstar_2 / $datareviewshop['count'])*100 , 0, '', '')}}%;"></div>
                                                </div>
                                            </div>
                                            <div class="side right">
                                                <div class="tillet"> {{$countstar_2}}</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="side">
                                                <div class="tillet">Chưa tốt</div>
                                            </div>
                                            <div class="middle">
                                                <div class="bar-container">
                                                    <div class="bar-bad" style=" width: {{number_format(($countstar_3 / $datareviewshop['count'])*100 , 0, '', '')}}%;"></div>
                                                </div>
                                            </div>
                                            <div class="side right">
                                                <div class="tillet"> {{$countstar_3}}</div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="col-lg-12">
                                            <div class="side">
                                                <div class="tillet">Tốt</div>
                                            </div>
                                            <div class="middle">
                                                <div class="bar-container">
                                                    <div class="bar-verygood" style=" width:0%;"></div>
                                                </div>
                                            </div>
                                            <div class="side right">
                                                <div class="tillet">0</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="side">
                                                <div class="tillet">Trung bình</div>
                                            </div>
                                            <div class="middle">
                                                <div class="bar-container">
                                                    <div class="bar-good" style=" width: 0%;"></div>
                                                </div>
                                            </div>
                                            <div class="side right">
                                                <div class="tillet"> 0</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="side">
                                                <div class="tillet">Chưa tốt</div>
                                            </div>
                                            <div class="middle">
                                                <div class="bar-container">
                                                    <div class="bar-bad" style=" width: 0%;"></div>
                                                </div>
                                            </div>
                                            <div class="side right">
                                                <div class="tillet"> 0</div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="section-title"> Nhận xét và đánh giá nhà bán hàng ({{$datareviewshop['count']}})</div>
                        <div class="sis-seller-reviews">
                            @if($datareviewshop['count'] != 0)
                            @foreach(array_reverse($datareviewshop['reviewStores'],true) as $item => $timereview)
                            <div class="seller-review-item">
                                <div class="row rate">
                                    @if($timereview['ratingLevel']['ratingLevel'] == 1)
                                    <img class="" src="source/user/images/icon-color-verygood.png" width="24" height="24">&nbsp;&nbsp;<span>
                                        {{$timereview['ratingLevel']['description']}}</span>
                                    @endif
                                    @if($timereview['ratingLevel']['ratingLevel'] == 2)
                                    <img class="" src="source/user/images/icon-color-good.png" width="24" height="24">&nbsp;&nbsp;<span>
                                        {{$timereview['ratingLevel']['description']}}</span>
                                    @endif
                                    @if($timereview['ratingLevel']['ratingLevel'] == 3)
                                    <img class="" src="source/user/images/icon-color-bad.png" width="24" height="24">&nbsp;&nbsp;<span>
                                        {{$timereview['ratingLevel']['description']}}</span>
                                    @endif

                                </div>
                                <div class="row">
                                    <label class="comments">{{$timereview['review']}}</label>
                                </div>
                                <div class="row reviewer">
                                    <label class="itemFooter">{{$timereview['customer']['name']}} -
                                        {{$timereviewshop[$item]}}</label>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="seller-review-item">

                                <div class="row">
                                    <label class="comments">Chưa có đánh giá về gian hàng</label>
                                </div>

                            </div>
                            @endif
                        </div>
                    </div>
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
<script src="source/user/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="source/user/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="source/user/plugins/parallax-js-master/parallax.min.js"></script>
<script src="source/user/js/shop_custom.js"></script>
<script>
    // init Isotope
    var $container = $('.product_grid').isotope({
        itemSelector: '.product_item'
    });
    // filter with selects and checkboxes
    var $checkboxes = $('#accordion input');
    $checkboxes.change(function () {
        var inclusives = [];
        $checkboxes.each(function (i, elem) {
            // if checkbox, use value if checked
            if (elem.checked) {
                inclusives.push(elem.value);
            }
        });
        var filterValue = inclusives.length ? inclusives.join(', ') : '*';
        console.log(filterValue);
        $container.isotope({
            filter: filterValue
        })
    });

</script>
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
    $(function () {
        var Accordion = function (el, multiple) {
            this.el = el || {};
            this.multiple = multiple || false;

            // Variables privadas
            var links = this.el.find('.link');
            // Evento
            links.on('click', {
                el: this.el,
                multiple: this.multiple
            }, this.dropdown)
        }

        Accordion.prototype.dropdown = function (e) {
            var $el = e.data.el;
            $this = $(this),
                $next = $this.next();

            $next.slideToggle();
            $this.parent().toggleClass('open');

            // if (!e.data.multiple) {
            // 	$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
            // };
        }

        var accordion = new Accordion($('#accordion'), false);
    });

</script>


@foreach ($data['products'] as $time => $item )
@if(!empty($datajson1['countsar']))
@foreach ($datajson1['countsar'] as $da )
@if($da['id'] == $item['_id'])
<script>
    $(function () {
        $(".my-rating-{{$item['_id']}}").starRating({
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
@if($da['id'] != $item['_id'])
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
<script>
    var date12 = '{{$time12}}';

</script>
<script src="source/user/styles/js/jquery.star-rating-svg.js"></script>
<script src="source/user/js/pagination.js"></script>

@endsection
