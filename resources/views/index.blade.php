@extends('layouts.frontLayout.userdesign')
    @section('content')

@include('layouts.frontLayout.user_topbar')
  
@include('layouts.frontLayout.user_header')


  <div class="video_banner">
	  <div class="overlay"></div>
	  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
	    <source src="{{ asset('images/frontend_images/tour.mp4') }}" type="video/mp4">
	  </video>
	  <div class="container h-100">
	    <div class="d-flex text-center h-100">
	      <div class="my-auto w-100 text-white">
	        <h1 class="display-3">Great Offers</h1>
	        <h2>Experience the best from us</h2>
	      </div>
	    </div>
	  </div>
	</div>


  <section id="gallery" class="gallery">
        <div class="container">
            <div class="gallery-details">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 post-title-block">
                        <h2 class="text-center">top destination</h2>
                        <h4 class="text-center"> Where do you wanna go? How much you wanna explore? </h4>
                        <div class="gallery-box">
                          <div class="gallery-content">
                              <div class="filtr-container">
                                  <div class="col-lg-3  col-md-3 col-xs-12">
                                      <h1 class="text-center">Category  </h1> 
                                      @foreach($tourpackagecategory  as $cat)
                                        @if($cat->CategoryStatus=="1")
                                            <div class="well">
                                                <a href="{{ url('/tour/'.$cat->CategoryName) }}" class="block-10">
                                                <img src="{{ asset('images/backend_images/categories/large/'.$cat->Imageaddress) }}" alt="portfolio image" />
                                                  <div class="text">
                                                      <h3 class="mt-0">{{ $cat->CategoryName }}</h3>
                                                      <p>{{ $cat->CategoryDescription }}</p>
                                                  </div>
                                                </a>   
                                            </div> 
                                            @endif
                                      @endforeach
                                  </div>
                                  
                                  <div class="col-lg-9 col-md-9 col-xs-12">
                                          @foreach($tourpackagesAll as $tourpackages)
                                            @if($tourpackages->Status=="1")
                                            <div class="col-md-6 col-xs-6">
                                                <div class="filtr-item">
                                                    <a href="{{ url('/tours/'.$tourpackages->id) }}">
                                                        <img src="{{ asset('images/backend_images/tours/large/'.$tourpackages->Imageaddress) }}" alt="portfolio image" />
                                                        <div class="item-title">
                                                            <h3 class="heading">{{ $tourpackages->PackageName}}</h3>
                                                            <p class="price">GHS {{ $tourpackages->PackagePrice}}</p>
                                                        </div> <!-- /.item-title-->
                                                    </a>
                                                </div><!-- /.filtr-item -->
                                            </div><!-- /.col -->
                                            @endif
                                          @endforeach 
                                          <span class="zigzag-separator separator-p-0">
                          <svg width="35" height="9" xmlns="http://www.w3.org/2000/svg"><path d="M1 7l5.5-5L12 7l5.5-5L23 7l5.5-5L34 7" stroke="#f53" stroke-width="3" fill="none" fill-rule="evenodd"></path></svg>
                    </span>
                                  </div>
                              </div>
                          </div>
                        </div>
                    </div>
                       
                </div>
            </div>
        </div> <!-- /container -->
    </section>
@include('layouts.frontLayout.user_subscription')

@include('layouts.frontLayout.user_footer')
   @endsection





