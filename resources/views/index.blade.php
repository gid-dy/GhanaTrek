@extends('layouts.frontLayout.userdesign')

<body>
    <div class="topbar clearfix">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="contactinfo pull-left">
            <ul class="nav nav-pills">
              <li><a href="#"><i class="fa fa-phone"></i> +233 542 500 499</a></li>
              <li><a href="#"><i class="fa fa-envelope"></i> einsteingideon@gmail.com</a></li>
            </ul>
					</div>
				</div>
        <div class="col-sm-6">
          <div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
        </div>
      </div>
    </div>
    <!-- end container -->
  </div>
  <!-- end topbar -->
  <header class="header">
    <div class="container">
      <div class="site-header clearfix">
        <div class="col-lg-3 col-md-3 col-sm-12 title-area">
          <div class="site-title" id="title">
            <a href="{{ url('index') }}" title="">
              <h4>GHANA<span>TREK</span></h4>
            </a>
          </div>
        </div>
        <!-- title area -->
        <div class="col-lg-9 col-md-12 col-sm-12">
          <div id="nav" class="right">
            <div class="container clearfix">
              <ul id="jetmenu" class="jetmenu blue">
                <li class="active"><a href="{{ url('index') }}">{{ __('Home') }}</a></li>
                <li><a href="{{ url('settings') }}"><i class="fa fa-user"></i> {{ __('Account') }}</a></li>
        				<li><a href="{{ url('wishlist') }}"><i class="fa fa-star"></i> {{ __('Wishlist') }}</a></li>
        				<li><a href="{{ url('cart') }}"><i class="fa fa-shopping-cart"></i> {{ __('Cart') }}</a></li>
                        @guest
        				<li><a href="{{ url('login') }}"><i class="fa fa-lock"></i> {{ __('Login') }}</a></li>
                       
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                             <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                <li><a href="#">USA</a>
                  <ul class="dropdown">
                    <li><a href="#">Canada</a></li>
                    <li><a href="#">UK</a></li>
                  </ul>
                </li>
                <li><a href="#">DOLLAR</a>
                  <ul class="dropdown">
                    <li><a href="#">Canadian Dollar</a></li>
                    <li><a href="#">Pound</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <!-- nav -->
        </div>
        <!-- title area -->
      </div>
      <!-- site header -->
    </div>
    <!-- end container -->
  </header>
  <!-- end header -->


@section('content')

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
                                      @foreach($tourpackagecategory as $cat)
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
                                                    <a href="{{ url('/tours/'.$tourpackages->PackageId) }}">
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

  

    <section id="subs" class="subscribe">

    <div class="subscribe-title text-center">
      <h2>
        Join our Subscribers List to Get Regular Update
      </h2>
      <p>
        Subscribe Now. We will send you Best offer for your Trip
      </p>
    </div>
    <form>
      <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
          <div class="custom-input-group">
            <input type="email" class="form-control" placeholder="Enter your Email Here">
            <button class="appsLand-btn subscribe-btn">Subscribe</button>
            <div class="clearfix"></div>
            <i class="fa fa-envelope"></i>
          </div>

        </div>
      </div>
    </form>
</section>


   @endsection




</body>
</html>
