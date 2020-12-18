<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;

class Home_m extends Model
{
    protected $table = "tb_admin";
	protected  $primaryKey = 'id_admin';
	public $timestamps = false;
	
	public function get_admin_data($data)
	{
		$admin = DB::table('tb_admin')
						->join('tb_role_name', function ($join) {
							$join->on('tb_admin.role_admin', '=', 'tb_role_name.id_role');
						})
						->where("status_admin", 1)
						->whereNotIn("status_deleted_admin", [1])
						->get();
		return $admin;
	}	
	
	public function get_all_article()
	{
		$article = Home_m::get();
		return $article;
	}	
	
    public function get_article_by_id($data)
    {
		$article = Home_m::where("id_article", $data["id_article"])->where("id_article", $data["id_article"])->get();
		return $article;
    }
}
