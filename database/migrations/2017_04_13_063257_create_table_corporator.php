<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCorporator extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporator', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('duration');
            $table->string('address');
            $table->string('party');
            $table->integer('ward_id')->unsigned();
            $table->integer('area_id')->unsigned();
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
        Schema::dropIfExists('corporator');
    }
}
