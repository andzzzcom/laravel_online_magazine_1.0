<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Session;


use App\Models\Admin\Comment_m;

class Comment extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
	public function __construct()
	{
		$this->check_login();
	}
	
	public function list_comment()
    {
		$data = $this->general_settings();
		$comment = (new Comment_m)->get_all_comment();
		return view("Admin/comment/list_comment")->with("list_comment", $comment)->with("general_settings", $data);
    }
	
	public function view_comment($id_comment)
    {
		$data = $this->general_settings();
		$comment = (new Comment_m)->get_comment_by_id($id_comment);
		return view("Admin/comment/view_comment")->with("comment_detail", $comment)->with("general_settings", $data);
    }
	
	public function delete_comment($id_comment)
    {
		$data = $this->general_settings();
		$comment = (new Comment_m)->get_comment_by_id($id_comment);
		return view("Admin/comment/delete_comment")->with("comment_detail", $comment)->with("general_settings", $data);
	}
	
	public function delete_comment_action()
    {
		$id_comment = request()->post("id_comment");
		$data = array("id_comment"=>$id_comment, "status_deleted_comment"=>1);
		
		$comment = (new Comment_m)->remove_comment($data);
		if($comment)
			return redirect("admin/list_comment/");
		else
			return redirect("admin/list_comment/");
	}
	
	public function reload_status_comment()
	{
		$cek = 0;
		$id_comment = request()->post("id_comment");
		$stat = request()->post("stat");
		if($stat == 0)
			$cek = 1;
		
		$data = array("id_comment"=>$id_comment, "status_comment"=>$cek);
		$comment = (new Comment_m)->update_comment($data);
		
		echo $comment;
	}
	
}