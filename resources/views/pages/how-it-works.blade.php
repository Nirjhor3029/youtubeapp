@extends('layouts.app')

@push('css')

@endpush

@section('content')
  <!-- Masthead -->
<header class="pagehead" style="background-image: url('img/backgrounds/bg-footer.jpg');">
  <div class="container">
    <div class="row">
      <div class="col-12 my-auto text-center text-white">
        <img class="pagehead-img img-responsive mb-3" src="img/ayojok-logo-transparent.png" alt="">
      </div>
    </div>
  </div>
</header>

<!-- How it works section -->

<section class="page-section pricing" style="background-image: url('img/backgrounds/works.jpg');">
  <div class="wow fadeIn text-center">
    <p class="pagetitle">How It Works</p>
  </div>

  <div class="container wow fadeIn mb-5">

    <div class="col-lg-12" style="padding:40px 0px 30px 0px;text-align:justify";>
    </br>
    <p><strong>Ayojok.com</strong> is a place where you can browse and pick your desired vendors. We are here to save your time and money while keeping you trending by delivering quality services for your events from Ayojok itself.</p>
    <p>From event merchandises and decorative products to photographers and venues, find all event related services in one place and book them right away from the ease of your comforts anytime, anywhere.</p>
  </div>

  <div class="row mt-4">
    <div class="col-lg-12">
      <div class="clearfix">
        <img src="img/icons/icon-23.png" alt="..."class="how-it-works-icon">
        <h3 style="float:left;padding:20px;">Search</h3>
      </div>
      <div class="mt-2 mb-5" style="text-align:justify;">
        <p>With a fast and simple search bar under each vendor and an efficient filtering system, Ayojok lets you find your desired vendors among a pool of selections to choose from. You can now conveniently seek out and pick your vendor according to your desired location, budget, and personal preference. This will eliminate save you from stressful situations where you have to constantly go from one location to another in search of event location or frustrating phone calls every now and then to see whether your vendor is available or not. We also aim to eliminate your hassle of searching pages online on social media in search of vendors. Instead, Ayojok lets you manage all these in one place at the click of a button thereby saving you time and tension.<p>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="clearfix">
          <img src="img/icons/booking.png" alt="..." class="how-it-works-icon">
          <h3 style="float:left;padding:20px;">Booking</h3>
        </div>
        <div class="mt-2 mb-5" style="text-align:justify;">
          <p>Your wedding, your way! Choose your preferred services or send the booking request for desired vendors right away! </p>
          <p> All services and products in our website can be booked and ordered online efficiently. The following is a step by step process of how our whole booking process works:</p>
          <ul style="font-size: 18px;line-height: 1.5;">
            <li>Pick your service or product and select your preferred date and time. Proceed by clicking on “SEND FOR QUERY & GET A CALL”</li>
            <li>A message will be sent to your inbox regarding your query and our Ayojok team will contact you soon to discuss your order.</li>
            <li>After checking availability of your query, we will contact you again for confirmation.</li>
            <li>To confirm your booking, go to “My Query” under “My Account”.</li>
            <li>Payment of your booking can be done in “Payment” under “My Account” via two methods- Cash on delivery and Bkash.</li>
          </ul>
          <p> For your convenience we have made payment possible through cash on delivery, Bkash or debit/credit card.</p>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="clearfix">
          <img src="img/icons/icon-25.png" alt="..."class="how-it-works-icon">
          <h3 style="float:left;padding:20px;">Confirmation</h3>
        </div>
        <div class="mt-2 mb-5" style="text-align:justify;">
          <p>Upon completion of the booking process, the client will be contacted by our team with confirmation. The client will either receive an email or a physical copy of the billing information.</p>
          <p>Clients can also check the status of their booked services and contact their vendors anytime from “My Vendor” tab.</p>
        </div>
      </div>
    </div>

    <!-- <div class="row mt-4">
      <div class="col-lg-12">
        <div class="text-center">
          <h3>Where can I get some?</h3>
          <hr class="colored">
          <p>Upon completion of the booking process of Ayojok’s services or the vendors, the client will be contacted by our team with confirmation. The client receive an email or a physical copy containing the billing information. <br> Clients can also check the status of their purchased services or contact their vendors anytime from the “My Vendor” tab.</p>
        </div>
      </div>
    </div> -->
  </div>
</div>
</section>
@endsection

@push('script')

@endpush
