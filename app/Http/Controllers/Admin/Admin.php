<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Session;


use App\Models\Admin\Admin_m;

class Admin extends Controller
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
	
	public function list_admin()
    {
		$data = $this->general_settings();
		$admin = (new Admin_m)->get_all_admin();
		return view("Admin/admin/list_admin")->with("list_admin", $admin)->with("general_settings", $data);
    }
	
	public function add_admin()
    {
		$data = $this->general_settings();
		$role_name = (new Admin_m)->get_role_name();
		return view("Admin/admin/add_admin")->with("role_name", $role_name)->with("general_settings", $data);
    }
	
	public function add_admin_action()
    {
		$password = "12345";
		$name_admin = request()->post("name_admin");
		$email_admin = request()->post("email_admin");
		$phone_admin = request()->post("phone_admin");
		$short_description_admin = request()->post("short_description_admin");
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
								"short_description_admin"=>$short_description_admin,
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
		$short_description_admin = request()->post("short_description_admin");
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
								"short_description_admin"=>$short_description_admin,
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
								"short_description_admin"=>$short_description_admin,
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