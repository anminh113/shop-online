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
                            <h3 class="panel-title"><b>Các danh mục sản phẩm có trên hệ thống</b> </h3>
                            <div class="right" style="position: absolute;">
                                <input type="text" id="myInput" placeholder="Tìm kiếm...">
                            </div>
                        </div>
                        <div class="panel-body ">
                            <button type="button" class="btn btn-outline- btn-save" data-toggle="modal" data-target="#add">Thêm
                                danh mục</button>
                            <div class="space10">&nbsp;</div>
                            <table id="table_format" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Danh mục</th>
                                        <th>Số loại sản phẩm</th>
                                        <th>Xem chi tiết</th>
                                        <th>Cập nhật</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @foreach ($data['categories'] as $item)
                                    <tr>
                                        <td><a href="#">1</a></td>
                                        <td>{{$item['categoryName']}}</td>
                                        <td>2</td>
                                        <td><a href="add-producttype-admin">Xem chi tiết</a></td>
                                        <td><a data-toggle="modal" data-target="#update{{$item['categoryId']}}"><span
                                                    class="label label-primary"><i class="fa fa-edit"></i></span></a>&nbsp;&nbsp;
                                            <span class="label label-danger" ><input type="submit"form="deleteid{{$item['categoryId']}}" />
                                                <i class="fa fa-trash" >  </i>
                                                <form id="deleteid{{$item['categoryId']}}" hidden action="{{route('delete-them-danh-muc-admin',$item['categoryId'])}}"
                                                    method="post">
                                                    @method('DELETE')

                                                    {{ csrf_field() }}
                                                </form>
                                            </span>
                                        </td>
                                    </tr>
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
            <form action="{{route('post-them-danh-muc-admin')}}" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Thêm danh mục</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="basic">Tên danh mục sản phẩm:</label>
                    <div id="titleproduct">
                        <input type="text" id="title1" name="namecategory" class="form-control" placeholder="Tên danh mục">
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
@foreach ($data['categories'] as $item)
<div class="modal fade" id="update{{$item['categoryId']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('update-them-danh-muc-admin')}}" method="POST">
                @csrf

                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Cập nhật danh mục</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="basic">Tên danh mục sản phẩm:</label>
                    <div id="titleproduct">
                        <input type="text" name="namecategory" class="form-control" value="{{$item['categoryName']}}">
                        <input type="text" hidden name="categoryId" value="{{$item['categoryId']}}">
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
