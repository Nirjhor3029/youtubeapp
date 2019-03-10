@extends('layouts.app')

@push('css')
  <link href="{{asset('css/single-product.css')}}" rel="stylesheet" type="text/css">
@endpush

@section('content')

  <!-- Masthead -->
  <header class="pagehead" style="background-image: url({{asset('img/backgrounds/bg-footer.jpg')}});">
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

  <section class="page-section services mt-4">
    <div class="container">


      <!-- Single-Product Start -->
      <div class="container-fliud">
        <div class="wrapper row">
          {{-- Images --}}
          <div class="col-lg-6 mb-3">
            @if (empty($singleproduct->images->count() > 0))
              <div><img src="http://placehold.it/600x600&text=No+Image+found" /></div>
            @else
              <div id="myCarousel" class="carousel slide service-carousel" data-ride="carousel">
                <div class="carousel-inner">
                  @foreach ($singleproduct->images as $image)
                    <div class="carousel-item">
                      <img class="d-block w-100" src="{{asset($image->img_location)}}" alt="{{$singleproduct->title}}" id="{{$image->id}}">
                    </div>
                  @endforeach
                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
                <ul class="carousel-indicators">
                  @php
                  $i = 0;
                  @endphp
                  @foreach ($singleproduct->images as $image)
                    <li data-target="#myCarousel" data-slide-to="{{$i}}" class="active"><img src="{{asset($image->img_location)}}" alt="{{$singleproduct->title}}"></li>
                    @php
                      $i++;
                    @endphp
                  @endforeach
                </ul>
              </div>
            @endif
          </div>


          {{-- Form To Add Service --}}
          <div class="details col-lg-6">
            <h3 class="product-title">{{$singleproduct->title}}</h3>
            <p class="product-description">{{$singleproduct->short_des}}</p>

            <h4 class="price">Price: <span id="price" value="">BDT {{$singleproduct->price}}</span> <small>{{$singleproduct->suffix}}</small></h4>


            <div class="col-lg-8 mt-3" style="padding:0px;">
              <div class="form-area">
              <h5 style="margin-top: 5px; text-align: center; color:white;">Booking Query</h5>
              <p style="font-size:0.8rem;font-weight:500;">Please leave your details and let us take care of the rest</p>
              <form role="form" id="queryForm">
                {{csrf_field()}}
                {{-- Hidden Input --}}
                <input type="hidden" id="catagory_id" value="{{$singleproduct->catagory_id}}">
                <input type="hidden" id="product_id" value="{{$singleproduct->id}}">

                {{-- Date and Time --}}
                <div class="form-group">
                  <input type="text" class="form-control" id="date" name="date" placeholder="Date" required readonly>
                </div>

                <div class="form-group">
                    @guest
                      <input type="text" class="form-control" name="phn" placeholder="Mobile Number" required readonly>
                    @endguest
                    @auth
                      <input type="text" class="form-control" name="phn" id="phn" placeholder="Mobile Number" required value="{{Auth::user()->contact}}">
                    @endauth
                </div>

                {{-- Extra Message --}}
                <div class="form-group">
                  <textarea class="form-control" type="textarea" id="message" placeholder="Extra Messages to clarify your need" maxlength="250" rows="3"></textarea>
                  <span class="help-text"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>
                </div>

              </form>

              <div class="action">
                <button type="button" id="submit" class="btn btn-primary">Send for query & Get a Call</button>
                <button type="button" id="wishlistbtn" class="btn btn-primary wish-list" onclick="event.preventDefault();document.getElementById('wishlist').submit();"><i class="fa fa-heart"></i></button>
              </div>

              <form id="wishlist" action="{{route('wishlist.store')}}" method="post">
                {{csrf_field()}}
                @if (Auth::check())
                  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                @endif
                <input type="hidden" name="catagory_id" value="{{$singleproduct->catagory_id}}">
                <input type="hidden" name="product_id" value="{{$singleproduct->id}}">
              </form>
              </div>

              @if(Session::has('flash_message'))
                <div class="alert alert-success alert-dismissible mt-3" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <em> {!! session('flash_message') !!}</em>
                </div>
              @endif
              @if(Session::has('flash_messaged'))
                <div class="alert alert-danger alert-dismissible mt-3" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <em> {!! session('flash_messaged') !!}</em>
                </div>
              @endif
              {{-- Leave Your Number --}}
              {{-- @if (\Session::has('success'))
                <div id="success" class="text-center mt-3">
                  <p>{!! \Session::get('success') !!}</p>
                </div>
              @else

                <div class="mt-3">
                  <button type="button" class="btn btn-secondary col-md-12" id="leaveNum">Leave A Number</button>
                  <div id="leavePhone" style="display:none">
                    {!! Form::open(['route'=>'savePhone', 'method' => 'post']) !!}
                    <input type="hidden" name="catagory_id" value="{{$singleproduct->catagory_id}}">
                    <input type="hidden" name="products_id" value="{{$singleproduct->id}}">
                    <input type="text" name="phone" value="" class="phoneNum" placeholder="Leave your number">
                    {!! Form::button('<span class="fa fa-check"></span>', ['type'=>'submit','class' => 'btn btn-secondary levphn']) !!}
                    {!! Form::close() !!}
                  </div>
                </div>
              @endif --}}

              <div id="ajax-alert"></div>


    </div>
  </div>
</div>
<!-- End of Single-Product -->

<!-- Details And All -->
<div class="page-section row mt-4 mb-2">
  <div class="col-lg-12 product-detail">
    <div id="exTab2">
      <ul class="nav nav-tabs">
        <li class="active">
          <a  href="#1" data-toggle="tab">Description</a>
        </li>
        <li><a href="#2" data-toggle="tab">How to order</a>
        </li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane active" id="1">
          <p class="text-justify">
            {{$singleproduct->long_des}}
          </p>
        </div>
        <div class="tab-pane" id="2">
          <p>

              <ul>
                <li>Pick your service or product and select your preferred date and time. Proceed by clicking on “SEND FOR QUERY & GET A CALL”</li>
                <li>A message will be sent to your inbox regarding your query and our Ayojok team will contact you soon to discuss your order.</li>
                <li>After checking availability of your query, we will contact you again for confirmation.</li>
                <li>To confirm your booking, go to “My Query” under “My Account”.</li>
                <li>Final booking of your services will be placed once the payment has been done.</li>
                <li>Payment of your booking can be done in “Payment” under “My Account” via two methods- Cash on delivery and Bkash.</li>
                <li>After choosing a payment method, fill up the details of your address.</li>
                <li>You can check the status of all your booked services anytime under “My Vendor” tab.</li>
              </ul>

          </p>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- End of Details And All -->
</div>
</section>

{{-- Related Product --}}
{{-- <section class="page-section">
<div class="container text-center">
<div class="wow fadeIn">
<h3>You May Also Like</h3>
</div>
<hr class="colored">
<div class="row mt-2 mb-4">

<div class="col-lg-3 col-md-4 mb-4 shop-product">
<div class="card">
<a href="single-product.html"><img class="card-img-top" src="http://placehold.it/700x600" alt=""></a>
<div class="card-body body">
<h4 class="card-title">
<a href="single-product.html">Item One</a>
</h4>
<h5>BDT 24.99</h5>
<div class="shop-btn">
<a href="#" class="btn btn-primary btn-sm hidden-sm" data-toggle="tooltip" data-placement="bottom" title="Add to wish list"><i class="fa fa-heart fa-lg"></i></a>
</div>
</div>
</div>
</div>

<div class="col-lg-3 col-md-4 mb-4 shop-product">
<div class="card">
<a href="single-product.html"><img class="card-img-top" src="http://placehold.it/700x600" alt=""></a>
<div class="card-body body">
<h4 class="card-title">
<a href="single-product.html">Item One</a>
</h4>
<h5>BDT 24.99</h5>
<div class="shop-btn">
<a href="#" class="btn btn-primary btn-sm hidden-sm" data-toggle="tooltip" data-placement="bottom" title="Add to wish list"><i class="fa fa-heart fa-lg"></i></a>
</div>
</div>

</div>
</div>

<div class="col-lg-3 col-md-4 mb-4 shop-product">
<div class="card">
<a href="single-product.html"><img class="card-img-top" src="http://placehold.it/700x600" alt=""></a>
<div class="card-body body">
<h4 class="card-title">
<a href="single-product.html">Item One</a>
</h4>
<h5>BDT 24.99</h5>
<div class="shop-btn">

<a href="#" class="btn btn-primary btn-sm hidden-sm" data-toggle="tooltip" data-placement="bottom" title="Add to wish list"><i class="fa fa-heart fa-lg"></i></a>
</div>
</div>

</div>
</div>

<div class="col-lg-3 col-md-4 mb-4 shop-product">
<div class="card">
<a href="single-product.html"><img class="card-img-top" src="http://placehold.it/700x600" alt=""></a>
<div class="card-body body">
<h4 class="card-title">
<a href="single-product.html">Item One</a>
</h4>
<h5>BDT 24.99</h5>
<div class="shop-btn">
<a href="#" class="btn btn-primary btn-sm hidden-sm" data-toggle="tooltip" data-placement="bottom" title="Add to wish list"><i class="fa fa-heart fa-lg"></i></a>
</div>
</div>
</div>
</div>

</div>
</div>
</section> --}}
{{-- End of Related Product --}}
@include('extra.query-step')

@endsection

@push('scripts')
  <script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#submit').click(function(e){
    e.preventDefault();
    var catagory = $('#catagory_id').val();
    var product = $('#product_id').val();
    var date = $('#date').val();
    var mess = $('#message').val();
    var num = $('#phn').val();
    //alert(catagory + ',' + product + ',' + date + ',' + time + ','+ mess);
    $.ajax({
      type: 'POST',
      url:  '/services/'+ catagory +'/'+ product,
      data: {
        catagory_id : catagory,
        product_id   : product,
        date     : date,
        mess     : mess,
        num      : num
      },
      success:function(response){
        if (response.flash_message) {
          $("#inboxmess").text(response.totalinbox);
          $("#queryForm")[0].reset();
          $("#query-step").modal('show');
          $('#ajax-alert').html('<div class="alert alert-custom mt-3" >' + response.flash_message + '</div>');
        } else {
          $("#queryForm")[0].reset();
          $('#ajax-alert').html('<div class="alert alert-danger mt-3" >' + response.flash_messages + '</div>');
        }
      },
      statusCode: {
        500: function() {
          //
        },
        401: function(data) {
          $("#myModal").modal('show');
        },
      },
      fail:{

      },
    });
  });
  $("#date").datetimepicker({
    minView: 2,
    maxView: 2,
    weekStart: 1,
    autoclose: 1,
    todayHighlight: 1,
    format: 'dd-mm-yyyy'
  });

  // $("#time").datetimepicker({
  //   autoclose: 1,
  //   startView: 1,
  //   minView: 1,
  //   maxView: 1,
  //   format:'HH:00 P',
  //   showMeridian: true
  // });

  $('#characterLeft').text('250 characters left');
  $('#message').keydown(function () {
    var max = 250;
    var len = $(this).val().length;
    if (len >= max) {
      $('#characterLeft').text('You have reached the limit');
      $('#characterLeft').addClass('red');
      $('#btnSubmit').addClass('disabled');
    }
    else {
      var ch = max - len;
      $('#characterLeft').text(ch + ' characters left');
      $('#btnSubmit').removeClass('disabled');
      $('#characterLeft').removeClass('red');
    }
  });
  $('div.alert').delay(1500).slideUp(900);


  $('.carousel-inner .carousel-item:first').addClass('active');

  // $("#leaveNum").click(function() {
  //   $("#leaveNum").hide();
  //   $('#leavePhone').show();
  // });

  </script>

@endpush
