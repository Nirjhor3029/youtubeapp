<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemQuerycartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_querycart', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('catagory_id');
            $table->integer('vendor_id');
            $table->string('date');
            $table->string('time');
            $table->string('package_id');
            $table->string('mess')->nullable();
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
        Schema::dropIfExists('tem_querycart');
    }
}
