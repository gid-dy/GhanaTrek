<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefundinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refundinfos', function (Blueprint $table) {
            $table->bigIncrements('RefundInfoID');
			$table->dateTime('RefundDateTime');
			$table->dateTime('RefundLastModifiedDateTime')->nullable();
			$table->decimal('RefundAmount', 20, 4)->nullable();
			$table->unsignedBiginteger('BookingId')->index('RefBookings24');
			$table->unsignedBiginteger('RefundPenaltyID')->nullable()->index('RefRefundPenalty25');
			$table->unsignedBiginteger('RefundCreated')->index('RefundCreated');
			$table->unsignedBiginteger('RefundModifed')->nullable()->index('RefundModified');
			$table->unsignedBiginteger('PaymentDeliveryCostID')->index('RefPaymentDeliveryCost62');
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
        Schema::dropIfExists('refundinfos');
    }
}
