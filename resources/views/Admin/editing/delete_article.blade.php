@extends("Admin.incl.layout")

	
	@section("content") <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Remove Article Form
			<small>Form Menghapus Artikel</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="{{url('admin/list_article')}}">Article</a></li>
			<li class="active">Remove Article</li>
		  </ol>
		</section>

		<!-- Main content --> 
		<section class="content">
			<div class="row">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-8">							
							<form action="{{action('Admin\Article@delete_article_action')}}" method="post" enctype="multipart/form-data">
							@csrf
								<input type="hidden" name="id_article" value="{{$article_detail[0]->id_article}}">
								<div class="form-group">
								  <label>Title Artikel</label>
								  <input disabled value="{{$article_detail[0]->title_article}}" required type="text" maxlength="100" class="form-control" name="title_article" placeholder="Insert Title Article">
								</div>
								
								<div class="form-group">
									<label>Content Article</label>
									<br>
									<textarea disabled id="textarea1" rows="15" cols="10" name="content_article">{{$article_detail[0]->content_article}}</textarea>
								</div>
								
								<div class="form-group">
									<label>Subcategory Article</label>
									<select disabled class="form-control" name="sub_category_article">
										@foreach($list_category as $category)
											<option class="form-control" value="{{$category->id_category}}" disabled>Category: {{$category->name_category}}</option>
											@foreach($list_subcategory as $subcategory)
												@if($subcategory->category_id == $category->id_category)
													<option @if($article_detail[0]->sub_category_id == $subcategory->id_sub_category) selected @endif class="form-control" value="{{$category->id_category}}-{{$subcategory->id_sub_category}}">{{$subcategory->name_sub_category}}</option>
												@endif
											@endforeach
										@endforeach
									</select>
								</div>
									
								<div class="form-group">
									<label>Thumbnail Article</label>
									<br>
									<img src="{{asset('assets/images/article/'.$article_detail[0]->thumbnail_article)}}" style="max-width:100px;height:auto">
								</div>
									
								<div class="form-group">
								  <label>Status Article</label>
								  <select disabled class="form-control" name="status_article">
									<option @if($article_detail[0]->status_article == 1) selected @endif class="form-control" value="1">Active</option>
									<option @if($article_detail[0]->status_article == 0) selected @endif class="form-control" value="0">Not Active</option>
								  </select>
								</div>
								
								<button type="submit" id="submit" class="btn btn-warning">Remove</button>
								<a href="{{url('admin/list_article')}}"><button type="button" class="btn btn-danger">Cancel</button></a>
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
 