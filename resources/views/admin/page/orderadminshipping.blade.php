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
                            <h3 class="panel-title"><b>Đơn hàng đang giao hàng </b> </h3>
                            <div class="right">
                                {{--<input type="text" id="myInput" placeholder="Tìm kiếm..">--}}
                            </div>
                        </div>
                    </div>
                    <!-- END RECENT PURCHASES -->
                    @foreach (array_reverse($resultOrder['dataOrder']) as $item)
                    <!-- PANEL WITH FOOTER -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Đơn hàng ngày: <script>var dtstart = moment('{{$item['order']['purchaseDate']}}').format('MM/DD/YYYY'); document.write(dtstart);</script></h3>
                            <div class="right">
                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                {{--<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>--}}
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6" style="border-right:solid 1px #dadada;"> 
                                    <ul class="list-unstyled list-justify" >
                                        <li>Tên người nhận:<span style="color:#212121">{{$item['order']['deliveryAddress']['presentation']}}</span></li>
                                        <li>Số điện thoại:<span style="color:#212121">{{$item['order']['deliveryAddress']['phoneNumber']}}</span></li>
                                        <li>Địa chỉ: <i style="color:#212121" > {{$item['order']['deliveryAddress']['address']}}</i><span></span></li>
                                       
                                        <li>Thanh toán bằng hình thức:<span style="color:#212121">{{$item['order']['paymentMethod']['paymentMethodName']}}</span></li>
                                    </ul>
                                </div>
                                <div class="col-lg-6"> 
                                    <ul class="list-unstyled list-justify">
                                        <li>Tên sản phẩm: <i style="color:#212121"> {{$item['OrderItem']['product']['productName']}}</i><span></span></li>
                                        <li> <span style="padding: 10px 10px 10px 10px"><img class="lazy" data-src="{{$item['OrderItem']['product']['imageURL']}}" width="115" height="115"></span></li>
                                        <li>Giá sản phẩm:<span style="color:#212121">{{number_format(($item['OrderItem']['product']['price']))}},000₫</span></li>
                                        <li>Tạm tính ({{$item['OrderItem']['quantity']}} sản phẩm):<span style="color:#212121">{{number_format(($item['OrderItem']['product']['price'] * $item['OrderItem']['quantity']))}},000₫</span></li>
                                        <li>Tổng cộng: <span style="color:#212121">{{number_format(($item['OrderItem']['product']['price'] * $item['OrderItem']['quantity']) + $item['order']['deliveryPrice']['transportFee'])}},000₫</span></li>
                                    </ul>
                                </div>
                            </div>
                           
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <form id="changeState{{$item['OrderItem']['_id']}}" action="{{route('update-shipping-order-admin')}}" method="POST">
                                    <input type="text" hidden name="orderId" value="{{$item['OrderItem']['_id']}}">
                                    <div class="col-md-6"><span class="panel-note" style="font-size:14px">Trạng thái: {{$item['OrderItem']['orderItemState']['orderStateName']}}</div>
                                    <div class="col-md-6 text-right"><button type="submit" onclick="archiveFunction()" form="changeState{{$item['OrderItem']['_id']}}" class="btn btn-outline- btn-save">Chuyển trạng thái đã giao hàng</button></div>
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
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Xác nhận đăng ký</h4>
                <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn có chấp nhận người dùng Huỳnh khắc Duy đăng ký gian hàng OchoS?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Từ Chối</button>
                <button type="button" class="btn btn-success">Chấp Nhận</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')

<script>
    var element = document.getElementById("order-admin-shipping");
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
