<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',50);
            $table->string('content',255);
            $table->integer('fk_for_caffe')->unsigned();
            $table->timestamps();
        });

        Schema::table('posts',function (Blueprint $table){
            $table->foreign('fk_for_caffe')->references('caffe_id')->on('caffe')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
