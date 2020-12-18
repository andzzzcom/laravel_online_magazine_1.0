<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Editing_m extends Model
{
    protected $table = "tb_editing";
	protected  $primaryKey = 'id_editing';
	public $timestamps = false;
	
	public function get_all_editing()
	{
		$editing = DB::table('tb_editing')
						->join('tb_article', function ($join) {
							$join->on('tb_article.id_article', '=', 'tb_editing.article_id_notes_editor');
						})
						->join('tb_admin', function ($join) {
							$join->on('tb_admin.id_admin', '=', 'tb_editing.admin_id_notes_editor');
						})->get();
		return $editing;
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
