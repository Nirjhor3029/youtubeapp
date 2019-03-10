<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductsTopTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    // Top products for the Vehicle
    $product = DB::table( 'products' )->where( 'title', '=',
    trim( strtolower( 'Product for vehicle' ) ) )->get();

    $product_id = $product[0]->id;
    DB::table( 'productstop' )->insert( [
      'product_id' => $product_id,
      'created_at' => Carbon::now(),
      ] );
    }

  }
