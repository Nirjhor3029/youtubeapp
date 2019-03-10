<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->date('order_date');
            $table->integer('set');
            $table->integer('user_id');
            $table->integer('catagory_id');
            $table->integer('products_id');
            $table->date('date');
            $table->string('time');
            $table->string('quantity');
            $table->integer('address_id');
            $table->integer('shipping_id');
            $table->integer('payment_type');
            $table->string('mess')->nullable();
            $table->tinyInteger('is_paid')->default(0);
            $table->tinyInteger('is_delivered')->default(0);
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
        Schema::dropIfExists('order');
    }
}
