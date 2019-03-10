<?php

use Illuminate\Database\Seeder;

class Vendor_bakeries_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('vendors_bakeries')->insert([
        'catagory_id' => '16',
        'title'=> 'Bakeries Item 1',
        'startingat_1_title'=> 'Cake',
        'startingat_1_price'=> '1200',
        'feature_1'=>'Something',
        'feature_2'=>'Something',
        'feature_3'=>'Something',
        'feature_4'=>'Something',
        'feature_5'=>'Something',
        'feature_6'=>'Something',
        'feature_7'=>'Something',
        'feature_8'=>'Something'
      ]);
      DB::table('vendors_bakeries')->insert([
        'catagory_id' => '16',
        'title'=> 'Bakeries Item 2',
        'startingat_1_title'=> 'Cup-Cake',
        'startingat_1_price'=> '200',
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
