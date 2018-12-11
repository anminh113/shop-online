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
                        <form action="{{route('post-discount-admin')}}" name="adddiscount1" method="POST">
                            <div class="col-lg-3 col-md-6">
                                <label for="basic">% giảm giá:</label>
                                <div class="input-group">
                                    <input class="form-control" type="number"  required="required" name="DiscountNumber" min="1" value="1"
                                        max="99">
                                    <span class="input-group-addon">%</span>
                                </div>
                                <div id="errorname1"></div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label for="basic">Ngày bắt đầu:</label>
                                <div class="input-group">
                                    <input class="form-control"  required="required" name="startdate1" id="stardate" type="datetime-local">
                                </div>
                                <div id="errorname2"></div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label for="basic">Ngày kết thúc:</label>
                                <div class="input-group">
                                    <input class="form-control"  required="required" name="enddate1" id="enddate" type="datetime-local">
                                </div>
                                <div id="errorname3"></div>
                            </div>
                            <div class="col-lg-1 col-md-4">
                                <label for="basic">&nbsp;&nbsp;</label>
                                <div class="input-group">
                                    <button type="submit" onclick=""  class="btn btn-outline- btn-save" style="min-width:150px;">Thêm</button>
                                </div>
                            </div>
                            {{ csrf_field() }}
                        </form>
                        <script>
                            $(document).ready(function() {
                                $("form[name='adddiscount1']").validate({
                                    errorPlacement: function(error, element) {
                                        if (element.attr("name") == "DiscountNumber") {
                                            error.insertAfter("#errorname1");
                                        } else if (element.attr("name") == "startdate") {
                                            error.insertAfter("#errorname2");
                                        } else if (element.attr("name") == "enddate") {
                                            error.insertAfter("#errorname3");
                                        }else {
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
                    </div>
                    <div class="space10">&nbsp;</div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-body">
                <!-- TABBED CONTENT -->
                <div class="custom-tabs-line tabs-line-bottom left-aligned">
                    <ul class="nav" role="tablist">
                        @if (Session::has('HasSearchSaleOffId'))
                        <li id="tab1" ><a href="{{route('discount-admin')}}" id="discount-admin" style="font-size: 18px">Thêm sản phẩm giảm
                                giá</a></li>
                        <li id="tab2" class="active"><a href="#tab-bottom-left2" role="tab" data-toggle="tab" style="font-size: 18px">Các sự kiện đang giảm giá <span
                                    class="badge" id="count"></span></a></li>
                        <li id="tab3"><a href="#tab-bottom-left3" role="tab" data-toggle="tab" style="font-size: 18px">Danh sách sự kiện đang giảm giá <span
                                            class="badge" id="count"></span></a></li>
                        @else 
                        <li id="tab1" class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab" style="font-size: 18px">Thêm sản phẩm giảm
                                giá</a></li>
                        <li id="tab2" ><a href="#tab-bottom-left2" role="tab" data-toggle="tab" style="font-size: 18px">Các sự kiện đang giảm giá <span
                                    class="badge" style="background-color: #00C9B8" id="count"></span></a></li>
                        <li id="tab3" ><a href="#tab-bottom-left3" role="tab" data-toggle="tab" style="font-size: 18px">Danh sách sự kiện đang giảm giá <span
                                            class="badge" id="count"></span></a></li>
                        @endif
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="tab-bottom-left1" class="tab-pane fade active in " >
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <h4>Thêm sự kiện giảm giá cho sản phẩm:</h4>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="panel-title">
                                    <select class="form-control" id="discount" form="adddiscount" name="discount">
                                        <option value="">- % -</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-4">
                                <button type="submit" onclick="archiveFunction()" form="adddiscount" class="btn btn-outline- btn-save" style="min-width:150px;">Thêm vào đợt giảm giá </button>
                            </div>
                        </div>
                        <hr>
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
                                    <button type="submit" class="btn btn-outline- btn-change">Tìm kiếm</button>
                                </div>
                                {{ csrf_field() }}
                            </form>
                        </div>
                        <hr>
                        <form id="adddiscount" action="{{route('post-add-discount-admin')}}" method="POST">
                            <div class="space10">&nbsp;</div>
                            <div>
                                <label for="checkAll" class="btn btn-outline- btn-change">Chọn tất cả </label>
                                <input type="checkbox" name="checkall" id="checkAll" hidden>
                                <div class="space15">&nbsp;</div>
                            </div>
                            <div class="row">
                                <?php $i= 0 ?>
                                @foreach ($result1['datatext1'] as $item )
                                <?php $i = $i +1;?>
                                <div class="col-lg-3 col-md-6">
                                    <div class="product-type" style="height:;" id="texts<?php echo $i ?>">
                                        <label  for="productid{{$item['_id']}}">
                                            <div class="product_border"></div>
                                          
                                                <div class="product_fav">
                                                    <span class="lnr lnr-checkmark-circle"></span>
                                                </div>
                                           
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                @foreach ($result['datatext'] as $da )
                                                @foreach ($da['imageList'] as $da1)
                                                @if($item['_id']== $da['productId'])
                                                    <img class="lazy" data-src="{{$da1["imageURL"]}}" width="215" height="215" alt="">
                                                @break
                                                @endif
                                                @endforeach
                                                @endforeach
                                            </div>
                                            <div class="product_content">
                                                <div class="product_price"></div>
                                                <div class="product_name">
                                                    <div><a href="{{route('chi-tiet-san-pham-admin',$item['_id'])}}" tabindex="0">{{$item['productName']}}</a></div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="space10">&nbsp;</div>
                                </div>
                                <label hidden>
                                  <p hidden>
                                  <input type="checkbox" id="productid{{$item['_id']}}" name="productDiscount[]"
                                            value="{{$item['_id']}}">
                                        <span class="checkmark"></span>
                                    </p>
                                </label>
                                <script>
                                    $("#texts<?php echo $i ?>").click(function () {
                                            $('#texts<?php echo $i ?> .product_fav').toggleClass('active');
                                        });
                                    </script>
                                @endforeach

                            </div>

                            {{ csrf_field() }}
                        </form>
                    </div>
                    <div id="tab-bottom-left2" class="tab-pane fade ">
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <h4>Tìm kiếm theo đợt giảm giá:</h4>
                            </div>
                            <form action="{{route('search-saleoff-admin')}}" method="POST">
                                <div class="col-lg-4 col-md-4">
                                    <div class="panel-title">
                                        <select class="form-control" id="saleoff"  name="saleoffid">
                                            <option value="">- % -</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <button type="submit" class="btn btn-outline- btn-change">Tìm kiếm</button>
                                </div>
                                {{ csrf_field() }}
                            </form>
                        </div>
                        <hr>
                     
                        <form  action="{{route('post-delete-discount-admin')}}" method="POST">
                            <div class="space10">&nbsp;</div>
                            <div>
                                <label for="checkAll1" class="btn btn-outline- btn-change">Chọn tất cả </label>
                                <input type="checkbox" name="checkall1" id="checkAll1" hidden>
                                <div class="space15">&nbsp;</div>
                            </div>
                            <div class="row">
                                <?php $i= 0 ?>
                                @if($result2 != null)
                                @foreach ($result2['datatext2'] as $item )
                                {{-- @if(empty($item['saleOff'])) --}}
                                <?php $i = $i +1;?>
                                <div class="col-lg-3 col-md-6">
                                    <div class="product-type" style="height:;" id="texts1<?php echo $i ?>">
                                        <label id="tessss" for="product{{$item['_id']}}">
                                            <div class="product_border"></div>
                                                <div class="product_fav1">
                                                    <span class="lnr lnr-checkmark-circle"></span>
                                                </div> 
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                @foreach ($result3['datatext1'] as $da )
                                                @foreach ($da['imageList'] as $da1)
                                                @if($item['_id']== $da['productId'])
                                                    <img class="lazy" data-src="{{$da1["imageURL"]}}" width="215" height="215" alt="">
                                                @break
                                                @endif
                                                @endforeach
                                                @endforeach
                                            </div>
                                            <div class="product_content">
                                                <div class="product_price"></div>
                                                <div class="product_name">
                                                    <div><a href="{{route('chi-tiet-san-pham-admin',$item['_id'])}}"
                                                            tabindex="0">{{$item['productName']}}</a></div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="space10">&nbsp;</div>
                                </div>
                                <label hidden>
                                    <div hidden>
                                        <input type="checkbox" id="product{{$item['_id']}}" name="DeleteProductDiscount[]"
                                            value="{{$item['_id']}}">
                                        <span class="checkmark"></span>
                                    </div>
                                </label>
                                <script>
                                    $("#texts1<?php echo $i ?>").click(function () {
                                        $('#texts1<?php echo $i ?> .product_fav1').toggleClass('active');
                                    });
                                </script>
                                {{-- @endif --}}
                                @endforeach
                                @endif

                            </div>
                            <div class="input-group">
                                <button type="submit" onclick="archiveFunction()" class="btn btn-outline- btn-save" style="min-width:150px;">Xóa khỏi đợt giảm giá </button>
                            </div>
                            {{ csrf_field() }}
                        </form>
                    </div>
                    <div id="tab-bottom-left3" class="tab-pane fade ">
                            <table class="table table-striped" >
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Phần trăm giảm giá</th>
                                        <th>Ngày bắt đầu</th>
                                        <th>Ngày kết thúc</th>
                                        <th>Xóa</th>
                                    </tr>
                                    </thead>
                                    <tbody id="myTable">
                                    <?php $i=1;?>
                                    @foreach ($datatextdis['saleOffs'] as $item)
                                        @if ($item['dateEnd'] > $time)
                                        <tr >
                                            <td data-toggle="modal" data-target="#accept{{$item['_id']}}"><?php echo $i;?></td>
                                            <td data-toggle="modal" data-target="#accept{{$item['_id']}}">{{$item['discount']}}%</td>
                                            <td data-toggle="modal" data-target="#accept{{$item['_id']}}"><script>var dtstart = moment('{{$item['dateStart']}}').format('DD/MM/YYYY HH:mm'); document.write(dtstart);</script></td>
                                            <td data-toggle="modal" data-target="#accept{{$item['_id']}}"><script>var dtstart = moment('{{$item['dateEnd']}}').format('DD/MM/YYYY HH:mm'); document.write(dtstart);</script></td>
                                            <td><div><a id="delete{{$item['_id']}}" href="{{route('delete-discount-admin',$item['_id'])}}" >Xóa đợt giảm giá</a></div></td>
                                        </tr>
                                        <script>
                                            $('#delete{{$item['_id']}}').click(function(e){
                                                e.preventDefault();
                                                var link = $(this).attr('href');
                                                console.log(link);
                                                swal({
                                                    title: 'Xác nhận?',
                                                    text: "Bạn có muốn thực hiện hành động này",
                                                    type: 'warning',
                                                    position: 'top',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#008496',
                                                    cancelButtonColor: '#FA5821',
                                                    confirmButtonText: 'Đồng ý',
                                                    cancelButtonText: 'Hủy'

                                                }).then((result) => {
                                                    if (result.value) {
                                                        window.location.href = link;
                                                    }
                                                })
                                            });
                                        </script>
                                        <?php $i++;?>
                                        <div class="modal fade" id="accept{{$item['_id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLongTitle">Cập nhật sự kiện giảm giá</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>


                                                    <div class="modal-body">
                                                        <form action="{{route('update-discount-admin')}}" method="post" id="updatedis{{$item['_id']}}" name="addtypeproduct{{$item['_id']}}">

                                                        <div class="row">
                                                                <div class="col-lg-12 col-md-6">
                                                                    <label for="basic">Phần trăm giảm giá:</label>
                                                                    <div class="input-group" style="width: 41%" >
                                                                        <input class="form-control" type="number"  required="required" name="DiscountNumber" min="1" value="{{$item['discount']}}"
                                                                               max="99">
                                                                        <input type="text" hidden name="id" value="{{$item['_id']}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6">
                                                                    <label for="basic">Ngày bắt đầu:</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control" type="datetime-local"  required="required"  name="startdateupdate" id="stardate1{{$item['_id']}}" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6">
                                                                    <label for="basic">Ngày kết thúc:</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control" type="datetime-local"  required="required" name="enddateupdate" id="enddate1{{$item['_id']}}" >
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            @method('PATCH')
                                                            {{ csrf_field() }}
                                                        </form>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Thoát</button>
                                                        <button type="submit" form="updatedis{{$item['_id']}}" class="btn btn-save">Lưu</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                var date = new Date('{{$time}}');
                                                var day = date.getDate();
                                                var month = date.getMonth() + 1;
                                                var year = date.getFullYear();
                                                if (month < 10) month = "0" + month;
                                                if (day < 10) day = "0" + day;
                                                var today = year + "-" + month + "-" + day;
                                                document.getElementById("stardate1{{$item['_id']}}").min = today + 'T00:00';
                                                document.getElementById("enddate1{{$item['_id']}}").min = today + 'T00:00';
                                            </script>
                                        </div>


                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                 
                </div>
                <!-- END TABBED CONTENT -->

            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@endsection

@section('footer')
{{-- get data discount where storeID --}}
<script>
    var json_data_category = "{{$resdis}}";
    $.getJSON(json_data_category, function (data) {
        $('#table tbody tr').remove();
        var html = '';
        var time = '{{$time}}';
        var len = data['saleOffs'].length;
        var count = 0;
        for (var i = 0; i < len; i++) {
            myDateStart = moment(new Date(data['saleOffs'][i]['dateStart'])).format("DD/MM/YYYY HH:mm");
            myDateEnd = moment(new Date(data['saleOffs'][i]['dateEnd'])).format("DD/MM/YYYY HH:mm");
            if (data['saleOffs'][i]['dateEnd'] > time) {
                html += '<option value="' + data['saleOffs'][i]['_id'] + '">- ' + data['saleOffs'][i]['discount'] + '%: ' + myDateStart + ' | ' + myDateEnd + '</option>';
                count++;

            }
        }
        $('#discount').append(html);
        $('#saleoff').append(html);
        $('#count').append(count);
    });

</script>
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
            html += '<option value="' + json_data_product_type + '/' + data['store']['categories'][i][
                'category'
            ]['_id'] + '">' + data['store']['categories'][i]['category']['categoryName'] + '</option>';
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
        $('#producttype1').append('<input type="text" name="producttypeid" value="' + text1[5] + '">');

    });

</script>

<script>
    var element = document.getElementById("discount-admin");
    element.classList.add("active");

</script>

<script>
    $("#checkAll").click(function () {
        $('label p input:checkbox').not(this).prop('checked', this.checked);
        $('.product_fav').toggleClass('active');
        $('.text123').toggleClass('hidden1')
    });

</script>

<script>
    $("#checkAll1").click(function () {
        $('label div input:checkbox').not(this).prop('checked', this.checked);
        $('.product_fav1').toggleClass('active');
        $('.text123').toggleClass('hidden1')
    });

</script>

<script>
    var test = '{{Session::get('HasSearchSaleOffId')}}';
    if(test == '1'){
        var element = document.getElementById("tab-bottom-left2");
        element.classList.add("active");
        element.classList.add("in");
        var element1 = document.getElementById("tab-bottom-left1");
        element1.classList.remove("active");
        element1.classList.remove("in");
        }
    else{
        var element = document.getElementById("tab-bottom-left1");
        element.classList.add("active");
        element.classList.add("in");
        var element1 = document.getElementById("tab-bottom-left2");
        element1.classList.remove("active");
        element1.classList.remove("in");
        }
</script>

<script>

            var date = new Date('{{$time}}');
            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear();
            if (month < 10) month = "0" + month;
            if (day < 10) day = "0" + day;
            var today = year + "-" + month + "-" + day;
            document.getElementById("stardate").min = today + 'T00:00';
            document.getElementById("enddate").min = today + 'T00:00';


</script>



@endsection
