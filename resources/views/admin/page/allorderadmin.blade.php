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
                                <h3 class="panel-title"><b>Danh sách đơn hàng</b> </h3>
                                <div class="right">
                                    <input type="text" id="myInput" placeholder="Tìm kiếm..">
                                </div>
                            </div>
                            <div class="panel-body no-padding">
                                <table id="table_format" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá </th>
                                        <th>Số lượng</th>
                                        <th id="th_format1">Tên gian hàng</th>
                                        <th id="th_format">Trạng thái</th>
                                    </tr>
                                    </thead>
                                    <tbody id="myTable">
                                    @foreach ($data['orders'] as $item => $orderitem)
                                        @foreach($data['orders'][$item]['OrderItem'] as $text )
                                        <tr >
                                                <td>{{$data['orders'][$item]['_id']}}</td>
                                                <td><img class="lazy" data-src="{{$text['product']['imageURL']}}" width="50" height="50"></td>
                                                <td>{{$text['product']['productName']}}</td>
                                                <td>{{number_format($text['product']['price'],3 ,'.', '.')}}₫</td>
                                                <td>{{$text['quantity']}}</td>
                                                <td>{{$text['product']['store']['storeName']}}</td>
                                                <td><span class="label label-warning">{{$data['orders'][$item]['orderState']['orderStateName']}}</span></td>
                                        </tr>
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
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
    <script type="text/javascript" src="{{ URL::asset('source/admin/assets/scripts/ddtf1.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('source/admin/assets/scripts/paginathing.js') }}"></script>

    <script>
        $('#myTable').paginathing({
            pagerSelector: '#myPager',
            activeColor: 'Blue',
            prevText: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            nextText: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
            insertAfter: '#table_format',
            showPrevNext: true,
            limitPagination: 3,
            hidePageNumbers: false,
            perPage: 10
        });
    </script>
    <script>
        var element = document.getElementById("all-order-admin");
        element.classList.add("active");

    </script>

    <script>
        jQuery('#table_format').ddTableFilter();
    </script>


@endsection
