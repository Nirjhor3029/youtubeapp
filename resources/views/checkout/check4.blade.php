@extends('layouts.app')
@push('css')
<link href="css/account.css" rel="stylesheet" type="text/css">
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
<!-- FB Profile Style -->

<!-- Blank section -->


<section class="page-section mb-5 mt-5">
  <div class="container">

    <div class="row mb-5">
      <div class="col-lg-12 text-center">
        @if ($pay == 1)
          <h3>THANK YOU FOR ORDERING FROM AYOJOK.COM</h3>
          <p class="text-center">Dear, {{$user->name}}</p>
          <p class="mt-5">You will soon be contacted by our Ayojok team. After the conversation over the phone with our team, your order will be officially placed and purchased according to your requirements. We will send your product and the invoice at the shipping address within the delivery date.</p>
        @else
          <h3>THANK YOU FOR ORDERING FROM AYOJOK.COM</h3>
          <p class="text-center">Dear, {{$user->name}}</p>
          <p class="mt-5">You will soon be contacted by our Ayojok team. After the conversation over the phone with our team, your order will be confirmed.</p>
          <p>After confirmation, you will need to send the required amount of money via bKash to our number 01771103125. After you pay the required amount, send us an SMS with the TrxID and phone number of the sender account. Your order will then be officially purchased according to your requirements. We will send your product and the invoice at the shipping address within the delivery date</p>
        @endif

      </div>
    </div>

</section>
@endsection

@push('scripts')

@endpush
