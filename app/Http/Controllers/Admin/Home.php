<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Session;
use Hash;


use App\Models\Admin\Home_m;
use App\Models\Admin\Article_m;
use App\Models\Admin\Role_m;

class Home extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
	public function login()
    {
		$data = $this->general_settings();
		return view("Admin/login")
		->with("general_settings", $data);
    }
	
    public function login_action()
    {
		$email = request()->post("email");
		$password = (request()->post("password"));
		$data = array(
					"email_admin"=>$email
				);
		$login = (new Home_m)->get_admin_data($data);
		if($login->count() > 0)
		{
			$pass_key = $login[0]->password_admin;		
			if (Hash::check($password, $pass_key)) 
			{				
				/*
				echo"<pre>";
				print_r($list);
				echo"</pre>";
				die();
				*/
				
				$id_admin = $login[0]->id_admin;
				$name_admin = $login[0]->name_admin;		
				$photo_admin = $login[0]->photo_admin;		
				$name_role = $login[0]->name_role;		
				Session::put('id_admin', $id_admin);
				Session::put('email_admin', $email);
				Session::put('name_admin', $name_admin);
				Session::put('photo_admin', $photo_admin);
				Session::put('name_role', $name_role);
				Session::put('csrf_admin', csrf_token());
				
				return redirect("admin/home");
			}else
			{
				return redirect("admin/login");
			}
		}
		else
		{
			return redirect("admin/login");
		}
    }
	
	public function home()
    {
		if( empty (Session :: get ('email_admin')))
			return redirect("admin/login");
		
		$email = Session::get('email_admin');
		$data = array(
					"email_admin"=>$email
				);
		$data_admin  = (new Home_m)->get_admin_data($data);
		$role 		 = $data_admin[0]->role_admin;
		$list_menu	 = (new Role_m)->get_role_menu_by_id($role);
		
		$list = array();
		foreach($list_menu as $l)
		{
			array_push($list, $l->name_menu);
		}
		//print_r($list);
		
		Session::put('list_permissions', $list);
		
		$article = (new Article_m)->get_all_article();
		$data = $this->general_settings();
		return view("Admin/home")
		->with("list_article", $article)
		->with("general_settings", $data);
    }
	
	public function logout()
    {
		session()->flush();
		return redirect("admin/login");
    }
	
    public function get_article_by_id()
    {
		$article = Article_m::where("id_artikel", 2)->get();
		
		echo"<pre>";
		print_r($article);
		echo"</pre>";
    }
	
    public function add_article()
    {
		$article = new Article_m();
		$article->judul_artikel = "artikel baru nih";
		$article->isi_artikel = "isinya random";
		$article->thumbnail_artikel = "a.png";
		$article->id_subkategori_artikel = "1";
		$article->id_writer_creator = "2";
		$article->last_updated_writer = "1111";
		$article->last_updated_date = "22222";
		$article->created_date = "1111";
		$article->status_artikel = "111";
		$article->save();
		if($article)
			echo"success added";
		else
			echo"failed added";
		
		echo"<pre>";
		print_r($article);
		echo"</pre>";
    }
	
    public function edit_article()
    {
		$article = Article_m::find(7);
		$article->judul_artikel = "artikel baru nih2";
		$article->isi_artikel = "isinya random";
		$article->thumbnail_artikel = "a.png";
		$article->id_subkategori_artikel = "1";
		$article->id_writer_creator = "2";
		$article->last_updated_writer = "1111";
		$article->last_updated_date = "22222";
		$article->created_date = "1111";
		$article->status_artikel = "111";
		$article->save();
		if($article)
			echo"success updated";
		else
			echo"failed updated";
		
		echo"<pre>";
		print_r($article);
		echo"</pre>";
    }
	
    public function delete_article()
    {
		$article = Article_m::find(7);
		$article->delete();
		if($article)
			echo"success deleted";
		else
			echo"failed deleted";
		
		echo"<pre>";
		print_r($article);
		echo"</pre>";
    }
}