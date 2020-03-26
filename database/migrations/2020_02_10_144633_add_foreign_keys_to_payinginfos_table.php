<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPayinginfosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('payinginfos', function(Blueprint $table)
		{
			$table->foreign('PaymentInfo_id', 'RefPaymentInfo44')->references('id')->on('paymentinfos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('payinginfos', function(Blueprint $table)
		{
			$table->dropForeign('RefPaymentInfo44');
		});
	}

}
