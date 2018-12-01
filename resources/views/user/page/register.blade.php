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
<style>
    .form-control.error{
        border: 1px solid #FA1111;
    }
    label.error {
        color:red;
    }
</style>
@endsection
@section('content')




<!-- register -->
<div class="register" style="margin-top: 70px">
    <div class="container">
        <div class="viewed_title_register">
            <h3 class="viewed_title">Tạo tài khoản CyberZone</h3>
        </div>
        <div class="space15">&nbsp;</div>
        <form action="{{route('post-dang-ky')}}" id="dangky" method="POST" name="dangky1">
        <div class="row">
                    <div class="col-lg-6">
                        <div class="space10">&nbsp;</div>
                        <div class="form-group">
                            <label for="hoten">Họ Tên</label>
                            <input type="text" required="required" class="form-control" id="hoten" name="hoten" placeholder="">
                            <input type="text" hidden name="role" value="5b962b3289403417208b6488">
                        </div>
                        <div class="space10">&nbsp;</div>
                        <div class="form-group">
                            <label for="sdt">Số Điện Thoại</label>
                            <input type="number" required="required"  class="form-control" id="sdt" name="sdt" placeholder="">
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
                                            <select class="form-control" name="year" id="years" >
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

                    </div>
                    <div class="col-lg-6">
                        <div class="space10">&nbsp;</div>
                        <div class="form-group">
                            <label for="user">Tên tài khoản</label>
                            <input type="text" required="required" class="form-control" id="user" form="dangky" name="user" placeholder="  ">
                        </div>
                        <div class="space10">&nbsp;</div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email"  required="required" class="form-control" id="email" form="dangky" name="email" placeholder="  ">
                        </div>
                        <div class="space10">&nbsp;</div>
                        <div class="form-group">
                            <label for="pass">Mật Khẩu</label>
                            <input type="password" required="required" class="form-control" id="pass"  form="dangky" name="pass" placeholder="">
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
                                            <button onclick="startApp()" type="button"  title="Google" data-onsuccess="onSignIn" class="btn btn-googleplus btn-lg"
                                                style="border-radius: 5px; "><i class="fab fa-google"></i> Google</button>
                                        </div>
                                    </div>
                                    <div hidden id="name"></div>

                                    <div class="space5">&nbsp</div>
                                </div>
                                <div class="col-lg-6 col-md-6"> <button onclick="login()" type="button" title="Facebook" class="btn btn-facebook btn-lg"
                                        style="border-radius: 5px; "><i class="fab fa-facebook-f"></i> Facebook</button></div>
                            </div>

                            <div class="space10">&nbsp;</div>
                        </div>

                    </div>
        </div>
            {{ csrf_field() }}
        </form>
        <form id="postggfb" action="{{route('post-google-facebook-dang-ky')}}" method="POST" >
            {{ csrf_field() }}
        </form>
    </div>
</div>

@include('user/Brands')

@endsection
@section('footer')
<script src="source/user/plugins/slick-1.8.0/slick.js"></script>
<script src="source/user/js/custom.js"></script>
<script src="source/user/styles/js/register.js"></script>
<script>
    $(document).ready(function () {
        $("form[name='dangky1']").validate({
            rules: {
                hoten: {
                    required: true,
                },
                sdt: {
                    required: true,
                },
                gender:{
                    required: true,
                },
                month:{
                    required: true,
                },
                year:{
                    required: true,
                },
                day:{
                    required: true,
                },
                user:{
                    required: true,
                },
                email:{
                    required: true,
                    email:true
                },
                pass:{
                    required: true,
                }
            },
            messages: {
                sdt: {
                    required: "Vui lòng nhập số điện thoại",
                },
                hoten: {
                    required: "Vui lòng nhập họ tên",
                },
                gender:{
                    required: "Vui lòng chọn giới tính",
                },
                month:{
                    required: "Vui lòng chọn tháng",
                },
                year:{
                    required: "Vui lòng chọn năm",
                },
                day:{
                    required: "Vui lòng chọn ngày",
                },
                user:{
                    required: "Vui lòng nhập tên tài khoản",
                },
                email:{
                    required: "Vui lòng nhập email",
                    email:"Vui lòng nhập đúng định dạng email"
                },
                pass:{
                    required: "Vui lòng nhập mật khẩu",
                }
            },
            errorElement: "em",
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>
@endsection
