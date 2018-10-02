@extends('admin/master')

@section('head')
{{-- <link rel="stylesheet" href="source/admin/assets/css/product.css"> --}}
<link href="{{ URL::asset('source/admin/assets/css/product.css') }}" rel="stylesheet" type="text/css" >

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
                    <div class="row">
                        <div class="col-lg-4 col-md-4">

                        <button type="button" class="btn btn-outline- btn-save" onclick="window.location='{{route('them-chi-tiet-san-pham-admin',$store)}}';">Thêm sản phẩm</button>
                           
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="panel-title">
                                <select class="form-control" id="category">
                                        <option value="">- Chọn danh mục -</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="panel-title">
                                <select class="form-control" id="producttype">
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="product_grid_border"></div>
                    <div class="row">
                        @foreach ($data['products'] as $item )
                            <div class="col-lg-3 col-md-6">
                                <div class="product-type" onclick="window.location='{{route('chi-tiet-san-pham-admin',$item['productId'])}}';">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                        @foreach ($result['datatext'] as $da )
                                            @foreach ($da['images'] as $da1)   
                                                @foreach ($da1['imageList'] as $da2)   
                                                @if($item['productId']== $da1['productId']) 
                                                    <img src= {{$da2["imageURL"]}}  width="215" height="215" alt="">
                                                    @break
                                                @endif
                                                @endforeach 
                                            @endforeach 
                                        @endforeach
                                    </div>
                                    <div class="product_content">
                                    <div class="product_price">{{$item['price']}} VND</div>
                                        <div class="product_name">
                                        <div><a href="#" tabindex="0">{{$item['productName']}}</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="space10">&nbsp;</div>
                            </div>
                        @endforeach
                    </div>
                    {{-- <button type="button" class="btn btn-outline- btn-save" onclick="window.location='add-product-detail-admin';">Thêm sản phẩm</button> --}}
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
    var element = document.getElementById("product-admin");
    element.classList.add("active");
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
                html += '<option value="' + json_data_product_type_specificationtypes + '/' + data[
                    'productTypes'][i]['productTypeId'] + '">' + data['productTypes'][i][
                    'productTypeName'
                ] + '</option>';
            }
            $('#producttype').append(html1);
            $('#producttype').append(html);
        });
    });
    
</script>

@endsection