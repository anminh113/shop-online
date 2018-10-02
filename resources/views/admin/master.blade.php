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

					{{-- Admin --}}
					<ul class="nav">
						<li><a href="{{route('trang-chu-admin-he-thong')}}" id="admin" class=""><i class="lnr lnr-home"></i> <span>Trang chủ</span></a></li>
						<li><a href="{{route('danh-sach-shop-he-thong')}}" id="category-admin-shop" class=""><i class="lnr lnr-code"></i> <span>Danh sách gian hàng</span></a></li>
						<li><a href="{{route('them-danh-muc-admin')}}" id="add-category-admin" class=""><i class="lnr lnr-code"></i> <span>Thêm danh mục	</span></a></li>
					</ul>


					{{-- Người bán hàng --}}
					<ul class="nav">
						<li><a href="{{route('trang-chu-admin')}}" id="index-admin" class=""><i class="lnr lnr-home"></i> <span>Trang chủ</span></a></li>
						<li><a href="{{route('danh-muc-admin')}}" id="category-admin" class=""><i class="lnr lnr-code"></i> <span>Danh mục</span></a></li>
						<li><a href="{{route('san-pham-admin')}}" id="product-admin" class=""><i class="lnr lnr-chart-bars"></i> <span>Sản phẩm</span></a></li>
						<li><a href="{{route('xem-danh-gia')}}" id="review-admin" class=""><i class="lnr lnr-chart-bars"></i> <span>Nhận xét & đánh giá</span></a></li>
						<li><a href="{{route('discount-admin')}}" id="discount-admin" class=""><i class="lnr lnr-chart-bars"></i> <span>Sự kiện giảm giá </span></a></li>
					</ul>


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
