<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefundpayingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refundpayings', function (Blueprint $table) {
            $table->bigIncrements('RefundPayingID');
			$table->unsignedBiginteger('PayingInfoID')->index('RefPayingInfo64');
			$table->unsignedBiginteger('RefundInfoID')->index('RefRefundInfo65');
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
        Schema::dropIfExists('refundpayings');
    }
}
