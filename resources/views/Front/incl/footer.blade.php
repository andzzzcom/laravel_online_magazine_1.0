	
    <!-- Footer -->
    <footer class="footer footer--1">
      <div class="container">
        <div class="footer__widgets footer__widgets--short top-divider">
          <div class="row">

            <div class="col-lg-6">
			  <img style="max-height:120px;width:auto" src="{{asset('assets/theme1/images/settings/'.$general_settings['logo_web'])}}">
			  <br>
              <ul class="footer__nav-menu">
                <li><a href="{{url('')}}">Home</a></li>
                <li><a href="{{url('about_us')}}">About</a></li>
                <li><a href="{{url('contact_us')}}">Contact Us</a></li>
                <li><a href="{{url('privacy_policy')}}">Privacy Policy</a></li>
              </ul>
              <p class="copyright">
                © {{date('Y')}} {{$general_settings["title_web"]}}
              </p>              
            </div>

            <div class="col-lg-6">
              <div class="socials socials--large socials--rounded justify-content-lg-end">
                <a href="#" class="social social-facebook" aria-label="facebook"><i class="ui-facebook"></i></a>
                <a href="#" class="social social-twitter" aria-label="twitter"><i class="ui-twitter"></i></a>
                <a href="#" class="social social-google-plus" aria-label="google+"><i class="ui-google"></i></a>
                <a href="#" class="social social-youtube" aria-label="youtube"><i class="ui-youtube"></i></a>
                <a href="#" class="social social-instagram" aria-label="instagram"><i class="ui-instagram"></i></a>
              </div>
            </div>

          </div>
        </div>    
      </div> <!-- end container -->
    </footer> <!-- end footer -->
