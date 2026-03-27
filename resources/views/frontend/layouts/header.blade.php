<header class="header sticky-bar">
    <div class="container">
      <div class="main-header">
        <div class="header-left">
          <div class="header-logo"><a class="d-flex" href="{{ url('/') }}"><img alt="joblist"
                src="{{ config('settings.site_logo') }}"></a></div>
        </div>
        <div class="header-nav">
          <nav class="nav-main-menu">
            @php
                $navigationMenu = \Menu::getByName('Navigation Menu');

            @endphp
            <ul class="main-menu">
                @foreach ($navigationMenu as $menu)
                

                @if ($menu['child'])
                <li class="has-children"><a href="{{ $menu['link'] }}">{{ $menu['label'] }}</a>
                    <ul class="sub-menu">
                        @foreach ($menu['child'] as $childMenu)
                        <li><a href="{{ $childMenu['link'] }}">{{ $childMenu['label'] }}</a></li>
                        @endforeach
                    </ul>
                  </li>               
                @else
                  @if (auth()->user()?->role == 'candidate' && $menu['link'] != '/pricing')
                  <li class="has-children"><a class="" href="{{ $menu['link'] }}">{{ $menu['label'] }}</a></li>
                  @else
                  <li class="has-children"><a class="" href="{{ $menu['link'] }}">{{ $menu['label'] }}</a></li>

                  @endif
                @endif
                @endforeach
           </ul>
          </nav>
          <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span
              class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
        </div>
        <style>

          /* Styles for mobile devices (screens smaller than 768px) */
@media (max-width: 767px) {
    .block-signin {
        display: none; /* Hide the button on mobile devices */
    } 
    .google_translate_element{
      margin-top: 5px;
      position:absolute;
      right: 10px;
    }
  .header-right {
    
        display: flex;
        align-items: center;
    }
    .header-right > * {
        margin-right: 10px; /* Adjust the spacing as needed */
    }
    .google_translate_element{
      margin-top: -5px;
      position:absolute;
      right: 10px;
    }

    /* for desktop devices(screens 768px and larger)*/
    @media (min-width: 768px){
      .header-right {
        display:flex;
        align-items:center;
        justify-content: flex-end; /*align items to right*/
      }
      .header-right{
        margin-left: 10px;/*adjust the spacing as needed*/
      }
    }

  }
</style>

<div class="header-right">
    <!-- Google Translate widget -->
    <div id="google_translate_element">

    </div>
    <!-- Sign-in buttons -->
    <div class="block-signin">
        
    </div>
</div>

        <div class="header-right"style="display: flex; align-items: center;">
        
        
<!---==================================================================================================================================================================================-->
                       <!-- Google translator language option -->
<!---==================================================================================================================================================================================-->                       
            <style>
body {
     top: 0px !important;
    }
    body > .skiptranslate > iframe.skiptranslate {
     /* display: none !important; */
     visibility: hidden !important;
    }
            </style> 
                <script src="script.js"></script>
                  <script type="text/javascript">

                    var includedLanguages = {
                                'am': 'አማርኛ',
                                'en': 'English',
                                'om': 'Afaan Oromo',
                                'so': 'Soomaali',
                                'ti': 'ትግርኛ',
                                'ar': 'العربية'
                            };

                    function googleTranslateElementInit() {
                      // new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element'); ------this code help to select all the language supported if we need it.
                      new google.translate.TranslateElement({defaultLanguage: 'en', pageLanguage: 'en' , includedLanguages : 'am,om,ti,so,ar,en'}, 'google_translate_element');
                      
                      var $googleDiv = $("#google_translate_element .skiptranslate");
                      var $googleDivChild = $("#google_translate_element .skiptranslate div");
                      $googleDiv.find("a").remove(); // Remove the "Powered by Google Translate" link
                      $googleDivChild.next().remove();
                      $googleDiv.find(".goog-tooltip").remove(); // Hide the tooltip

                      $googleDiv.contents().filter(function(){
                        return this.nodeType === 3 && $.trim(this.nodeValue) !== '';
                      }).remove();

                    // Force hiding of "original text" popup for menus, etc. (very annoying)
                    jQuery(selector).bind(
                            "mouseenter mouseleave",
                            function (event) {
                                if (event.type === 'mouseenter')    { google_trans_tt.css('z-index', -1000); }
                                else                                { google_trans_tt.css('z-index',  1000); }
                            }
                        );
              } 
              </script>
              <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!---==================================================================================================================================================================================-->
                        <!-- ==========================================-->
<!---==================================================================================================================================================================================--> 

          <div class="block-signin">
             {{-- <a class="text-link-bd-btom hover-up" href="{{ route('register')}}">Register</a>  --}}
            @guest
            
            <a class="btn btn-default btn-shadow ml-40 hover-up" style = 'margin:2px;' href="{{ route('login') }}">Login</a>
            @endguest
            @auth
                @if (auth()->user()->role === 'company')
                    <a class="btn btn-default btn-shadow ml-40 hover-up" style="width: 200px" href="{{ route('company.dashboard') }}">Employer Dashboard</a>
                @elseif(auth()->user()->role === 'candidate')
                    <a class="btn btn-default btn-shadow ml-40 hover-up" style="width: 200px" href="{{ route('candidate.dashboard') }}">Job-seeker Dashboard</a>
                @endif
            @endauth
          </div>
      

        </div>
      </div>
    </div>
  </header>

  <div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
    <div class="mobile-header-wrapper-inner">
      <div class="mobile-header-content-area">
        <div class="perfect-scroll">
          <div class="mobile-search mobile-header-border mb-30">
          </div>
          <div class="mobile-menu-wrap mobile-header-border mb-30">
            <!-- mobile menu start-->
            <nav>
              <ul class="mobile-menu font-heading">
                <li style="width: 50px;"><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('jobs.index') }}">Find a Job</a></li>
                <li><a href="{{ route('companies.index') }}">Employers</a></li>
                <li><a href="{{ route('about.index') }}">About Us</a></li>
                <li><a href="{{ route('contact.index') }}">Contact Us</a></li>
                <li><a href="{{ route('blogs.index') }}">Blogs</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
                 <!-- <li><a href="{{ route('pricing.index') }}">Pricing Plan</a></li> -->
                <li>         
            @auth
                @if (auth()->user()->role === 'company')
                    <a class="btn btn-default btn-shadow ml-40 hover-up" style="width: 200px; color:#ccc;" href="{{ route('company.dashboard') }}">Employer Dashobard</a>
                @elseif(auth()->user()->role === 'candidate')
                    <a class="btn btn-default btn-shadow ml-40 hover-up" style="width: 200px; color:#ccc" href="{{ route('candidate.dashboard') }}">Job-seeker Dashboard</a>
                @endif
            @endauth
            </li>
                <!-- <li><a href="{{ route('blogs.index') }}">Blogs</a></li> -->
                      </ul>
            </nav>
          </div>
          {{-- <div class="mobile-account">
            <h6 class="mb-10">Your Account</h6>
            <ul class="mobile-menu font-heading">
              <li><a href="#">Profile</a></li>
              <li><a href="#">Work Preferences</a></li>
              <li><a href="#">Account Settings</a></li>
              <!-- <li><a href="#">Go Pro</a></li> -->
              <li><a href="page-signin.html">Logout</a></li>
            </ul>
          </div> --}}
        </div>
      </div>
    </div>
  </div>

 