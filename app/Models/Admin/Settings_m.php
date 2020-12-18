<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Settings_m extends Model
{
    protected $table = "tb_settings";
	protected  $primaryKey = 'id_settings';
	public $timestamps = false;
	
	public function get_general_settings()
	{
		$settings = Settings_m::where("id_settings", 1)->get();
		return $settings;
	}	
		
	public function update_general_settings($data)
	{
		$settings = DB::table('tb_settings')->where("id_settings", 1)->update($data);
		return $settings;
	}
	
	public function get_upload_settings()
	{
		$settings = DB::table('tb_settings_upload')->get();
		return $settings;
	}	
}
