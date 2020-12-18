<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Role_m extends Model
{
    protected $table = "tb_role_name";
	protected  $primaryKey = 'id_role';
	public $timestamps = false;
	
    public function get_all_role()
    {
		$role = Role_m::where("status_deleted_role_name", 0)->get();
		return $role;
    }
	
    public function get_all_menu()
    {
		$menu = DB::table("tb_menu")->where("status_deleted_menu", 0)->get();
		return $menu;
    }
	
    public function get_role_menu_by_id($role)
    {
		$permission = DB::table("tb_role_menu")->join("tb_menu", "tb_menu.id_menu", "=", "tb_role_menu.menu_id")->where("role_id", $role)->where("status_deleted_role_menu", 0)->where("status_role_menu", 1)->get();
		return $permission;
    }
	
    public function get_all_menu_by_role($id_role)
    {
		$permission = DB::table("tb_role_menu")->where("role_id", $id_role)->where("status_deleted_role_menu", 0)->where("status_role_menu", 1)->get();
		return $permission;
    }
	
    public function insert_role($data_role)
    {
		$role = DB::table("tb_role_menu")->insert($data_role);
		return $role;
    }
	
	public function delete_role($data)
	{
		$role = DB::table("tb_role_menu")->where("role_id", $data["role_id"])->where("menu_id", $data["menu_id"])->update($data);
		return $role;
	}
	
    public function get_menu_by_id($id_menu)
    {
		$menu = DB::table("tb_menu")->where("id_menu", $id_menu)->get();
		return $menu;
    }
	
    public function insert_menu($data_menu)
    {
		$menu = DB::table("tb_menu")->insert($data_menu);
		return $menu;
    }
	
	public function delete_menu($data)
	{
		$menu = DB::table("tb_menu")->where("id_menu", $data["id_menu"])->update($data);
		return $menu;
	}
	
	public function update_menu($data)
	{
		$menu = DB::table("tb_menu")->where("id_menu", $data["id_menu"])->update($data);
		return $menu;
	}
	
    public function insert_role_name($data_role)
    {
		$role = DB::table("tb_role_name")->insert($data_role);
		return $role;
    }
	
	public function delete_role_name($data)
	{
		$role = DB::table("tb_role_name")->where("id_role", $data["id_role"])->update($data);
		return $role;
	}
	
    public function get_role_name_by_id($id_role)
    {
		$role = DB::table("tb_role_name")->where("id_role", $id_role)->get();
		return $role;
    }
	
    public function update_role_name($data)
    {
		$role = DB::table("tb_role_name")->where("id_role", $data["id_role"])->update($data);
		return $role;
    }
	
}
