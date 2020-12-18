<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Session;


use App\Models\Admin\Subscriber_m;

class Subscriber extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
	public function __construct()
	{
		$this->check_login();
	}
	
	public function list_subscriber()
    {
		$data = $this->general_settings();
		$subs = (new Subscriber_m)->get_all_subscriber();
		return view("Admin/subscriber/list_subscriber")
			->with("list_subscriber", $subs)
			->with("general_settings", $data);
    }
	
	public function reload_status_subscriber()
	{
		$cek = 0;
		$id_subscriber = request()->post("id_subscriber");
		$stat = request()->post("stat");
		if($stat == 0)
			$cek = 1;
		
		$data = array("id_subscriber"=>$id_subscriber, "status_subscriber"=>$cek);
		$subs = (new Subscriber_m)->update_subscriber($data);
		
		echo $subs;
	}
	
}