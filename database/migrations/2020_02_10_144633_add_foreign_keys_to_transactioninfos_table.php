<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTransactioninfosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('transactioninfos', function(Blueprint $table)
		{
			$table->foreign('PayingInfoID', 'RefPayingInfo49')->references('PayingInfoID')->on('payinginfos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('transactioninfos', function(Blueprint $table)
		{
			$table->dropForeign('RefPayingInfo49');
		});
	}

}
