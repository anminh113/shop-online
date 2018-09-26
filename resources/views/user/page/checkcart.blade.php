@extends('user/master')
@section('head')
<link rel="stylesheet" type="text/css" href="source/user/styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/cart_responsive.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/header_css.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/cart.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/check-cart.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/index.css">
@endsection
@section('content')

    

<!-- Cart -->
<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="viewed_title_container">
                    <h3 class="viewed_title">Kiểm Tra Đơn Hàng</h3>
                </div>
            </div>
                <div class="col-lg-12 ">
                    <div class="characteristics">
                    <div class="row">
                        <!-- Char. Item -->
                        <div class="col-lg-4 col-md-6 char_col">
                            <div class="char_item d-flex flex-row align-items-center justify-content-start">
                                <div class="char_icon"><img style="width: 40px;height: 40px" src="source/user/images/icons8-drop-shipping-100.png" alt=""></div>
                                <div class="char_content">
                                    <div class="char_title">Tiêu chuẩn</div>
                                    <div class="char_subtitle">Nhận hàng vào 1-4 thg 9 2018</div>
                                    <div class="char_title">10.000d</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 ">
                <div class="cart_container">
                    <div class="cart_items">
                        <ul class="cart_list">
                            <li class="cart_item clearfix">
                                <div class="cart_item_image1">
                                    &nbsp;
                                </div>
                                <div class="cart_item_info ">
                                    <div class="cart_item_name cart_info_col">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5">
                                                <div class="cart_item_title">Tên sản phẩm</div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="cart_item_title">Đơn giá</div>
                                            </div>
                                            <div class="col-lg-2 col-md-2">
                                                <div class="cart_item_title">Số lượng</div>
                                            </div>
                                            <div class="col-lg-2 col-md-2">
                                                <div class="cart_item_title">Thành tiền</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <hr>
                            @if(Session::has('cart'))
                            <?php $i =0 ?>
                            @foreach ($product_cart as $item)
                            <?php $i=$i+1?>
                            <li class="cart_item clearfix">
                                <div class="cart_item_image"><img src="{{$item['img']}}" alt=""></div>
                                <div class="cart_item_info ">
                                    <div class="cart_item_name cart_info_col">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5">
                                                <div class="cart_item_text">{{$item['item']['productName']}}</div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="cart_item_text">  
                                                    @if($item['item']['saleOff']['discount']==0)
                                                        {{number_format($item['item']['price'], 3)}}.000₫
                                                    @else
                                                        {{number_format($item['item']['price'] - ($item['item']['price'] * $item['item']['saleOff']['discount'])/100, 3)}}.000₫
                                                    @endif
                                            </div>
                                            </div>
                                            <div class="col-lg-2 col-md-2">
                                                <div class="cart_item_text">{{$item['qty']}}</div>
                                            </div>
                                            <div class="col-lg-2 col-md-2">
                                                <div class="cart_item_text"> 
                                                    @if($item['item']['saleOff']['discount']==0)
                                                        {{number_format($item['qty'] * $item['item']['price'], 3)}}.000₫
                                                    @else
                                                        {{number_format($item['qty'] * ($item['item']['price'] - ($item['item']['price'] * $item['item']['saleOff']['discount'])/100), 3)}}.000₫
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <hr>
                            @endforeach
                            @endif

                            {{-- <li class="cart_item clearfix">
                                <div class="cart_item_image"><img src="source/user/images/shopping_cart.jpg" alt=""></div>
                                <div class="cart_item_info ">
                                    <div class="cart_item_name cart_info_col">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5">
                                                <div class="cart_item_text">Bộ vi xử lý/ CPU Pentium G5500 (3.8GHz)</div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="cart_item_text">$2000</div>
                                            </div>
                                            <div class="col-lg-2 col-md-2">
                                                <div class="cart_item_text">1</div>
                                            </div>
                                            <div class="col-lg-2 col-md-2">
                                                <div class="cart_item_text">$2000</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <hr>
                            <li class="cart_item clearfix">
                                <div class="cart_item_image"><img src="source/user/images/shopping_cart.jpg" alt=""></div>
                                <div class="cart_item_info ">
                                    <div class="cart_item_name cart_info_col">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5">
                                                <div class="cart_item_text">Bộ vi xử lý/ CPU Pentium G5500 (3.8GHz)</div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="cart_item_text">$2000</div>
                                            </div>
                                            <div class="col-lg-2 col-md-2">
                                                <div class="cart_item_text">1</div>
                                            </div>
                                            <div class="col-lg-2 col-md-2">
                                                <div class="cart_item_text">$2000</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <hr>
                            <li class="cart_item clearfix">
                                <div class="cart_item_image"><img src="source/user/images/shopping_cart.jpg" alt=""></div>
                                <div class="cart_item_info ">
                                    <div class="cart_item_name cart_info_col">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5">
                                                <div class="cart_item_text">Bộ vi xử lý/ CPU Pentium G5500 (3.8GHz)</div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="cart_item_text">$2000</div>
                                            </div>
                                            <div class="col-lg-2 col-md-2">
                                                <div class="cart_item_text">1</div>
                                            </div>
                                            <div class="col-lg-2 col-md-2">
                                                <div class="cart_item_text">$2000</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <hr> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="order_total">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="order_total_content ">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="order_cart_title">
                                            <h4><b>Thanh Toán Vận Chuyển</b></h4></div>
                                    </div>
                                </div>
                            </div>
                            <div class="order_total_content ">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="order_cart_title ">Giao hàng tới</div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="order_cart_amount text-right"><a href="" data-toggle="modal" data-target="#information">Chỉnh Sửa</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="order_total_content ">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="order_cart_title order_cart_title_text">32-34 đường số 3 - khu TĐC - ĐHYD, KV4 - P.An khánh - Q.Ninh kiều</div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="order_cart_title order_cart_title_text">Phường An Khánh, Quận Ninh Kiều, Cần Thơ</div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="order_cart_title order_cart_title_text">01697186707</div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="order_total_content ">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="order_cart_title">
                                            <h4><b>Thông tin đơn hàng</b></h4></div>
                                    </div>
                                </div>
                            </div>
                            @if(Session::has('cart'))
                            <div class="order_total_content ">
                                <div class="row">
                                    <div class="col-lg-7 col-md-6">
                                        <div class="order_cart_title ">Tạm tính ({{Session('cart')->totalQty}} sản phẩm)</div>
                                    </div>
                                    <div class="col-lg-5 col-md-6">
                                        <div class="order_cart_amount text-right">{{number_format(Session('cart')->totalPrice, 3)}}.000₫</div>
                                    </div>
                                </div>
                            </div>
                            <div class="order_total_content ">
                                <div class="row">
                                    <div class="col-lg-9 col-md-9">
                                        <div class="order_cart_title ">Phí giao hàng</div>
                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                        <div class="order_cart_amount text-right">0₫</div>
                                    </div>
                                </div>
                            </div>
                            <div class="order_total_content ">
                                <div class="row">
                                    <div class="col-lg-9 col-md-9">
                                        <div class="order_cart_title ">Tổng cộng</div>
                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                        <div class="order_cart_amount text-right text-danger">0000</div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="order_total_amount1">(Giá đã bao gồm VAT)</div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="order_total_content ">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="button cart_button_checkout" onclick="window.location='check-out';">Thanh Toán</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="characteristics">
                    <div class="row">
                        <!-- Char. Item -->
                        <div class="col-lg-4 col-md-6 char_col">
                            <div class="char_item d-flex flex-row align-items-center justify-content-start">
                                <div class="char_icon"><img style="width: 30px;height: 30px" src="source/user/images/icons8-truck-50.png" alt=""></div>
                                <div class="char_content">
                                    <div class="char_subtitle">Miễn phí vận chuyển với đơn hàng từ 500.000₫ trở lên</div>
                                </div>
                            </div>
                        </div>
                        <!-- Char. Item -->
                        <div class="col-lg-4 col-md-6 char_col">
                            <div class="char_item d-flex flex-row align-items-center justify-content-start">
                                <div class="char_icon"><img style="width: 30px;height: 30px" src="source/user/images/icons8-protect-50.png" alt=""></div>
                                <div class="char_content">
                                    <div class="char_subtitle">Thanh toán bảo mật</div>
                                </div>
                            </div>
                        </div>
                        <!-- Char. Item -->
                        <div class="col-lg-4 col-md-6 char_col">
                            <div class="char_item d-flex flex-row align-items-center justify-content-start">
                                <div class="char_icon"><img style="width: 30px;height: 30px" src="source/user/images/icons8-update-50.png" alt=""></div>
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
<!-- Modal -->
<div class="modal fade" id="information" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="viewed_title" style="border-right:solid 1px #dadada;" id="exampleModalLabel">Địa chỉ nhận hàng&nbsp;</h4>&nbsp;
                <h5 style="margin-top: 4px"><a href="" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#information1">Thêm địa chỉ mới</a></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row order_cart_title1">
                    <div class="col-lg-3 col-md-2">Tên</div>
                    <div class="col-lg-3 col-md-3">Địa chỉ</div>
                    <div class="col-lg-3 col-md-3">Mã vùng</div>
                    <div class="col-lg-2 col-md-2">Số điện thoại</div>
                    <div class="col-lg-1 col-md-2"></div>
                </div>
                <div class="row order_cart_title2 ">
                    <div class="col-lg-3 col-md-2">Huỳnh Khắc Duy</div>
                    <div class="col-lg-3 col-md-3">32-34 đường số 3 - khu TĐC - ĐHYD, KV4 - P.An khánh - Q.Ninh kiều</div>
                    <div class="col-lg-3 col-md-3">Cần Thơ - Quận Ninh Kiều - Phường An Khánh</div>
                    <div class="col-lg-2 col-md-3">01697186707</div>
                    <div class="col-lg-1 col-md-1">
                        <label for="rdo-1" class="btn-radio">
                            <input type="radio" id="rdo-1" name="radio-grp">
                            <svg width="20px" height="20px" viewBox="0 0 20 20">
                                <circle cx="10" cy="10" r="9"></circle>
                                <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                                <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                            </svg>
                        </label>
                    </div>
                </div>
                <hr>
                <div class="row order_cart_title2 ">
                    <div class="col-lg-3 col-md-2">Huỳnh Khắc Duy</div>
                    <div class="col-lg-3 col-md-3">32-34 đường số 3 - khu TĐC - ĐHYD, KV4 - P.An khánh - Q.Ninh kiều</div>
                    <div class="col-lg-3 col-md-3">Cần Thơ - Quận Ninh Kiều - Phường An Khánh</div>
                    <div class="col-lg-2 col-md-3">01697186707</div>
                    <div class="col-lg-1 col-md-1">
                        <label for="rdo-2" class="btn-radio">
                            <input type="radio" id="rdo-2" name="radio-grp">
                            <svg width="20px" height="20px" viewBox="0 0 20 20">
                                <circle cx="10" cy="10" r="9"></circle>
                                <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                                <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                            </svg>
                        </label>
                    </div>
                </div>
                <hr>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="information1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="viewed_title" id="exampleModalLabel">Thêm thông tin và địa chỉ nhận hàng mới</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" class="clearfix">
                    <div class="row">
                        <div class="col-lg-6 order-lg-1 order-1">
                            <div class="form-group">
                                <label for="">Họ tên</label>
                                <input type="email" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-2 order-4">
                            <div class="form-group">
                                <label for="">Tỉnh/ Thành phố</label>
                                <select name="tinh-thanhpho" id="tinh-thanhpho" class="form-control" style="margin-left: 0px;" id="">
                                    <option value="">Chọn tỉnh thành</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-3 order-2">
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="email" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-4 order-5">
                            <div class="form-group">
                                <label for="">Quận/ Huyện</label>
                                <select name="quan-huyen" id="quan-huyen" class="form-control" style="margin-left: 0px;" id="">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-5 order-3">
                            <div class="form-group">
                                <label for="">Địa chỉ nhận hàng</label>
                                <input type="email" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-6 order-6">
                            <div class="form-group">
                                <label for="">Phường/ Xã</label>
                                <select name="xa-phuong" id="xa-phuong" class="form-control" style="margin-left: 0px;">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-7 order-7">
                            <div class="space15">&nbsp;</div>
                        </div>
                        <div class="col-lg-6 order-lg-8 order-8">
                            <!-- <div class="space15">&nbsp;</div> -->
                            <div class="button cart_button_checkout">Lưu</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('footer')
<script src="source/user/js/cart_custom.js"></script>
<script src="source/user/styles/js/cart.js"></script>
<script src="source/user/styles/js/datacontry.js"></script>
@endsection 


