@extends('admin/master')

@section('head')
<link href="{{ URL::asset('source/admin/assets/css/product.css') }}" rel="stylesheet" type="text/css">

@endsection
@section('content')

<!-- MAIN -->
<div class="main">
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Pictures</a></li>
        <li><a href="#">Summer 15</a></li>
        <li>Italy</li>
    </ul>
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel">
                <div class="panel-heading">
                    <h3>Danh mục sản phẩm</h3>
                </div>
               
                <div class="panel-body">
                    <div class="row">
                        <table id="table_format" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Danh mục hệ thống </th>
                                    <th>Cập nhật</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @foreach ($result1['data3'] as $item )
                                    <tr>
                                        <td><a href="#">1</a></td>
                                        <td>{{$item['categoryName']}}</td>
                                        <td><button class="btn btn-info"  type="submit" form="postId{{$item['_id']}}">
                                            <i class="fa fa-plus" >  </i>
                                            </button>
                                        </td>
                                    </tr>
                                    <form id="postId{{$item['_id']}}" hidden action="{{route('post-danh-muc-admin')}}" method="post">
                                        <input type="text" name="categoryId" hidden value="{{$item['_id']}}">
                                        {{ csrf_field() }}
                                    </form>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <table id="table_format" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Danh mục gian hàng </th>
                                    <th>Cập nhật</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @foreach ($result['data2'] as $da)
                                <tr>
                                    <td><a href="#">1</a></td>
                                    <td>{{$da['categoryName']}}</td>
                                    <td><button class="btn btn-danger"  type="submit" form="deleteid{{$da['_id']}}">
                                        <i class="fa fa-trash" >  </i>
                                        </button>
                                    </td>
                                </tr>
                                <form id="deleteid{{$da['_id']}}" hidden action="{{route('delete-danh-muc-admin')}}" method="post">
                                    <input type="text" name="categoryId" hidden value="{{$da['_id']}}">
                                    @method('DELETE')
                                    {{ csrf_field() }}
                                </form>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

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
    var element = document.getElementById("category-admin");
    element.classList.add("active");

</script>
<script>

</script>
@endsection
