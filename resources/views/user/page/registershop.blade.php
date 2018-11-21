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
}</style>
@endsection
@section('content')



<!-- Characteristics -->
<div class="characteristics">
 
</div>
<!-- register -->
<div class="register">
    <div class="container">
        <div class="viewed_title_register">
            <h3 class="viewed_title">Đăng ký bán hàng cùng CyberZone</h3>
        </div>
        <div class="space15">&nbsp;</div>
        <div class="row">
            <div class="col-lg-6">
                <div class="right">
                    <div class="overlay"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <form action="{{route('post-register-shop')}}" id="registershop" method="POST" class="clearfix" name="registershop">
                    <div class="form-group">
                        <label for="namestore" class="text-size">Tên Gian Hàng</label>
                        <input type="text" required="required" class="form-control" id="namestore" name="namestore" aria-describedby=""
                            placeholder="">
                    </div>
                   
                    <div class="space10">&nbsp;</div>
                    <div class="form-group">
                        <label for="email" class="text-size">Email</label>
                        <input type="email" required="required" class="form-control" id="email" name="email" aria-describedby=""
                            placeholder="">
                    </div>
                   
                    <div class="space10">&nbsp;</div>
                    <div class="form-group">
                        <label for="sdt" class="text-size">Số Điện Thoại</label>
                        <input type="number" required="required" class="form-control" id="sdt" name="sdt" aria-describedby=""
                            placeholder="">
                    </div>
                    <div class="space10">&nbsp;</div>
                    <div class="form-group">
                        <label for="" class="text-size">Địa chỉ kho</label>
                        <select name="tinh-thanhpho" id="tinh-thanhpho" class="form-control" required="required" style="margin-left: 0px;"
                            id="">
                            <option value="">Chọn tỉnh thành</option>
                        </select>
                    </div>
                    <div class="space10">&nbsp;</div>
                    <div class="form-group">
                        <label for="username" class="text-size">Tài khoản đăng nhập</label>
                        <input type="text" required="required" class="form-control" id="username" name="username" aria-describedby=""
                            placeholder="">
                    </div>
                    <div class="space10">&nbsp;</div>
                    <div class="form-group">
                        <label for="pass1" class="text-size">Mật khẩu</label>
                        <input type="password" required="required" class="form-control" id="pass1" name="pass1" aria-describedby=""
                            placeholder="">
                    </div>
                    <div class="space10">&nbsp;</div>
                    <div class="form-group">
                        <label for="pass2" class="text-size">Xác nhận mật khẩu</label>
                        <input type="password" required="required" class="form-control" id="pass2" name="pass2" aria-describedby=""
                            placeholder="">
                    </div>
                    {{ csrf_field() }}
                </form>

                <div class="form-group">
                    <div class="space20">&nbsp;</div>
                    <button type="submit" form="registershop" class="button register_title_button">Đăng Ký</button>
                </div>
            </div>
        </div>
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

        load_json_data('tinh-thanhpho');

        function load_json_data(id, parent_id) {
            var html_code = '';
            $.getJSON("source/user/datacontry/tinh_tp.json", function (data) {
                html_code += '<option value="">Chọn tỉnh thành</option>';
                $.each(data, function (key, value) {
                    if (id == 'tinh-thanhpho') {
                        if (value.type == 'tinh' || value.type == 'thanh-pho') {
                            html_code += '<option value="' + value.name + '">' + value.name_with_type +
                                '</option>';
                        }
                    } else {
                        if (value.code == parent_id) {
                            html_code += '<option value="' + value.name + '">' + value.name_with_type +
                                '</option>';
                        }
                    }
                });
                $('#tinh-thanhpho').html(html_code);
            });
        }
    });
</script>

<script>
        $(document).ready(function() {
            $("form[name='registershop']").validate({
                
                rules: {
                    pass1: {
                        required: true,
                        minlength: 5
                    },
                     pass2: {
                        required: true,
                        equalTo: "#pass1"
                    }
                },errorElement: "em",
                submitHandler: function(form) {
                form.submit();
                }
            });
        });
</script>

@endsection
