<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Subscriber_m extends Model
{
    protected $table = "tb_subscriber";
	protected  $primaryKey = 'id_subscriber';
	public $timestamps = false;
	
	public function get_all_subscriber()
	{
		$subs = Subscriber_m::whereNotIn("status_subscriber", [-1])
					->orderBy("id_subscriber", "desc")
					->get();
		return $subs;
	}	
	
	public function update_subscriber($data)
	{
		$subs = Subscriber_m::where("id_subscriber", $data["id_subscriber"])->update($data);
		return $subs;
	}
	
}
