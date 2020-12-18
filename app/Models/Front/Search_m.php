<?php

namespace App\Models\Front;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Search_m extends Model
{
    protected $table = "tb_article";
	protected  $primaryKey = 'id_article';
	public $timestamps = false;
	
	public function get_headline_news()
	{
		$admin = DB::table('tb_article')
						->join('tb_admin', function ($join) {
							$join->on('tb_article.admin_id', '=', 'tb_admin.id_admin');
						})->get();
		return $admin;
	}	
		
    public function get_article_by_keyword($data)
    {
		$article = DB::table('tb_article')
						->join('tb_admin', function ($join) {
							$join->on('tb_article.admin_id', '=', 'tb_admin.id_admin');
						})
						->where("title_article", 'like', '%'.$data["keyword"].'%')
						->join('tb_category', function ($join) {
							$join->on('tb_article.category_id', '=', 'tb_category.id_category');
						})
						->get();
		return $article;
    }
}
