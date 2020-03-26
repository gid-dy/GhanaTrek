<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPaymentinfosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('paymentinfos', function(Blueprint $table)
		{
			$table->foreign('Booking_id', 'RefBookings38')->references('id')->on('bookings')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('Tax_id', 'RefPaymentTaxation42')->references('id')->on('paymenttaxations')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('PTy_id', 'RefPaymentType63')->references('id')->on('paymenttypes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('paymentinfos', function(Blueprint $table)
		{
			$table->dropForeign('RefBookings38');
			$table->dropForeign('RefPaymentTaxation42');
			$table->dropForeign('RefPaymentType63');
		});
	}

}
