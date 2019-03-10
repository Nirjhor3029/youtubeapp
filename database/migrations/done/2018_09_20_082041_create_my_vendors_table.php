<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->default(0);
            $table->string('vendors_name')->nullable();
            $table->string('catagory')->nullable();
            $table->string('contact_details')->nullable();
            $table->string('service_time')->nullable();
            $table->string('service_date')->nullable();
            $table->integer('total_payment')->default(0);
            $table->integer('advance_payment')->default(0);
            $table->integer('due_payment')->default(0);
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
        Schema::dropIfExists('my_vendors');
    }
}
