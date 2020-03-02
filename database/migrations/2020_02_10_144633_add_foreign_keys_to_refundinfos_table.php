<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRefundinfosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('refundinfos', function(Blueprint $table)
		{
			$table->foreign('BookingId', 'RefBookings24')->references('BookingId')->on('bookings')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('PaymentDeliveryCostID', 'RefPaymentDeliveryCost62')->references('PaymentDeliveryCostID')->on('paymentdeliverycosts')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('RefundPenaltyID', 'RefRefundPenalty25')->references('RefundPenaltyID')->on('refundpenalties')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('RefundCreated', 'RefundCreated')->references('UserId')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('RefundModifed', 'RefundModified')->references('UserId')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('refundinfos', function(Blueprint $table)
		{
			$table->dropForeign('RefBookings24');
			$table->dropForeign('RefPaymentDeliveryCost62');
			$table->dropForeign('RefRefundPenalty25');
			$table->dropForeign('RefundCreated');
			$table->dropForeign('RefundModified');
		});
	}

}
