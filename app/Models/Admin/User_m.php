<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class User_m extends Model
{
    protected $table = "tb_user";
	protected  $primaryKey = 'id_user';
	public $timestamps = false;
	
	public function get_all_user()
	{
		$user = DB::table('tb_user')
						->join('tb_role_name', function ($join) {
							$join->on('tb_user.role_user', '=', 'tb_role_name.id_role');
						})->get();
		return $user;
	}	
	
    public function get_user_by_id($data)
    {
		$user = DB::table('tb_user')
						->join('tb_role_name', function ($join) {
							$join->on('tb_user.id_user', '=', 'tb_role_name.id_role');
						})->get();
		return $user;
    }
	
	public function get_role_name()
	{
		$role_name = DB::table('tb_role_name')->get();
		return $role_name;
	}	
	
	public function update_user($data)
	{
		$user = DB::table('tb_user')->where("id_user", $data["id_user"])->update($data);
		return $user;
	}
	
	public function insert_user($data)
	{
		$user = DB::table('tb_user')->insert($data);
		return $user;
	}
}
