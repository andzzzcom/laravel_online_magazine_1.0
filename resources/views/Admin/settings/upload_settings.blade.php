 @extends("Admin.incl.layout")


	@section("content")<!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			List Upload Image Settings
			<small>list semua settings</small>
		  </h1>
			  <ol class="breadcrumb">
				<li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active"><a href="{{url('admin/upload_settings')}}">Upload Settings</a></li>
			  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-xs-12">
			  <div class="table-responsive box">
				<div class="box-header">
				  <h3 class="box-title">List Upload Image Settings</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="text-center table table-bordered table-hover">
						<thead>
							<tr>
								<th width="5%">No.</th>
								<th width="20%">Menu</th>
								<th width="40%">Allowed File Type (Separate with | )</th>
								<th width="25%">Allowed File Size</th>
								<th width="10"></th>
							</tr>
						</thead>
						
						<tbody>
							@php
								$i = 1
							@endphp
							@foreach($upload_settings as $settings)
								<tr>
									<input type="hidden" id="id_settings_upload" value="{{$settings->id_settings_upload}}">
									<td>{{$i}}</td>
									<td>{{$settings->menu_name}}</td>
									<td><input required style="width:80%" class="form-control" placeholder="Masukkan Tipe File" type="text" value="{{$settings->file_type}}" name="file_type" id="file_type{{$settings->id_settings_upload}}"></td>
									<td><input required class="form-control" placeholder="Masukkan Ukuran File" type="number" min="1" step="1" value="{{$settings->file_size}}" name="file_size" id="file_size{{$settings->id_settings_upload}}"></td>
									<td><button onclick="submitSettingsUpload({{$settings->id_settings_upload}});" type="submit" class="btn btn-success">Edit</button></td>
								</tr>
							@php
								$i = $i + 1
							@endphp
							@endforeach
						</tbody>
						
						<tfoot>
							<tr>
								<th width="5%">No.</th>
								<th width="20%">Menu</th>
								<th width="40%">Allowed File Type (Separate with | )</th>
								<th width="25%">Allowed File Size</th>
								<th width="10"></th>
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
	function submitSettingsUpload(id_settings_upload)
	{
		var file_size = $('#file_size'+id_settings_upload).val();
		var file_type = $('#file_type'+id_settings_upload).val();
		
		$.ajax({
			type: "POST",
			url: "{{url('admin/upload_settings_action')}}",
			cache: false,
			data: "id_settings_upload=" + id_settings_upload + "&file_size=" + file_size + "&file_type=" + file_type, 
			success: function(data) 
			{
				if(data == "true")
				{
					alert("Sukses Mengupdate !");
				}
				else
				{
					alert("Gagal Mengupdate !");
					
					var object = JSON.parse(data);
					
					$('#file_size'+id_settings_upload).val(object.file_size);
					$('#file_type'+id_settings_upload).val(object.file_type);

				}
			}

		});
	}
  </script>
 
