<?php

use Illuminate\Database\Seeder;

class Vendor_catering_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('vendors_caterings')->insert([
        'catagory_id' => '11',
        'logo' => 'img\vendor-logo\vendor_logo_default.jpg',
        'title' =>'Nanas Biriyani',
        'about_us' =>'Nanas Biriyani has been in the event industry for a long time. They have been providing quality products and services with many positive reviews from satisfied customers. Their experience in the industry and professionalism is what sets them apart and makes them a top service provider in their respective category.',
        'startingat_1_title' => 'SetMenu 1',
        'startingat_1_price' => '250',
        'feature_1'=>'Something',
        'feature_2'=>'Something',
        'feature_3'=>'Something',
        'feature_4'=>'Something',
        'feature_5'=>'Something',
        'feature_6'=>'Something',
        'feature_7'=>'Something',
        'feature_8'=>'Something'
      ]);
      DB::table('vendors_caterings')->insert([
        'catagory_id' => '11',
        'logo' => 'img\vendor-logo\vendor_logo_default.jpg',
        'title' =>'Showkats Biriayni',
        'about_us' =>'Showkats Biriayni has been in the event industry for a long time. They have been providing quality products and services with many positive reviews from satisfied customers. Their experience in the industry and professionalism is what sets them apart and makes them a top service provider in their respective category.',
        'startingat_1_title' => 'SetMenu 1',
        'startingat_1_price' => '250',
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
