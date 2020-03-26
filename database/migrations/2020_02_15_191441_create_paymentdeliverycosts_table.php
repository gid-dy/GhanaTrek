<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentdeliverycostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentdeliverycosts', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('DeliveryCostName', 50);
			$table->decimal('DeliveryCost', 20, 2);
			$table->unsignedBiginteger('PaymentProvider_id')->index('RefPaymentProvider41');
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
        Schema::dropIfExists('paymentdeliverycosts');
    }
}
