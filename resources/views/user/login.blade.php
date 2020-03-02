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

    @section('content')
      <header class="header">
        <div class="container">
          <div class="site-header clearfix">
            <div class="col-lg-3 col-md-3 col-sm-12 title-area">
              <div class="site-title" id="title">
                <a href="{{ url('/index') }}" title="">
                  <h4>GHANA<span>TREK</span></h4>
                </a>
              </div>
            </div>
          </div>
          <!-- site header -->
        </div>
        <!-- end container -->
      </header>
      <!-- end header -->

      <section class="post-wrapper-top">
        <div class="container">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <ul class="breadcrumb">
              <li><a href="{{ url('/index') }}">{{ __('Home') }}</a></li>
              <li>{{ __('Login') }}</li>
            </ul>
            <h2>{{ __('LOGIN') }}</h2>
          </div>
        </div>
      </section>
      <!-- end post-wrapper-top -->

      <section class="section1">
        <div class="container clearfix">
          <div class="content col-lg-12 col-md-12 col-sm-12 clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h4 class="title"><span>{{ __('Welcome back!') }}</span></h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s.</p>
                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                <p class="withpadding">Still not registered?
                    <a href="{{ url('/user/register') }}">Click Here</a> to register now.</p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h4 class="title"><span>{{ __('Login Form') }}</span></h4>
                  <form method="POST" action="{{ route('user.login.submit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="UserEmail" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <span class="pull-right">
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                </span>
                              </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <span class="pull-right">
                                    <input type="submit" class="button" value="register">
                                </span>
                            </div>
                            <div>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                  </form>
            </div>
            {{--  <!-- end login -->  --}}
          </div>
          {{--  <!-- end content -->  --}}
        </div>
        <!-- end container -->
      </section>
      {{--  < end section >  --}}
  @endsection



</body>
</html>
