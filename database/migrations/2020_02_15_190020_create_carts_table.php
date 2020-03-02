<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('CartId');
			$table->unsignedBiginteger('UserId')->index('RefUsers1');
			$table->unsignedBiginteger('PackageId')->index('RefTourPackages5');
			$table->unsignedBiginteger('TourPackageIncludeID')->nullable()->index('RefTourPackageInclude32');
			$table->dateTime('CartDateTimeCreated');
			$table->dateTime('CartDateTimeModified')->nullable();
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
        Schema::dropIfExists('carts');
    }
}
