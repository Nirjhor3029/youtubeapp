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
            <li class="active"> My Addresses</li>
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
        <h3><i class="fa fa-map-marker fa-lg" style="margin-right:1rem;"></i>  My Addresses</h3>
      </div>

        <p>Please configure your default billing and delivery addresses when placing an order. You may also add additional addresses, which can be useful for sending gifts or receiving an order at your office.</p>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="my-account">
        <p>YOUR ADDRESSES ARE LISTED BELOW.</p>
      </div>
      <div class="row">

        @if (count($addresses) == 0)
          <h4 style="padding:25px;">No Address Added Yet</h4>
        @else
          @foreach ($addresses as $address)
            <div class="col-lg-4 my-address">
              <div class="card">
                <div class="card-header text-center">
                  <h6>{{$address->addressName}}</h6>
                </div>
                <div class="card-body">
                  <ul>
                    <li><strong>{{$address->fname}} {{$address->lname}}</strong></li>
                    <li><p>{{$address->line1}} {{$address->line2}}</p></li>
                    <li><strong>Number</strong> : {{$address->contact}} </li>
                    <li><strong>Email</strong> : {{$address->user->email}} </li>
                  </ul>
                </div>
                <div class="card-footer">
                  <a href="{{route('address.edit',$address->id)}}" class="btn btn-sm btn-success"> <i class="fa fa-edit"> </i> Edit </a>
                  {!! Form::open(['method' => 'DELETE','route'=> ['address.destroy', $address->id], 'style' => 'display:inline']) !!}
                  {!! Form::button('<i class="fa fa-minus-circle"></i> Delete',['class'=> 'btn btn-sm btn-danger','type' => 'submit']) !!}
                  {!! Form::close()!!}
                </div>
              </div>
            </div>
          @endforeach

        @endif

    </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <a class="btn add-addressbtn" href="{{route('address.create')}}"><i class="fa fa-plus-circle"></i> Add New Address </a>
    </div>
  </div>

  <div class="row mb-5">
    <div class="col-lg-12 ">
      <ul class="pager">
        <li class="previous pull-left"><a href="{{route('my-account')}}"> &larr; Back to My Account </a></li>
        <li class="next pull-right"><a href="{{route('mainhome')}}"> <i class="fa fa-home"></i> Go to Home</a></li>
      </ul>
    </div>
  </div>


    </div>
  </section>
@endsection

@push('scripts')

@endpush
