@extends("Admin.incl.layout")

	
	@section("content")
	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			List Category
			<small>list semua kategori</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{url('admin/list_category')}}">Category</a></li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-xs-12">
			  <div class="table-responsive box">
				<div class="box-header">
				  <h3 class="box-title">List Category</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="text-center table table-bordered table-hover">
						<thead>
							<tr>
								<th width="5%">No.</th>
								<th width="10%"></th>
								<th width="30%">Nama Kategori</th>
								<th width="15%">Created Date</th>
								<th width="20%">Last Updated Date</th>
								<th width="10%">Status</th>
								<th width="10%"></th>
							</tr>
						</thead>
						
						<tbody>
							@php
								$i = 1
							@endphp
							@foreach($list_category as $category)
								<tr>
									<td>{{$i}}</td>
									<td><img src="{{asset('assets/images/category/'.$category->thumbnail_category)}}" style="max-width:50px; height:auto"></td>
									<td>{{$category->name_category}}</td>
									<td>{{$category->created_date_category}}</td>
									<td>{{$category->last_updated_date_category}}</td>
									<td>
										@if($category->status_category == 1)
										   <p class="label bg-green">Active</p>
										@else
											<p class="label bg-red">Not Active</p>
										@endif
									</td>
									<td>
										<a href="{{url('admin/edit_category', $category->id_category)}}" target="_blank"><i class="fa fa-edit fa-2x"></i> </a>
										<a href="{{url('admin/delete_category', $category->id_category)}}" target="_blank"><i class="fa fa-trash-o fa-2x"></i> </a>
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
								<th width="30%">Nama Kategori</th>
								<th width="15%">Created Date</th>
								<th width="20%">Last Updated Date</th>
								<th width="10%">Status</th>
								<th width="10%"></th>
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