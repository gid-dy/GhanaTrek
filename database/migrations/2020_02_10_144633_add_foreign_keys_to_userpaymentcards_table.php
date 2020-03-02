<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserpaymentcardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('userpaymentcards', function(Blueprint $table)
		{
			$table->foreign('UserId', 'RefUsers56')->references('UserId')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('userpaymentcards', function(Blueprint $table)
		{
			$table->dropForeign('RefUsers56');
		});
	}

}
