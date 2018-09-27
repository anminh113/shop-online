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
                            <h3 class="panel-title"><b>Danh sách gian hàng</b> </h3>
                            <div class="right">
                                    <input type="text" id="myInput"  placeholder="Tìm kiếm..">
                            </div>
                        </div>
                        <div class="panel-body no-padding">
                            <table class="table table-striped" >
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Gian hàng</th>
                                        <th>Người đại diện</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ kho</th>
                                        <th>Xem chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <tr>
                                        <td><a href="#">763648</a></td>
                                        <td>Steve</td>
                                        <td>$Steve</td>
                                        <td>0123456789</td>
                                        <td>6</td>
                                        <td><a href="detail-admin-shop">Xem chi tiết</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">763649</a></td>
                                        <td>Amber</td>
                                        <td>$Steve</td>
                                        <td>0123456789</td>
                                        <td>16</td>
                                        <td><a href="detail-admin-shop">Xem chi tiết</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">763650</a></td>
                                        <td>Michael</td>
                                        <td>$34</td>
                                        <td>0123456789</td>
                                        <td>216</td>
                                        <td><a href="detail-admin-shop  ">Xem chi tiết</a></td>
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
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLongTitle">Xác nhận đăng ký</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
{{-- <script>
   $(document).ready(function(){
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    });
</script> --}}
<script>
    var element = document.getElementById("category-admin-shop");
    element.classList.add("active");
</script>


@endsection