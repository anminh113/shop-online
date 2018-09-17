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
                          
                                <button type="button" class="btn btn-outline- btn-save" onclick="window.location='add-product-detail-admin';">Thêm sản phẩm</button>
                          
                           
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="panel-title">
                                <select class="form-control">
                                    <option value="cheese">Cheese</option>
                                    <option value="tomatoes">Tomatoes</option>
                                    <option value="mozarella">Mozzarella</option>
                                    <option value="mushrooms">Mushrooms</option>
                                    <option value="pepperoni">Pepperoni</option>
                                    <option value="onions">Onions</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="panel-title">
                                <select class="form-control">
                                    <option value="cheese">Cheese</option>
                                    <option value="tomatoes">Tomatoes</option>
                                    <option value="mozarella">Mozzarella</option>
                                    <option value="mushrooms">Mushrooms</option>
                                    <option value="pepperoni">Pepperoni</option>
                                    <option value="onions">Onions</option>
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
                                                @if($item['productId']== $da1['productId']) 
                                                    <img src= {{$da1["imageURL"]}}  width="215" height="215" alt="">
                                                    @break
                                                @endif
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

@endsection