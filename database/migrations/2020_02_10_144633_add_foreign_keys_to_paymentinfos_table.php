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
			$table->foreign('BookingId', 'RefBookings38')->references('BookingId')->on('bookings')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('TaxID', 'RefPaymentTaxation42')->references('TaxID')->on('paymenttaxations')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('PTyID', 'RefPaymentType63')->references('PTyID')->on('paymenttypes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
