@extends('admin/master')

@section('head')

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
                            <h3 class="panel-title"><b>Đơn hàng đang chờ xử lý </b> </h3>
                            <div class="right">
                                <input type="text" id="myInput" placeholder="Tìm kiếm..">
                            </div>
                        </div>
                    </div>
                    <!-- END RECENT PURCHASES -->
                    @foreach ($resultOrder['dataOrder'] as $item)
                    <!-- PANEL WITH FOOTER -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Đơn hàng ngày: <script>var dtstart = moment('{{$item['product']['purchaseDate']}}').format('MM/DD/YYYY'); document.write(dtstart);</script></h3>
                            <div class="right">
                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6" style="border-right:solid 1px #dadada;"> 
                                    <ul class="list-unstyled list-justify" >
                                        <li>Tên người nhận:<span style="color:#212121">{{$item['product']['deliveryAddress']['presentation']}}</span></li>
                                        <li>Số điện thoại:<span style="color:#212121">{{$item['product']['deliveryAddress']['phoneNumber']}}</span></li>
                                        <li>Địa chỉ: <i style="color:#212121" > {{$item['product']['deliveryAddress']['address']}}</i><span></span></li>
                                       
                                        <li>Thanh toán bằng hình thức:<span style="color:#212121">{{$item['product']['paymentMethod']['paymentMethodName']}}</span></li>
                                    </ul>
                                </div>
                                <div class="col-lg-6"> 
                                    <ul class="list-unstyled list-justify">
                                        <li>Tên sản phẩm: <i style="color:#212121"> {{$item['OrderItem']['product']['productName']}}</i><span></span></li>
                                        <li> <span style="padding: 10px 10px 10px 10px"><img src="{{$item['OrderItem']['product']['imageURL']}}" width="115" height="115"></span></li>
                                        <li>Giá sản phẩm:<span style="color:#212121">{{number_format(($item['OrderItem']['product']['price']))}},000₫</span></li>
                                        <li>Tạm tính ({{$item['OrderItem']['quantity']}} sản phẩm):<span style="color:#212121">{{number_format(($item['OrderItem']['product']['price'] * $item['OrderItem']['quantity']))}},000₫</span></li>
                                        <li>Tổng cộng: <span style="color:#212121">{{number_format($item['OrderItem']['product']['price'] * $item['OrderItem']['quantity'] + $item['product']['deliveryPrice']['transportFee'])}},000₫</span></li>
                                    </ul>
                                </div>
                            </div>
                           
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <form id="changeState{{$item['OrderItem']['_id']}}" action="{{route('update-state-order-admin')}}" method="POST">
                                    <input type="text" hidden name="orderId" value="{{$item['OrderItem']['_id']}}">
                                    <div class="col-md-6"><span class="panel-note" style="font-size:14px">Trạng thái: {{$item['OrderItem']['orderItemState']['orderStateName']}}</div>
                                    <div class="col-md-6 text-right"><button type="submit" onclick="archiveFunction()" form="changeState{{$item['OrderItem']['_id']}}" class="btn btn-outline- btn-save">Chuyển trạng thái đã xử lý</button></div>
                                    @method('PATCH')
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- END PANEL WITH FOOTER -->
                    @endforeach
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
    var element = document.getElementById("order-admin");
    element.classList.add("active");
    var element1 = document.getElementById("subPages");
    element1.classList.add("active");
    element1.classList.add("collapse");
    element1.classList.add("in");

</script>

<script>
    // jQuery('#table_format').ddTableFilter();
</script>


@endsection
