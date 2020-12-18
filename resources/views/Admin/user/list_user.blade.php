@extends("Admin.incl.layout")

	
	@section("content")
	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			List User
			<small>list semua user</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{url('user/list_user')}}">User</a></li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-xs-12">
			  <div class="table-responsive box">
				<div class="box-header">
				  <h3 class="box-title">List User</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="text-center table table-bordered table-hover">
						<thead>
							<tr>
								<th width="5%">No.</th>
								<th width="10%"></th>
								<th width="25%">Nama User</th>
								<th width="25%">Email User</th>
								<th width="15%">Role User</th>
								<th width="10%">Status</th>
								<th width="5%"></th>
							</tr>
						</thead>
						
						<tbody>
							@php
								$i = 1
							@endphp
							@foreach($list_user as $user)
								<tr>
									<td>{{$i}}</td>
									<td><img src="{{asset('assets/images/user/'.$user->photo_user)}}" style="max-width:50px; height:auto"></td>
									<td>{{$user->name_user}}</td>
									<td>{{$user->email_user}}</td>
									<td>{{$user->name_role}}</td>
									<td>
										@if($user->status_user == 1)
										   <p class="label bg-green">Active</p>
										@else
											<p class="label bg-red">Not Active</p>
										@endif
									</td>
									<td>
										<a href="{{url('admin/edit_user', $user->id_user)}}" target="_blank"><i class="fa fa-edit fa-2x"></i> </a>
									</td>
								</tr>
							@php
								$i = $i + 1
							@endphp
							@endforeach
						</tbody>
						
						<tfoot>
							<tr>
								<th width="5%">No.</th>
								<th width="10%"></th>
								<th width="25%">Nama User</th>
								<th width="25%">Email User</th>
								<th width="15%">Role User</th>
								<th width="10%">Status</th>
								<th width="5%"></th>
							</tr>
						</tfoot>
					</table>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  </div>
	  <!-- /.content-wrapper -->
 

	 @endsection