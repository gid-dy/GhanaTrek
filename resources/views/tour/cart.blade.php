
@extends('layouts.frontLayout.userdesign')
    @section('content')
    <?php use App\Tourpackages; ?>

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
                <table class="table table-hover your-order">
                        <thead style="background-color:yellow;">
                            <tr>
                                <th>Tour</th>
                                <th></th>
                                <th>Tour Type</th>
                                <th>Price</th>
                                <th>No of Travellers</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                      <?php $total_amount = 0; ?>
                      @foreach($userCart as $cart)
                        <div class="row">
                            <tr>
                                <td style="width:100px;"><img class="img-responsive" src="{{ asset('images/backend_images/tours/large/'.$cart->Imageaddress) }}"></td>
                                <td><h4><small>{{ $cart->PackageName }}</small></h4>
                                    <h4><small>Tour Code: {{ $cart->PackageCode }}</small></h4>
                                    <p>  {{ $cart->TransportName }}</p>
                                </td>
                                <td><h4><small>{{ $cart->TourTypeName }}</small></h4></td>
                                <td>
                                    <?php $PackagePrice = Tourpackages::getPackagePrice($cart->Package_id, $cart->TourTypeName); ?>
                                    <p>GHS {{ $PackagePrice }}</p>
                                </td>
                                <td><h4><small>{{ $cart->Travellers }}</small></h4></td>
                                <td><p class="">GHS {{ $PackagePrice*$cart->Travellers }}.00</td>
                                <td class="product-removal">
                                    <a class ="cart_quantity_delete button" href="{{ url('/cart/delete-tourpackage/'.$cart->id) }}"><i class="fa fa-trash"></i> </a>
                                </td>
                            </tr>

                        </div>
                        <hr>
                      <?php $total_amount = $total_amount + ($PackagePrice*$cart->Travellers);.00?>
                      @endforeach
                      </tbody>
                      </table>
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
                        <p class="heading">Coupon Discount <span class=" pull-right">GHS <?php echo Session::get('CouponAmount'); ?></span></p>
                        <?php
                        $total_amount = $total_amount-Session::get('CouponAmount');
                        $getCurrencyRates = Tourpackages::getCurrencyRates($total_amount); ?>
                        <p class="heading">Grand Total <span class=" pull-right" data-toggle="tooltip" data-html="true" title="USD {{ $getCurrencyRates['USD_Rate'] }}<br>
                            GBP {{ $getCurrencyRates['GBP_Rate'] }}<br>
                            EUR {{ $getCurrencyRates['EUR_Rate'] }}<br>
                            FRF {{ $getCurrencyRates['FRF_Rate'] }}<br>
                            BRL {{ $getCurrencyRates['BRL_Rate'] }}">GHS <?php echo $total_amount; ?>.00</span></p>
                    @else
                        <?php $getCurrencyRates = Tourpackages::getCurrencyRates($total_amount); ?>
                        <p class="heading">Grand Total <span class=" pull-right" data-toggle="tooltip" data-html="true" title="USD {{ $getCurrencyRates['USD_Rate'] }}<br>
                                                GBP {{ $getCurrencyRates['GBP_Rate'] }}<br>
                                                EUR {{ $getCurrencyRates['EUR_Rate'] }}<br>
                                                FRF {{ $getCurrencyRates['FRF_Rate'] }}<br>
                                                BRL {{ $getCurrencyRates['BRL_Rate'] }}">GHS <?php echo $total_amount; ?>.00</span></p>
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
@endsection

