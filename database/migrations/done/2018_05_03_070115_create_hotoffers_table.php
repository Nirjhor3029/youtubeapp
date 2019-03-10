<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotoffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotoffers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('catagory_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->timestamps();
            $table->SoftDeletes();

            $table->foreign('product_id')
                  ->references('id')->on('products')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

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
        Schema::dropIfExists('hotoffers');
    }
}
