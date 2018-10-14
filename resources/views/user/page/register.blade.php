@extends('user/master')
@section('head')
<!-- login in google -->
<meta name="google-signin-scope" content="profile email">
<meta name="google-signin-client_id" content="981798466996-2gmgpq22iitri14mbqigmq2srrcp55co.apps.googleusercontent.com">
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="source/user/styles/js/loginGG.js"></script>
<!-- login in fb -->
<script src="source/user/styles/js/loginFB.js"></script>

<link rel="stylesheet" type="text/css" href="source/user/plugins/slick-1.8.0/slick.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/responsive.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/header_css.css">
<link rel="stylesheet" type="text/css" href="source/user/styles/css/register.css">
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
<div class="register">
    <div class="container">
        <div class="viewed_title_register">
            <h3 class="viewed_title">Tạo tài khoản CyberZone</h3>
        </div>
        <div class="space15">&nbsp;</div>
        <div class="row">
            <div class="col-lg-6">
            <form action="{{route('post-dang-ky')}}" id="dangky" method="POST">
                <div class="space10">&nbsp;</div>
                <div class="form-group">
                    <label for="sdt">Số Điện Thoại</label>
                    <input type="text" class="form-control" id="sdt" name="sdt" placeholder="">
                </div>
                <div class="space10">&nbsp;</div>
                <div class="form-group">
                    <label for="hoten">Họ Tên</label>
                    <input type="text" class="form-control" id="hoten" name="hoten" placeholder="">
                    <input type="text" hidden name="role" value="5b962b3289403417208b6488">
                </div>
                <div class="space10">&nbsp;</div>
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="form-group">
                            <label>Ngày Sinh</label>
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <select class="form-control" name="month" onchange="call()">
                                        <option value="">Tháng</option>
                                        <option value="01">Tháng 1</option>
                                        <option value="02">Tháng 2</option>
                                        <option value="03">Tháng 3</option>
                                        <option value="04">Tháng 4</option>
                                        <option value="05">Tháng 5</option>
                                        <option value="06">Tháng 6</option>
                                        <option value="07">Tháng 7</option>
                                        <option value="08">Tháng 8</option>
                                        <option value="09">Tháng 9</option>
                                        <option value="10">Tháng 10</option>
                                        <option value="11">Tháng 11</option>
                                        <option value="12">Tháng 12</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <select class="form-control" name="day" onchange="call()">
                                        <option>Ngày</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <select class="form-control" id="years" name="year">
                                        <option>Năm</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <label for="gender">Giới Tính</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="">Chọn</option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                        </div>
                    </div>
                </div>
                {{ csrf_field() }}
            </form>
            </div>
            <div class="col-lg-6">
                <div class="space10">&nbsp;</div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" form="dangky" name="email" placeholder="  ">
                </div>
                <div class="space10">&nbsp;</div>
                <div class="form-group">
                    <label for="pass">Mật Khẩu</label>
                    <input type="password" class="form-control" id="pass"  form="dangky" name="pass" placeholder="">
                </div>
                <div class="space10">&nbsp;</div>
                <div class="form-group">
                    <button type="submit" form="dangky" class="button register_title_button">Đăng Ký</button>
                </div>
                <small id="text" class="form-text text-muted">Hoặc Đăng kí với</small>
                <br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div id="gSignInWrapper">
                                <div id="customBtn" class="customGPlusSignIn">
                                    <button onclick="startApp()" title="Google" data-onsuccess="onSignIn" class="btn btn-googleplus btn-lg"
                                        style="border-radius: 5px; "><i class="fab fa-google"></i> Google</button>
                                </div>
                            </div>

                            <div id="name"></div>

                            <div class="space5">&nbsp;</div>
                        </div>
                        <div class="col-lg-6 col-md-6"> <button onclick="login()" title="Facebook" class="btn btn-facebook btn-lg"
                                style="border-radius: 5px; "><i class="fab fa-facebook-f"></i> Facebook</button></div>
                    </div>
                    <div class="space10">&nbsp;</div>
                </div>
                <div id="status"></div>
            </div>
        </div>
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
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/logo_intel.png"
                                    style="width: 140px; height: 70px;" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/logo_amd.png"
                                    style="width: 160px; height: 200px;" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/logo_msi.png"
                                    style="width: 150px; height: 45px;" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/logo_asus.png"
                                    style="width: 150px; height: 45px;" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/logo_gigabyte.jpg"
                                    style="width: 180px; height: 70px;" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/razer-logo.png"
                                    style="width: 180px; height: 225px;" alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img src="source/user/images/logo_corsair.png"
                                    style="width: 250px; height: 100px;" alt=""></div>
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
<script src="source/user/plugins/slick-1.8.0/slick.js"></script>
<script src="source/user/js/custom.js"></script>
<script src="source/user/styles/js/register.js"></script>
@endsection
