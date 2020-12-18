<!-- Sidenav -->    
  <header class="sidenav" id="sidenav">

    <!-- close -->
    <div class="sidenav__close">
      <button class="sidenav__close-button" id="sidenav__close-button" aria-label="close sidenav">
        <i class="ui-close sidenav__close-icon"></i>
      </button>
    </div>
    
    <!-- Nav -->
    <nav class="sidenav__menu-container">
      <ul class="sidenav__menu" role="menubar">
        <li>
          <a href="{{url('')}}" class="sidenav__menu-url">Home</a>
        </li>
		
        <!-- Categories -->
        <li>
          <a href="#" class="sidenav__menu-url">Categories</a>
          <button class="sidenav__menu-toggle" aria-haspopup="true" aria-label="Open dropdown"><i class="ui-arrow-down"></i></button>
          <ul class="sidenav__menu-dropdown">
			@foreach($list_category as $category)
			<li>
			  <a href="{{url('category/'.str_slug($category->name_category))}}" class="sidenav__menu-url">{{$category->name_category}}</a>
			</li>
			@endforeach
          </ul>
        </li>        

        <li>
          <a href="{{url('about_us')}}" class="sidenav__menu-url">About</a>
        </li>
        <li>
          <a href="{{url('contact_us')}}" class="sidenav__menu-url">Contact Us</a>
        </li>
        <li>
          <a href="{{url('privacy_policy')}}" class="sidenav__menu-url">Contact Us</a>
        </li>
      </ul>
    </nav>

    <div class="socials sidenav__socials"> 
      <a class="social social-facebook" href="#" target="_blank" aria-label="facebook">
        <i class="ui-facebook"></i>
      </a>
      <a class="social social-twitter" href="#" target="_blank" aria-label="twitter">
        <i class="ui-twitter"></i>
      </a>
      <a class="social social-google-plus" href="#" target="_blank" aria-label="google">
        <i class="ui-google"></i>
      </a>
      <a class="social social-youtube" href="#" target="_blank" aria-label="youtube">
        <i class="ui-youtube"></i>
      </a>
      <a class="social social-instagram" href="#" target="_blank" aria-label="instagram">
        <i class="ui-instagram"></i>
      </a>
    </div>
  </header> <!-- end sidenav -->


  <main class="main oh" id="main">

    <!-- Top Bar -->
    <div class="top-bar d-none d-lg-block" style="background-color:#f3f4f9">
      <div class="container">
        <div class="row">

          <!-- Top menu -->
          <div class="col-lg-6">
            <ul class="top-menu">
				<li>
					<a href="{{url('')}}">
						<img style="max-height:120px;width:auto" src="{{asset('assets/theme1/images/settings/'.$general_settings['logo_web'])}}">
					</a>
				</li>
            </ul>
          </div>
          
          <!-- Socials -->
          <div class="col-lg-6">
              <div style="margin-top:20px" class="socials socials--small socials--rounded justify-content-lg-end">
                <a href="#" class="social social-facebook" aria-label="facebook"><i class="ui-facebook"></i></a>
                <a href="#" class="social social-twitter" aria-label="twitter"><i class="ui-twitter"></i></a>
                <a href="#" class="social social-google-plus" aria-label="google+"><i class="ui-google"></i></a>
                <a href="#" class="social social-youtube" aria-label="youtube"><i class="ui-youtube"></i></a>
                <a href="#" class="social social-instagram" aria-label="instagram"><i class="ui-instagram"></i></a>
              </div>
          </div>

        </div>
      </div>
    </div> <!-- end top bar -->
        

    <!-- Navigation -->
    <header class="nav">

      <div class="nav__holder nav--sticky">
        <div class="container relative">
          <div class="flex-parent">

            <!-- Side Menu Button -->
            <button class="nav-icon-toggle" id="nav-icon-toggle" aria-label="Open side menu">
              <span class="nav-icon-toggle__box">
                <span class="nav-icon-toggle__inner"></span>
              </span>
            </button> 

            <!-- Logo -->
            <a href="{{url('')}}" style="font-size:16px;color:black;font-weight:bold" class="logo">
				Banyakgaya
			</a>

            <!-- Nav-wrap -->
            <nav class="flex-child nav__wrap d-none d-lg-block">              
              <ul class="nav__menu">

				<!--
                <li class="nav__dropdown">
                  <a href="#">Categories</a>
                  <ul class="nav__dropdown-menu">
					@foreach($list_category as $category)
						<li><a href="about.html">{{$category->name_category}}</a></li>
					@endforeach
                  </ul>
                </li>  
				-->
				
                <li>
                  <a href="{{url('about_us')}}">About</a>
                </li>
                <li>
                  <a href="{{url('contact_us')}}">Contact Us</a>
                </li>
				@foreach($list_category as $category)
                <li>
                  <a href="{{url('category/'.str_slug($category->name_category))}}">{{$category->name_category}}</a>
                </li>
				@endforeach

              </ul> <!-- end menu -->
            </nav> <!-- end nav-wrap -->

            <!-- Nav Right -->
            <div class="nav__right">

              <!-- Search -->
              <div class="nav__right-item nav__search">
                <a href="#" class="nav__search-trigger" id="nav__search-trigger">
                  <i class="ui-search nav__search-trigger-icon"></i>
                </a>
                <div class="nav__search-box" id="nav__search-box">
                  <form class="nav__search-form" action="{{url('search/')}}" method="get">
                    <input type="text" placeholder="Search an article" name="keyword" class="nav__search-input">
                    <button type="submit" class="search-button btn btn-lg btn-color btn-button">
                      <i class="ui-search nav__search-icon"></i>
                    </button>
                  </form>
                </div>                
              </div>             

            </div> <!-- end nav right -->            
        
          </div> <!-- end flex-parent -->
        </div> <!-- end container -->

      </div>
    </header> <!-- end navigation -->
	