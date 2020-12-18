<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Session;


use App\Models\Admin\Editing_m;
use App\Models\Admin\Article_m;
use App\Models\Admin\Category_m;
use App\Models\Admin\Comment_m;

class Editing extends Controller
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
	
	public function list_editing()
    {
		$data = $this->general_settings();
		$editing = (new Editing_m)->get_all_editing();
		return view("Admin/editing/list_editing")->with("list_editing", $editing)->with("general_settings", $data);
    }
	
	public function edit_editing($id_article)
    {
		$data = $this->general_settings();
		$article = (new Article_m)->get_article_by_id($id_article);
		$category = (new Category_m)->get_all_category();
		$subcategory = (new Category_m)->get_all_sub_category();
		return view("Admin/editing/edit_editing")->with("article_detail", $article)->with("list_category", $category)->with("list_subcategory", $subcategory)->with("general_settings", $data);
    }
	
	public function add_admin_action()
    {
		$password = "12345";
		$name_admin = request()->post("name_admin");
		$email_admin = request()->post("email_admin");
		$phone_admin = request()->post("phone_admin");
		$role_admin = request()->post("role_admin");
		$status_admin = request()->post("status_admin");
		
		if(request()->hasFile('photo_admin'))
		{			
			$image = request()->file('photo_admin');
			$name = time().'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/assets/images/admin/');
			$image->move($destinationPath, $name);
			
			$data_admin = array(
								"name_admin"=>$name_admin,
								"email_admin"=>$email_admin,
								"phone_admin"=>$phone_admin,
								"password_admin"=>$password,
								"role_admin"=>$role_admin,
								"photo_admin"=>$name,
								"status_admin"=>$status_admin,
							);
					
			$admin = (new Admin_m)->insert_admin($data_admin);
			if($admin)
				return redirect("admin/list_admin/");
			else
				return redirect("admin/add_admin/");
		}else
		{
			return redirect("admin/add_admin/");
		}
	}
	
	public function edit_admin($id_admin)
    {
		$data = $this->general_settings();
		$admin = (new Admin_m)->get_admin_by_id($id_admin);
		$role_name = (new Admin_m)->get_role_name();
		return view("Admin/admin/edit_admin")->with("admin_detail", $admin)->with("role_name", $role_name)->with("general_settings", $data);
    }
	
	public function edit_admin_action()
    {
		$id_admin = request()->post("id_admin");
		$name_admin = request()->post("name_admin");
		$email_admin = request()->post("email_admin");
		$phone_admin = request()->post("phone_admin");
		$role_admin = request()->post("role_admin");
		$status_admin = request()->post("status_admin");
		
		if(request()->hasFile('photo_admin'))
		{			
			$image = request()->file('photo_admin');
			$name = time().'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/assets/images/admin/');
			$image->move($destinationPath, $name);
			
			$data_admin = array(
								"id_admin"=>$id_admin,
								"name_admin"=>$name_admin,
								"email_admin"=>$email_admin,
								"phone_admin"=>$phone_admin,
								"role_admin"=>$role_admin,
								"photo_admin"=>$name,
								"status_admin"=>$status_admin,
							);
					
			$admin = (new Admin_m)->update_admin($data_admin);
			if($admin)
				return redirect("admin/edit_admin/".$id_admin);
			else
				return redirect("admin/edit_admin/".$id_admin);
		}else
		{
			$data_admin = array(
								"id_admin"=>$id_admin,
								"name_admin"=>$name_admin,
								"email_admin"=>$email_admin,
								"phone_admin"=>$phone_admin,
								"role_admin"=>$role_admin,
								"status_admin"=>$status_admin,
							);
					
			$admin = (new Admin_m)->update_admin($data_admin);
			if($admin)
				return redirect("admin/edit_admin/".$id_admin);
			else
				return redirect("admin/edit_admin/".$id_admin);
		}
		
	}
}