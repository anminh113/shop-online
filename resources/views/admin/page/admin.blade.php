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
                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                {{-- <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button> --}}
                            </div>
                        </div>
                        <div class="panel-body no-padding">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên gian hàng</th>
                                        <th>Tên khách hàng</th>
                                        <th>Số điện thoại</th>
                                        <th>Ngày đăng ký</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="#">763648</a></td>
                                        <td>Steve</td>
                                        <td>$Steve</td>
                                        <td>0123456789</td>
                                        <td>Oct 21, 2016</td>
                                        <td><span class="label label-success">COMPLETED</span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">763649</a></td>
                                        <td>Amber</td>
                                        <td>$Steve</td>
                                        <td>0123456789</td>
                                        <td>Oct 21, 2016</td>
                                        <td><span class="label label-warning">PENDING</span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">763650</a></td>
                                        <td>Michael</td>
                                        <td>$34</td>
                                        <td>0123456789</td>
                                        <td>Oct 18, 2016</td>
                                        <td><span class="label label-danger">FAILED</span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">763651</a></td>
                                        <td>Roger</td>
                                        <td>$186</td>
                                        <td>0123456789</td>
                                        <td>Oct 17, 2016</td>
                                        <td><span class="label label-success">SUCCESS</span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">763652</a></td>
                                        <td>Smith</td>
                                        <td>$362</td>
                                        <td>0123456789</td>
                                        <td>Oct 16, 2016</td>
                                        <td><span class="label label-success">SUCCESS</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Last 24 hours</span></div>
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
@endsection

@section('footer')
<script>
    var element = document.getElementById("admin");
    element.classList.add("active");
</script>

@endsection