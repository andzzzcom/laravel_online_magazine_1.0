<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Page_m extends Model
{
    protected $table = "tb_custom_page";
	protected  $primaryKey = 'id_page';
	public $timestamps = false;
	
	public function get_all_pages()
	{
		$pages = DB::table('tb_custom_page')
						->whereNotIn("tb_custom_page.status_page", [-1])
						->orderBy("tb_custom_page.id_page", "desc")
						->get();
		return $pages;
	}	
	
    public function get_page_by_id($id_page)
    {
		$page = DB::table('tb_custom_page')
				->where("tb_custom_page.id_page", $id_page)
				->whereNotIn("tb_custom_page.status_page", [-1])
				->get();
		return $page;
    }
	
	public function update_page($data)
	{
		$page = DB::table('tb_custom_page')
				->where("tb_custom_page.id_page", $data["id_page"])
				->update($data);
		return $page;
	}
	
}
