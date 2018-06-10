<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('username',100);
            $table->string('email',255);
            $table->string('password',255);
            $table->rememberToken();
            $table->integer('fk_for_caffe')->nullable()->unsigned();

            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {

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
        Schema::dropIfExists('users');
    }
}
