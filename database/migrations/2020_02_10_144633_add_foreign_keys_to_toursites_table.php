<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToToursitesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('toursites', function(Blueprint $table)
		{
			$table->foreign('Location_id', 'RefTourLocation18')->references('id')->on('tourlocations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('Package_id', 'RefTourPackages37')->references('id')->on('tourpackages')->onUpdate('CASCADE')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('toursites', function(Blueprint $table)
		{
			$table->dropForeign('RefTourLocation18');
			$table->dropForeign('RefTourPackages37');
		});
	}

}
