<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('reservation_id');
//            $table->integer('fk_for_user');
            $table->integer('fk_for_table');
            $table->integer('fk_for_caffe');
            $table->boolean('status');
            $table->timestamps();
        });

        Schema::table('reservations',function (Blueprint $table){

//            $table->foreign('fk_for_user')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('fk_for_table')->references('table_id')->on('tables')->onDelete('cascade');
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
        Schema::dropIfExists('reservations');
    }
}
