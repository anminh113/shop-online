<!-- Header -->
<header class="header">
    <!-- Top Bar -->
    <div class="top_bar">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-row">
                    <div class="top_bar_contact_item">
                        +84 39 718 6707</div>
                    <div class="top_bar_contact_item">
                        <a href="mailto:anminh113@gmail.com">cyberzone@gmail.com</a></div>
                    <div class="top_bar_content ml-auto">
                        {{-- <div class="top_bar_contact_item">+84 169 718 6707</div> --}}
                        @if (Session::has('keyuser'))
                        <div class="top_bar_menu">
                            <ul class="standard_dropdown top_bar_dropdown">
                                <li>
                                    <a class="fix" href="{{route('register-shop',Session::get('keyuser')['info'][0]['customer']['_id'])}}">Bán hàng cùng CyberZone</a>
                                </li>
                            </ul>
                        </div>
                        <div class="top_bar_menu">
                            <ul class="standard_dropdown top_bar_dropdown">
                                <li>
                                    <a class="fix" href="{{ route('profile-user',Session::get('keyuser')['info'][0]['customer']['_id'] )}}">Tài khoản {{Session::get('keyuser')['info'][0]['customer']['name']}}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="top_bar_menu">
                            <ul class="standard_dropdown top_bar_dropdown">
                                <li>
                                    <a class="fix" href="login">Đăng xuất</a>
                                </li>
                            </ul>
                        </div>
                        @else

                        <div class="top_bar_menu">
                            <ul class="standard_dropdown top_bar_dropdown">
                                <li>
                                    <a class="fix" href="register">Đăng Ký</a>
                                </li>
                            </ul>
                        </div>
                        <div class="top_bar_menu">
                            <ul class="standard_dropdown top_bar_dropdown">
                                <li>
                                    <a class="fix" href="login">Đăng Nhập</a>
                                </li>
                            </ul>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Main -->
    <div class="header_main">
        <div class="container">
            <div class="row">
                <!-- Logo -->
                <div class="col-lg-3 col-sm-3 col-3 order-1">
                    <div class="logo_container">
                        <div class="logo">
                            <a href="index">
                                <div class="img_logo">
                                    <img src="source/user/images/primary_transparent.png">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Search -->
                <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                    <div class="header_search">
                        <div class="header_search_content">
                            <div class="header_search_form_container">
                                <form action="{{route('post-danhsach-sanpham')}}" method="POST" class="header_search_form clearfix">
                                    <input type="search" name="search" required="required" class="header_search_input" style="width: 100%;" placeholder="Tìm kiếm sản phẩm...">
                                    <button  class="header_search_button trans_300" value="submit"><img src="source/user/images/search.png" alt=""></button>
                                    {{ csrf_field() }}
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-9 order-lg-3 order-2 text-lg-left text-right">
                    <!-- Wishlist -->
                    <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                        <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                            @if (Session::has('keyuser'))
                            <div class="wishlist_icon" onclick="window.location='{{route('profile-user-shop',Session::get('keyuser')['info'][0]['customer']['_id'])}}';">
                                <img src="source/user/images/heart.png" alt="">
                                <div class="cart_count"><span>
                                        {{$datawl}}
                                    </span></div>
                            </div>
                          
                            @endif
                        </div>
                        <!-- Cart -->
                        <div class="cart" onclick="window.location='cart';">
                            <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                @if(Session::has('cart'))
                                <div class="cart_icon">
                                    <img src="source/user/images/cart.png" alt="">
                                    <div class="cart_count"><span>
                                            {{Session('cart')->totalQty}}
                                        </span></div>
                                </div>
                                <div class="cart_content">
                                    {{-- <div class="cart_price">{{number_format(Session('cart')->totalPrice, 3)}}.000₫</div>
                                    --}}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Navigation -->
    <nav class="main_nav">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="main_nav_content d-flex flex-row">
                        <!-- Categories Menu -->
                        <div class="cat_menu_container cat_menu_show">
                            <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                                <div class="cat_burger"><span></span><span></span><span></span></div>
                                <div class="cat_menu_text">Danh Mục</div>
                            </div>
                            <ul class="cat_menu">
                                @foreach($datacategory['data1'] as $time => $item )
                                    <li class="hassubs">
                                    <a >{{$data[$time]['categoryName']}}<i class="fas fa-chevron-right"></i></a>
                                        <ul>
                                            @foreach($item['productTypes'] as $text )
                                            <li><a href="{{route('post-producttype-danhsach-sanpham',$text['_id'])}}">{{$text['productTypeName']}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Main Nav Menu -->
                        <div class="main_nav_menu ml-auto">
                            <ul class="standard_dropdown main_nav_dropdown">
                                <li><a href="index">Trang Chủ<i class="fas fa-chevron-down"></i></a></li>

                                <li><a href="contact">Liên hệ <i class="fas fa-chevron-down"></i></a></li>
                            </ul>
                        </div>
                        <!-- Menu Trigger -->
                        <div class="menu_trigger_container ml-auto">
                            <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                <div class="menu_burger">
                                    <div class="menu_trigger_text">menu</div>
                                    <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Menu -->
    <div class="page_menu">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page_menu_content">
                        <div class="page_menu_search">
                            <form action="{{route('post-danhsach-sanpham')}}" method="POST">

                                <input type="search" required="required" name="search" class="page_menu_search_input" placeholder="Tìm kiếm sản phẩm...">
                                {{ csrf_field() }}
                            </form>
                        </div>
                        <ul class="page_menu_nav">

                            <li class="page_menu_item">
                                <a href="index">Trang chủ<i class="fa fa-angle-down"></i></a>
                            </li>

                            <li class="page_menu_item"><a href="contact">Liên hệ<i class="fa fa-angle-down"></i></a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
