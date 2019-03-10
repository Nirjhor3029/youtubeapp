<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetcostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgetcost', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('venue');
            $table->integer('decoration');
            $table->integer('outfit');
            $table->integer('jewelery');
            $table->integer('makeup');
            $table->integer('music');
            $table->integer('catering');
            $table->integer('bakeries');
            $table->integer('invitation');
            $table->integer('legal');
            $table->integer('transportation');
            $table->integer('honeymoon');
            $table->integer('other');
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
        Schema::dropIfExists('budgetcosts');
    }
}
