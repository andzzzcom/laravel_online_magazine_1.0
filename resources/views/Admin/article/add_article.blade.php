@extends("Admin.incl.layout")

	
	@section("content") <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Add Article Form
			<small>Form Menambahkan Artikel</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="{{url('admin/list_article')}}">Article</a></li>
			<li class="active">Add Article</li>
		  </ol>
		</section>

		<!-- Main content --> 
		<section class="content">
			<div class="row">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-8">							
							<form onsubmit="return copyOriginalText()" action="{{action('Admin\Article@add_article_action')}}" method="post" enctype="multipart/form-data">
							@csrf
								<div class="form-group">
								  <label>Title Artikel</label>
								  <input required type="text" maxlength="100" class="form-control" name="title_article" placeholder="Insert Title Article">
								</div>
								
								<div class="form-group">
									<label>Content Article</label>
									<br>
									<textarea id="textarea1" rows="15" cols="10" name="content_article"></textarea>
									<input type="hidden" name="ori_content_article" value="" id="ori_content_article">
								</div>
								
								<div class="form-group">
									<label>Subcategory Article</label>
									<select required class="form-control" name="sub_category_article">
										@foreach($list_category as $category)
											<option class="form-control" value="{{$category->id_category}}" disabled>Category: {{$category->name_category}}</option>
											@foreach($list_subcategory as $subcategory)
												@if($subcategory->category_id == $category->id_category)
													<option class="form-control" value="{{$category->id_category}}-{{$subcategory->id_sub_category}}">{{$subcategory->name_sub_category}}</option>
												@endif
											@endforeach
										@endforeach
									</select>
								</div>
								
								<div class="form-group">
									<label>Thumbnail Article</label>
									<br>
									<label class="ea-file">Choose file
										<input type="file" required name="thumbnail_article" id="uploaded1" class="upload" data-value="uploaded1">
									</label>
								</div>
									
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Tag Article</label>
									<br>
									<input required placeholder="Input Tag (separate it with comma)" type="text" class="form-control" name="tag_article">
								</div>
								
								<div class="form-group">
									<label>Meta Title Article</label>
									<br>
									<textarea id="textarea1" rows="5" cols="10" name="meta_title_article"></textarea>
								</div>
								
								<div class="form-group">
									<label>Meta Keyword Article</label>
									<br>
									<textarea id="textarea1" rows="5" cols="10" name="meta_keyword_article"></textarea>
								</div>
								
								<div class="form-group">
									<label>Meta Description Article</label>
									<br>
									<textarea id="textarea1" rows="5" cols="10" name="meta_desc_article"></textarea>
								</div>
								
								<div class="form-group">
									<label>Short Description Article</label>
									<br>
									<textarea maxlength="150" style="padding:5px" rows="5" cols="40" name="short_description_article"></textarea>
								</div>
								
								<div class="form-group">
								  <label>Set Headline Article</label>
								  <select required class="form-control" name="headline_article">
									<option class="form-control" value="0">Not Headline</option>
									<option class="form-control" value="1">Headline</option>
								  </select>
								</div>
								
								<div class="form-group">
								  <label>Status Article</label>
								  <select required class="form-control" name="status_article">
									<option class="form-control" value="1">Active</option>
									<option class="form-control" value="0">Not Active</option>
								  </select>
								</div>
								
								<button type="submit" id="submit" class="btn btn-warning">Post</button>
								<a href="{{url('admin/list_article')}}"><button type="button" class="btn btn-danger">Cancel</button></a>
							
							</div>
						</form>
					</div>
					  
						 
				</div>
			</div>
		</section>
		<!-- /.content -->
	  </div>
	  <!-- /.content-wrapper -->
	@endsection
 
	
	<script>
		function copyOriginalText(){
			var oriContent = tinyMCE.get('textarea1').getContent({format : 'text'});
			$("#ori_content_article").val(oriContent);
		}
	</script>
 