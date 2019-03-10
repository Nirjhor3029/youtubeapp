<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitationFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitation_feature', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vendor_id');
            $table->string('feature_1')->nullable();
            $table->integer('feature_2')->default(0);
            $table->string('feature_3')->nullable();
            $table->string('feature_4')->nullable();
            $table->string('feature_5')->nullable();
            $table->string('feature_6')->nullable();
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
        Schema::dropIfExists('invitation_features');
    }
}
