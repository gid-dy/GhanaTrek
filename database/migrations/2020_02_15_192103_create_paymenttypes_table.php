<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymenttypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymenttypes', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('PTyPaymentTypeName', 150)->nullable();
			$table->unsignedBiginteger('PaymentProvider_id')->index('RefPaymentProvider61');
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
        Schema::dropIfExists('paymenttypes');
    }
}
