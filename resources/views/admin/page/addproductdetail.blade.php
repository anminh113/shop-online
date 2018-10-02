@extends('admin/master')

@section('head')
<link href="{{ URL::asset('source/admin/assets/css/detail-product.css') }}" rel="stylesheet" type="text/css">

@endsection

@section('content')


<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-headline">
                    <form action="{{route('post-them-chi-tiet-san-pham-admin')}}" method="POST">
                <div class="panel-heading text-right">
                    <div class="row">
                        <div class="col-lg-4 col-md-4"></div>
                        <div class="col-lg-8 col-md-8">
                            <h3 class="panel-title"><input class="form-control input-lg" type="text" name="productname" placeholder="Tên sản phẩm "></h3>
                            <p class="panel-subtitle">
                                <ul class="breadcrumb">
                                    <!-- <li><a href="#">Chuột</a></li> -->
                                    {{-- <li>Mã sản phẩm: XXX</li> --}}
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form id="imgur">
                            <input type="file" id="file-upload1" class=" imgur btn btn-default btn-file" style="display:none"
                                accept="image/*" data-max-size="5000" />
                            <input type="file" id="file-upload2" class=" imgur btn btn-default btn-file" style="display:none"
                                accept="image/*" data-max-size="5000" />
                            <input type="file" id="file-upload3" class=" imgur btn btn-default btn-file" style="display:none"
                                accept="image/*" data-max-size="5000" />
                        </form>
                        <div class="col-lg-5 col-md-5">
                            <div class="container-fluid" style="padding-right: 0px; margin-right: -15px;">
                                <div class="image_selected" id="image_selected">
                                    <img id="expandedImg" src="http://placehold.it/1000x1000/cccccc/000000" style="width:100%">

                                </div>
                                <div class="image-column">
                                    <div class="column">
                                        <label for="file-upload1" id="label1" class="custom-file-upload">
                                            <img id="test1" src="http://placehold.it/1920x1080?text= Thêm ảnh" style="width:100%"
                                                onclick="imgshow(this);"> </label>
                                        <div style="hidden" id="imgur1"></div>
                                    </div>
                                    <div class="column">
                                        <label for="file-upload2" id="label2" class="custom-file-upload">
                                            <img id="test2" src="http://placehold.it/1920x1080?text= Thêm ảnh" style="width:100%"
                                                onclick="imgshow(this);"> </label>
                                        <div style="hidden" id="imgur2"></div>
                                    </div>
                                    <div class="column">
                                        <label for="file-upload3" id="label3" class="custom-file-upload">
                                            <img id="test3" src="http://placehold.it/1920x1080?text= Thêm ảnh" style="width:100%"
                                                onclick="imgshow(this);">
                                        </label>
                                        <div style="hidden" id="imgur3"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <label for="basic">Giá sản phẩm:</label>
                            <div class="input-group">
                                <input class="form-control" name="price" type="text">
                                <span class="input-group-addon">VND</span>
                            </div>
                            <div class="space15">&nbsp;</div>
                            <label for="basic">Số lượng nhập kho:</label>
                            <div class="input-group">
                                <input class="form-control" name="quantity" type="number">
                                <span class="input-group-addon">Chiếc</span>
                            </div>
                            <div class="space15">&nbsp;</div>
                            <label for="basic">Chọn danh mục sản phẩm:</label>
                            <select class="form-control" id="category">
                                <option value="">- Chọn danh mục -</option>
                            </select>
                            
                            <div class="space15">&nbsp;</div>
                            
                            <label for="basic">Thông số kỹ thuật:</label>
                            <select class="form-control" id="producttype">
                            </select>
                            <div hidden id="producttype1"></div>
                            <div class="space15">&nbsp;</div>
                            <table class="table form-style-4" id="table">
                                <tbody id="myTable">

                                </tbody>
                            </table>
                            <input hidden name="storeId" value="{{$storeId}}">
                            <div class="space15">&nbsp;</div>
                            <label for="basic">Tổng quan sản phẩm:</label>
                            <div id="titleproduct">
                                <input type="text" id="title1" name="title2[]" class="form-control" placeholder="Tiêu đề">
                                <div class="space10">&nbsp;</div>
                                <textarea class="form-control" id="value1" name="value2[]" style=" box-sizing: border-box; resize: none;"
                                    placeholder="Thông tin sản phẩm " data-autoresize rows="4"></textarea>
                            </div>
                            <div class="space10">&nbsp;</div>
                            <input type="button" id="add" class="btn btn-outline- btn-change" style="width: 100%;" value="Thêm thông tin sản phẩm" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="space10">&nbsp;</div>
                        </div>
                        <div class="col-lg-7">
                            <div class="space10">&nbsp;</div>
                            <button type="submit" class="btn btn-outline- btn-save" onclick="window.location='add-product-detail-admin';">Thêm
                                sản phẩm</button>

                            {{-- <button type="button" class="btn btn-outline- btn-change" onclick="window.location='add-product-detail-admin';">Thêm
                                sản phẩm</button> --}}
                        </div>
                    </div>
                    {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@endsection

@section('footer')

<script type="text/javascript" src="{{ URL::asset('source/admin/assets/scripts/iziToast.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('source/admin/assets/scripts/upload.js') }}"></script>

<script>
    var element = document.getElementById("product-admin");
    element.classList.add("active");

</script>


<script>
    $(function () {
        var i = 1;
        $("#add").click(function () {
            i = i+1;
            console.log(i);
            $("#titleproduct").append('<div class="space10">&nbsp;</div>');
            $("#titleproduct").append('<input type="text" id="title'+i+'" name="title2[]" class="form-control" placeholder="Tiêu đề">');
            $("#titleproduct").append('<div class="space10">&nbsp;</div>');
            $("#titleproduct").append(
                '<textarea class="form-control" id="value'+i+'" name="value2[]" style="box-sizing: border-box; resize: none;" placeholder="Thông tin sản phẩm " data-autoresize rows="4"></textarea>'
            );
        })
    });

</script>

{{-- change image when click image --}}
<script type="text/javascript">
    function imgshow(imgs) {
        var expandImg = document.getElementById("expandedImg");
        var imgText = document.getElementById("imgtext");
        expandImg.src = imgs.src;
        expandImg.parentElement.style.display = "block";
    }

</script>

{{-- auto height textarea --}}
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

{{-- get data category where storeID --}}
<script>
    var json_data_category = "{{$data_category}}";
    var json_data_product_type = "{{$data_product_type}}";
    $.getJSON(json_data_category, function (data) {
        $('#table tbody tr').remove();
        var html = '';
        var len = data['categories'].length;
        for (var i = 0; i < len; i++) {
            // console.log(data['categories'][i]['categoryName']);
            html += '<option value="' + json_data_product_type + '/' + data['categories'][i]['categoryId'] +
                '">' + data['categories'][i]['categoryName'] + '</option>';
        }
        $('#category').append(html);
    });

</script>

{{-- get data productType where category --}}
<script>
    $('#category').change(function () {
        var option = $(this).find('option:selected').val();
        var json_data_product_type_specificationtypes = '{{$data_product_type_specificationtypes}}';
        $('#table tbody tr').remove();
        // get data
        $.getJSON(option, function (data) {
            $('#table tbody tr').remove();
            var html = '';
            var html1 = '<option value="">- Chọn loại thông số kỹ thuật -</option>';
            var len = data['productTypes'].length;
            for (var i = 0; i < len; i++) {
                $("#producttype option").remove();
                html += '<option value="' + json_data_product_type_specificationtypes + '/' + data['productTypes'][i]['productTypeId'] + '">' + data['productTypes'][i]['productTypeName'] + '</option>';
            }   
            $('#producttype').append(html1);
            $('#producttype').append(html);
           
        });
       
    });


</script>


{{-- get data specificationType where productType --}}
<script>
    $('#producttype').change(function () {
        var option = $(this).find('option:selected').val();
        // get data
        $(document).ready(function () {
            // get data json
            $.getJSON(option, function (data) {
                var test_data = '';
                var html ='';
                var count =0;
                var len = data['specificationType']['specificationTitle'].length;
                $('#table tbody tr').remove();
                $.each(data['specificationType']['specificationTitle'], function (key, value) {
                    test_data += '<tr>';
                    test_data += '<td> <div class="text-table">' + value['title'] +
                        '</div> </td>';
                    test_data +=
                        '<td><input type="text" name="title1[]" class="form-control" placeholder="Nhập ' +
                        value['title'] + '... "></td>';
                    test_data += '</tr>';
                    count = count+1;
                });
                $('#myTable').append(test_data);    
                var text1 = option.split("/", 6);
                $('#producttype1').append('<input type="text" name="producttypeid" value="'+text1[5]+'">');  

            });
        });
    });
</script>

@endsection
