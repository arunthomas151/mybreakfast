<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pbookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pbookings', function (Blueprint $table) {
            $table->bigIncrements('pbid');
            $table->integer('rid');
            $table->integer('pkid');
            $table->string('pbdate');
            $table->integer('pnop');    
            $table->integer('pbstatus');
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
