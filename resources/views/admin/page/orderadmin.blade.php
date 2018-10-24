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
                            <h3 class="panel-title"><b>Xác nhận đăng ký gian hàng</b> </h3>
                            <div class="right">
                                <input type="text" id="myInput" placeholder="Tìm kiếm..">
                            </div>
                        </div>
                        <div class="panel-body no-padding">

                            <table id="table_format" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên gian hàng</th>
                                        <th>Tên khách hàng</th>
                                        <th>Số điện thoại</th>
                                        <th>Ngày đăng ký</th>
                                        <th id="th_format">Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <tr>
                                        <td><a href="#">763648</a></td>
                                        <td>Steve</td>
                                        <td>$Steve</td>
                                        <td>123456789</td>
                                        <td>Oct 21, 2016</td>
                                        <td><span class="label label-success">Chấp nhận</span></td>
                                    </tr>
                                    <tr data-toggle="modal" data-target="#exampleModalLong">
                                        <td><a href="#">763649</a></td>
                                        <td>Amber</td>
                                        <td>$Steve</td>
                                        <td>123456789</td>
                                        <td>Oct 21, 2016</td>
                                        <td><span class="label label-warning">Chờ xác nhận</span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">763650</a></td>
                                        <td>Michael</td>
                                        <td>$34</td>
                                        <td>123456789</td>
                                        <td>Oct 18, 2016</td>
                                        <td><span class="label label-danger">Từ chối</span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">763650</a></td>
                                        <td>Michael</td>
                                        <td>$34</td>
                                        <td>123456789</td>
                                        <td>Oct 18, 2016</td>
                                        <td><span class="label label-danger">Từ chối</span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">763650</a></td>
                                        <td>Michael</td>
                                        <td>$34</td>
                                        <td>123456789</td>
                                        <td>Oct 18, 2016</td>
                                        <td><span class="label label-danger">Từ chối</span></td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Last 24
                                        hours</span></div>
                                <div class="col-md-6 text-right"><a href="#" class="btn btn-primary">View All Purchases</a></div>
                            </div>
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
    var element = document.getElementById("order-admin");
    element.classList.add("active");

</script>

<script>
    // jQuery('#table_format').ddTableFilter();
</script>


@endsection
