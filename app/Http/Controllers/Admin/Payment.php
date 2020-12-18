<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Session;


use App\Models\Admin\Payment_m;
use App\Models\Admin\Admin_m;

class Payment extends Controller
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
	
	public function list_payment()
    {
		$data = $this->general_settings();
		$payment = (new Payment_m)->get_all_payment();
		return view("Admin/payment/list_payment")->with("list_payment", $payment)->with("general_settings", $data);
    }
	
	public function list_writer()
    {
		$data = $this->general_settings();
		
		$res_paid = array();
		$res_unpaid = array();
		$writer = (new Admin_m)->get_all_admin();
		foreach($writer as $lw)
		{
			$sum = (new Payment_m)->get_total($lw->id_admin, 1);
			$paid = array(
							"id"=>$lw->id_admin,
							"sum"=>$sum
						);
						
			$sum = (new Payment_m)->get_total($lw->id_admin, 0);
			$unpaid = array(
							"id"=>$lw->id_admin,
							"sum"=>$sum
						);
						
			array_push($res_paid, $paid);
			array_push($res_unpaid, $unpaid);
		}
		return view("Admin/payment/list_writer")->with("list_paid", $res_paid)->with("list_unpaid", $res_unpaid)->with("list_writer", $writer)->with("general_settings", $data);
    }
	
	public function writer_article($id_writer)
    {
		$data = $this->general_settings();
		$article_writer = (new Payment_m)->get_writer_article($id_writer);
		return view("Admin/payment/list_article_writer")->with("article_writer", $article_writer)->with("general_settings", $data);
   }
	
	public function add_admin()
    {
		$data = $this->general_settings();
		$role_name = (new Admin_m)->get_role_name();
		return view("Admin/admin/add_admin")->with("role_name", $role_name)->with("general_settings", $data);
    }
	
	public function add_admin_action()
    {
		$password = "12345";
		$name_admin = request()->post("name_admin");
		$email_admin = request()->post("email_admin");
		$phone_admin = request()->post("phone_admin");
		$role_admin = request()->post("role_admin");
		$status_admin = request()->post("status_admin");
		
		if(request()->hasFile('photo_admin'))
		{			
			$image = request()->file('photo_admin');
			$name = time().'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/assets/images/admin/');
			$image->move($destinationPath, $name);
			
			$data_admin = array(
								"name_admin"=>$name_admin,
								"email_admin"=>$email_admin,
								"phone_admin"=>$phone_admin,
								"password_admin"=>$password,
								"role_admin"=>$role_admin,
								"photo_admin"=>$name,
								"status_admin"=>$status_admin,
							);
					
			$admin = (new Admin_m)->insert_admin($data_admin);
			if($admin)
				return redirect("admin/list_admin/");
			else
				return redirect("admin/add_admin/");
		}else
		{
			return redirect("admin/add_admin/");
		}
	}
	
	public function edit_admin($id_admin)
    {
		$data = $this->general_settings();
		$admin = (new Admin_m)->get_admin_by_id($id_admin);
		$role_name = (new Admin_m)->get_role_name();
		return view("Admin/admin/edit_admin")->with("admin_detail", $admin)->with("role_name", $role_name)->with("general_settings", $data);
    }
	
	public function edit_admin_action()
    {
		$id_admin = request()->post("id_admin");
		$name_admin = request()->post("name_admin");
		$email_admin = request()->post("email_admin");
		$phone_admin = request()->post("phone_admin");
		$role_admin = request()->post("role_admin");
		$status_admin = request()->post("status_admin");
		
		if(request()->hasFile('photo_admin'))
		{			
			$image = request()->file('photo_admin');
			$name = time().'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/assets/images/admin/');
			$image->move($destinationPath, $name);
			
			$data_admin = array(
								"id_admin"=>$id_admin,
								"name_admin"=>$name_admin,
								"email_admin"=>$email_admin,
								"phone_admin"=>$phone_admin,
								"role_admin"=>$role_admin,
								"photo_admin"=>$name,
								"status_admin"=>$status_admin,
							);
					
			$admin = (new Admin_m)->update_admin($data_admin);
			if($admin)
				return redirect("admin/edit_admin/".$id_admin);
			else
				return redirect("admin/edit_admin/".$id_admin);
		}else
		{
			$data_admin = array(
								"id_admin"=>$id_admin,
								"name_admin"=>$name_admin,
								"email_admin"=>$email_admin,
								"phone_admin"=>$phone_admin,
								"role_admin"=>$role_admin,
								"status_admin"=>$status_admin,
							);
					
			$admin = (new Admin_m)->update_admin($data_admin);
			if($admin)
				return redirect("admin/edit_admin/".$id_admin);
			else
				return redirect("admin/edit_admin/".$id_admin);
		}
		
	}
}