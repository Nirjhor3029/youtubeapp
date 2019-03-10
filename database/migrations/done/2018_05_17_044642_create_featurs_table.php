<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeatursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_featurs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('catagory_id');

            $table->string('feature1_img');
            $table->string('feature1_title');

            $table->string('feature2_img');
            $table->string('feature2_title');

            $table->string('feature3_img');
            $table->string('feature3_title');

            $table->string('feature4_img');
            $table->string('feature4_title');

            $table->string('feature5_img')->nullable();
            $table->string('feature5_title')->nullable();

            $table->string('feature6_img')->nullable();
            $table->string('feature6_title')->nullable();

            $table->string('feature7_img')->nullable();
            $table->string('feature7_title')->nullable();

            $table->string('feature8_img')->nullable();
            $table->string('feature8_title')->nullable();

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
        Schema::dropIfExists('vendor_featurs');
    }
}
