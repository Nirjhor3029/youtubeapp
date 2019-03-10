@extends('layouts.app')

@push('css')
<link href="{{asset('css/account.css')}}" rel="stylesheet" type="text/css">
@endpush

@section('content')
  <header class="pagehead" style="background-image:  url('{{asset('img/backgrounds/bg-footer.jpg')}}')">
    <div class="container">
      <div class="row">
        <div class="col-12 my-auto text-center text-white">
          <img class="pagehead-img img-responsive mb-3" src="{{asset('img/ayojok-logo-transparent.png')}}" alt="">
        </div>
      </div>
    </div>
  </header>
  <!-- FB Profile Style -->

  <!-- Blank section -->

  <section class="page-section mt-3 mb-5">
    <div class="container">

      <div class="col-lg-12 row">
        <ul class="breadcrumb">
          <li><a href="{{route('mainhome')}}">Home</a></li>
          <li><a href="{{route('my-account')}}">My Account</a></li>
          <li class="active"> Personal Information</li>
        </ul>
      </div>

      <div class="wow fadeIn mt-4">
        <h3><i class="fa fa-user fa-lg" style="margin-right:1rem;"></i>  My Personal Information</h3>
      </div>
      <div class="mt-4">
        <div class="my-account">
          <p>PLEASE BE SURE TO UPDATE YOUR PERSONAL INFORMATION IF IT HAS CHANGED.</p>
        </div>
        <p class="required"><sup>*</sup> Required field</p>
      </div>

      <div class="col-lg-12 row">
        <div class="col-lg-6">
        {!! Form::model($users, ['method' => 'PATCH', 'route' => ['personal-info.update', $users->id]]) !!}
            <div class="form-group required">
              <label for="InputName">First Name <sup>*</sup> </label>
              {{-- <input required type="text" class="form-control" placeholder="First Name"> --}}
              {!! Form::text('fname', null, array('class' =>'form-control required', 'placeholder' => 'First Name')) !!}
            </div>
            <div class="form-group required">
              <label for="InputLastName">Last Name <sup>*</sup> </label>
              {{-- <input required type="text" class="form-control" placeholder="Last Name"> --}}
              {!! Form::text('lname', null, array('class' =>'form-control required', 'placeholder' => 'Last Name')) !!}
            </div>
            <div class="form-group">
              <label for="InputEmail"> Email </label>
              {{-- <input type="email" class="form-control" placeholder="gtanim@gmail.com"> --}}
              {!! Form::text('email', null, array('class' =>'form-control required', 'placeholder' => 'Your Email')) !!}
            </div>
            <div class="form-group">
              <label>Contact Number</label>
              {{-- <input required type="email" class="form-control" placeholder="xxxx-xxxxxxx"> --}}
              {!! Form::text('contact', null, array('class' =>'form-control required', 'placeholder' => 'Your Contact Number')) !!}
            </div>
            <div class="form-group">
              <label for="InputPasswordnew"> New Password </label>
              {{-- <input type="password" name="InputPasswordnew" class="form-control"> --}}
              {!! Form::password('password', array('class' =>'form-control required', 'placeholder' => 'Your New Password')) !!}
            </div>
            <div class="form-group">
              <label for="InputEmail"> Address </label>
              {{-- <input type="email" class="form-control" placeholder="gtanim@gmail.com"> --}}
              {!! Form::textarea('address', null, array('class' =>'form-control required', 'placeholder' => 'Your Address')) !!}
            </div>

            <button type="submit" class="btn btn-success" style="background-color:#f47f20; border-color:#f47f20;"><i class="fa fa-save"></i> &nbsp; Save</button>

          {!! Form::close() !!}
        </div>
        <div class="col-lg-6 user-info">

          <div class="card">
            <div class="card-header text-center">
              <h5>Your Information</h5>
            </div>
            <div class="card-body">
              <table style="width:100%">
                <tr>
                  <th colspan="6">Name</th>
                  <td colspan="6">{{$users->fname}} {{$users->lname}} ({{$users->name}})</td>
                </tr>
                <tr>
                  <th colspan="6">Email</th>
                  <td colspan="6">{{$users->email}}</td>
                </tr>
                <tr>
                  <th colspan="6">Contact Number</th>
                  <td colspan="6">{{$users->contact}}</td>
                </tr>
                <tr>
                  <th colspan="6">Address</th>
                  <td colspan="6">{{$users->address}}</td>
                </tr>
              </table>
            </div>
          </div>

        </div>
      </div>


      <ul class="pager">
        <li class="previous pull-left"><a href="{{route('my-account')}}"> &larr; Back to My Account </a></li>
        <li class="next pull-right"><a href="{{route('mainhome')}}"> <i class="fa fa-home"></i> Go to Home</a></li>
      </ul>




    </div>
  </section>
@endsection

@push('scripts')

@endpush
