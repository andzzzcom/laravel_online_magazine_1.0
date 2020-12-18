@extends("Front.incl.layout")

	
	@section("content")<!-- Breadcrumbs -->
    <div class="container">
      <ul class="breadcrumbs">
        <li class="breadcrumbs__item">
          <a href="{{ url('') }}" class="breadcrumbs__url">Home</a>
        </li>
        <li class="breadcrumbs__item breadcrumbs__item">
          <a href="{{ url('category') }}" class="breadcrumbs__url">Category</a>
        </li>
        <li class="breadcrumbs__item breadcrumbs__item--current">
          {{ $name_category }}
        </li>
      </ul>
    </div>
    

    <div class="main-container container" id="main-container">         

      <!-- Content -->
      <div class="row">

        <!-- Posts -->
        <div class="col-lg-8 blog__content mb-72">
		
		@if($article[0] !== 0)
          <h3 style="font-weight:normal">Category: <b>{{ $name_category }}</b></h3>
		  <br>
		  
          <div class="row card-row">
		  
			@foreach($article as $article)
            <div class="col-md-4">
              <article class="entry card">
                <div class="entry__img-holder card__img-holder">
                  <a href="../post/{{ date('Y/m/d/His', strtotime($article->created_date_article)) }}/{{str_slug($article->title_article)}}">
                    <div class="thumb-container thumb-70">
                      <img data-src="{{url('assets/images/article/'.$article->thumbnail_article)}}" src="{{url('assets/images/article/'.$article->thumbnail_article)}}" class="entry__img lazyload" alt="" />
                    </div>
                  </a>
                </div>

                <div class="entry__body card__body" style="padding:10px">
                  <div class="entry__header">
                    
                    <h2 class="entry__title">
                      <a href="../post/{{ date('Y/m/d/His', strtotime($article->created_date_article)) }}/{{str_slug($article->title_article)}}">
						{{$article->title_article}}
					  </a>
                    </h2>
                    <ul class="entry__meta">
                      <li class="entry__meta-author">
                        <span>by</span>
                        <a href="#">
							{{$article->name_admin}}
						</a>
                      </li>
                      <li class="entry__meta-date">
						{{ date('d-M-Y', strtotime($article->created_date_article)) }}
                      </li>
                    </ul>
                  </div>
                  <div class="entry__excerpt">
                    <p style="text-align:justify;height:120px">
						{{$article->short_description_article}}
					</p>
                  </div>
                </div>
              </article>
            </div>
			@endforeach
			
          </div>

          <!-- Pagination -->
          <nav class="pagination" style="display:none">
            <span class="pagination__page pagination__page--current">1</span>
            <a href="#" class="pagination__page">2</a>
            <a href="#" class="pagination__page">3</a>
            <a href="#" class="pagination__page">4</a>
            <a href="#" class="pagination__page pagination__icon pagination__page--next"><i class="ui-arrow-right"></i></a>
          </nav>
		@else
			<h3 style="font-weight:normal">Category: <b>{{ $name_category }}</b> has 0 post</h3>
			<br>
		  
			<div class="row card-row">
				<div class="col-md-12"></div>
			</div>
		@endif
		
        </div> <!-- end posts -->

        
        <!-- Sidebar -->
        <aside class="col-lg-4 sidebar sidebar--right">

          <!-- Widget Popular Posts -->
          <aside class="widget widget-popular-posts">
            <h4 class="widget-title">Popular Posts</h4>
            <ul class="post-list-small">
              
			@foreach($popular_news->slice(0, 5) as $news)
              <li class="post-list-small__item">
                <article class="post-list-small__entry clearfix">
                  <div class="post-list-small__img-holder">
                    <div class="thumb-container thumb-100">
                      <a href="../post/{{ date('Y/m/d/His', strtotime($news->created_date_article)) }}/{{str_slug($news->title_article)}}">
                        <img data-src="{{url('assets/images/article/'.$news->thumbnail_article)}}" src="{{url('assets/images/article/'.$news->thumbnail_article)}}" alt="" class="post-list-small__img--rounded lazyload">
                      </a>
                    </div>
                  </div>
                  <div class="post-list-small__body">
                    <h3 class="post-list-small__entry-title">
                      <a href="../post/{{ date('Y/m/d/His', strtotime($news->created_date_article)) }}/{{str_slug($news->title_article)}}">{{$news->title_article}}</a>
                    </h3>
                    <ul class="entry__meta">
                      <li class="entry__meta-author">
                        <span>by</span>
                        <a href="{{url('/author/'.$news->id_admin)}}">{{$news->name_admin}}</a>
                      </li>
                      <li class="entry__meta-date">
                        {{$news->created_date_article}}
                      </li>
                    </ul>
                  </div>                  
                </article>
              </li>
			@endforeach
			  
            </ul>           
          </aside> <!-- end widget popular posts -->

          <!-- Widget Newsletter -->
          <aside class="widget widget_mc4wp_form_widget">
            <h4 class="widget-title">Newsletter</h4>
            <p class="newsletter__text">
              <i class="ui-email newsletter__icon"></i>
              Subscribe for our daily news
            </p>
			  <form onsubmit="return subscribe(1)" class="mc4wp-form" method="post">
				<div class="mc4wp-form-fields">
				  <div class="form-group">
					<input type="email" name="emailSubs" id="emailSubs1" placeholder="Insert Your email" required="">
				  </div>
				  <div class="form-group">
					<input type="submit" id="subs_btn1" class="btn btn-lg btn-color" value="Subscribe">
				  </div>
				</div>
			  </form>
          </aside> <!-- end widget newsletter -->

          <!-- Widget Socials -->
          <aside class="widget widget-socials">
            <h4 class="widget-title">Let's hang out on social</h4>
            <div class="socials socials--wide socials--large">
              <div class="row row-16">
                <div class="col">
                  <a class="social social-facebook" href="#" title="facebook" target="_blank" aria-label="facebook">
                    <i class="ui-facebook"></i>
                    <span class="social__text">Facebook</span>
                  </a><!--
                  --><a class="social social-twitter" href="#" title="twitter" target="_blank" aria-label="twitter">
                    <i class="ui-twitter"></i>
                    <span class="social__text">Twitter</span>
                  </a><!--
                  --><a class="social social-youtube" href="#" title="youtube" target="_blank" aria-label="youtube">
                    <i class="ui-youtube"></i>
                    <span class="social__text">Youtube</span>
                  </a>
                </div>
                <div class="col">
                  <a class="social social-google-plus" href="#" title="google" target="_blank" aria-label="google">
                    <i class="ui-google"></i>
                    <span class="social__text">Google+</span>
                  </a><!--
                  --><a class="social social-instagram" href="#" title="instagram" target="_blank" aria-label="instagram">
                    <i class="ui-instagram"></i>
                    <span class="social__text">Instagram</span>
                  </a><!--
                  --><a class="social social-rss" href="#" title="rss" target="_blank" aria-label="rss">
                    <i class="ui-rss"></i>
                    <span class="social__text">Rss</span>
                  </a>
                </div>                
              </div>            
            </div>
          </aside> <!-- end widget socials -->

        </aside> <!-- end sidebar -->

  
      </div> <!-- end content -->
    </div> <!-- end main container -->
	@endsection