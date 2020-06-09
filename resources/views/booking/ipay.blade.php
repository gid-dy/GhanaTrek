@extends('layouts.frontLayout.userdesign')
    @section('content')
    <?php use App\Booking; ?>


    <section>
        <style type="text/css">
            .fonts{
                            font-size: 12.5px;
                        }
            .ipay-btn{
                                    background-color: #04448C;
                                    border-color: #04448C;
                                    border-radius: 17px !important;
                                }
                                .button{
                                    margin-left:100px;
                                }
            .modal{
                            width: 100% !important;
                        }
            .modal-header{
                                        padding-left:48px !important;
                                        padding-right: 48px !important;
                                        border-bottom: none !important;
                                        text-align: center !important;
                                        }
            .modal-footer{
                                        height: 120px;
                                        padding-left:48px !important;
                                        padding-right: 48px !important;
                                        margin-bottom: -17px !important;
                                        border-top: none !important;
                                        }
            .modal-body{
                                    width:100% !important;
                                    margin-bottom: -25px;
                                    padding-right: 48px !important;
                                    padding-left: 48px !important;
                                    border-bottom: none !important;
                                    margin-top: -27px;
                                    }
            #close:hover{
                                        text-decoration: none !important;
                                    }
            .logo{
                        width: 65px;height: 65px;
                        }
            .ipay{
                width:100% !important;
            }
        </style>
        <div class="container">
            <div class="row" style="margin-top: 30px;">
                <div class="jumbotron text-center">
                    <h3>YOUR BOOKING HAS BEEN PLACED</h3>
                    <p class="lead">Your booking number is <strong>{{ Session::get('Booking_id') }}</strong> and total payable about is <strong>GHS {{ Session::get('Grand_total') }}</strong></p>
                    <p>Please make payment by clicking on below Payment Button</p>

                        <div class="row">
                                <div class="col-lg-6 col-md-6 col-xs-6 col-sm-8">
                                <div class="input-group-prepend" style="text-align: center">
                                    <button type="button" class="btn btn-primary ipay-btn" data-toggle="modal" data-target="#ipayModal">Make Payment</button>
                                </div>
                            </div>
                        </div>
                        <div id="ipayModal" class="modal fade m-auto" role="dialog" data-keyboard="true" data-backdrop="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 style="text-align: center; font-weight:400;">GHANA<span style="color: #fafd44;">TREK</span></h4>
                                    </div>
                                    <?php $bookingDetails = Booking::getBookingDetails(Session::get('Booking_id'));
                                    $bookingDetails =json_decode(json_encode($bookingDetails));
                                    ?>
                                    <form action="https://manage.ipaygh.com/gateway/checkout" id="ipay_checkout" method="post" name="ipay_checkout" target="_blank">
                                        <div class="modal-body">
                                            <legend class="text-center mt-1">Make Payment</legend>
                                            <input name="merchant_key" type="hidden" value="9e315bdc-8efa-11ea-b8b9-f23c9170642f">
                                            <input id="merchant_code" type="hidden" value="MER04816">
                                            <input name="source" type="hidden" value="WIDGET">
                                            <input name="success_url" type="hidden" value="{{ url('ipay/thanks') }}">
                                            <input name="cancelled_url" type="hidden" value="{{ url('ipay/cancel') }}">
                                            <input type="hidden" name="invoice_id" value="{{ Session::get('Booking_id') }}">
                                            <input type="hidden" name="extra_email"  value="{{ Session::get('UserEmail') }}">
                                            <input type="hidden" name="total"  value="{{ Session::get('Grand_total') }}">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="checkout-form-list">
                                                        <input type="text" title="Name" name="extra_name" id="name" class="form-control" placeholder="First & Last Name" value="{{  $bookingDetails->SurName }} {{  $bookingDetails->OtherNames }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="checkout-form-list">
                                                        <input type="tel" title="Mobile Number" name="extra_mobile" id="number" class="form-control" maxlength="10" placeholder="Contact Number" value="{{  $bookingDetails->Mobile }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="checkout-form-list">
                                                        <input type="email" name="email" id="extra_email" class="form-control" placeholder="Email" value="{{  $bookingDetails->UserEmail }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="checkout-form-list">
                                                        <input type="text" name="total" class="form-control" id="total" placeholder="Amount(GH₵)" value="{{  $bookingDetails->Grand_total }}.00" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="checkout-form-list">
                                                        <input class="form-control" type="text" name="description" id="description" placeholder="Description of Payment" value="Payment of tour site." readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg">
                                                    <button type="submit" class="btn btn-primary ipay-btn btn-block" style="padding: 8px 11px;"><strong>Pay</strong></button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg text-center mt-2">
                                                    <a href="" data-dismiss="modal" id="close">Cancel</a>
                                                </div>
                                            </div>

                                            <div class="modal-footer justify-content-center ">
                                                <div class="row">
                                                    <div class="col-lg">
                                                        <img src="https://payments.ipaygh.com/app/webroot/img/iPay_payments.png" style="width: 100%;" class="img-fluid mr-auto" alt="Powered by iPay">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
                    <script type="text/javascript">
                        (
                            function(){
                                Date.prototype.today = function () {
                                    return  this.getFullYear()+(((this.getMonth()+1) < 10)?"0":"") + (this.getMonth()+1) +((this.getDate() < 10)?"0":"") + this.getDate();
                                };
                                Date.prototype.timeNow = function () {
                                    return ((this.getHours() < 10)?"0":"") + this.getHours() +((this.getMinutes() < 10)?"0":"") + this.getMinutes() +((this.getSeconds() < 10)?"0":"") + this.getSeconds();
                                };
                                document.getElementById("invoice_id").value = document.getElementById("merchant_code").value+ new Date().today() + new Date().timeNow();
                                }
                        )();
                    </script>
                    <hr>


            </div>
        </div>
    </div>
    </section>

@endsection
<?php
Session::forget('Grand_total');
Session::forget('Booking_id');
?>
