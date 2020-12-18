@extends("Admin.incl.layout")

	
	@section("content")
	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			List Subcategory
			<small>list semua subkategori</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="{{url('admin/list_category')}}">Category</a></li>
			<li class="active"><a href="{{url('admin/list_sub_category')}}">Subcategory</a></li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-xs-12">
			  <div class="table-responsive box">
				<div class="box-header">
				  <h3 class="box-title">List Subcategory</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="text-center table table-bordered table-hover">
						<thead>
							<tr>
								<th width="5%">No.</th>
								<th width="10%"></th>
								<th width="15%">Kategori</th>
								<th width="15%">Subkategori</th>
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
							@foreach($list_sub_category as $sub_category)
								<tr>
									<td>{{$i}}</td>
									<td><img src="{{asset('assets/images/category/'.$sub_category->thumbnail_sub_category)}}" style="max-width:50px; height:auto"></td>
									<td>{{$sub_category->name_category}}</td>
									<td>{{$sub_category->name_sub_category}}</td>
									<td>{{$sub_category->created_date_sub_category}}</td>
									<td>{{$sub_category->last_updated_date_sub_category}}</td>
									<td>
										@if($sub_category->status_sub_category == 1)
										   <p class="label bg-green">Active</p>
										@else
											<p class="label bg-red">Not Active</p>
										@endif
									</td>
									<td>
										<a href="{{url('admin/edit_sub_category', $sub_category->id_sub_category)}}" target="_blank"><i class="fa fa-edit fa-2x"></i> </a>
										<a href="{{url('admin/delete_sub_category', $sub_category->id_sub_category)}}" target="_blank"><i class="fa fa-trash-o fa-2x"></i> </a>
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
								<th width="15%">Kategori</th>
								<th width="15%">Subkategori</th>
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