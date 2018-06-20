<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeOrdTblTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ord_tbl_usr', function (Blueprint $table) {

            $table->integer('table_id')->unsigned();
        });

        Schema::table('ord_tbl_usr', function (Blueprint $table) {

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
        //
    }
}
