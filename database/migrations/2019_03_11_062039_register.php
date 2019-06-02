<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Register extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->bigIncrements('rid');
            $table->integer('lid');
            $table->string('u_name');
            $table->string('u_email');
            $table->string('u_gender');
            $table->dateTime('dob');
            $table->string('u_mob');
            $table->integer('u_did');
            $table->integer('status');
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
        //
    }
}
