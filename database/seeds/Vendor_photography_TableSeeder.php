<?php

use Illuminate\Database\Seeder;

class Vendor_photography_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('vendors_photography')->insert([
        'catagory_id'=>'12',
        'title'=>'Wedding Mate',
        'startingat_1_title'=>'Photography',
        'startingat_1_price'=>'10,000',
        'feature_1'=>'Something',
        'feature_2'=>'Something',
        'feature_3'=>'Something',
        'feature_4'=>'Something',
        'feature_5'=>'Something',
        'feature_6'=>'Something',
        'feature_7'=>'Something',
        'feature_8'=>'Something'
      ]);
      DB::table('vendors_photography')->insert([
        'catagory_id'=>'12',
        'title'=>'Wedding Moments',
        'startingat_1_title'=>'Photography',
        'startingat_1_price'=>'10,000',
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
