<?php

use Illuminate\Database\Seeder;

class Packages_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('packages')->insert([
          'catagory_id'=>'9';
          'vendor_id'=>;
          'title'=>;
          'price'=>;
          'description'=>;
          'image'=>;
      ]);
    }
}
