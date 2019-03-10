<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorKaziTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_kazi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('catagory_id')->unsigned();
            $table->string('image')->nullable();
            $table->string('logo');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('starting_at');
            $table->string('feature_1');
            $table->string('feature_2');
            $table->string('feature_3');
            $table->string('feature_4');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('vendor_kazi');
    }
}
