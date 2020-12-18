<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Category_m extends Model
{
    protected $table = "tb_category";
	protected  $primaryKey = 'id_category';
	public $timestamps = false;
	
	public function get_all_category()
	{
		$category = Category_m::get();
		return $category;
	}	
	
	public function get_all_active_category()
	{
		$category = Category_m::where("status_category", 1)->get();
		return $category;
	}	
	
    public function get_category_by_id($id_category)
    {
		$category = Category_m::where("id_category", $id_category)->get();
		return $category;
    }
	
	public function insert_category($data)
	{
		$category = Category_m::insert($data);
		return $category;
	}
	
	public function update_category($data)
	{
		$category = Category_m::where("id_category", $data["id_category"])->update($data);
		return $category;
	}
	
	public function remove_category($id_category)
	{
		$article = DB::table('tb_article')->where("category_id", $id_category)->delete();
		$sub_category = DB::table('tb_sub_category')->where("category_id", $id_category)->delete();
		$category = Category_m::where("id_category", $id_category)->delete();
		return $category&&$sub_category&&$article;
	}
	
	public function get_all_sub_category()
	{
		$sub_category = DB::table('tb_sub_category')
						->join('tb_category', function ($join) {
							$join->on('tb_sub_category.category_id', '=', 'tb_category.id_category');
						})->get();
		return $sub_category;
	}	
	
    public function get_sub_category_by_id($id_sub_category)
    {
		$sub_category = DB::table('tb_sub_category')->where("id_sub_category", $id_sub_category)->get();
		return $sub_category;
    }
	
	public function insert_sub_category($data)
	{
		$sub_category = DB::table('tb_sub_category')->insert($data);
		return $sub_category;
	}
	
	public function update_sub_category($data)
	{
		$sub_category = DB::table('tb_sub_category')->where("id_sub_category", $data["id_sub_category"])->update($data);
		return $sub_category;
	}
	
	public function remove_sub_category($id_sub_category)
	{
		$article = DB::table('tb_article')->where("sub_category_id", $id_sub_category)->delete();
		$sub_category = DB::table('tb_sub_category')->where("id_sub_category", $id_sub_category)->delete();
		return $sub_category&&$article;
	}
}
