<?php

namespace App\Models\Front;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Home_m extends Model
{
    protected $table = "tb_article";
	protected  $primaryKey = 'id_article';
	public $timestamps = false;
	
	public function get_random_news()
	{
		$admin = DB::table('tb_article')
						->join('tb_admin', function ($join) {
							$join->on('tb_article.admin_id', '=', 'tb_admin.id_admin');
						})
						->join('tb_category', function ($join) {
							$join->on('tb_category.id_category', '=', 'tb_article.category_id');
						})
						->where("status_article", 1)
						->whereNotIn("status_deleted_article", [1])
						->limit(7)
						->orderBy("id_article", "desc")
						->get();
		return $admin;
	}	
	
	public function get_headline_news()
	{
		$admin = DB::table('tb_article')
						->join('tb_admin', function ($join) {
							$join->on('tb_article.admin_id', '=', 'tb_admin.id_admin');
						})
						->join('tb_category', function ($join) {
							$join->on('tb_category.id_category', '=', 'tb_article.category_id');
						})
						->where("status_headline_article", 1)
						->where("status_article", 1)
						->whereNotIn("status_deleted_article", [1])
						->orderBy("id_article", "desc")
						->limit(3)
						->get();
		return $admin;
	}	
	
	public function get_most_view_news()
	{
		$admin = DB::table('tb_article')
						->join('tb_admin', function ($join) {
							$join->on('tb_article.admin_id', '=', 'tb_admin.id_admin');
						})
						->join('tb_category', function ($join) {
							$join->on('tb_category.id_category', '=', 'tb_article.category_id');
						})
						->where("status_article", 1)
						->whereNotIn("status_deleted_article", [1])
						->limit(5)
						->orderBy("tb_article.view_article", "desc")
						->get();
		return $admin;
	}	
	
	public function get_related_news($id_cat, $id_post=0)
	{
		$admin = DB::table('tb_article')
						->join('tb_admin', function ($join) {
							$join->on('tb_article.admin_id', '=', 'tb_admin.id_admin');
						})
						->join('tb_category', function ($join) {
							$join->on('tb_category.id_category', '=', 'tb_article.category_id');
						})
						->where("tb_article.category_id", $id_cat)
						->where("status_article", 1)
						->whereNotIn("status_deleted_article", [1])
						->whereNotIn("id_article", [$id_post])
						->orderBy("tb_article.view_article", "RAND()")
						->limit(5)
						->get();
		return $admin;
	}	
	
	public function get_all_category()
	{
		$cat = DB::table('tb_category')
						->where("status_category", 1)
						->whereNotIn("status_deleted_category", [1])
						->get();
		return $cat;
	}	
	
    public function get_category_by_id($id_cat)
    {
		$cat = DB::table('tb_category')
						->where("id_category", $id_cat)
						->where("status_category", 1)
						->whereNotIn("status_deleted_category", [1])
						->get();
		return $cat;
    }
	
	public function get_all_article()
	{
		$article = Home_m::get();
		return $article;
	}	
	
    public function get_article_by_id($data)
    {
		$article = DB::table('tb_article')
						->join('tb_admin', function ($join) {
							$join->on('tb_article.admin_id', '=', 'tb_admin.id_admin');
						})
						->join('tb_category', function ($join) {
							$join->on('tb_article.category_id', '=', 'tb_category.id_category');
						})
						->where("id_article", $data["id_article"])->get();
		return $article;
    }
	
    public function get_article_by_id_cat($data)
    {
		$article = DB::table('tb_article')
						->join('tb_admin', function ($join) {
							$join->on('tb_article.admin_id', '=', 'tb_admin.id_admin');
						})
						->join('tb_category', function ($join) {
							$join->on('tb_article.category_id', '=', 'tb_category.id_category');
						})
						->where("category_id", $data["category_id"])
						->orderBy("id_article", "desc")
						->get();
		return $article;
    }
	
    public function get_article_by_slug($title)
    {
		$article = DB::table('tb_article')
						->join('tb_admin', function ($join) {
							$join->on('tb_article.admin_id', '=', 'tb_admin.id_admin');
						})->where('tb_article.title_article', '=', $title)->get();
		return $article;
    }
	
    public function get_post_comment($id_post)
    {
		$comment = DB::table('tb_comment')
						->where("article_id", $id_post)
						->where("status_comment", 1)
						->whereNotIn("status_deleted_comment", [1])
						->orderBy("id_comment", "desc")
						->get();
		return $comment;
    }
	
	public function update_counter_post($id)
	{
		$article = DB::table('tb_article')
						->where("id_article", $id);
		$article->increment('view_article');
		return $article->get();
	}
	
	public function insert_comment_post($data)
	{
		$comment = DB::table('tb_comment')
						->insert($data);
		return $comment;
	}
	
	public function insert_subscriber($data)
	{
		$subs = DB::table('tb_subscriber')
						->insert($data);
		return $subs;
	}
	
	public function get_subscriber_by_email($email)
	{
		$subs = DB::table('tb_subscriber')
					->where("email_subscriber", $email)
					->get();
		return $subs;
	}	
	
    public function get_page_by_slug($slug)
    {
		$page = DB::table('tb_custom_page')
						->where("slug_page", $slug)
						->whereNotIn("status_page", [-1])
						->get();
		return $page;
    }
}
