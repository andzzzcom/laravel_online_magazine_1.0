@extends("Front.incl.layout")

	
	@section("content")
	<!-- Go to www.addthis.com/dashboard to customize your tools -->
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a9634c17a6edeca"></script>

    <!-- Breadcrumbs -->
    <div class="container">
      <ul class="breadcrumbs">
        <li class="breadcrumbs__item">
          <a href="{{ url('') }}" class="breadcrumbs__url">Home</a>
        </li>
        <li class="breadcrumbs__item breadcrumbs__item">
          Post
        </li>
        <li class="breadcrumbs__item breadcrumbs__item--current">
          {{$post[0]->title_article}}
        </li>
      </ul>
    </div>

    <div class="main-container container" id="main-container">

      <!-- Content -->
      <div class="row">
            
        <!-- post content -->
        <div class="col-lg-8 blog__content mb-72">
          <div class="content-box">           

            <!-- standard post -->
            <article class="entry mb-0">
              
              <div class="single-post__entry-header entry__header">
                <a href="../../../../../category/{{ str_slug($post[0]->name_category) }}" class="entry__meta-category entry__meta-category--label entry__meta-category--green">
					{{ $post[0]->name_category }}
				</a>
                <h1 class="single-post__entry-title">
				{{$post[0]->title_article}}
                </h1>

                <div class="entry__meta-holder">
                  <ul class="entry__meta">
                    <li class="entry__meta-author">
                      <span>by</span>
                      <a href="#">{{$post[0]->name_admin}}</a>
                    </li>
                    <li class="entry__meta-date">
                      {{$post[0]->created_date_article}}
                    </li>
                  </ul>

                  <ul class="entry__meta">
                    <li class="entry__meta-views">
                      <i class="ui-eye"></i>
                      <span>{{$counter_post}}</span>
                    </li>
                    <li class="entry__meta-comments">
                      <a href="#">
                        <i class="ui-chat-empty"></i>{{count($post_comment)}}
                      </a>
                    </li>
                  </ul>
                </div>
              </div> <!-- end entry header -->

              <div class="entry__img-holder">
                <img src="{{asset('assets/images/article/'.$post[0]->thumbnail_article)}}" alt="" class="entry__img">
              </div>
			  
				<!-- Share -->
				<div class="entry__share">
					<div class="sticky-col">
						<div class="addthis_inline_share_toolbox"></div> 
					</div>                  
				</div> 
				<!-- share -->



              <div class="entry__article-wrap">

                <div class="entry__article" style="padding:20px;padding-top:0px;width:100%">
                  <div>{!! $post[0]->content_article !!}</div>
                  <!-- tags -->
                  <div class="entry__tags">
                    <i class="ui-tags"></i>
					
                    <span class="entry__tags-label">Tags:</span>
					@foreach($tags as $tag)
					<a href="#" rel="tag">{{$tag}}</a>
					@endforeach
					
                  </div> <!-- end tags -->

                </div> <!-- end entry article -->
				
				
              </div> <!-- end entry article wrap -->
              
				
              <!-- Author -->
              <div class="entry-author clearfix">
                <img alt="" data-src="img/content/single/author.jpg" src="img/empty.png" class="avatar lazyload">
                <div class="entry-author__info">
                  <h6 class="entry-author__name">
                    <a href="#">{{$post[0]->name_admin}}</a>
                  </h6>
                  <p class="mb-0">
					{{$post[0]->short_description_admin}}
				  </p>
                </div>
              </div>   
				
				

              <!-- Newsletter Wide -->
              <div class="newsletter-wide">
                <div class="widget widget_mc4wp_form_widget">
                  <div class="newsletter-wide__container">
                    <div class="newsletter-wide__text-holder">
                      <p class="newsletter-wide__text">
                        <i class="ui-email newsletter__icon"></i>
                        Subscribe for our daily news
                      </p>
                    </div>
                    <div class="newsletter-wide__form">
                      <form onsubmit="return subscribe(0)" class="mc4wp-form" method="post">
                        <div class="mc4wp-form-fields">
                          <div class="form-group">
                            <input type="email" name="emailSubs" id="emailSubs" placeholder="Insert Your email" required="">
                          </div>
                          <div class="form-group">
                            <input type="submit" id="subs_btn" class="btn btn-lg btn-color" value="Subscribe">
                          </div>
                        </div>
                      </form>
                    </div> 
                  </div>         
                </div>
              </div> <!-- end newsletter wide -->

              <!-- Prev / Next Post -->
              <nav class="entry-navigation">
                <div class="clearfix">
                  <div class="entry-navigation--left">
                    <i class="ui-arrow-left"></i>
                    <span class="entry-navigation__label">Previous Post</span>
                    <div class="entry-navigation__link">
                      <a href="../post/{{str_slug($related_news[0]->title_article)}}" rel="next">{{$related_news[0]->title_article}}</a>
                    </div>
                  </div>
                  <div class="entry-navigation--right">
                    <span class="entry-navigation__label">Next Post</span>
                    <i class="ui-arrow-right"></i>
                    <div class="entry-navigation__link">
                      <a href="../post/{{str_slug($related_news[1]->title_article)}}" rel="prev">{{$related_news[1]->title_article}}</a>
                    </div>
                  </div>
                </div>
              </nav>
           

              <!-- Related Posts -->
              <section class="section related-posts mt-40 mb-0">
                <div class="title-wrap title-wrap--line title-wrap--pr">
                  <h3 class="section-title">Related Articles</h3>
                </div>

                <!-- Slider -->
                <div id="owl-posts-3-items" class="owl-carousel owl-theme owl-carousel--arrows-outside">
                  
				  @foreach($related_news as $rn)
				  <article class="entry thumb thumb--size-1">
                    <div class="entry__img-holder thumb__img-holder" style="background-image: url('{{ asset('assets/images/article/'.$rn->thumbnail_article) }}');">
                      <div class="bottom-gradient"></div>
                      <div class="thumb-text-holder" style="bottom:0px;">   
                        <h2 class="thumb-entry-title">
                          <a href="../../../../../../../post/{{ date('Y/m/d/His', strtotime($rn->created_date_article)) }}/{{str_slug($rn->title_article)}}">{{$rn->title_article}}</a>
                        </h2>
						<h6>
							<a href="../post/{{str_slug($rn->title_article)}}" class="entry__meta-category">{{$rn->name_admin}}</a>
						</h6>
                      </div>
                      <a href="../../../../../../../post/{{ date('Y/m/d/His', strtotime($rn->created_date_article)) }}/{{str_slug($rn->title_article)}}" class="thumb-url"></a>
                    </div>
                  </article>
				  @endforeach
				  
                </div> <!-- end slider -->

              </section> <!-- end related posts -->            

            </article> <!-- end standard post -->

			<!-- Comment Form -->
            <div id="respond" class="comment-respond">
              <div class="title-wrap">
                <h5 class="comment-respond__title section-title">Leave a Reply</h5>
              </div>
              <form method="post" onsubmit="return submitFormComment()">
				<div class="row row-20">
                  <div class="col-lg-4">
                    <label for="name">Name: *</label>
                    <input name="name" id="name" type="text" placeholder="Insert your name">
                  </div>
                </div>
                <div class="row row-20">
                  <div class="col-lg-4">
                    <label for="comment">Email: *</label>
                    <input name="email" id="email" type="email" placeholder="Insert your email">
                  </div>
                </div>
                <p class="comment-form-comment">
                  <label for="comment">Title: *</label>
				  <input name="title" id="title" type="text" placeholder="Insert your title">
                </p>
                <p class="comment-form-comment">
                  <label for="comment">Comment: *</label>
                  <textarea id="comment" name="comment" rows="5" required="required"></textarea>
                </p>

                <p class="comment-form-submit">
                  <input type="submit" class="btn btn-lg btn-color btn-button" value="Post Comment">
                </p>
                
              </form>
            </div> <!-- end comment form -->
			<br>
			
			<script>
				
				function submitFormComment()
				{
					var name = $("#name").val();
					var email = $("#email").val();
					var title = $("#title").val();
					var comment = $("#comment").val();
					if(name=="" || email=="" || comment=="" || title=="")
					{
						alert("Please Fill in All Input!");
						return false;
					}
					
					var article_id = '{{ $post[0]->id_article }}';
					 $.ajax({
						  headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						  },
						  method: "POST",
						  url: "{{url('submitComment')}}",
						  data: { article_id:article_id, name: name, email: email, title: title, comment: comment },
						  success: function (result) {
							if(result == 1){
								alert("Sukses menulis Komentar!");
								
								var dt = moment().format('DD-MMM-YYYY')+" ["+moment().format('HH:mm:ss')+"]"
								var imgnya = '<img style="max-height:100px;width:auto" alt="'+name+'" src="{{asset("assets/theme1/images/person.png")}}">';
								$(".comment-list").prepend('<li class="comment"><div class="comment-body"><div class="comment-avatar">'+imgnya+'</div><div class="comment-text"><h6 class="comment-author" style="font-size:18px">'+name+':</h6>       <div class="comment-metadata"><a href="#" class="comment-date" style="font-size:12px"> '+dt+'</a></div><p style="font-size:16px;font-weight:bold">'+title+'</p><p style="font-size:14px;font-weight:normal">'+comment+'</p></div></div></li>');
								
								var counter = parseInt($("#counter_comment").text().split(" ")[0])+1;
								$("#counter_comment").text(counter+" comments");
								
								//location.reload();
							}
							else
								alert("Gagal menulis Komentar!");
								
						  }
					 });
 
 
					return false;
				}
				
				function subscribe(intt)
				{
					var emailSubs = "";
					if(intt == 0)
						emailSubs = $("#emailSubs").val();
					else
						emailSubs = $("#emailSubs1").val();
					
					if(emailSubs=="")
					{
						alert("Please Fill in All Input!");
						return false;
					}
					
					$.ajax({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						method: "POST",
						url: "{{url('subscribe')}}",
						data: { emailSubs:emailSubs},
						success: function (result) {
							if(result == 1){
								
								if(intt == 0)
								{
									$("#emailSubs").prop("disabled", "true");
									$("#subs_btn").prop("disabled", "true");
								}
								else
								{
									$("#emailSubs1").prop("disabled", "true");
									$("#subs_btn1").prop("disabled", "true");
								}
								alert("Sukses Subscribe!");
								//location.reload();
							}
							else
								alert("Gagal Subscribe!");
								
						}
					});
					return false;
				}
				
			
			</script>
			
			
			
			
			
			
			
            <!-- Comments -->
            <div class="entry-comments">
              <div class="title-wrap title-wrap--line">
                <h3 class="section-title" id="counter_comment">{{count($post_comment)}} comments</h3>
              </div>
              <ul class="comment-list">
			  
				@foreach($post_comment as $komen)
				<li class="comment">  
				  <div class="comment-body">
					<div class="comment-avatar">
					  <img style="max-height:100px;width:auto" alt="{{$komen->sender_name_comment}}" src="{{asset('assets/theme1/images/person.png')}}">
					</div>
					<div class="comment-text">
					  <h6 class="comment-author" style="font-size:18px">{{$komen->sender_name_comment}}:</h6>       
					  <div class="comment-metadata">
						<a href="#" class="comment-date" style="font-size:12px">{{ date('d-F-Y [H:i:s]', strtotime($komen->created_date_comment)) }} </a>
					  </div>             
					  <p style="font-size:16px;font-weight:bold">{{$komen->title_comment}}</p>
					  <p style="font-size:14px;font-weight:normal">{{$komen->content_comment}}</p>
					  <!--<a href="#" class="comment-reply">Reply</a>-->
					</div>
				  </div>
				</li> <!-- end 1-2 comment -->
				@endforeach

              </ul>         
            </div> <!-- end comments -->

            

          </div> <!-- end content box -->
        </div> <!-- end post content -->
        
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
                      <a href="../../../../../../../post/{{ date('Y/m/d/His', strtotime($news->created_date_article)) }}/{{str_slug($news->title_article)}}">
                        <img data-src="{{url('assets/images/article/'.$news->thumbnail_article)}}" src="{{url('assets/images/article/'.$news->thumbnail_article)}}" alt="" class="post-list-small__img--rounded lazyload">
                      </a>
                    </div>
                  </div>
                  <div class="post-list-small__body">
                    <h3 class="post-list-small__entry-title">
                      <a href="../../../../../../../post/{{ date('Y/m/d/His', strtotime($news->created_date_article)) }}/{{str_slug($news->title_article)}}">{{$news->title_article}}</a>
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