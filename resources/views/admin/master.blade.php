<!doctype html>
<html lang="en">

<head>
    @include('admin/head')
    @yield('head')
</head>

<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">



<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		@include('admin/header')
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>	
					@if (Session::has('key'))
						@if (Session::get('key')['role']['roleName'] == 'Quản trị viên')
						{{-- Admin --}}	
						<ul class="nav">
							<li><a href="{{route('trang-chu-admin-he-thong')}}" id="admin" class=""><i class="lnr lnr-home"></i> <span>Trang chủ</span></a></li>
							<li><a href="{{route('danh-sach-shop-he-thong')}}" id="category-admin-shop" class=""><i class="lnr lnr-code"></i> <span>Danh sách gian hàng</span></a></li>
							<li><a href="{{route('them-danh-muc-admin')}}" id="add-category-admin" class=""><i class="lnr lnr-code"></i> <span>Quản lý danh mục	</span></a></li>
						</ul>
						@endif
						@if (Session::get('key')['role']['roleName'] == 'Quản lý gian hàng')
						{{-- Người bán hàng --}}
						<ul class="nav">
							<li><a href="{{ route('trang-chu-admin')}}" id="index-admin" class=""><i class="lnr lnr-home"></i> <span>Trang chủ</span></a></li>
							<li><a href="{{route('danh-muc-admin')}}" id="category-admin" class=""><i class="lnr lnr-code"></i> <span>Danh mục</span></a></li>
							<li><a href="{{route('san-pham-admin')}}" id="product-admin" class=""><i class="lnr lnr-chart-bars"></i> <span>Sản phẩm</span></a></li>
							<li><a href="{{route('xem-danh-gia')}}" id="review-admin" class=""><i class="lnr lnr-chart-bars"></i> <span>Nhận xét & đánh giá</span></a></li>
							<li><a href="{{route('discount-admin')}}" id="discount-admin" class=""><i class="lnr lnr-chart-bars"></i> <span>Sự kiện giảm giá </span></a></li>
							<li>
								<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Quản lý đơn hàng</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
								<div id="subPages" class="collapse ">
									<ul class="nav">
										<li><a href="{{route('order-admin')}}" id="order-admin" class=""> <span>Đơn hàng chờ xử lý</span></a></li>
										<li><a href="{{route('order-admin-watning')}}" id="order-admin-watning" class=""> <span>Đơn hàng đã xử lý</span></a></li>
										<li><a href="{{route('order-admin-shipping')}}" id="order-admin-shipping" class=""> <span>Đơn hàng đang giao hàng</span></a></li>
										<li><a href="{{route('order-admin-done')}}" id="order-admin-done" class=""> <span>Đơn hàng đã giao hàng</span></a></li>
									</ul>
								</div>
							</li>
						</ul>
						@endif

					@endif
						
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
        @yield('content')
		<!-- END MAIN -->
        @include('admin/footer')
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
    @include('admin/footerjs')
    @yield('footer')
</body>

</html>
