<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTablesUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ord_tbl_usr', function (Blueprint $table) {
            $table->integer('quantity');
            $table->dateTime('date');

            $table->integer('menu_id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->integer('article_id')->unsigned();
            $table->integer('user_id')->nullable()->unsigned();
            $table->integer('employee_id')->nullable()->unsigned();
            $table->timestamps();
        });

        Schema::table('ord_tbl_usr',function (Blueprint $table){

            $table->foreign('menu_id')->references('menu_id')->on('menu')->onDelete('cascade');
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
            $table->foreign('article_id')->references('article_id')->on('articles')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_tables_user');
    }
}
