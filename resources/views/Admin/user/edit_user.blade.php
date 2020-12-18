@extends("Admin.incl.layout")

	
	@section("content") <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Update User Form
			<small>Form Mengubah User</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="{{url('user/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="{{url('user/list_user')}}">User</a></li>
			<li class="active">Update User</li>
		  </ol>
		</section>

		<!-- Main content --> 
		<section class="content">
			<div class="row">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-6">							
							<form action="{{action('Admin\User@edit_user_action')}}" method="post" enctype="multipart/form-data">
							@csrf
								<input type="hidden" name="id_user" value="{{$user_detail[0]->id_user}}">
								<div class="form-group">
								  <label>Name User</label>
								  <input required type="text" value="{{$user_detail[0]->name_user}}" class="form-control" name="name_user" placeholder="Insert Admin Name">
								</div>
								
								<div class="form-group">
								  <label>Email User</label>
								  <input required type="email" value="{{$user_detail[0]->email_user}}" class="form-control" name="email_user" placeholder="Insert Admin Email">
								</div>
								
								<div class="form-group">
								  <label>Phone User</label>
								  <input required type="text" value="{{$user_detail[0]->phone_user}}" class="form-control" name="phone_user" placeholder="Insert Admin Phone">
								</div>
								
								<div class="form-group">
									<label>Photo User</label>
									<br>
									<img src="{{asset('assets/images/user/'.$user_detail[0]->photo_user)}}" style="max-width:100px;height:auto">
									<br>
									<label class="ea-file">Choose file
										<input type="file" name="photo_user" id="uploaded1" class="upload" data-value="uploaded1">
									</label>
								</div>
								
								<div class="form-group">
								  <label>Role User</label>
								  <select required class="form-control" name="role_user">
									@foreach($role_name as $role)
										<option @if($user_detail[0]->role_user == $role->id_role) selected @endif class="form-control" value="{{$role->id_role}}">{{$role->name_role}}</option>
									@endforeach
								  </select>
								</div>
								
								<div class="form-group">
								  <label>Created Date User</label>
								  <input readonly type="text" value="{{$user_detail[0]->created_date_user}}" class="form-control">
								</div>
								
								<div class="form-group">
								  <label>Last Updated Date User</label>
								  <input readonly type="text" value="{{$user_detail[0]->last_updated_date_user}}" class="form-control">
								</div>
									
								<div class="form-group">
								  <label>Status User</label>
								  <select required class="form-control" name="status_user">
									<option @if($user_detail[0]->status_user == 1) selected @endif class="form-control" value="1">Active</option>
									<option @if($user_detail[0]->status_user == 0) selected @endif class="form-control" value="0">Not Active</option>
								  </select>
								</div>
								
								<button type="submit" id="submit" class="btn btn-warning">Update</button>
								<a href="{{url('user/list_u')}}ser"><button type="button" class="btn btn-danger">Cancel</button></a>
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
 