@extends("Front.incl.layout")

	
	@section("content")
    <div class="main-container container" id="main-container">         


      <!-- Ad Banner 728 -->
      <div class="text-center pb-48">
        <a href="#">
          <img src="img/content/placeholder_728.jpg" alt="">
        </a>
      </div>

      <!-- More Politics News -->
      <section class="section mb-24">
        
        <div class="row row-20">
          <div class="col-md-6">
            <article class="entry thumb thumb--size-3 thumb--mb-20">
              <div class="entry__img-holder thumb__img-holder" style="background-image: url('{{ asset('assets/images/article/'.$headline_news[0]->thumbnail_article) }}');">
                <div class="bottom-gradient"></div>
                <div class="thumb-text-holder thumb-text-holder--2">
                  <ul class="entry__meta">
                    <li>
                      <a href="{{ url('category/'.str_slug($headline_news[0]->name_category)) }}" class="entry__meta-category">{{$headline_news[0]->name_category}}</a>
                    </li>
                  </ul>
                  <h2 class="thumb-entry-title">
                    <a href="post/{{ date('Y/m/d/His', strtotime($headline_news[0]->created_date_article)) }}/{{str_slug($headline_news[0]->title_article)}}">{{$headline_news[0]->title_article}}</a>
                  </h2>
                  <ul class="entry__meta">
                    <li>
                      <a href="#" class="entry__meta-category">
						{{ date('d-F-Y H:i', strtotime($headline_news[0]->created_date_article)) }}
					  </a>
                    </li>
                  </ul>
                  <ul class="entry__meta">
                    <li class="entry__meta-views">
                      <i class="ui-eye"></i>
                      <span>{{$headline_news[0]->view_article}}</span>
                    </li>
                    <li class="entry__meta-comments">
                      <a href="#">
                        <i class="ui-chat-empty"></i>13
                      </a>
                    </li>
                  </ul>
                </div>
                <a href="post/{{ date('Y/m/d/His', strtotime($headline_news[0]->created_date_article)) }}/{{str_slug($headline_news[0]->title_article)}}" class="thumb-url"></a>
              </div>
            </article>
          </div>
		  
          <div class="col-md-3">
            <article class="entry">
              <div class="entry__img-holder">
                <a href="post/{{ date('Y/m/d/His', strtotime($headline_news[1]->created_date_article)) }}/{{str_slug($headline_news[1]->title_article)}}">
                  <div class="thumb-container thumb-65">
                    <img data-src="{{asset('assets/images/article/'.$headline_news[1]->thumbnail_article)}}" src="{{asset('assets/images/article/'.$headline_news[1]->thumbnail_article)}}" class="entry__img lazyload" alt="">
                  </div>
                </a>
              </div>
              <div class="entry__body">
                <div class="entry__header">
                  <ul class="entry__meta">
                    <li>
                      <a href="{{ url('category/'.str_slug($headline_news[1]->name_category)) }}" class="entry__meta-category">{{$headline_news[1]->name_category}}</a>
                    </li>
                  </ul>                 
                  <h2 class="entry__title" style="height:50px;">
                    <a href="post/{{ date('Y/m/d/His', strtotime($headline_news[1]->created_date_article)) }}/{{str_slug($headline_news[1]->title_article)}}">{{$headline_news[1]->title_article}}</a>
                  </h2>       
				  <div class="entry__meta" style="margin-top:0px">
                    <p style=";font-size:14px">{{ date('d-F-Y H:i', strtotime($headline_news[1]->created_date_article)) }}</p>
                  </div>     
                  <ul class="entry__meta" style=";margin-top:0px">
                    <li class="entry__meta-views">
                      <i class="ui-eye"></i>
                      <span>{{$headline_news[1]->view_article}}</span>
                    </li>
                    <li class="entry__meta-comments">
                      <a href="#">
                        <i class="ui-chat-empty"></i>13
                      </a>
                    </li>
                  </ul>           
				  <div class="entry__meta" style="text-align:justify;margin-top:10px">
                    <p style=";font-size:14px">{{ $headline_news[1]->short_description_article }}</p>
                  </div>    
                </div>
              </div>
            </article>
          </div>          
		  
          <div class="col-md-3">
            <article class="entry">
              <div class="entry__img-holder">
                <a href="post/{{ date('Y/m/d/His', strtotime($headline_news[2]->created_date_article)) }}/{{str_slug($headline_news[2]->title_article)}}">
                  <div class="thumb-container thumb-65">
                    <img data-src="{{asset('assets/images/article/'.$headline_news[2]->thumbnail_article)}}" src="{{asset('assets/images/article/'.$headline_news[2]->thumbnail_article)}}" class="entry__img lazyload" alt="">
                  </div>
                </a>
              </div>

              <div class="entry__body">
                <div class="entry__header">
                  <ul class="entry__meta">
                    <li>
                      <a href="{{ url('category/'.str_slug($headline_news[2]->name_category)) }}" class="entry__meta-category">{{$headline_news[2]->name_category}}</a>
                    </li>
                  </ul>                 
                  <h2 class="entry__title" style="height:50px;">
                    <a href="post/{{ date('Y/m/d/His', strtotime($headline_news[2]->created_date_article)) }}/{{str_slug($headline_news[2]->title_article)}}">{{$headline_news[2]->title_article}}</a>
                  </h2>     
				  <div class="entry__meta" style="margin-top:0px">
                    <p style=";font-size:14px">{{ date('d-F-Y H:i', strtotime($headline_news[2]->created_date_article)) }}</p>
                  </div>      
                  <ul class="entry__meta" style=";margin-top:0px">
                    <li class="entry__meta-views">
                      <i class="ui-eye"></i>
                      <span>{{$headline_news[2]->view_article}}</span>
                    </li>
                    <li class="entry__meta-comments">
                      <a href="#">
                        <i class="ui-chat-empty"></i>13
                      </a>
                    </li>
                  </ul>                
				  <div class="entry__meta" style="text-align:justify;margin-top:10px">
                    <p style=";font-size:14px">{{ $headline_news[2]->short_description_article }}</p>
                  </div>   
                </div>
              </div>
            </article>
          </div>
        </div>
      </section> <!-- end more politics news -->





      <!-- Carousel posts -->
      <section class="section mb-24">
        <div class="title-wrap title-wrap--line title-wrap--pr">
          <h3 class="section-title">Latest News</h3>
        </div>

        <!-- Slider -->
        <div id="owl-posts"class="owl-carousel owl-theme owl-carousel--arrows-outside">
		
			@foreach($random_news as $news)
			  <article class="entry" style="height:280px;width:100%;text-align:center">
				<div class="entry__body">
				  <div class="entry__header">
					<ul class="entry__meta">
					  <li>
						<img style="max-height:150px;width:auto;max-width:320px" data-src="{{asset('assets/images/article/'.$news->thumbnail_article)}}" src="{{asset('assets/images/article/'.$news->thumbnail_article)}}" class="entry__img lazyload" alt="">
					  </li>
					</ul>                  
					<h2 class="entry__title" style="height:50px">
					  <a href="post/{{ date('Y/m/d/His', strtotime($news->created_date_article)) }}/{{str_slug($news->title_article)}}">{{$news->title_article}}</a>
					</h2>           
					<ul>
					  <li>
						<a style="font-size:14px;font-weight:bold" href="{{url('category/'.str_slug($news->name_category))}}">{{$news->name_category}}</a>
					  </li>
					  <li style="font-size:12px;font-weight:bold">
						{{ date('d/M/y H:i:s', strtotime($news->created_date_article)) }} 
					  </li>
					</ul>                           
				  </div>
				</div>
			  </article>
			@endforeach
	  
        </div> <!-- end slider -->
      </section> <!-- end carousel posts -->





      <!-- Content -->
      <div class="row row-20">    
        <!-- Posts -->
        <div class="col-lg-6 order-lg-2">
          <section class="section mb-16">
		  			
            <div class="row row-20">
			
			@foreach($entertainment->slice(0,4) as $news)
              <div class="col-md-6">
                <article class="entry">
                  <div class="entry__img-holder">
                    <a href="post/{{ date('Y/m/d/His', strtotime($news->created_date_article)) }}/{{str_slug($news->title_article)}}">
                      <div class="thumb-container thumb-65">
                        <img data-src="{{asset('assets/images/article/'.$news->thumbnail_article)}}" src="{{asset('assets/images/article/'.$news->thumbnail_article)}}" class="entry__img lazyload" alt="{{$news->thumbnail_article}}" />
                      </div>
                    </a>
                  </div>
                  <div class="entry__body">
                    <div class="entry__header">
                      <ul class="entry__meta">
                        <li>
                          <a href="#" class="entry__meta-category">{{ $news->name_category }}</a>
                        </li>
                      </ul>                     
                      <h2 class="entry__title">
                        <a href="post/{{ date('Y/m/d/His', strtotime($news->created_date_article)) }}/{{str_slug($news->title_article)}}">{{ $news->title_article }}</a>
                      </h2>                      
                    </div>
                    <div class="entry__excerpt">
                      <p>{{ $news->short_description_article }}</p>
                    </div>
                  </div>
                </article>
              </div>
			@endforeach
			  
            </div>          
			
          </section>
        </div> <!-- end posts -->

        <!-- Sidebar -->
        <aside class="col-lg-3 sidebar order-lg-1">
          <!-- Widget Headlines -->
          <aside class="widget widget-headlines">
            <h4 class="widget-title">Profile</h4>
            <!-- Slider -->
            <div id="owl-headlines" class="owl-carousel owl-theme">
              <div class="owl-item">
                <ul class="post-list-small post-list-small--1">
				
				@foreach($random_news as $news)
                  <li class="post-list-small__item">
                    <article class="post-list-small__entry clearfix">
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                          <a href="post/{{ date('Y/m/d/His', strtotime($news->created_date_article)) }}/{{str_slug($news->title_article)}}">{{$news->title_article}}</a>
                        </h3>
                      </div>                  
                    </article>
                  </li>
				@endforeach
				  
                </ul>
              </div>
            </div> <!-- end slider -->

            <!-- Slider nav
            <div class="owl-custom-nav text-center">
              <button class="owl-custom-nav__btn owl-custom-nav__btn--prev" aria-label="previous slide">
                <i class="ui-arrow-left"></i>
                <span class="owl-custom-nav__label">Prev</span>
              </button>
              <button class="owl-custom-nav__btn owl-custom-nav__btn--next" aria-label="next slide">
                <span class="owl-custom-nav__label">Next</span>
                <i class="ui-arrow-right"></i>
              </button>
            </div>-->

          </aside> <!-- end widget headlines -->
        </aside> <!-- end sidebar -->

        <!-- Sidebar -->
        <aside class="col-lg-3 sidebar order-lg-3">
          <!-- Widget Popular Posts -->
          <aside class="widget widget-popular-posts">
            <h4 class="widget-title">Comedy</h4>
            <ul class="post-list-small post-list-small--1">
			
			@foreach($random_news as $news)
              <li class="post-list-small__item">
                <article class="post-list-small__entry clearfix">
                  <div class="post-list-small__img-holder">
                    <div class="thumb-container thumb-80">
                      <a href="post/{{ date('Y/m/d/His', strtotime($news->created_date_article)) }}/{{str_slug($news->title_article)}}">
                        <img data-src="{{url('assets/images/article/'.$news->thumbnail_article)}}" src="{{url('assets/images/article/'.$news->thumbnail_article)}}" alt="" class=" lazyload">
                      </a>
                    </div>
                  </div>
                  <div class="post-list-small__body">
                    <h3 class="post-list-small__entry-title">
                      <a href="post/{{ date('Y/m/d/His', strtotime($news->created_date_article)) }}/{{str_slug($news->title_article)}}">{{$news->title_article}}</a>
                    </h3>
                  </div>                  
                </article>
              </li>
			@endforeach
              
            </ul>           
          </aside> <!-- end widget popular posts -->
        </aside> <!-- end sidebar -->
  
      </div> <!-- end content -->
	  
	  
	  
      <!-- Most Viewed -->
      <section class="section mb-32">
        <div class="title-wrap title-wrap--line">
          <h3 class="section-title">Most Viewed</h3>
        </div>
        <div class="row">
		
          <div class="col-lg-4">
            <ul class="post-list-small post-list-small--2 mb-32">
			@foreach($most_view_news->slice(0, 3) as $news)
              <li class="post-list-small__item">
                <article class="post-list-small__entry clearfix">
                  <div class="post-list-small__img-holder">
                    <div class="thumb-container thumb-70" style="background:none">
                      <a href="post/{{ date('Y/m/d/His', strtotime($news->created_date_article)) }}/{{str_slug($news->title_article)}}">
                        <img style="max-height:60px;width:auto" data-src="{{asset('assets/images/article/'.$news->thumbnail_article)}}" src="{{asset('assets/images/empty.png')}}" alt="" class=" lazyload">
                      </a>
                    </div>
                  </div>
                  <div class="post-list-small__body">
                    <h2 class="post-list-small__entry-title">
						<a href="post/{{ date('Y/m/d/His', strtotime($news->created_date_article)) }}/{{str_slug($news->title_article)}}">{{$news->title_article}}</a>
                    </h2>
					<h6 style="font-size:12px;font-weight:bold;margin-top:10px;">
						{{ date('d-F-Y H:i', strtotime($news->created_date_article)) }} 
					</h6>
					<h6>
						<a href="{{url('/post/'.$news->id_article)}}" class="entry__meta-category">{{$news->name_admin}}</a>
					</h6>
					<ul class="entry__meta">
						<li class="entry__meta-views">
						  <i class="ui-eye"></i>
						  <span>{{$news->view_article}}</span>
						</li>
						<li class="entry__meta-comments">
						  <a href="#">
							<i class="ui-chat-empty"></i>13
						  </a>
						</li>
					</ul>
                  </div>                  
                </article>
              </li>
			@endforeach
            </ul> 
          </div>
		  
		  <div class="col-lg-4">
            <ul class="post-list-small post-list-small--2 mb-32">
			@foreach($most_view_news->slice(0, 3) as $news)
              <li class="post-list-small__item">
                <article class="post-list-small__entry clearfix">
                  <div class="post-list-small__img-holder">
                    <div class="thumb-container thumb-70" style="background:none">
                      <a href="post/{{ date('Y/m/d/His', strtotime($news->created_date_article)) }}/{{str_slug($news->title_article)}}">
                        <img style="max-height:60px;width:auto" data-src="{{asset('assets/images/article/'.$news->thumbnail_article)}}" src="{{asset('assets/images/empty.png')}}" alt="" class=" lazyload">
                      </a>
                    </div>
                  </div>
                  <div class="post-list-small__body">
                    <h2 class="post-list-small__entry-title">
						<a href="post/{{ date('Y/m/d/His', strtotime($news->created_date_article)) }}/{{str_slug($news->title_article)}}">{{$news->title_article}}</a>
                    </h2>
					<h6 style="font-size:12px;font-weight:bold;margin-top:10px;">
						{{ date('d-F-Y H:i', strtotime($news->created_date_article)) }} 
					</h6>
					<h6>
						<a href="{{url('/post/'.$news->id_article)}}" class="entry__meta-category">{{$news->name_admin}}</a>
					</h6>
					<ul class="entry__meta">
						<li class="entry__meta-views">
						  <i class="ui-eye"></i>
						  <span>{{$news->view_article}}</span>
						</li>
						<li class="entry__meta-comments">
						  <a href="#">
							<i class="ui-chat-empty"></i>13
						  </a>
						</li>
					</ul>
                  </div>                      
                </article>
              </li>
			@endforeach
            </ul> 
          </div>
		  
		  
		  <div class="col-lg-4">
            <ul class="post-list-small post-list-small--2 mb-32">
			@foreach($most_view_news->slice(0, 3) as $news)
              <li class="post-list-small__item">
                <article class="post-list-small__entry clearfix">
                  <div class="post-list-small__img-holder">
                    <div class="thumb-container thumb-70" style="background:none">
                      <a href="post/{{ date('Y/m/d/His', strtotime($news->created_date_article)) }}/{{str_slug($news->title_article)}}">
                        <img style="max-height:60px;width:auto" data-src="{{asset('assets/images/article/'.$news->thumbnail_article)}}" src="{{asset('assets/images/empty.png')}}" alt="" class=" lazyload">
                      </a>
                    </div>
                  </div>
                  <div class="post-list-small__body">
                    <h2 class="post-list-small__entry-title">
						<a href="post/{{ date('Y/m/d/His', strtotime($news->created_date_article)) }}/{{str_slug($news->title_article)}}">{{$news->title_article}}</a>
                    </h2>
					<h6 style="font-size:12px;font-weight:bold;margin-top:10px;">
						{{ date('d-F-Y H:i', strtotime($news->created_date_article)) }} 
					</h6>
					<h6>
						<a href="{{url('/post/'.$news->id_article)}}" class="entry__meta-category">{{$news->name_admin}}</a>
					</h6>
					<ul class="entry__meta">
						<li class="entry__meta-views">
						  <i class="ui-eye"></i>
						  <span>{{$news->view_article}}</span>
						</li>
						<li class="entry__meta-comments">
						  <a href="#">
							<i class="ui-chat-empty"></i>13
						  </a>
						</li>
					</ul>
                  </div>                      
                </article>
              </li>
			@endforeach
            </ul> 
          </div>
		  
		  <div class="row row-20" style="margin-top:20px;">
			<div class="col-md-12 title-wrap">
			  <h3 class="section-title">Economy</h3>
			</div>
			
				@foreach($economy->slice(0, 4) as $eco)
				  <div class="col-md-3">
					<article class="entry">
					  <div class="entry__img-holder">
						<a href="post/{{ date('Y/m/d/His', strtotime($eco->created_date_article)) }}/{{str_slug($eco->title_article)}}">
						  <div class="thumb-container thumb-65">
							<img data-src="{{asset('assets/images/article/'.$eco->thumbnail_article)}}" src="{{asset('assets/images/article/'.$eco->thumbnail_article)}}" class="entry__img lazyload" alt="">
						  </div>
						</a>
					  </div>

					  <div class="entry__body">
						<div class="entry__header">                  
						  <h2 class="entry__title" style="height:50px">
							<a href="post/{{ date('Y/m/d/His', strtotime($eco->created_date_article)) }}/{{str_slug($eco->title_article)}}">{{ $eco->title_article }}</a>
						  </h2>   
						  <ul class="entry__meta">
							<li>
							  <a href="#" class="entry__meta-category">{{ date('d-F-Y H:i', strtotime($eco->created_date_article)) }}</a>
							</li>
						  </ul>                 
						</div>
						<div class="entry__excerpt">
							<p style="text-align:justify">
								{{ $eco->short_description_article }}
							</p>
						</div>
					  </div>
					</article>
				  </div>
				@endforeach
			  
		
		
			<div class="row row-20" style="margin-top:20px;">
				<div class="col-md-12 title-wrap">
				  <h3 class="section-title">Entertainment</h3>
				</div>
				
				@foreach($entertainment->slice(0, 4) as $ent)
				  <div class="col-md-3">
					<article class="entry">
					  <div class="entry__img-holder">
						<a href="post/{{ date('Y/m/d/His', strtotime($ent->created_date_article)) }}/{{str_slug($ent->title_article)}}">
						  <div class="thumb-container thumb-65">
							<img data-src="{{asset('assets/images/article/'.$ent->thumbnail_article)}}" src="{{asset('assets/images/article/'.$ent->thumbnail_article)}}" class="entry__img lazyload" alt="">
						  </div>
						</a>
					  </div>

					  <div class="entry__body">
						<div class="entry__header">                  
						  <h2 class="entry__title" style="height:50px">
							<a href="post/{{ date('Y/m/d/His', strtotime($ent->created_date_article)) }}/{{str_slug($ent->title_article)}}">{{ $ent->title_article }}</a>
						  </h2>   
						  <ul class="entry__meta">
							<li>
							  <a href="#" class="entry__meta-category">{{ date('d-F-Y H:i', strtotime($ent->created_date_article)) }}</a>
							</li>
						  </ul>                 
						</div>
						<div class="entry__excerpt">
							<p style="text-align:justify">
								{{ $ent->short_description_article }}
							</p>
						</div>
					  </div>
					</article>
				  </div>
				@endforeach
				  
			   </div>
		
		
          <div class="col-lg-4 text-right text-md-center">
            <a href="#">
              <img src="{{asset('assets/images/content/placeholder_300_600.jpg')}}" alt="">
            </a>
          </div>
        </div>
         
      </section> <!-- end most viewed -->
	  
	  
	  
	  
	  





    </div> <!-- end main container -->
	@endsection