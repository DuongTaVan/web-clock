<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AfterTrademarksCloumnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trademarks', function (Blueprint $table) {
            $table->string('trm_hot')->default(0);
            $table->string('trm_active')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('trademarks', function (Blueprint $table) {
            $table->dropColumn(['trm_hot','trm_active']);
        });
    }
}
