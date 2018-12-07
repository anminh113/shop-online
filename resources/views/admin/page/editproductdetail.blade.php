@extends('admin/master')

@section('head')
{{--
<link rel="stylesheet" href="source/admin/assets/css/detail-product.css"> --}}
<link href="{{ URL::asset('source/admin/assets/css/detail-product.css') }}" rel="stylesheet" type="text/css">

@endsection

@section('content')



<!-- MAIN -->
<div class="main">

    <form id="imgur" class="upload">
        <input hidden type="file" id="file-upload1" class=" imgur btn btn-default btn-file" accept="image/*"
            data-max-size="5000" />
        <input hidden type="file" id="file-upload2" class=" imgur btn btn-default btn-file" accept="image/*"
            data-max-size="5000" />
        <input hidden type="file" id="file-upload3" class=" imgur btn btn-default btn-file" accept="image/*"
            data-max-size="5000" />
    </form>
    <!-- MAIN CONTENT -->
    <form action="{{route('update-sua-chi-tiet-san-pham-admin')}}" method="POST" name="editproduct">
        <div class="main-content">
            @foreach ($resultdata['data'] as $item)
            <div class="container-fluid">
                <div class="panel panel-headline">
                    <div class="panel-heading text-right">
                        <h3 class="panel-title">
                            <div class="input-group" id="tensp" style="width: 65%; margin-left: 35%">
                                <input class="form-control text-right" name="productname" type="text" value="{{$item['product']['productName']}}">
                                <input hidden name="productid" type="text" value="{{$item['product']['_id']}}">

                            </div>
                        </h3>
                        <p class="panel-subtitle">
                            <ul class="breadcrumb">
                                <li>{{$item['product']['productType']['productTypeName']}}</li>
                            </ul>
                        </p>
                    </div>
                    <div class="panel-body">
                        <div class="row">        
                            <div class="col-lg-5 col-md-5">
                                <div class="container-fluid" style="padding-right: 0px; margin-right: -15px;">
                                    <div class="image_selected" id="image_selected">
                                        @foreach ($resultimg['datatext'] as $da )
                                        {{-- @foreach ($da['images'] as $da1) --}}
                                        @foreach ($da['imageList'] as $da1)
                                        <img id="expandedImg" src={{$da1["imageURL"]}} style="width:100%">
                                        @break
                                        {{-- @endforeach --}}
                                        @endforeach
                                        @endforeach

                                    </div>
                                    <div class="image-column">
                                        <?php $i = 1 ?>
                                        @foreach ($resultimg['datatext'] as $da )
                                            {{-- @foreach ($da['images'] as $da1) --}}
                                                @foreach ($da['imageList'] as $da1)
                                                <div class="column1" id="column<?php echo $i ?>">
                                                    <label for="file-upload<?php echo $i ?>" id="label<?php echo $i ?>" class="custom-file-upload"><i
                                                            class="lnr lnr-sync"></i></label>
                                                   
                                                    <img id="test<?php echo $i ?>" src={{$da1["imageURL"]}} style="width:100%"
                                                        onclick="imgshow(this);">
                                                       
                                                </div>
                                                <div  id="imgur<?php echo $i ?>"><input type="text" id="img<?php echo $i ?>" name="img<?php echo $i ?>" value="{{$da1["imageURL"]}}" hidden></div>
                                                <?php $i = $i+1 ?>
                                                @endforeach
                                            {{-- @endforeach --}}
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7">
                                <label for="basic">Giá sản phẩm: </label>
                                <div class="input-group" id="giasp">
                                    <input class="form-control" type="text" name="price" value="{{$item['product']['price']}}">
                                    <span class="input-group-addon">.000₫</span>
                                </div>
                                <div class="space15">&nbsp;</div>
                                <label for="basic">Số lượng nhập kho:</label>
                                <div class="input-group">
                                    <input class="form-control" name="quantity" type="number" value="{{$item['product']['quantity']}}">
                                    <span class="input-group-addon">Chiếc</span>
                                </div>
                                <div class="space15">&nbsp;</div>
                                <label for="basic" style="font-size: 15px">Thông số kỹ thuật:</label>
                                <table class="table form-style-4">

                                    <tbody>
                                        @foreach ($item['product']['specifications'] as $item1)
                                        <tr>
                                            <td>
                                                <div class="text-table">{{$item1['title']}}</div>
                                            </td>
                                            <td>
                                                <input type="text" name="title1[]" class="form-control" value="{{$item1['value']}}">
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="space15">&nbsp;</div>
                            

                            </div>
                            <div class="col-lg-12">
                                <label for="basic">Tổng quan sản phẩm:</label>

                                <div id="titleproduct">
                                    @foreach ($item['product']['overviews'] as $item2)
                                        @if(!empty($item2['title']))
                                            <div class="space10">&nbsp;</div>
                                            <input type="text" id="title1" class="form-control" name="title[]" value="{{$item2['title']}}">
                                        @else
                                            <div class="space10">&nbsp;</div>
                                            <input type="text" id="title1" class="form-control" name="title[]" placeholder="Thêm tiêu đề">
                                        @endif
                                            <textarea class="form-control" id="value1" name="value[]" style=" box-sizing: border-box; resize: none;"
                                             data-autoresize rows="4">{{$item2['value']}}</textarea>
                                    @endforeach
                                </div>
                               
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="space10">&nbsp;</div>
                                <input type="button" id="add" class="btn btn-outline- btn-change" style="width: 60%;"
                                    value="Thêm thông tin sản phẩm" />
                            
                            </div>
                            <div class="col-lg-6">
                                <div class="space10">&nbsp;</div>
                                <button type="submit" style="width: 100%;" class="btn btn-outline- btn-save" onclick="window.location='';">Lưu</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @method('PATCH')
    {{ csrf_field() }}
    </form>

    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@endsection

@section('footer')
<script type="text/javascript" src="{{ URL::asset('source/admin/assets/scripts/iziToast.min.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script> --}}
<script type="text/javascript" src="{{ URL::asset('source/admin/assets/scripts/detail-product.js') }}"></script>
<script>
        $(document).ready(function() {
            $("form[name='editproduct']").validate({
                ignore: "not:hidden",
                rules: {
                    productname: {
                        required: true,
                        minlength: 5
                    },
                    price:{
                        required: true,
                        number:true
                    },
                    quantity:{
                        required: true,
                        number:true
                    },
                    "title[]":{
                        required: true,
                        minlength: 5
                    },
                    "title1[]":{
                        required: true,
                    },
                    img1:{
                        required: true,
                        file: true
                    },
                    img2:{
                        required: true,
                        file: true
                    },
                    img3:{
                        required: true,
                        file: true
                    }
                },
                messages: {   
                    productname: {
                        required: "Vui lòng nhập tên sản phẩm",
                        minlength: "Tên sản phẩm phải trên 5 ký tự"
                    },    
                    price:{
                        required: "Vui lòng nhập giá sản phẩm",
                        number:true
                    },
                    quantity:{
                        required: "Vui lòng nhập số lượng nhập kho",
                        number:true
                    },
                    "title[]":{
                        required: "Vui lòng nhập tiêu đề",
                        minlength: "Tên sản phẩm phải trên 5 ký tự"
                    },
                    img1:{
                        required: "Chọn file hình ảnh",
                    },
                    img2:{
                        required: "Chọn file hình ảnh",
                    },
                    img3:{
                        required: "Chọn file hình ảnh",
                    },producttype:{
                        required: "Vui lòng chọn thông số kỹ thuật",
                        select: true
                    },
                    category:{
                        required: "Vui lòng chọn danh mục",
                        select: true
                    },
                    "title1[]":{
                        required: "Vui lòng nhập thông số sản phẩm",
                    }
                },
                // errorPlacement: function(error, element) {
                //     if (element.attr("name") == "productname") {
                //         error.insertAfter("#errorname");
                //     } else if (element.attr("name") == "price") {
                //         error.insertAfter("#errorprice");
                //     } else if (element.attr("name") == "quantity") {
                //         error.insertAfter("#errorquantity");
                //     } else if (element.attr("name") == "img1" ) {
                //         error.insertAfter("#errorimg1");
                //     } else if (element.attr("name") == "img2" ) {
                //         error.insertAfter("#errorimg2");
                //     }else if (element.attr("name") == "img3" ) {
                //         error.insertAfter("#errorimg3");
                //     }else {
                //         error.insertAfter(element);
                //     }
                // },
                errorElement: "em",
                submitHandler: function(form) {
                form.submit();
                }
            });
        });
</script>
<script>
    var element = document.getElementById("product-admin");
    element.classList.add("active");

</script>
<script type="text/javascript">
    function imgshow(imgs) {
        var expandImg = document.getElementById("expandedImg");
        var imgText = document.getElementById("imgtext");
        expandImg.src = imgs.src;
        expandImg.parentElement.style.display = "block";
    }

</script>
<script>
    $(function () {
        var i = 1;
        $("#add").click(function () {
            i = i + 1;
            console.log(i);
            $("#titleproduct").append('<div class="space10">&nbsp;</div>');
            $("#titleproduct").append('<input type="text" name="title[]" id="title' + i +
                '" class="form-control" placeholder="Tiêu đề">');
            // $("#titleproduct").append('<div class="space10">&nbsp;</div>');
            $("#titleproduct").append(
                '<textarea class="form-control" id="value' + i +
                '" style="box-sizing: border-box; resize: none;" name="value[]" placeholder="Thông tin sản phẩm " data-autoresize rows="4"></textarea>'
            );
        })
    });

</script>
<script type="text/javascript">
    jQuery.each(jQuery('textarea[data-autoresize]'), function () {
        var offset = this.offsetHeight - this.clientHeight;

        var resizeTextarea = function (el) {
            jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
        };
        jQuery(this).on('keyup input', function () {
            resizeTextarea(this);
        }).removeAttr('data-autoresize');
    });

</script>

@endsection
