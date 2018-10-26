@extends('user/master')
@section('head')
<link rel="stylesheet" type="text/css" href="source/user/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/shop_responsive.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/header_css.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/index.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/star-rating-svg.css">


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
                        <div class="sidebar_section">
                            <div class="sidebar_title">Danh mục liên quan</div>
                            <ul id="accordion" class="accordiontext">
                                @foreach($result1['data1'] as $time => $item )
                                    <li>
                                        <div class="link">{{$data4[$time]['categoryName']}}<i class="fa fa-chevron-down"></i></div>
                                        <ul class="submenu">
                                        @foreach($item['productTypes'] as $text )
                                        <li><label><input  type="checkbox" name="check[]" value=".{{$text['_id']}}" />   {{$text['productTypeName']}}</label></li>
                                        @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>       
                        </div>
                        
                        
                        <div class="sidebar_section filter_by_section">
                            <div class="sidebar_title">Giá</div>
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
             
                        <!-- Shop Content -->
                        <div class="shop_content">
                            <div class="shop_bar clearfix">
                                <div class="shop_product_count" style="font-size: 16px"><span>{{count($data['products'])}}</span> Sản phẩm</div>
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
                                                '')}}@if( $item['saleOff']['dateEnd'] > $time)<span>{{number_format($item['price'])}}</span>@endif</div>
                                            <div class="product_price" style="font-size: 16px" id="price{{$item['_id']}}">{{number_format($item['price']
                                                - ($item['price'] *
                                                $item['saleOff']['discount'])/100)}},000₫@if($item['saleOff']['dateEnd'] > $time)<span>{{number_format($item['price'])}},000₫</span>@endif</div>
                                            <div class="product_name">
                                                <div><a href="{{ route('san-pham',$item['_id'] )}}" tabindex="0">{{$item['productName']}}</a></div>
                                                <div id="parent">
                                                <div class="text1 "><div class="my-rating-{{$item['_id']}}" style="margin-right: 0px;display: inline-block;vertical-align: middle;"></div></div>
                                                    <div class="text2"> <div style="color: #9e9e9e;font-size: 12px;display: -webkit-inline-box;vertical-align: middle;">({{$data['0'][$i]['count']}})</div> </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    
                                        <ul class="product_marks">
                                            <li class="product_mark product_discount">-{{$item['saleOff']['discount']}}%</li>
                                        </ul>
                                    
                                        <a href="{{route('gio-hang',$item['_id'])}}" class="btn btn-outline-info btn-change"
                                            style="font-size: 12px; bottom: 2px">Thêm vào giỏ</a>
                                    </div>
                                @endif

                                @if(empty($item['saleOff']) || $item['saleOff']['dateEnd'] < $time12)
                                    <div class="product_item {{$item['productType']['_id']}}">
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
                                            <div class="product_price1" hidden style="font-size: 16px" id="price{{$item['_id']}}">{{number_format($item['price'],0, '', '')}}</div>

                                            <div class="product_price" style="font-size: 16px" id="price{{$item['_id']}}">{{number_format($item['price'])}},000₫</div>

                                            <div class="product_name">
                                                <div><a href="{{ route('san-pham',$item['_id'] )}}" tabindex="0">{{$item['productName']}}</a></div>
                                                <div id="parent">
                                                    <div class="text1 "><div class="my-rating-{{$item['_id']}}" style="margin-right: 0px;display: inline-block;vertical-align: middle;"></div></div>
                                                    <div class="text2"> <div style="color: #9e9e9e;font-size: 12px;display: -webkit-inline-box;vertical-align: middle;">({{$data['0'][$i]['count']}})</div> </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="product_fav"><i class="fas fa-heart"></i></div> --}}
                                        @if(empty($item['saleOff']))
                                        <ul class="product_marks">
                                            <li class="product_mark product_discount">-{{$item['saleOff']['discount']}}%</li>
                                            <li class="product_mark product_new">new</li>
                                        </ul>
                                        @endif
                                        <a href="{{route('gio-hang',$item['_id'])}}" class="btn btn-outline-info btn-change"
                                            style="font-size: 12px; bottom: 2px">Thêm vào giỏ</a>
                                    </div>
                                @endif
                              


                                <?php $i = $i + 1?>
                                @endforeach

                            </div>

                            <!-- Shop Page Navigation -->
                            <div class="shop_page_nav d-flex flex-row">
                                <div class="page_prev d-flex flex-column align-items-center justify-content-center"><i
                                        class="fas fa-chevron-left"></i></div>
                                <ul class="page_nav d-flex flex-row">
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">...</a></li>
                                    <li><a href="#">21</a></li>
                                </ul>
                                <div class="page_next d-flex flex-column align-items-center justify-content-center"><i
                                        class="fas fa-chevron-right"></i></div>
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
    $checkboxes.change( function() {
    var inclusives = [];
    $checkboxes.each( function( i, elem ) {
        // if checkbox, use value if checked
        if ( elem.checked ) {
        inclusives.push( elem.value );
        }
    });
    var filterValue = inclusives.length ? inclusives.join(', ') : '*';
        console.log(filterValue);
    $container.isotope({ filter: filterValue })
    });

</script>

         

<script>
    $(function() {
        var Accordion = function(el, multiple) {
            this.el = el || {};
            this.multiple = multiple || false;

            // Variables privadas
            var links = this.el.find('.link');
            // Evento
            links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
        }

        Accordion.prototype.dropdown = function(e) {
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

@endsection
