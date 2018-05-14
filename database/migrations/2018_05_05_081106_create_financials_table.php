<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financials', function (Blueprint $table) {
            $table->increments('financial_id');
            $table->date('date');
            $table->integer('neto_value');
            $table->integer('bruto_value');
            $table->integer('pdv');
            $table->integer('fk_for_caffe')->unsigned();
            $table->timestamps();
        });
        Schema::table('financials',function (Blueprint $table){

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
        Schema::dropIfExists('financials');
    }
}
