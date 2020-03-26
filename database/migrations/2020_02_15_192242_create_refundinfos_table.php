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
            $table->bigIncrements('id');
			$table->decimal('RefundAmount', 20, 2)->nullable();
			$table->unsignedBiginteger('Booking_id')->index('RefBookings24');
			$table->unsignedBiginteger('RefundPenalty_id')->nullable()->index('RefRefundPenalty25');
			$table->unsignedBiginteger('RefundCreated')->index('RefundCreated');
			$table->unsignedBiginteger('RefundModifed')->nullable()->index('RefundModified');
			$table->unsignedBiginteger('PaymentDeliveryCost_id')->index('RefPaymentDeliveryCost62');
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
