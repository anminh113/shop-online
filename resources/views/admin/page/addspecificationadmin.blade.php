@extends('admin/master')

@section('head')
<link href="{{ URL::asset('source/admin/assets/css/product.css') }}" rel="stylesheet" type="text/css">

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
                    @if($status == '200')
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><b>Loại sản phẩm: {{$data1['productType']['productTypeName']}}</b>
                            </h3>
                            <div class="right" style="position: absolute;">
                                <input type="text" id="myInput" placeholder="Tìm kiếm...">
                            </div>
                        </div>
                        <div class="panel-body ">
                            <button type="button" class="btn btn-outline- btn-save" data-toggle="modal" data-target="#add">Thêm
                                thông số kỹ thuật</button>
                            <div class="space10">&nbsp;</div>
                            <table id="table_format" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Thông số kỹ thuật</th>
                                        <th>Cập nhật</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @foreach ($data['specificationType']['specificationTitle'] as $item)
                                    <tr>
                                        <td><a href="#">1</a></td>
                                        <td>{{$item['title']}}</td>
                                        <td><a data-toggle="modal" data-target="#update{{$item['_id']}}">
                                                <span class="btn btn-primary"><i class="fa fa-edit"></i></span></a>&nbsp;&nbsp;
                                            <button class="btn btn-danger" onclick="archiveFunction()" type="submit" form="deleteid{{$item['_id']}}">
                                                <i class="fa fa-trash"> </i>
                                            </button>
                                        </td>
                                    </tr>
                                    <form id="deleteid{{$item['_id']}}" hidden action="{{route('delete-them-thong-so-ky-thuat-admin')}}"
                                    method="post">
                                    <input type="text" hidden name="productTypeId" value="{{$data['specificationType']['productType']['_id']}}">
                                    <input type="text" hidden name="specificationTypeIdTitle" value="{{$item['_id']}}">

                                    @method('DELETE')
                                    {{ csrf_field() }}</form>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    @else
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><b>Loại sản phẩm: {{$data1['productType']['productTypeName']}}</b>
                            </h3>
                            <div class="right" style="position: absolute;">
                                <input type="text" id="myInput" placeholder="Tìm kiếm...">
                            </div>
                        </div>
                        <div class="panel-body ">
                            <button type="button" class="btn btn-outline- btn-save" data-toggle="modal" data-target="#add">Thêm
                                thông số kỹ thuật</button>
                            <div class="space10">&nbsp;</div>
                            <table id="table_format" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Thông số kỹ thuật</th>
                                        <th>Cập nhật</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">

                                    <tr>
                                        <td colspan="3" class="text-center">Không có dữ liệu</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif

                    <!-- END RECENT PURCHASES -->
                </div>

            </div>

        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('post-them-thong-so-ky-thuat-admin')}}" method="POST" name="addspeecification">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Thêm thông số kỹ thuật sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="basic">Tên thông số kỹ thuật sản phẩm:</label>
                    <div id="titleproduct">
                        <input type="text" id="title1"  name="namespeecification" class="form-control" placeholder="Tên thông số kỹ thuật" autofocus>
                        <input type="text" hidden name="productTypeId" value="{{$data1['productType']['_id']}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="submit" class="btn btn-info">Lưu thông tin</button>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>

@if($status == '200')
@foreach ($data['specificationType']['specificationTitle'] as $item)
<div class="modal fade" id="update{{$item['_id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('update-them-thong-so-ky-thuat-admin')}}" method="POST" name="addspeecification{{$item['_id']}}">
                @csrf

                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Cập nhật thông số kỹ thuật</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="basic">Tên thông số kỹ thuật:</label>
                    <div id="titleproduct">
                        <input type="text"  name="namespecificationtype" class="form-control" value="{{$item['title']}}" autofocus>
                        <input type="text" hidden name="productTypeId" value="{{$data['specificationType']['productType']['_id']}}">
                        <input type="text" hidden name="specificationTypeIdTitle" value="{{$item['_id']}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="submit" class="btn btn-info">Lưu thông tin</button>
                </div>
                @method('PATCH')
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("form[name='addspeecification{{$item['_id']}}']").validate({
            ignore: "not:hidden",
            rules: {
                namespecificationtype: {
                	required: true,
                	minlength: 5
                }
            },
            messages: {   
                namespecificationtype: {
                	required: "Vui lòng nhập tên thông số kỹ thuật",
                	minlength: "Tên thông số kỹ thuật phải trên 5 ký tự"
                }
            },
            errorElement: "em",
            submitHandler: function(form) {
            form.submit();
            }
        });
    });
</script>
@endforeach
@endif

@endsection

@section('footer')
<script>
    $(document).ready(function() {
        $("form[name='addspeecification']").validate({
            ignore: "not:hidden",
            rules: {
                namespeecification: {
                	required: true,
                	minlength: 5
                }
            },
            messages: {   
                namespeecification: {
                	required: "Vui lòng nhập tên thông số kỹ thuật",
                	minlength: "Tên thông số kỹ thuật phải trên 5 ký tự"
                }
            },
            errorElement: "em",
            submitHandler: function(form) {
            form.submit();
            }
        });
    });
</script>
<script>
    var element = document.getElementById("add-category-admin");
    element.classList.add("active");

</script>


@endsection
