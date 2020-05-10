@extends('layouts.frontLayout.userdesign')
    @section('content')


    <section>
        <div class="container">
            <div class="row" style="margin-top: 30px;">
                <div class="jumbotron text-center">
                    <h3>YOUR IPAY BOOKING HAS BEEN PLACED</h3>
                    <p>Thanks for the payment. We will process your booking very soon</p>
                    <p class="lead">Your booking number is <strong>{{ Session::get('Booking_id') }}</strong> and total amount paid is <strong>GHS {{ Session::get('Grand_total') }}</strong></p>
                    <hr>


            </div>
        </div>
    </section>

@endsection
<?php
Session::forget('Grand_total');
Session::forget('Booking_id');
?>
