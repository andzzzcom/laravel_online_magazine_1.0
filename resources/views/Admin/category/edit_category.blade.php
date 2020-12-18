@extends("Admin.incl.layout")

	
	@section("content") <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Update Category Form
			<small>Form Mengubah Kategori</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="{{url('admin/list_category')}}">Category</a></li>
			<li class="active">Update Category</li>
		  </ol>
		</section>

		<!-- Main content --> 
		<section class="content">
			<div class="row">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-6">							
							<form action="{{action('Admin\Category@edit_category_action')}}" method="post" enctype="multipart/form-data">
							@csrf
								<input type="hidden" name="id_category" value="{{$category_detail[0]->id_category}}">
								<div class="form-group">
								  <label>Name Category</label>
								  <input required type="text" value="{{$category_detail[0]->name_category}}" maxlength="100" class="form-control" name="name_category" placeholder="Insert Category Name">
								</div>
								
								<div class="form-group">
									<label>Thumbnail Category</label>
									<br>
									<img src="{{asset('assets/images/category/'.$category_detail[0]->thumbnail_category)}}" style="max-width:100px;height:auto">
									<br>
									<label class="ea-file">Choose file
										<input type="file" name="thumbnail_category" id="uploaded1" class="upload" data-value="uploaded1">
									</label>
								</div>
									
								<div class="form-group">
								  <label>Status Category</label>
								  <select required class="form-control" name="status_category">
									<option @if($category_detail[0]->status_category == 1) selected @endif class="form-control" value="1">Active</option>
									<option @if($category_detail[0]->status_category == 0) selected @endif class="form-control" value="0">Not Active</option>
								  </select>
								</div>
								
								<button type="submit" id="submit" class="btn btn-warning">Update</button>
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
 