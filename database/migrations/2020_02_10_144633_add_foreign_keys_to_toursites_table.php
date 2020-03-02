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
			$table->foreign('LocationID', 'RefTourLocation18')->references('LocationID')->on('tourlocations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('PackageId', 'RefTourPackages37')->references('PackageId')->on('tourpackages')->onUpdate('CASCADE')->onDelete('SET NULL');
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
