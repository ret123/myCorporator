<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnSubscriptionToCorporatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('corporators', function(Blueprint $table){
        $table->integer('subscribe')->unsigned()->default(0)->after('user_id');
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
        $table->dropColumn('subscribe');
      });
    }
}
