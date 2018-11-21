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
                                <div class="char_icon"><img style="width: 40px;height: 40px" src="source/user/images/icons8-drop-shipping-100.png"
                                        alt=""></div>
                                <div class="char_content">
                                    <div class="char_title">Tiêu chuẩn</div>
                                    <div class="char_subtitle">Nhận hàng vào ngày <script>var dtstart = moment('{{$time}}').add(4, 'days').format('DD-MM-YYYY'); document.write(dtstart);</script></div>
                                    @foreach ($data['deliveryPrices'] as $item)
                                    @if($item['totalPriceMin'] <= Session::get('cart')->totalPrice && $item['totalPriceMax'] >= Session::get('cart')->totalPrice )
                                    <div class="char_title">{{$item['transportFee']}},000₫</div>
                                    @break
                                    @elseif($item['totalPriceMax'] == null)
                                    <div class="char_title">Miễn phí vận chuyển</div>
                                    @break
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                 
                <div class="cart_container">
                   
                    <div class="column-labels">
                        <label class="product-image">Giỏ Hàng</label>
                        <label class="product-details">Sản phẩm</label>
                        <label class="product-price">Giá</label>
                        <label class="product-quantity" style="text-align: center; display: block;">Số lượng</label>
                        <label class="product-line-price">Thành tiền</label>
                        <label class="product-removal"> &nbsp;</label>
                    </div>
                    @if(Session::has('cart'))
                    <?php $i =0 ?>
                    @foreach ($product_cart as $item)
                    <?php $i=$i+1?>
                    <div class="product">
                        <div class="product-image">
                            <img src="{{$item['img']}}" alt="">
                        </div>
                        <div class="product-details">
                            <div class="product-title">{{$item['item']['productName']}}</div>
                        </div>
                        <div class="product-price">
                            @if(empty($item['item']['saleOff']) || $item['item']['saleOff']['dateEnd'] < $time)
                                {{number_format($item['item']['price'])}},000₫ @else
                                {{number_format($item['item']['price'] - ($item['item']['price'] *$item['item']['saleOff']['discount'])/100)}},000₫ @endif </div> 
                                <div class="product-quantity " style="text-align: center; display: block;" >
                                {{$item['qty']}}
                                </div>

                        <div class="product-line-price"> @if(empty($item['item']['saleOff']) ||
                            $item['item']['saleOff']['dateEnd']
                            < $time) {{number_format($item['qty'] * $item['item']['price'])}},000₫ @else
                                {{number_format($item['qty'] * ($item['item']['price'] -($item['item']['price'] *$item['item']['saleOff']['discount'])/100))}},000₫ @endif </div> 
                                
                    </div>
                    @endforeach
                    @endif
                   


                   


                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="order_total">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="order_total_content ">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="order_cart_title">
                                            <h4><b>Thanh Toán Vận Chuyển</b></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order_total_content ">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="order_cart_title ">Giao hàng tới</div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="order_cart_amount text-right"><a href="" data-toggle="modal"
                                                data-target="#information">Chỉnh Sửa</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="order_total_content ">
                                @if(Session::has('Idaddress'))
                            
                                    <div class="row"  >     
                                        <div class="col-lg-12">
                                            <div class="order_cart_title order_cart_title_text">{{$dataaddressone['deliveryAddress']['presentation']}}</div>
                                            <input type="text" form="deliveryAddress" hidden name="presentation" value="{{$dataaddressone['deliveryAddress']['presentation']}}">
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="order_cart_title order_cart_title_text">{{$dataaddressone['deliveryAddress']['address']}}</div>
                                            <input type="text" form="deliveryAddress" hidden name="address" value="{{$dataaddressone['deliveryAddress']['address']}}">
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="order_cart_title order_cart_title_text">{{$dataaddressone['deliveryAddress']['phoneNumber']}}</div>
                                            <input type="text" form="deliveryAddress" hidden name="phoneNumber" value="{{$dataaddressone['deliveryAddress']['phoneNumber']}}">
                                        </div>
                                    </div>
                                @else
                                    @if(!empty($dataaddress['deliveryAddresses'] ))
                                        <?php $i = 1?>
                                        @foreach($dataaddress['deliveryAddresses'] as $item)
                                    <?php $i = $i + 1?>
                                        <div class="row"  >     
                                            <div class="col-lg-12">
                                                <div class="order_cart_title order_cart_title_text">{{$item['presentation']}}</div>
                                                <input type="text" form="deliveryAddress" hidden name="presentation" value="{{$item['presentation']}}">
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="order_cart_title order_cart_title_text">{{$item['address']}}</div>
                                                <input type="text" form="deliveryAddress" hidden name="address" value="{{$item['address']}}">
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="order_cart_title order_cart_title_text">{{$item['phoneNumber']}}</div>
                                                <input type="text" form="deliveryAddress" hidden name="phoneNumber" value="{{$item['phoneNumber']}}">
                                            </div>
                                        </div>
                                        @if($i>1)
                                        @break
                                        @endif
                                    @endforeach
                                    @endif
                                @endif
                            </div>
                            {{-- @endforeach --}}
                            <hr>
                            <div class="order_total_content ">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="order_cart_title">
                                            <h4><b>Thông tin đơn hàng</b></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(Session::has('cart'))
                            <div class="order_total_content ">
                                <div class="row">
                                    <div class="col-lg-7 col-md-6">
                                        <div class="order_cart_title ">Tạm tính ({{Session('cart')->totalQty}} sảnphẩm)</div>
                                        <input type="text" hidden form="deliveryAddress" name="totalQuantity" value="{{Session('cart')->totalQty}}">
                                    </div>
                                    <div class="col-lg-5 col-md-6">
                                        <div class="order_cart_amount text-right">{{number_format(Session::get('cart')->totalPrice)}},000₫</div>
                                    </div>
                                </div>
                            </div>
                            @foreach ($data['deliveryPrices'] as $item)
                            @if($item['totalPriceMin'] <= Session::get('cart')->totalPrice && $item['totalPriceMax'] >= Session::get('cart')->totalPrice )
                            <div class="order_total_content ">
                                <div class="row">
                                    <div class="col-lg-9 col-md-9">
                                        <div class="order_cart_title ">Phí giao hàng</div>
                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                        <div class="order_cart_amount text-right">{{$item['transportFee']}},000₫</div>
                                        <input type="text" form="deliveryAddress" hidden name="deliveryPrice" value="{{$item['_id']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="order_total_content ">
                                <div class="row">
                                    <div class="col-lg-7 col-md-7">
                                        <div class="order_cart_title ">Tổng cộng</div>
                                    </div>
                                    <div class="col-lg-5 col-md-5">
                                        <div class="order_cart_amount text-right text-danger">{{number_format(Session::get('cart')->totalPrice) + $item['transportFee']}},000₫</div>
                                        <input type="text" form="deliveryAddress" hidden name="totalPrice" value="{{Session::get('cart')->totalPrice + $item['transportFee']}}">
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="order_total_amount1">(Giá đã bao gồm VAT)</div>
                                    </div>
                                </div>
                            </div>
                            @break
                            @elseif($item['totalPriceMax'] == null)
                            <div class="order_total_content ">
                                <div class="row">
                                    <div class="col-lg-7 col-md-7">
                                        <div class="order_cart_title ">Phí giao hàng</div>
                                    </div>
                                    <div class="col-lg-5 col-md-5">
                                        <div class="order_cart_amount text-right" style="font-size: 12px; color:#5F6368 ">Miễn phí vận chuyển</div>
                                        <input type="text" form="deliveryAddress" hidden name="deliveryPrice" value="{{$item['_id']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="order_total_content ">
                                <div class="row">
                                    <div class="col-lg-7 col-md-7">
                                        <div class="order_cart_title ">Tổng cộng</div>
                                    </div>
                                    <div class="col-lg-5 col-md-5">
                                        <div class="order_cart_amount text-right text-danger">{{number_format(Session::get('cart')->totalPrice)}},000₫</div>
                                        <input type="text" form="deliveryAddress" hidden name="totalPrice" value="{{Session::get('cart')->totalPrice}}">

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="order_total_amount1">(Giá đã bao gồm VAT)</div>
                                    </div>
                                    
                                </div>
                            </div>
                           
                            @break
                            @endif
                                        
                            @endforeach
                            @endif
                            <hr>
                            <div class="order_total_content ">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="order_cart_title">
                                            <h4><b>Hình thức thanh toán</b></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order_total_content ">
                                <div class="row">
                                    <div class="col-lg-12">
                                        @foreach($dataPaymentMethods['paymentMethods'] as $item)
                                        <div class="order_cart_title " >
                                        <div class="order_cart_title order_cart_title_text"  style="margin-left: 20px">{{$item['paymentMethodName']}}</div>
                                        <label for="rdo-{{$item['_id']}}" class="btn-radio">
                                        <input type="radio" required id="rdo-{{$item['_id']}}" form="deliveryAddress" name="paymentMethod" value="{{$item['_id']}}">
                                            <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <circle cx="10" cy="10" r="9"></circle>
                                                <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z"
                                                    class="inner"></path>
                                                <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z"
                                                    class="outer"></path>
                                            </svg>
                                        </label>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="order_total_amount1" style="line-height:2px;padding-bottom: 30px">({{$item['description']}})</div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @if(!empty($dataaddress['deliveryAddresses'] ))
                            <div class="order_total_content ">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button type="submit" form="deliveryAddress" class="button cart_button_checkout">Thanh Toán</button>
                                    </div>
                                </div>
                            </div>
                                @else
                                <div class="order_total_content ">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button type="button"  class="button cart_button_checkout" data-dismiss="modal" aria-label="Close" data-toggle="modal"
                                                    data-target="#information1"> Thêm địa chỉ</button>
                                        </div>
                                    </div>
                                </div>
                                @endif
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
                                <div class="char_icon"><img style="width: 30px;height: 30px" src="source/user/images/icons8-truck-50.png"
                                        alt=""></div>
                                <div class="char_content">
                                    <div class="char_subtitle">Miễn phí vận chuyển với đơn hàng từ 1,000,000₫ trở lên</div>
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
<!-- Modal -->
<form action="{{route('post-deliveryAddress-check-cart')}}" method="POST" id="deliveryAddress">
    <input type="text"  hidden name="customerId" value="{{Session::get('keyuser')['info'][0]['customer']['_id']}}">
    {{-- <input type="text"  hidden name="orderStateId" value="5b9a196cffed2b1e60a5d781"> --}}
    {{ csrf_field() }}
</form>

<div class="modal fade" id="information" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <form action="{{route('post-check-cart')}}" method="POST">
                <div class="modal-body">
                    <div class="row order_cart_title1">
                        <div class="col-lg-3 col-md-2">Tên</div>
                        <div class="col-lg-6 col-md-6">Địa chỉ</div>
                        <div class="col-lg-2 col-md-2">Số điện thoại</div>
                        <div class="col-lg-1 col-md-2"></div>
                    </div>
                    <?php $i=0;?>
                    
                    @foreach($dataaddress['deliveryAddresses'] as $item)
                    <div class="row order_cart_title2 ">
                        <div class="col-lg-3 col-md-2">{{$item['presentation']}}</div>
                        <div class="col-lg-6 col-md-6">{{$item['address']}}</div>
                        <div class="col-lg-2 col-md-3">{{$item['phoneNumber']}}</div>
                        <div class="col-lg-1 col-md-1">
                        
                                <label for="rdo-<?php echo $i?>" class="btn-radio">
                                <input type="radio" required="required" id="rdo-<?php echo $i?>" name="radio-grp" value="{{$item['_id']}}">
                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                        <circle cx="10" cy="10" r="9"></circle>
                                        <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z"
                                            class="inner"></path>
                                        <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z"
                                            class="outer"></path>
                                    </svg>
                                </label>
                            
                        </div>
                    </div>
                    <hr>
                    <?php $i=$i +1;?>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" >Lưu</button>
                </div>
                {{ csrf_field() }}
            </form>
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
                <form action="{{route('post-delivery-profile-user')}}"  method="POST">
                    <div class="row">
                        <div class="col-lg-6 order-lg-1 order-1">
                            <div class="form-group">
                                <label for="">Họ tên</label>
                                <input type="text" required="required" class="form-control" id="" name="hoten"  placeholder="">
                                <input type="text" hidden name="customerid" value="{{Session::get('keyuser')['info'][0]['customer']['_id']}}">
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-2 order-4">
                            <div class="form-group">
                                <label for="">Tỉnh/ Thành phố</label>
                                <select name="tinh-thanhpho" id="tinh-thanhpho" class="form-control" style="margin-left: 0px;"
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
                                <select name="quan-huyen" id="quan-huyen" class="form-control" style="margin-left: 0px;"id="">
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
                                <select name="xa-phuong" id="xa-phuong" class="form-control" style="margin-left: 0px;">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-9 order-lg-7 order-7">
                            <div class="space15">&nbsp;</div>
                        </div>
                        <div class="col-lg-3 order-lg-8 order-8">
                            <button type="submit" class="btn btn-outline-warning btn-save text-right">Lưu thông tin</button>
                        </div>
                    </div>
                    {{ csrf_field() }}
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