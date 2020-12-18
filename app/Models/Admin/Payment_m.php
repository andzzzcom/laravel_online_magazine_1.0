<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Payment_m extends Model
{
    protected $table = "tb_payment";
	protected  $primaryKey = 'id_payment';
	public $timestamps = false;
	
	public function get_all_payment()
	{
		$payment = DB::table("tb_payment")
		->join("tb_article", "tb_article.id_article", "=", "tb_payment.article_id_payment")
		->join("tb_admin", "tb_admin.id_admin", "=", "tb_payment.admin_id_payment")
		->get();
		return $payment;
	}	
	
    public function get_article_by_id($id_article)
    {
		$article = Article_m::where("id_article", $id_article)->get();
		return $article;
    }
	
    public function get_writer_article($id_writer)
    {
		$payment = DB::table("tb_payment")
		->join("tb_admin", "tb_admin.id_admin", "=", "tb_payment.admin_id_payment")
		->join("tb_article", "tb_article.id_article", "=", "tb_payment.article_id_payment")
		->where("tb_payment.admin_id_payment", $id_writer)
		->where("tb_article.status_article", 1)
		->where("tb_article.status_deleted_article", 0)
		->get();
		return $payment;
    }
	
	public function insert_payment($data)
	{
		$payment = Payment_m::insert($data);
		return $payment;
	}
	
    public function get_total($id_writer, $paid)
    {
		$payment = DB::table("tb_payment")
		->where("tb_payment.admin_id_payment", $id_writer)
		->where("tb_payment.status_payment", $paid)
		->sum("tb_payment.fee_level_payment");
		return $payment;
    }
	
	
	public function update_article($data)
	{
		$article = Article_m::where("id_article", $data["id_article"])->update($data);
		return $article;
	}
	
	public function remove_article($id_article)
	{
		$article = Article_m::where("id_article", $id_article)->delete();
		$comment = DB::table('tb_comment')->where("article_id", $id_article)->delete();
		return $article&&$comment;
	}
}
