@extends("Admin.incl.layout")


	@section("content")
	 <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Edit General Settings
			<small>Form Mengubah Settings</small>
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
					<form action="{{action('Admin\Settings@edit_general_settings_action')}}" method="post" enctype="multipart/form-data">
						@csrf	
						<div class="box-body">
							<input type="hidden" name="id_settings" value="{{$general_settings_data[0]->id_settings}}">
							<div class="col-md-6">
								<h3>Title Settings</h3>
								<div class="form-group">
								  <label>Title Web</label>
								  <input maxlength="50" value="{{$general_settings_data[0]->title_web}}" required type="text" class="form-control" name="title_web" placeholder="Masukkan Title Web">
								</div>
								
								<div class="form-group">
								  <label>Subtitle Web</label>
								  <input maxlength="50" value="{{$general_settings_data[0]->subtitle_web}}" required type="text" class="form-control" name="subtitle_web" placeholder="Masukkan Subtitle Web">
								</div>
								
								<div class="form-group">
								  <label>Title Menu Admin Panel</label>
								  <input maxlength="50" value="{{$general_settings_data[0]->title_admin_panel}}" required type="text" class="form-control" name="title_admin_panel" placeholder="Masukkan Title Admin Menu">
								</div>
								
								<div class="form-group">
								  <label>Title Menu Admin Panel Minimize</label>
								  <input maxlength="5" value="{{$general_settings_data[0]->title_admin_panel_minimize}}" required type="text" class="form-control" name="title_admin_panel_minimize" placeholder="Masukkan Title Admin Minimize">
								</div>
								
								<br>
								<h3>Social Media Settings</h3>
								<div class="form-group">
								  <label>Url Facebook (with http:// or https://)</label>
								  <input value="{{$general_settings_data[0]->url_facebook}}" required type="text" class="form-control" name="url_facebook" placeholder="Masukkan Url Facebook">
								</div>
								
								<div class="form-group">
								  <label>Url Twitter (with http:// or https://)</label>
								  <input value="{{$general_settings_data[0]->url_twitter}}" required type="text" class="form-control" name="url_twitter" placeholder="Masukkan Url Twitter">
								</div>
								
								<div class="form-group">
								  <label>Url Instagram (with http:// or https://)</label>
								  <input value="{{$general_settings_data[0]->url_instagram}}" required type="text" class="form-control" name="url_instagram" placeholder="Masukkan Url Instagram">
								</div>
							</div>
							
							<div class="col-md-6">
								<h3>Logo Settings</h3>
								<div class="form-group">
								  <label>Logo Website</label>
								  <br>
								  <img src="{{asset('assets/theme1/images/settings/'.$general_settings_data[0]->logo_web)}}" width="100px" height="50px">
								  <br>
								  <label class="ea-file">Choose file
									<input type="file" name="logo_web" id="uploaded2" class="upload" data-value="uploaded2">
								  </label>
								</div>
								
								<div class="form-group">
								  <label>Fav Icon</label>
								  <br>
								  <img src="{{asset('assets/theme1/images/settings/'.$general_settings_data[0]->fav_icon)}}" width="30px" height="30px">
								  <br>
								  <label class="ea-file">Choose file
									<input type="file" name="fav_icon" id="uploaded1" class="upload" data-value="uploaded1">
								  </label>
								</div>
								<br>
								
								<h3>SEO Settings</h3>
								<div class="form-group">
								  <label>Meta Title</label>
								  <input maxlength="100" value="{{$general_settings_data[0]->meta_title}}" required type="text" class="form-control" name="meta_title" placeholder="Masukkan Meta Title">
								</div>
								
								<div class="form-group">
								  <label>Meta Description</label>
								  <input maxlength="1000" value="{{$general_settings_data[0]->meta_description}}" required type="text" class="form-control" name="meta_description" placeholder="Masukkan Meta Description">
								</div>
								
								<div class="form-group">
								  <label>Meta Keywords</label>
								  <input maxlength="1000" value="{{$general_settings_data[0]->meta_keywords}}" required type="text" class="form-control" name="meta_keywords" placeholder="Masukkan Meta Keywords">
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
	 