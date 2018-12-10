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
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ kho</th>
                                        <th>Thời gian trên hệ thống</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                        <?php $i=1;?>
                                    @foreach ($data['stores'] as $item)
                                    <tr>
                                        <td><a href="#"><?php echo $i;?></a></td>
                                        <td>{{$item['storeName']}}</td>
                                        <td>{{$item['phoneNumber']}}</td>
                                        <td>{{$item['location']}}</td>
                                        <td>Từ ngày: <script>var dtstart = moment('{{$item['createdDate']}}').format('DD/MM/YYYY'); document.write(dtstart);</script></td>
                                        {{--  <td><a href="">Xem chi tiết</a></td>  --}}
                                    </tr>
                                    <?php $i++;?>
                                    @endforeach
                                   
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer">
                          
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