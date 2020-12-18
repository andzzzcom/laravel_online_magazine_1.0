@extends("Admin.incl.layout")

	
	@section("content") <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Update Admin Form
			<small>Form Mengubah Admin</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="{{url('admin/list_admin')}}">Admin</a></li>
			<li class="active">Update Admin</li>
		  </ol>
		</section>

		<!-- Main content --> 
		<section class="content">
			<div class="row">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-6">							
							<form action="{{action('Admin\Admin@edit_admin_action')}}" method="post" enctype="multipart/form-data">
							@csrf
								<input type="hidden" name="id_admin" value="{{$admin_detail[0]->id_admin}}">
								<div class="form-group">
								  <label>Name Admin</label>
								  <input required type="text" value="{{$admin_detail[0]->name_admin}}" class="form-control" name="name_admin" placeholder="Insert Admin Name">
								</div>
								
								<div class="form-group">
								  <label>Email Admin</label>
								  <input required type="email" value="{{$admin_detail[0]->email_admin}}" class="form-control" name="email_admin" placeholder="Insert Admin Email">
								</div>
								
								<div class="form-group">
								  <label>Phone Admin</label>
								  <input required type="text" value="{{$admin_detail[0]->phone_admin}}" class="form-control" name="phone_admin" placeholder="Insert Admin Phone">
								</div>
								
								<div class="form-group">
									<label>Photo Admin</label>
									<br>
									<img src="{{asset('assets/images/admin/'.$admin_detail[0]->photo_admin)}}" style="max-width:100px;height:auto">
									<br>
									<label class="ea-file">Choose file
										<input type="file" name="photo_admin" id="uploaded1" class="upload" data-value="uploaded1">
									</label>
								</div>
								
								<div class="form-group">
								  <label>Role Admin</label>
								  <select required class="form-control" name="role_admin">
									@foreach($role_name as $role)
										<option @if($admin_detail[0]->role_admin == $role->id_role) selected @endif class="form-control" value="{{$role->id_role}}">{{$role->name_role}}</option>
									@endforeach
								  </select>
								</div>
								
								<div class="form-group">
								  <label>Created Date Admin</label>
								  <input readonly type="text" value="{{$admin_detail[0]->created_date_admin}}" class="form-control">
								</div>
								
								<div class="form-group">
								  <label>Last Updated Date Admin</label>
								  <input readonly type="text" value="{{$admin_detail[0]->last_updated_date_admin}}" class="form-control">
								</div>
									
								<div class="form-group">
								  <label>Status Admin</label>
								  <select required class="form-control" name="status_admin">
									<option @if($admin_detail[0]->status_admin == 1) selected @endif class="form-control" value="1">Active</option>
									<option @if($admin_detail[0]->status_admin == 0) selected @endif class="form-control" value="0">Not Active</option>
								  </select>
								</div>
								
								<button type="submit" id="submit" class="btn btn-warning">Update</button>
								<a href="{{url('admin/list_admin')}}"><button type="button" class="btn btn-danger">Cancel</button></a>
							</form>
						</div>
					</div>
					  
						 
				</div>
			</div>
		</section>
		<!-- /.content -->
	  </div>
	  <!-- /.content-wrapper -->
	@endsection
 