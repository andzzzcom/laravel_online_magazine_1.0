@extends("Admin.incl.layout")

	
	@section("content")
	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			List Role
			<small>list semua role</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{url('admin/list_role')}}">Role</a></li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
		  
			<div class="col-xs-12 col-md-6">
			  <div class="table-responsive box">
				<div class="box-header">
					<button data-toggle="modal" data-target="#add-role" class="btn btn-default"><i class="fa fa-plus-circle"></i> Role</button>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="text-center table table-bordered table-hover">
						<thead>
							<tr>
								<th width="5%">No.</th>
								<th width="25%">Nama Role</th>
								<th width="15%">Status</th>
								<th width="25%"></th>
							</tr>
						</thead>
						
						<tbody>
							@php
								$i = 1
							@endphp
							@foreach($list_role as $role)
								<tr>
									<td>{{$i}}</td>
									<td>{{$role->name_role}}</td>
									<td>
										@if($role->status_role == 1)
										   <p class="label bg-green">Active</p>
										@else
											<p class="label bg-red">Not Active</p>
										@endif
									</td>
									<td>
										<a onclick="editRoleName('{{$role->id_role}}')" style="cursor:pointer" data-toggle="modal" data-target="#edit-role"><i class="fa fa-edit fa-2x"></i> </a>
										<a onclick="editRole('{{$role->id_role}}')" style="cursor:pointer" data-toggle="modal" data-target="#myModal"><i class="fa fa-user fa-2x"></i> </a>
										<a style="cursor:pointer" onclick="deleteRole('{{$role->id_role}}')"><i class="fa fa-trash fa-2x"></i> </a>
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
								<th width="25%">Nama Role</th>
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
		<div id="add-role" class="text-center modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add New Role</h4>
			  </div>
			  <form action="{{url('/admin/add_new_role')}}" method="post" class="form-inline">
				@csrf
				  <div class="modal-body">
					<div class="form-group">
						<input required name="name_role" type="text" class="form-control" placeholder="Insert Name Role">
					</div>
					<div class="form-group">
						<select name="status_role" class="form-control">
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
		<div id="edit-role" class="text-center modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Update Role</h4>
			  </div>
			  <form action="{{url('/admin/edit_role_name_action')}}" method="post" class="form-inline">
				@csrf
				  <div class="modal-body">
					<input required type="hidden" name="id_role" id="id_role">
					<div class="form-group">
						<input required name="name_role" id="name_role" type="text" class="form-control" placeholder="Insert Name Role">
					</div>
					<div class="form-group">
						<select id="status_role" name="status_role" class="form-control">
							<option value="1">Active</option>
							<option value="0">Not Active</option>
						</select>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success">
							<i class="fa fa-plus-circle"></i> Update
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
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Role Permissions</h4>
			  </div>
			  <div class="modal-body">
				<p>List Menu for this Role:</p>
			  </div>
				<div id="PermissionList" style="padding:25px;padding-top:5px"></div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  </div>
			</div>

		  </div>
		</div>
		
		
		<script>
			function deleteRole(idRole)
			{
				var c = confirm("Are you sure remove this role?");
				if(!c)
					return false;
				
				$.ajax({
					headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					method:'POST',
					data: {id_role:idRole},
					cache:false,
					url:'{{url("/admin/delete_role")}}',
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
			
			function editRole(idRole)
			{
				$("#PermissionList").empty();
				$.ajax({
					headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					method:'POST',
					data: {id_role:idRole},
					cache:false,
					url:'{{url("/admin/get_role_menu")}}',
					success:function(result)
					{
						var results = result.split("-----");
						var data = results[0];
						var perm = results[1];
						
						data = JSON.parse(data);
						perm = JSON.parse(perm);
						
						//alert(data.length);
						for(var i = 0; i<data.length; i++)
						{					
							var bool = 0;
							for(var j = 0; j<perm.length; j++)
							{
								if(perm[j].menu_id == data[i].id_menu)
								{
									bool = 1;
								}
							}
							if(bool == 1)
							{
								var appended = "<p>"+(i+1)+". "+data[i].name_menu+" : <span id='label-text"+data[i].id_menu+"'>ok</span></p> <p><button id='statBtn"+data[i].id_menu+"' onclick='updateStatusRole(0, "+idRole+", "+data[i].id_menu+")' class='btn btn-danger'>Set Not Ok</button></p><br>";
								$("#PermissionList").append(appended);
							}
							if(bool == 0)
							{
								var appended = "<p>"+(i+1)+". "+data[i].name_menu+" : <span id='label-text"+data[i].id_menu+"'>not ok</span></p> <p><button id='statBtn"+data[i].id_menu+"' onclick='updateStatusRole(1, "+idRole+", "+data[i].id_menu+")' class='btn btn-success'>Set Ok</button> </p><br>";
								$("#PermissionList").append(appended);
							}
						}
						
					}
				});
			}
			
			function editRoleName(idRoleName)
			{				
				$.ajax({
					headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					method:'POST',
					data: {id_role:idRoleName},
					cache:false,
					url:'{{url("/admin/get_role_name")}}',
					success:function(result)
					{
						var result = JSON.parse(result);
						var id_role = result[0].id_role;
						var name_role = result[0].name_role;
						var status_role = result[0].status_role;
						$("#id_role").val(id_role);
						$("#name_role").val(name_role);
						$("#status_role").val(status_role);
					}
				});
			}
			
			function updateStatusRole(stat, idRole, idMenu)
			{
				//alert(idRole + "->" + idMenu);
				$.ajax({
					headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					method:'POST',
					data: {stat:stat, id_role:idRole, id_menu:idMenu},
					cache:false,
					url:'{{url("/admin/update_status_role")}}',
					success:function(result)
					{
						if(result == 0)
						{
							$("#statBtn"+idMenu).attr('class', 'btn btn-success');
							$("#statBtn"+idMenu).text('Set Ok').attr("onclick", "updateStatusRole(1, "+idRole+", "+idMenu+")");
							$("#label-text"+idMenu).html('Not Ok');
							
						}else if(result == 1)
						{
							$("#statBtn"+idMenu).attr('class', 'btn btn-danger');
							$("#statBtn"+idMenu).text('Set Not Ok').attr("onclick", "updateStatusRole(0, "+idRole+", "+idMenu+")");
							$("#label-text"+idMenu).html('Ok');
						}else
						{
							alert("Failed Updated!");
						}
					}
				});
			}
		</script>
	 @endsection