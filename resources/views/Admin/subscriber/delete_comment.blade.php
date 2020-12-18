@extends("Admin.incl.layout")

	
	@section("content") <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Remove Comment
			<small>Menghapus Komentar</small>
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="{{url('admin/list_comment')}}">List Comment</a></li>
			<li class="active">Remove Comment</li>
		  </ol>
		</section>

		<!-- Main content --> 
		<section class="content">
			<div class="row">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-6">				
							<form action="{{action('Admin\Comment@delete_comment_action')}}" method="post" enctype="multipart/form-data">
							@csrf
								<input value="{{$comment_detail[0]->id_comment}}" type="hidden" class="form-control" name="id_comment">
								<div class="form-group">
								  <label>Sender Name</label>
								  <input readonly type="text" value="{{$comment_detail[0]->sender_name_comment}}" maxlength="100" class="form-control">
								</div>			
								
								<div class="form-group">
								  <label>Sender Email</label>
								  <input readonly type="text" value="{{$comment_detail[0]->sender_email_comment}}" maxlength="100" class="form-control">
								</div>			
								
								<div class="form-group">
								  <label>Sender IP</label>
								  <input readonly type="text" value="{{$comment_detail[0]->sender_ip_comment}}" maxlength="100" class="form-control">
								</div>
								
								<div class="form-group">
								  <label>Title Content</label>
								  <input readonly type="text" value="{{$comment_detail[0]->title_comment}}" class="form-control">
								</div>			
								
								<div class="form-group">
								  <label>Content</label>
								  <textarea rows="10" readonly class="form-control">{{$comment_detail[0]->content_comment}}</textarea>
								</div>
								
								<div class="form-group">
								  <label>Title Article</label><br>
								  <a href="{{url('admin/edit_article/'.$comment_detail[0]->id_article)}}" target="_blank">{{$comment_detail[0]->title_article}}</a>
								</div>	
								
								<div class="form-group">
								  <label>Sent Date</label>
								  <input readonly type="text" value="{{$comment_detail[0]->created_date_comment}}" class="form-control">
								</div>	
								
								<div class="form-group">
								  <label>Status Comment</label>
								  <select readonly class="form-control">
									<option @if($comment_detail[0]->status_comment == 1) selected @endif class="form-control" value="1">Active</option>
									<option @if($comment_detail[0]->status_comment == 0) selected @endif class="form-control" value="0">Not Active</option>
								  </select>
								</div>
								
								<button type="submit" id="submit" class="btn btn-warning">Remove</button>
								<a href="{{url('admin/list_comment')}}"><button type="button" class="btn btn-danger">Cancel</button></a>
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
 