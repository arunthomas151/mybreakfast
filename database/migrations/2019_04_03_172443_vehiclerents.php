<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vehiclerents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiclerents', function (Blueprint $table) {
            $table->bigIncrements('vrid');
            $table->integer('vid');
            $table->string('rkm');
            $table->string('wtime');
            $table->integer('reid');
            $table->integer('vrstatus');
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
