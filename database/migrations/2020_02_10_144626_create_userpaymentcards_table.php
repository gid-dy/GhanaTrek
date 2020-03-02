<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserpaymentcardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userpaymentcards', function(Blueprint $table)
		{
			$table->bigIncrements('VMCardID');
			$table->string('NameOnCard', 150);
			$table->string('CardNumber', 50)->nullable();
			$table->date('ExpiryDate')->nullable();
			$table->string('CVV', 25)->nullable();
			$table->unsignedBiginteger('UserId')->index('RefUsers56');
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
		Schema::drop('userpaymentcards');
	}

}
