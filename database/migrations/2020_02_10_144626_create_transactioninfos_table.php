<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransactioninfosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactioninfos', function(Blueprint $table)
		{
			$table->bigIncrements('TransactionID');
			$table->string('TransactionCode', 20)->unique('TransactionCode');
			$table->dateTime('TransactionDateTimeMade')->nullable();
			$table->string('TransactionStatus', 25)->nullable();
			$table->unsignedBiginteger('PayingInfoID')->index('RefPayingInfo49');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('transactioninfos');
	}

}
