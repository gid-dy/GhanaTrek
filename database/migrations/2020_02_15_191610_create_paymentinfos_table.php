<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentinfos', function (Blueprint $table) {
            $table->bigIncrements('PaymentInfoID');
			$table->unsignedBiginteger('UPIUserPaymentDetailsID');
			$table->unsignedBiginteger('UPIUserPaymentMethod');
			$table->unsignedBiginteger('BookingId')->index('RefBookings38');
			$table->unsignedBiginteger('TaxID')->nullable()->index('RefPaymentTaxation42');
			$table->unsignedBiginteger('PTyID')->index('RefPaymentType63');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paymentinfos');
    }
}
