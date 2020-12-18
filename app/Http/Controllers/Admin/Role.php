<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Session;


use App\Models\Admin\Role_m;

class Role extends Controller
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
	
	public function list_role()
    {
		$data = $this->general_settings();
		$role = (new Role_m)->get_all_role();
		return view("Admin/role/list_role")->with("list_role", $role)->with("general_settings", $data);
    }
	
	public function list_menu()
    {
		$data = $this->general_settings();
		$menu = (new Role_m)->get_all_menu();
		return view("Admin/role/list_menu")->with("list_menu", $menu)->with("general_settings", $data);
    }
	
	public function get_role_menu()
	{
		$id_role = request()->post("id_role");
		$all_roles = (new Role_m)->get_all_menu_by_role($id_role);
		
		$menu = (new Role_m)->get_all_menu();
		echo $menu."-----".$all_roles;
	}
	
	public function update_status_role()
	{
		$stat = request()->post("stat");
		$id_role = request()->post("id_role");
		$id_menu = request()->post("id_menu");
		$data_role = array(
						"role_id"=>$id_role,
						"menu_id"=>$id_menu,
					);
		if($stat == 1)
		{
			$data_role["status_deleted_role_menu"] = 0;
			$data_role["status_role_menu"] = 1;
			$role = (new Role_m)->insert_role($data_role);
			echo 1;
		}else
		{
			$data_role["status_deleted_role_menu"] = 1;
			$role = (new Role_m)->delete_role($data_role);
			echo 0;
		}
	}
	
	public function add_new_menu()
    {
		$menu_name = request()->post("menu_name");
		$status_menu = request()->post("status_menu");
		if($menu_name == "")
			return redirect("admin/list_menu");
		
		$data_menu = array(
							"name_menu"=>$menu_name,
							"status_deleted_menu"=>0,
							"status_menu"=>$status_menu,
						);
				
		$menu = (new Role_m)->insert_menu($data_menu);
		if($menu)
			return redirect("admin/list_menu/");
		else
			return redirect("admin/list_menu/");
		
	}
	
	public function delete_menu()
	{
		$id_menu = request()->post("id_menu");
		$data_menu = array(
							"id_menu"=>$id_menu,
							"status_deleted_menu"=>1,
						);
		$menu = (new Role_m)->delete_menu($data_menu);
		if($menu)
			echo 1;
		else
			echo 0;
	}
	
	public function get_data_menu()
	{
		$id_menu = request()->post("id_menu");
		$menu = (new Role_m)->get_menu_by_id($id_menu);
		
		echo json_encode($menu);
	}
	
	public function edit_menu()
	{
		$id_menu = request()->post("id_menu");
		$name_menu = request()->post("name_menu");
		$status_menu = request()->post("status_menu");
		$data_menu = array(
							"id_menu"=>$id_menu,
							"name_menu"=>$name_menu,
							"status_menu"=>$status_menu,
						);
		$menu = (new Role_m)->update_menu($data_menu);
		if($menu)
			return redirect("admin/list_menu");
	}
	
	public function add_role()
    {
		$data = $this->general_settings();
		$role_name = (new Admin_m)->get_role_name();
		return view("Admin/admin/add_admin")->with("role_name", $role_name)->with("general_settings", $data);
    }
	
	public function add_new_role()
    {
		$name_role = request()->post("name_role");
		$status_role = request()->post("status_role");
		if($name_role == "")
			return redirect("admin/list_role");
		
		$data_role = array(
							"name_role"=>$name_role,
							"status_deleted_role_name"=>0,
							"status_role"=>$status_role,
						);
		$role = (new Role_m)->insert_role_name($data_role);
		if($role)
			return redirect("admin/list_role/");
		else
			return redirect("admin/list_role/");
	}
	
	public function delete_role()
	{
		$id_role = request()->post("id_role");
		$data_role = array(
							"id_role"=>$id_role,
							"status_deleted_role_name"=>1,
						);
		$role = (new Role_m)->delete_role_name($data_role);
		if($role)
			echo 1;
		else
			echo 0;
	}
	
	public function get_role_name()
	{
		$id_role = request()->post("id_role");
		$role = (new Role_m)->get_role_name_by_id($id_role);
		
		echo json_encode($role);
	}
	
	public function edit_role_name_action()
    {
		$id_role = request()->post("id_role");
		$name_role = request()->post("name_role");
		$status_role = request()->post("status_role");
		if($name_role == "")
			return redirect("admin/list_role");
		
		$data_role = array(
							"id_role"=>$id_role,
							"name_role"=>$name_role,
							"status_role"=>$status_role,
						);
		$role = (new Role_m)->update_role_name($data_role);
		if($role)
			return redirect("admin/list_role/");
		else
			return redirect("admin/list_role/");
	}
}