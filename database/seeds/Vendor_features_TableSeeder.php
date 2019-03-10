<?php

use Illuminate\Database\Seeder;

class Vendor_features_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // kazi
      DB::table('vendor_featurs')->insert([
        'catagory_id' => '18',

        'feature1_img'=>'img/icons/kazi/location.png',
        'feature1_title'=>'Location',

        'feature2_img'=>'img/icons/kazi/experience.png',
        'feature2_title'=>'Industry Experience',

        'feature3_img'=>'img/icons/kazi/booking-method.png',
        'feature3_title'=>'Booking Method',

        'feature4_img'=>'img/icons/kazi/appointment.png',
        'feature4_title'=>'Book Before',

      ]);

      // Dj
      DB::table('vendor_featurs')->insert([
        'catagory_id' => '10',

        'feature1_img'=>'img\icons\dj\experience.png',
        'feature1_title'=>'Industry Experience',

        'feature2_img'=>'img\icons\dj\performing-time.png',
        'feature2_title'=>'Performing Time',

        'feature3_img'=>'img\icons\dj\light-setup.png',
        'feature3_title'=>'Light Setup',

        'feature4_img'=>'img\icons\dj\sound-box.png',
        'feature4_title'=>'Sound Setup',

        'feature5_img'=>'img\icons\dj\request-song.png',
        'feature5_title'=>'Custom Song List',

        'feature6_img'=>'img\icons\dj\booking-method.png',
        'feature6_title'=>'Booking Method',

        'feature7_img'=>'img\icons\dj\appointment.png',
        'feature7_title'=>'Book Before',

        'feature8_img'=>'img\icons\dj\outsite-city.png',
        'feature8_title'=>'Outside City Service',
      ]);

      // Catering
      DB::table('vendor_featurs')->insert([
        'catagory_id' => '11',

        'feature1_img'=>'img\icons\catering\location.png',
        'feature1_title'=>'Location',

        'feature2_img'=>'img\icons\catering\experience.png',
        'feature2_title'=>'Industry Experience',

        'feature3_img'=>'img\icons\catering\minimum.png',
        'feature3_title'=>'Min. Order',

        'feature4_img'=>'img\icons\catering\crokaries.png',
        'feature4_title'=>'Cookeries & Cutleries',

        'feature5_img'=>'img\icons\catering\waiter.png',
        'feature5_title'=>'Waiter',

        'feature6_img'=>'img\icons\catering\home-delivery.png',
        'feature6_title'=>'Home Delivery',

        'feature7_img'=>'img\icons\catering\booking-method.png',
        'feature7_title'=>'Booking Method',

        'feature8_img'=>'img\icons\catering\outside-city.png',
        'feature8_title'=>'Outside City Service',
      ]);

      // Venue
      DB::table('vendor_featurs')->insert([
        'catagory_id' => '9',

        'feature1_img'=>'img\icons\venue\location.png',
        'feature1_title'=>'Location',

        'feature2_img'=>'img\icons\venue\venue-type.png',
        'feature2_title'=>'Venue Type',

        'feature3_img'=>'img\icons\venue\seating.png',
        'feature3_title'=>'Max. Seating Capacity',

        'feature4_img'=>'img\icons\venue\caterer.png',
        'feature4_title'=>'Caterer',

        'feature5_img'=>'img\icons\venue\decor.png',
        'feature5_title'=>'Decoration',

        'feature6_img'=>'img\icons\venue\parking.png',
        'feature6_title'=>'Parking Size',

        'feature7_img'=>'img\icons\venue\booking-method.png',
        'feature7_title'=>'Booking Method',

        'feature8_img'=>'img\icons\venue\timing.png',
        'feature8_title'=>'Timing',
      ]);

      // Mehedi
      DB::table('vendor_featurs')->insert([
        'catagory_id' => '17',

        'feature1_img'=>'img\icons\mehedi\location.png',
        'feature1_title'=>'Location',

        'feature2_img'=>'img\icons\mehedi\experience.png',
        'feature2_title'=>'Industry Experience',

        'feature3_img'=>'img\icons\mehedi\home-service.png',
        'feature3_title'=>'Home Service',

        'feature4_img'=>'img\icons\mehedi\booking-method.png',
        'feature4_title'=>'Booking Method',

        'feature5_img'=>'img\icons\mehedi\appointment.png',
        'feature5_title'=>'Book Before',

        'feature6_img'=>'img\icons\mehedi\outside-city.png',
        'feature6_title'=>'Outside City Service',

      ]);

      // Bakeries
      DB::table('vendor_featurs')->insert([
        'catagory_id' => '16',

        'feature1_img'=>'img\icons\bakeries\location.png',
        'feature1_title'=>'Location',

        'feature2_img'=>'img\icons\bakeries\experience.png',
        'feature2_title'=>'Industry Experience',

        'feature3_img'=>'img\icons\bakeries\minimum.png',
        'feature3_title'=>'Min. Order',

        'feature4_img'=>'img\icons\bakeries\custom-design.png',
        'feature4_title'=>'Customization',

        'feature5_img'=>'img\icons\bakeries\wedding-cake.png',
        'feature5_title'=>'Wedding Cake',

        'feature6_img'=>'img\icons\bakeries\home-delivery.png',
        'feature6_title'=>'Home Delivery',

        'feature7_img'=>'img\icons\bakeries\booking-method.png',
        'feature7_title'=>'Booking Method',

        'feature8_img'=>'img\icons\bakeries\delivery-time.png',
        'feature8_title'=>'Order Before',
      ]);

      // Invitation Cards
      DB::table('vendor_featurs')->insert([
        'catagory_id' => '14',

        'feature1_img'=>'img\icons\invitation-card\location.png',
        'feature1_title'=>'Location',

        'feature2_img'=>'img\icons\invitation-card\experience.png',
        'feature2_title'=>'Industry Experience',

        'feature3_img'=>'img\icons\invitation-card\minorder.png',
        'feature3_title'=>'Min. Order',

        'feature4_img'=>'img\icons\invitation-card\custom-design.png',
        'feature4_title'=>'Custom Design',

        'feature5_img'=>'img\icons\invitation-card\wedding-cake.png',
        'feature5_title'=>'Handmade Card',

        'feature6_img'=>'img\icons\invitation-card\delivery-time.png',
        'feature6_title'=>'Delivery Time',

        'feature7_img'=>'img\icons\invitation-card\home-delivery.png',
        'feature7_title'=>'Home Delivery',

        'feature8_img'=>'img\icons\invitation-card\booking-method.png',
        'feature8_title'=>'Booking Method',
      ]);

      // Makeup Artist
      DB::table('vendor_featurs')->insert([
        'catagory_id' => '15',

        'feature1_img'=>'img\icons\makeup\location.png',
        'feature1_title'=>'Location',

        'feature2_img'=>'img\icons\makeup\experience.png',
        'feature2_title'=>'Industry Experience',

        'feature3_img'=>'img\icons\makeup\service-time.png',
        'feature3_title'=>'Timing',

        'feature4_img'=>'img\icons\makeup\type.png',
        'feature4_title'=>'Men only\Women only\ Both',

        'feature5_img'=>'img\icons\makeup\home-service.png',
        'feature5_title'=>'Home Service',

        'feature6_img'=>'img\icons\makeup\booking-method.png',
        'feature6_title'=>'Booking Method',

        'feature7_img'=>'img\icons\makeup\appointment.png',
        'feature7_title'=>'Book Before',

        'feature8_img'=>'img\icons\makeup\outside-city.png',
        'feature8_title'=>'Outside City Service',
      ]);

      // Decoration
      DB::table('vendor_featurs')->insert([
        'catagory_id' => '13',

        'feature1_img'=>'img\icons\decoration\location.png',
        'feature1_title'=>'Location',

        'feature2_img'=>'img\icons\decoration\experience.png',
        'feature2_title'=>'Industry Experience',

        'feature3_img'=>'img\icons\decoration\booking-method.png',
        'feature3_title'=>'Booking Method',

        'feature4_img'=>'img\icons\decoration\outside-city.png',
        'feature4_title'=>'Outside City',

        'feature5_img'=>'img\icons\decoration\custom-theme.png',
        'feature5_title'=>'Themem Design',

        'feature6_img'=>'img\icons\decoration\booking-method.png',
        'feature6_title'=>'Booking Method',

        'feature7_img'=>'img\icons\decoration\corporate.png',
        'feature7_title'=>'Corporate Event',

        'feature8_img'=>'img\icons\decoration\birthday.png',
        'feature8_title'=>'Birthday',
      ]);

      // Photographer
      DB::table('vendor_featurs')->insert([
        'catagory_id' => '12',

        'feature1_img'=>'img\icons\photography\location.png',
        'feature1_title'=>'Location',

        'feature2_img'=>'img\icons\photography\experience.png',
        'feature2_title'=>'Industry Experience',

        'feature3_img'=>'img\icons\photography\service-time.png',
        'feature3_title'=>'Service Time',

        'feature4_img'=>'img\icons\photography\corporate.png',
        'feature4_title'=>'Corporate Event',

        'feature5_img'=>'img\icons\photography\additional-hour-charge.png',
        'feature5_title'=>'Additional Hour Rate',

        'feature6_img'=>'img\icons\photography\booking-method.png',
        'feature6_title'=>'Booking Method',

        'feature7_img'=>'img\icons\photography\delivery-time.png',
        'feature7_title'=>'Delivery Time',

        'feature8_img'=>'img\icons\photography\outside-city.png',
        'feature8_title'=>'Outside City Service',
      ]);
    }
}
