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
                <li><a href="{{ url('index') }}">{{ __('Home') }}</a></li>
                <li><a href="{{ url('setting') }}"><i class="fa fa-user"></i> {{ __('Account') }}</a></li>
        				<li><a href="{{ url('wishlist') }}"><i class="fa fa-star"></i> {{ __('Wishlist') }}</a></li>
        				<li><a href="{{ url('cart') }}"><i class="fa fa-shopping-cart"></i> {{ __('Cart') }}</a></li>
        				<li><a href="{{ url('login') }}"><i class="fa fa-lock"></i> {{ __('Login') }}</a></li>

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

  <section>
      <div class="carousel-inner">
          <img src="{{ asset('images/frontend_images/86.jpg') }}" class="" alt="..." width="1400px" height="960px">
          <div class="carousel-caption">
              <div class="d-flex text-center h-100">
                <div class="my-auto w-100 text-white">
                  <h1 class="display-3">Video Header</h1>
                  <h2>With HTML5 Video and Bootstrap 4</h2>
                </div>
              </div>
          </div>
      </div>
  </section>


  <!--cat badges-->
    <section class="cat_badge">
      <div class="container">
          <div class="row label-bagdes">
              <!--Category buttons-->
              <div class="col-md-12">

                      <div align="center">
                      @foreach($tourpackagecategory as $cat)
                        @if($cat->CategoryStatus=="1")
                        <a href="{{ $cat->CategoryName }}"><button class="btn btn-default filter-button" data-filter="hdpe">{{ $cat->CategoryName }}

                        </button></a>
                        @endif
                        @endforeach
                    </div>
              </div>
                    <!--cat badges end-->
          </div>
      </div><!--/.container-->
    </section>
    <section id="pack" class="packages">
      <div class="container">
               <div class="col-xl-6 mx-auto text-center">
                  <div class="section-title mb-100">
                     <h4>{{ $categoryDetails->CategoryName }}</h4>
                  </div>
            </div>
        <div>
          <div class="row">
            @foreach($tourpackagesAll as $tourpackages)
              @if($tourpackages->Status=="1")
                <div class="col-md-4 col-sm-6">
                  <a href="{{ url('tours/'.$tourpackages->PackageId) }}" class="block-5">
                    <img src="{{ asset('images/backend_images/tours/large/'.$tourpackages->Imageaddress) }}" alt="portfolio image" />
                    <div class="text">
                      <h3 class="heading">{{ $tourpackages->PackageName}}<span class="price pull-right"> GHS {{ $tourpackages->PackagePrice}}</span></h3>
                      <div class="post-meta">
                        <p>
                            <span class="price">
                              <i class="fa fa-angle-right"></i> {{ $tourpackages->AccommodationName}}
                            </span>
                            <span class="price">
                            <i class="fa fa-angle-right"></i>  {{ $tourpackages->Description}}
                          </span>
                          </p>

                      </div>
                      <div class="about-btn">
                          <button  class="about-view packages-btn price pull-right">
                            book now
                          </button>
                        </div>
                    </div>
                  </a>

                </div><!--/.col-->
              @endif
            @endforeach

          </div><!--/.row-->
        </div><!--/.packages-content-->
      </div><!--/.container-->

    </section><!--/.packages-->
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





  <script>
    const elem = document.querySelector('figure')
const duration = window.innerHeight

let scrollTarget = 0
let scrollCurrent = 0

const ease = 0.15

const tl = new TimelineLite({ paused: true })
tl.fromTo(elem, 1, { alpha: 1, scale: 1, yPercent: 0 }, { alpha: 0, scale: 0.5, yPercent: -50 })

window.addEventListener('scroll', () => {
  scrollTarget = window.scrollY
})

function normalize(val, max, min) {
  return (val - min) / (max - min)
}

function render() {
  scrollCurrent += (scrollTarget - scrollCurrent) * ease

  const progress = normalize(scrollCurrent, duration, 0)
  tl.progress(progress)

  requestAnimationFrame(render)
}

requestAnimationFrame(render)
</script>

</body>
</html>
