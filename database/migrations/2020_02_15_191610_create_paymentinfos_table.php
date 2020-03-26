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
            $table->bigIncrements('id');
			$table->unsignedBiginteger('UPIUserPaymentDetails_id');
			$table->unsignedBiginteger('UPIUserPaymentMethod');
			$table->unsignedBiginteger('Booking_id')->index('RefBookings38');
			$table->unsignedBiginteger('Tax_id')->nullable()->index('RefPaymentTaxation42');
			$table->unsignedBiginteger('PTy_id')->index('RefPaymentType63');
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
