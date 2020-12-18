<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Article_m extends Model
{
    protected $table = "tb_article";
	protected  $primaryKey = 'id_article';
	public $timestamps = false;
	
	public function get_all_article($id_writer=null)
	{
		$article = Article_m::where("status_deleted_article", 0)
				->join("tb_admin", "tb_admin.id_admin", "=", "tb_article.admin_id")
				->orderBy("id_article", "desc");
				
		//check if specific writer required or not
		if($id_writer !== null){
			$article = $article->where("admin_id", $id_writer);
		}
		
		$article = $article
				->limit(5000)
				->get();
		
		return $article;
	}	
	
	public function get_all_writer()
	{
		$writer = DB::table("tb_admin")
				->join("tb_role_name", "tb_role_name.id_role", "=", "tb_admin.role_admin")
				->where("status_admin", 1)
				->where("status_deleted_admin", 0)
				->orderBy("id_admin", "desc")
				->get();
		return $writer;
	}	
	
    public function get_article_by_id($id_article)
    {
		$article = Article_m::where("id_article", $id_article)->get();
		return $article;
    }
	
    public function get_article_by_keyword($keyword)
    {
		$article = Article_m::where("title_article", "LIKE", "%$keyword%")->get();
		return $article;
    }
	
    public function get_article_by_id_cat($id_cat)
    {
		$article = Article_m::where("category_id", $id_cat)->get();
		return $article;
    }
	
    public function get_article_by_id_cat_relate($id_cat, $id_post)
    {
		$article = Article_m::where("category_id", $id_cat)
					->whereNotIn("id_article", [$id_post])
					->limit(3)
					->orderBy("id_article", "desc")
					->get();
		return $article;
    }
	
    public function get_admin_by_id($id_admin)
    {
		$admin = DB::table("tb_admin")
				->where("id_admin", $id_admin)
				->get();
		return $admin;
    }
	
	public function insert_article($data)
	{
		$article = Article_m::insertGetId($data);
		return $article;
	}
	
	public function update_article($data)
	{
		$article = Article_m::where("id_article", $data["id_article"])->update($data);
		return $article;
	}
	
	public function remove_article($data)
	{
		$article = Article_m::where("id_article", $data["id_article"])->update($data);
		return $article;
	}
}
