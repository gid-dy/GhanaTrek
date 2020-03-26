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
			$table->foreign('Booking_Id', 'RefBookings24')->references('id')->on('bookings')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('PaymentDeliveryCost_id', 'RefPaymentDeliveryCost62')->references('id')->on('paymentdeliverycosts')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('RefundPenalty_id', 'RefRefundPenalty25')->references('id')->on('refundpenalties')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('RefundCreated', 'RefundCreated')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('RefundModifed', 'RefundModified')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
