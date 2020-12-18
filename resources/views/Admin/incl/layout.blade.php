@section("header")
<!DOCTYPE html>
<html>
@show

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="csrf-token" content="{{ $general_settings['csrf_admin'] }}">
		<title>@yield("title_web", $general_settings['title_admin_panel'] )</title>
	  
		@section("header_settings")
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		
		<link rel="stylesheet" href="{{ asset('assets_admin/theme1/bootstrap/css/bootstrap.min.css') }}">
		<!-- Font Awesome -->
	  
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') }}">
		<!-- DataTables -->
		<link rel="stylesheet" href="{{ asset('assets_admin/theme1/plugins/datatables/dataTables.bootstrap.css') }}">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{ asset('assets_admin/theme1/dist/css/AdminLTE.min.css') }}">
		<!-- AdminLTE Skins. Choose a skin from the css/skins
		   folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="{{ asset('assets_admin/theme1/dist/css/skins/_all-skins.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets_admin/theme1/plugins/datepicker/datepicker3.css') }}">
		<link rel="stylesheet" href="{{ asset('assets_admin/theme1/plugins/timepicker/bootstrap-timepicker.min.css') }}">
		<link rel="icon" href="{{ asset('assets/theme1/images/settings/'.$general_settings['favicon']) }}" type="image/x-icon" />
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
		<script src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=aepwvxvuqafyagriw3ybyux2r86iote7lv9agkg1rqxl24y2'></script>
		@show
		
	</head>
	
	<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		@include("Admin.incl.header")
		@include("Admin.incl.sidebar")
		@include("Admin.incl.content")
		@include("Admin.incl.footer")
	  
		<div class="control-sidebar-bg"></div>
	</div>

	
	@section("footer")
	<!-- jQuery 2.2.3 -->
	<!-- Bootstrap 3.3.6 -->
	<script src="{{ asset('assets_admin/theme1/bootstrap/js/bootstrap.min.js') }}"></script>
	<!-- DataTables -->
	<script src="{{ asset('assets_admin/theme1/plugins/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets_admin/theme1/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="{{ asset('assets_admin/theme1/dist/js/demo.js') }}"></script>
	
	<!-- datepicker -->
	<script src="{{ asset('assets_admin/theme1/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
	<script src="{{ asset('assets_admin/theme1/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
	<script src="{{ asset('assets_admin/theme1/plugins/datepicker/bootstrap-timepicker.js') }}"></script>
	<!-- Bootstrap WYSIHTML5 -->
	<script src="{{ asset('assets_admin/theme1/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
	<!-- Slimscroll -->
	<script src="{{ asset('assets_admin/theme1/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
	<!-- FastClick -->
	<script src="{{ asset('assets_admin/theme1/plugins/fastclick/fastclick.js') }}"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('assets_admin/theme1/dist/js/app.min.js') }}"></script>
	<!-- page script -->
	<script>
	
	  $(function () {
		$("#example1").DataTable();
		$('#example2').DataTable({
		  "paging": true,
		  "lengthChange": false,
		  "searching": false,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});
	  });
	</script>
	
	<script type="text/javascript" src="{{ asset('assets_admin/theme1/bootstrap/js/bootstrap-filestyle.min.js') }}"> </script>
	
	<!-- Configure TinyMCE -->
	<script type="text/javascript">
		tinyMCE.init({
				selector: '#textarea1, #textarea2',
		})
	</script>
	@show
	
	</body>
</html>
