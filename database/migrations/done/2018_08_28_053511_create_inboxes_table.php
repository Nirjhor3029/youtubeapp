<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inboxes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('catagory_id');
            $table->integer('product_id');
            $table->integer('vendors_id')->default(0);
            $table->tinyInteger('is_open')->default(0);
            $table->tinyInteger('is_mailed')->default(0);
            $table->text('mess')->nullable();
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
        Schema::dropIfExists('inboxes');
    }
}
