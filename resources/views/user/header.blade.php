<!-- Header -->
<header class="header">
    <!-- Top Bar -->
    <div class="top_bar">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-row">
                    <div class="top_bar_contact_item">
                        +84 169 718 6707</div>
                    <div class="top_bar_contact_item">
                        <a href="mailto:anminh113@gmail.com">anminh113@gmail.com</a></div>
                    <div class="top_bar_content ml-auto">
                        {{-- <div class="top_bar_contact_item">+84 169 718 6707</div> --}}

                        <div class="top_bar_menu">
                            <ul class="standard_dropdown top_bar_dropdown">
                                <li>
                                    <a class="fix" href="#">Bán hàng cùng CyberZone</a>
                                </li>
                            </ul>
                        </div>
                        <div class="top_bar_menu">
                            <ul class="standard_dropdown top_bar_dropdown">
                                <li>
                                    <a class="fix" href="profile-user">Tài khoản Duy Huỳnh</a>
                                </li>
                            </ul>
                        </div>
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
                                <form action="" class="header_search_form clearfix">
                                    <input type="search" required="required" class="header_search_input" placeholder="Tìm kiếm sản phẩm...">
                                    <div class="custom_dropdown">
                                        <div class="custom_dropdown_list">
                                            <span class="custom_dropdown_placeholder clc">Tất cả danh mục</span>
                                            <i class="fas fa-chevron-down"></i>
                                            <ul class="custom_list clc">
                                                <li><a class="clc" href="#">Tất cả danh mục</a></li>
                                                <li><a class="clc" href="#">Computers</a></li>
                                                <li><a class="clc" href="#">Laptops</a></li>
                                                <li><a class="clc" href="#">Cameras</a></li>
                                                <li><a class="clc" href="#">Hardware</a></li>
                                                <li><a class="clc" href="#">Smartphones</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <button type="" onclick="window.location='productlist';" class="header_search_button trans_300" value="Submit"><img
                                            src="source/user/images/search.png" alt=""></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="col-lg-3 col-9 order-lg-3 order-2 text-lg-left text-right">
                     <!-- Wishlist -->
                    <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                        <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                            <div class="wishlist_icon">
                                <img src="source/user/images/heart.png" alt="">
                                <div class="cart_count"><span>
                                        12
                                    </span></div>
                            </div>
                            <div class="wishlist_content">
                                <div class="wishlist_text"><a href="#"></a></div>
                            </div>
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
                                <div class="cart_text"><a href="cart"></a></div>
                                <div class="cart_price">{{number_format(Session('cart')->totalPrice, 3)}}.000 ₫</div>
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
                                <li class="hassubs">
                                    <a href="#">Linh Kiện Máy Tính<i class="fas fa-chevron-right"></i></a>
                                    <ul>
                                        <li class="hassubs">
                                            <a href="#">CPU - Bộ vi xử lý<i class="fas fa-chevron-right"></i></a>
                                            <ul>
                                                <li><a href="#">Intel Core i3<i class="fas fa-chevron-right"></i></a></li>
                                                <li><a href="#">Intel Core i5<i class="fas fa-chevron-right"></i></a></li>
                                                <li><a href="#">Intel Core i7<i class="fas fa-chevron-right"></i></a></li>
                                                <li><a href="#">Intel Core i9<i class="fas fa-chevron-right"></i></a></li>
                                            </ul>
                                        <li class="hassubs">
                                            <a href="#">RAM<i class="fas fa-chevron-right"></i></a>
                                            <ul>
                                                <li><a href="#">RAM G.SKILL<i class="fas fa-chevron-right"></i></a></li>
                                                <li><a href="#">RAM ADATA<i class="fas fa-chevron-right"></i></a></li>
                                                <li><a href="#">RAM KINGMAX<i class="fas fa-chevron-right"></i></a></li>
                                                <li><a href="#">RAM KINGSTON<i class="fas fa-chevron-right"></i></a></li>
                                            </ul>
                                        </li>
                                        <li class="hassubs">
                                            <a href="#">Bo Mạch Chủ<i class="fas fa-chevron-right"></i></a>
                                            <ul>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                            </ul>
                                        </li>
                                </li>
                                <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                            </ul>
                            </li>
                            <li><a href="#">Màn Hình Máy Tính<i class="fas fa-chevron-right"></i></a></li>
                            <li class="hassubs">
                                <a href="#">Ổ Cứng SSD/HDD<i class="fas fa-chevron-right"></i></a>
                                <ul>
                                    <li class="hassubs">
                                        <a href="#">Menu Item<i class="fas fa-chevron-right"></i></a>
                                        <ul>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                    <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                    <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                </ul>
                            </li>
                            <li><a href="#">Chuột, Bàn phím, Webcam<i class="fas fa-chevron-right"></i></a></li>
                            <li><a href="#">Tai Nghe & Loa<i class="fas fa-chevron-right"></i></a></li>
                            </ul>
                        </div>
                        <!-- Main Nav Menu -->
                        <div class="main_nav_menu ml-auto">
                            <ul class="standard_dropdown main_nav_dropdown">
                                <li><a href="index">Trang Chủ<i class="fas fa-chevron-down"></i></a></li>
                                <!--     <li class="hassubs">
                                    <a href="#"><i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li>
                                            <a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                    </ul>
                                </li> -->
                                <!--   <li class="hassubs">
                                    <a href="#">Featured Brands<i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li>
                                            <a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                    </ul>
                                </li> -->
                                <!--  <li class="hassubs">
                                    <a href="#">Pages<i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li><a href="shop.html">Shop<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="product.html">Product<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="blog.html">Blog<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="blog_single.html">Blog Post<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="regular.html">Regular Post<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="cart.html">Cart<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="contact.html">Contact<i class="fas fa-chevron-down"></i></a></li>
                                    </ul>
                                </li> -->
                                <!-- <li><a href="blog.html">Blog<i class="fas fa-chevron-down"></i></a></li> -->
                                <li><a href="contact.html">Liên hệ <i class="fas fa-chevron-down"></i></a></li>
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
                            <form action="#">
                                <input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
                            </form>
                        </div>
                        <ul class="page_menu_nav">
                            <!-- <li class="page_menu_item has-children">
                                <a href="#">Language<i class="fa fa-angle-down"></i></a>
                                <ul class="page_menu_selection">
                                    <li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li>
                                </ul>
                            </li> -->
                            <!-- <li class="page_menu_item has-children">
                                <a href="#">Currency<i class="fa fa-angle-down"></i></a>
                                <ul class="page_menu_selection">
                                    <li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
                                </ul>
                            </li> -->
                            <li class="page_menu_item">
                                <a href="index.html">Trang chủ<i class="fa fa-angle-down"></i></a>
                            </li>
                            <!--     <li class="page_menu_item has-children">
                                <a href="#">Super Deals<i class="fa fa-angle-down"></i></a>
                                <ul class="page_menu_selection">
                                    <li><a href="#">Super Deals<i class="fa fa-angle-down"></i></a></li>
                                    <li class="page_menu_item has-children">
                                        <a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                        <ul class="page_menu_selection">
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                </ul>
                            </li> -->
                            <!--   <li class="page_menu_item has-children">
                                <a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>
                                <ul class="page_menu_selection">
                                    <li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                </ul>
                            </li>
                            <li class="page_menu_item has-children">
                                <a href="#">Trending Styles<i class="fa fa-angle-down"></i></a>
                                <ul class="page_menu_selection">
                                    <li><a href="#">Trending Styles<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                </ul>
                            </li>
                            <li class="page_menu_item"><a href="blog.html">blog<i class="fa fa-angle-down"></i></a></li> -->
                            <li class="page_menu_item"><a href="contact.html">Liên hệ<i class="fa fa-angle-down"></i></a></li>
                        </ul>
                        <!-- <div class="menu_contact">
                            <div class="menu_contact_item">
                                <div class="menu_contact_icon"><img src="images/phone_white.png" alt=""></div>+38 068 005 3570</div>
                            <div class="menu_contact_item">
                                <div class="menu_contact_icon"><img src="images/mail_white.png" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
