<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>CybetZone - Admin</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="source/admin/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="source/admin/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="source/admin/assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="source/admin/assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="source/admin/assets/css/demo.css">
	<link rel="stylesheet" href="source/admin/assets/css/index.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="source/admin/assets/img/icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="source/admin/assets/img/icon.png">
	<style type="text/css">
		.auth-box .left:before{
			     height: auto; 
		}
	</style>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box">
				
					<div class="left">
						<div class="content">
							<div class="header">
									@if(Session::has('flag'))
										<div class="alert alert-{{Session::get('flag')}}">
											{{Session::get('message')}}
										</div>
									@endif	
								<div class="logo text-center"><img src="source/admin/assets/img/primary_transparent.png" alt="CyberZone Logo"></div>
								<p class="lead">Login to your account</p>
							</div>
							<form class="form-auth-small" action="{{route('post-login-admin')}}" method="POST">
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input type="text" class="form-control" id="signin-email" name="email" value="" placeholder="Email">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" id="signin-password" name="password" value="" placeholder="Password">
								</div>
							
								<button type="submit" class="btn btn-lg btn-block" style="background-color:#028496; color: #fff ">LOGIN</button>
								{{ csrf_field() }}
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Chào mừng đến với CyberZone!</h1>
							<!-- <p>by The Develovers</p> -->
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
