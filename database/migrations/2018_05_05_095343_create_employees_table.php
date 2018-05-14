<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {

            $table->increments('employee_id');
            $table->string('username', 100);
            $table->string('email', 255);
            $table->string('password', 255);
            $table->rememberToken();
            $table->integer('fk_for_caffe')->unsigned();
            $table->timestamps();
        });

        Schema::table('employees', function (Blueprint $table) {

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
        Schema::dropIfExists('employees');
    }
}
