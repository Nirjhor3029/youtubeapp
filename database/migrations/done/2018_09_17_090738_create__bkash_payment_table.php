<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBkashPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bkash_payment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('used_num')->default(0);
            $table->integer('trxID')->default(0);
            $table->integer('invoice_id')->default(0);
            $table->text('comment')->null;
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
        Schema::dropIfExists('bkash_payment');
    }
}
