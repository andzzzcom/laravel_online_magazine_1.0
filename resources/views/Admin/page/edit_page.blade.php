@extends("Admin.incl.layout")

	
	@section("content") <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Update Page Form
			<small>Form Mengubah Page</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="{{url('admin/list_page')}}">List Pages</a></li>
			<li class="active">Update Page</li>
		  </ol>
		</section>

		<!-- Main content --> 
		<section class="content">
			<div class="row">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-10 col-xs-12">							
							<form action="{{action('Admin\Pages@edit_page_action')}}" method="post" enctype="multipart/form-data">
							@csrf
								<input type="hidden" name="id_page" value="{{$page_detail[0]->id_page}}">
								<div class="form-group">
								  <label>Name Page</label>
								  <input required type="text" value="{{$page_detail[0]->name_page}}" class="form-control" name="name_page" placeholder="Insert Name Page">
								</div>
								
								<div class="form-group">
								  <label>Slug Page</label>
								  <input readonly type="text" value="{{$page_detail[0]->slug_page}}" class="form-control">
								</div>
								
								<div class="form-group">
								  <label>Meta Title Page</label>
								  <input required type="text" value="{{$page_detail[0]->meta_title_page}}" class="form-control" name="meta_title_page" placeholder="Insert Meta Title Page">
								</div>
								
								<div class="form-group">
								  <label>Meta Keywords Page</label>
								  <input required type="text" value="{{$page_detail[0]->meta_keywords_page}}" class="form-control" name="meta_keywords_page" placeholder="Insert Meta Keywords Page">
								</div>
								
								<div class="form-group">
								  <label>Meta Description Page</label>
								  <input required type="text" value="{{$page_detail[0]->meta_description_page}}" class="form-control" name="meta_description_page" placeholder="Insert Meta Description Page">
								</div>
																
								<div class="form-group">
								  <label>Content Page</label>
								  <textarea id="textarea1" required class="form-control" rows="20" name="content_page" placeholder="Insert Content Page">{{$page_detail[0]->content_page}}</textarea>
								</div>
								
								<div class="form-group">
								  <label>Created Date Page</label>
								  <input readonly type="text" value="{{$page_detail[0]->created_date_page}}" class="form-control">
								</div>
								
								<div class="form-group">
								  <label>Last Updated Date Page</label>
								  <input readonly type="text" value="{{$page_detail[0]->last_updated_date_page}}" class="form-control">
								</div>
									
								<div class="form-group">
								  <label>Status Page</label>
								  <select required class="form-control" name="status_page">
									<option @if($page_detail[0]->status_page == 1) selected @endif class="form-control" value="1">Active</option>
									<option @if($page_detail[0]->status_page == 0) selected @endif class="form-control" value="0">Not Active</option>
								  </select>
								</div>
								
								<button type="submit" id="submit" class="btn btn-warning">Update</button>
								<a href="{{url('admin/list_page')}}"><button type="button" class="btn btn-danger">Cancel</button></a>
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
 