<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUserIdToCorporatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('corporators', function(Blueprint $table){
        $table->integer('user_id')->unsigned()->nullable()->after('area_id');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('corporators', function(Blueprint $table){
        $table->dropColumn('user_id');
      });
    }
}
