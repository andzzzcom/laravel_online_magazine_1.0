<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Session;


use App\Models\Admin\Settings_m;

class Settings extends Controller
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
	
	public function edit_general_settings()
    {
		$data = $this->general_settings();
		$settings = (new Settings_m)->get_general_settings();
		return view("Admin/settings/general_settings")->with("general_settings_data", $settings)->with("general_settings", $data);
    }
	
	public function edit_general_settings_action()
    {		
		$title_web = request()->post("title_web");
		$subtitle_web = request()->post("subtitle_web");
		$title_admin_panel = request()->post("title_admin_panel");
		$title_admin_panel_minimize = request()->post("title_admin_panel_minimize");
		$url_facebook = request()->post("url_facebook");
		$url_twitter = request()->post("url_twitter");
		$url_instagram = request()->post("url_instagram");
		$meta_title = request()->post("meta_title");
		$meta_description = request()->post("meta_description");
		$meta_keywords = request()->post("meta_keywords");
		
		if(request()->hasFile('fav_icon'))
		{			
			$image = request()->file('fav_icon');
			$name = $image->getClientOriginalName();
			$destinationPath = public_path('/assets/theme1/images/settings/');
			$image->move($destinationPath, $name);
			
			$data_settings = array(
								"fav_icon"=>$name,
							);
			$settings = (new Settings_m)->update_general_settings($data_settings);
			
		}
		
		if(request()->hasFile('logo_web'))
		{			
			$image = request()->file('logo_web');
			$name = $image->getClientOriginalName();
			$destinationPath = public_path('/assets/images/settings/');
			$image->move($destinationPath, $name);
			
			$data_settings = array(
								"logo_web"=>$name,
							);
			$settings = (new Settings_m)->update_general_settings($data_settings);
			
		}
		
		$data_settings = array(
							"title_web"=>$title_web,
							"subtitle_web"=>$subtitle_web,
							"title_admin_panel"=>$title_admin_panel,
							"title_admin_panel_minimize"=>$title_admin_panel_minimize,
							"url_facebook"=>$url_facebook,
							"url_twitter"=>$url_twitter,
							"url_instagram"=>$url_instagram,
							"meta_title"=>$meta_title,
							"meta_description"=>$meta_description,
							"meta_keywords"=>$meta_keywords,
						);
		$settings = (new Settings_m)->update_general_settings($data_settings);
		if($settings)
		{			
			return redirect("admin/edit_general_settings/");
			
		}else
		{
			return redirect("admin/edit_general_settings/");
		}
	}
	
	public function edit_banner_main()
    {
		$data = $this->general_settings();
		$settings = (new Settings_m)->get_general_settings();
		return view("Admin/settings/banner_main")
			->with("general_settings_data", $settings)
			->with("general_settings", $data);
    }
	
	public function edit_banner_main_action()
    {		
		if(request()->hasFile('banner_main'))
		{			
			$image = request()->file('banner_main');
			$name = "banner.jpg";
			$destinationPath = public_path('/assets/theme1/images/settings/');
			$image->move($destinationPath, $name);
			
			$data_settings = array(
								"banner_main"=>$name,
							);
			$settings = (new Settings_m)->update_general_settings($data_settings);
			if($settings)
			{			
				return redirect("admin/edit_banner_main/");
				
			}else
			{
				return redirect("admin/edit_banner_main/");
			}
		}else
		{
			return redirect("admin/edit_banner_main/");
		}
	}
	
	public function upload_settings()
    {
		$data = $this->general_settings();
		$settings = (new Settings_m)->get_upload_settings();
		return view("Admin/settings/upload_settings")->with("upload_settings", $settings)->with("general_settings", $data);
    }
}