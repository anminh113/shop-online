<!doctype html>
<html lang="en">

<head>
    @include('admin/head')
    @yield('head')
</head>

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
					<ul class="nav">
						@yield('sidebar')
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
