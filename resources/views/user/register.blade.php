@extends('layouts.frontLayout.userdesign')
    @section('content')

@include('layouts.frontLayout.user_topbar')
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
           @if (Session::has('flash_message_error'))    
                <div class="alert alert-error alert-block" style="background-color: #f2dfd0">
                    <button type="button" class="close" data-dismiss='alert'></button>
                    <strong>{!! session('flash_message_error') !!}</strong>
                </div>
            @endif 
            @if (Session::has('flash_message_success'))    
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss='alert'></button>
                    <strong>{!! session('flash_message_success') !!}</strong>
                </div>
            @endif
            <div class="content col-lg-12 col-md-12 col-sm-12 clearfix">
              <div class="col-lg-6 col-md-6 col-sm-12">
                <h4 class="title"><span>Why Join Us?</span></h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s..</p>
                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

                <p class="withpadding">Already having an account? <a href="{{ url('/login') }}">Click Here</a> to login now.</p>
              </div>

              <!-- end login -->

              <div class="col-lg-6 col-md-6 col-sm-12">
                <h4 class="title"><span>Register Form</span></h4>
                <form id="" name="registerform" method="post" action="{{ url('/register') }}">
                     @csrf
                      <p class="h4 text-center">Sign up</p>
                      <div class="col-md-12">
                          <div class="checkout-form-list">
                              <label>SurName</label>
                              <input id="SurName" type="text"  name="SurName" placeholder="SurName" required />
                              @if($errors->has('SurName'))
                                <span style="color: red">{{ $errors->first('SurName') }}</span>
                              @endif
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="checkout-form-list">
                              <label>Other names</label>
                              <input id="OtherNames" type="text"  name="OtherNames" placeholder="OtherNames" required />
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="checkout-form-list">
                              <label>Email</label>
                              <input id="UserEmail" type="email"  name="UserEmail" placeholder="UserEmail" required/>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="checkout-form-list">
                              <label>Mobile</label>              
                              <input id="Mobile" type="text"  name="Mobile" placeholder="Mobile" required />
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="checkout-form-list">
                              <label>Password</label>
                              <input id="myPassword" type="password"  name="Password" placeholder="password" required/>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="checkout-form-list">
                              <label>Confirm Password</label>
                              <input id="password-confirm" type="password"  name="Password_confirmation" required placeholder="password confirmation" />
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="checkout-form-list">
                              <input type="submit" class="button" value="register">
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
        @include('layouts.frontLayout.user_footer')
        

 
@endsection




