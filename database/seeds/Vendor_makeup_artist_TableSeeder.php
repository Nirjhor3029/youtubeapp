<?php

use Illuminate\Database\Seeder;

class Vendor_makeup_artist_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('vendors_makeup_artist')->insert([
        'catagory_id'=>'15',
        'title'=>'Farzana Shakils',
        'startingat_1_title'=>'Bridal Package',
        'startingat_1_price'=>'2500',
        'feature_1'=>'Something',
        'feature_2'=>'Something',
        'feature_3'=>'Something',
        'feature_4'=>'Something',
        'feature_5'=>'Something',
        'feature_6'=>'Something',
        'feature_7'=>'Something',
        'feature_8'=>'Something'
      ]);
      DB::table('vendors_makeup_artist')->insert([
        'catagory_id'=>'15',
        'title'=>'Persona',
        'startingat_1_title'=>'Groom Package',
        'startingat_1_price'=>'2500',
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
