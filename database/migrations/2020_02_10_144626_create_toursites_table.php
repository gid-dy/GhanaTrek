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
			$table->bigIncrements('id');
			$table->string('TourSiteName', 150);
			$table->string('TourSiteDesc', 200)->nullable();
			$table->unsignedBiginteger('Location_id')->index('RefTourLocation18');
			$table->unsignedBiginteger('Package_id')->nullable()->index('RefTourPackages37');
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
