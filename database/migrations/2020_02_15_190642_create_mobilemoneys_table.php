<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilemoneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobilemoneys', function (Blueprint $table) {
            $table->bigIncrements('MobileMoneyID');
			$table->string('Currency', 150);
			$table->string('ExternalID', 25)->nullable();
			$table->unsignedBiginteger('UserId')->index('RefUsers55');
			$table->string('AccNumber', 15);
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
        Schema::dropIfExists('mobilemoneys');
    }
}
