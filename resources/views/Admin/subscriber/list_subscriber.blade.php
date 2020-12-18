@extends("Admin.incl.layout")

	
	@section("content")
	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			List Subscriber
			<small>list semua subscriber</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{url('admin/list_subscriber')}}">Subscriber</a></li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-xs-12">
			  <div class="table-responsive box">
				<div class="box-header">
				  <h3 class="box-title">List Subscriber</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="text-center table table-bordered table-hover">
						<thead>
							<tr>
								<th width="5%">No.</th>
								<th width="35%">Email Subscriber</th>
								<th width="20%">Created Date</th>
								<th width="20%">Last Updated Date</th>
								<th width="20%">Status</th>
							</tr>
						</thead>
						
						<tbody>
							@php
								$i = 1
							@endphp
							@foreach($list_subscriber as $subs)
								<tr>
									<td>{{$i}}</td>
									<td>{{$subs->email_subscriber}}</td>
									<td>{{$subs->created_date_subscriber}}</td>
									<td>{{$subs->last_updated_date_subscriber}}</td>
									<td>
										@if($subs->status_subscriber == 1)
										   <p class="label bg-green">Active</p>
										@else
											<p class="label bg-red">Not Active</p>
										@endif
										<a class="btn" onclick="reloadStatus('{{$subs->status_subscriber}}', '{{$subs->id_subscriber}}')"><i class="fa fa-refresh"></i></a>
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
								<th width="35%">Email Subscriber</th>
								<th width="20%">Created Date</th>
								<th width="20%">Last Updated Date</th>
								<th width="20%">Status</th>
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
	 
	 <script>
		function reloadStatus(stat, id_subscriber)
		{
			$.ajax({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				method:"POST",
				data:{stat:stat, id_subscriber:id_subscriber},
				url:'{{url("admin/reload_status_subscriber")}}',
				cache:false,
				success:function(result){
					if(result == 1)
						alert("Sukses Update!");
					else
						alert("Gagal Update!");
					location.reload();
						
				}
			});
		}
	 </script>