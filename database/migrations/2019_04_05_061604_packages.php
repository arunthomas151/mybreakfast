<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Packages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('pkid');
            $table->integer('rid');
            $table->string('pkname');
            $table->string('pkinfo');
            $table->integer('nrid');
            $table->integer('bid');
            $table->integer('vid');
            $table->string('pstime');
            $table->string('petime');
            $table->string('pkimage');
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
