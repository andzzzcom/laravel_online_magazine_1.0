<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Admin_m extends Model
{
    protected $table = "tb_admin";
	protected  $primaryKey = 'id_admin';
	public $timestamps = false;
	
	public function get_all_admin()
	{
		$admin = DB::table('tb_admin')
						->join('tb_role_name', function ($join) {
							$join->on('tb_admin.role_admin', '=', 'tb_role_name.id_role');
						})->get();
		return $admin;
	}	
	
    public function get_admin_by_id($data)
    {
		$admin = DB::table('tb_admin')
						->join('tb_role_name', function ($join) {
							$join->on('tb_admin.id_admin', '=', 'tb_role_name.id_role');
						})->get();
		return $admin;
    }
	
	public function get_role_name()
	{
		$role_admin = DB::table('tb_role_name')->get();
		return $role_admin;
	}	
	
	public function update_admin($data)
	{
		$admin = DB::table('tb_admin')->where("id_admin", $data["id_admin"])->update($data);
		return $admin;
	}
	
	public function insert_admin($data)
	{
		$admin = DB::table('tb_admin')->insert($data);
		return $admin;
	}
}
