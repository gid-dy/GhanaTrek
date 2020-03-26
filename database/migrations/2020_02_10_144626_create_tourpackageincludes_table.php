<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTourpackageincludesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tourpackageincludes', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->unsignedBiginteger('TourInclude_id')->index('RefTourIncludes28');
			$table->unsignedBiginteger('Package_id')->index('RefTourPackages29');
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
		Schema::drop('tourpackageincludes');
	}

}
