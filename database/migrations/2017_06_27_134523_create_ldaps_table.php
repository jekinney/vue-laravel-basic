<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLdapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ldaps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned()->index();
            $table->string('customer_uid', 64);
            $table->string('prefix')->default('');
            $table->string('suffex')->default('');
            $table->string('controllers')->nullable();
            $table->integer('port')->default(389);
            $table->integer('timeout')->default(5);
            $table->string('base_dn')->default('dc=corp,dc=acme,dc=org');
            $table->string('admin_suffix')->default('');
            $table->string('admin_username')->nullable('username');
            $table->string('admin_password')->nullable('password');
            $table->boolean('follow_referrals')->default(false);
            $table->boolean('ssl')->default(false);
            $table->boolean('tls')->default(false);
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
        Schema::dropIfExists('ldaps');
    }
}
