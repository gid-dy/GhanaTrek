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
            $table->bigIncrements('PTyID');
			$table->string('PTyPaymentTypeName', 50)->nullable();
			$table->string('PTyPaymentTypeDesc', 18)->nullable();
			$table->unsignedBiginteger('PaymentProviderID')->index('RefPaymentProvider61');
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
