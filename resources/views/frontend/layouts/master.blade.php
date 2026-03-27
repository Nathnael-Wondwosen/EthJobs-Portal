<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <link rel="manifest" href="manifest.json" crossorigin>
    <meta name="msapplication-config" content="browserconfig.xml">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ config('settings.site_favicon') }}">


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery UI library -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>


    <link href="{{ asset('frontend/assets/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.10.0/dist/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">

    <title>{{ config('settings.site_name') }} </title>
</head>

<body>
    <div class="preloader_demo d-none">
        <div class="img">
            <img src="{{ asset('frontend/assets/imgs/template/loading.gif') }}" alt="joblist">
        </div>
    </div>

    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center"><img src="{{ asset('frontend/assets/imgs/template/loading.gif') }}"
                        alt="joblist"></div>
            </div>
        </div>
    </div>

    @include('frontend.layouts.header')

    <main class="main">

        @yield('contents')

        <!---==================================================================================================================================================================================-->

        <!-- Google translator language option -->

        <!---==================================================================================================================================================================================-->

        <div id="google_translate_element">
        </div>
        <style>
            body {
                top: 0px !important;
            }

            body>.skiptranslate>iframe.skiptranslate {
                display: none !important;
                visibility: hidden !important;
            }
        </style>

        <!-- to your js part -->
        <script src="script.js"></script>
        <script type="text/javascript">
            function googleTranslateElementInit() {
                // new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');           ------this code help to select all the language supported
                new google.translate.TranslateElement({
                    pageLanguage: 'en',
                    includedLanguages: 'am,om,ti,so,ar,en'
                }, 'google_translate_element');

                var $googleDiv = $("#google_translate_element .skiptranslate");
                var $googleDivChild = $("#google_translate_element .skiptranslate div");
                $googleDivChild.next().remove();

                $googleDiv.contents().filter(function() {
                    return this.nodeType === 3 && $.trim(this.nodeValue) !== '';
                }).remove();

                // Force hiding of "original text" popup for menus, etc. (very annoying)
                jQuery(selector).bind(
                    "mouseenter mouseleave",
                    function(event) {
                        if (event.type === 'mouseenter') {
                            google_trans_tt.css('z-index', -1000);
                        } else {
                            google_trans_tt.css('z-index', 1000);
                        }
                    }
                );

            }
        </script>
        <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
        </script>




        <!---==================================================================================================================================================================================-->

        <!-- ==========================================-->

        <!---==================================================================================================================================================================================-->


    </main>


    @include('frontend.layouts.footer')

    <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/Font-Awesome.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/noUISlider.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/slider.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.10.0/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/goodshare.js@6/goodshare.min.js"></script>

    <script src="{{ asset('frontend/assets/js/main.js?v=4.1') }}"></script>
    <script src="//code.tidio.co/vqhtfn5qlt2qx8nzkqzurpsttwu5d2ux.js" async></script>

    @stack('scripts')

    @include('frontend.layouts.scripts')
</body>

</html>
