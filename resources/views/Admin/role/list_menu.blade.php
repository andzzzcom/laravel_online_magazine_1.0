@extends("Admin.incl.layout")

	
	@section("content")
	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			List Menu
			<small>list semua menu</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{url('admin/list_menu')}}">Menu</a></li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
		  
			<div class="col-xs-12 col-md-6">
			  <div class="table-responsive box">
				<div class="box-header">
					<button onclick="addMenu()" data-toggle="modal" data-target="#add-menu" class="btn btn-default"><i class="fa fa-plus-circle"></i> Menu</button>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="text-center table table-bordered table-hover">
						<thead>
							<tr>
								<th width="5%">No.</th>
								<th width="25%">Nama Menu</th>
								<th width="15%">Status</th>
								<th width="25%"></th>
							</tr>
						</thead>
						
						<tbody>
							@php
								$i = 1
							@endphp
							@foreach($list_menu as $menu)
								<tr>
									<td>{{$i}}</td>
									<td>{{$menu->name_menu}}</td>
									<td>
										@if($menu->status_menu == 1)
										   <p class="label bg-green">Active</p>
										@else
											<p class="label bg-red">Not Active</p>
										@endif
									</td>
									<td>
										<a style="cursor:pointer" data-toggle="modal" data-target="#edit-menu" onclick="editMenu('{{$menu->id_menu}}')"><i class="fa fa-edit fa-2x"></i> </a>
										<a style="cursor:pointer" onclick="deleteMenu('{{$menu->id_menu}}')"><i class="fa fa-trash fa-2x"></i> </a>
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
								<th width="25%">Nama Menu</th>
								<th width="15%">Status</th>
								<th width="25%"></th>
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
 
		<!-- Modal -->
		<div id="add-menu" class="text-center modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add New Menu</h4>
			  </div>
			  <form action="{{url('/admin/add_new_menu')}}" method="post" class="form-inline">
				@csrf
				  <div class="modal-body">
					<div class="form-group">
						<input required name="menu_name" type="text" class="form-control" placeholder="Insert Menu Name">
					</div>
					<div class="form-group">
						<select name="status_menu" class="form-control">
							<option value="1">Active</option>
							<option value="0">Not Active</option>
						</select>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success">
							<i class="fa fa-plus-circle"></i> Add
						</button>
					</div>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
			  </form>
			</div>

		  </div>
		</div>
		
		<!-- Modal -->
		<div id="edit-menu" class="text-center modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Update Menu</h4>
			  </div>
			  <form action="{{url('/admin/edit_menu')}}" method="post" class="form-inline">
				@csrf
				  <div class="modal-body">
					<input required type="hidden" name="id_menu" id="menu_id">
					<div class="form-group">
						<input required name="name_menu" type="text" id="menu_name" class="form-control" placeholder="Insert Menu Name">
					</div>
					<div class="form-group">
						<select id="status_menu" name="status_menu" class="form-control">
							<option value="1">Active</option>
							<option value="0">Not Active</option>
						</select>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success">
							<i class="fa fa-plus-circle"></i> Edit
						</button>
					</div>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
			  </form>
			</div>

		  </div>
		</div>
		
		<script>
			function deleteMenu(idMenu)
			{
				var c = confirm("Are you sure remove this menu?");
				if(!c)
					return false;
				
				$.ajax({
					headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					method:'POST',
					data: {id_menu:idMenu},
					cache:false,
					url:'{{url("/admin/delete_menu")}}',
					success:function(result)
					{
						if(result == 1)
						{
							alert("Successfully Removed!");
						}
						else
						{
							alert("Failed Removed!");
						}
						location.reload();
					}
				});
			}
			
			function editMenu(idMenu)
			{				
				$.ajax({
					headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					method:'POST',
					data: {id_menu:idMenu},
					cache:false,
					url:'{{url("/admin/get_data_menu")}}',
					success:function(result)
					{
						var result = JSON.parse(result);
						var id_menu = result[0].id_menu;
						var name_menu = result[0].name_menu;
						var status_menu = result[0].status_menu;
						$("#menu_id").val(id_menu);
						$("#menu_name").val(name_menu);
						$("#status_menu").val(status_menu);
					}
				});
			}
		</script>
		
	 @endsection