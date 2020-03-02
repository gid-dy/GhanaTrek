<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTourpackagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tourpackages', function(Blueprint $table)
		{
			$table->foreign('CouponId', 'RefCoupons66')->references('CouponId')->on('coupons')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('LocationID', 'RefTourLocation11')->references('LocationID')->on('tourlocations')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('categoryId', 'RefTourPackageCategories4')->references('categoryId')->on('tourpackagecategories')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('TourTransportationID', 'RefTourTransportation12')->references('TourTransportationID')->on('tourtransportations')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('TourTypeID', 'RefTourType10')->references('TourTypeID')->on('tourtypes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tourpackages', function(Blueprint $table)
		{
			$table->dropForeign('RefCoupons66');
			$table->dropForeign('RefTourLocation11');
			$table->dropForeign('RefTourPackageCategories4');
			$table->dropForeign('RefTourTransportation12');
			$table->dropForeign('RefTourType10');
		});
	}

}
