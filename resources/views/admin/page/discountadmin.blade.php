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
                            <h4>Thêm sự kiện giảm giá:</h4>
                        </div>


                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form action="{{route('post-discount-admin')}}" method="POST" >
                        <div class="col-lg-3 col-md-6">
                            <label for="basic">% giảm giá:</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="DiscountNumber" min="1" value="1" max="99">
                                <span class="input-group-addon">%</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <label for="basic">Ngày bắt đầu:</label>
                            <div class="input-group">
                                <input class="form-control" name="startdate" id="stardate" type="datetime-local">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <label for="basic">Ngày kết thúc:</label>
                            <div class="input-group">
                                <input class="form-control" name="enddate" id="enddate" type="datetime-local">
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-4">
                            <label for="basic">&nbsp;&nbsp;</label>
                            <div class="input-group">
                                <button type="submit" class="btn btn-outline- btn-save" style="min-width:150px;">Thêm</button>
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                    </div>
                    <div class="space10">&nbsp;</div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <h4>Thêm sự kiện giảm giá cho sản phẩm:</h4>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="panel-title">
                            <select class="form-control" id="">
                                <option value="">- % -</option>
                                <option value="">-5%  2018-09-28 : 2018-09-30</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <h4>Tìm kiếm sản phẩm:</h4>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="panel-title">
                            <select class="form-control" id="category">
                                <option value="">- Chọn danh mục -</option>
                            </select>
                        </div>
                    </div>
                    <form action="{{route('post-tim-kiem-discount-admin')}}" method="POST">
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
                <div class="space10">&nbsp;</div>
                <div>
                    <label for="checkAll" class="btn btn-outline- btn-change">Chọn tất cả </label>
                    <input type="checkbox" name="checkall" id="checkAll" hidden>
                    <div class="space15">&nbsp;</div>
                </div>
                <div class="row">
                    <?php $i= 0 ?>
                    @foreach ($data['products'] as $item )
                    <?php $i = $i +1;?>
                    <div class="col-lg-3 col-md-6">
                        <div class="product-type" style="height:;" id="texts<?php echo $i ?>">
                            <label for="productid<?php echo $i ?>">
                                <div class="product_border"></div>
                                <div class="product_fav">
                                    <span class="lnr lnr-checkmark-circle"></span>
                                </div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    @foreach ($result['datatext'] as $da )
                                    @foreach ($da['imageList'] as $da1)   
                                        @if($item['_id']== $da['productId']) 
                                            <img src= {{$da1["imageURL"]}}  width="215" height="215" alt="">
                                            @break
                                        @endif
                                    @endforeach 
                                @endforeach
                                </div>
                                <div class="product_content">
                                    <div class="product_price">{{$item['price']}} VND</div>
                                    <div class="product_name">
                                        <div><a href="{{route('chi-tiet-san-pham-admin',$item['_id'])}}" tabindex="0">{{$item['productName']}}</a></div>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="space10">&nbsp;</div>
                       
                    </div>
                    <label hidden>
                        <input type="checkbox" id="productid<?php echo $i ?>" value="{{$item['_id']}}">
                        <span class="checkmark"></span>
                    </label>
                    <script>
                        $("#texts<?php echo $i ?>").click(function () {
                            $('#texts<?php echo $i ?> .product_fav').toggleClass('active');
                        });
                    </script>
                    @endforeach
                    <div class="input-group">
                        <button type="button" class="btn btn-outline- btn-save" style="min-width:150px;">Thêm</button>
                    </div>
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
    var json_data_category = "{{$res1}}";
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

<script>
    var element = document.getElementById("discount-admin");
    element.classList.add("active");

</script>

<script>
    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
        $('.product_fav').toggleClass('active');

        $('.text123').toggleClass('hidden1')

    });

</script>

<script>
    $.getJSON('https://api.timezonedb.com/v2.1/get-time-zone?key=BSPXCELRM0KP&format=json&by=zone&zone=Asia/Ho_Chi_Minh', function (data) {
    var date = new Date(data['formatted']);
    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();
    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;
    var today = year + "-" + month + "-" + day;
    document.getElementById("stardate").min = today+'T00:00';
    document.getElementById("enddate").min = today+'T00:00';

    // var startdate = document.getElementById("stardate").value;
    // var enddate = document.getElementById("enddate").value;
    // let parsedDate = moment(startdate, 'DD.MM.YYYY H:mm:ss')
    // console.log(parsedDate.toISOString());
   
    
});

</script>


@endsection
