<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateToursitesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('toursites', function(Blueprint $table)
		{
			$table->bigIncrements('TourSitesID');
			$table->string('TourSiteName', 150);
			$table->string('TourSiteDesc', 18)->nullable();
			$table->unsignedBiginteger('LocationID')->index('RefTourLocation18');
			$table->unsignedBiginteger('PackageId')->nullable()->index('RefTourPackages37');
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
		Schema::drop('toursites');
	}

}
