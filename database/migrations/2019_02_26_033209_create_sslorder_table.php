<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSslorderTable extends Migration
{



    public function up()
    {
        Schema::create('sslorder', function (Blueprint $table) {
            $table->increments('id');

            $table->string('currency');
            $table->integer('total_amount');
            $table->string('order_id');
            $table->string('tran_id',25);

            $table->string('cus_name');
            $table->string('cus_email');
            $table->string('cus_phone');
            $table->string('order_status');

            $table->timestamps();

        });
    }


    public function down()
    {
        Schema::dropIfExists('sslorder');
    }
}
