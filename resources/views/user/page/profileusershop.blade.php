@extends('user/master')
@section('head')
    <link rel="stylesheet" type="text/css" href="source/user/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="source/user/styles/shop_responsive.css">
    <link rel="stylesheet" type="text/css" href="source/user/styles/shop_styles.css">

    <link rel="stylesheet" type="text/css" href="source/user/styles/css/header_css.css">
    <link rel="stylesheet" type="text/css" href="source/user/styles/css/profileshop.css">
    <link rel="stylesheet" type="text/css" href="source/user/styles/css/check-cart.css">

    <link rel="stylesheet" type="text/css" href="source/user/styles/css/index.css">
    <style>
        @media (min-width: 1023px) {
            .modal-lg {
                max-width: 1024px;
            }
        }
    </style>

@endsection

@section('content')




    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="home">
                    <div class="home_background "
                         style="background: #12c2e9;background: -webkit-linear-gradient(to right, #f64f59, #c471ed, #12c2e9);background: linear-gradient(to right, #f64f59, #c471ed, #12c2e9); "></div>
                    <div class="home_overlay"></div>
                    <div class="home_content d-flex flex-column align-items-left justify-content-center">
                        <div class="text-center"></div>
                    </div>
                </div>
                <div class="space20">&nbsp;</div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                <a href="javascript:void(0)" style="text-decoration: none;color: #000"
                   onclick="openCity(event, 'sanpham');">
                    <div class=" tablink bottombar w3-padding border-red text-center">Danh sách yêu thích</div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                <a href="javascript:void(0)" style="text-decoration: none;color: #000"
                   onclick="openCity(event, 'hoso');">
                    <div class=" tablink bottombar w3-padding text-center">Gian hàng đã theo dõi</div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                <a href="javascript:void(0)" style="text-decoration: none;color: #000"
                   onclick="window.location='{{ route('profile-user',Session::get('keyuser')['info'][0]['customer']['_id'])}}';">
                    <div class=" tablink  w3-padding border-red text-center">Thông tin cá nhân</div>
                </a>
            </div>
            <div class="col-lg-12">
                <div id="sanpham" class="tabcontent" style="display: block;">
                    <div class="characteristics">
                        @foreach ($datawl['wishList'] as $key1 => $item1)
                            @if($item1['product'] === null)
                                <div class="order">
                                    <div class="order-item">
                                        <div class="row">
                                            <div class="col-lg-2">
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="item-main item-main-mini">
                                                    <div>
                                                        <div class="text title item-title" style="font-size:16px">Sản
                                                            phẩm không
                                                            tồn tại
                                                        </div>
                                                        <p class="text desc"></p>
                                                        <p class="text desc bold"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">


                                            </div>
                                        </div>
                                        <div class="col-lg-2">

                                        </div>
                                    </div>
                                </div>
                                <div class="space10">&nbsp;</div>
                                @continue
                            @else
                                @foreach ($resultproduct['dataproduct'] as $key => $item)
                                    @if(!empty($dataproduct))
                                        <div class="order">
                                            <div class="order-item">
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <div class="item-pic"><img
                                                                    src="{{$dataproductimgae[$key]['imageList'][0]['imageURL']}}"
                                                                    width="115" height="115"></div>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="item-main item-main-mini">
                                                            <div>
                                                                <div class="text title item-title"
                                                                     style="font-size:16px"><a
                                                                            href="{{ route('san-pham',$item['product']['_id'] )}}">{{$item['product']['productName']}}</a>
                                                                </div>
                                                                <p class="text desc"></p>
                                                                <p class="text desc bold"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="item-quantity">
                                                            @if(!empty($item['product']['saleOff']) &&
                                                            $item['product']['saleOff']['dateEnd'] >
                                                            $time12)
                                                                <div class="price"><span class="currPrice"  >{{number_format($item['product']['price']
                                                - ($item['product']['price'] *
                                                $item['product']['saleOff']['discount'])/100)}},000₫</span>
                                                                    <div class="originPrice">
                                                                        <span class="origin-price-value">{{number_format($item['product']['price'])}},000₫</span>
                                                                        <span class="promotion">-{{$item['product']['saleOff']['discount']}}
                                                                            %</span>
                                                                    </div>
                                                                </div>
                                                            @elseif(empty($item['product']['saleOff']) ||
                                                            $item['product']['saleOff']['dateEnd'] < $time12)
                                                                <div class="price">
                                                                    <span class="currPrice">{{number_format($item['product']['price'])}},000₫</span>
                                                                </div>
                                                            @endif

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="item-status item-capsule">
                                                            <div class="price">
                                                                <a href="{{route('gio-hang',$item['product']['_id'])}}"
                                                                   class="btn btn-outline-info btn-save"
                                                                   style="width: 125px;font-size: 14px">Thêm
                                                                    vào giỏ</a>
                                                                <div style="margin-bottom: 10px "></div>
                                                                <button type="submit" onclick="archiveFunction()"
                                                                        form="wishList{{$item['product']['_id']}}"
                                                                        class="btn btn-outline-danger"
                                                                        style="width: 125px;font-size: 14px">Xóa
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="{{route('delete-wishList')}}"
                                                  id="wishList{{$item['product']['_id']}}" method="post">
                                                <input type="text" hidden name="productId"
                                                       value="{{$item['product']['_id']}}">
                                                @method('DELETE')
                                                {{ csrf_field() }}
                                            </form>
                                        </div>
                                        <div class="space10">&nbsp;</div>
                                    @else
                                        <div class="order">
                                            <div class="order-item">
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        {{-- <div class="item-pic"><img src="{{$dataproductimgae[$key]['imageList'][0]['imageURL']}}"
                                                                width="115" height="115"> </div> --}}
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="item-main item-main-mini">
                                                            <div>
                                                                <div class="text title item-title"
                                                                     style="font-size:16px">Sản phẩm không
                                                                    tồn
                                                                    tại
                                                                </div>
                                                                <p class="text desc"></p>
                                                                <p class="text desc bold"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">


                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    {{-- <div class="item-status item-capsule">
                                                        <div class="price">
                                                            <a href="{{route('gio-hang',$item['product']['_id'])}}" class="btn btn-outline-info btn-save"
                                                                style="width: 125px;font-size: 14px">Thêm
                                                                vào giỏ</a>
                                                            <div style="margin-bottom: 10px "></div>
                                                            <button type="submit" form="wishList{{$item['product']['_id']}}" class="btn btn-outline-danger"
                                                                style="width: 125px;font-size: 14px">Xóa</button>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="space10">&nbsp;</div>
                                    @endif

                                @endforeach
                            @endif
                                @break
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div id="hoso" class="tabcontent" style="display:none">
                    <div class="characteristics">
                        @foreach ($resultStore['dataStore'] as $key =>$item)
                            <div class="order">
                                <div class="order-info">
                                    <div class="row">
                                        <div class="col-lg-6 text-left">{{$item['store']['storeName']}}</div>
                                        <div class="col-lg-6 text-right" style="font-size: 12px;">ĐANG THEO DÕI
                                            <span>|</span>
                                            <a href="{{route('profileshop',$item['store']['_id'])}}">THAM
                                                QUAN</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-item">
                                    <div class="row">
                                        <?php $i = 1;
                                        shuffle($dataProductStore[$key]['products'] );
                                        ?>
                                        @foreach ($dataProductStore[$key]['products'] as $key1 => $da)
                                            <?php $i = $i + 1?>
                                            <div class="col-lg-3">
                                                <!-- Product Item -->
                                                <div class="product_item  product-shop">
                                                    <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                        @foreach ($dataimgproduct as $item1)
                                                            @if($item1['productId'] == $da['_id'] )
                                                                <img src="{{$item1['imageList'][0]['imageURL']}}"
                                                                     alt="" width="115" height="115">
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <div class="product_content">
                                                        <div class="product_name">
                                                            <div><a href="{{ route('san-pham',$da['_id'] )}}"
                                                                    tabindex="0">{{$da['productName']}}</a></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            @if($i>4)
                                                @break
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="space10">&nbsp;</div>
                        @endforeach
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
    <script src="source/user/styles/js/datacontry.js"></script>
    <script src="source/user/js/shop_custom.js"></script>
    <script src="source/user/styles/js/register.js"></script>
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
