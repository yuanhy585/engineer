<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTwoColumnsToEmOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('em_orders', function (Blueprint $table) {
            $table->bigInteger('measured')->default(0);
            $table->bigInteger('installed')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('em_orders', function (Blueprint $table) {
            //
        });
    }
}
