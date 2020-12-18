@extends("Admin.incl.layout")

	
	@section("content")
	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			List Admin
			<small>list semua admin</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{url('admin/list_admin')}}">Admin</a></li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-xs-12">
			  <div class="table-responsive box">
				<div class="box-header">
				  <h3 class="box-title">List Admin</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="text-center table table-bordered table-hover">
						<thead>
							<tr>
								<th width="5%">No.</th>
								<th width="10%"></th>
								<th width="25%">Nama Admin</th>
								<th width="25%">Email Admin</th>
								<th width="15%">Role Admin</th>
								<th width="10%">Status</th>
								<th width="5%"></th>
							</tr>
						</thead>
						
						<tbody>
							@php
								$i = 1
							@endphp
							@foreach($list_admin as $admin)
								<tr>
									<td>{{$i}}</td>
									<td><img src="{{asset('assets/images/admin/'.$admin->photo_admin)}}" style="max-width:50px; height:auto"></td>
									<td>{{$admin->name_admin}}</td>
									<td>{{$admin->email_admin}}</td>
									<td>{{$admin->name_role}}</td>
									<td>
										@if($admin->status_admin == 1)
										   <p class="label bg-green">Active</p>
										@else
											<p class="label bg-red">Not Active</p>
										@endif
									</td>
									<td>
										<a href="{{url('admin/edit_admin', $admin->id_admin)}}" target="_blank"><i class="fa fa-edit fa-2x"></i> </a>
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
								<th width="25%">Nama Admin</th>
								<th width="25%">Email Admin</th>
								<th width="15%">Role Admin</th>
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