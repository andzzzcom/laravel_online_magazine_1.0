@extends("Admin.incl.layout")

	
	@section("content")
	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			List Writer
			<small>list semua writer</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{url('admin/list_writer_article')}}">Writer</a></li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-xs-12 col-md-8">
			  <div class="table-responsive box">
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="text-center table table-bordered table-hover">
						<thead>
							<tr>
								<th width="5%">No.</th>
								<th width="10%"></th>
								<th width="35%">Nama Writer</th>
								<th width="25%"></th>
								<th width="10%">Role</th>
								<th width="10%">Status</th>
							</tr>
						</thead>
						
						<tbody>
							@php
								$i = 1
							@endphp
							@foreach($list_writer as $writer)
								<tr>
									<td>{{$i}}</td>
									<td>
										<img src="{{asset('assets/images/admin/'.$writer->photo_admin)}}" style="max-width:50px; height:auto">
									</td>
									<td>{{$writer->name_admin}}</td>
									<td>
										<a class="btn btn-default" href="{{url('admin/view_article_writer', $writer->id_admin)}}"><i class="fa fa-eye"> List Article</i> </a>
									</td>
									<td>{{$writer->name_role}}</td>
									<td>
										@if($writer->status_admin == 1)
										   <p class="label bg-green">Active</p>
										@else
											<p class="label bg-red">Not Active</p>
										@endif
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
								<th width="35%">Nama Writer</th>
								<th width="25%"></th>
								<th width="10%">Role</th>
								<th width="10%">Status</th>
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
 

	 <script>
		function reloadStatus(stat, id_article)
		{
			$.ajax({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				method:"POST",
				data:{stat:stat, id_article:id_article},
				url:'{{url("admin/reload_status_headline")}}',
				cache:false,
				success:function(result){
					if(result == 1)
						alert("Sukses Update Menjadi Headline!");
					else
						alert("Gagal Update Menjadi Headline!");
					location.reload();
						
				}
			});
		}
	 </script>
	 @endsection