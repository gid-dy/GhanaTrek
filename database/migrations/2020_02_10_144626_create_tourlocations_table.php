<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTourlocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tourlocations', function(Blueprint $table)
		{
			$table->bigIncrements('LocationID');
			$table->string('LocationName', 150);
			$table->string('Longitude', 25)->nullable();
			$table->string('Latitude', 25)->nullable();
			$table->string('Weather', 50)->nullable();
			$table->string('GhanaPostAddress', 25)->nullable();
			$table->string('OtherAddress', 150)->nullable();
			$table->unsignedBiginteger('PackageId')->index('RefTourPackages11');
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
		Schema::drop('tourlocations');
	}

}
