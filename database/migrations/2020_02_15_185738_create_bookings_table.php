<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('Status', 25)->nullable();
			$table->unsignedBigInteger('User_id');
			$table->unsignedBigInteger('Coupon_id')->nullable();
			$table->unsignedBigInteger('TourInclude_id')->nullable();
			$table->unsignedBigInteger('Cart_id');
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
        Schema::dropIfExists('bookings');
    }
}
