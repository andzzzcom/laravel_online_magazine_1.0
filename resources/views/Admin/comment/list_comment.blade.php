@extends("Admin.incl.layout")

	
	@section("content")
	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			List Comment
			<small>list semua komentar</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{url('admin/list_comment')}}">Comment</a></li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-xs-12">
			  <div class="table-responsive box">
				<div class="box-header">
				  <h3 class="box-title">List Comment</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="text-center table table-bordered table-hover">
						<thead>
							<tr>
								<th width="5%">No.</th>
								<th width="20%">Article</th>
								<th width="10%">Sender Email</th>
								<th width="30%">Comment Title</th>
								<th width="15%">Created Date</th>
								<th width="10%">Status</th>
								<th width="10%"></th>
							</tr>
						</thead>
						
						<tbody>
							@php
								$i = 1
							@endphp
							@foreach($list_comment as $comment)
								<tr>
									<td>{{$i}}</td>
									<td><a target="_blank" href="{{url('admin/edit_article', $comment->article_id)}}">{{$comment->title_article}}</a></td>
									<td>{{$comment->sender_email_comment}}</td>
									<td>{{$comment->title_comment}}</td>
									<td>{{$comment->created_date_comment}}</td>
									<td>
										@if($comment->status_comment == 1)
										   <p class="label bg-green">Active</p>
										@else
											<p class="label bg-red">Not Active</p>
										@endif
										<a class="btn" onclick="reloadStatus('{{$comment->status_comment}}', '{{$comment->id_comment}}')"><i class="fa fa-refresh"></i></a>
									</td>
									<td>
										<a href="{{url('admin/view_comment', $comment->id_comment)}}" target="_blank"><i class="fa fa-eye fa-2x"></i> </a>
										<a href="{{url('admin/delete_comment', $comment->id_comment)}}" target="_blank"><i class="fa fa-trash-o fa-2x"></i> </a>
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
								<th width="20%">Article</th>
								<th width="10%">Sender Email</th>
								<th width="30%">Comment Title</th>
								<th width="15%">Created Date</th>
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
	 
	 <script>
		function reloadStatus(stat, id_comment)
		{
			$.ajax({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				method:"POST",
				data:{stat:stat, id_comment:id_comment},
				url:'{{url("admin/reload_status_comment")}}',
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