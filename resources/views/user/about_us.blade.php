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
      <!-- About Us section -->
        <section>
            <div class="container">
                <div class="row" style="padding: 60px;">
                    <div class="col-md-4 col-sm-6 col-xs-12" >
                        <div class="aboutus">
                            <h2 class="aboutus-title">About Us</h2>
                            <p class="aboutus-text">We are dedicated to the provision of objective, accurate, informative and reliable travel content in various formats, to enable our clients have the best of travel experience.</p>
                            <p class="aboutus-text">With all of our packages and features updated by our experts, we seek to provide quality and secured services for our clients.We pride ourselves on producing content that stands out from the crowd.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="feature">
                            <div class="feature-box">
                                <div class="clearfix">
                                    <div class="iconset">
                                        <span class="fa fa-cog icon-about"></span>
                                    </div>
                                    <div class="feature-content">
                                        <h4>Mission</h4>
                                        <p>To provide of objective, accurate, informative and reliable travel content in various formats, to enable our clients have the best of travel experience.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="feature-box">
                                <div class="clearfix">
                                    <div class="iconset">
                                        <span class="fa fa-cog icon-about"></span>
                                    </div>
                                    <div class="feature-content">
                                        <h4>Vision</h4>
                                        <p>To project Ghana's tourism to the outside world to pride ourselves on producing content that stands out from the crowd.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="feature-box">
                                <div class="clearfix">
                                    <div class="iconset">
                                        <span class="fa fa-cog icon-about"></span>
                                    </div>
                                    <div class="feature-content">
                                        <h4>Goal</h4>
                                        <p>To reach out to numerous travellers outside the country to have a feel of what Ghana's tourist attractions have in stock for them.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="feature">
                            <div class="feature-box">
                                <div class="clearfix">
                                    <div class="iconset">
                                        <span class="fa fa-cog icon-about"></span>
                                    </div>
                                    <div class="feature-content">
                                        <h4>Work with heart</h4>
                                        <p>Clients first is always the words on our lips.We share in their joy and always seek to do what is best for them.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="feature-box">
                                <div class="clearfix">
                                    <div class="iconset">
                                        <span class="fa fa-cog icon-about"></span>
                                    </div>
                                    <div class="feature-content">
                                        <h4>Reliable services</h4>
                                        <p>We seek to provide quality and secured services for our clients at our various tour sites</p>
                                    </div>
                                </div>
                            </div>
                            <div class="feature-box">
                                <div class="clearfix">
                                    <div class="iconset">
                                        <span class="fa fa-cog icon-about"></span>
                                    </div>
                                    <div class="feature-content">
                                        <h4>Great support</h4>
                                        <p>With the feedback we get from our clients we are able to improve upon our services to suit their needs which increases the clients we who visits.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <h1 class="team">
                      <hr>
                        The man Behind Everything
                        <br><hr>
                    </h1>
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="col-md-12 col-sm-12" >
                            <div class="card-container" style=" margin: 0 auto;width: 100%;min-width: 280px;max-width: 520px;margin-bottom: 20px;">
                                <div class="card" >
                                    <div class="front">
                                        <div class="cover">
                                            <img src="{{ asset('images/frontend_images/back.jpg') }}"/>
                                        </div>
                                        <div class="user">
                                            <img class="img-circle" src="{{ asset('images/frontend_images/gid.jpg') }}"/>
                                        </div>
                                        <div class="content">
                                            <div class="main">
                                                <h3 class="name">Atuahene Gideon</h3>
                                                <p class="profession">Web developer</p>
                                                <p class="text-center">"Specialised in web, and since I made it here I can make it anywhere, yeah, they love me everywhere"</p>
                                            </div>
                                        </div>
                                    </div> <!-- end front panel -->
                                    <div class="back">
                                        <div class="header">
                                            <h5 class="motto">"To be or not to be, this is my awesome motto!"</h5>
                                        </div>
                                        <div class="content">
                                            <div class="main">
                                                <h4 class="text-center">Job Description</h4>
                                                <p class="text-center">Web design, Adobe Photoshop, HTML5, CSS3, PHP and many others...</p>

                                                <div class="stats-container">
                                                    <div class="stats">
                                                        <h4>235</h4>
                                                        <p>
                                                            Followers
                                                        </p>
                                                    </div>
                                                    <div class="stats">
                                                        <h4>114</h4>
                                                        <p>
                                                            Following
                                                        </p>
                                                    </div>
                                                    <div class="stats">
                                                        <h4>35</h4>
                                                        <p>
                                                            Projects
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="footer">
                                            <div class="social-links text-center">
                                                <a href="https://creative-tim.com" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>
                                                <a href="https://creative-tim.com" class="google"><i class="fa fa-google-plus fa-fw"></i></a>
                                                <a href="https://creative-tim.com" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>
                                            </div>
                                        </div>
                                    </div> <!-- end back panel -->
                                </div> <!-- end card -->
                             </div> <!-- end card-container -->
                        </div> <!-- end col sm 3 -->
                <!--         <div class="col-sm-1"></div> -->
                    
                    </div> <!-- end col-sm-10 -->
                </div> <!-- end row -->
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
