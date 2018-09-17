@extends('admin/master')

@section('head')
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
                    <h3>Danh mục hệ thống</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        @foreach ($data['categories'] as $item)
                        <div class="col-lg-3 col-md-6">
                            <div class="product-type" onclick="window.location='product-detail-admin';">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="source/admin/assets/img/profile-bg.png" width="215" height="215" alt="">
                                </div>
                                <div class="product_content">
                                    <div class="product_price"></div>
                                    <div class="product_name">
                                        <div><a href="#" tabindex="0">{{$item['categoryName']}}</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="space10">&nbsp;</div>
                        </div>
                        @endforeach
                        {{-- <div class="col-lg-3 col-md-6">
                            <div class="product-type" onclick="window.location='product-detail-admin';">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="source/admin/assets/img/profile-bg.png" width="215" height="215" alt="">
                                </div>
                                <div class="product_content">
                                    <div class="product_price">$2250</div>
                                    <div class="product_name">
                                        <div><a href="#" tabindex="0">Philips BT6900A</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="space10">&nbsp;</div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="product-type" onclick="window.location='product-detail-admin';">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="source/admin/assets/img/profile-bg.png" width="215" height="215" alt="">
                                </div>
                                <div class="product_content">
                                    <div class="product_price">$2250</div>
                                    <div class="product_name">
                                        <div><a href="#" tabindex="0">Philips BT6900A</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="space10">&nbsp;</div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="product-type" onclick="window.location='product-detail-admin';">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="source/admin/assets/img/profile-bg.png" width="215" height="215" alt="">
                                </div>
                                <div class="product_content">
                                    <div class="product_price">$2250</div>
                                    <div class="product_name">
                                        <div><a href="#" tabindex="0">Philips BT6900A</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="space10">&nbsp;</div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel">
                <div class="panel-heading">
                    <h3>Danh mục người dùng</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                            @foreach ($result['datatext'] as $da)
                           
                            <div class="col-lg-3 col-md-6">
                                <div class="product-type" onclick="window.location='product-detail-admin';">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                        <img src="source/admin/assets/img/profile-bg.png" width="215" height="215" alt="">
                                    </div>
                                    <div class="product_content">
                                        <div class="product_price"></div>
                                        <div class="product_name">
                                        <div><a href="#" tabindex="0">  {{$da['category']['categoryName']}}</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="space10">&nbsp;</div>
                            </div>
                            @endforeach
                        {{-- <div class="col-lg-3 col-md-6">
                            <div class="product-type" onclick="window.location='product-detail-admin';">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="source/admin/assets/img/profile-bg.png" width="215" height="215" alt="">
                                </div>
                                <div class="product_content">
                                    <div class="product_price">$2250</div>
                                    <div class="product_name">
                                        <div><a href="#" tabindex="0">Philips BT6900A</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="space10">&nbsp;</div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="product-type" onclick="window.location='product-detail-admin';">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="source/admin/assets/img/profile-bg.png" width="215" height="215" alt="">
                                </div>
                                <div class="product_content">
                                    <div class="product_price">$2250</div>
                                    <div class="product_name">
                                        <div><a href="#" tabindex="0">Philips BT6900A</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="space10">&nbsp;</div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="product-type" onclick="window.location='product-detail-admin';">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="source/admin/assets/img/profile-bg.png" width="215" height="215" alt="">
                                </div>
                                <div class="product_content">
                                    <div class="product_price">$2250</div>
                                    <div class="product_name">
                                        <div><a href="#" tabindex="0">Philips BT6900A</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="space10">&nbsp;</div>
                        </div> --}}
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
       