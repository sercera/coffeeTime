<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->increments('detail_id');
            $table->integer('pid');
            $table->string('first_name',20);
            $table->string('last_name',30);
            $table->string('address',100);
            $table->string('phone_number',50);
            $table->string('gender',1);
            $table->integer('age');
            $table->integer('employee_number')->nullable();
            $table->integer('fk_for_user')->nullable()->unsigned();
            $table->integer('fk_for_employee')->nullable()->unsigned();
            $table->timestamps();
        });
        Schema::table('user_details',function (Blueprint $table){

            $table->foreign('fk_for_user')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('fk_for_employee')->references('user_id')->on('users')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
