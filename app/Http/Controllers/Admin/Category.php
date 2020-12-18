<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Session;


use App\Models\Admin\Category_m;

class Category extends Controller
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
	
	public function list_category()
    {
		$data = $this->general_settings();
		$category = (new Category_m)->get_all_category();
		return view("Admin/category/list_category")->with("list_category", $category)->with("general_settings", $data);
    }
	
	public function add_category()
    {
		$data = $this->general_settings();
		return view("Admin/category/add_category")->with("general_settings", $data);
    }
	
	public function add_category_action()
    {
		$name_category = request()->post("name_category");
		$status_category = request()->post("status_category");
		
		$image = request()->file('thumbnail_category');
		$name = time().'.'.$image->getClientOriginalExtension();
		$destinationPath = public_path('/assets/images/category/');
		$image->move($destinationPath, $name);
		
		$data_category = array(
							"name_category"=>$name_category,
							"thumbnail_category"=>$name,
							"status_category"=>$status_category,
							"status_deleted_category"=>0
						);
				
		$category = (new Category_m)->insert_category($data_category);
		if($category)
			return redirect("admin/list_category");
		else
			return redirect("admin/add_category");
		
	}
	
	public function edit_category($id_category)
    {
		$data = $this->general_settings();
		$category = (new Category_m)->get_category_by_id($id_category);
		return view("Admin/category/edit_category")->with("category_detail", $category)->with("general_settings", $data);
    }
	
	public function edit_category_action()
    {
		$id_category = request()->post("id_category");
		$name_category = request()->post("name_category");
		$status_category = request()->post("status_category");
		
		if(request()->hasFile('thumbnail_category'))
		{			
			$image = request()->file('thumbnail_category');
			$name = time().'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/assets/images/category/');
			$image->move($destinationPath, $name);
			
			$data_category = array(
								"id_category"=>$id_category,
								"name_category"=>$name_category,
								"thumbnail_category"=>$name,
								"status_category"=>$status_category,
							);
					
			$category = (new Category_m)->update_category($data_category);
			if($category)
				return redirect("admin/edit_category/".$id_category);
			else
				return redirect("admin/edit_category/".$id_category);
		}else
		{
			$data_category = array(
								"id_category"=>$id_category,
								"name_category"=>$name_category,
								"status_category"=>$status_category,
							);
					
			$category = (new Category_m)->update_category($data_category);
			if($category)
				return redirect("admin/edit_category/".$id_category);
			else
				return redirect("admin/edit_category/".$id_category);
		}
		
	}
	
	public function delete_category($id_category)
    {
		$data = $this->general_settings();
		$category = (new Category_m)->get_category_by_id($id_category);
		return view("Admin/category/delete_category")->with("category_detail", $category)->with("general_settings", $data);
    }
	
	public function delete_category_action()
    {
		$id_category = request()->post("id_category");
		$category = (new Category_m)->remove_category($id_category);
		if($category)
			return redirect("admin/list_category/");
		else
			return redirect("admin/list_category/");
		
	}
	
	public function list_sub_category()
    {
		$data = $this->general_settings();
		$sub_category = (new Category_m)->get_all_sub_category();
		return view("Admin/sub_category/list_sub_category")->with("list_sub_category", $sub_category)->with("general_settings", $data);
    }
	
	public function add_sub_category()
    {
		$data = $this->general_settings();
		$category = (new Category_m)->get_all_category();
		return view("Admin/sub_category/add_sub_category")->with("list_category", $category)->with("general_settings", $data);
    }
	
	public function add_sub_category_action()
    {
		$id_category = request()->post("id_category");
		$name_sub_category = request()->post("name_sub_category");
		$status_sub_category = request()->post("status_sub_category");
		
		$image = request()->file('thumbnail_sub_category');
		$name = time().'.'.$image->getClientOriginalExtension();
		$destinationPath = public_path('/assets/images/category/');
		$image->move($destinationPath, $name);
		
		$data_sub_category = array(
							"category_id"=>$id_category,
							"name_sub_category"=>$name_sub_category,
							"thumbnail_sub_category"=>$name,
							"status_sub_category"=>$status_sub_category,
							"status_deleted_sub_category"=>0,
						);
				
		$sub_category = (new Category_m)->insert_sub_category($data_sub_category);
		if($sub_category)
			return redirect("admin/list_sub_category");
		else
			return redirect("admin/add_sub_category");
		
	}
	
	public function edit_sub_category($id_sub_category)
    {
		$data = $this->general_settings();
		$category = (new Category_m)->get_all_category();
		$sub_category = (new Category_m)->get_sub_category_by_id($id_sub_category);
		return view("Admin/sub_category/edit_sub_category")->with("sub_category_detail", $sub_category)->with("list_category", $category)->with("general_settings", $data);
    }
	
	public function edit_sub_category_action()
    {
		$id_sub_category = request()->post("id_sub_category");
		$id_category = request()->post("id_category");
		$name_sub_category = request()->post("name_sub_category");
		$status_sub_category = request()->post("status_sub_category");
		
		if(request()->hasFile('thumbnail_sub_category'))
		{			
			$image = request()->file('thumbnail_sub_category');
			$name = time().'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/assets/images/category/');
			$image->move($destinationPath, $name);
			
			$data_sub_category = array(
								"id_sub_category"=>$id_sub_category,
								"name_sub_category"=>$name_sub_category,
								"thumbnail_sub_category"=>$name,
								"status_sub_category"=>$status_sub_category,
							);
					
			$sub_category = (new Category_m)->update_sub_category($data_sub_category);
			if($sub_category)
				return redirect("admin/edit_sub_category/".$id_sub_category);
			else
				return redirect("admin/edit_sub_category/".$id_sub_category);
		}else
		{
			$data_sub_category = array(
								"id_sub_category"=>$id_sub_category,
								"name_sub_category"=>$name_sub_category,
								"status_sub_category"=>$status_sub_category,
							);
					
			$sub_category = (new Category_m)->update_sub_category($data_sub_category);
			if($sub_category)
				return redirect("admin/edit_sub_category/".$id_sub_category);
			else
				return redirect("admin/edit_sub_category/".$id_sub_category);
		}
		
	}
	
	public function delete_sub_category($id_sub_category)
    {
		$data = $this->general_settings();
		$category = (new Category_m)->get_all_category();
		$sub_category = (new Category_m)->get_sub_category_by_id($id_sub_category);
		return view("Admin/sub_category/delete_sub_category")->with("sub_category_detail", $sub_category)->with("list_category", $category)->with("general_settings", $data);
    }
	
	public function delete_sub_category_action()
    {
		$id_sub_category = request()->post("id_sub_category");
		$sub_category = (new Category_m)->remove_sub_category($id_sub_category);
		if($sub_category)
			return redirect("admin/list_sub_category/");
		else
			return redirect("admin/list_sub_category/");
	}
	
}