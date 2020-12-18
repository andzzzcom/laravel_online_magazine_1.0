<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Session;


use App\Models\Admin\Page_m;

class Pages extends Controller
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
	
	public function list_page()
    {
		$data = $this->general_settings();
		$list_page = (new Page_m)->get_all_pages();
		return view("Admin/page/list_page")
			->with("list_page", $list_page)
			->with("general_settings", $data);
	}
	
	public function edit_page($id_page)
    {
		$data = $this->general_settings();
		$page = (new Page_m)->get_page_by_id($id_page);
		if(count($page) == 0)
			return redirect('not_found');
		
		return view("Admin/page/edit_page")
			->with("page_detail", $page)
			->with("general_settings", $data);
    }
	
	public function edit_page_action()
    {
		$id_page = request()->post("id_page");
		$name_page = request()->post("name_page");
		$content_page = request()->post("content_page");
		$meta_description_page = request()->post("meta_description_page");
		$meta_title_page = request()->post("meta_title_page");
		$meta_keywords_page = request()->post("meta_keywords_page");
		$status_page = request()->post("status_page");
				
		$data_page = array(
							"id_page"=>$id_page,
							"name_page"=>$name_page,
							"content_page"=>$content_page,
							"meta_description_page"=>$meta_description_page,
							"meta_title_page"=>$meta_title_page,
							"meta_keywords_page"=>$meta_keywords_page,
							"status_page"=>$status_page,
						);
				
		$page = (new Page_m)->update_page($data_page);
		if($page)
			return redirect("admin/edit_page/".$id_page);
		else
			return redirect("admin/edit_page/".$id_page);
	}
}