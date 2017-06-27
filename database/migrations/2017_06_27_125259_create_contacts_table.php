<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id')->unsigned();
            $table->string('contact_type');
            $table->integer('deparment_id')->nullable();
            $table->string('uid', 64);
            $table->string('first_name', 60);
            $table->string('last_name', 60);
            $table->string('email', 64);
            $table->string('phone', 30)->nullable();
            $table->string('title', 30)->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
