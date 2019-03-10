<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhoneQueryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone_query', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone');
            $table->integer('vendor_id')->default(0);
            $table->integer('products_id')->default(0);
            $table->tinyInteger('is_followup')->default(0);
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
        Schema::dropIfExists('phone_query');
    }
}
