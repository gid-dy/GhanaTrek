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
			$table->foreign('TourInclude_id', 'RefTourIncludes28')->references('id')->on('tourincludes')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('Package_id', 'RefTourPackages29')->references('id')->on('tourpackages')->onUpdate('CASCADE')->onDelete('CASCADE');
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
