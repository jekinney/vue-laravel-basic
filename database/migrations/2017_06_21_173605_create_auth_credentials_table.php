<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthCredentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_credentials', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('auth_type_id')->unsigned()->index();
            $table->integer('customer_id')->unsigned()->index();
            $table->string('secret')->nullable();
            $table->string('public')->nullable();
            $table->string('domain')->nullable();
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
        Schema::dropIfExists('auth_credentials');
    }
}
