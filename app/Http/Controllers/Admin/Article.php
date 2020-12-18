<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;



use App\Models\Admin\Article_m;
use App\Models\Admin\Category_m;
use App\Models\Admin\Comment_m;
use App\Models\Admin\Payment_m;
use App\Models\Admin\Settings_m;

class Article extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
	 
	public function __construct()
	{
		//$this->check_login();
	}
	
	public function list_writer_article()
    {
		$data = $this->general_settings();
		$writer = (new Article_m)->get_all_writer();
		return view("Admin/article/writer/list_article_writer")
		->with("list_writer", $writer)
		->with("general_settings", $data);
    }
	
	public function view_article_writer($id_writer)
    {
		$data = $this->general_settings();
		$admin = (new Article_m)->get_admin_by_id($id_writer)[0]->name_admin;
		$article = (new Article_m)->get_all_article($id_writer);
		return view("Admin/article/writer/view_writer_article")
		->with("list_article", $article)
		->with("writer_name", $admin)
		->with("general_settings", $data);
    }
	
	public function list_article()
    {
		$data = $this->general_settings();
		$article = (new Article_m)->get_all_article();
		return view("Admin/article/list_article")
		->with("list_article", $article)
		->with("general_settings", $data);
    }
	
	public function add_article()
    {
		$data = $this->general_settings();
		$category = (new Category_m)->get_all_category();
		$subcategory = (new Category_m)->get_all_sub_category();
		return view("Admin/article/add_article")->with("list_category", $category)->with("list_subcategory", $subcategory)->with("general_settings", $data);
    }
	
	public function add_article_action()
    {
		$id_admin = Session :: get ('id_admin');
		
		$title_article = request()->post("title_article");
		$tag_article = request()->post("tag_article");
		$content_article = request()->post("content_article");
		$ori_content_article = request()->post("ori_content_article");
		$short_description_article = request()->post("short_description_article");
		$meta_desc_article = request()->post("meta_desc_article");
		$meta_title_article = request()->post("meta_title_article");
		$meta_keyword_article = request()->post("meta_keyword_article");
		$category_article = explode("-", request()->post("sub_category_article"))[0];
		$sub_category_article = explode("-", request()->post("sub_category_article"))[1];
		$thumbnail_article = request()->file("thumbnail_article");
		$headline_article = request()->post("headline_article");
		$status_article = request()->post("status_article");
				
		$image = request()->file('thumbnail_article');
		$name = time().'.'.$image->getClientOriginalExtension();
		$destinationPath = public_path('/assets/images/article/');
		$image->move($destinationPath, $name);
		
		$data_article = array(
							"title_article"=>$title_article,
							"content_article"=>$content_article,
							"ori_content_article"=>$ori_content_article,
							"short_description_article"=>$short_description_article,
							"tag_article"=>$tag_article,
							"meta_desc_article"=>$meta_desc_article,
							"meta_title_article"=>$meta_title_article,
							"meta_keyword_article"=>$meta_keyword_article,
							"category_id"=>$category_article,
							"sub_category_id"=>$sub_category_article,
							"thumbnail_article"=>$name,
							"admin_id"=>$id_admin,
							"status_headline_article"=>$headline_article,
							"status_deleted_article"=>0,
							"status_article"=>$status_article,
						);
		$article_id = (new Article_m)->insert_article($data_article);
		print_r($article_id);
		
		if($article_id !== null)
		{
			$data_payment = array(
								"article_id_payment"=>$article_id,
								"admin_editor_id_payment"=>$id_admin,
								"admin_id_payment"=>$id_admin,
								"fee_level_payment"=>0,
								"notes_payment"=>"",
								"status_payment"=>0,
							);
			$payment = (new Payment_m)->insert_payment($data_payment);
			if($payment)
				return redirect("admin/list_article");
		}
		else
		{
			return redirect("admin/add_article");
		}
	}
	
	public function edit_article($id_article)
    {
		$data = $this->general_settings();
		$article = (new Article_m)->get_article_by_id($id_article);
		$category = (new Category_m)->get_all_category();
		$subcategory = (new Category_m)->get_all_sub_category();
		return view("Admin/article/edit_article")
			->with("article_detail", $article)
			->with("list_category", $category)
			->with("list_subcategory", $subcategory)
			->with("general_settings", $data);
    }
	
	public function edit_article_action()
    {
		$id_admin = Session :: get ('id_admin');
		
		$id_article = request()->post("id_article");
		$title_article = request()->post("title_article");
		$content_article = request()->post("content_article");
		$ori_content_article = request()->post("ori_content_article");
		$short_description_article = request()->post("short_description_article");
		$tag_article = request()->post("tag_article");
		$meta_desc_article = request()->post("meta_desc_article");
		$meta_title_article = request()->post("meta_title_article");
		$meta_keyword_article = request()->post("meta_keyword_article");
		$category_article = explode("-", request()->post("sub_category_article"))[0];
		$sub_category_article = explode("-", request()->post("sub_category_article"))[1];
		$thumbnail_article = request()->file("thumbnail_article");
		$headline_article = request()->post("headline_article");
		$status_article = request()->post("status_article");
		
		if(request()->hasFile('thumbnail_article'))
		{			
			$image = request()->file('thumbnail_article');
			$name = time().'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/assets/images/article/');
			$image->move($destinationPath, $name);
			
			$data_article = array(
								"id_article"=>$id_article,
								"title_article"=>$title_article,
								"content_article"=>$content_article,
								"ori_content_article"=>$ori_content_article,
								"short_description_article"=>$short_description_article,
								"tag_article"=>$tag_article,
								"meta_desc_article"=>$meta_desc_article,
								"meta_title_article"=>$meta_title_article,
								"meta_keyword_article"=>$meta_keyword_article,
								"category_id"=>$category_article,
								"sub_category_id"=>$sub_category_article,
								"thumbnail_article"=>$name,
								"admin_id"=>$id_admin,
								"status_headline_article"=>$headline_article,
								"status_article"=>$status_article,
							);
					
			$article = (new Article_m)->update_article($data_article);
			if($article)
				return redirect("admin/edit_article/".$id_article);
			else
				return redirect("admin/edit_article/".$id_article);
		}else
		{
			$data_article = array(
								"id_article"=>$id_article,
								"title_article"=>$title_article,
								"content_article"=>$content_article,
								"ori_content_article"=>$ori_content_article,
								"short_description_article"=>$short_description_article,
								"tag_article"=>$tag_article,
								"meta_desc_article"=>$meta_desc_article,
								"meta_title_article"=>$meta_title_article,
								"meta_keyword_article"=>$meta_keyword_article,
								"category_id"=>$category_article,
								"sub_category_id"=>$sub_category_article,
								"admin_id"=>$id_admin,
								"status_headline_article"=>$headline_article,
								"status_article"=>$status_article,
							);
					
			$article = (new Article_m)->update_article($data_article);
			
			if($article)
				return redirect("admin/edit_article/".$id_article);
			else
				return redirect("admin/edit_article/".$id_article);
		}
		
	}
	
	public function delete_article($id_article)
    {
		$data = $this->general_settings();
		$article = (new Article_m)->get_article_by_id($id_article);
		$category = (new Category_m)->get_all_category();
		$subcategory = (new Category_m)->get_all_sub_category();
		return view("Admin/article/delete_article")
			->with("article_detail", $article)
			->with("list_category", $category)
			->with("list_subcategory", $subcategory)
			->with("general_settings", $data);
    }
	
	public function delete_article_action()
    {
		$id_article = request()->post("id_article");
		$data = array("id_article"=>$id_article, "status_deleted_article"=>1);
		
		$article = (new Article_m)->remove_article($data);
		if($article)
			return redirect("admin/list_article/");
		else
			return redirect("admin/list_article/");
		
	}	
	
	public function reload_status_headline()
	{
		$stat = request()->post("stat");
		$id_article = request()->post("id_article");
		if($stat == 1)
		{
			$data_article = array(
							"id_article"=>$id_article,
							"status_headline_article"=>0
						);
			$update = (new Article_m)->update_article($data_article);
			echo 1;
		}else
		{
			$data_article = array(
							"id_article"=>$id_article,
							"status_headline_article"=>1
						);
			$update = (new Article_m)->update_article($data_article);
			echo 1;
		}
	}
	
	private function email_to_subscriber()
	{
		$update = (new Article_m)->update_article($data_article);
	}
	
	public function _all_article()
	{
		$article = (new Article_m)->get_all_article();
		echo json_encode($article);
	}
	
	public function _article(request $request, $id)
	{
		$article = (new Article_m)->get_article_by_id($id);
		echo json_encode($article);
	}
	
	public function _article_keyword(request $request, $keyword)
	{
		$article = (new Article_m)->get_article_by_keyword($keyword);
		echo json_encode($article);
	}
	
	public function _article_cat(request $request, $cat)
	{
		$article = (new Article_m)->get_article_by_id_cat($cat);
		echo json_encode($article);
	}
	
	public function _article_cat_relate(request $request, $cat, $id)
	{
		$article = (new Article_m)->get_article_by_id_cat_relate($cat, $id);
		echo json_encode($article);
	}
	
	public function _update_article(request $request, $id)
	{
		$post = $request->nama;
		echo json_encode($post);
	}
	
	public function _delete_article(request $request, $id)
	{
		$post = $request->nama."aaa";
		echo json_encode($post);
	}
	
	public function _all_category()
	{
		$category = (new Category_m)->get_all_active_category();
		echo json_encode($category);
	}
	
	public function _front_banner()
	{
		$settings = (new Settings_m)->get_general_settings();
		echo json_encode($settings[0]->banner_main);
	}
}