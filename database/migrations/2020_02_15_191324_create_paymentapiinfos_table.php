<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentapiinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentapiinfos', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('APIVersion', 50)->nullable();
			$table->string('APIName', 150)->nullable();
			$table->string('IntegrationMode', 150)->nullable();
			$table->string('MerchantEMail', 100)->nullable();
			$table->string('MerchantAPIKey', 18)->nullable();
			$table->string('APIServiceType', 50)->nullable();
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
        Schema::dropIfExists('paymentapiinfos');
    }
}
