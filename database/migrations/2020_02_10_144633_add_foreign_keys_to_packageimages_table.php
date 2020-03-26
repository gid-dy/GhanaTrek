<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPackageimagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('packageimages', function(Blueprint $table)
		{
			$table->foreign('Package_id', 'RefTourPackages3')->references('id')->on('tourpackages')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('packageimages', function(Blueprint $table)
		{
			$table->dropForeign('RefTourPackages3');
		});
	}

}
