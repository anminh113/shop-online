@extends('admin/master')

@section('head')
<link href="{{ URL::asset('source/admin/assets/css/product.css') }}" rel="stylesheet" type="text/css">
<style type="text/css">
    .bar-verygood {
        width: 60%;
        height: 16px;
        background-color: #FFCC40;
    }

    .bar-good {
        width: 30%;
        height: 16px;
        background-color: #FFCC40;
    }

    .bar-bad {
        width: 10%;
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- RECENT PURCHASES -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><b>Danh mục: {{$data['category']['categoryName']}}</b> </h3>
                            <div class="right" style="position: absolute;">
                                <input type="text" id="myInput" placeholder="Tìm kiếm...">
                            </div>
                        </div>
                        <div class="panel-body ">
                            <button type="button" class="btn btn-outline- btn-save" data-toggle="modal" data-target="#add">Thêm
                                loại sản phẩm</button>
                            <div class="space10">&nbsp;</div>
                            <table id="table_format" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Loại sản phẩm</th>
                                        <th>Xem chi tiết</th>
                                        <th>Cập nhật</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @foreach ($data1['productTypes'] as $item)
                                    <tr>
                                        <td><a href="#">1</a></td>
                                        <td>{{$item['productTypeName']}}</td>
                                        <td><a href="{{route('them-thong-so-ky-thuat-admin',$item['productTypeId'])}}">Xem chi tiết</a></td>
                                        <td><a data-toggle="modal" data-target="#update{{$item['productTypeId']}}">
                                                <span class="btn btn-primary"><i class="fa fa-edit"></i></span></a>&nbsp;&nbsp;
                                            <button class="btn btn-danger" type="submit" form="deleteid{{$item['productTypeId']}}">
                                                <i class="fa fa-trash"> </i>
                                            </button>
                                        </td>
                                    </tr>
                                    <form id="deleteid{{$item['productTypeId']}}" hidden action="{{route('delete-them-loai-admin',$item['productTypeId'])}}"
                                        method="post">
                                        @method('DELETE')
                                        {{ csrf_field() }}</form>
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
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('post-them-loai-admin')}}" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Thêm loại sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="basic">Tên loại sản phẩm:</label>
                    <div id="titleproduct">
                        <input type="text" id="title1" name="nameproducttype" class="form-control" placeholder="Tên loại sản phẩm">
                       
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="submit" class="btn btn-info">Lưu thông tin</button>
                </div>
                <input type="text"  name="categoryId"  value="{{$data['category']['categoryId']}}">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>

@foreach ($data1['productTypes'] as $item)
<div class="modal fade" id="update{{$item['productTypeId']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('update-them-loai-admin')}}" method="POST">
                @csrf

                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Cập nhật danh mục</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="basic">Tên loại sản phẩm:</label>
                    <div id="titleproduct">
                        <input type="text" name="nameproducttype" class="form-control" value="{{$item['productTypeName']}}">
                        <input type="text" hidden name="productTypeId" value="{{$item['productTypeId']}}">
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
@endforeach
@endsection

@section('footer')

<script>
    var element = document.getElementById("add-category-admin");
    element.classList.add("active");

</script>


@endsection
