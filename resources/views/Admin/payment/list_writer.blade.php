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
			<li class="active"><a href="{{url('admin/list_writer')}}">Writer</a></li>
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
								<th width="15%">Writer's Name</th>
								<th width="20%">Email</th>
								<th width="10%">Total Paid</th>
								<th width="10%">Total Unpaid</th>
								<th width="10%"></th>
							</tr>
						</thead>
						
						<tbody>
							@php
								$i = 1
							@endphp
							@foreach($list_writer as $writer)
								<tr>
									<td>{{$i}}</td>
									<td><img src="{{asset('assets/images/admin/'.$writer->photo_admin)}}" style="max-width:50px; height:auto"></td>
									<td>{{$writer->name_admin }}</td>
									<td>{{$writer->email_admin }}</td>
									<td>
										@foreach($list_paid as $p)
											@if($p["id"] == $writer->id_admin)
												Rp {{ str_replace(",", ".", number_format($p["sum"])) }},-
											@endif
										@endforeach
									</td>
									<td>
										@foreach($list_unpaid as $u)
											@if($u["id"] == $writer->id_admin)
												Rp {{ str_replace(",", ".", number_format($u["sum"])) }},-
											@endif
										@endforeach
									</td>
									<td>
										<a href="{{url('admin/writer_article', $writer->id_admin)}}" target="_blank"><i class="fa fa-edit fa-2x"></i> </a>
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
								<th width="15%">Writer's Name</th>
								<th width="20%">Email</th>
								<th width="10%">Total Paid</th>
								<th width="10%">Total Unpaid</th>
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