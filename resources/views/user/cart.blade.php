@extends('layouts.frontLayout.userdesign')
    @section('content')

@include('layouts.frontLayout.user_topbar')
  
@include('layouts.frontLayout.user_header')

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
    @include('layouts.frontLayout.user_footer')


@endsection

