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
                                    <?php $i=1;?>
                                    @foreach ($data['registeredSales'] as $item)
                                    @if($item['isApprove'] === null )
                                    <tr data-toggle="modal" data-target="#accept{{$item['_id']}}">
                                        <td><a href="#"><?php echo $i;?></a></td>
                                        <td>{{$item['storeName']}}</td>
                                        <td>{{$item['customer']['name']}}</td>
                                        <td>{{$item['phoneNumber']}}</td>
                                        <td><script>var dtstart = moment('{{$item['registeredDate']}}').format('DD/MM/YYYY'); document.write(dtstart);</script></td>
                                        <td ><span class="label label-warning">Chờ xác nhận</span></td>
                                    </tr>
                                    <?php $i++;?>
                                    
                                    @elseif($item['isApprove'] === false )
                                    <tr >
                                        <td><a href="#"><?php echo $i;?></a></td>
                                        <td>{{$item['storeName']}}</td>
                                        <td>{{$item['customer']['name']}}</td>
                                        <td>{{$item['phoneNumber']}}</td>
                                        <td><script>var dtstart = moment('{{$item['registeredDate']}}').format('MM/DD/YYYY'); document.write(dtstart);</script></td>
                                        <td ><span class="label label-danger">Đã hủy đăng ký</span></td>
                                    </tr>
                                    <?php $i++;?>
                                    @elseif($item['isApprove'] === true )
                                    <tr >
                                        <td><a href="#"><?php echo $i;?></a></td>
                                        <td>{{$item['storeName']}}</td>
                                        <td>{{$item['customer']['name']}}</td>
                                        <td>{{$item['phoneNumber']}}</td>
                                        <td><script>var dtstart = moment('{{$item['registeredDate']}}').format('MM/DD/YYYY'); document.write(dtstart);</script></td>
                                        <td ><span class="label label-success">Đã chấp nhận</span></td>
                                    </tr>
                                    <?php $i++;?>
                                    @endif
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
@foreach ($data['registeredSales'] as $item)
<div class="modal fade" id="accept{{$item['_id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('post-trang-chu-admin-he-thong')}}" method="POST">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Xác nhận đăng ký</h4>
                <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn có chấp nhận người dùng {{$item['customer']['name']}} đăng ký gian hàng {{$item['storeName']}}?
                <input type="text" hidden value="{{$item['_id']}}" name="registeredSalesId">
            </div>
            <div class="modal-footer">
                <button type="submit" form="deny{{$item['_id']}}" class="btn btn-danger">Từ Chối</button>
                <button type="submit" class="btn btn-success">Chấp Nhận</button>
            </div>
            {{ csrf_field() }}
        </form>
        </div>
    </div>
</div>
<form action="{{route('update-trang-chu-admin-he-thong')}}" id="deny{{$item['_id']}}" method="POST" >
        <input type="text" hidden value="{{$item['_id']}}" name="registeredSalesId">
@method('PATCH')
{{ csrf_field() }}
</form>
@endforeach
@endsection

@section('footer')

<script>
    var element = document.getElementById("admin");
    element.classList.add("active");

</script>

<script>
    jQuery('#table_format').ddTableFilter();
</script>


@endsection
