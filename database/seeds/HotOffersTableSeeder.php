<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class HotOffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
for($i = 1 ; $i < 30; $i++){
        // Hot product for the Vehicle
        $category_id = rand(1, 8);
        $product = DB::table( 'products' )->where( 'catagory_id', '=',$category_id)->get();

    $product_id = $product[0]->id;
    // $product_id = rand( 1, 8)
    // $category_id = $product[0]->catagory_id;
    DB::table( 'hotoffers' )->insert( [
      'product_id' => $product_id,
      'catagory_id' => $category_id,
      'created_at' => Carbon::now(),
    ]);
  }
    }
}
