@extends('layouts.app')
<link href="{{asset('css/account.css')}}" rel="stylesheet" type="text/css">
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
  <!-- FB Profile Style -->

  <!-- Blank section -->

  <section class="page-section">
    <div class="container">

      <div class="row">
        <div class="col-lg-12">
          <ul class="breadcrumb">
            <li><a href="{{route('mainhome')}}">Home</a></li>
            <li><a href="{{route('my-account')}}">My Account</a></li>
            <li class="active"> Add Your Addresses</li>
          </ul>
        </div>
      </div>

    </div>
  </section>

  <section class="page-section mb-4">
    <div class="container">

      <div class="row">
        <div class="col-lg-12">
          <div class="wow fadeIn">
            <h3><i class="fa fa-map-marker fa-lg" style="margin-right:1rem;"></i>  Add Your Addresses</h3>
          </div>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-lg-12">
          <div class="my-account">
            <p>TO ADD A NEW ADDRESS, PLEASE FILL OUT THE FORM BELOW.</p>
          </div>
        </div>
      </div>



    {!! Form::model($address, ['method' => 'PATCH', 'route' => ['address.update', $address->id]]) !!}
    <div class="col-lg-12 row">
        <div class="col-lg-6">
          <p class="required"><sup>*</sup> Required field</p>
          {{-- <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}"> --}}
          <div class="form-group required">
            <label for="InputName">First Name <sup>*</sup> </label>
            {!! Form::text('fname', null, array('class' =>'form-control required', 'placeholder' => 'First Name')) !!}
          </div>
          <div class="form-group required">
            <label for="InputLastName">Last Name <sup>*</sup> </label>
          {!! Form::text('lname', null, array('class' =>'form-control required', 'placeholder' => 'Last Name')) !!}
          </div>
          <div class="form-group">
            <label for="InputCompany">Company/Organiztion</label>
            {!! Form::text('company', null, array('class' =>'form-control', 'placeholder' => 'Company/Organization')) !!}
          </div>
          <div class="form-group required">
            <label for="InputAddress">Address <sup>*</sup> </label>
            {!! Form::text('line1', null, array('class' =>'form-control required', 'placeholder' => 'Address')) !!}
          </div>
          <div class="form-group">
            <label for="InputAddress2">Address (Line 2) </label>
            {!! Form::text('line2', null, array('class' =>'form-control', 'placeholder' => 'Address (Line 2)')) !!}
          </div>
          <div class="form-group required">
            <label for="InputCity">City <sup>*</sup> </label>
            {!! Form::text('city', null, array('class' =>'form-control required', 'placeholder' => 'City')) !!}
          </div>
          <div class="form-group required">
            <label>Contact Number <sup>*</sup></label>
            {!! Form::text('contact', null, array('class' =>'form-control required', 'placeholder' => 'Your Contact Number')) !!}
          </div>
        </div>
        <div class="col-lg-6 mt-4 mb-4">
          <div class="form-group">
            <label for="InputAdditionalInformation">Additional information </label>
            {{-- <textarea rows="3" cols="26" name="extraInfo" class="form-control"></textarea> --}}
            {!! Form::textarea('extraInfo', null, ['class' =>'form-control'],['size' => '26x3'],['placeholder' => 'Address']) !!}
          </div>
          <div class="form-group required">
            <label for="InputAddressTitle">Please assign an address title for future reference.  <sup>*</sup> </label>
            {!! Form::text('addressName', null, array('class' =>'form-control required', 'placeholder' => 'Name of Address')) !!}
          </div>
        </div>
      <button type="submit" class="btn btn-success mt-4" style="background-color:#f47f20; border-color:#f47f20;"><i class="fa fa-map-marker"></i>&nbsp; Save Address</button>
    </div>

{!! Form::close() !!}

      <div class="row mb-5">
        <div class="col-lg-12 ">
          <ul class="pager">
            <li class="previous pull-left"><a href="{{route('address.index')}}"> &larr; Back </a></li>
            <li class="next pull-right"><a href="{{route('my-account')}}"> <i class="fa fa-home"></i> My Account</a></li>
          </ul>
        </div>
      </div>


    </div>
  </section>
@endsection

@push('scripts')

@endpush
