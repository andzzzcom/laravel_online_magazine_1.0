<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Session;
use App\Models\Front\Home_m;


class Home extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
	public function home()
    {
		$data = $this->general_settings();
		
		//get headline news
		$headline_news = $this->get_headline();
		
		//get most view news
		$most_view_news = $this->get_most_view();
		
		//get random news
		$random_news = $this->get_random();
		
		//get economy news
		$economy = $this->get_news_cat(2);
		
		//get entertainment news
		$entertainment = $this->get_news_cat(3);
		
		return view("Front/home")
		->with("general_settings", $data)
		->with("list_category", $data["list_category"])
		->with("headline_news", $headline_news)
		->with("most_view_news", $most_view_news)
		->with("entertainment", $entertainment)
		->with("economy", $economy)
		->with("random_news", $random_news);
    }
	
	//get post by id url slug
	public function post($url_slug)
    {
		$data = $this->general_settings();
		
		$id_post = $this->get_id_post($url_slug);
		if($id_post == 0)
			return redirect('not_found');
		
		$data["id_article"] = $id_post;
		
		//get detail post & category post
		$post = (new Home_m)->get_article_by_id($data);
		$id_cat = $post[0]->category_id;
		
		//update & get counter post
		$counter_post = $this->update_counter($id_post);
		
		//get_headline_post
		$headline_news = $this->get_headline();
		
		//get most view news
		$most_view_news = $this->get_most_view();
		
		//get related news
		$related_news = $this->get_related_news($id_cat, $id_post);
				
		//get random news
		$random_news = $this->get_random();
		
		//get popular news
		$popular_news = $this->get_popular();
		
		//tag
		$tags = explode(",", $post[0]->tag_article);
		if($tags[0] == null)
			$tags = ["No Tag"];
		
		//get post comment
		$post_comment = $this->get_comment_post($id_post);
		
		/*
		echo "<pre>";
		print_r($post_comment);
		echo "</pre>";
		die();
		*/
		
		//set meta data page
		$data["meta_description"] = $data["meta_description"].": ".$post[0]->title_article;
		$data["meta_title"] = $data["meta_title"].": ".$post[0]->title_article;
		$data["meta_keywords"] = $data["meta_keywords"].": ".$post[0]->title_article;
		$data["title_web"] = $data["title_web"];
		
		return view("Front/post")
		->with("general_settings", $data)
		->with("list_category", $data["list_category"])
		->with("post", $post)
		->with("counter_post", $counter_post)
		->with("headline_news", $headline_news)
		->with("tags", $tags)
		->with("most_view_news", $most_view_news)
		->with("related_news", $related_news)
		->with("post_comment", $post_comment)
		->with("popular_news", $popular_news)
		->with("random_news", $random_news);
    }
	
	public function categories()
    {
		$data = $this->general_settings();
		
		//get random news
		$random_news = $this->get_random();
		
		$headline_news = $this->get_headline();
		$popular_news = $this->get_popular();
		
		//set meta data page(temporary comment)
		/*
		$data["meta_description"] = $page[0]->meta_description_page;
		$data["meta_title"] = $page[0]->meta_title_page;
		$data["meta_keywords"] = $page[0]->meta_keywords_page;
		*/
		
		return view("Front/category_all")
		->with("general_settings", $data)
		->with("list_category", $data["list_category"])
		->with("random_news", $random_news)
		->with("popular_news", $popular_news);
    }
	
	public function category($slug_cat)
    {
		$id_category = $this->get_id_cat($slug_cat);
		
		$data = $this->general_settings();
		$cat = (new Home_m)->get_category_by_id($id_category);
		if(count($cat) == 0)
			return redirect('not_found');
		
		$data["name_category"] = $cat[0]->name_category;
		$data["category_id"] = $cat[0]->id_category;
		$article = (new Home_m)->get_article_by_id_cat($data);
		if(count($article) == 0)
			$article[0] = 0;
		
		//get random news
		$random_news = $this->get_random();
		
		$headline_news = $this->get_headline();
		$popular_news = $this->get_popular();
		
		//set meta data page (temporary comment)
		/*
		$data["meta_description"] = $page[0]->meta_description_page;
		$data["meta_title"] = $page[0]->meta_title_page;
		$data["meta_keywords"] = $page[0]->meta_keywords_page;
		*/
		
		return view("Front/category")
		->with("general_settings", $data)
		->with("list_category", $data["list_category"])
		->with("category_id", $data["category_id"])
		->with("name_category", $data["name_category"])
		->with("random_news", $random_news)
		->with("popular_news", $popular_news)
		->with("article", $article);
    }
	
	public function page($url_slug)
	{
		$page = (new Home_m)->get_page_by_slug($url_slug);
		if(count($page) == 0)
			return redirect("not_found");
		
		$data = $this->general_settings();
		
		//get random news
		$random_news = $this->get_random();
		
		$headline_news = $this->get_headline();
		$popular_news = $this->get_popular();
		
		//set meta data page
		$data["meta_description"] = $page[0]->meta_description_page;
		$data["meta_title"] = $page[0]->meta_title_page;
		$data["meta_keywords"] = $page[0]->meta_keywords_page;
		$data["title_web"] = $page[0]->name_page.": ".$data["title_web"];
		
		return view("Front/custom_page")
		->with("general_settings", $data)
		->with("list_category", $data["list_category"])
		->with("detail_page", $page)
		->with("random_news", $random_news)
		->with("popular_news", $popular_news);
	}
	
	public function submitComment()
	{
		//post data from ajax
		$name = request()->post("name");
		$email = request()->post("email");
		$title = request()->post("title");
		$comment = request()->post("comment");
		$article_id = request()->post("article_id");
		$ip_address = request()->ip();
		
		//append data to array
		$data = array(
					"sender_name_comment"=>$name,
					"sender_email_comment"=>$email,
					"sender_ip_comment"=>$ip_address,
					"article_id"=>$article_id,
					"title_comment"=>$title,
					"content_comment"=>$comment,
					"status_deleted_comment"=>0,
					"status_comment"=>1,
				);
		
		
		///insert comment to database and check whether its inserted or not
		$comment = (new Home_m)->insert_comment_post($data);
		if($comment ==1)
			echo 1;
		else
			echo 0;
	}
	
	public function subscribe()
	{
		//post data from ajax
		$email = request()->post("emailSubs");
		
		//append data to array
		$data = array(
					"email_subscriber"=>$email,
					"status_subscriber"=>1,
				);
		
		//check if email already subscribe
		$subs = (new Home_m)->get_subscriber_by_email($email);
		if(count($subs) == 0)
		{
			
			///insert subscriber to database and check whether its inserted or not
			$subs = (new Home_m)->insert_subscriber($data);
			if($subs == 1)
				echo 1;
			else
				echo 0;
			
		}else
		{
			echo 0;
		}
		
		
	}
	
    public function get_news_cat($cat)
    {
		$data["category_id"] = $cat;
		$news = (new Home_m)->get_article_by_id_cat($data);
		return $news;
    }
	
    public function get_headline()
    {
		$news = (new Home_m)->get_headline_news();
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
	
    public function get_most_view()
    {
		$news = (new Home_m)->get_most_view_news();
		return $news;
    }
	
    public function get_related_news($id_sub_cat, $id_post=0)
    {
		$news = (new Home_m)->get_related_news($id_sub_cat, $id_post);
		return $news;
    }
	
    public function get_comment_post($id_post)
    {
		$comment = (new Home_m)->get_post_comment($id_post);
		return $comment;
    }
	
	private function get_id_post($url_slug)
	{
		$t = explode("/", $url_slug);
		$datetime = $t[0]."/".$t[1]."/".$t[2]."/".$t[3];
		
		$datetime_copy="";
		$post = (new Home_m)->get_all_article();
		foreach($post as $p)
		{
			$datetime_copy = date("Y/m/d/His", strtotime($p->created_date_article));
			if((str_slug($p->title_article) == $t[4]) && ($datetime_copy == $datetime))
			{
				return $p->id_article;
			}
		}
		return 0;
	}
	
	private function get_id_cat($url_slug)
	{
		$cat = (new Home_m)->get_all_category();
		foreach($cat as $p)
		{
			if(str_slug($p->name_category) == $url_slug)
			{
				return $p->id_category;
			}
		}
		return 0;
	}
	
	private function update_counter($id)
	{
		return (new Home_m)->update_counter_post($id)[0]->view_article;
	}
	
}