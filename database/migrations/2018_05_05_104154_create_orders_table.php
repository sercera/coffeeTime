<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->integer('neto_total');
            $table->integer('selling_total');
            $table->boolean('is_charged')->default(false);
            $table->integer('fk_for_financial')->unsigned();

            $table->timestamps();
        });
        Schema::table('orders',function (Blueprint $table){

            $table->foreign('fk_for_financial')->references('financial_id')->on('financials')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
