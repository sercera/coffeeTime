<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaffeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caffe', function (Blueprint $table) {
            $table->increments('caffe_id');
            $table->string('name',30);
            $table->string('address',100);
            $table->string('city',50);
            $table->string('description',255);
            $table->string('work_hours',20);
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
        Schema::dropIfExists('caffe');
    }
}
