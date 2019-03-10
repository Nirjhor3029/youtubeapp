<?php

use Illuminate\Database\Seeder;

class Vendor_decorations_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('vendors_decoration')->insert([
      'catagory_id' => '13',
      'title'=>'Alpona Event Management',
      'startingat_1_title'=>'Wedding',
      'startingat_1_price'=>'1,00,000',
      'feature_1'=>'Something',
      'feature_2'=>'Something',
      'feature_3'=>'Something',
      'feature_4'=>'Something',
      'feature_5'=>'Something',
      'feature_6'=>'Something',
      'feature_7'=>'Something',
      'feature_8'=>'Something'
      ]);
      DB::table('vendors_decoration')->insert([
      'catagory_id' => '13',
      'title'=>'Gulshan Decorators',
      'startingat_1_title'=>'Wedding',
      'startingat_1_price'=>'1,00,000',
      'feature_1'=>'Something',
      'feature_2'=>'Something',
      'feature_3'=>'Something',
      'feature_4'=>'Something',
      'feature_5'=>'Something',
      'feature_6'=>'Something',
      'feature_7'=>'Something',
      'feature_8'=>'Something'
      ]);
    }
}
