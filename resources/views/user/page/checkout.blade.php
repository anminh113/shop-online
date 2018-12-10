
@extends('user/master')
@section('head')
<link rel="stylesheet" type="text/css" href="source/user/styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/cart_responsive.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/header_css.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/cart.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/checkout.css">
<script src="https://js.stripe.com/v3/"></script>
<script src="source/user/styles/js/stripetest.js" data-rel-js></script>
<link rel="stylesheet" type="text/css" href="source/user/styles/css/base.css" data-rel-css="" />
<!-- CSS for each example: -->
<link rel="stylesheet" type="text/css" href="source/user/styles/css/example2.css" data-rel-css="" />
<link rel="stylesheet" type="text/css" href="source/user/styles/css/index.css">

@endsection
@section('content')
    <!-- Cart -->
   
    <div class="cart_section">
       
        <div class="row">
            <div class="col-lg-12">
                <div class="container">
                    <div class="characteristics"> 
                        <ul class="nav nav-tabs" role="tablist">
                        {{-- <li class="nav-item">
                            <a class="nav-link active" href="#shippinghome" role="tab" data-toggle="tab">
                                <div class="char_icon"><img style="width: 30px;height: 30px" src="https://png.icons8.com/ios/80/000000/in-transit.png"
                                        alt=""></div>
                                <div class="char_content">
                                    <div class="char_title">Thanh toán khi nhận hàng</div>
                                </div>                                
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#payonline" role="tab" data-toggle="tab">
                                <div class="char_icon"><img style="width: 30px;height: 30px" src="https://png.icons8.com/office/80/000000/online-payment-.png" alt=""></div>
                                <div class="char_content">
                                    <div class="char_title">Thẻ tín dụng hoặc thẻ ghi nợ</div>
                                </div>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#references" role="tab" data-toggle="tab">
                                <div class="char_icon"><img style="width: 30px;height: 30px" src="source/user/images/icons8-update-50.png"alt=""></div>
                                <div class="char_content">
                                    <div class="char_title">Chính sách đổi trả</div>
                                </div>
                            </a>
                        </li> --}}
                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-12">
                            <div class="tab-content">

                                <div role="tabpanel" class="tab-pane fade in active show" id="payonline">
                             
                                    <div class="globalContent" >
                                        <main>
                                            <section class="container">
                                                <!--Example 2-->
                                                <div class="cell example example2">
                                                <form id="payment-form" >
                                                        <input id="orderId" hidden  type="text" value="{{$dataorder['order']['_id']}}">
                                                        <div class="viewed_title_register">
                                                            <h3 class="viewed_title">Thanh toán trực tuyến</h3>
                                                        </div>
                                                        {{--<div data-locale-reversible>--}}
                                                            {{--<div class="row" hidden>--}}
                                                                {{--<div class="field">--}}
                                                                    {{--<input id="example2-address"   data-tid="elements_examples.form.address_placeholder" class="input empty" type="text" placeholder="Huynh Khac Duy" required="" autocomplete="address-line1" autofocus="">--}}
                                                                    {{--<label for="example2-address" data-tid="elements_examples.form.address_label">Tên trên thẻ</label>--}}
                                                                    {{--<div class="baseline"></div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{----}}
                                                        {{--</div>--}}
                                                        <div class="row">
                                                            <div class="field">
                                                                <div id="example2-card-number" class="input empty"></div>
                                                                <label for="example2-card-number" data-tid="elements_examples.form.card_number_label">Số thẻ</label>
                                                                <div class="baseline" ></div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="col-lg-6">  <div class="field half-width">
                                                                <div id="example2-card-expiry" class="input empty"></div>
                                                                <label for="example2-card-expiry" data-tid="elements_examples.form.card_expiry_label">Ngày hết hạn</label>
                                                                <div class="baseline"></div>
                                                            </div></div>
                                                                <div class="col-lg-6">
                                                            <div class="field half-width">
                                                                <div id="example2-card-cvc" class="input empty"></div>
                                                                <label for="example2-card-cvc" data-tid="elements_examples.form.card_cvc_label">CVC</label>
                                                                <div class="baseline"></div>
                                                            </div></div>
                                         
                                                        </div>
                                                        <button type="submit" data-tid="elements_examples.form.pay_button" >thanh toán</button>
                                                        <div class="error" role="alert">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                                                                <path class="base" fill="#000" d="M8.5,17 C3.80557963,17 0,13.1944204 0,8.5 C0,3.80557963 3.80557963,0 8.5,0 C13.1944204,0 17,3.80557963 17,8.5 C17,13.1944204 13.1944204,17 8.5,17 Z"></path>
                                                                <path class="glyph" fill="#FFF" d="M8.5,7.29791847 L6.12604076,4.92395924 C5.79409512,4.59201359 5.25590488,4.59201359 4.92395924,4.92395924 C4.59201359,5.25590488 4.59201359,5.79409512 4.92395924,6.12604076 L7.29791847,8.5 L4.92395924,10.8739592 C4.59201359,11.2059049 4.59201359,11.7440951 4.92395924,12.0760408 C5.25590488,12.4079864 5.79409512,12.4079864 6.12604076,12.0760408 L8.5,9.70208153 L10.8739592,12.0760408 C11.2059049,12.4079864 11.7440951,12.4079864 12.0760408,12.0760408 C12.4079864,11.7440951 12.4079864,11.2059049 12.0760408,10.8739592 L9.70208153,8.5 L12.0760408,6.12604076 C12.4079864,5.79409512 12.4079864,5.25590488 12.0760408,4.92395924 C11.7440951,4.59201359 11.2059049,4.59201359 10.8739592,4.92395924 L8.5,7.29791847 L8.5,7.29791847 Z"></path>
                                                            </svg>
                                                            <span class="message">Số thẻ của bạn không hợp lệ</span></div>
                                                            
                                                    </form>
                                                    <div class="success" >
                                                            <div class="loader-ellips">
                                                                    <span class="loader-ellips__dot"></span>
                                                                    <span class="loader-ellips__dot"></span>
                                                                    <span class="loader-ellips__dot"></span>
                                                                    <span class="loader-ellips__dot"></span>
                                                                  </div>
                                                        <div class="icon" hidden>
                                                            <svg width="84px" height="84px" viewBox="0 0 84 84" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                <circle class="border" cx="42" cy="42" r="40" stroke-linecap="round" stroke-width="4" stroke="#000" fill="none"></circle>
                                                                <path class="checkmark" stroke-linecap="round" stroke-linejoin="round" d="M23.375 42.5488281 36.8840688 56.0578969 64.891932 28.0500338" stroke-width="4" stroke="#000" fill="none"></path>
                                                            </svg>
                                                        </div>
                                                        <h3 class="title" hidden data-tid="elements_examples.success.title">Thanh toán thành công</h3>
                                                     
                                                        <p class="message" hidden><span data-tid="elements_examples.success.message">Thanks for trying Stripe Elements. No money was charged, but we generated a token: </span><span class="token"></span></p>
                                                        <a class="reset" href="#" hidden>
                                                            <svg width="32px" height="32px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                <path fill="#000000" d="M15,7.05492878 C10.5000495,7.55237307 7,11.3674463 7,16 C7,20.9705627 11.0294373,25 16,25 C20.9705627,25 25,20.9705627 25,16 C25,15.3627484 24.4834055,14.8461538 23.8461538,14.8461538 C23.2089022,14.8461538 22.6923077,15.3627484 22.6923077,16 C22.6923077,19.6960595 19.6960595,22.6923077 16,22.6923077 C12.3039405,22.6923077 9.30769231,19.6960595 9.30769231,16 C9.30769231,12.3039405 12.3039405,9.30769231 16,9.30769231 L16,12.0841673 C16,12.1800431 16.0275652,12.2738974 16.0794108,12.354546 C16.2287368,12.5868311 16.5380938,12.6540826 16.7703788,12.5047565 L22.3457501,8.92058924 L22.3457501,8.92058924 C22.4060014,8.88185624 22.4572275,8.83063012 22.4959605,8.7703788 C22.6452866,8.53809377 22.5780351,8.22873685 22.3457501,8.07941076 L22.3457501,8.07941076 L16.7703788,4.49524351 C16.6897301,4.44339794 16.5958758,4.41583275 16.5,4.41583275 C16.2238576,4.41583275 16,4.63969037 16,4.91583275 L16,7 L15,7 L15,7.05492878 Z M16,32 C7.163444,32 0,24.836556 0,16 C0,7.163444 7.163444,0 16,0 C24.836556,0 32,7.163444 32,16 C32,24.836556 24.836556,32 16,32 Z"></path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </section>
                                        </main>
                                    </div>
                                  
                                    <form action="{{route('post-check-out')}}" method="POST"  id="pay">
                                            <input  hidden name="orderId"   type="text"  value="{{$dataorder['order']['_id']}}">
                                         
                                            {{ csrf_field() }}

                                    </form>
                                </div>
                                
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
                                                        <h4><b>Thông tin đơn hàng</b></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- @if(Session::has('cart')) --}}
                                        <div class="order_total_content ">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="order_cart_title ">Tạm tính ({{$dataorder['order']['totalQuantity']}} sản phẩm)</div>
                                                </div>
                                                <div class="col-lg-5 col-md-5">
                                                    <div class="order_cart_amount text-right">{{number_format($dataorder['order']['totalPrice'])}},000₫</div>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <div class="order_total_content ">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-8">
                                                    <div class="order_cart_title ">Phí giao hàng</div>
                                                </div>
                                                <div class="col-lg-5 col-md-4">
                                                    @if($dataorder['order']['deliveryPrice']['transportFee'] == 0)
                                                    <div class="order_cart_amount text-right" style="font-size: 12px; color:#5F6368 "> Miễn phí vận chuyển</div>
                                                    @else
                                                    <div class="order_cart_amount text-right" >{{number_format($dataorder['order']['deliveryPrice']['transportFee'])}},000₫</div>
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
                                                     @if($dataorder['order']['deliveryPrice']['transportFee'] == 0)

                                                    <div class="order_cart_amount text-right text-danger">{{number_format($dataorder['order']['totalPrice'])}},000₫</div>
                                                    <input type="text" form="pay" hidden name="amount" value="{{$dataorder['order']['totalPrice']}}000">

                                                    @else
                                                    <div class="order_cart_amount text-right text-danger">{{number_format($dataorder['order']['totalPrice'] + $dataorder['order']['deliveryPrice']['transportFee'])}},000₫</div>
                                                    <input type="text" form="pay" hidden name="amount" value="{{$dataorder['order']['totalPrice']+ $dataorder['order']['deliveryPrice']['transportFee']}}000">
                                                    @endif

                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="order_total_amount1">(Giá đã bao gồm VAT)</div>
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
    </div>

@endsection


@section('footer')

<script src="source/user/js/cart_custom.js"></script>
<script src="source/user/styles/js/cart.js"></script>
<script src="source/user/styles/js/checkout.js"></script>

<script src="source/user/styles/js/l10n.js" data-rel-js></script>
<!-- Scripts for each example: -->
<script src="source/user/styles/js/example2.js" data-rel-js></script>

<script>


@endsection