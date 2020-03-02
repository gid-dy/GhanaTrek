<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCartsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('carts', function(Blueprint $table)
		{
			$table->foreign('TourPackageIncludeID', 'RefTourPackageInclude32')->references('TourPackageIncludeID')->on('tourpackageincludes')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('PackageId', 'RefTourPackages5')->references('PackageId')->on('tourpackages')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('UserId', 'RefUsers1')->references('UserId')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('carts', function(Blueprint $table)
		{
			$table->dropForeign('RefTourPackageInclude32');
			$table->dropForeign('RefTourPackages5');
			$table->dropForeign('RefUsers1');
		});
	}

}
