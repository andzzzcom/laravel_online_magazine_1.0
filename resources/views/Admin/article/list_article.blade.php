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
								<th width="20%">Judul Artikel</th>
								<th width="15%">Created Date</th>
								<th width="15%">Last Updated Date</th>
								<th width="10%">View</th>
								<th width="10%">Status</th>
								<th width="15%"></th>
							</tr>
						</thead>
						
						<tbody>
							@php
								$i = 1
							@endphp
							@foreach($list_article as $article)
								<tr>
									<td>{{$i}}</td>
									<td>
										<img src="{{asset('assets/images/article/'.$article->thumbnail_article)}}" style="max-width:50px; height:auto">
										<br>
										@if($article->status_headline_article == 1)
										   <p class="label bg-green">HEADLINE NEWS</p>
										@endif
									</td>
									<td>{{$article->title_article}}</td>
									<td>{{date('d-F-Y H:i:s', strtotime($article->created_date_article))}}</td>
									<td>{{date('d-F-Y H:i:s', strtotime($article->last_updated_date_article))}}</td>
									<td>{{$article->view_article}}</td>
									<td>
										@if($article->status_article == 1)
										   <p class="label bg-green">Active</p>
										@else
											<p class="label bg-red">Not Active</p>
										@endif
									</td>
									<td>
										<a title="Headline Status" class="btn" onclick="reloadStatus('{{$article->status_headline_article}}', '{{$article->id_article}}')">
											@if($article->status_headline_article == 0)
												<i class="fa fa-arrow-circle-up fa-2x"></i>
											@else
												<i class="fa fa-arrow-circle-down fa-2x"></i>
											@endif
										</a>
										<a href="{{url('admin/edit_article', $article->id_article)}}"><i class="fa fa-edit fa-2x"></i> </a>
										<a href="{{url('admin/delete_article', $article->id_article)}}"><i class="fa fa-trash-o fa-2x"></i> </a>
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
								<th width="20%">Judul Artikel</th>
								<th width="15%">Created Date</th>
								<th width="15%">Last Updated Date</th>
								<th width="10%">View</th>
								<th width="10%">Status</th>
								<th width="15%"></th>
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
						alert("Sukses Update Headline!");
					else
						alert("Gagal Update Menjadi Headline!");
					location.reload();
						
				}
			});
		}
	 </script>
	 @endsection