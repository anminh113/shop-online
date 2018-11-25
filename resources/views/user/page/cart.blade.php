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
                    <div class="column-labels">
                        <label class="product-image">Giỏ Hàng</label>
                        <label class="product-details">Sản phẩm</label>
                        <label class="product-price">Giá</label>
                        <label class="product-quantity">Số lượng</label>
                        <label class="product-line-price">Thành tiền</label>
                        <label class="product-removal">Xóa</label>
                    </div>
                    @if(Session::has('cart'))
                    <?php $i =0 ?>
                    @foreach ($product_cart as $item)
                    <?php $i=$i+1?>

                     @if($item['item']['quantity'] >0)
                    <div class="product">
                        <div class="product-image">
                                <img src="{{$item['img']}}" alt="">
                        </div>
                        <div class="product-details">
                            <div class="product-title">{{$item['item']['productName']}}</div>
                        </div>
                        <div class="product-price">
                            @if(empty($item['item']['saleOff']) || $item['item']['saleOff']['dateEnd'] < $time) 
                                {{number_format($item['item']['price'])}},000₫ 
                            @else
                                {{number_format($item['item']['price'] - ($item['item']['price'] *$item['item']['saleOff']['discount'])/100)}},000₫ 
                            @endif
                        </div>

                        <div class="product-quantity">
                            <span class="input-group-btn btn-count-price" >
                                <div class="btn btn-number quantity_inc" >
                                    <i class="fas fa-minus"></i>
                                </div>
                            </span>
                            <input  type="number" form="add" name="qty[]" class="form-control input-number text-center"
                                min="1" max="{{$item['item']['quantity']}}" step="1" value="{{$item['qty']}}"
                                 style="background-color: #fff; " required  readonly>
                            <span class="input-group-btn btn-count-price">
                                <div class="btn  btn-number quantity_dec">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </span>
                        </div>
                        <div class="product-line-price">
                            @if(empty($item['item']['saleOff']) || $item['item']['saleOff']['dateEnd'] < $time)
                                {{number_format($item['qty'] * $item['item']['price'])}},000₫
                            @else
                                {{number_format($item['qty'] * ($item['item']['price'] - ($item['item']['price'] *$item['item']['saleOff']['discount'])/100))}},000₫
                            @endif
                        </div>

                        <div class="product-removal">
                            <a id="delete{{$item['item']['_id']}}" href="{{Route('xoa-gio-hang',$item['item']['_id'])}}" style="color:#5F6368"><i class="fas fa-trash"></i></a>
                        </div>
                        <input hidden type="text" form="add" name="productid[]" value="{{$item['item']['_id']}}">
                    </div>
                        <script>
                            $('#delete{{$item['item']['_id']}}').click(function(e){
                                e.preventDefault();
                                var link = $(this).attr('href');
                                console.log(link);
                                swal({
                                    title: 'Xác nhận?',
                                    text: "Bạn có muốn thực hiện hành động này",
                                    type: 'warning',
                                    position: 'top',
                                    showCancelButton: true,
                                    confirmButtonColor: '#008496',
                                    cancelButtonColor: '#FA5821',
                                    confirmButtonText: 'Đồng ý',
                                    cancelButtonText: 'Hủy'

                                }).then((result) => {
                                    if (result.value) {
                                        window.location.href = link;
                                    }
                                })
                            });
                        </script>
                    @else
                            <div class="product">
                                <div class="product-image">
                                    <img src="{{$item['img']}}" alt="">
                                </div>
                                <div class="product-details">
                                    <div class="product-title">{{$item['item']['productName']}}</div>
                                </div>
                                <div class="product-price">
                                    @if(empty($item['item']['saleOff']) || $item['item']['saleOff']['dateEnd'] < $time)
                                        {{number_format($item['item']['price'])}},000₫
                                    @else
                                        {{number_format($item['item']['price'] - ($item['item']['price'] *$item['item']['saleOff']['discount'])/100)}},000₫
                                    @endif
                                </div>

                                <div class="product-quantity">
                                        <div class="product-title"><i>Sản phẩm tạm hết hàng</i></div>
                                </div>
                                <div class="product-line-price">
                                    @if(empty($item['item']['saleOff']) || $item['item']['saleOff']['dateEnd'] < $time)
                                        {{number_format($item['qty'] * $item['item']['price'])}},000₫
                                    @else
                                        {{number_format($item['qty'] * ($item['item']['price'] - ($item['item']['price'] *$item['item']['saleOff']['discount'])/100))}},000₫
                                    @endif
                                </div>

                                <div class="product-removal">
                                    <a id="delete{{$item['item']['_id']}}" href="{{Route('xoa-gio-hang',$item['item']['_id'])}}" style="color:#5F6368"><i class="fas fa-trash"></i></a>
                                </div>
                            </div>
                            <script>
                                $('#delete{{$item['item']['_id']}}').click(function(e){
                                    e.preventDefault();
                                    var link = $(this).attr('href');
                                    console.log(link);
                                    swal({
                                        title: 'Xác nhận?',
                                        text: "Bạn có muốn thực hiện hành động này",
                                        type: 'warning',
                                        position: 'top',
                                        showCancelButton: true,
                                        confirmButtonColor: '#008496',
                                        cancelButtonColor: '#FA5821',
                                        confirmButtonText: 'Đồng ý',
                                        cancelButtonText: 'Hủy'

                                    }).then((result) => {
                                        if (result.value) {
                                            window.location.href = link;
                                        }
                                    })
                                });
                            </script>
                    @endif

                    @endforeach
                    @endif

                    <form action="{{route('post-gio-hang')}}" id="add" method="post">
                        <button type="submit" class="btn btn-outline- btn-save" style="display: none">Cập nhật giỏ hàng</button>
                        {{ csrf_field() }}
                    </form>
                    <div class="order_total">
                        <div class="row">
                            @if(Session::has('cart'))
                            <div class="col-lg-6">
                                <div class="order_total_content text-letf">
                                    <div class="order_total_title text-letf">Tạm tính:</div>
                                    <div class="order_total_amount">
                                        {{number_format(Session::get('cart')->totalPrice)}},000₫
                                    </div>
                                </div>
                                @foreach ($data['deliveryPrices'] as $item)
                                @if($item['totalPriceMin'] <= Session::get('cart')->totalPrice && $item['totalPriceMax'] >= Session::get('cart')->totalPrice )
                                <div class="order_total_content text-letf">
                                    <div class="order_total_title text-letf">Phí vận chuyển tạm tính:</div>
                                    <div class="order_total_amount">
                                        {{$item['transportFee']}},000₫
                                    </div>
                                </div>
                                <div class="order_total_content text-left">
                                    <div class="order_total_title text-letf">Thành Tiền:</div>
                                    <div class="order_total_amount"> {{number_format(Session::get('cart')->totalPrice) + $item['transportFee']}},000₫</div>
                                </div>
                                @break
                                @elseif($item['totalPriceMax'] == null)
                                <div class="order_total_content text-letf">
                                        <div class="order_total_title text-letf">Phí vận chuyển tạm tính:</div>
                                        <div class="order_total_amount" style="font-size: 14px; color:#5F6368 ">
                                            Miễn phí vận chuyển
                                        </div>
                                    </div>
                                    <div class="order_total_content text-left">
                                        <div class="order_total_title text-letf">Thành Tiền:</div>
                                        <div class="order_total_amount"> {{number_format(Session::get('cart')->totalPrice) }},000₫</div>
                                    </div>
                                    @break
                                @endif
                                            
                                @endforeach
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
</div>


@endsection


@section('footer')
<script src="source/user/js/cart_custom.js"></script>
<script src="source/user/styles/js/cart.js"></script>
<script>
    jQuery('.product-quantity').each(function() {
        var spinner = jQuery(this),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find('.quantity_dec'),
            btnDown = spinner.find('.quantity_inc'),
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
            jQuery('.btn-save').css( "display", "block" );
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
            jQuery('.btn-save').css( "display", "block" );
            spinner.find("input").trigger("change");
        });

    });

</script>



@endsection
