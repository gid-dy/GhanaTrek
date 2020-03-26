@extends('layouts.frontLayout.userdesign')
    @section('content')

@include('layouts.frontLayout.user_topbar')
  
@include('layouts.frontLayout.user_header')
  <section>
    <!-- checkout-area start -->
        <div class="checkout-area ptb-100">
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
            <div class="container">
                <div class="row">
                    <form action="{{ url('/billing') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="billing-details">
                                    <h3>Billing Details</h3>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>SurName</label>
                                            <input value="{{ $userDetails->SurName }}" id="billing_SurName" type="text"  name="billing_SurName" placeholder="SurName" />
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Other names</label>
                                            <input value="{{ $userDetails->OtherNames }}" id="billing_OtherNames" type="text"  name="billing_OtherNames" placeholder="OtherNames" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Email</label>
                                            <input value="{{ $userDetails->UserEmail }}" id="billing_email" type="email"  name="billing_email" placeholder="UserEmail"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="country-select">
                                            <label>Country</label>
                                            <select  id="billing_country_name" name="billing_country_name" >
                                                <option value="">Select Country</option>
                                                @foreach($countries as $country)
                                                <option value="{{ $country->country_name }}" @if($country->country_name == $userDetails->country_name)selected @endif>{{ $country->country_name }}</option>
                                                @endforeach
                                            </select>                     
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Mobile</label>              
                                            <input value="{{ $userDetails->Mobile }}" id="billing_Mobile" type="text"  name="billing_Mobile" placeholder="Mobile"  />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Other Contact</label>              
                                            <input value="{{ $userDetails->OtherContact }}" id="billing_OtherContact" type="text"  name="billing_OtherContact" placeholder="Other Contact"  />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Address</label>
                                            <input value="{{ $userDetails->Address }}" id="billing_Address" type="text"  name="billing_Address" placeholder="Address"  />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>City</label>
                                            <input value="{{ $userDetails->City }}" id="billing_City" type="text"  name="billing_City" placeholder="City"  />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>State</label>                   
                                            <input value="{{ $userDetails->State}}" id="billing_State" type="text"  name="billing_State" placeholder="State" />
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input value="{{ $userDetails->SurName }}" class="form-check-input" id="ship-box" type="checkbox" />
                                        <label class="form-check-label" for="ship-box">DIFFERENT TRAVELING DETAILS ?<label>
                                    </div>
                                </div>               
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="travelling-details">
                                    <h3>Travelling Details</h3>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>SurName</label>
                                            <input  id="travelling_SurName" type="text"  name="travelling_SurName" placeholder="SurName" />
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                            <div class="checkout-form-list">
                                            <label>Other names</label>
                                            <input  id="travelling_OtherNames" type="text"  name="travelling_OtherNames" placeholder="OtherNames" />
                                            </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Email</label>
                                            <input  id="travelling_email" type="email"  name="travelling_email" placeholder="UserEmail"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="country-select">
                                            <label>Country</label>
                                            <select  id="travelling_country_name" name="travelling_country_name" >
                                                <option value="">Select Country</option>
                                                @foreach($countries as $country)
                                                <option value="{{ $country->country_name }}">{{ $country->country_name }}</option>
                                                @endforeach
                                            </select>                     
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Mobile</label>              
                                            <input  id="travelling_Mobile" type="text"  name="travelling_Mobile" placeholder="Mobile" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Other Contact</label>              
                                            <input  id="travelling_OtherContact" type="text"  name="travelling_OtherContact" placeholder="Other Contact"  />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Address</label>
                                            <input  id="travelling_Address" type="text"  name="travelling_Address" placeholder="Address"  />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>City</label>
                                            <input  id="travelling_City" type="text"  name="travelling_City" placeholder="City"  />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>State</label>                   
                                            <input  id="travelling_State" type="text"  name="travelling_State" placeholder="State" />
                                        </div>
                                    </div> 
                                    <div class="col-md-12">
                                        <div class="order-button-payment">
                                            <button type="submit" class="button">Checkout</button>
                                        </div>
                                    </div> 
                                </div>           
                            </div>
                        </div> 
                        {{-- <div class="col-lg-5 col-md-5">
                            <div class="your-order">
                                <h3>Your Tour Package</h3>
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name">Tour Package</th>
                                                <th class="product-total">Total</th>
                                            </tr>             
                                        </thead>
                                        <tbody>
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    Nzulezu
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">£165.00</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount">£165.00</span></td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Package Total</th>
                                                <td><strong><span class="amount">£165.00</span></strong>
                                                </td>
                                            </tr>               
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div> --}}
                    </form>
                </div>
            </div>
            <hr>
        </div>
        <!-- checkout-area end -->
  </section>
@include('layouts.frontLayout.user_footer')
   @endsection