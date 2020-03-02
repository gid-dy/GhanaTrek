<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTourincludesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tourincludes', function(Blueprint $table)
		{
			$table->bigIncrements('TourIncludeID');
			$table->string('IncludeName', 25);
			$table->string('TourIncludeInfo', 30)->nullable();
			$table->string('TourExcludeName', 30)->nullable();
			$table->unsignedBiginteger('PackageId')->index('RefTourPackages4');
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
		Schema::drop('tourincludes');
	}

}
