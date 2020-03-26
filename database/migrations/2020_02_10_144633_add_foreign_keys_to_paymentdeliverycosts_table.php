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
			$table->foreign('PaymentProvider_id', 'RefPaymentProvider41')->references('id')->on('paymentproviders')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
