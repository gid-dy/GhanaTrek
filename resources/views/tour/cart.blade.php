@extends('layouts.frontLayout.userdesign')
    @section('content')

@include('layouts.frontLayout.user_topbar')
  
@include('layouts.frontLayout.user_header')


    <section>
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
            <div class="row" style="margin-top: 30px;">
            
                <div class="col-md-8">
                    
                      <?php $total_amount = 0; ?>
                      @foreach($userCart as $cart)
                        <div class="row">
                        
                            <div class="col-md-2"><img class="img-responsive" src="{{ asset('images/backend_images/tours/large/'.$cart->Imageaddress) }}">
                            </div>
                            <div class="col-md-6">
                                <h4 class="product-name"><strong>{{ $cart->PackageName }}</strong></h4>
                                <h4><small>{{ $cart->PackageCode }}</small></h4>
                                <h4><small>{{ $cart->TourTypeName }}</small></h4>
                                <h4><small>{{ $cart->Travellers }}</small></h4>
                                <h4><small>{{ $cart->TransportName }}</small></h4>
                                <h4><small>Language</small></h4>
                                <h4  class="button pull-right btn-fyi">GHS {{ $cart->PackagePrice }}</h4>
                                
                                <div class="product-removal">
                                    <a class ="cart_quantity_delete button" href="{{ url('/cart/delete-tourpackage/'.$cart->id) }}"><i class="fa fa-trash"></i> delete</a>
                                    
                                </div>
                                        
                                    
                            </div>
                            <p class="price pull-right">GHS {{ $cart->PackagePrice*$cart->Travellers }}.00
                            
                        </div>
                        <hr>
                      <?php $total_amount = $total_amount + ($cart->PackagePrice*$cart->Travellers);.00?>
                      @endforeach
                      <form method="post" action="{{ url('cart/apply-coupon') }}">
                          @csrf
                              <input type="text" name="CouponCode" placeholder="Coupon code" />
                              <input type="submit" value="Apply Coupon" class="button" />
                          
                      </form>
                      
                </div>
                
                <div class="col-md-4" style="background-color: white;">
                    <div class="text">
                    @if(!empty(Session::get('CouponAmount')))
                        <p class="heading">Sub Total <span class="pull-right">GHS <?php echo $total_amount; ?>.00</span></p>
                        <p class="heading">Coupon Discount <span class=" pull-right">GHS <?php echo Session::get('CouponAmount'); ?>.00</span></p>
                        <p class="heading">Grand Total <span class="price pull-right">GHS <?php echo $total_amount-Session::get('CouponAmount'); ?>.00</span></p>
                    @else

                        <p class="heading">Grand Total <span class=" pull-right">GHS <?php echo $total_amount; ?>.00</span></p>
                    @endif
                  
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-12">
                           <a href="{{ url('/billing') }}"> <button class="pay button btn-lg btn-block" type="button"><i class="fa fa-crosshairs"> checkout-coupon</i></button></a>
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
   @include('layouts.frontLayout.user_subscription')

@include('layouts.frontLayout.user_footer')
@endsection

