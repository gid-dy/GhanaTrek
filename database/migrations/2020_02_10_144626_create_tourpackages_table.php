<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTourpackagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tourpackages', function(Blueprint $table)
		{
			$table->bigIncrements('PackageId');
			$table->string('PackageName', 150);
			$table->string('PackageCode', 20)->unique('PackageCode');
			$table->string('Description', 18)->nullable();
			$table->decimal('PackagePrice', 20, 2);
			$table->string('Imageaddress', 4000)->nullable();
			$table->boolean('Status')->nullable();
			$table->unsignedBiginteger('categoryId')->nullable()->index('RefTourPackageCategories4');
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
		Schema::drop('tourpackages');
	}

}
