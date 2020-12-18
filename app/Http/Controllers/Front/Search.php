<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Session;
use Request;
use App\Models\Front\Search_m;
use App\Models\Front\Home_m;


class Search extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
	public function search()
    {
		if (Request::has('keyword')) {
			
			$data = $this->general_settings();
			
			$keyword = Request::input('keyword'); 
			if(Request::input("keyword") == "")
			{
				$post[0] = 0;
			}else
			{	
				$data["keyword"] = $keyword;
				$post = (new Search_m)->get_article_by_keyword($data);
				if(count($post) == 0)
					$post[0] = 0;
			}
			
			
			//get random news
			$random_news = $this->get_random();
			
			$headline_news = $this->get_headline();;
			$popular_news = $this->get_popular();
		
			return view("Front/search")
				->with("general_settings", $data)
				->with("keyword", $keyword)
				->with("list_category", $data["list_category"])
				->with("article", $post)
				->with("random_news", $random_news)
				->with("popular_news", $popular_news)
				->with("headline_news", $headline_news);
    
		}
	}
	
    public function get_headline()
    {
		$news = (new Search_m)->get_headline_news();
		return $news;
    }
	
    public function get_popular()
    {
		$news = (new Home_m)->get_most_view_news();
		return $news;
    }
	
    public function get_random()
    {
		$news = (new Home_m)->get_random_news();
		return $news;
    }
	
}