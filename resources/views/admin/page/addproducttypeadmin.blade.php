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

                            <table id="table_format" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ảnh</th>
                                        <th>Loại sản phẩm</th>
                                        <th>Xem chi tiết</th>
                                        <th>Cập nhật</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @foreach ($data1['productTypes'] as $item)
                                    <form id="imgur">
                                        <input type="file" id="file-upload{{$item['_id']}}" class=" imgur btn btn-default btn-file"
                                            style="display:none" accept="image/*" data-max-size="5000" />
                                    </form>
                                    <tr>
                                        <td><a href="#">1</a></td>
                                        <td>
                                         <img  src={{$item['imageURL']}}width="50px" height="50">
                                        </td>
                                        <td style=" vertical-align: middle">{{$item['productTypeName']}}</td>
                                        <td style=" vertical-align: middle;"><a href="{{route('them-thong-so-ky-thuat-admin',$item['_id'])}}">Xem
                                                chi tiết</a></td>
                                        <td style=" vertical-align: middle;"><a data-toggle="modal" data-target="#update{{$item['_id']}}">
                                                <span class="btn btn-primary"><i class="fa fa-edit"></i></span></a>&nbsp;&nbsp;
                                            <button class="btn btn-danger" onclick="archiveFunction()" type="submit" form="deleteid{{$item['_id']}}">
                                                <i class="fa fa-trash"> </i>
                                            </button>
                                        </td>
                                    </tr>

                                    <form id="deleteid{{$item['_id']}}" hidden action="{{route('delete-them-loai-admin',$item['_id'])}}"
                                        method="post">
                                        @method('DELETE')
                                        {{ csrf_field() }}
                                    </form>
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
            <form action="{{route('post-them-loai-admin')}}" method="POST" name="addtypeproduct">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Thêm loại sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
               
                <div class="modal-body">
                    <label for="basic">Tên loại sản phẩm:</label>
                    <input type="text" id="title1" name="nameproducttype" class="form-control" placeholder="Tên loại sản phẩm"
                        autofocus>
                    <hr>
                    <label for="file-upload" id="label" class="custom-file-upload">
                        <img id="image" src="http://placehold.it/1920x1080?text= Thêm ảnh"  class="rounded float-left" width="100"height="100">
                        
                    </label>
                    <div id="errorct"></div>
                    <div id="imgur" >
                        <input type="file" id="file-upload" name="addimage" class=" imgur btn btn-default btn-file" style=" display:none   "
                                accept="image/*" data-max-size="5000" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="submit" id="save"  class="btn btn-info">Lưu thông tin</button>
                </div>
                <div style="hidden" id="imgur"></div>
                <input type="text" hidden name="categoryId" value="{{$data['category']['_id']}}">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>

@foreach ($data1['productTypes'] as $item)
<div class="modal fade" id="update{{$item['_id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('update-them-loai-admin')}}" method="POST" name="addtypeproduct{{$item['_id']}}">
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
                        <input type="text" name="nameproducttype" class="form-control" value="{{$item['productTypeName']}}"
                            autofocus>
                        <hr>
                        <label for="file-upload{{$item['_id']}}" id="label{{$item['_id']}}" class="custom-file-upload">
                            <img id="image{{$item['_id']}}" src={{$item['imageURL']}} class="rounded float-left" width="100"height="100">
                        </label>
                        
                        <input type="text" hidden name="productTypeId" value="{{$item['_id']}}">
                        <div hidden id="imgur{{$item['_id']}}"><input type="text" id="img{{$item['_id']}}" name="img" value="{{$item['imageURL']}}" hidden> </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="submit" id="update" onclick="archiveFunction()" class="btn btn-info">Lưu thông tin</button>
                </div>
                @method('PATCH')
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("form[name='addtypeproduct{{$item['_id']}}']").validate({
            ignore: "not:hidden",
            rules: {
                nameproducttype: {
                	required: true,
                	minlength: 5
                }
            },
            messages: {   
                nameproducttype: {
                	required: "Vui lòng nhập tên loại sản phẩm",
                	minlength: "Tên loại sản phẩm phải trên 5 ký tự"
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

@endsection

@section('footer')

<script>
    $(document).ready(function() {
        $("form[name='addtypeproduct']").validate({
            ignore: "not:hidden",
            rules: {
                nameproducttype: {
                	required: true,
                	minlength: 5
                },
                addimage:{
                    required: true,
                    file: true
                }
            },
            messages: {   
                nameproducttype: {
                	required: "Vui lòng nhập tên loại sản phẩm",
                	minlength: "Tên loại sản phẩm phải trên 5 ký tự"
                },
                addimage:{
                    required: "Vui lòng chọn file hình ảnh",
                    
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "addimage") {
                    error.insertAfter("#errorct");
                } else {
                    error.insertAfter(element);
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

{{-- them anh --}}
<script>
    $("document").ready(function () {
        $('#file-upload').on("change", function () {
            var $files = $(this).get(0).files;
            if ($files.length) {
                // Reject big files
                if ($files[0].size > $(this).data("max-size") * 1024) {
                    console.log("Please select a smaller file");
                    return false;
                }
                var apiUrl = 'https://api.imgur.com/3/image';
                var apiKey = 'e4330ab70984291';

                var formData = new FormData();
                formData.append("image", $files[0]);
                var settings = {
                    "async": true,
                    "crossDomain": true,
                    "url": apiUrl,
                    "method": "POST",
                    "datatype": "json",
                    "headers": {
                        "Authorization": "Bearer 9c2fca8227f628d8d2888728b82fe53529a4e400"
                    },
                    "processData": false,
                    "contentType": false,
                    "data": formData,
                    beforeSend: function (xhr) {
                        console.log("Uploading");
                        $('#image').remove();
                        $('#label').append('<div class="buttonload" id="loader"><i class="fa fa-circle-o-notch fa-spin"></i> Đang tải...</div>');
                    },
                    success: function (res) {
                        $('#file-upload1').remove();
                        $('#image').remove();
                        $('#loader').remove();
                        $('#label').append('<img src="' + res.data.link +'" class="rounded float-left" width="100px" height="100"/><input type="text" name="img" value="' + res.data.link +'" hidden>');
                    },
                    error: function () {
                        alert("Failed ");
                    }
                }
                $.ajax(settings).done(function (response) {
                    // console.log(response.data.id);
                    var form = new FormData();
                    form.append("ids[]", "" + response.data.id + "");
                    var settings1 = {
                        "async": true,
                        "crossDomain": true,
                        "url": "https://api.imgur.com/3/album/6eEzKQy/add",
                        "method": "POST",
                        "headers": {
                            "Authorization": "Bearer 9c2fca8227f628d8d2888728b82fe53529a4e400"
                        },
                        "processData": false,
                        "contentType": false,
                        "mimeType": "multipart/form-data",
                        "data": form
                    }

                    $.ajax(settings1).done(function (response) {
                        console.log(response);
                    });
                });
            }
        });
    });

</script>
{{-- end them anh --}}

@foreach ($data1['productTypes'] as $item)
<script>
    $("document").ready(function () {
        $('#file-upload{{$item['_id']}}').on("change", function () {
            // Delete image
            var bla = $('#img{{$item['_id']}}').val();
            console.log(bla);
            if(bla != ''){
                option = bla.split("/", 6);
                console.log(option[3].slice(0,7));
                var idImage = option[3].slice(0,7);
                var settings = {
                    "async": true,
                    "crossDomain": true,
                    "url": "https://api.imgur.com/3/album/6eEzKQy/image/" + idImage,
                    "method": "GET",
                    "headers": {
                        "Authorization": "Bearer 9c2fca8227f628d8d2888728b82fe53529a4e400"
                    }
                }
                $.ajax(settings).done(function(res) {
                    var settings1 = {
                        "async": true,
                        "crossDomain": true,
                        "url": "https://api.imgur.com/3/image/" + res.data.deletehash,
                        "method": "DELETE",
                        "headers": {
                            "Authorization": "Bearer 9c2fca8227f628d8d2888728b82fe53529a4e400"
                        }
                    }
                    $.ajax(settings1).done(function(response) {
                        console.log(response);
                    });
                });
            }
            // Uploading image
            var $files = $(this).get(0).files;
            if ($files.length) {
                if ($files[0].size > $(this).data("max-size") * 1024) {
                    console.log("Please select a smaller file");
                    return false;
                }
                var apiUrl = 'https://api.imgur.com/3/image';
                var apiKey = 'e4330ab70984291';

                var formData = new FormData();
                formData.append("image", $files[0]);
                var settings = {
                    "async": true,
                    "crossDomain": true,
                    "url": apiUrl,
                    "method": "POST",
                    "datatype": "json",
                    "headers": {
                        "Authorization": "Bearer 9c2fca8227f628d8d2888728b82fe53529a4e400"
                    },
                    "processData": false,
                    "contentType": false,
                    "data": formData,
                    beforeSend: function (xhr) {
                        console.log("Uploading");
                        $('#image{{$item['_id']}}').remove();
                        $('#label{{$item['_id']}}').append('<div class="buttonload" id="loader"><i class="fa fa-circle-o-notch fa-spin"></i> Đang tải...</div>');
                    },
                    success: function (res) {
                        // console.log(res.data.id);
                        $('#file-upload1').remove();
                        $('#image{{$item['_id']}}').remove();
                        // $('#expandedImg').remove();
                        $('#loader').remove();
                        $('#label{{$item['_id']}}').append('<img src="' + res.data.link +'" width="50px" height="50"/>');
                        // $('#image_selected').append('<img id="expandedImg" src="' + res.data.link + '" style="width:100%"/>');
                        $("#imgur{{$item['_id']}}").append('<input type="text" name="img" value="' + res.data.link +'" hidden>');

                    },
                    error: function () {
                        alert("Failed ");
                    }
                }
                // Add album
                $.ajax(settings).done(function (response) {
                    // console.log(response.data.id);
                    var form = new FormData();
                    form.append("ids[]", "" + response.data.id + "");
                    var settings1 = {
                        "async": true,
                        "crossDomain": true,
                        "url": "https://api.imgur.com/3/album/6eEzKQy/add",
                        "method": "POST",
                        "headers": {
                            "Authorization": "Bearer 9c2fca8227f628d8d2888728b82fe53529a4e400"
                        },
                        "processData": false,
                        "contentType": false,
                        "mimeType": "multipart/form-data",
                        "data": form
                    }

                    $.ajax(settings1).done(function (response) {
                        console.log(response);
                    });
                });
            }
        });
    });

</script>
@endforeach


@endsection
