<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRefundpayingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('refundpayings', function(Blueprint $table)
		{
			$table->foreign('PayingInfo_id', 'RefPayingInfo64')->references('id')->on('payinginfos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('RefundInfo_id', 'RefRefundInfo65')->references('id')->on('refundinfos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('refundpayings', function(Blueprint $table)
		{
			$table->dropForeign('RefPayingInfo64');
			$table->dropForeign('RefRefundInfo65');
		});
	}

}
