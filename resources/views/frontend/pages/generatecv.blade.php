@extends('frontend.layouts.master')

@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Cv</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ url('/') }}">Home</a></li>
                            <li>Curriculum Vitae</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="cv-content">
        <section class="section-box-2">
            <div class="container">

                <div class="banner-hero banner-image-single">
                    <div style="display: flex; align-items: center; margin-left: 100px;">
                        <!-- Use flexbox to align items -->
                        <img style="width: 150px; height: 150px; object-fit: cover; border-radius: 70%;"
                            src="{{ asset($candidate->image) }}" alt="joblist">
                        <div style="margin-left: 20px;"> <!-- Add margin for spacing -->
                            <h5 class="f-18">{{ $candidate->title }}.{{ $candidate->full_name }}</h5>
                            <div style="margin-top: 10px;"> <!-- Add margin-top to create space between sections -->
                                <p>{{ $candidate->address }}
                                    {{ $candidate->candidateCity?->name ? ', ' . $candidate->candidateCity?->name : '' }}
                                    {{ $candidate->candidateState?->name ? ', ' . $candidate->candidateState?->name : '' }}
                                </p>
                                <span class="card-phone font-regular">
                                    <i class="fas fa-phone"></i> {{ $candidate->phone_one }} ||
                                    {{ $candidate->phone_two }}<br>
                                    <a href="mailto:{{ $candidate->email }}">
                                        <i class="fas fa-envelope"></i> {{ $candidate->email }}
                                    </a>


                                </span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="box-company-profile">
                    <div class="row mt-10">

                        @if ($candidate->cv)
                            <div class="col-lg-4 col-md-12 text-lg-end"><a
                                    class="btn btn-download-icon btn-apply btn-apply-big"
                                    href="{{ asset($candidate->cv) }}">Download CV</a></div>
                        @endif
                    </div>
                </div>
                <div class="border-bottom pt-10 pb-10"></div>
            </div>
        </section>

        <section class="section-box mt-30">
            <div class="container">
                <div class="row" style="margin-left: 40px;">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="content-single">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-short-bio" role="tabpanel"
                                    aria-labelledby="tab-short-bio">
                                    <h4>Biography</h4>
                                    {!! $candidate->bio !!}
                                    <p></p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 mb-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Experience</h4>
                                    <ul class="timeline">
                                        @foreach ($candidate->experiences as $experience)
                                            <li>
                                                <a class="float-right"
                                                    style="margin-right: -100px;">{{ formatDate($experience->start) }}
                                                    -
                                                    {{ $experience->currently_working ? 'Current' : formatDate($experience->end) }}</a>
                                                <a>{{ $experience->designation }}</a> |
                                                <span>{{ $experience->department }}</span>
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
                                                <a class="float-right"
                                                    style="margin-right: -100px;">{{ formatDate($education->year) }}</a>
                                                <a>{{ $education->level }}</a>
                                                <p>{{ $education->degree }}</p>
                                                <p>{{ $education->note }}</p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <h4><i class="fas fa-language fa-sm"></i>Languages</h4>
                                    <ul class="timeline">
                                        @foreach ($candidate->languages as $candidateLanguage)
                                            <li>{{ $candidateLanguage->language->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="col-md-6">
                                    <h4> <i class="fas fa-tasks fa-sm"></i> Skills</h4>
                                    <ul class="timeline">
                                        @foreach ($candidate->skills as $candidateSkill)
                                            <li>{{ $candidateSkill->skill->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    </div>
    </div>
    </div>
    </section>


    <div class="container">
        <div class="row justify-content-center mt-30">
            <a id="download" class="btn btn-default btn-shadow btn-lg py-2 px-3"
                style="width: 150px; height:50px"href="javascript:void(0)">
                <i class="fas fa-download"></i> Download CV
            </a>
        </div>
    </div>



    {{-- <div class="mt-30 d-flex justify-content-end">
        <a id="download" class="btn btn-primary btn-lg mr-3" href="javascript:void(0)">
            <i class="fas fa-download"></i> Download CV
        </a>
    </div> --}}


    {{-- <div class="mt-300">
        <a id="download" class="btn fas fa-download fa-lg mr-2" href="javascript:void(0)">Download CV</a>
    </div> --}}


    </div>
    </div>

    <!-- JavaScript to trigger PDF download -->
    <script>
        window.onload = function() {
            document.getElementById("download").addEventListener("click", () => {
                const contentToDownload = document.getElementById("cv-content");
                var opt = {
                    margin: 0,
                    filename: 'My-cv.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'a4',
                        orientation: 'portrait'
                    }
                };
                html2pdf().from(contentToDownload).set(opt).save();
            });
        };
    </script>
@endsection
