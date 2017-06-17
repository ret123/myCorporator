<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnPhoneToWorkers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('workers', function(Blueprint $table){
        $table->bigInteger('phone')->unsigned()->nullable()->after('name');
        $table->string('priority')->nullable()->after('phone');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('workers', function(Blueprint $table){
        $table->dropColumn('phone');
        $table->dropColumn('priority');

      });
    }
}
