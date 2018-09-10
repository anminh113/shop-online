@extends('user/master')
@section('head')

<!-- login in google -->
<meta name="google-signin-scope" content="profile email">
<meta name="google-signin-client_id" content="981798466996-2gmgpq22iitri14mbqigmq2srrcp55co.apps.googleusercontent.com">
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="source/user/styles/js/loginGG.js"></script>
<!-- login in fb -->
<script src="source/user/styles/js/loginFB.js"></script>

<link rel="stylesheet" type="text/css" href="source/user/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/responsive.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/header_css.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/register.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/login.css">
<!-- show menu when hover -->
<link rel="stylesheet" type="text/css" href="source/user/styles/css/index.css">
@endsection

@section('content')




<!-- Characteristics -->
<div class="characteristics">
    <div class="container">
        <div class="row">
            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">
                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="source/user/images/char_1.png" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>
            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">
                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="source/user/images/char_2.png" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>
            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">
                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="source/user/images/char_3.png" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>
            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">
                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="source/user/images/char_4.png" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- register -->
<div class="login">
    <div class="container">
        <div class="viewed_title_register">
            <h3 class="viewed_title">Chào mừng đến với CyberZone!</h3>
        </div>
        <div class="space15">&nbsp;</div>
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="auth-box ">
                    <div class="left">
                        <div class="content">
                            <div class="header">
                                <p class="lead">Đăng Nhập</p>
                            </div>
                            <form action="#" class="clearfix">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số Điện Thoại hoặc Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mật Khẩu</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <button type="button" class="button register_title_button">Đăng Nhập</button>
                                </div>
                            </form>
                            <small class="form-text">Hoặc Đăng Nhập với</small>
                            <div class="space10">&nbsp;</div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div id="gSignInWrapper">
                                            <div id="customBtn" class="customGPlusSignIn">
                                                <button onclick="startApp()" title="Google" data-onsuccess="onSignIn" class="btn btn-googleplus" style="border-radius: 5px; "><i class="fab fa-google"></i> Google</button>
                                            </div>
                                        </div>
                                        <div id="name"></div>
                                        <div class="space5">&nbsp;</div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <button onclick="login()" title="Facebook" class="btn btn-facebook" style="border-radius: 5px; "><i class="fab fa-facebook-f"></i> Facebook</button>
                                    </div>
                                </div>
                                
                            </div>
                            <div id="status"></div>
                            <div class="space10">&nbsp;</div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="overlay"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--  <div class="row">
            <div class="col-lg-6">
                <form action="#" class="clearfix">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số Điện Thoại hoặc Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="space10">&nbsp;</div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mật Khẩu</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="space10">&nbsp;</div>
                    
                    
                </form>
            </div>
            <div class="col-lg-6">
                
                <div class="form-group">
                    <label for="exampleInputEmail1">&nbsp;</label>
                    <button type="button" class="button register_title_button">Đăng Nhập</button>
                </div>
                <small id="text" class="form-text text-muted">Hoặc Đăng Nhập với</small>
                
                <div class="form-group">
                        <label for="exampleInputEmail1">&nbsp;</label>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div id="gSignInWrapper">
                                <div id="customBtn" class="customGPlusSignIn">
                                    <button  onclick="startApp()" title="Google" data-onsuccess="onSignIn" class="btn btn-googleplus" style="border-radius: 5px; "><i class="fab fa-google"></i> Google</button> 
                                </div>
                            </div>

                            <div id="name"></div>
                            
                            <div class="space5">&nbsp;</div>
                        </div>
                        <div class="col-lg-6 col-md-6"> <button onclick="login()"  title="Facebook" class="btn btn-facebook" style="border-radius: 5px; "><i class="fab fa-facebook-f"></i> Facebook</button></div>
                    </div>
                    <div class="space10">&nbsp;</div>
                </div>
                <div id="status"></div>
            </div>
        </div> -->
    </div>
</div>
<!-- Brands -->
<div class="brands">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="brands_slider_container">
                    <!-- Brands Slider -->
                    <div class="owl-carousel owl-theme brands_slider">
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/brands_1.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/brands_2.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/brands_3.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/brands_4.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/brands_5.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/brands_6.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/brands_7.jpg" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/brands_8.jpg" alt=""></div>
                        </div>
                    </div>
                    <!-- Brands Slider Navigation -->
                    <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('footer')
<script src="source/user/js/custom.js"></script>
<script src="source/user/styles/js/register.js"></script>
@endsection

