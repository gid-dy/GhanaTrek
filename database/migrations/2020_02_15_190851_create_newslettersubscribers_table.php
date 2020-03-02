<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewslettersubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newslettersubscribers', function (Blueprint $table) {
            $table->bigIncrements('SubscribersId');
			$table->string('Email', 30);
			$table->string('Status', 25)->nullable();
			$table->dateTime('SubscriberDateTimeCreated')->nullable();
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
        Schema::dropIfExists('newslettersubscribers');
    }
}
