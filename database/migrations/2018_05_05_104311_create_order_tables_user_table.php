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
            $table->increments('ord_tbl_id');

            $table->integer('menu_id')->unsigned();
            $table->integer('article_id')->unsigned();
            $table->integer('table_id')->unsigned();
            $table->integer('quantity');

            $table->integer('order_id')->unsigned();
            $table->integer('user_id')->nullable()->unsigned();
            $table->integer('employee_id')->nullable()->unsigned();

            $table->dateTime('date');
            $table->timestamps();
        });

        Schema::table('ord_tbl_usr',function (Blueprint $table){

            $table->foreign('menu_id')->references('menu_id')->on('menu')->onDelete('cascade');
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
            $table->foreign('article_id')->references('article_id')->on('articles')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('employee_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('table_id')->references('table_id')->on('tables')->onDelete('cascade');


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
