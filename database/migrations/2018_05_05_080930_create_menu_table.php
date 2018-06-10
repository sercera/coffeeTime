<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('menu_id');

            $table->integer('fk_for_caffe')->unsigned();
            $table->string('name',100);
            $table->timestamps();
        });

        Schema::table('menu',function (Blueprint $table){

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
        Schema::dropIfExists('menu');
    }
}
