@extends('layouts.frontLayout.userdesign')
    @section('content')


    <section>
        <div class="container">
            <div class="row" style="margin-top: 30px;">
                <div class="jumbotron text-center">
                    <h3>YOUR BOOKING HAS BEEN PLACED</h3>
                    <p class="lead">Your booking number is <strong>{{ Session::get('Booking_id') }}</strong> and total payable about is <strong>GHS {{ Session::get('Grand_total') }}</strong></p>
                    <p>Please make payment by clicking on below Payment Button</p>
                    <hr>


            </div>
        </div>
    </section>

@endsection
<?php
Session::forget('Grand_total');
Session::forget('Booking_id');
?>
