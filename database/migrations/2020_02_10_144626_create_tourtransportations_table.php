<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTourtransportationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tourtransportations', function(Blueprint $table)
		{
			$table->bigIncrements('TourTransportationID');
			$table->string('TransportName', 50)->nullable();
			$table->string('TransportDesc', 18)->nullable();
			$table->decimal('TransportCost', 20, 2)->nullable();
			$table->unsignedBiginteger('PackageId')->index('RefTourPackages20');
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
		Schema::drop('tourtransportations');
	}

}
