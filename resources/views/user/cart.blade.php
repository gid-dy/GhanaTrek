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
        <div class="container">
            <div class="row" style="margin-top: 30px;">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-2"><img class="img-responsive" src="{{ asset('images/frontend_images/nzulezu.jpg') }}">
                        </div>
                        <div class="col-md-4">
                            <h4 class="product-name"><strong>Product name</strong></h4>
                            <h4><small>Product description</small></h4>
                            <h4><small>Type</small></h4>
                            <h4><small>No of People</small></h4>
                            <h4><small>Language</small></h4>
                            <div class="product-removal">
                                <button>
                                        <span class="glyphicon glyphicon-trash"> delete</span>
                                </button>
                            </div>
                            <div class="coupon-info">
                                    <form action="#">
                                        <p class="checkout-coupon">
                                            <input type="text" placeholder="Coupon code" />
                                            <input type="submit" value="Apply Coupon" />
                                        </p>
                                    </form>
                                </div>
                        </div>
                    </div>
                    <hr>

                </div>
                <div class="col-md-4" style="background-color: white;">
                    <div class="text">
                        <h3 class="heading">Total ( _ item)<span class="price pull-right">cost</span></h3>
                  
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-12">
                           <a href="{{ url('billing') }}"> <button class="pay button btn-lg btn-block" type="button"><i class="fa fa-crosshairs"> checkout-coupon</i></button></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                           <a href="{{ url('under_cat') }}"> <button class="pay button btn-lg btn-block" type="button"><i class="fa fa-crosshairs"> See More Activities</i></button></a>
                        </div>
                    </div>
                    <div class="cart-section col-md-12" style="font-size: 16px;margin-top: 30px;">
                        <a href="{{ url('register') }}">Create Account</a> or <a href="{{ url('login') }}">login</a> for faster booking
                    </div>
                
                </div>
                    
            </div>
        </div>
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