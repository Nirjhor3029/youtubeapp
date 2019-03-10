<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Product Seeder
        $catagories = [ 'Vehicle', 'Light & Sound', 'Holud Snacks', 'Dala Khula', 'Holud', 'Wedding', 'Crafts & Alpona', 'Flowers' ];
        $color = ['Red', 'Black','Blue','Orange','Pink','Yellow','Purple','Green'];
        for($i = 1 ; $i < 20 ; $i++){
        foreach ( $catagories as $catagory ) {

          $catagory = DB::table('catagories')->where('name','=',trim(strtolower($catagory)))->get();
          $catagory_id = $catagory[0]->id;
          $price = rand(100,500);
          $color1 = array_random($color);
          $color2 = array_random($color);
          $colors = $color1 .','.$color2;

          DB::table('products')->insert([
            'title'       => 'Product for '. $catagory[0]->name,
            'image'       => 'http://via.placeholder.com/600x600',
            'color'       => $colors,
            'catagory_id' => $catagory_id,
            'price'       => $price,
            'short_des'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et est risus. Sed non volutpat nulla, in viverra velit.',
            'long_des'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et est risus. Sed non volutpat nulla, in viverra velit. Praesent vitae tortor vel massa tempus tristique. Fusce vulputate arcu velit, at ultricies nibh condimentum et. Suspendisse blandit erat sed eros malesuada vehicula. Aenean iaculis varius diam. Morbi lectus turpis, porta eget commodo nec, aliquam sit amet leo.',
            'in_stock'    => 1,
            'status'      => 1,
            'created_at'  => Carbon::now(),
          ]);
          }
        }
    }
}
