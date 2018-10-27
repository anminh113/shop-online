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

@endsection

@section('content')




<!-- register -->
<div class="login" style="margin-top: 70px">
    <div class="container">
        <div class="viewed_title_register">
            <h3 class="viewed_title">Chào mừng đến với CyberZone!</h3>
        </div>
        <div class="space15">&nbsp;</div>
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="auth-box ">
                    <div class="left">
                        <div class="content">
                            <div class="header">
                                <p class="lead">Đăng Nhập</p>
                            </div>
                            <form id="demoForm" name="demoForm" action="{{route('post-dang-nhap')}}" method="POST" accept-charset="utf-8">
                                <div class="form-group">
                                    <label for="email">Tên tài khoản hoặc Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Mật Khẩu</label>
                                    <input type="password" class="form-control" id="password" name="pass" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="button register_title_button">Đăng Nhập</button>
                                </div>
                                {{ csrf_field() }}
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
    
    </div>
</div>
@include('user/Brands')


@endsection


@section('footer')
<script src="source/user/js/custom.js"></script>
<script src="source/user/styles/js/register.js"></script>
<link rel="stylesheet" type="text/css" href="source/user/styles/css/index.css">

<script>
    $(document).ready(function() {

        $("form[name='demoForm']").validate({
            rules: {
                // email: {
                //     required: true,
                //     email: true
                // },
                pass: {
                    required: true,
                    // minlength: 1
                }
            },
            messages: {        
                pass: {
                    required: "Vui lòng nhập Password",
                },
                // email: {
                //     required: "Vui lòng nhập Email",
                //     email: "Vui lòng nhập đúng địa chỉ Email"
                // },
                // email: "Vui lòng nhập địa chỉ Email",
            },
            errorElement: "em",
            highlight: function ( element, errorClass, validClass ) {
                $( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
            },
            unhighlight: function (element, errorClass, validClass) {
                $( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
            },
            submitHandler: function(form) {
            form.submit();
            }
        });
    });
</script>
@endsection

