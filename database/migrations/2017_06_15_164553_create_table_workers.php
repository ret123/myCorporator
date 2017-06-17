<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWorkers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('workers', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ticket_id')->unsigned()->nullable();
          $table->integer('corporator_id')->unsigned()->nullable();
          $table->string('name');
          $table->string('status');
          $table->string('reply');
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
        Schema::dropIfExists('workers');
    }
}
