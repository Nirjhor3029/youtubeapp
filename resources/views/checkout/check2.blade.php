@extends('layouts.app')

@push('css')
<link href="{{asset('css/account.css')}}" rel="stylesheet" type="text/css">
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

  {{-- <section class="page-section">
    <div class="container">

      <div class="row">
        <div class="col-lg-12">
          <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="cart.html">Cart</a></li>
            <li class="active"> Checkout</li>
          </ul>
        </div>
      </div>

    </div>
  </section> --}}

  <section class="page-section mb-4">
    <div class="container">

      <div class="row">
        <div class="col-lg-12">
          <div class="wow fadeIn">
            <h3><i class="fa fa-shopping-cart fa-lg" style="margin-right:1rem;"></i>  Checkout</h3>
          </div>
        </div>
      </div>


      <div class="row mt-4">
        <div class="col-lg-12">
          <ul class="orderStep orderStepLook2">
            <li><a href="checkout-1.html"> <i class="fa fa-map-marker "></i> <span> address</span>
            </a></li>
            <li class="active"><a href="checkout-3.html"><i class="fa fa-truck "> </i><span>Shipping</span> </a></li>
            <li><a href="checkout-4.html"><i class="fa fa-money  "> </i><span>Payment</span> </a></li>
            <li><a href="checkout-5.html"><i class="fa fa-check-square "> </i><span>Order</span></a>
            </li>
          </ul>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="my-account">
            <p>TO ADD A NEW ADDRESS, PLEASE FILL OUT THE FORM BELOW.</p>
          </div>
        </div>
      </div>


      {!! Form::open(array('route' => 'shippingAdd', 'method' => 'POST'))  !!}
        <div class="row mb-4">
          <div class="col-lg-12">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Select Address</label>
              <select class="form-control" name ="addressSelect">
                <option value="0">Select one address</option>
                @foreach ($datas as $data)
                  <option value="{{$data->id}}">{{$data->addressName}}</option>
                @endforeach
              </select>
            </div>
            <div class="text-center">
           <h5> OR </h5>
           <hr class="colored">
         </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}">
            <div class="form-group required">
              <label for="InputName">First Name <sup>*</sup> </label>
              <input type="text" class="form-control" name ="fname" placeholder="First Name">
            </div>
            <div class="form-group required">
              <label for="InputLastName">Last Name <sup>*</sup> </label>
              <input type="text" class="form-control" name ="lname" placeholder="Last Name">
            </div>
            <div class="form-group">
              <label for="InputCompany">Company</label>
              <input type="text" class="form-control" id="comapny" placeholder="Company">
            </div>
            <div class="form-group required">
              <label for="InputAddress">Address <sup>*</sup> </label>
              <input type="text" class="form-control" name ="line1" placeholder="Address">
            </div>
            <div class="form-group">
              <label for="InputAddress2">Address (Line 2) </label>
              <input type="text" class="form-control" id="line2" placeholder="Address">
            </div>
            <div class="form-group required">
              <label for="InputCity">City <sup>*</sup> </label>
              <input type="text" class="form-control" name ="city" placeholder="City">
            </div>
            <div class="form-group required">
              <label>Contact Number <sup>*</sup></label>
              <input type="text" class="form-control" name ="contact" placeholder="xxxx-xxxxxxx">
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="form-group">
              <label for="InputAdditionalInformation">Additional information </label>
              <textarea rows="3" cols="26" name="extraInfo" class="form-control"></textarea>
            </div>
            <div class="form-group required">
              <label for="InputAddressTitle">Please assign an address title for future reference.  <sup>*</sup> </label>
              <input type="text" class="form-control" name="addressName" placeholder="My Address">
            </div>
          </div>
          <div class="col-lg-4">
            <!-- checkout card -->
            <div class="card">
              <div class="card-body">
                <div class="row table-responsive">
                  <table class="table">
                    <tr>
                      <td>Total Price</td>
                      <td style="font-weight:700;">BDT {{session('total')}}</td>
                    </tr>
                    <tr>
                      <td>Shipping</td>
                      <td style="font-weight:700; color:grey;">Free Shipping</td>
                    </tr>
                    <tr>
                      <td>Total</td>
                      <td style="color:rgb(244, 127, 32); font-weight:800;">BDT {{session('totalall')}}</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <!-- End of Checkout card -->
          </div>

        </div>
        <div class="row mb-5">
          <div class="col-lg-12 ">
            <ul class="pager">
              <li class="previous pull-left"><a href="{{route('check1')}}"> <i class="fa fa-arrow-left"></i> Address</a></li>
              <li class="next pull-right"> <button type="submit" class="btn btn-primary btn-proceed" name="payment">Payment <i class="fa fa-arrow-right"></i></button></li>
            </ul>
          </div>
        </div>
        {!! Form::close() !!}

    </div>
  </section>
@endsection

@push('scripts')

@endpush
