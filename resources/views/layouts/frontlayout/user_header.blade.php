<header class="header">
    <div class="container">
      <div class="site-header clearfix">
        <div class="col-lg-3 col-md-3 col-sm-12 title-area">
          <div class="site-title" id="title">
            <a href="{{ url('/') }}" title="">
              <h4>GHANA<span>TREK</span></h4>
            </a>
          </div>
        </div>
        <!-- title area -->
        <div class="col-lg-9 col-md-12 col-sm-12">
          <div id="nav" class="right">
            <div class="container clearfix">
              <ul id="jetmenu" class="jetmenu blue">
                <li class="active"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                
        				<li><a href="{{ url('wishlist') }}"><i class="fa fa-star"></i> {{ __('Wishlist') }}</a></li>
        				<li><a href="{{ url('cart') }}"><i class="fa fa-shopping-cart"></i> {{ __('Cart') }}</a></li>
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
                @if(empty(Auth::check()))
        				    <li><a href="{{ url('login') }}"><i class="fa fa-lock"></i> {{ __('Login') }}</a></li>
                @else
                <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->SurName }} <span class="caret"></span>
                                    
                                </a>
                                

                                <div class=" user-side dropdown-menu " aria-labelledby="navbarDropdown">
                                <div>
                                  <a href="{{ url('account') }}"><i class="fa fa-user"></i> {{ __('Account') }}</a>
                                </div>

                                    <a class="dropdown-item" href="{{ url('logout') }}"><i class="fa fa-sign-out"></i>
                                       
                                        {{ __('Logout') }}
                                    </a>

                                    
                                </div>
                                
                                
                            </li>
                @endif
                
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
