<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vehicles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('vid');
            $table->integer('rid');
            $table->string('vrno');
            $table->string('voname');
            $table->string('vdname');
            $table->string('vdlicence');
            $table->integer('nofseat');
            $table->string('vcontact');
            $table->string('vimage');
            $table->integer('vmstatus');
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
