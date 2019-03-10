<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
  * Seed the application's database.
  *
  * @return void
  */
  public function run()
  {
    // $this->call('UsersTableSeeder');
    // $this->command->info('User table seeded !');
    // $this->call([
    //   CatagoriesTableSeeder::class,
    //   ProductsTableSeeder::class,
    //   HotOffersTableSeeder::class,
    //   ProductsTopTableSeeder::class,
    // ]);
    // $this->command->info('Catagory, Products, Hot Offer & Product Top Seeded !');
    // $this->call('Vendor_kaziTableSeeder');
    // $this->command->info('Kazi table seeded !!');
    //
    // $this->call('Vendor_venue_TableSeeder');
    // $this->command->info('vendor Venue table seeded !!');
    // $this->call('Vendor_dj_TableSeeder');
    // $this->command->info('vendor DJ table seeded !!');
    // $this->call('Vendor_catering_TableSeeder');
    // $this->command->info('vendor catering table seeded !!');

    // $this->call('Vendor_mehedi_TableSeeder');
    // $this->command->info('vendor mehedi table seeded !!');
    // $this->call('Vendor_bakeries_TableSeeder');
    // $this->command->info('vendor bakeries table seeded !!');
    // $this->call('Vendor_invitation_cards_TableSeeder');
    // $this->command->info('vendor invitation card table seeded !!');
    //
    // $this->call('Vendor_photography_TableSeeder');
    // $this->command->info('Vendor photography table seeded !!');
    // $this->call('Vendor_makeup_artist_TableSeeder');
    // $this->command->info('vendor makeup artist table seeded !!');
    // $this->call('Vendor_decorations_TableSeeder');
    // $this->command->info('vendor decoration table seeded !!');
    // $this->call('Vendor_features_TableSeeder');
    // $this->command->info('vendor feature table seeded !!');
    // $this->call('Vendor_images_TableSeeder');
    // $this->command->info('vendor image table seeded !!');
  }
}
  class UsersTableSeeder extends Seeder
  {
    public function run()
    {
      DB::table('users')->delete();

      DB::table('users')->insert([
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('secret'),
      ]);
    }
  }
