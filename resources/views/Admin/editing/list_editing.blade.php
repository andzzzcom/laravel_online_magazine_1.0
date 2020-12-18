@extends("Admin.incl.layout")

	
	@section("content")
	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			List Article
			<small>list semua artikel</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{url('admin/list_article')}}">Article</a></li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-xs-12">
			  <div class="table-responsive box">
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="text-center table table-bordered table-hover">
						<thead>
							<tr>
								<th width="5%">No.</th>
								<th width="10%"></th>
								<th width="25%">Judul Artikel</th>
								<th width="15%">Editor Artikel</th>
								<th width="20%">Notes Editing Artikel</th>
								<th width="15%">Created Date</th>
								<th width="15%">Last Updated Date</th>
								<th width="10%">Status</th>
								<th width="10%"></th>
							</tr>
						</thead>
						
						<tbody>
							@php
								$i = 1
							@endphp
							@foreach($list_editing as $editing)
								<tr>
									<td>{{$i}}</td>
									<td><img src="{{asset('assets/images/article/'.$editing->thumbnail_article)}}" style="max-width:50px; height:auto"></td>
									<td>{{$editing->title_article}}</td>
									<td>{{$editing->name_admin}}</td>
									<td>{{$editing->content_notes_editor}}</td>
									<td>{{$editing->created_date_notes_editor}}</td>
									<td>{{$editing->last_updated_date_notes_editor}}</td>
									<td>
										@if($editing->status_article == 1)
										   <p class="label bg-green">Active</p>
										@else
											<p class="label bg-red">Not Active</p>
										@endif
									</td>
									<td>
										<a href="{{url('admin/edit_editing', $editing->article_id_notes_editor)}}"><i class="fa fa-edit fa-2x"></i> </a>
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
								<th width="25%">Judul Artikel</th>
								<th width="15%">Editor Artikel</th>
								<th width="20%">Notes Editing Artikel</th>
								<th width="15%">Created Date</th>
								<th width="15%">Last Updated Date</th>
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