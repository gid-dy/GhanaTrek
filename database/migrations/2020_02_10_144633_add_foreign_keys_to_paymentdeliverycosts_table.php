<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPaymentdeliverycostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('paymentdeliverycosts', function(Blueprint $table)
		{
			$table->foreign('PaymentProviderID', 'RefPaymentProvider41')->references('PaymentProviderID')->on('paymentproviders')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('paymentdeliverycosts', function(Blueprint $table)
		{
			$table->dropForeign('RefPaymentProvider41');
		});
	}

}
