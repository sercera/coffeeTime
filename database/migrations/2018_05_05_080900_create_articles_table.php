<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('article_id');
            $table->string('name',30);
            $table->string('description',255);
            $table->string('type',200);
            $table->integer('fk_for_caffe')->unsigned();

            $table->timestamps();
        });
        Schema::table('articles', function (Blueprint $table) {

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
        Schema::dropIfExists('articles');
    }
}
