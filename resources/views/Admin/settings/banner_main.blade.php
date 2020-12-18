@extends("Admin.incl.layout")


	@section("content")
	 <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Edit Banner Settings
			<small>Form Mengubah Banner</small>
		  </h1>
			  <ol class="breadcrumb">
				<li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active"><a href="{{url('admin/general_settings')}}">General Settings</a></li>
			  </ol>
		</section>

		<!-- Main content --> 
		<section class="content">
			<div class="row">
				<div class="table-responsive box">
					<!-- /.box-header -->
					<form action="{{action('Admin\Settings@edit_banner_main_action')}}" method="post" enctype="multipart/form-data">
						@csrf	
						<div class="box-body">
							<input type="hidden" name="id_settings" value="{{$general_settings_data[0]->id_settings}}">
							<div class="col-md-6">
								<h3>Banner Settings</h3>
								<div class="form-group">
								  <label>Banner Utama (jpg only)</label>
								  <br>
								  <img src="{{asset('assets/theme1/images/settings/'.$general_settings_data[0]->banner_main)}}" width="100px" height="50px">
								  <br>
								  <label class="ea-file">Choose file
									<input type="file" name="banner_main" id="uploaded2" class="upload" data-value="uploaded2">
								  </label>
								</div>
								
								<button type="submit" id="submit" class="btn btn-warning">Edit</button>
								<a href="{{url('admin/general_settings_data')}}"><button type="button" class="btn btn-danger">Cancel</button></a>
							 
							</div>
						</div>
					</form>
					  
						 
				</div>
			</div>
		</section>
		<!-- /.content -->
	  </div>
	  <!-- /.content-wrapper -->
	 @endsection
	 