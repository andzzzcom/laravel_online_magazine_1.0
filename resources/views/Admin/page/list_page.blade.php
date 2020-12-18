@extends("Admin.incl.layout")

	
	@section("content")
	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			List Custom Pages
			<small>list semua custom page</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{url('admin/list_pages')}}">List of Custom Pages</a></li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-xs-12">
			  <div class="table-responsive box">
				<div class="box-header">
				  <h3 class="box-title">List Custom Pages</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="text-center table table-bordered table-hover">
						<thead>
							<tr>
								<th width="5%">No.</th>
								<th width="20%">Name Page</th>
								<th width="20%">Slug Page</th>
								<th width="20%">Created Date Page</th>
								<th width="20%">Last Updated Date Page</th>
								<th width="10%">Status</th>
								<th width="5%"></th>
							</tr>
						</thead>
						
						<tbody>
							@php
								$i = 1
							@endphp
							@foreach($list_page as $page)
								<tr>
									<td>{{$i}}</td>
									<td>{{$page->name_page}}</td>
									<td>{{$page->slug_page}}</td>
									<td>{{$page->created_date_page}}</td>
									<td>{{$page->last_updated_date_page}}</td>
									<td>
										@if($page->status_page == 1)
										   <p class="label bg-green">Active</p>
										@else
											<p class="label bg-red">Not Active</p>
										@endif
									</td>
									<td>
										<a href="{{url('admin/edit_page', $page->id_page)}}"><i class="fa fa-edit fa-2x"></i> </a>
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
								<th width="20%">Name Page</th>
								<th width="20%">Slug Page</th>
								<th width="20%">Created Date Page</th>
								<th width="20%">Last Updated Date Page</th>
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