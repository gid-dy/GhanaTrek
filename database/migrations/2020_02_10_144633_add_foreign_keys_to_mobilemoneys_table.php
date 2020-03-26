<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMobilemoneysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('mobilemoneys', function(Blueprint $table)
		{
			$table->foreign('User_id', 'RefUsers55')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('mobilemoneys', function(Blueprint $table)
		{
			$table->dropForeign('RefUsers55');
		});
	}

}
