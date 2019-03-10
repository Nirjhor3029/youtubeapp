<?php

use Illuminate\Database\Seeder;

class Vendor_kaziTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('vendor_kazi')->insert([
        'catagory_id' => '18',
        'logo' => 'img\vendor-logo\vendor_logo_default.jpg',
        'title' =>'Dr. Golam Kibriya',
        'description' =>'Dr. Mohammad Golam Kibriya has been in the industry for a long time. They have been providing quality products and services with many positive reviews from satisfied customers. Their experience in the industry and professionalism is what sets them apart and makes them a top service provider in their respective category.',
        'starting_at' => '1250',
        'feature_1'=>'Something',
        'feature_2'=>'Something',
        'feature_3'=>'Something',
        'feature_4'=>'Something'
      ]);
      DB::table('vendor_kazi')->insert([
        'catagory_id' => '18',
        'logo' => 'img\vendor-logo\vendor_logo_default.jpg',
        'title' =>'Adbul Kabir',
        'description' =>'Adbul Kabir has been in the industry for a long time. They have been providing quality products and services with many positive reviews from satisfied customers. Their experience in the industry and professionalism is what sets them apart and makes them a top service provider in their respective category.',
        'starting_at' => '1250',
        'feature_1'=>'Something',
        'feature_2'=>'Something',
        'feature_3'=>'Something',
        'feature_4'=>'Something'
      ]);
    }
}
