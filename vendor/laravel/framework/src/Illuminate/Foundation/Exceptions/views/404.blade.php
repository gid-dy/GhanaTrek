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

<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>Oops!</h1>
			</div>
			<h2>404 - Page not found</h2>
			<p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
			<a class="button btn" href="{{ asset('./') }}">Go To Homepage</a>
		</div>
	</div>

@endsection




</body>
</html>
