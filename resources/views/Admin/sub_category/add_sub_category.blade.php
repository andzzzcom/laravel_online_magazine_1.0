@extends("Admin.incl.layout")

	
	@section("content") <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Add Subcategory Form
			<small>Form Menambahkan Subkategori</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="{{url('admin/list_category')}}">Category</a></li>
			<li><a href="{{url('admin/list_sub_category')}}">Subcategory</a></li>
			<li class="active">Add Subcategory</li>
		  </ol>
		</section>

		<!-- Main content --> 
		<section class="content">
			<div class="row">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-6">							
							<form action="{{action('Admin\Category@add_sub_category_action')}}" method="post" enctype="multipart/form-data">
							@csrf
								<div class="form-group">
								  <label>Category</label>
								  <select required class="form-control" name="id_category">
										@foreach($list_category as $category)
											<option class="form-control" value="{{$category->id_category}}">{{$category->name_category}}</option>
										@endforeach
								  </select>
								</div>
								
								<div class="form-group">
								  <label>Name Subcategory</label>
								  <input required type="text" maxlength="100" class="form-control" name="name_sub_category" placeholder="Insert Subcategory Name">
								</div>
								
								<div class="form-group">
									<label>Thumbnail Subcategory</label>
									<br>
									<label class="ea-file">Choose file
										<input type="file" required name="thumbnail_sub_category" id="uploaded1" class="upload" data-value="uploaded1">
									</label>
								</div>
									
								<div class="form-group">
								  <label>Status Subcategory</label>
								  <select required class="form-control" name="status_sub_category">
									<option class="form-control" value="1">Active</option>
									<option class="form-control" value="0">Not Active</option>
								  </select>
								</div>
								
								<button type="submit" id="submit" class="btn btn-warning">Create</button>
								<a href="{{url('admin/list_sub_category')}}"><button type="button" class="btn btn-danger">Cancel</button></a>
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
 