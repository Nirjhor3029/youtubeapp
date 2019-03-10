<?php

use Illuminate\Database\Seeder;

class Vendor_venue_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('vendors_venues')->insert([
        'catagory_id' => '9',
        'profile_img' => '',
        'logo' => 'img\vendor-logo\vendor_logo_default.jpg',
        'title' =>'Police Convention Center',
        'about_us' =>'Police Convention Center has been in the event industry for a long time. They have been providing quality products and services with many positive reviews from satisfied customers. Their experience in the industry and professionalism is what sets them apart and makes them a top service provider in their respective category.',
        'startingat_1_title' => 'Hall 1',
        'startingat_1_price' => '1250',
        'feature_1'=>'something',
        'feature_2'=> 'something',
        'feature_3'=> 'something',
        'feature_4'=> 'something',
        'feature_5'=> 'something',
        'feature_6'=> 'something',
        'feature_7'=> 'something',
        'feature_8'=> 'something'
      ]);
      DB::table('vendors_venues')->insert([
        'catagory_id' => '9',
        'logo' => 'img\vendor-logo\vendor_logo_default.jpg',
        'title' =>'Rowoa Convention Center',
        'about_us' =>'Police Convention Center has been in the event industry for a long time. They have been providing quality products and services with many positive reviews from satisfied customers. Their experience in the industry and professionalism is what sets them apart and makes them a top service provider in their respective category.',
        'startingat_1_title' => 'Hall 1',
        'startingat_1_price' => '1250',
        'feature_1'=>'something',
        'feature_2'=> 'something',
        'feature_3'=> 'something',
        'feature_4'=> 'something',
        'feature_5'=> 'something',
        'feature_6'=> 'something',
        'feature_7'=> 'something',
        'feature_8'=> 'something'
      ]);
    }
}
