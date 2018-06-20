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
            $table->mediumText('description',255);
            $table->string('short_description', 50);
            $table->string('work_hour_from', 10);
            $table->string('work_hour_to', 10);
            $table->string('image', 100);
            $table->string('www', 150);
            $table->string('call_number', 50);
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
