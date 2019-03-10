<?php

use Illuminate\Database\Seeder;

class Vendor_mehedi_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('vendors_mehedis')->insert([
        'catagory_id'=>'17',
        'title'=> 'Something 1',
        'startingat_1_title'=> 'Package',
        'startingat_1_price'=> '1000',
        'feature_1'=> 'Something',
        'feature_2'=> 'Something',
        'feature_3'=> 'Something',
        'feature_4'=> 'Something',
        'feature_5'=> 'Something',
        'feature_6'=> 'Something'
      ]);

      DB::table('vendors_mehedis')->insert([
        'catagory_id'=>'17',
        'title'=> 'Something 2',
        'startingat_1_title'=> 'Package',
        'startingat_1_price'=> '1000',
        'feature_1'=> 'Something',
        'feature_2'=> 'Something',
        'feature_3'=> 'Something',
        'feature_4'=> 'Something',
        'feature_5'=> 'Something',
        'feature_6'=> 'Something'
      ]);

    }
}
