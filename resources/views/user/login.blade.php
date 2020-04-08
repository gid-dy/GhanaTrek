@extends('layouts.frontLayout.userdesign')
    @section('content')



      <section class="post-wrapper-top">
        <div class="container">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <ul class="breadcrumb">
              <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
              <li>{{ __('Login') }}</li>
            </ul>
            <h2>{{ __('LOGIN') }}</h2>
          </div>
        </div>
      </section>
      <!-- end post-wrapper-top -->
        <div class="container">
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
        </div>
      <section class="section1">
        <div class="container clearfix">
          <div class="content col-lg-12 col-md-12 col-sm-12 clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h4 class="title"><span>{{ __('Welcome back!') }}</span></h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s.</p>
                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                <p class="withpadding">Still not registered?
                    <a href="{{ url('/register') }}">Click Here</a> to register now.</p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h4 class="title"><span>{{ __('Login Form') }}</span></h4>
                  <form method="POST" action="{{ url('/login') }}">
                        @csrf

                        <div class="col-md-12">
                            <div class="checkout-form-list">
                                <label>Email</label>
                                <input id="UserEmail" type="email"  name="UserEmail" placeholder="UserEmail" required/>
                                @error('UserEmail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="checkout-form-list">
                                <label>Password</label>
                                <input id="Password" type="password"  name="Password" placeholder="password" required/>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="checkout-form-list">
                                <input type="submit" class="button" value="login"><br>
                                <a href="{{ url('/forgot-password') }}">forgot Password?</a>
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




