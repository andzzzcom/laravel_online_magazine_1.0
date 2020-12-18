@section("header")
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@show

    <head>
		<title>Admin Panel | @yield("title", "Login")</title>
		
		@section("header_settings")
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		<link rel="stylesheet" type="text/css" href="{{ asset('assets_admin/theme1/bootstrap/css/bootstrap.min.css') }}" >
		<link rel="stylesheet" type="text/css" href="{{ asset('assets_admin/theme1/dist/css/AdminLTE.min.css') }}" >
		<link rel="stylesheet" type="text/css" href="{{ asset('assets_admin/theme1/plugins/iCheck/square/blue.css') }}" >
        
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		@show
		
    </head>
	
	@section("body")
	<body class="hold-transition login-page">
		<div class="login-box">
			<div class="login-logo">
				<a href="{{url('tes')}}"><b>Admin Panel</b><br></a>
			</div>
			<!-- /.login-logo -->
			<div class="login-box-body">
				<p class="login-box-msg">Sign in to Admin Panel</p>

			<form action="{{url('admin/login_action')}}" method="post"> 
				@csrf
				<div class="form-group has-feedback">
					<input type="email" class="form-control" placeholder="Email" name="email">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Password" name="password">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8">
						<div class="checkbox icheck">
							<label>
							<input type="checkbox"> Remember Me
							</label>
						</div>
					</div>
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
					</div>
				</div>
			</form>


			</div>
		</div>

    </body>
	@show
	
	@section("footer")
	<!-- jQuery 2.2.3 -->
	<script src="{{ asset('assets_admin/theme1/plugins/jQuery/jquery-2.2.3.min.js') }}" ></script>
	<script src="{{ asset('assets_admin/theme1/bootstrap/css/bootstrap.min.js') }}" ></script>
	<script src="{{ asset('assets_admin/theme1/plugins/iCheck/icheck.min.js') }}" ></script>
	<script>
	  $(function () {
		$('input').iCheck({
		  checkboxClass: 'icheckbox_square-blue',
		  radioClass: 'iradio_square-blue',
		  increaseArea: '20%' // optional
		});
	  });
	</script>
	@show

@section("endfooter")
</html>
@show
