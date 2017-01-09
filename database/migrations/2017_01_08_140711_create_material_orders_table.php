<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('material_id')->unsigned();
            $table->bigInteger('order_id')->unsigned();
            $table->string('position')->nullable();
            $table->decimal('width',15,2)->nullable();
            $table->decimal('height',15,2)->nullable();
            $table->bigInteger('number');
            $table->decimal('area',15,2);
            $table->decimal('price',15,2);
            $table->string('remark')->nullable();
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
        Schema::drop('material_orders');
    }
}
