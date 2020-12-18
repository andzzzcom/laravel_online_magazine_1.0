@extends("Admin.incl.layout")

	
	@section("content")
	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			List Article Writer
			<small>list semua artikel penulis</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{url('admin/list_writer')}}">List Writer</a></li>
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
								<th width="30%">Judul</th>
								<th width="15%">Fee</th>
								<th width="15%">Created Date</th>
								<th width="15%">Status Payment</th>
								<th width="10%"></th>
							</tr>
						</thead>
						
						<tbody>
							@php
								$i = 1
							@endphp
							@foreach($article_writer as $article)
								<tr>
									<td>{{$i}}</td>
									<td><img src="{{asset('assets/images/article/'.$article->thumbnail_article)}}" style="max-width:50px; height:auto"></td>
									<td><a href="{{url('admin/edit_article/'.$article->id_article)}}">{{$article->title_article}}</a></td>
									<td>Rp {{ str_replace(",", ".", number_format($article->fee_level_payment, 0)) }},-</td>
									<td>{{$article->created_date_article}}</td>
									<td>
										@if($article->status_payment == 1)
										   <p class="label bg-green">Paid</p>
										@else
											<p class="label bg-red">Not Paid</p>
										@endif
									</td>
									
									<td>
										<a href="{{url('admin/edit_article', $article->id_article)}}" target="_blank"><i class="fa fa-edit fa-2x"></i> </a>
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
								<th width="30%">Judul</th>
								<th width="15%">Fee</th>
								<th width="15%">Created Date</th>
								<th width="15%">Status Payment</th>
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