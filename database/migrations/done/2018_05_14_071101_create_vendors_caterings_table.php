<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsCateringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors_caterings', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('catagory_id');
          $table->string('profile_img')->nullable();
          $table->string('logo')->nullable();
          $table->string('title');
          $table->text('about_us')->nullable();
          $table->string('startingat_1_title');
          $table->string('startingat_1_price');
          $table->string('startingat_2_title')->nullable();
          $table->string('startingat_2_price')->nullable();
          $table->string('startingat_3_title')->nullable();
          $table->string('startingat_3_price')->nullable();
          $table->string('feature_1');
          $table->string('feature_2');
          $table->string('feature_3');
          $table->string('feature_4');
          $table->string('feature_5')->nullable();
          $table->string('feature_6')->nullable();
          $table->string('feature_7')->nullable();
          $table->string('feature_8')->nullable();
          $table->string('feature_image_1')->nullable()->default('http://via.placeholder.com/600x400');
          $table->string('feature_image_2')->nullable()->default('http://via.placeholder.com/600x400');
          $table->string('feature_image_3')->nullable()->default('http://via.placeholder.com/600x400');
          $table->string('package_id')->nullable();
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
        Schema::dropIfExists('vendors_caterings');
    }
}
