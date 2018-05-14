<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->increments('table_id');
            $table->integer('table_number');
            $table->integer('table_spots');
            $table->boolean('is_taken')->default(false);
            $table->boolean('is_reserved')->default(false);
            $table->integer('fk_for_caffe')->unsigned();

            $table->timestamps();
        });

        Schema::table('tables',function (Blueprint $table){

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
        Schema::dropIfExists('tables');
    }
}
