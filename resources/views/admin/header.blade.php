
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <a href="{{route('trang-chu-admin')}}"><img src="{{ asset('source/admin/assets/img/primary_transparent.png') }}"  alt="CyberZone Logo" class="img-responsive logo "></a>
    </div>
    <div class="navbar-btn">
        <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
    </div>
    <div class="container-fluid">	
        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span>{{ $name }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('profile-shop-admin')}}" id="profile-shop-admin"><i class="lnr lnr-user"></i> <span>Thông tin gian hàng</span></a></li>
                    <li><a href="{{route('login-admin')}}"><i class="lnr lnr-exit"></i> <span>Đăng xuất</span></a></li>
                    </ul>
                </li>
               
            </ul>
        </div>
    </div>
</nav>
