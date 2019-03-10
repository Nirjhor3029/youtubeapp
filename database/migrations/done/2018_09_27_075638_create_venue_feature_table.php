<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenueFeatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venue_feature', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vendor_id');
            $table->string('feature_1');
            $table->string('feature_2');
            $table->integer('feature_3');
            $table->string('feature_4');
            $table->string('feature_5');
            $table->integer('feature_6');
            $table->string('feature_7');
            $table->string('feature_8');
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
        Schema::dropIfExists('venue_feature');
    }
}
