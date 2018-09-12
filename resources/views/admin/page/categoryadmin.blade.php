@extends('admin/master')

@section('head')
<link rel="stylesheet" href="source/admin/assets/css/product.css">
@endsection
@section('content')
@section('sidebar')
<li><a href="index-admin" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
<li><a href="category-admin" class="active"><i class="lnr lnr-code"></i> <span>Category</span></a></li>
<li><a href="product-admin" class=""><i class="lnr lnr-chart-bars"></i> <span>Product</span></a></li>
<li><a href="panels.html" class=""><i class="lnr lnr-cog"></i> <span>Panels</span></a></li>
<li><a href="notifications.html" class=""><i class="lnr lnr-alarm"></i> <span>Notifications</span></a></li>
<li><a href="tables.html" class=""><i class="lnr lnr-dice"></i> <span>Tables</span></a></li>
<li><a href="typography.html" class=""><i class="lnr lnr-text-format"></i> <span>Typography</span></a></li>
<li><a href="icons.html" class=""><i class="lnr lnr-linearicons"></i> <span>Icons</span></a></li>
@endsection
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
                    <h3>Category1</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
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
                        </div>
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
                    <h3>Category1</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
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

<script>
    
</script>
@endsection
       