<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_article', function (Blueprint $table) {
            $table->integer('neto_price');
            $table->integer('selling_price');
            $table->integer('quantity');

            $table->integer('menu_id')->unsigned();
            $table->integer('article_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('menu_article',function (Blueprint $table){

            $table->foreign('menu_id')->references('menu_id')->on('menu')->onDelete('cascade');
            $table->foreign('article_id')->references('article_id')->on('articles')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_article');
    }
}
