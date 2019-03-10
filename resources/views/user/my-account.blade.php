@extends('layouts.app')

@push('css')
<link href="{{asset('css/account.css')}}" rel="stylesheet" type="text/css">
@endpush

@section('content')
  <!-- Masthead -->
<header class="pagehead" style="background-image: url({{asset('img/backgrounds/bg-footer.jpg')}});">
  <div class="container">
    <div class="row">
      <div class="col-12 my-auto text-center text-white">
        <img class="pagehead-img img-responsive mb-3" src="{{asset('img/ayojok-logo-transparent.png')}}" alt=""/>
      </div>
    </div>
  </div>
</header>
<!--/ End of Masthead -->

<!-- Content section -->
<section class="page-section mt-4 mb-4">
  <div class="container">

    {{-- <div class="col-lg-12 row">
      <ul class="breadcrumb">
        <li><a href="{{route('mainhome')}}">Home</a></li>
        <li class="active"> My account</li>
      </ul>
    </div> --}}

    <div class="wow fadeIn">
      <h3><i class="fa fa-unlock fa-lg" style="margin-right:1rem;"></i>  My Account</h3>
    </div>
    <div class="mt-4 mb-5">
      <div class="my-account">
        <p>WELCOME TO YOUR ACCOUNT. HERE YOU CAN MANAGE ALL OF YOUR PERSONAL INFORMATION AND ORDERS.</p>
      </div>

      <ul class="nav justify-content-center account-option">
        <li class="nav-item btn add-addressbtn col-lg-3">
          <a class="nav-link" href="{{route('myvendors', Auth::user()->id)}}">My Vendors</a>
        </li>
        <li class="nav-item btn add-addressbtn col-lg-3">
          <a class="nav-link" href="{{route('mychecklist',Auth::user()->id)}}">My Checklist</a>
        </li>
        <li class="nav-item btn add-addressbtn col-lg-3">
          <a class="nav-link" href="{{route('mybudget')}}">Budget Manager</a>
        </li>
      </ul>

<hr class="colored">
      <ul class="myAccountList col-lg-12 row" style="padding-right:0;">

        <li class="col-lg-2 text-center ">
          <div class="thumbnail">
            <a title="Orders" href="{{route('client-orderlist', Auth::user()->id)}}"><img src="{{asset('img\icons\order-history.png')}}" alt="order-history" style="width:5rem;padding:8px;margin-bottom:5px;"> Order history </a>
          </div>
        </li>
        {{-- <li class="col-lg-2 text-center ">
          <div class="thumbnail">
            <a title="My addresses" href="{{route('address.index')}}"><i class="fa fa-map-marker"></i> My addresses</a>
          </div>
        </li> --}}
        {{-- <li class="col-lg-2 text-center ">
          <div class="thumbnail">
            <a title="Add address" href="{{route('address.create')}}"> <i class="fa fa-edit"> </i> Add address</a>
          </div>
        </li> --}}
        <li class="col-lg-2 text-center ">
          <div class="thumbnail">
            <a title="Personal information" href="{{route('personal-info.edit', Auth::user()->id )}}"><img src="{{asset('img\icons\personal-info.png')}}" alt="order-history" style="width:5rem;padding:8px;margin-bottom:5px;">
              Personal information</a>
            </div>
          </li>
          <li class="col-lg-2 text-center ">
            <div class="thumbnail">
              <a title="My wishlists" href="{{route('wishlist.index')}}">
                <img src="{{asset('img\icons\wishlist.png')}}" alt="order-history" style="width:5rem;padding:8px;margin-bottom:5px;">
                <br>
                <span>My wishlists</span>
              </a>
            </div>
          </li>
          <li class="col-lg-2 text-center">
            <div class="thumbnail">
              <a title="My Queries" href="{{route('confirm-query')}}">
                <img src="{{asset('img\icons\order-history.png')}}" alt="order-history" style="width:5rem;padding:8px;margin-bottom:5px;">
                <br>
                <span>My Queries</span>
              </a>
            </div>
          </li>
          <li class="col-lg-2 text-center">
            <div class="thumbnail">
              <a title="Payment" href="{{route('payment')}}">
                <img src="{{asset('img\icons\payment.png')}}" alt="order-history" style="width:5rem;padding:8px;margin-bottom:5px;">
                <br>
                <span>Payment</span>
              </a>
            </div>
          </li>
          <li class="col-lg-2 text-center">
            <div class="thumbnail">
              <a title="My Message" href="{{route('User.Message')}}">
                <img src="{{asset('img\icons\message.png')}}" alt="order-history" style="width:5rem;padding:8px;margin-bottom:5px;">
                <br>
                <span>Inbox</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </section>
  <!--/ End of Content section -->
@endsection

@push('script')

@endpush
