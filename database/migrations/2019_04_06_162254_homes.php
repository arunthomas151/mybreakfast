<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Homes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->bigIncrements('rmid');
            $table->integer('rid');
            $table->string('rname');
            $table->string('rcontact');
            $table->integer('did');
            $table->integer('pid');
            $table->string('lmark');
            $table->string('himage');
            $table->integer('rmstatus');
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
