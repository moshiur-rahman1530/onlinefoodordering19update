<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name')->nullable;
            $table->string('username');
            $table->string('email')->unique();
            $table->string('phone_no');
            $table->string('password');
            $table->string('permanent_address');
            $table->integer('division_id')->comment('division table id');
            // $table->unsignedInteger('division_id')->comment('division table id');
            //$table->unsignedInteger('district_id')->comment('district table id');
            $table->unsignedTinyInteger('status')->default()->comment('0=Inactive|1=active|2=Ban');
            $table->string('ip_address')->nullable();
            $table->string('avatar')->nullable();
            $table->text('shipping_address')->nullable();
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
    // public function up()
    // {
    //     Schema::create('users', function (Blueprint $table) {
    //         $table->increments('id');
    //         $table->string('name');
    //         $table->string('email')->unique();
    //         $table->string('password');
    //         $table->rememberToken();
    //         $table->timestamps();
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  *
    //  * @return void
    //  */
    // public function down()
    // {
    //     Schema::dropIfExists('users');
    // }
}
