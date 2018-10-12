@extends('admin/master')

@section('head')

<link href="{{ URL::asset('source/admin/assets/css/detail-product.css') }}" rel="stylesheet" type="text/css">

<style type="text/css">
    .bar-5 {
        width: 60%;
        height: 16px;
        background-color: #FFCC40;
    }

    .bar-4 {
        width: 50%;
        height: 16px;
        background-color: #FFCC40;
    }

    .bar-3 {
        width: 40%;
        height: 16px;
        background-color: #FFCC40;
    }

    .bar-2 {
        width: 30%;
        height: 16px;
        background-color: #FFCC40;
    }

    .bar-1 {
        width: 20%;
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
        @foreach ($resultdata['data'] as $item)
        <div class="container-fluid">
            <div class="panel panel-headline">
                <div class="panel-heading text-right">
                    <h2 class="panel-title">{{$item['product']['productName']}}</h2>
                    <p class="panel-subtitle">
                        <ul class="breadcrumb">
                            <li>{{$item['product']['productType']['productTypeName']}}</li>
                            {{-- <li>Mã sản phẩm: XXX</li> --}}
                        </ul>
                    </p>
                </div>
                <div class="panel-body">
                    <div class="row">

                        <div class="col-lg-5 col-md-5">
                            <div class="container-fluid" style="padding-right: 0px; margin-right: -15px;">
                                <div class="image_selected" id="image_selected">
                                    @foreach ($resultimg['datatext'] as $da )
                                    {{-- @foreach ($da['images'] as $da1) --}}
                                    @foreach ($da['imageList'] as $da1)
                                    <img id="expandedImg" src={{$da1["imageURL"]}} style="width:100%">
                                    @break
                                    {{-- @endforeach --}}
                                    @endforeach
                                    @endforeach

                                </div>
                                <div class="image-column">
                                    @foreach ($resultimg['datatext'] as $da )
                                    @foreach ($da['imageList'] as $da1)
                                    {{-- @foreach ($da1['imageList'] as $da2) --}}
                                    <div class="column1" id="column1">
                                        <img id="test1" src={{$da1["imageURL"]}} style="width:100%" onclick="imgshow(this);">
                                    </div>
                                    {{-- @endforeach --}}
                                    @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <div class="space10">&nbsp;</div>
                            <label for="basic" style="font-size: 19px">Giá sản phẩm: </label>
                            <div id="giasp">
                                <span style="font-size: 20px" id="price">{{$item['product']['price']}}.000₫</span>
                                <br>
                                @if(!empty($item['product']['saleOff']))
                                <span style="font-size: 18px; text-decoration: line-through;">{{$item['product']['price']}}.000₫</span>
                                <span style="font-size: 20px"> -{{$item['product']['saleOff']['discount']}}%</span>
                                {{-- @else --}}

                                @endif
                            </div>
                            <div class="space15">&nbsp;</div>
                            <label for="basic" style="font-size: 19px">Thông số kỹ thuật:</label>
                            <div class="space10">&nbsp;</div>
                            <table class="table form-style-4">
                                <tbody>
                                    @foreach ($item['product']['specifications'] as $item1)
                                    <tr>
                                        <td>
                                            <div class="text-table">{{$item1['title']}}</div>
                                        </td>
                                        <td>
                                            <div class="text-table">{{$item1['value']}}</div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="space10">&nbsp;</div>
                            <label for="basic">
                                <h3>Tổng quan sản phẩm:</h3>
                            </label>
                            <br>
                            @foreach ($item['product']['overviews'] as $item2)
                            @if(!empty($item2['title']))
                            <b style="margin-left: 10px">{{$item2['title']}} </b>
                            @else
                            <div></div>
                            @endif
                            <p style="margin-left: 10px">{{$item2['value']}}</p>
                            @endforeach
                        </div>
                       
                    </div>
                    <hr>
                    <div class="row">

                        <div class="col-lg-12">
                            {{-- <div class="section-title"> Điểm đánh giá trung bình</div> --}}
                            <div class="rating-overview">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="score">
                                                <label class="average">3<span class="countText" style="font-size: 29px">/5</span></label>
                                            </div>
                                            <div class="count">
                                                <div class="countText">
                                                    Đánh giá tích cực
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="scoreItem">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="side">
                                                            <div class="rating_r rating_r_5 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                                        </div>
                                                        <div class="middle">
                                                            <div class="bar-container">
                                                                <div class="bar-5"></div>
                                                            </div>
                                                        </div>
                                                        <div class="side right">
                                                            <div class="tillet"> 60</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="side">
                                                            <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                                        </div>
                                                        <div class="middle">
                                                            <div class="bar-container">
                                                                <div class="bar-4"></div>
                                                            </div>
                                                        </div>
                                                        <div class="side right">
                                                            <div class="tillet"> 50</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="side">
                                                            <div class="rating_r rating_r_3 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                                        </div>
                                                        <div class="middle">
                                                            <div class="bar-container">
                                                                <div class="bar-3"></div>
                                                            </div>
                                                        </div>
                                                        <div class="side right">
                                                            <div class="tillet"> 40</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="side">
                                                            <div class="rating_r rating_r_2 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                                        </div>
                                                        <div class="middle">
                                                            <div class="bar-container">
                                                                <div class="bar-2"></div>
                                                            </div>
                                                        </div>
                                                        <div class="side right">
                                                            <div class="tillet"> 30</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="side">
                                                            <div class="rating_r rating_r_1 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                                        </div>
                                                        <div class="middle">
                                                            <div class="bar-container">
                                                                <div class="bar-1"></div>
                                                            </div>
                                                        </div>
                                                        <div class="side right">
                                                            <div class="tillet"> 20</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="space10">&nbsp;</div>

                            <div class="viewed_title_container">
                                <h5 class="viewed_title">Nhận xét và đánh giá về sản phẩm</h5>
                            </div>
                            <div class="space10">&nbsp;</div>

                            <div class="sis-seller-reviews">
                                <div class="seller-review-item">
                                    <div class="row reviewer">
                                        <div class="rating_r rating_r_3 product_rating"> <i></i> <i></i> <i></i> <i></i>
                                            <i></i> <label class="itemFooter">An T. - 3 tháng trước</label></div>
                                    </div>
                                    <div class="row">
                                        <label class="comments">Hàng giao rất nhanh, dung lượng thực tế là 29,7G thế là
                                            quá ngon
                                            cho 1 chiếc thẻ Sandisk chính hãng rồi. Về độ bền thì để thời gian mới biết
                                            đc, nhưng
                                            mà Sandisk quá nổi tiếng rồi mình có 1 cái 2G mà dùng hơn 5 năm chả hỏng j
                                            cả 😄</label>
                                    </div>

                                </div>
                                <div class="seller-review-item">
                                    <div class="row reviewer">
                                        <div class="rating_r rating_r_4 product_rating"> <i></i> <i></i> <i></i> <i></i>
                                            <i></i> <label class="itemFooter">An T. - 3 tháng trước</label></div>
                                    </div>
                                    <div class="row">
                                        <label class="comments">Hàng giao rất nhanh, dung lượng thực tế là 29,7G thế là
                                            quá ngon
                                            cho 1 chiếc thẻ Sandisk chính hãng rồi. Về độ bền thì để thời gian mới biết
                                            đc, nhưng
                                            mà Sandisk quá nổi tiếng rồi mình có 1 cái 2G mà dùng hơn 5 năm chả hỏng j
                                            cả 😄</label>
                                    </div>

                                </div>
                                <div class="seller-review-item">
                                    <div class="row reviewer">
                                        <div class="rating_r rating_r_5 product_rating"> <i></i> <i></i> <i></i> <i></i>
                                            <i></i> <label class="itemFooter">An T. - 3 tháng trước</label></div>
                                    </div>
                                    <div class="row">
                                        <label class="comments">Hàng giao rất nhanh, dung lượng thực tế là 29,7G thế là
                                            quá ngon
                                            cho 1 chiếc thẻ Sandisk chính hãng rồi. Về độ bền thì để thời gian mới biết
                                            đc, nhưng
                                            mà Sandisk quá nổi tiếng rồi mình có 1 cái 2G mà dùng hơn 5 năm chả hỏng j
                                            cả 😄</label>
                                    </div>

                                </div>
                                <div class="seller-review-item">
                                    <div class="row reviewer">
                                        <div class="rating_r rating_r_5 product_rating"> <i></i> <i></i> <i></i> <i></i>
                                            <i></i> <label class="itemFooter">An T. - 3 tháng trước</label></div>
                                    </div>
                                    <div class="row">
                                        <label class="comments">Hàng giao rất nhanh, dung lượng thực tế là 29,7G thế là
                                            quá ngon
                                            cho 1 chiếc thẻ Sandisk chính hãng rồi. Về độ bền thì để thời gian mới biết
                                            đc, nhưng
                                            mà Sandisk quá nổi tiếng rồi mình có 1 cái 2G mà dùng hơn 5 năm chả hỏng j
                                            cả 😄</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="space10">&nbsp;</div>
                            <button type="button" class="btn btn-change" onclick="window.location='{{route('sua-chi-tiet-san-pham-admin',$item['product']['_id'])}}';">Cập
                                nhật</button>
                            <button type="button" class="btn btn-save">Xóa</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@endsection

@section('footer')
<script type="text/javascript" src="{{ URL::asset('source/admin/assets/scripts/iziToast.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('source/admin/assets/scripts/detail-product.js') }}"></script>


<script>
    var element = document.getElementById("product-admin");
    element.classList.add("active");

</script>

<script type="text/javascript">
    function imgshow(imgs) {
        var expandImg = document.getElementById("expandedImg");
        var imgText = document.getElementById("imgtext");
        expandImg.src = imgs.src;
        expandImg.parentElement.style.display = "block";
    }

</script>

<script type="text/javascript">
    jQuery.each(jQuery('textarea[data-autoresize]'), function () {
        var offset = this.offsetHeight - this.clientHeight;
        var resizeTextarea = function (el) {
            jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
        };
        jQuery(this).on('keyup input', function () {
            resizeTextarea(this);
        }).removeAttr('data-autoresize');
    });

</script>

@if(!empty($item['product']['saleOff']))
<script>
       var a = ('{{$item['product']['price']}}' - ('{{$item['product']['price']}}' * '{{$item['product']['saleOff']['discount']}}' / 100));

    document.getElementById('price').innerHTML = a.toPrecision(4) + ".000₫";

</script>
@endif

@endsection
