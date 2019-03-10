<?php

use Illuminate\Database\Seeder;

class Vendor_invitation_cards_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('vendor_invitation_card')->insert([
      'catagory_id' => '14',
      'title'=>'Card Printer 1',
      'startingat_1_title'=>'Design',
      'startingat_1_price'=>'120',
      'feature_1'=>'Something',
      'feature_2'=>'Something',
      'feature_3'=>'Something',
      'feature_4'=>'Something',
      'feature_5'=>'Something',
      'feature_6'=>'Something',
      'feature_7'=>'Something',
      'feature_8'=>'Something',
      ]);
      DB::table('vendor_invitation_card')->insert([
      'catagory_id' => '14',
      'title'=>'Card Printer 2',
      'startingat_1_title'=>'Wedding Design',
      'startingat_1_price'=>'120',
      'feature_1'=>'Something',
      'feature_2'=>'Something',
      'feature_3'=>'Something',
      'feature_4'=>'Something',
      'feature_5'=>'Something',
      'feature_6'=>'Something',
      'feature_7'=>'Something',
      'feature_8'=>'Something',
      ]);
    }
}
