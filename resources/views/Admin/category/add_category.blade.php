@extends("Admin.incl.layout")

	
	@section("content") <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Add Category Form
			<small>Form Menambahkan Kategori</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="{{url('admin/list_category')}}">Category</a></li>
			<li class="active">Add Category</li>
		  </ol>
		</section>

		<!-- Main content --> 
		<section class="content">
			<div class="row">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-8">							
							<form action="{{action('Admin\Category@add_category_action')}}" method="post" enctype="multipart/form-data">
							@csrf
								<div class="form-group">
								  <label>Name Category</label>
								  <input required type="text" maxlength="100" class="form-control" name="name_category" placeholder="Insert Category Name">
								</div>
								
								<div class="form-group">
									<label>Thumbnail Category</label>
									<br>
									<label class="ea-file">Choose file
										<input type="file" required name="thumbnail_category" id="uploaded1" class="upload" data-value="uploaded1">
									</label>
								</div>
									
								<div class="form-group">
								  <label>Status Category</label>
								  <select required class="form-control" name="status_category">
									<option class="form-control" value="1">Active</option>
									<option class="form-control" value="0">Not Active</option>
								  </select>
								</div>
								
								<button type="submit" id="submit" class="btn btn-warning">Create</button>
								<a href="{{url('admin/list_category')}}"><button type="button" class="btn btn-danger">Cancel</button></a>
							</form>
						</div>
					</div>
					  
						 
				</div>
			</div>
		</section>
		<!-- /.content -->
	  </div>
	  <!-- /.content-wrapper -->
	@endsection
 