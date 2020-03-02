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
                  <a href="index.html" title="">
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
                <li><a href="index.html">Home</a></li>
                <li>Register</li>
              </ul>
              <h2>REGISTER</h2>
            </div>

          </div>
        </section>
        <!-- end post-wrapper-top -->

        <section class="section1">
          <div class="container clearfix">
            <div class="content col-lg-12 col-md-12 col-sm-12 clearfix">
              <div class="col-lg-6 col-md-6 col-sm-12">
                <h4 class="title"><span>Why Join Us?</span></h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s..</p>
                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

                <p class="withpadding">Already having an account? <a href="{{ url('/user/login') }}">Click Here</a> to login now.</p>
              </div>

              <!-- end login -->

              <div class="col-lg-6 col-md-6 col-sm-12">
                <h4 class="title"><span>Register Form</span></h4>
                <form id="registerform" name="registerform" method="POST" action="{{ route('user.register.submit') }}">
                     @csrf
                      <p class="h4 text-center">Sign up</p>
                      <div class="form-group row">
                          <label for="Surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input id="SurName" type="text" class="form-control @error('SurName') is-invalid @enderror" name="SurName" value="{{ old('Surname') }}" required autocomplete="email" autofocus>

                                @error('Surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Othername" class="col-md-4 col-form-label text-md-right">{{ __('Other names') }}</label>

                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                  <input id="OtherNames" type="text" class="form-control @error('OtherNames') is-invalid @enderror" name="OtherNames" value="{{ old('Othername') }}" required autocomplete="email" autofocus>

                                  @error('Othername')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                            <label for="UserEmail" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                  <input id="UserEmail" type="text" class="form-control @error('UserEmail') is-invalid @enderror" name="UserEmail" value="{{ old('UserEmail') }}" required autocomplete="UserEmail" autofocus>

                                  @error('UserEmail')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                            <label for="Country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
                              <div class="input-group">
                                  <select class="col-md-6 form-control" id="CountryId" name="CountryId">
                                    <?php echo $countries_dropdown ?? ''; ?>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group row">
                            <label for="Address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                  <input id="Address" type="text" class="form-control @error('Address') is-invalid @enderror" name="Address" value="{{ old('Address') }}" required autocomplete="Address" autofocus>

                                  @error('Address')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                            <label for="City" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                  <input id="City" type="text" class="form-control @error('City') is-invalid @enderror" name="City" value="{{ old('City') }}" required autocomplete="City" autofocus>

                                  @error('City')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                            <label for="State" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                  <input id="State" type="text" class="form-control @error('State') is-invalid @enderror" name="State" value="{{ old('State') }}" required autocomplete="State" autofocus>

                                  @error('State')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="Mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input id="Mobile" type="text" class="form-control @error('Mobile') is-invalid @enderror" name="Mobile" value="{{ old('Mobile') }}" required autocomplete="State" autofocus>

                                    @error('Mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                          </div>
                          <div class="form-group row">
                              <label for="OtherContact" class="col-md-4 col-form-label text-md-right">{{ __('Other Contact') }}</label>

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input id="OtherPhoneContact" type="text" class="form-control @error('OtherPhoneContact') is-invalid @enderror" name="OtherPhoneContact" value="{{ old('OtherContact') }}" required autocomplete="OtherContact" autofocus>

                                    @error('OtherContact')
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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <span class="pull-right">
                                <input type="submit" class="button" value="register">
                                   </span>
                            </div>
                        </div>
                </form>

              </div>
              <!-- end register -->
            </div>
            <!-- end content -->
          </div>
          <!-- end container -->
        </section>
        <!-- end section -->
@endsection


</body>
</html>
