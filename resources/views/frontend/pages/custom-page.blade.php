@extends('frontend.layouts.master')

<!-- custom-page/tip page -->

@section('contents')
<section class="section-box mt-75">
    <div class="breacrumb-cover">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <h2 class="mb-20">{{ $page->page_name }}</h2>
                    <ul class="breadcrumbs">
                        <li><a class="home-icon" href="{{ url('/') }}">Home</a></li>
                        <li>{{ $page->page_name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-box mt-120">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <iframe width="100%" height="400" src="https://www.youtube.com/embed/UkcLUTg8_QQ" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="mt-30" >
            <h4 style="margin-bottom: 10px;">Explore More Free Books for a Better Knowledge:</h4>
            <div class="btn-group" role="group" aria-label="Free Books Links">
                <a class="btn btn-primary" href="https://libgen.is/" target="_blank">Library Genesis</a>
                
            </div>
        </div>
        
        <div class=" text-container">
        <div class="card">
        <div class="card-body" width="relative" height="auto">
          <style>
                      .text-container{
                        margin: auto; 
                        padding: 50px;
                      bottom: 30px;}
                      h4 {
                              text-align: center;
                              font-size:1.5rem;
                              margin-bottom: 10px;
                              font-family: sans-serif;
                              text-align: center;
                          }

                      
          </style>
      {!! $page->content !!}
                </div>
          </div>
          </div>
    </div>
</section>



<!-- <section class="section-box mt-120">
    <div class="container">
      {!! $page->content !!}
    </div>
  </section> -->

@endsection







<!--  if We wanted to have a horizontal video view settlement



<div class="video-container">
    <div class="left-section">
        //Your text content here 
        
        <div class="container">
      {!! $page->content !!}
    </div>
    </div>
    <div class="right-section">
        //Your video here
        <div class="card-body">
                <iframe src="https://www.youtube.com/embed/UkcLUTg8_QQ" frameborder="0" allowfullscreen></iframe>
            </div>
            <Style>
              .video-container {
    display: flex;
    justify-content: space-between;
}
.left-section,
.right-section {
    flex: 1;
}
.right-section video {
    width: 100%;
    height: auto;
}

            </style>
    </div>
</div>
    </div>
</section> -->