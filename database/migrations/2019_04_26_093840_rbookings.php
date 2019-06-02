<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Rbookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rbookings', function (Blueprint $table) {
            $table->bigIncrements('rbid');
            $table->integer('rid');
            $table->integer('nrid');
            $table->integer('bid');
            $table->string('cidate');
            $table->string('codate');
            $table->integer('nop');   
            $table->integer('amount'); 
            $table->integer('rbstatus');
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
