@extends('user/master')
@section('head')
<link rel="stylesheet" type="text/css" href="source/user/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/shop_responsive.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/header_css.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/profileshop.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/index.css">
<style>
    .text_field.contact_form_message.error{
        border: 1px solid #FA1111;
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

                </div>
            </div>
            <div class="space10">&nbsp;</div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-6">
            <a href="javascript:void(0)" style="text-decoration: none;color: #000" onclick="openCity(event, 'sanpham');">
                <div class=" tablink bottombar w3-padding border-red text-center">Đánh giá</div>
            </a>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-6">
            <a href="javascript:void(0)" style="text-decoration: none;color: #000" onclick="window.location='{{route('review-shop',Session::get('keyuser')['info'][0]['customer']['_id'])}}';">
                <div class=" tablink bottombar w3-padding text-center">Nhận xét của tôi</div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
            <a href="javascript:void(0)" style="text-decoration: none;color: #000" onclick="window.location='{{ route('profile-user',Session::get('keyuser')['info'][0]['customer']['_id'] )}}';">
                <div class=" tablink  w3-padding border-red text-center">Thông tin cá nhân</div>
            </a>
        </div>
        <div class="col-lg-12">
            <div id="sanpham" class="tabcontent" style="display: block;">
                <div class="characteristics">
                    <form id="fb-form" action="{{route('post-write-review-shop')}}" method="POST" name="review-shop-product">
                        <input type="text" hidden name="orderitemId" value="{{$OrderItemId}}">
                        <div class="row">
                            <div class="col-lg-7" style="margin-top: 15px">
                                <div style="padding-left: 5px;font-size: 15px; padding-bottom: 10px;">Nhận xét và đánh giá sản phẩm đã mua (5 sao: Rất Tốt - 1 sao: Rất Tệ)</div>
                                <div class="row" style="padding-left: 5px;">
                                    <div class="col-lg-2">
                                        @foreach ($resultimg['datatext'] as $da )
                                        @foreach ($da['imageList'] as $da1)
                                          <img src={{$da1["imageURL"]}} width="85" height="85">
                                                <input type="text" hidden name="image" value="{{$da1["imageURL"]}}">
                                        @break
                                        @endforeach
                                        @endforeach

                                    </div>
                                    <div class="col-lg-10">
                                        <div style="padding-left: 5px;font-size: 14px; padding-bottom: 10px;">{{$resultdata['data'][0]['product']['productName']}}</div>
                                        <input type="text" hidden name="ProductName" value="{{$resultdata['data'][0]['product']['productName']}}">
                                        <span class="content-star-rate">
                                            <fieldset class="rating">
                                                <input type="radio" required="required" id="star5" name="ratingproduct" value="5" form="fb-form" />
                                                <label class="full" for="star5" data-toggle="tooltip" title="Tuyệt vời - 5 sao"></label>

                                                <input type="radio" id="star4" name="ratingproduct" value="4" form="fb-form" />
                                                <label class="full" for="star4" data-toggle="tooltip" title="Khá tốt - 4 sao"></label>

                                                <input type="radio" id="star3" name="ratingproduct" value="3" form="fb-form"  checked/>
                                                <label class="full" for="star3" data-toggle="tooltip" title="Bình thường - 3 sao"></label>

                                                <input type="radio" id="star2" name="ratingproduct" value="2" form="fb-form" />
                                                <label class="full" for="star2" data-toggle="tooltip" title="Tệ - 2 sao"></label>

                                                <input type="radio" id="star1" name="ratingproduct" value="1" form="fb-form" />
                                                <label class="full" for="star1" data-toggle="tooltip" title="Quá tệ - 1 star"></label>
                                            </fieldset>
                                        </span>
                                        <br>
                                        <div class="space10">&nbsp;</div>
                                        <div class="contact_form_text" style="padding-left: 5px;margin-top: 34px">
                                            <div style="color: #757575;font-size: 14px; "> Đánh giá chi tiết</div>
                                            <textarea id="contact_form_message" data-autoresize class="text_field contact_form_message"
                                                name="reviewProduct" rows="7" placeholder="Đánh giá..." required="required"
                                                data-error="Please, write us a message."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="section-title" style="font-size:16px"> Bán bởi <a href="{{route('profileshop',$resultdata['data'][0]['product']['store']['_id'])}}">{{$resultdata['data'][0]['product']['store']['storeName']}}</a> </div>
                                <div style="color: #757575;padding-left: 5px;font-size: 14px; padding-bottom: 10px;"> Nhận xét và đánh giá nhà bán hàng:</div>
                                <div class="text123">
                                    <img alt="" class="filter__seller-rating" title="Rất tốt" src="source/user/images/icon-verygood.png"
                                        id="imgClickAndChangeVeryGood">
                                    <img alt="" class="filter__seller-rating" title="Tốt" src="source/user/images/icon-good-color.png"
                                        id="imgClickAndChangeGood">
                                    <img alt="" class="filter__seller-rating" title="Tệ" src="source/user/images/icon-bad.png"
                                        id="imgClickAndChangeBad">
                                </div>
                                <div class="space20">&nbsp;</div>
                                <div class="contact_form_text" style="padding-left: 5px;">
                                    <div class="space20">&nbsp;</div>
                                    <div style="color: #757575;font-size: 14px; "> Đánh giá chi tiết</div>
                                    <textarea id="contact_form_message" data-autoresize class="text_field contact_form_message"
                                        name="reviewShop" rows="7" placeholder="Đánh giá..." required="required" data-error="Please, write us a message."></textarea>
                                </div>
                            </div>
                            <div class="col-lg-9"></div>
                            <div class="col-lg-3"><button type="submit" class="btn btn-outline-warning btn-save" style="right:0;height: 50px;width: 100%;font-size: 16px; margin-top: 10px">Gửi đánh giá</button></div>
                        </div>
                        <div id="RatingLevelShop"><input hidden type="text" name="ratingLevel" value="2"></div>
                        <input type="text" hidden name="productId" value="{{$resultdata['data'][0]['product']['_id']}}">
                        <input type="text" hidden name="storeId" value="{{$resultdata['data'][0]['product']['store']['_id']}}">
                        {{ csrf_field() }}
                    </form>
                    <script>
                        $(document).ready(function() {
                            $("form[name='review-shop-product']").validate({
                                errorElement: "em",
                                submitHandler: function(form) {
                                    form.submit();
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>


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
            $('#RatingLevelShop').html(' <input hidden type="text" name="ratingLevel" value="1">')
            $('#imgClickAndChangeGood').attr('src', 'source/user/images/icon-good.png');
            $('#imgClickAndChangeBad').attr('src', 'source/user/images/icon-bad.png');

        } else if (id == 'imgClickAndChangeGood') {
            $('#imgClickAndChangeVeryGood').attr('src', 'source/user/images/icon-verygood.png');
            $('#imgClickAndChangeGood').attr('src', 'source/user/images/icon-color-good.png');
             $('#RatingLevelShop').html(' <input hidden type="text" name="ratingLevel" value="2">')
            $('#imgClickAndChangeBad').attr('src', 'source/user/images/icon-bad.png');
        } else {
            $('#imgClickAndChangeVeryGood').attr('src', 'source/user/images/icon-verygood.png');
            $('#imgClickAndChangeGood').attr('src', 'source/user/images/icon-good.png');
            $('#imgClickAndChangeBad').attr('src', 'source/user/images/icon-color-bad.png');
             $('#RatingLevelShop').html(' <input hidden type="text" name="ratingLevel" value="3">')
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
