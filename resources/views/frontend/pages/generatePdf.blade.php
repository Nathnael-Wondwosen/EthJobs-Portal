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
    <link href="{{ asset('frontend/assets/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.10.0/dist/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <title>{{ config('settings.site_name') }}</title>
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
                <div class="text-center"><img src="{{ asset('frontend/assets/imgs/template/loading.gif') }}" alt="joblist"></div>
            </div>
        </div>
    </div>
    <main class="main">
        <section class="section-box mt-75">
            <div class="breacrumb-cover">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <h2 class="mb-20">Candidate Profile</h2>
                            <ul class="breadcrumbs">
                                <li><a class="home-icon" href="{{ url('/') }}">Home</a></li>
                                <li>Candidate Profile</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box-2">
            <div class="container">
                <div class="banner-hero banner-image-single"><img style="width: 150px;height: 150px;object-fit: cover;border-radius: 50%;" src="{{ asset($candidate->image) }}" alt="joblist"></div>
                <div class="box-company-profile">
                    <div class="row mt-10">
                        <div class="col-lg-8 col-md-12">
                            <h5 class="f-18">{{ $candidate->full_name }} <span class="card-location font-regular ml-20">{{ $candidate->candidateCountry->name }}</span></h5>
                            <p class="mt-0 font-md color-text-paragraph-2 mb-15">{{ $candidate->title }}</p>
                        </div>
                        @if ($candidate->cv)
                        <div class="col-lg-4 col-md-12 text-lg-end"><a class="btn btn-download-icon btn-apply btn-apply-big" href="{{ asset($candidate->cv) }}">Download CV</a></div>
                        @endif
                    </div>
                </div>
                <div class="border-bottom pt-10 pb-10"></div>
            </div>
        </section>
        <section class="section-box mt-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="content-single">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-short-bio" role="tabpanel" aria-labelledby="tab-short-bio">
                                    <h4>Biography</h4>
                                    {!! $candidate->bio !!}
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="box-related-job content-page   cadidate_details_list">
                            <div class="mt-5 mb-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Experience</h4>
                                        <ul class="timeline">
                                            @foreach ($candidate->experiences as $experience)
                                            <li>
                                                <a href="#" class="float-right">{{ formatDate($experience->start) }} - {{ $experience->currently_working ? 'Current' :  formatDate($experience->end)}}</a>
                                                <a href="javascript:;">{{ $experience->designation }}</a> | <span>{{ $experience->department }}</span>
                                                <p>{{ $experience->company }}</p>
                                                <p>{{ $experience->responsibilities }}</p>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-4">
                                        <h4>Education</h4>
                                        <ul class="timeline">
                                            @foreach ($candidate->educations as $education)
                                            <li>
                                                <a href="#" class="float-right">{{ formatDate($education->year) }}</a>
                                                <a href="javascript:;">{{ $education->level }}</a>
                                                <p>{{ $education->degree }}</p>
                                                <p>{{ $education->note }}</p>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                        <div class="sidebar-border">
                            <h5 class="f-18">Overview</h5>
                            <div class="sidebar-list-job">
                                <ul>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                                        <div class="sidebar-text-info"><span class="text-description">Experience</span><strong class="small-heading">{{ $candidate->experience->name }}</strong></div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi fi-rr-settings-sliders"></i></div>
                                        <div class="sidebar-text-info"><span class="text-description">Skills</span>
                                            <strong>
                                                @foreach ($candidate->skills as $candidateSkill)
                                                <p class="badge bg-info text-light">{{ $candidateSkill->skill->name }}</p>
                                                @endforeach
                                            </strong>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi fi-rr-settings-sliders"></i></div>
                                        <div class="sidebar-text-info"><span class="text-description">Languages</span><strong class="small-heading">
                                                @foreach ($candidate->languages as $candidateLanguage)
                                                <p class="badge bg-info text-light">{{ $candidateLanguage->language->name }}</p>
                                                @endforeach
                                            </strong></div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-marker"></i></div>
                                        <div class="sidebar-text-info"><span class="text-description">Profession</span><strong class="small-heading">{{ $candidate->profession->name }}</strong></div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-marker"></i></div>
                                        <div class="sidebar-text-info"><span class="text-description">Date of Birth</span><strong class="small-heading">{{ formatDate($candidate->birth_date) }}</strong></div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-time-fast"></i></div>
                                        <div class="sidebar-text-info"><span class="text-description">Gender</span><strong class="small-heading">{{ $candidate->gender }}</strong></div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-time-fast"></i></div>
                                        <div class="sidebar-text-info"><span class="text-description">Marital Status </span><strong class="small-heading">{{ $candidate->marital_status }}</strong></div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-time-fast"></i></div>
                                        <div class="sidebar-text-info"><span class="text-description">Website </span><strong class="small-heading"><a href="{{ $candidate->website }}">{{ $candidate->website }}</a></strong></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="sidebar-list-job">
                                <ul class="ul-disc">
                                    <li>{{ $candidate->address }} {{ $candidate->candidateCity?->name ? ', '.$candidate->candidateCity?->name : '' }} {{ $candidate->candidateState?->name ? ', '.$candidate->candidateState?->name : ''}} {{ $candidate->candidateCountry?->name ? ', '.$candidate->candidateCountry?->name : ''}}</li>
                                    <li>Phone: {{ $candidate->phone_one }}</li>
                                    <li>Phone: {{ $candidate->phone_two }}</li>
                                    <li>Email: {{ $candidate->email }}</li>
                                </ul>
                                <div class="mt-30"><a class="btn btn-send-message" href="mailto:{{ $candidate->email }}">Send Message</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
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
