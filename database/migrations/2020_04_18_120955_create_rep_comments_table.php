<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rep_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rcmt_name')->nullable();
            $table->integer('rcmt_comment_id')->nullable();
            $table->string('rcmt_email')->nullable();
            $table->text('rcmt_content')->nullable();
            $table->integer('rcmt_product_id')->index()->default(0);
            $table->integer('rcmt_admin_id')->index()->default(0);
            $table->integer('rcmt_user_id')->index()->default(0);
            $table->integer('rcmt_like')->default(0);
            $table->integer('rcmt_disk_like')->default(0);
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
        Schema::dropIfExists('rep_comments');
    }
}
