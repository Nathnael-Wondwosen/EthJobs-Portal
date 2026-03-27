<header class="header sticky-bar">
    <div class="container">
      <div class="main-header">
        <div class="header-left">
          <div class="header-logo"><a class="d-flex" href="<?php echo e(url('/')); ?>"><img alt="joblist"
                src="<?php echo e(config('settings.site_logo')); ?>"></a></div>
        </div>
        <div class="header-nav">
          <nav class="nav-main-menu">
            <?php
                $navigationMenu = \Menu::getByName('Navigation Menu');

            ?>
            <ul class="main-menu">
                <?php $__currentLoopData = $navigationMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                

                <?php if($menu['child']): ?>
                <li class="has-children"><a href="<?php echo e($menu['link']); ?>"><?php echo e($menu['label']); ?></a>
                    <ul class="sub-menu">
                        <?php $__currentLoopData = $menu['child']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e($childMenu['link']); ?>"><?php echo e($childMenu['label']); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                  </li>               
                <?php else: ?>
                  <?php if(auth()->user()?->role == 'candidate' && $menu['link'] != '/pricing'): ?>
                  <li class="has-children"><a class="" href="<?php echo e($menu['link']); ?>"><?php echo e($menu['label']); ?></a></li>
                  <?php else: ?>
                  <li class="has-children"><a class="" href="<?php echo e($menu['link']); ?>"><?php echo e($menu['label']); ?></a></li>

                  <?php endif; ?>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
             
            <?php if(auth()->guard()->guest()): ?>
            
            <a class="btn btn-default btn-shadow ml-40 hover-up" style = 'margin:2px;' href="<?php echo e(route('login')); ?>">Login</a>
            <?php endif; ?>
            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user()->role === 'company'): ?>
                    <a class="btn btn-default btn-shadow ml-40 hover-up" style="width: 200px" href="<?php echo e(route('company.dashboard')); ?>">Employer Dashboard</a>
                <?php elseif(auth()->user()->role === 'candidate'): ?>
                    <a class="btn btn-default btn-shadow ml-40 hover-up" style="width: 200px" href="<?php echo e(route('candidate.dashboard')); ?>">Job-seeker Dashboard</a>
                <?php endif; ?>
            <?php endif; ?>
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
                <li style="width: 50px;"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('jobs.index')); ?>">Find a Job</a></li>
                <li><a href="<?php echo e(route('companies.index')); ?>">Employers</a></li>
                <li><a href="<?php echo e(route('about.index')); ?>">About Us</a></li>
                <li><a href="<?php echo e(route('contact.index')); ?>">Contact Us</a></li>
                <li><a href="<?php echo e(route('blogs.index')); ?>">Blogs</a></li>
                <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                 <!-- <li><a href="<?php echo e(route('pricing.index')); ?>">Pricing Plan</a></li> -->
                <li>         
            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user()->role === 'company'): ?>
                    <a class="btn btn-default btn-shadow ml-40 hover-up" style="width: 200px; color:#ccc;" href="<?php echo e(route('company.dashboard')); ?>">Employer Dashobard</a>
                <?php elseif(auth()->user()->role === 'candidate'): ?>
                    <a class="btn btn-default btn-shadow ml-40 hover-up" style="width: 200px; color:#ccc" href="<?php echo e(route('candidate.dashboard')); ?>">Job-seeker Dashboard</a>
                <?php endif; ?>
            <?php endif; ?>
            </li>
                <!-- <li><a href="<?php echo e(route('blogs.index')); ?>">Blogs</a></li> -->
                      </ul>
            </nav>
          </div>
          
        </div>
      </div>
    </div>
  </div>

 <?php /**PATH C:\xampp\htdocs\EthJobs-Portal\resources\views/frontend/layouts/header.blade.php ENDPATH**/ ?>