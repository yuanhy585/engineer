<?php

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
            $table->increments('id');
            $table->string('order_id');
            $table->string('orderCode')->nullable();
            $table->bigInteger('shop_id');
            $table->bigInteger('status_id')->default(1);
            $table->boolean('needMeasure');
            $table->boolean('needInstall');
            $table->decimal('expectPrice',15,2)->nullable();
            $table->decimal('resultPrice',15,2)->nullable();
            $table->decimal('allPrice',15,2)->nullable();
            $table->bigInteger('active1')->dedualt(1);
            $table->bigInteger('active2')->default(1);
            $table->bigInteger('working')->default(1);
            $table->bigInteger('stop_id')->default(0);
            $table->string('remark')->nullable();
            $table->string('theme')->nullable();
            $table->integer('measureConfirm')->default(0);
            $table->integer('installConfirm')->default(0);
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
        Schema::drop('orders');
    }
}
