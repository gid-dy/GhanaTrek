<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTourlocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tourlocations', function(Blueprint $table)
		{
			$table->foreign('CountryId', 'RefCountries35')->references('CountryId')->on('countries')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tourlocations', function(Blueprint $table)
		{
			$table->dropForeign('RefCountries35');
		});
	}

}
