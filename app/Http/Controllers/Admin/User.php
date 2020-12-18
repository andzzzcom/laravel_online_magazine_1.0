<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Session;


use App\Models\Admin\User_m;

class User extends Controller
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
	
	public function list_user()
    {
		$data = $this->general_settings();
		$user = (new User_m)->get_all_user();
		return view("Admin/user/list_user")->with("list_user", $user)->with("general_settings", $data);
    }
	
	public function add_user()
    {
		$data = $this->general_settings();
		$role_admin = (new User_m)->get_role_admin();
		return view("Admin/user/add_admin")->with("role_admin", $role_admin)->with("general_settings", $data);
    }
	
	public function add_user_action()
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
					
			$admin = (new User_m)->insert_admin($data_admin);
			if($admin)
				return redirect("admin/list_admin/");
			else
				return redirect("admin/add_admin/");
		}else
		{
			return redirect("admin/add_admin/");
		}
	}
	
	public function edit_user($id_user)
    {
		$data = $this->general_settings();
		$user = (new User_m)->get_user_by_id($id_user);
		$role_name = (new User_m)->get_role_name();
		return view("Admin/user/edit_user")->with("user_detail", $user)->with("role_name", $role_name)->with("general_settings", $data);
    }
	
	public function edit_user_action()
    {
		$id_user = request()->post("id_user");
		$name_user = request()->post("name_user");
		$email_user = request()->post("email_user");
		$phone_user = request()->post("phone_user");
		$role_user = request()->post("role_user");
		$status_user = request()->post("status_user");
		
		if(request()->hasFile('photo_user'))
		{			
			$image = request()->file('photo_user');
			$name = time().'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/assets/images/user/');
			$image->move($destinationPath, $name);
			
			$data_user = array(
								"id_user"=>$id_user,
								"name_user"=>$name_user,
								"email_user"=>$email_user,
								"phone_user"=>$phone_user,
								"role_user"=>$role_user,
								"photo_user"=>$name,
								"status_user"=>$status_user,
							);
					
			$user = (new User_m)->update_user($data_user);
			if($user)
				return redirect("admin/edit_user/".$id_user);
			else
				return redirect("admin/edit_user/".$id_user);
		}else
		{
			$data_user = array(
								"id_user"=>$id_user,
								"name_user"=>$name_user,
								"email_user"=>$email_user,
								"phone_user"=>$phone_user,
								"role_user"=>$role_user,
								"status_user"=>$status_user,
							);
					
			$user = (new User_m)->update_user($data_user);
			if($user)
				return redirect("admin/edit_user/".$id_user);
			else
				return redirect("admin/edit_user/".$id_user);
		}
		
	}
}