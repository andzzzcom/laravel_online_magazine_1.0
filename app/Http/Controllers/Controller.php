<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Admin\Category_m;
use App\Models\Admin\Settings_m;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	public function __construct()
    {
		
    }
	
	public function general_settings()
	{
		$category = (new Category_m)->get_all_active_category();
		
		$general_settings = (new Settings_m)->get_general_settings();
		$settings["favicon"] = $general_settings[0]->fav_icon;
		$settings["logo_web"] = $general_settings[0]->logo_web;
		$settings["title_web"] = $general_settings[0]->title_web;
		$settings["title_admin_panel"] = $general_settings[0]->title_admin_panel;
		$settings["csrf_admin"] = Session::get("csrf_admin");
		$settings["list_category"] = $category;
		
		//set meta data page
		$settings["meta_description"] = $general_settings[0]->meta_description;
		$settings["meta_title"] = $general_settings[0]->meta_title;
		$settings["meta_keywords"] = $general_settings[0]->meta_keywords;
		
		return $settings;
	}
	
	public function check_login()
	{
		$this->middleware(function ($request, $next) {
			if(Session::get('list_permissions') == NULL)
			{
				return redirect("admin/login");
			}else{
				return $next($request);
			}
		});
	}
}
