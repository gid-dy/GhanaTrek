<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('UserId');
            $table->string('UserEmail', 100)->unique('UserEmail');
			$table->string('OtherNames', 150);
			$table->string('SurName', 50);
			$table->string('Address', 18);
			$table->string('City', 25);
			$table->string('State', 25)->nullable();
			$table->string('Mobile', 15);
			$table->string('OtherPhoneContact', 15)->nullable();
			$table->string('Password');
			$table->boolean('UserDelete?', 1);
			$table->bigInteger('CountryId')->unsigned();
			$table->bigInteger('UserRoleID')->unsigned();
			$table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
