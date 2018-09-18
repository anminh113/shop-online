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
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <h4>Thêm sản phẩm giảm giá:</h4>
                        </div>
                        <div class="col-lg-2 col-md-4">
                            <div class="input-group">
                                <input class="form-control" type="number" min="0" max="100">
                                <span class="input-group-addon">%</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4">
                            <div class="panel-title">
                                <select class="form-control" id="category">
                                        <option value="">- Chọn danh mục -</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="panel-title">
                                <select class="form-control" id="producttype">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-4">
                                <div class="panel-title">

                                        <button type="button" class="btn btn-outline- btn-save" >Tìm kiếm</button>                
                                </div>
                            </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div >
                        <label for="checkAll">Chọn tất cả </label>
                        <input type="checkbox" name="checkall" id="checkAll" hidden>
                    </div>
                    <div class="space10">&nbsp;</div>
                    <div class="row">
                        <?php $i= 0 ?>
                        @foreach ($data['products'] as $item )
                        <?php $i = $i +1;?>
                        <div class="col-lg-3 col-md-6">
                            <div class="product-type" style="height:260px;" id="texts<?php echo $i ?>">
                                <label for="productid<?php echo $i ?>">
                                <div class="product_border"></div>
                                <div class="product_fav">
                                        <span class="lnr lnr-checkmark-circle"></span>
                                </div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    @foreach ($result['datatext'] as $da )
                                        @foreach ($da['images'] as $da1)
                                            @if($item['productId']== $da1['productId'])
                                                <img src={{$da1["imageURL"]}} width="115" height="115" alt="">
                                                @break
                                            @endif
                                        @endforeach
                                    @endforeach 
                                </div> 
                                <div class="product_content">
                                    <div class="product_price">{{$item['price']}} VND</div>
                                    <div class="product_name">
                                        <div><a href="{{route('chi-tiet-san-pham-admin',$item['productId'])}}" tabindex="0">{{$item['productName']}}</a></div>
                                    </div>
                                </div>
                            </label>
                            </div>
                            <div class="space10">&nbsp;</div>
                        </div>
                        <label hidden>
                        <input type="checkbox" id="productid<?php echo $i ?>" value="{{$item['productId']}}" >
                                <span class="checkmark"></span>
                        </label>
                        <script>
                                $("#texts<?php echo $i ?>").click(function() {
                                $('#texts<?php echo $i ?> .product_fav').toggleClass('active');
                                });
                        </script> 
                          
                        @endforeach
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
   
<script>
    var element = document.getElementById("discount-admin");
    element.classList.add("active");
</script>
<script>
    $("#checkAll").click(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
        $('.product_fav').toggleClass('active');

        $('.text123').toggleClass('hidden1')

    });
</script>


@endsection
