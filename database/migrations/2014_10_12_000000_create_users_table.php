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
            $table->integer('userable_id')->unsigned();
            $table->string('userable_type');
            $table->integer('deparment_id')->nullable();
            $table->string('uid', 64);
            $table->string('first_name', 60);
            $table->string('last_name', 60);
            $table->string('email', 60);
            $table->string('phone', 30)->nullable();
            $table->string('title', 30)->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->softDeletes();
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
