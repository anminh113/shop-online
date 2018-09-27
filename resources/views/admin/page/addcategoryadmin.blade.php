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
                                <input type="text" id="myInput" placeholder="Tìm kiếm..">
                            </div>
                        </div>
                        <div class="panel-body ">
                            <button type="button" class="btn btn-outline- btn-save" data-toggle="modal" data-target="#exampleModalLong">Thêm
                                danh mục</button>
                            <div class="space10">&nbsp;</div>
                            <table id="table_format" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Danh mục</th>
                                        <th>Số loại sản phẩm</th>
                                        <th>Xem chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <tr>
                                        <td><a href="#">1</a></td>
                                        <td>0Steve Steve Steve</td>
                                        <td>2</td>
                                        <td><a href="#">Xem chi tiết</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">1</a></td>
                                        <td>Steve Steve Steve</td>
                                        <td>2</td>
                                        <td><a href="#">Xem chi tiết</a></td>
                                    </tr>
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
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Thêm danh mục</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="basic">Tên danh mục sản phẩm:</label>
                <div id="titleproduct">
                    <input type="text" id="title1" class="form-control" placeholder="Tiêu đề">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                <button type="button" class="btn btn-info">Lưu thông tin</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')

<script>
    var element = document.getElementById("add-category-admin");
    element.classList.add("active");

</script>


@endsection
