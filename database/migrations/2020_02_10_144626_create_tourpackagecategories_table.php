<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTourpackagecategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tourpackagecategories', function(Blueprint $table)
		{
			$table->bigIncrements('categoryId');
			$table->string('CategoryName');
			$table->string('CategoryDescription', 18)->nullable();
			$table->boolean('CategoryStatus')->nullable();
			$table->string('Imageaddress', 4000)->nullable();
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
		Schema::drop('tourpackagecategories');
	}

}
