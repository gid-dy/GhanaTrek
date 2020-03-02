<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRefundpenaltiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('refundpenalties', function(Blueprint $table)
		{
			$table->bigIncrements('RefundPenaltyID');
			$table->string('PenaltyName', 50);
			$table->string('PenaltyCode', 20)->unique('PenaltyCode');
			$table->string('PenaltyDesc', 150)->nullable();
			$table->decimal('PenaltyAmount', 20, 2);
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
		Schema::drop('refundpenalties');
	}

}
