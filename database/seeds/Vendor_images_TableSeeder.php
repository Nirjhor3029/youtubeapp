<?php

use Illuminate\Database\Seeder;

class Vendor_images_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      for ($i = 1; $i <= 21; $i++) {
        DB::table('vendor_images')->insert([
          'catagory_id' => '12',

          'vendors_id' => '3',

          'image_locations' => 'img\vendor-image\wedding_mate\Ayojok-WM-'.$i.'.jpg',

      ]);

    }
    }
}
