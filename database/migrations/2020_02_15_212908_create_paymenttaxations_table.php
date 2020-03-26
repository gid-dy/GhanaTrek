<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymenttaxationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymenttaxations', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('TaxName', 25)->unique('TaxName');
			$table->decimal('TaxAmount', 20, 2);
			$table->string('TaxAmountType', 50);
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
        Schema::dropIfExists('paymenttaxations');
    }
}
