<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTourpackageincludesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tourpackageincludes', function(Blueprint $table)
		{
			$table->foreign('TourIncludeID', 'RefTourIncludes28')->references('TourIncludeID')->on('tourincludes')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('PackageId', 'RefTourPackages29')->references('PackageId')->on('tourpackages')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tourpackageincludes', function(Blueprint $table)
		{
			$table->dropForeign('RefTourIncludes28');
			$table->dropForeign('RefTourPackages29');
		});
	}

}
