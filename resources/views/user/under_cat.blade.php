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
                        <button class="btn btn-default filter-button active" data-filter="all">All Categories
                                <span class="badge">70</span>
                        </button>
                        <button class="btn btn-default filter-button" data-filter="hdpe">Category 1
                                  <span class="badge">90</span>
                        </button>
                        <button class="btn btn-default filter-button" data-filter="sprinkle">Category 2
                                  <span class="badge">70</span>
                        </button>
                        <button class="btn btn-default filter-button" data-filter="spray">Category 3
                                  <span class="badge">170</span>
                        </button>
                        <button class="btn btn-default filter-button" data-filter="irrigation">Category 4
                                  <span class="badge">07</span>
                        </button>
                    </div>
              </div>
                    <!--cat badges end-->
          </div>
      </div><!--/.container-->
    </section>
    <section id="pack" class="packages">
      <div class="container">
        <div class="gallary-header text-center">
          <h2>
            special packages
          </h2>
          <p>
            Duis aute irure dolor in  velit esse cillum dolore eu fugiat nulla.  
          </p>
        </div><!--/.gallery-header-->
        <div>
          <div class="row">

            <div class="col-md-4 col-sm-6">
              <a href="{{ url('details') }}" class="block-5">
                <img src="{{ asset('images/frontend_images/fiema_02.jpg') }}" alt="package-place">
                <div class="text">
                  <h3 class="heading">Fiema<span class="price pull-right">$399</span></h3>
                  <div class="post-meta">
                    <p>
                        <span class="price">
                          <i class="fa fa-angle-right"></i> 5 Days 6 nights
                        </span>
                        <span class="price">
                        <i class="fa fa-angle-right"></i>  5 star accomodation
                      </span>
                      </p>
                      <p>
                        <span class="price">
                          <i class="fa fa-angle-right"></i>  transportation
                        </span>
                        <span class="price">
                        <i class="fa fa-angle-right"></i>  food facilities
                      </span>
                       </p>
                  </div>
                  <p class="star-rate"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-half-full"></span> <span>500 reviews</span></p>
                  <div class="about-btn">
                      <button  class="about-view packages-btn price pull-right">
                        book now
                      </button>
                    </div>
                </div>
              </a>

            </div><!--/.col-->

            <div class="col-md-4 col-sm-6">
              <a href="{{ url('details') }}" class="block-5">
                <img src="{{ asset('images/frontend_images/cape coast.jpg') }}" alt="package-place">
                <div class="text">
                  <h3 class="heading">Cape Coast<span class="price pull-right">$399</span></h3>
                  <div class="post-meta">
                    <p>
                        <span class="price">
                          <i class="fa fa-angle-right"></i> 5 Days 6 nights
                        </span>
                        <span class="price">
                        <i class="fa fa-angle-right"></i>  5 star accomodation
                      </span>
                      </p>
                      <p>
                        <span class="price">
                          <i class="fa fa-angle-right"></i>  transportation
                        </span>
                        <span class="price">
                        <i class="fa fa-angle-right"></i>  food facilities
                      </span>
                       </p>
                  </div>
                  <p class="star-rate"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star-half-full"></span> <span>500 reviews</span></p>
                  <div class="about-btn">
                      <button  class="about-view packages-btn price pull-right">
                        book now
                      </button>
                    </div>
                </div>
              </a>

            </div><!--/.col-->
            
            <div class="col-md-4 col-sm-6">
              <a href="{{ url('details') }}" class="block-5">
                <img src="{{ asset('images/frontend_images/mole.jpg') }}" alt="package-place">
                <div class="text">
                  <h3 class="heading">thailand<span class="price pull-right">$399</span></h3>
                  <div class="post-meta">
                    <p>
                        <span class="price">
                          <i class="fa fa-angle-right"></i> 5 Days 6 nights
                        </span>
                        <span class="price">
                        <i class="fa fa-angle-right"></i>  5 star accomodation
                      </span>
                      </p>
                      <p>
                        <span class="price">
                          <i class="fa fa-angle-right"></i>  transportation
                        </span>
                        <span class="price">
                        <i class="fa fa-angle-right"></i>  food facilities
                      </span>
                       </p>
                  </div>
                  <p class="star-rate"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star-half-full"></span> <span>500 reviews</span></p>
                  <div class="about-btn">
                      <button  class="about-view packages-btn price pull-right">
                        book now
                      </button>
                    </div>
                </div>
              </a>

            </div><!--/.col-->
            
            <div class="col-md-4 col-sm-6">
              <a href="{{ url('details') }}" class="block-5">
                <img src="{{ asset('images/frontend_images/nzulezu.jpg') }}" alt="package-place">
                <div class="text">
                  <h3 class="heading">Nzulezu<span class="price pull-right">$399</span></h3>
                  <div class="post-meta">
                    <p>
                        <span class="price">
                          <i class="fa fa-angle-right"></i> 5 Days 6 nights
                        </span>
                        <span class="price">
                        <i class="fa fa-angle-right"></i>  5 star accomodation
                      </span>
                      </p>
                      <p>
                        <span class="price">
                          <i class="fa fa-angle-right"></i>  transportation
                        </span>
                        <span class="price">
                        <i class="fa fa-angle-right"></i>  food facilities
                      </span>
                       </p>
                  </div>
                  <p class="star-rate"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star-half-full"></span> <span>500 reviews</span></p>
                  <div class="about-btn">
                      <button  class="about-view packages-btn price pull-right">
                        book now
                      </button>
                    </div>
                </div>
              </a>

            </div><!--/.col-->
            
            <div class="col-md-4 col-sm-6">
              <a href="{{ url('details') }}" class="block-5">
                <img src="{{ asset('images/frontend_images/kakum.jpg') }}" alt="package-place">
                <div class="text">
                  <h3 class="heading">Kakum<span class="price pull-right">$399</span></h3>
                  <div class="post-meta">
                    <p>
                        <span class="price">
                          <i class="fa fa-angle-right"></i> 5 Days 6 nights
                        </span>
                        <span class="price">
                        <i class="fa fa-angle-right"></i>  5 star accomodation
                      </span>
                      </p>
                      <p>
                        <span class="price">
                          <i class="fa fa-angle-right"></i>  transportation
                        </span>
                        <span class="price">
                        <i class="fa fa-angle-right"></i>  food facilities
                      </span>
                       </p>
                  </div>
                  <p class="star-rate"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star-half-full"></span> <span>500 reviews</span></p>
                  <div class="about-btn">
                      <button  class="about-view packages-btn price pull-right">
                        book now
                      </button>
                    </div>
                </div>
              </a>

            </div><!--/.col-->
            
            <div class="col-md-4 col-sm-6">
              <a href="{{ url('details') }}" class="block-5">
                <img src="{{ asset('images/frontend_images/elmina_02.jpg') }}" alt="package-place">
                <div class="text">
                  <h3 class="heading">Elmina Castle<span class="price pull-right">$399</span></h3>
                  <div class="post-meta">
                    <p>
                        <span class="price">
                          <i class="fa fa-angle-right"></i> 5 Days 6 nights
                        </span>
                        <span class="price">
                        <i class="fa fa-angle-right"></i>  5 star accomodation
                      </span>
                      </p>
                      <p>
                        <span class="price">
                          <i class="fa fa-angle-right"></i>  transportation
                        </span>
                        <span class="price">
                        <i class="fa fa-angle-right"></i>  food facilities
                      </span>
                       </p>
                  </div>
                  <p class="star-rate"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star-half-full"></span> <span>500 reviews</span></p>
                  <div class="about-btn">
                      <button  class="about-view packages-btn price pull-right">
                        book now
                      </button>
                    </div>
                </div>
              </a>

            </div><!--/.col-->

            <div class="col-md-4 col-sm-6">
              <a href="{{ url('details') }}" class="block-5">
                <img src="{{ asset('images/frontend_images/umbrella stone.jpg') }}" alt="package-place">
                <div class="text">
                  <h3 class="heading">Umbrella Stone<span class="price pull-right">$399</span></h3>
                  <div class="post-meta">
                    <p>
                        <span class="price">
                          <i class="fa fa-angle-right"></i> 5 Days 6 nights
                        </span>
                        <span class="price">
                        <i class="fa fa-angle-right"></i>  5 star accomodation
                      </span>
                      </p>
                      <p>
                        <span class="price">
                          <i class="fa fa-angle-right"></i>  transportation
                        </span>
                        <span class="price">
                        <i class="fa fa-angle-right"></i>  food facilities
                      </span>
                       </p>
                  </div>
                  <p class="star-rate"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star-half-full"></span> <span>500 reviews</span></p>
                  <div class="about-btn">
                      <button  class="about-view packages-btn price pull-right">
                        book now
                      </button>
                    </div>
                </div>
              </a>

            </div><!--/.col-->
            
            <div class="col-md-4 col-sm-6">
              <a href="{{ url('details') }}" class="block-5">
                <img src="{{ asset('images/frontend_images/boti falls.jpg') }}" alt="package-place">
                <div class="text">
                  <h3 class="heading">Boti fall<span class="price pull-right">$399</span></h3>
                  <div class="post-meta">
                    <p>
                        <span class="price">
                          <i class="fa fa-angle-right"></i> 5 Days 6 nights
                        </span>
                        <span class="price">
                        <i class="fa fa-angle-right"></i>  5 star accomodation
                      </span>
                      </p>
                      <p>
                        <span class="price">
                          <i class="fa fa-angle-right"></i>  transportation
                        </span>
                        <span class="price">
                        <i class="fa fa-angle-right"></i>  food facilities
                      </span>
                       </p>
                  </div>
                  <p class="star-rate"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star-half-full"></span> <span>500 reviews</span></p>
                  <div class="about-btn">
                      <button  class="about-view packages-btn price pull-right">
                        book now
                      </button>
                    </div>
                </div>
              </a>

            </div><!--/.col-->
            
            <div class="col-md-4 col-sm-6">
              <a href="{{ url('details') }}" class="block-5">
                <img src="{{ asset('images/frontend_images/paga.jpg') }}" alt="package-place">
                <div class="text">
                  <h3 class="heading">Paga Crocodile Pond<span class="price pull-right">$399</span></h3>
                  <div class="post-meta">
                    <p>
                        <span class="price">
                          <i class="fa fa-angle-right"></i> 5 Days 6 nights
                        </span>
                        <span class="price">
                        <i class="fa fa-angle-right"></i>  5 star accomodation
                      </span>
                      </p>
                      <p>
                        <span class="price">
                          <i class="fa fa-angle-right"></i>  transportation
                        </span>
                        <span class="price">
                        <i class="fa fa-angle-right"></i>  food facilities
                      </span>
                       </p>
                  </div>
                  <p class="star-rate"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star-half-full"></span> <span>500 reviews</span></p>
                  <div class="about-btn">
                      <button  class="about-view packages-btn price pull-right">
                        book now
                      </button>
                    </div>
                </div>
              </a>

            </div><!--/.col-->
            <div class="container"> 
                <ul class="pagination">
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">«</span>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">»</span>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
            </div>

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
