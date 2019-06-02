<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vbookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vbookings', function (Blueprint $table) {
            $table->bigIncrements('vbid');
            $table->integer('rid');
            $table->integer('vid');
            $table->integer('nrid');
            $table->string('vcidate');
            $table->string('vcodate');
            $table->integer('vnop'); 
            $table->integer('vamount');   
            $table->integer('vbstatus');
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
