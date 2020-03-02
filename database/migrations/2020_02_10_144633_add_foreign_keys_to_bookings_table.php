<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBookingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bookings', function(Blueprint $table)
		{
			$table->foreign('CartId', 'RefCarts33')->references('CartId')->on('carts')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('CouponId', 'RefCoupons14')->references('CouponId')->on('coupons')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('TourIncludeID', 'RefTourIncludes17')->references('TourIncludeID')->on('tourincludes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('UserId', 'RefUsers6')->references('UserId')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('bookings', function(Blueprint $table)
		{
			$table->dropForeign('RefCarts33');
			$table->dropForeign('RefCoupons14');
			$table->dropForeign('RefTourIncludes17');
			$table->dropForeign('RefUsers6');
		});
	}

}
