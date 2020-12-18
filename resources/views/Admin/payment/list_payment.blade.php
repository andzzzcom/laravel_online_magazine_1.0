@extends("Admin.incl.layout")

	
	@section("content")
	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			List Payment
			<small>list semua payment</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{url('admin/list_payment')}}">Payment</a></li>
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
								<th width="25%">Judul</th>
								<th width="15%">Writer</th>
								<th width="20%">Notes</th>
								<th width="10%">Fee</th>
								<th width="10%">Status Payment</th>
								<th width="10%"></th>
							</tr>
						</thead>
						
						<tbody>
							@php
								$i = 1
							@endphp
							@foreach($list_payment as $payment)
								<tr>
									<td>{{$i}}</td>
									<td>{{$payment->title_article }}</td>
									<td>{{$payment->name_admin }}</td>
									<td>{{$payment->notes_payment }}</td>
									<td>Rp {{ str_replace(",", ".", number_format($payment->fee_level_payment, 0)) }},-</td>
									<td>
										@if($payment->status_payment == 1)
										   <p class="label bg-green">Active</p>
										@else
											<p class="label bg-red">Not Active</p>
										@endif
									</td>
									<td>
										<a href="{{url('admin/edit_article', $payment->id_payment)}}" target="_blank"><i class="fa fa-edit fa-2x"></i> </a>
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
								<th width="25%">Judul</th>
								<th width="15%">Writer</th>
								<th width="20%">Notes</th>
								<th width="10%">Fee</th>
								<th width="10%">Status Payment</th>
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