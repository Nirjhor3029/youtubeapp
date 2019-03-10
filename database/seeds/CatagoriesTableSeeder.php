<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CatagoriesTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $categories = [ 'Vehicle', 'Light & Sound', 'Holud Snacks', 'Dala Khula', 'Holud', 'Wedding', 'Crafts & Alpona', 'Flowers', 'Venue','Dj','Catering','Photography & Cinematography','Decoration','Invitation Cards','Makeup Artist','Bakeries', 'Mehedi', 'kazi', 'Building Lights' ];
    foreach ( $categories as $category ) {
      DB::table( 'catagories' )->insert( [
        'name'       => trim( strtolower( $category ) ),
        'status'     => 1,
        'created_at' => Carbon::now(),
        ] );
      }
    }
  }
