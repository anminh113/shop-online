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

                </div>
            </div>
            <div class="space10">&nbsp;</div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
            <a href="javascript:void(0)" style="text-decoration: none;color: #000" onclick="openCity(event, 'sanpham');">
                <div class=" tablink bottombar w3-padding border-red text-center">Chưa viết đánh giá
                   </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
            <a href="javascript:void(0)" style="text-decoration: none;color: #000" onclick="openCity(event, 'hoso');">
                <div class=" tablink bottombar w3-padding text-center">Lịch sử đánh giá</div>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
            <a href="javascript:void(0)" style="text-decoration: none;color: #000" onclick="window.location='{{ route('profile-user',Session::get('keyuser')['_id'] )}}';">
                <div class=" tablink  w3-padding border-red text-center">Thông tin cá nhân</div>
            </a>
        </div>
        <div class="col-lg-12">
            <div id="sanpham" class="tabcontent" style="display: block;">
                <div class="characteristics">
                       
                    @foreach ($dataorder['orders'] as $item => $orderitem )
                    @foreach($resultorderitem['dataorderitem'][$item]['orderItems'] as $text )
                    @if($dataorder['orders'][$item]['orderState']['orderStateName'] == "Đã giao hàng"  && $text['isReview'] == false)
                    <div class="order">
                        <div class="accordion order-info">Đơn hàng {{$dataorder['orders'][$item]['_id']}} <span> |</span>
                            <span>{{$dataorder['orders'][$item]['totalQuantity']}}</span> Sản phẩm
                        </div>
                        <div class="panel order-item">
                              
                            @foreach($resultorderitem['dataorderitem'][$item]['orderItems'] as $text )
                            @if($text['orderItemState']['orderStateName'] == "Đã giao hàng"  && $text['isReview'] == false)
                         
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="item-pic"><img src="{{$text['product']['imageURL']}}" width="115"
                                            height="115"> </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="item-main item-main-mini">
                                        <div>
                                            <div class="text title item-title" data-spm="details_title">
                                                {{$text['product']['productName']}}
                                            </div>
                                            <p class="text desc"></p>
                                            <p class="text desc bold"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="item-quantity" style=" width: 100%; "><span><span class="text desc info multiply">Số
                                                lượng:&nbsp;{{$text['quantity']}}</span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="item-status item-capsule">
                                        <p class="capsule">{{$dataorder['orders'][$item]['orderState']['orderStateName']}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="item-info">
                                        <button type="button" class="btn btn-outline-warning btn-save" onclick="window.location='{{route('write-review-shop',$text['_id'])}}';"
                                            style="width: 100%;font-size: 14px; margin-top: 10px">Viết đánh giá</button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                           
                          
                            @endif
                           
                            @endforeach

                        </div>
                    </div>
                    <div class="space10">&nbsp;</div>
                    @endif
                    @endforeach
                    @endforeach



                </div>
            </div>
            <div id="hoso" class="tabcontent" style="display:none">
                <div class="characteristics">
                    <div class="row">
                        
                      
                        
                        <div class="col-lg-7">
                         
                                @foreach($datareviewproduct['reviewProducts'] as $key => $item)
                                <div style="padding-left: 5px;font-size: 13px; padding-bottom: 12px;">Nhận xét và đánh giá
                                        sản phẩm đã mua (5 sao: Rất Tốt - 1 sao: Rất Tệ)</div>
                            <div class="row" style="padding-left: 5px;">

                                <div class="col-lg-12">
                                    <div style="padding-left: 5px;font-size: 14px; padding-bottom: 10px;"><a href="{{ route('san-pham',$item['product']['_id'] )}}"
                                            tabindex="0">{{$item['product']['productName']}}</a></div>
                                    <div style="color: #757575;"> Nhận xét và đánh giá sản phẩm:</div>       
                                    <div class="rating_r rating_r_{{$item['ratingStar']['ratingStar']}} product_rating">
                                        <i></i><i></i><i></i><i></i><i></i>
                                    </div>
                                    <div class="space20">&nbsp;</div>
                                    <div class="contact_form_text" style="padding-left: 5px;">
                                        <div style="color: #000;font-size: 14px; "> Đánh giá chi tiết:
                                            {{$item['review']}}</div>
                                        <div class="contact_form_text" style="margin-left: 10px"></div>
                                       
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @endforeach
                        </div>
                      
                      
                        <div class="col-lg-5">
                                @foreach($datareviewshop['reviewStores'] as $key1 => $item1)
                            <div class="section-title" style="font-size:16px"> Bán bởi <a href="{{route('profileshop',$item1['store']['_id'])}}">{{$item1['store']['storeName']}}</a>
                            </div>
                            <div style="color: #757575;padding-left: 5px;font-size: 14px; padding-bottom: 10px;"> Nhận
                                xét và đánh giá nhà bán hàng:</div>
                            <div class="text123">
                                @if($item1['ratingLevel']['ratingLevel'] == 1)
                                <img alt="" class="filter__seller-rating" title="Rất tốt" src="source/user/images/icon-color-verygood.png"
                                    id="imgClickAndChangeVeryGood">
                                <img alt="" class="filter__seller-rating" title="Tốt" src="source/user/images/icon-good.png"
                                    id="imgClickAndChangeGood">
                                <img alt="" class="filter__seller-rating" title="Tệ" src="source/user/images/icon-bad.png"
                                    id="imgClickAndChangeBad">
                                @elseif($item1['ratingLevel']['ratingLevel'] == 2)
                                <img alt="" class="filter__seller-rating" title="Rất tốt" src="source/user/images/icon-verygood.png"
                                    id="imgClickAndChangeVeryGood">
                                <img alt="" class="filter__seller-rating" title="Tốt" src="source/user/images/icon-color-good.png"
                                    id="imgClickAndChangeGood">
                                <img alt="" class="filter__seller-rating" title="Tệ" src="source/user/images/icon-bad.png"
                                    id="imgClickAndChangeBad">
                                @else
                                <img alt="" class="filter__seller-rating" title="Rất tốt" src="source/user/images/icon-verygood.png"
                                    id="imgClickAndChangeVeryGood">
                                <img alt="" class="filter__seller-rating" title="Tốt" src="source/user/images/icon-good.png"
                                    id="imgClickAndChangeGood">
                                <img alt="" class="filter__seller-rating" title="Tệ" src="source/user/images/icon-color-bad.png"
                                    id="imgClickAndChangeBad">
                                @endif
                            </div>
                            <div class="contact_form_text" style="padding-left: 5px;">
                                <div class="space20">&nbsp;</div>
                                <div style="font-size: 14px; "> Đánh giá chi tiết: {{$item1['review']}}</div>

                            </div>
                            <hr>
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

@endsection
