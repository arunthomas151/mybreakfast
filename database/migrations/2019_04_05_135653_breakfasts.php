<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Breakfasts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breakfasts', function (Blueprint $table) {
            $table->bigIncrements('bid');
            $table->integer('rid');
            $table->string('bfid');
            $table->string('description');
            $table->string('bimage');
            $table->integer('reid');
            $table->integer('bstatus');
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
