@extends('admin/master')

@section('head')
{{-- <link rel="stylesheet" href="source/admin/assets/css/product.css"> --}}
<link href="{{ URL::asset('source/admin/assets/css/product.css') }}" rel="stylesheet" type="text/css" >

@endsection

@section('content')


<!-- MAIN -->
<div class="main">

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="col-lg-3 col-md-6">
                                <h4>Thêm sản phẩm:</h4>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <button type="button" class="btn btn-outline- btn-save" onclick="window.location='{{route('them-chi-tiet-san-pham-admin',$store)}}';">Thêm sản phẩm</button>
                            </div>
                        </div>
                        <div class="space10">&nbsp;<hr></div>
                        <div class="col-lg-12">
                            <div class="col-lg-3 col-md-6">
                                <h4>Tìm kiếm:</h4>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="panel-title">
                                    <select class="form-control" id="category">
                                            <option value="">- Chọn danh mục -</option>
                                    </select>
                                </div>
                            </div>

                            <form action="{{route('post-san-pham-admin')}}" method="POST">
                            <div class="col-lg-4 col-md-4">
                                <div class="panel-title">
                                    <select class="form-control" id="producttype">
                                    </select>
                                </div>
                                <div hidden id="producttype1"></div>
                            </div>
                            <div class="col-lg-2 col-md-4">
                                <button type="submit" class="btn btn-outline- btn-change" >Tìm kiếm</button>
                            </div>
                            {{ csrf_field() }}
                        </form>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="product_grid_border"></div>
                    <div class="row">
                        @foreach (array_reverse($data['products']) as $item )
                            <div class="col-lg-3 col-md-6">
                                <div class="product-type" onclick="window.location='{{route('chi-tiet-san-pham-admin',$item['_id'])}}';">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                        @foreach ($result['datatext'] as $da )
                                            @foreach ($da['imageList'] as $da1)   
                                                {{-- @foreach ($da1['imageList'] as $da2)    --}}
                                                @if($item['_id']== $da['productId']) 
                                                    <img src= {{$da1["imageURL"]}}  width="215" height="215" alt="">
                                                    @break
                                                @endif
                                                {{-- @endforeach  --}}
                                            @endforeach 
                                        @endforeach
                                    </div>
                                    <div class="product_content">
                                    <div class="product_price">{{number_format($item['price'])}},000₫</div>
                                        <div class="product_name">
                                        <div style="width: 95%; margin-left: 2.5%"><a href="#" tabindex="0">{{$item['productName']}}</a></div>
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
    var json_data_category = "{{$res12}}";
    var json_data_product_type = "{{$data_product_type}}";
    $.getJSON(json_data_category, function (data) {
        $('#table tbody tr').remove();
        var html = '';
        var len = data['store']['categories'].length;
        for (var i = 0; i < len; i++) {
            // console.log(data['categories'][i]['categoryName']);
            html += '<option value="' + json_data_product_type + '/' + data['store']['categories'][i]['category']['_id'] + '">' + data['store']['categories'][i]['category']['categoryName'] + '</option>';
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
            var html1 = '<option value="">- Chọn loại sản phẩm -</option>';
            var len = data['productTypes'].length;
            for (var i = 0; i < len; i++) {
                $("#producttype option").remove();
                html += '<option value="' + json_data_product_type_specificationtypes + '/' + data[
                    'productTypes'][i]['_id'] + '">' + data['productTypes'][i][
                    'productTypeName'
                ] + '</option>';
            }
            
            $('#producttype').append(html1);
            $('#producttype').append(html);
           
            $('#producttype1').append('<input type="text" name="producttypeid" value="'+text1[5]+'">');  
        });
    });
   
</script>

<script>
     $('#producttype').change(function () {
            var option1 = $(this).find('option:selected').val();
            var text1 = option1.split("/", 6);
            $('#producttype1').append('<input type="text" name="producttypeid" value="'+text1[5]+'">');  
          
    });
    </script>

@endsection