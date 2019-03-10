<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDescriptionGalleryColumnInProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('products', function($table) {
      $table->text('short_des')->after('title')->nullable();
      $table->text('long_des')->after('short_des')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('products', function($table) {
      $table->dropColumn('short_des');
      $table->dropColumn('long_des');
      });
    }
}
