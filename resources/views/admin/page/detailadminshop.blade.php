@extends('admin/master')

@section('head')
<link href="{{ URL::asset('source/admin/assets/css/product.css') }}" rel="stylesheet" type="text/css">
<style type="text/css">
    .bar-verygood {
        width: 60%;
        height: 16px;
        background-color: #FFCC40;
    }

    .bar-good {
        width: 30%;
        height: 16px;
        background-color: #FFCC40;
    }

    .bar-bad {
        width: 10%;
        height: 16px;
        background-color: #FFCC40;
    }

    .product_item {
        position: inherit;
        display: table-column;
    }

    .page-active {
        display: block;
    }

</style>
@endsection

@section('content')


<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- RECENT PURCHASES -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><b>Gian hàng XXX</b> </h3>
                            <div class="right" style="position: absolute;">
                                <input type="text" id="myInput" placeholder="Tìm kiếm..">
                            </div>
                        </div>
                        <div class="panel-body  ">
                            <!-- TABBED CONTENT -->
                            <div class="custom-tabs-line tabs-line-bottom left-aligned">
                                <ul class="nav" role="tablist">
                                    <li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Sản
                                            phẩm <span class="badge">7</span></a></li>
                                    <li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Nhận xét & Đánh giá</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab-bottom-left1">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="product-type" style="height:380px" onclick="">
                                            <div class="product_border"></div>
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                <img src="source/admin/assets/img/profile-bg.png" width="215" height="215"
                                                    alt="">
                                            </div>
                                            <div class="product_content">
                                                <div class="product_price"></div>
                                                <div class="product_name">
                                                    <div><a href="#" tabindex="0">Bộ nhớ/ Ram Corsair Vengeance RGB
                                                            Pro 16GB (2 x 8GB) DDR4 3200 (CMW16GX4M2C3200C16)</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="space10">&nbsp;</div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="product-type" style="height:380px" onclick="">
                                            <div class="product_border"></div>
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                <img src="source/admin/assets/img/profile-bg.png" width="215" height="215"
                                                    alt="">
                                            </div>
                                            <div class="product_content">
                                                <div class="product_price"></div>
                                                <div class="product_name">
                                                    <div><a href="#" tabindex="0">Bộ nhớ/ Ram Corsair Vengeance RGB
                                                            Pro 16GB (2 x 8GB) DDR4 3200 (CMW16GX4M2C3200C16)</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="space10">&nbsp;</div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="product-type" style="height:380px" onclick="">
                                            <div class="product_border"></div>
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                <img src="source/admin/assets/img/profile-bg.png" width="215" height="215"
                                                    alt="">
                                            </div>
                                            <div class="product_content">
                                                <div class="product_price"></div>
                                                <div class="product_name">
                                                    <div><a href="#" tabindex="0">Bộ nhớ/ Ram Corsair Vengeance </a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="space10">&nbsp;</div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="product-type" style="height:380px" onclick="">
                                            <div class="product_border"></div>
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                <img src="source/admin/assets/img/profile-bg.png" width="215" height="215"
                                                    alt="">
                                            </div>
                                            <div class="product_content">
                                                <div class="product_price"></div>
                                                <div class="product_name">
                                                    <div><a href="#" tabindex="0">Bộ nhớ/ Ram Corsair Vengeance RGB
                                                            Pro 16GB (2 x 8GB) DDR4 3200 (CMW16GX4M2C3200C16)</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="space10">&nbsp;</div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="product-type" style="height:380px" onclick="">
                                            <div class="product_border"></div>
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                <img src="source/admin/assets/img/profile-bg.png" width="215" height="215"
                                                    alt="">
                                            </div>
                                            <div class="product_content">
                                                <div class="product_price"></div>
                                                <div class="product_name">
                                                    <div><a href="#" tabindex="0">Bộ nhớ/ Ram Corsair Vengeance RGB
                                                            Pro 16GB (2 x 8GB) DDR4 3200 (CMW16GX4M2C3200C16)</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="space10">&nbsp;</div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="product-type" style="height:380px" onclick="">
                                            <div class="product_border"></div>
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                <img src="source/admin/assets/img/profile-bg.png" width="215" height="215"
                                                    alt="">
                                            </div>
                                            <div class="product_content">
                                                <div class="product_price"></div>
                                                <div class="product_name">
                                                    <div><a href="#" tabindex="0">Bộ nhớ/ Ram Corsair Vengeance RGB
                                                            Pro 16GB (2 x 8GB) DDR4 3200 (CMW16GX4M2C3200C16)</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="space10">&nbsp;</div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-bottom-left2">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="section-title"> Điểm đánh giá trung bình</div>
                                            <div class="rating-overview">
                                                <div class="col-lg-3">
                                                    <div class="score">
                                                        <label class="average">88%</label>
                                                    </div>
                                                    <div class="count">
                                                        <div class="countText">
                                                            Đánh giá tích cực
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="scoreItem">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="side">
                                                                    <div class="tillet">Tốt</div>
                                                                </div>
                                                                <div class="middle">
                                                                    <div class="bar-container">
                                                                        <div class="bar-verygood"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="side right">
                                                                    <div class="tillet">&nbsp;&nbsp;&nbsp; 150</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="side">
                                                                    <div class="tillet">Trung bình</div>
                                                                </div>
                                                                <div class="middle">
                                                                    <div class="bar-container">
                                                                        <div class="bar-good"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="side right">
                                                                    <div class="tillet">&nbsp;&nbsp;&nbsp; 63</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="side">
                                                                    <div class="tillet">Chưa tốt</div>
                                                                </div>
                                                                <div class="middle">
                                                                    <div class="bar-container">
                                                                        <div class="bar-bad"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="side right">
                                                                    <div class="tillet">&nbsp;&nbsp;&nbsp;&nbsp; 20</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="space50">&nbsp;</div>
                                            <div class="section-title"> Nhận xét và đánh giá nhà bán hàng (40)</div>
                                            {{-- <div>
                                                <img class="filter__seller-rating" src="source/user/images/icon-verygood.png"
                                                    width="24" height="24">
                                                <img class="filter__seller-rating" src="source/user/images/icon-good.png"
                                                    width="24" height="24">
                                                <img class="filter__seller-rating" src="source/user/images/icon-bad.png"
                                                    width="24" height="24">
                                            </div> --}}
                                            {{-- <div class="space10">&nbsp;</div>
                                            <div class="contact_form_text">
                                                <textarea id="contact_form_message" data-autoresize class="text_field contact_form_message"
                                                    name="message" rows="7" placeholder="Đánh giá..." required="required"
                                                    data-error="Please, write us a message."></textarea>
                                            </div> --}}
                                            <div class="space10">&nbsp;</div>
                                            <div class="sis-seller-reviews">
                                                <div class="seller-review-item">
                                                    <div class="row rate"><img class="" src="source/user/images/icon-color-verygood.png"
                                                            width="24" height="24">&nbsp;&nbsp;<span> Tốt</span></div>
                                                    <div class="row">
                                                        <label class="comments">Hàng giao rất nhanh, dung lượng thực tế
                                                            là 29,7G thế là quá ngon cho 1 chiếc thẻ Sandisk chính hãng
                                                            rồi. Về độ bền thì để thời gian mới biết đc, nhưng mà
                                                            Sandisk quá nổi tiếng rồi mình có 1 cái 2G mà dùng hơn 5
                                                            năm chả hỏng j cả 😄</label>
                                                    </div>
                                                    <div class="row reviewer">
                                                        <label class="itemFooter">An T. - 3 tháng trước</label>
                                                    </div>
                                                </div>
                                                <div class="seller-review-item">
                                                    <div class="row rate"><img class="" src="source/user/images/icon-color-good.png"
                                                            width="24" height="24">&nbsp;&nbsp;<span> Trung bình</span></div>
                                                    <div class="row">
                                                        <label class="comments">Hàng giao rất nhanh, dung lượng thực tế
                                                            là 29,7G thế là quá ngon cho 1 chiếc thẻ Sandisk chính hãng
                                                            rồi. Về độ bền thì để thời gian mới biết đc, nhưng mà
                                                            Sandisk quá nổi tiếng rồi mình có 1 cái 2G mà dùng hơn 5
                                                            năm chả hỏng j cả 😄</label>
                                                    </div>
                                                    <div class="row reviewer">
                                                        <label class="itemFooter">An T. - 3 tháng trước</label>
                                                    </div>
                                                </div>
                                                <div class="seller-review-item">
                                                    <div class="row rate"><img class="" src="source/user/images/icon-color-bad.png"
                                                            width="24" height="24">&nbsp;&nbsp;<span> Chưa tốt</span></div>
                                                    <div class="row">
                                                        <label class="comments">Hàng giao rất nhanh, dung lượng thực tế
                                                            là 29,7G thế là quá ngon cho 1 chiếc thẻ Sandisk chính hãng
                                                            rồi. Về độ bền thì để thời gian mới biết đc, nhưng mà
                                                            Sandisk quá nổi tiếng rồi mình có 1 cái 2G mà dùng hơn 5
                                                            năm chả hỏng j cả 😄</label>
                                                    </div>
                                                    <div class="row reviewer">
                                                        <label class="itemFooter">An T. - 3 tháng trước</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END TABBED CONTENT -->
                        </div>
                    </div>
                    <!-- END RECENT PURCHASES -->
                </div>

            </div>

        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->

@endsection

@section('footer')

<script>
    var element = document.getElementById("category-admin-shop");
    element.classList.add("active");

</script>


@endsection
