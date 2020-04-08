<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    .invoice main {
        padding-bottom: 50px
    }

    .thanks {
        font-size: 2em;
        margin-bottom: 50px;
    }

    .notices {
        padding-left: 6px;
        border-left: 6px solid #3989c6;
    }

    .notices .notice {
        font-size: 1.2em;
    }
    footer {
        width: 100%;
        text-align: center;
        color: #777;
        border-top: 1px solid #aaa;
        padding: 8px 0;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-5">
                        <div class="col-md-6">
                            <h4>GHANA<span style="color: #fafd44;">TREK</span></h4>
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="pull-right font-weight-bold mb-1">Booking #{{ $bookingDetails->id }}</p>
                            <span style="float:right"><?php echo DNS1D::getBarcodeHTML($bookingDetails->id, "C39"); ?></span>
                        </div>
                    </div>

                    <hr>

                    <div class="row pb-5 p-5">
                        <div class="col-md-6">
                            <p class="font-weight-bold mb-4">Billing Details</p>
                            {{ $userDetails->SurName}} {{ $userDetails->OtherNames}}</br>
                                {{ $userDetails->Country}}</br>
                                {{ $userDetails->Address}}</br>
                                {{ $userDetails->City}}</br>
                                {{ $userDetails->State}}</br>
                                {{ $userDetails->ZipCode}}</br>
                                {{ $userDetails->Mobile}}</br>
                                {{ $userDetails->OtherContact }}
                        </div>


                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-4">Travelling Details</p>
                                {{ $bookingDetails->SurName}} {{ $bookingDetails->OtherNames}}</br>
                                {{ $bookingDetails->Country}}</br>
                                {{ $bookingDetails->Address}}</br>
                                {{ $bookingDetails->City}}</br>
                                {{ $bookingDetails->State}}</br>
                                {{ $bookingDetails->ZipCode}}</br>
                                {{ $bookingDetails->Mobile}}</br>
                                {{ $bookingDetails->OtherContact }}
                        </div>
                    </div>

                    <div class="row pb-5 p-5">
                        <div class="col-md-6">
                            <p class="font-weight-bold mb-4">Payment Method</p>
                            {{ $bookingDetails->Payment_method }}
                        </div>


                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-4">Booking Date</p>
                            {{ $bookingDetails->created_at }}
                        </div>
                    </div>

                    <div class="row pb-5 p-5">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Order summary</strong></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr>
                                                    <td><strong>PackageCode</strong></td>
                                                    <td class="text-center"><strong>PackageName</strong></td>
                                                    <td class="text-center"><strong>TourTypeName</strong></td>
                                                    <td class="text-center"><strong>PackagePrice</strong></td>
                                                    <td class="text-center"><strong>Travellers</strong></td>
                                                    <td class="text-right"><strong>Total</strong></td>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php $Subtotal = 0; ?>
                                                @foreach($bookingDetails->bookings as $pro)
                                                <tr>
                                                    <td class="text-left">{{ $pro->PackageCode }}<?php echo DNS1D::getBarcodeHTML($bookingDetails->id, "C39"); ?></td>
                                                    <td class="text-center">{{ $pro->PackageName }}</td>
                                                    <td class="text-center">{{ $pro->TourTypeName }}</td>
                                                    <td class="text-center">GHS {{ $pro->PackagePrice }}</td>
                                                    <td class="text-center">{{ $pro->Travellers }}</td>
                                                    <td class="text-right">GHS {{ $pro->PackagePrice * $pro->Travellers }}</td>
                                                </tr>
                                                <?php $Subtotal = $Subtotal + ($pro->PackagePrice * $pro->Travellers); ?>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Grand Total</div>
                            <div class="h2 font-weight-light">GHS {{ $bookingDetails->Grand_total }}</div>
                        </div>

                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Coupon Discount (-)</div>
                            <div class="h2 font-weight-light">GHS {{ $bookingDetails->Amount }}</div>
                        </div>

                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Sub - Total amount</div>
                            <div class="h2 font-weight-light">GHS {{ $Subtotal }}</div>
                        </div>
                    </div>
                </div>
                <div class="thanks">Thank you!</div>
                    <div class="notices">
                        <div>NOTICE:</div>
                    <div class="notice">System Generated Invoice.</div>
                    <footer>
                        Invoice was generated on a computer and is valid without the signature and seal.
                    </footer>
                </div>
            </div>
        </div>
    </div>

</div>


