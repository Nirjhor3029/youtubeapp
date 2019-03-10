<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->integer('catagory_id')->unsigned();
            $table->string('title');
            $table->text('short_des')->nullable();
            $table->text('long_des')->nullable();
            $table->tinyInteger('is_sellable')->default(0);
            $table->integer('price');
            $table->tinyInteger('in_stock')->default(1);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('catagory_id')
                  ->references('id')->on('catagories')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
