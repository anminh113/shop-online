@extends('user/master')
@section('head')
<link rel="stylesheet" type="text/css" href="source/user/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/product_responsive.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/product_css.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/header_css.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/index.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/lightgallery.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/star-rating-svg.css">




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
                    @foreach ($da['imageList'] as $da1)
                    <li data-image={{$da1["imageURL"]}}><img src={{$da1["imageURL"]}} alt=""></li>

                    @endforeach
                    @endforeach
                </ul>
            </div>
            <!-- Selected Image -->
            <div class="col-lg-5 order-lg-2 order-1">
                @foreach ($resultimg['datatext'] as $da )
                    @foreach ($da['imageList'] as $da1)
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
                    <div style="width:100%; display: table-cell; vertical-align: middle; text-align: left;">
                        <div class="my-rating-9" style="margin-right: 8px;display: inline-block;vertical-align: middle;"></div>
                        <a style="color: #9e9e9e;font-size: 12px;display: inline-block;vertical-align: middle;">({{$datareview['count']}}
                            nhận xét)</a>
                    </div>
                    <div class="product_price">
                        @if(empty($item['product']['saleOff']) || $item['product']['saleOff']['dateEnd'] < $timeend) 
                            <span class="text-danger" style="font-size: 22px" >{{number_format($item['product']['price'])}},000₫</span>
                        @else 
                            <span class="text-danger" style="font-size: 22px" >{{number_format($item['product']['price']- ($item['product']['price'] *$item['product']['saleOff']['discount'])/100)}},000₫</span>
                            <span style="font-size: 16px; text-decoration: line-through;">{{number_format($item['product']['price'])}},000₫</span>
                            <span style="font-size: 21px"> -{{$item['product']['saleOff']['discount']}}%</span>
                        @endif

                    </div>
                    <div class="product_text">
                        {{$item['product']['overviews'][0]['value']}} ...
                    </div>
                    <div class="space10">&nbsp;</div>
                    <label style="margin-top: -12px;color: #9e9e9e;font-size: 12px;">còn
                        {{$item['product']['quantity']}} sản phẩm</label>
                    <div class=" d-flex flex-row">
                        <form action="{{route('post-gio-hang')}}" id="add" method="post">
                            <div class="clearfix" style="z-index: 1000;">
                                <input type="text" hidden name="productid" value="{{$item['product']['_id']}}">
                                <!-- Product Quantity -->

                                <div class="quantity">
                                    <span>Số Lượng: </span>
                                    <input type="number" name="qty" min="1" max="{{$item['product']['quantity']}}" step="1" value="1">
                                </div>

                             
                                @if($datawl == '')
                                <button type="submit" form="WL"  class="product_fav"  ><i class="fas fa-heart" ></i></button>
                                @else
                                <div class="product_fav active"  ><i class="fas fa-heart" ></i></div>
                                @endif
                              
                            </div>
                            <div class="button_container">
                                <button type="submit" class="btn btn-outline-info btn-change btn-buy">
                                    <div class="img-buy"></div>Thêm Vào Giỏ
                                </button>
                            </div>
                            {{ csrf_field() }}
                        </form>

                    <form action="{{route('post-wishList')}}" id="WL" method="post">
                        <input type="text" hidden name="productId" value="{{$item['product']['_id']}}">
                        {{ csrf_field() }}
                    </form>
                    
                    </div>
                    <hr>
              
                        <div class="d-flex flex-row">
                            <div class="char_icon"><img style="width: 40px;height: 40px" src="https://png.icons8.com/ultraviolet/40/000000/small-business.png" alt=""></div>
                            <div class="char_content">
                            <div class="char_title">Được bán bởi {{$item['product']['store']['storeName']}}</div>
                                <div class="char_subtitle">{{$item['product']['store']['location']}}</div>
                            </div>
                            <div class="space10">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</div>
                            <div class="char_icon"><div class="btn btn-outline- btn-save" style="font-size:12px"  onclick="window.location='{{route('profileshop',$item['product']['store']['_id'])}}';">Xem Shop </div> </div>
                        </div>
                        <hr>
                </div>
            </div>
            <div class="col-lg-7 order-3">
                <div class="characteristics" style="    padding-top: 40px;padding-bottom: 0px;">
                    <div class="container">
                        <div class="row">
                            <!-- Char. Item -->
                            <div class="col-lg-4 col-md-6 char_col">
                                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                                    <div class="char_icon"><img style="width: 30px;height: 30px" src="source/user/images/icons8-truck-50.png"
                                            alt=""></div>
                                    <div class="char_content">
                                        <div class="char_subtitle">Miễn phí vận chuyển với đơn hàng từ 1,000,000₫</div>
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
                        @if(!empty($item2['title']))
                        <div class="single_post_title">{{$item2['title']}}</div>
                        @else
                        <div></div>
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
                            <button type="button" class="btn btn-outline-info btn-change" style="width: 100%"
                                data-toggle="modal" data-target="#information">Xem
                                thông số chi tiết</button>
                            <div class="space15">&nbsp;</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="space10">&nbsp;</div>
        <div class="viewed_title_container">
            <h4 class="viewed_title">Nhận xét và đánh giá về {{$item['product']['productName']}}</h4>
        </div>

        <div class="row">
            <div class="col-lg-12">
                {{-- <div class="section-title"> Điểm đánh giá trung bình</div> --}}
                <div class="rating-overview">
                    <div class="right">
                        <div class="row">
                            @if($datareview['count'] != 0)
                                <div class="col-lg-2">
                                    <div class="score">
                                        <label class="average">{{number_format((5 * $countstar_5 + 4 * $countstar_4 + 3 * $countstar_3 + 2 * $countstar_2 + 1 * $countstar_1)/($countstar_5+$countstar_4+$countstar_3+$countstar_2+$countstar_1), 1, '.', '')}}<span class="countText" style="font-size: 29px">/5</span></label>
                                    </div>
                                    <div class="count">
                                        <div class="countText">
                                            Đánh giá tích cực
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="scoreItem">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="side">
                                                    <div class="rating_r rating_r_5 product_rating"> <i></i> <i></i> <i></i>
                                                        <i></i>
                                                        <i></i> </div>
                                                </div>
                                                <div class="middle">
                                                    <div class="bar-container">
                                                        <div class="bar-5" style="width: {{number_format(($countstar_5 / $datareview['count'])*100 , 0, '', '')}}%"></div>
                                                    </div>
                                                </div>
                                                <div class="sideright">
                                                    <div class="tillet">{{$countstar_5}}</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="side">
                                                    <div class="rating_r rating_r_4 product_rating"> <i></i> <i></i> <i></i>
                                                        <i></i>
                                                        <i></i> </div>
                                                </div>
                                                <div class="middle">
                                                    <div class="bar-container">
                                                        <div class="bar-4" style="width: {{number_format(($countstar_4 / $datareview['count'])*100 , 0, '', '')}}%"></div>
                                                    </div>
                                                </div>
                                                <div class="sideright">
                                                    <div class="tillet"> {{$countstar_4}}</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="side">
                                                    <div class="rating_r rating_r_3 product_rating"> <i></i> <i></i> <i></i>
                                                        <i></i>
                                                        <i></i> </div>
                                                </div>
                                                <div class="middle">
                                                    <div class="bar-container">
                                                        <div class="bar-3" style="width: {{number_format(($countstar_3 / $datareview['count'])*100 , 0, '', '')}}%"></div>
                                                    </div>
                                                </div>
                                                <div class="sideright">
                                                    <div class="tillet"> {{$countstar_3}}</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="side">
                                                    <div class="rating_r rating_r_2 product_rating"> <i></i> <i></i> <i></i>
                                                        <i></i>
                                                        <i></i> </div>
                                                </div>
                                                <div class="middle">
                                                    <div class="bar-container">
                                                        <div class="bar-2" style="width: {{number_format(($countstar_2 / $datareview['count'])*100 , 0, '', '')}}%"></div>
                                                    </div>
                                                </div>
                                                <div class="sideright">
                                                    <div class="tillet"> {{$countstar_2}}</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="side">
                                                    <div class="rating_r rating_r_1 product_rating"> <i></i> <i></i> <i></i>
                                                        <i></i>
                                                        <i></i> </div>
                                                </div>
                                                <div class="middle">
                                                    <div class="bar-container">
                                                        <div class="bar-1" style="width: {{number_format(($countstar_1 / $datareview['count'])*100 , 0, '', '')}}%"></div>
                                                    </div>
                                                </div>
                                                <div class="sideright">
                                                    <div class="tillet"> {{$countstar_1}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-2">
                                    <div class="score">
                                        <label class="average">0<span class="countText" style="font-size: 29px">/5</span></label>
                                    </div>
                                    <div class="count">
                                        <div class="countText">
                                            Đánh giá tích cực
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="scoreItem">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="side">
                                                    <div class="rating_r rating_r_5 product_rating"> <i></i> <i></i> <i></i>
                                                        <i></i>
                                                        <i></i> </div>
                                                </div>
                                                <div class="middle">
                                                    <div class="bar-container">
                                                        <div class="bar-5" style="width: 0%"></div>
                                                    </div>
                                                </div>
                                                <div class="sideright">
                                                    <div class="tillet">{{$countstar_5}}</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="side">
                                                    <div class="rating_r rating_r_4 product_rating"> <i></i> <i></i> <i></i>
                                                        <i></i>
                                                        <i></i> </div>
                                                </div>
                                                <div class="middle">
                                                    <div class="bar-container">
                                                        <div class="bar-4" style="width: 0%"></div>
                                                    </div>
                                                </div>
                                                <div class="sideright">
                                                    <div class="tillet"> {{$countstar_4}}</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="side">
                                                    <div class="rating_r rating_r_3 product_rating"> <i></i> <i></i> <i></i>
                                                        <i></i>
                                                        <i></i> </div>
                                                </div>
                                                <div class="middle">
                                                    <div class="bar-container">
                                                        <div class="bar-3" style="width: 0%"></div>
                                                    </div>
                                                </div>
                                                <div class="sideright">
                                                    <div class="tillet"> {{$countstar_3}}</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="side">
                                                    <div class="rating_r rating_r_2 product_rating"> <i></i> <i></i> <i></i>
                                                        <i></i>
                                                        <i></i> </div>
                                                </div>
                                                <div class="middle">
                                                    <div class="bar-container">
                                                        <div class="bar-2" style="width: 0%"></div>
                                                    </div>
                                                </div>
                                                <div class="sideright">
                                                    <div class="tillet"> {{$countstar_2}}</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="side">
                                                    <div class="rating_r rating_r_1 product_rating"> <i></i> <i></i> <i></i>
                                                        <i></i>
                                                        <i></i> </div>
                                                </div>
                                                <div class="middle">
                                                    <div class="bar-container">
                                                        <div class="bar-1" style="width: 0%"></div>
                                                    </div>
                                                </div>
                                                <div class="sideright">
                                                    <div class="tillet"> {{$countstar_1}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="space10">&nbsp;</div>
                <div class="viewed_title_container">
                    <h5 class="viewed_title">Nhận xét và đánh giá về sản phẩm</h5>
                </div>
                <div class="space10">&nbsp;</div>

                <div class="sis-seller-reviews">
                    @if($datareview['count'] != 0)
                        @foreach ($datareview['reviewProducts'] as $time => $review)
                        <div class="seller-review-item">
                            <div class="row reviewer">
                                <div class="rating_r rating_r_{{$review['ratingStar']['ratingStar']}} product_rating"><i></i><i></i><i></i><i></i><i></i><label
                                        class="itemFooter">{{$review['customer']['name']}} - {{$timereview[$time]}}</label></div>
                            </div>
                            <div class="row">
                                <label class="comments">{{$review['review']}}</label>
                            </div>
                        </div>
                        @endforeach
                    @else 
                        <div class="seller-review-item">
                            <div class="row reviewer">
                            </div>
                            <div class="row">
                                <label class="comments" style="color: #9e9e9e;font-size: 16px;">Hiện chưa có nhận xét nào cho sản phẩm. Cho người khác biết ý kiến của bạn và trở thành người đầu tiên nhận xét sản phẩm này.</label>
                            </div>
                        </div>
                    @endif

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


@include('user/RecentlyViewed')
@include('user/Brands')


@endsection

@section('footer')
<script src="source/user/js/product_custom.js"></script>
<script src="source/user/styles/js/cart.js"></script>
<script src="source/user/styles/js/lightgallery-all.min.js"></script>

@if($datareview['count'] != 0)
<script>
    var countstar ='{{number_format((5 * $countstar_5 + 4 * $countstar_4 + 3 * $countstar_3 + 2 * $countstar_2 + 1 * $countstar_1)/($countstar_5+$countstar_4+$countstar_3+$countstar_2+$countstar_1), 1, '.', '')}}';
    $(function () {
        $(".my-rating-9").starRating({
            readOnly: true,
            initialRating: parseFloat(countstar),
            starGradient: {
                start: '#F4E800',
                end: '#F4E800'
            },
            starShape: '#F4E800',
            emptyColor: '#FFF',
            starSize: 25,
            strokeWidth: 20,
            strokeColor: '#F4E800'
        });
    });

</script>
@else
<script>
    $(function () {
        $(".my-rating-9").starRating({
            readOnly: true,
            initialRating: 0,
            starGradient: {
                start: '#F4E800',
                end: '#F4E800'
            },
            starShape: '#F4E800',
            emptyColor: '#FFF',
            starSize: 25,
            strokeWidth: 20,
            strokeColor: '#F4E800'
        });

    });

</script>
@endif


<script>
    jQuery('<div class="quantity_buttons" style="width: 1px;"><div class="quantity-button quantity_inc btn-pluss"><i\n' + 'class="fas fa-chevron-up"></i></div>' +
        '<div class="quantity-button quantity_dec btn-minuse"><i\n' +
        'class="fas fa-chevron-down"></i></div></div>').insertAfter('.quantity input');
    jQuery('.quantity').each(function() {
        var spinner = jQuery(this),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find('.quantity_inc'),
            btnDown = spinner.find('.quantity_dec'),
            min = input.attr('min'),
            max = input.attr('max');

        btnUp.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

        btnDown.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

    });

</script>
<script src="source/user/styles/js/jquery.star-rating-svg.js"></script>


@endsection
