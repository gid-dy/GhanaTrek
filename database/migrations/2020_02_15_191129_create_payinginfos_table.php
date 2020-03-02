<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayinginfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payinginfos', function (Blueprint $table) {
            $table->bigIncrements('PayingInfoID');
			$table->string('PaymentToken', 150)->nullable();
			$table->string('PayemntOrderCode', 150)->nullable();
			$table->binary('PaymentQRCode', 4000)->nullable();
			$table->string('TransactionCode', 150)->nullable();
			$table->dateTime('PayingDateTimeMade')->nullable();
			$table->decimal('TotalCost', 20, 2)->nullable();
			$table->string('PaymentStatus', 25)->nullable();
			$table->unsignedBiginteger('PaymentInfoID')->index('RefPaymentInfo44');
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
        Schema::dropIfExists('payinginfos');
    }
}
