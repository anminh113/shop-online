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

            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="javascript:void(0)" style="text-decoration: none;color: #000"
                   onclick="openCity(event, 'sanpham');">
                    <div class=" tablink bottombar w3-padding border-red text-center">Quản lý tài khoản</div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                <a href="javascript:void(0)" style="text-decoration: none;color: #000"
                   onclick="openCity(event, 'hoso');">
                    <div class=" tablink bottombar w3-padding text-center">Đơn hàng của tôi</div>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="javascript:void(0)" style="text-decoration: none;color: #000"
                   onclick="window.location='{{route('review-shop',Session::get('keyuser')['info'][0]['customer']['_id'])}}';">
                    <div class=" tablink bottombar w3-padding text-center">Nhận xét của tôi</div>
                </a>
            </div>
            <div class="col-lg-5 col-md-4 col-sm-6 col-6">
                <a href="javascript:void(0)" style="text-decoration: none;color: #000"
                   onclick="window.location='{{route('profile-user-shop',Session::get('keyuser')['info'][0]['customer']['_id'])}}';">
                    <div class=" tablink  w3-padding border-red text-center">Sản phẩm yêu thích & Gian hàng đã theo
                        dõi
                    </div>
                </a>
            </div>
            <div class="col-lg-12">
                <div id="sanpham" class="tabcontent" style="display: block;">
                    <div class="characteristics">
                        <div class="row">
                            <!-- Char. Item -->
                            <div class="col-lg-6 col-md-6 char_col">
                                <div class="char_item " style="height: 235px;">
                                    <div class="char_title_top"><b> Thông tin cá nhân </b><span>|</span> <a href=""
                                                                                                            data-toggle="modal"
                                                                                                            data-target="#informationuser">Chỉnh
                                            Sửa</a></div>
                                    <div class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="char_content">
                                            <div class="char_title"
                                                 style="padding-bottom: 7px; font-size: 14px">{{$datacustomer['customer']['name']}}</div>
                                            <div class="char_title"
                                                 style="padding-bottom: 7px; font-size: 14px">{{$datacustomer['customer']['email']}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--  <!-- Char. Item -->  --}}
                            <div class="col-lg-6 col-md-6 char_col">
                                <div class="char_item " style="height: 235px;">
                                    <div class="char_title_top"><b> Địa chỉ </b><span>|</span> <a href=""
                                                                                                  data-toggle="modal"
                                                                                                  data-target="#information">Chỉnh
                                            Sửa</a></div>
                                    <div class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="char_content">
                                            @if($dataaddress['count']!=0)
                                                <div class="char_title"
                                                     style="padding-bottom: 7px; font-size: 14px; color:#878F90">ĐỊA
                                                    CHỈ VẬN CHUYỂN
                                                </div>
                                                <div class="char_title" style="padding-bottom: 7px; font-size: 15px">
                                                    <b>{{$dataaddress['deliveryAddresses'][0]['presentation']}}</b>
                                                </div>
                                                <div class="char_title"
                                                     style="padding-bottom: 7px; font-size: 15px">{{$dataaddress['deliveryAddresses'][0]['address']}}</div>
                                                <div class="char_title"
                                                     style="padding-bottom: 7px; font-size: 15px">{{$dataaddress['deliveryAddresses'][0]['phoneNumber']}}</div>
                                            @else
                                                <div class="char_title"
                                                     style="padding-bottom: 7px; font-size: 14px; color:#878F90">ĐỊA
                                                    CHỈ VẬN CHUYỂN
                                                </div>
                                                <div class="char_title" style="padding-bottom: 7px; font-size: 15px"><b>Chưa
                                                        có
                                                        địa chỉ giao hàng</b></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="space10">&nbsp;</div>
                            </div>

                            @if(!empty($dataregisterstore))
                                <div class="col-lg-12 col-md-12 char_col">
                                    <div class="char_item" style="height: auto">
                                        <div class="char_title_top"><b> Thông tin đăng ký gian hàng trên hệ thống </b>
                                        </div>
                                        <div class="row">
                                            @foreach ($dataregisterstore['registeredSales'] as $item)
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="d-flex flex-row align-items-center justify-content-start">
                                                        <div class="char_content" style="width:98%">
                                                            <ul class="list-unstyled list-justify">
                                                                <li class="char_title"
                                                                    style="padding-bottom: 7px; font-size: 15px">Tên
                                                                    gian hàng <span>{{$item['storeName']}}</span></li>
                                                                <li class="char_title"
                                                                    style="padding-bottom: 7px; font-size: 15px">Địa chỉ
                                                                    kho <span>{{$item['address']}}</span></li>
                                                                <li class="char_title"
                                                                    style="padding-bottom: 7px; font-size: 15px">Số điện
                                                                    thoại <span>{{$item['phoneNumber']}}</span></li>
                                                                <li class="char_title"
                                                                    style="padding-bottom: 7px; font-size: 15px">Email
                                                                    <span>{{$item['email']}}</span></li>
                                                                <li class="char_title"
                                                                    style="padding-bottom: 7px; font-size: 15px">Ngày
                                                                    đăng ký <span><script>var dtstart = moment('{{$item['registeredDate']}}').format('MM/DD/YYYY');
                                                                            document.write(dtstart);</script></span></span>
                                                                </li>

                                                                <li class="char_title"
                                                                    style="padding-bottom: 7px; font-size: 15px">Trạng
                                                                    thái
                                                                    @if($item['isApprove'] === true)
                                                                        <span class="badge badge-pill badge-success">Đã tạo gian hàng</span>
                                                                    @endif
                                                                    @if($item['isApprove'] === null)
                                                                        <span class="badge badge-pill badge-warning">Chờ xác nhận</span>
                                                                    @endif
                                                                    @if($item['isApprove'] === false)
                                                                        <span class="badge badge-pill badge-danger">Đã từ chối</span>
                                                                    @endif
                                                                </li>
                                                                @if($item['isApprove'] === true)
                                                                    <li class="char_title"
                                                                        style="padding-bottom: 7px; font-size: 15px">
                                                                        <span><a href="{{route('trang-chu-admin')}}">Đến trang quản lý gian hàng </a></span>
                                                                    </li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="space10">&nbsp;</div>

                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div id="hoso" class="tabcontent" style="display:none">
                    <div class="characteristics">
                        @foreach ($dataorder['orders'] as $item => $orderitem )
                            <div class="order">
                                <div class="accordion order-info">Đơn hàng <a href="" data-toggle="modal"
                                                                              data-target="#InfoOrder{{$dataorder['orders'][$item]['_id']}}">{{$dataorder['orders'][$item]['_id']}} </a>
                                    <span> |</span> <span>{{$dataorder['orders'][$item]['totalQuantity']}}</span> Sản
                                    phẩm
                                    <span> |</span> Trạng thái:
                                    <span><i> {{$dataorder['orders'][$item]['orderState']['orderStateName']}}</i></span>
                                    @if($dataorder['orders'][$item]['orderState']['orderStateName'] == "Đang chờ thanh toán")
                                        <span><a href="{{route('check-out',$dataorder['orders'][$item]['_id'])}}"
                                                 class="btn btn-outline-warning btn-save" style="height: 36px;">Thanh Toán</a></span>
                                    @endif

                                </div>
                                <div class="panel order-item">
                                    @foreach($resultorderitem['dataorderitem'][$item]['orderItems'] as $text )
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <div class="item-pic"><img src="{{$text['product']['imageURL']}}"
                                                                           width="115" height="115"></div>
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
                                                <div class="item-quantity" style=" width: 100%; "><span><span
                                                                class="text desc info multiply">Số lượng:&nbsp;{{$text['quantity']}}</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="item-status item-capsule">
                                                    <p class="capsule">{{$text['orderItemState']['orderStateName']}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="item-info">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach

                                </div>
                            </div>
                            <div class="space10">&nbsp;</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('user/RecentlyViewed')
    @include('user/Brands')

    <!-- Modal -->
    @foreach ($dataorder['orders'] as $item => $orderitem )
        <div class="modal fade" id="InfoOrder{{$dataorder['orders'][$item]['_id']}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="viewed_title" id="exampleModalLabel">Thông tin đơn hàng&nbsp;</h4>&nbsp;
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        @foreach($resultorderitem['dataorderitem'][$item]['orderItems'] as $text )
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="item-pic"><img src="{{$text['product']['imageURL']}}" width="115"
                                                               height="115"></div>
                                </div>
                                <div class="col-lg-4">
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
                                    <div class="item-quantity" style=" width: 100%; "><span><span
                                                    class="text desc info multiply">Số lượng:&nbsp;{{$text['quantity']}}</span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="item-status item-capsule">
                                        <p class="capsule">{{ number_format($text['product']['price'])}},000₫</p>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="item-info">
                                    </div>
                                </div>
                            </div>
                            <hr>



                        @endforeach
                        <div class="characteristics">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 char_col" style="border-right:solid 1px #dadada;">
                                        <div class="order_total">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="order_total_content ">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="order_cart_title">
                                                                    <h4><b>Thông tin đơn hàng</b></h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="order_total_content ">
                                                        <div class="row">
                                                            <div class="col-lg-7 col-md-6">
                                                                <div class="order_cart_title ">Tạm tính
                                                                    ({{$orderitem['totalQuantity']}} sản
                                                                    phẩm)
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-5 col-md-6">
                                                                <div class="order_cart_amount text-right">{{number_format($orderitem['totalPrice'])}},000₫
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="order_total_content ">
                                                        <div class="row">
                                                            <div class="col-lg-7 col-md-7">
                                                                <div class="order_cart_title">Phí giao hàng</div>
                                                            </div>
                                                            <div class="col-lg-5 col-md-5">
                                                                @if($orderitem['deliveryPrice']['transportFee'] == 0)
                                                                    <div class="order_cart_amount text-right">Miễn phí
                                                                        vận chuyển
                                                                    </div>
                                                                @else
                                                                    <div class="order_cart_amount text-right">{{number_format($orderitem['deliveryPrice']['transportFee'])}},000₫
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="order_total_content ">
                                                        <div class="row">
                                                            <div class="col-lg-7 col-md-7">
                                                                <div class="order_cart_title ">Tổng cộng</div>
                                                            </div>
                                                            <div class="col-lg-5 col-md-5">
                                                                @if($orderitem['deliveryPrice']['transportFee'] == 0)
                                                                    <div class="order_cart_amount text-right text-danger">{{number_format($orderitem['totalPrice'])}},000₫
                                                                    </div>
                                                                @else
                                                                    <div class="order_cart_amount text-right text-danger">{{number_format($orderitem['totalPrice'] + $orderitem['deliveryPrice']['transportFee'])}},000₫
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="order_total_amount1">(Giá đã bao gồm VAT)
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 char_col">
                                        <div class="order_total">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="order_total_content ">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="order_cart_title">
                                                                    <h4><b>Địa chỉ giao hàng</b></h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="order_total_content ">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12">
                                                                <div class="order_cart_title ">{{$orderitem['deliveryAddress']['presentation']}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="order_total_content ">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12">
                                                                <div class="order_cart_title ">{{$orderitem['deliveryAddress']['address']}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="order_total_content ">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12">
                                                                <div class="order_cart_title ">Số điện
                                                                    thoại: {{$orderitem['deliveryAddress']['phoneNumber']}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="order_total_content ">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12">
                                                                <div class="order_cart_title ">Thanh toán bằng hình
                                                                    thức: {{$orderitem['paymentMethod']['paymentMethodName']}}</div>
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
                    </div>
                    <div class="modal-footer">

                        @if($orderitem['orderState']['orderStateName'] == "Đang xử lý" || $orderitem['orderState']['orderStateName'] == "Đang chờ thanh toán")
                            <button type="submit" form="deleteOrder" class="btn btn-outline-warning btn-save">Hủy đơn
                                hàng
                            </button>
                            <form id="deleteOrder" action="{{route('post-profile-user')}}" method="POST">
                                <input type="text" hidden name="orderId" value="{{$dataorder['orders'][$item]['_id']}}">
                                {{ csrf_field() }}
                            </form>
                        @endif
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="modal fade" id="information" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="viewed_title" style="border-right:solid 1px #dadada;" id="exampleModalLabel">Địa chỉ nhận
                        hàng&nbsp;</h4>&nbsp;
                    <h5 style="margin-top: 4px"><a href="" data-dismiss="modal" aria-label="Close" data-toggle="modal"
                                                   data-target="#information1">Thêm địa chỉ mới</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row order_cart_title1">
                        <div class="col-lg-2 ">Tên</div>
                        <div class="col-lg-6 ">Địa chỉ</div>
                        <div class="col-lg-2 ">Số điện thoại</div>
                        <div class="col-lg-2 "></div>
                    </div>
                    <div class="row order_cart_title2 ">
                        @foreach($dataaddress['deliveryAddresses'] as $item)
                            <div class="col-lg-2 ">{{$item['presentation']}}</div>
                            <div class="col-lg-6 ">{{$item['address']}}</div>
                            <div class="col-lg-2 ">{{$item['phoneNumber']}}</div>
                            <div class="col-lg-2 ">
                                <a href="" data-dismiss="modal" aria-label="Close" data-toggle="modal"
                                   data-target="#informationuser{{$item['_id']}}">Chỉnh
                                    sửa</a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="information1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="viewed_title" id="exampleModalLabel">Thêm thông tin và địa chỉ nhận hàng mới</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('post-delivery-profile-user')}}" method="POST">
                        <div class="row">
                            <div class="col-lg-6 order-lg-1 order-1">
                                <div class="form-group">
                                    <label for="">Họ tên</label>
                                    <input type="text" required="required" class="form-control" id="" name="hoten" placeholder="">
                                    <input type="text" hidden name="customerid"
                                           value="{{$datacustomer['customer']['_id']}}">
                                </div>
                            </div>
                            <div class="col-lg-6 order-lg-2 order-4">
                                <div class="form-group">
                                    <label for="">Tỉnh/ Thành phố</label>
                                    <select name="tinh-thanhpho" id="tinh-thanhpho" class="form-control"
                                            style="margin-left: 0px;"
                                            id="">
                                        <option value="">Chọn tỉnh thành</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 order-lg-3 order-2">
                                <div class="form-group">
                                    <label for="">Số điện thoại</label>
                                    <input type="number" required="required" class="form-control" id="" name="sdt">
                                </div>
                            </div>
                            <div class="col-lg-6 order-lg-4 order-5">
                                <div class="form-group">
                                    <label for="">Quận/ Huyện</label>
                                    <select name="quan-huyen" id="quan-huyen" class="form-control"
                                            style="margin-left: 0px;"
                                            id="">
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 order-lg-5 order-3">
                                <div class="form-group">
                                    <label for="">Địa chỉ nhận hàng</label>
                                    <input type="text" required="required" class="form-control" id="" name="diachi">
                                </div>
                            </div>
                            <div class="col-lg-6 order-lg-6 order-6">
                                <div class="form-group">
                                    <label>Phường/ Xã</label>
                                    <select name="xa-phuong" id="xa-phuong" class="form-control"
                                            style="margin-left: 0px;">
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-10 order-lg-7 order-7">
                                <div class="space15">&nbsp;</div>
                            </div>
                            <div class="col-lg-2 order-lg-8 order-8">
                                <button type="submit" class="btn btn-outline-warning btn-save text-right">Lưu thông
                                    tin
                                </button>
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="informationuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="viewed_title" id="exampleModalLabel">Thông tin cá nhân</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{route('post-update-profile-user')}}" id="change" method="POST">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="hoten">Họ Tên</label>
                                        <input type="text" required="required" class="form-control" id="hoten" name="hoten"
                                               aria-describedby=""
                                               value="{{$datacustomer['customer']['name']}}">
                                        <input type="text" hidden name="customerid"
                                               value="{{$datacustomer['customer']['_id']}}">
                                    </div>
                                    <div class="space10">&nbsp;</div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" required="required" class="form-control" id="email" name="email"
                                               aria-describedby="" value="{{$datacustomer['customer']['email']}}">
                                    </div>
                                    <div class="space10">&nbsp;</div>
                                    <div class="form-group">
                                        <label for="sdt">Số Điện Thoại</label>
                                        <input type="number" required="required" class="form-control" id="sdt" name="sdt" aria-describedby=""
                                               value="{{$datacustomer['customer']['phoneNumber']}}">
                                    </div>
                                    <div class="form-group row" hidden>
                                        <label for="example-date-input" class="col-2 col-form-label">Date</label>
                                        <div class="col-10">
                                            <input class="form-control"  type="date" value="2011-08-19"
                                                   id="example-date-input">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-date-input">Ngày sinh</label>
                                        <input class="form-control" required="required" type="date" name="date" value="{{$start}}"
                                               id="example-date-input">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="gender">Giới Tính</label>
                                        <select class="form-control" id="gender" name="gender">
                                            @if($datacustomer['customer']['gender'] =="Nam")
                                                <option selected>Nam</option>
                                                <option>Nữ</option>
                                            @else
                                                <option>Nam</option>
                                                <option selected>Nữ</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-info btn-change"><a href="" data-dismiss="modal"
                                                                                     aria-label="Close"
                                                                                     data-toggle="modal"
                                                                                     data-target="#informationchangepass">Thay
                            đổi mật khẩu</a></button>
                    <button type="submit" form="change" class="btn btn-outline-warning btn-save">Lưu thông tin</button>
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Thoát</button>
                </div>
            </div>
        </div>
    </div>

    @foreach($dataaddress['deliveryAddresses'] as $item)
        <div class="modal fade" id="informationuser{{$item['_id']}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="viewed_title" id="exampleModalLabel">Cập nhật thông tin và địa chỉ nhận hàng mới</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('update-delivery-profile-user')}}" id="info{{$item['_id']}}"
                              method="POST">
                            <div class="row">
                                <div class="col-lg-6 order-lg-1 order-1">
                                    <div class="form-group">
                                        <label for="">Họ tên</label>
                                        <input type="text" required="required" class="form-control" name="hoten"
                                               value="{{$item['presentation']}}">
                                        <input type="text" hidden name="id" value="{{$item['_id']}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 order-lg-2 order-4">
                                    <div class="form-group">
                                        <label for="">Tỉnh/ Thành phố</label>
                                        <select name="tinh-thanhpho" id="tinh-thanhpho-user{{$item['_id']}}"
                                                class="form-control" style="margin-left: 0px;"
                                        >

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 order-lg-3 order-2">
                                    <div class="form-group">
                                        <label for="">Số điện thoại</label>
                                        <input type="text" required="required" class="form-control" value="{{$item['phoneNumber']}}"
                                               name="sdt">
                                    </div>
                                </div>
                                <div class="col-lg-6 order-lg-4 order-5">
                                    <div class="form-group">
                                        <label for="">Quận/ Huyện</label>
                                        <select name="quan-huyen" id="quan-huyen-user{{$item['_id']}}"
                                                class="form-control" style="margin-left: 0px;">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 order-lg-5 order-3">
                                    <div class="form-group">
                                        <label for="">Địa chỉ nhận hàng</label>
                                        <input type="text" required="required" class="form-control" id="diachi{{$item['_id']}}"
                                               name="diachi">
                                    </div>
                                </div>
                                <div class="col-lg-6 order-lg-6 order-6">
                                    <div class="form-group">
                                        <label for="">Phường/ Xã</label>
                                        <select name="xa-phuong" id="xa-phuong-user{{$item['_id']}}"
                                                class="form-control" style="margin-left: 0px;">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-8 order-lg-7 order-7">
                                    <div class="space15">&nbsp;</div>
                                </div>
                                <div class="col-lg-4 order-lg-8 order-8">
                                    <!-- <div class="space15">&nbsp;</div> -->
                                    <div class="btn btn-outline-info btn-change">
                                        <a id="delete" href="{{route('delete-delivery-profile-user',$item['_id'])}}" >Xóa địa chỉ</a></div>
                                    <button type="submit" form="info{{$item['_id']}}"
                                            class="btn btn-outline-warning btn-save text-right">Lưu thông tin
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Thoát
                                    </button>
                                </div>
                            </div>
                            @method('PATCH')
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                load_json_data('tinh-thanhpho-user{{$item['_id']}}');

                function load_json_data(id, parent_id) {
                    var html_code = '';
                    var html_add = '';
                    $.getJSON("source/user/datacontry/tinh_tp.json", function (data) {
                        var text = "{{$item['address']}}";
                        var text1 = text.split(",");
                        var html1 = [];
                        for (var i = ((text1.length) - 1); i <= ((text1.length) - 1); i++) {
                            html1 = text1[i];
                            var htmltext = html1.slice(1, 100);
                        }

                        html_code = '<option value="">Chọn tỉnh thành</option>';
                        $.each(data, function (key, value) {

                            if (id == 'tinh-thanhpho-user{{$item['_id']}}') {
                                if (value.type == 'tinh' || value.type == 'thanh-pho') {
                                    html_code += '<option value="' + value.code + '"> ' + value.name_with_type + '</option>';
                                    if (value.name_with_type == htmltext) {
                                        html_add = '<option value="' + value.code + '" selected> ' + value.name_with_type + '</option>';
                                    }
                                }
                            } else {
                                if (value.code == parent_id) {
                                    if (value.name_with_type == htmltext) {
                                        html_add = '<option value="' + value.code + '" selected> ' + value.name_with_type + '</option>';
                                    }
                                    html_code += '<option value="' + value.code + '"> ' + value.name_with_type + '</option>';
                                }
                            }
                        });


                        $('#tinh-thanhpho-user{{$item['_id']}}').html(html_code);
                        $('#tinh-thanhpho-user{{$item['_id']}}').append(html_add);

                    });
                }


                function load_json_data1(id, parent_id) {
                    var html_code = '';
                    var html_add = '';
                    $.getJSON("source/user/datacontry/quan_huyen.json", function (data) {
                        var quan = "{{$item['address']}}";
                        var quan1 = quan.split(",");
                        var htmlquan;
                        for (var i = ((quan1.length) - 2); i <= ((quan1.length) - 2); i++) {
                            htmlquan = quan1[i];
                            var htmltext1 = htmlquan.slice(1, 100);
                        }
                        html_code += '<option value="">Chọn quận huyện</option>';
                        $.each(data, function (key, value) {
                            if (id == 'tinh-thanhpho-user{{$item['_id']}}') {
                                if (value.type == 'thanh-pho' || value.type == 'huyen' || value.type == 'thi-xa') {
                                    // html_add = '<option value="' + value.code + '" selected> ' +htmltext1  + '</option>';
                                    html_code += '<option value="' + value.code + '"> ' + value.name_with_type + '</option>';
                                    if (value.name_with_type == htmltext1) {
                                        html_add = '<option value="' + value.code + '" selected> ' + value.name_with_type + '</option>';
                                    }
                                }
                            } else {
                                if (value.parent_code == parent_id) {
                                    html_code += '<option value="' + value.code + '"> ' + value.name_with_type + '</option>';
                                    if (value.name_with_type == htmltext1) {
                                        html_add = '<option value="' + value.code + '" selected> ' + value.name_with_type + '</option>';
                                    }
                                }
                            }
                        });

                        $('#quan-huyen-user{{$item['_id']}}').html(html_code);
                        $('#quan-huyen-user{{$item['_id']}}').append(html_add);
                    });

                }

                function load_json_data2(id, parent_id) {
                    var html_code = '';
                    var html_add = '';
                    $.getJSON("source/user/datacontry/xa_phuong.json", function (data) {
                        var quan = "{{$item['address']}}";
                        var quan1 = quan.split(",");
                        var htmlquan;
                        for (var i = ((quan1.length) - 3); i <= ((quan1.length) - 3); i++) {
                            htmlquan = quan1[i];
                            var htmltext1 = htmlquan.slice(1, 100);
                        }

                        html_code += '<option value="">Chọn xã phường</option>';
                        $.each(data, function (key, value) {
                            if (id == 'tinh-thanhpho-user{{$item['_id']}}') {
                                if (value.type == 'phuong' || value.type == 'xa') {
                                    if (value.name_with_type == htmltext1) {
                                        html_add = '<option value="' + value.path_with_type + '" selected> ' + value.name_with_type + '</option>';
                                    }
                                    html_code += '<option value="' + value.path_with_type + '"> ' + value.name_with_type + '</option>';

                                }
                            } else {
                                if (value.parent_code == parent_id) {
                                    if (value.name_with_type == htmltext1) {
                                        html_add = '<option value="' + value.path_with_type + '" selected> ' + value.name_with_type + '</option>';
                                    }
                                    html_code += '<option value="' + value.path_with_type + '"> ' + value.name_with_type + '</option>';

                                }
                            }
                        });

                        $('#xa-phuong-user{{$item['_id']}}').html(html_code);
                        $('#xa-phuong-user{{$item['_id']}}').append(html_add);
                    });

                }


                $(document).one('click', '#tinh-thanhpho-user{{$item['_id']}}', function () {
                    var country_id = $(this).val();
                    {{--  console.log("ID: " + country_id);  --}}
                    if (country_id != '') {
                        load_json_data1('quan-huyen', country_id);
                    } else {
                        $('#quan-huyen-user{{$item['_id']}}').html('<option value="">Chọn quận huyện</option>');
                        $('#xa-phuong-user{{$item['_id']}}').html('<option value="">Chọn xã phường</option>');
                    }
                });


                $(document).one('click', '#quan-huyen-user{{$item['_id']}}', function () {
                    var state_id = $(this).val();
                    {{--  console.log("ID: " + state_id);  --}}
                    if (state_id != '') {
                        load_json_data2('xa-phuong', state_id);
                    } else {
                        $('#quan-huyen-user{{$item['_id']}}').html('<option value="">Chọn quận huyện</option>');
                        $('#xa-phuong-user{{$item['_id']}}').html('<option value="">Chọn xã phường</option>');
                    }
                });

                $(document).on('change', '#tinh-thanhpho-user{{$item['_id']}}', function () {
                    var country_id = $(this).val();
                    {{--  console.log("ID: " + country_id);  --}}
                    if (country_id != '') {
                        load_json_data1('quan-huyen', country_id);
                    } else {
                        $('#quan-huyen-user{{$item['_id']}}').html('<option value="">Chọn quận huyện</option>');
                        $('#xa-phuong-user{{$item['_id']}}').html('<option value="">Chọn xã phường</option>');
                    }
                });


                $(document).on('change', '#quan-huyen-user{{$item['_id']}}', function () {
                    var state_id = $(this).val();
                    console.log("ID: " + state_id);
                    if (state_id != '') {
                        load_json_data2('xa-phuong', state_id);
                    } else {
                        $('#quan-huyen-user{{$item['_id']}}').html('<option value="">Chọn quận huyện</option>');
                        $('#xa-phuong-user{{$item['_id']}}').html('<option value="">Chọn xã phường</option>');
                    }
                });


                if (html.length > 0) {
                    setTimeout(function () {
                        document.getElementById('tinh-thanhpho-user{{$item['_id']}}').click();
                    }, 100);
                }
                if (html.length > 0) {
                    setTimeout(function () {
                        document.getElementById('quan-huyen-user{{$item['_id']}}').click();
                    }, 350);
                }
            });


            var text = "{{$item['address']}}";
            var text1 = text.split(",");
            var html = [];


            for (var i = 0; i <= ((text1.length) - 4); i++) {
                html.push(text1[i]);
                document.getElementById('diachi{{$item['_id']}}').value = html;
            }
        </script>


    @endforeach

    <div class="modal fade" id="informationchangepass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="viewed_title" id="exampleModalLabel">Thay đổi mật khẩu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('update-password-profile-user')}}" id="changepass" method="POST">
                        <div class="row">
                            <div class="col-lg-12 order-lg-1 order-1">
                                <div class="form-group">
                                    <label for="">Mật khẩu cũ</label>
                                    <input type="password" required="required" class="form-control" name="oldpass">
                                </div>
                            </div>

                            <div class="col-lg-12 order-lg-3 order-2">
                                <div class="form-group">
                                    <label for="">Mật khẩu mới</label>
                                    <input type="password" required="required" class="form-control" name="newpass">
                                </div>
                            </div>

                            <div class="col-lg-12 order-lg-5 order-3">
                                <div class="form-group">
                                    <label for="">Xác nhận mật khẩu mới</label>
                                    <input type="password" required="required" class="form-control" name="checkpass">
                                </div>
                            </div>
                        </div>
                        @method('PATCH')
                        {{ csrf_field() }}
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="subnit" form="changepass" class="btn btn-outline-warning btn-save">Lưu thông tin
                    </button>
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Thoát</button>
                </div>
            </div>
        </div>
    </div>

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

    <script>
        var day = "{{$datacustomer['customer']['birthday']}}";
        var dtstart = moment('{{$datacustomer['customer']['birthday']}}').format('MM/DD/YYYY');
        var text1 = dtstart.split("/", 6);
        document.getElementById('example-date-input').value = dtstart;
    </script>




@endsection
