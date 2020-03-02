<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPaymenttypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('paymenttypes', function(Blueprint $table)
		{
			$table->foreign('PaymentProviderID', 'RefPaymentProvider61')->references('PaymentProviderID')->on('paymentproviders')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('paymenttypes', function(Blueprint $table)
		{
			$table->dropForeign('RefPaymentProvider61');
		});
	}

}
