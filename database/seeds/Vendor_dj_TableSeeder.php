<?php

use Illuminate\Database\Seeder;

class Vendor_dj_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('vendors_djs')->insert([
        'catagory_id' => '10',
        'title'=>'Mr. Mechanics',
        'startingat_1_title'=>'1 Day',
        'startingat_1_price'=>'2000',
        'feature_1'=>'Something',
        'feature_2'=>'Something',
        'feature_3'=>'Something',
        'feature_4'=>'Something',
        'feature_5'=>'Something',
        'feature_6'=>'Something',
        'feature_7'=>'Something',
        'feature_8'=>'Something'
      ]);
      DB::table('vendors_djs')->insert([
        'catagory_id' => '10',
        'title'=>'Atomizer',
        'startingat_1_title'=>'1 Day',
        'startingat_1_price'=>'2000',
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
