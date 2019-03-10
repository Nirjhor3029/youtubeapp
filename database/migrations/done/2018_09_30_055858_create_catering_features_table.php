<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCateringFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catering_feature', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vendor_id');
            $table->string('feature_1')->nullable();
            $table->string('feature_2')->nullable();
            $table->integer('feature_3')->default(0);
            $table->string('feature_4')->nullable();
            $table->string('feature_5')->nullable();
            $table->integer('feature_6')->default(0);
            $table->string('feature_7')->nullable();
            $table->string('feature_8')->nullable();
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
        Schema::dropIfExists('catering_features');
    }
}
