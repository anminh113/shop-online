@extends('user/master')
@section('head')

<link rel="stylesheet" type="text/css" href="source/user/styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/cart_responsive.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/header_css.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/cart.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/index.css">

@endsection
@section('content')


<!-- Cart -->
<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="cart_container">
                    <div class="cart_title text-left">Giỏ Hàng</div>
                    <div class="cart_items">
                        <ul class="cart_list">
                            <li class="cart_item clearfix">
                                <div class="cart_item_image1">
                                    &nbsp;
                                </div>
                                <div class="cart_item_info ">
                                    <div class="cart_item_name cart_info_col">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="cart_item_title">Tên sản phẩm</div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="cart_item_title">Đơn giá</div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="cart_item_title">Số lượng</div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="cart_item_title">Thành tiền</div>
                                            </div>
                                            <div class="col-lg-1">
                                                    <div class="cart_item_title">
                                                        Xóa
                                                    </div>
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
                                            <div class="col-lg-4">
                                                <div class="cart_item_text">{{$item['item']['productName']}}</div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="cart_item_text">
                                                    @if($item['item']['saleOff']['discount']==0)
                                                        {{$item['item']['price']}}
                                                    @else
                                                    {{$item['item']['price'] - ($item['item']['price'] * $item['item']['saleOff']['discount'])/100}}
                                                    @endif
                                                    
                                                
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="cart_item_text">
                                                    <div class="input-group">
                                                        <span class="input-group-btn">
                                                            <div class="btn btn-number" data-type="minus" data-field="quant[<?php echo $i?>]">
                                                                <i class="fas fa-minus"></i>
                                                            </div>
                                                        </span>
                                                        <input type="text" name="quant[<?php echo $i?>]" style="width: 50px;height: 38px"
                                                            class="form-control input-number text-center" value="{{$item['qty']}}"
                                                            min="1" max="100">
                                                        <span class="input-group-btn">
                                                            <div class="btn  btn-number" data-type="plus" data-field="quant[<?php echo $i?>]">
                                                                <i class="fas fa-plus"></i>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="cart_item_text">
                                                    @if($item['item']['saleOff']['discount']==0)
                                                        {{$item['qty'] * $item['item']['price']}}
                                                    @else
                                                        {{$item['qty'] * ($item['item']['price'] - ($item['item']['price'] * $item['item']['saleOff']['discount'])/100)}}
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-1">
                                                    <div class="cart_item_text">
                                                    <a href="{{Route('xoa-gio-hang',$item['item']['productId'])}}"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <hr>
                            @endforeach
                            @endif


                        </ul>
                    </div>
                    <!-- Order Total -->
                    <div class="order_total">
                        <div class="row">
                            @if(Session::has('cart'))
                                <div class="col-lg-6">
                                    <div class="order_total_content text-letf">
                                        <div class="order_total_title text-letf">Tạm tính:</div>
                                        <div class="order_total_amount">{{Session('cart')->totalPrice}} ₫</div>
                                    </div>
                                    <div class="order_total_content text-letf">
                                        <div class="order_total_title text-letf">Phí vận chuyển tạm tính:</div>
                                        <div class="order_total_amount">
                                            
                                            {{Session('cart')->totalQty}}
                                        
                                        </div>
                                    </div>
                                    <div class="order_total_content text-left">
                                        <div class="order_total_title text-letf">Thành Tiền:</div>
                                        <div class="order_total_amount">$2000</div>
                                    </div>
                                    <div class="order_total_content text-left">
                                        <div class="order_total_title"></div>
                                        <div class="order_total_amount1">(Giá đã bao gồm VAT)</div>
                                    </div>
                                </div>
                                @endif
                            <div class="col-lg-6">
                                <div class="cart_buttons">
                                    <button type="button" class="btn btn-outline-info btn-change" onclick="window.location='check-cart';">Xác
                                        Nhận Giỏ Hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--   <div class="cart_buttons">
                        <button type="button" class="button cart_button_checkout">Add to Cart</button>
                    </div> -->
                    <div class="characteristics">
                        <div class="row">
                            <!-- Char. Item -->
                            <div class="col-lg-4 col-md-6 char_col">
                                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                                    <div class="char_icon"><img style="width: 30px;height: 30px" src="source/user/images/icons8-truck-50.png"
                                            alt=""></div>
                                    <div class="char_content">
                                        <div class="char_subtitle">Miễn phí vận chuyển với đơn hàng từ 500.000₫ trở lên</div>
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


@endsection


@section('footer')
<script src="source/user/js/cart_custom.js"></script>
<script src="source/user/styles/js/cart.js"></script>
@endsection
