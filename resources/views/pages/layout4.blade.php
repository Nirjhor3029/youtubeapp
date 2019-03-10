@extends('layouts.app')

@push('css')

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
  <!-- End of Mast Head -->


  <!-- Kazi Details -->
  <section class="mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 text-center mb-3">
          <div class="avatar">
            <img alt="" src="{{asset($datas->logo)}}">
          </div>
        </div>
        <div class="col-lg-5 mb-2">
          <h3>{{$datas->title}} <small> | About him</small></h3>
          <div id="summary" >
            <p style="text-align:justify; padding:0;">
                @php
                  if (empty($datas->about_us)) {
                    echo $about_us = $datas->title .'has been in the event industry for a long time. They have been providing quality products and services with many positive reviews from satisfied customers. Their experience in the industry and professionalism is what sets them apart and makes them a top service provider in their respective category.';
                  }else{
                    echo $datas->about_us;
                  }
                @endphp
            </p>
          </div>
            <div id="ajax-alert"></div>
        </div>
        <div class="col-lg-4 price-snippet">
          <div class="startingprice">
            <p class="price">Starting at :</p>

            <table style="width:100%">
              <tr>
                <th>Minimum Price</th>
                <td>BDT {{$datas->starting_at}}</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="col-lg-1 text-center">
          <button type="button" name="button" class="btn" style="background-color:#f2f2f2" onclick="event.preventDefault();document.getElementById('wishlist').submit();"><img src="{{asset('img/icons/ayojok_bookmark.png')}}" alt="" style="width:6rem;" class="btn pull-right" data-toggle="tooltip" data-placement="top" title="Add to wish list"></button>
          <form id="wishlist" action="{{route('wishlist.store')}}" method="post">
                        {{csrf_field()}}
                        @if (Auth::check())
                          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        @endif
                        <input type="hidden" name="catagory_id" value="{{$datas->catagory_id}}">
                        <input type="hidden" name="vendor_id" value="{{$datas->id}}">
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- End of Kazi Details-->

  <!-- Parallax section with all the other feature -->
  <section class="page-section pricing mt-3 mb-3" style="background-image: url({{asset($catagorydata->layout_img)}});">
    <div class="container wow fadeIn mt-5 mb-5">
      <div class="row text-center">
        <div class="col-xs-6 col-lg-3 mt-5">
          <a href="#">
            <img src="{{asset($features->feature1_img)}}" class="subservice" alt="">
          </a>
          <p class="vendor-point-title">{{$features->feature1_title}}</p>
          <p class="vendor-point-subtitle">{{$fdetails->feature_2}}</p>
        </div>
        <div class="col-xs-6 col-lg-3 mt-5">
          <a href="#">
            <img src="{{asset($features->feature2_img)}}" class="subservice" alt="">
          </a>
          <p class="vendor-point-title">{{$features->feature2_title}}</p>
          <p class="vendor-point-subtitle">{{$fdetails->feature_1}}</p>
        </div>
        <div class="col-xs-6 col-lg-3 mt-5">
          <a href="#">
            <img src="{{asset($features->feature3_img)}}" class="subservice" alt="">
          </a>
          <p class="vendor-point-title">{{$features->feature3_title}}</p>
          <p class="vendor-point-subtitle">{{$fdetails->feature_3}}</p>
        </div>
        <div class="col-xs-6 col-lg-3 mt-5">
          <a href="#">
            <img src="{{asset($features->feature4_img)}}" class="subservice" alt="">
          </a>
          <p class="vendor-point-title">{{$features->feature4_title}}</p>
          <p class="vendor-point-subtitle">{{$fdetails->feature_4}}</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Common Content -->
  <section class="page-section">
    <div class="container">
      <div class="row">

        {{-- Procedure Details --}}
        <div class="col-lg-8">
          <div class="text-center wow fadeIn">
            <h3>Procedure</h3>
            <hr class="colored">
          </div>
          <div class="row">
            <p>There are some government rule regarding wedding process. Government Charge 1250tk on 100000 tk Denmohor. But after 40000 tk this charge will be 100 tk.</p>
            <table style="width:100%; font-size:18px;line-height:1.5;" class="table table-bordered text-center">
              <thead>
                <tr>
                  <th>Denmohot Amount</th>
                  <th>Government fee</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>100000 Taka</td>
                  <td>1250 Taka</td>
                </tr>
                <tr>
                  <td>200000 Taka</td>
                  <td>2500 Taka</td>
                </tr>
                <tr>
                  <td>300000 Taka</td>
                  <td>3750 Taka</td>
                </tr>
                <tr>
                  <td>400000 Taka</td>
                  <td>5000 Taka</td>
                </tr>
                <tr>
                  <td>500000 Taka</td>
                  <td>5100 Taka (After 400000 taka denmohor per lack fee will be 100 taka)</td>
                </tr>
              </tbody>
            </table>
          </div>
          <br>
          <p>Kazi collect those tk on behalf of government. They will send this money to government. Usually they don’t have any price rate. If client wants to give him some money happily they will took that.</p>
        </div>
        {{-- End of Procedure data --}}

        {{-- Booking form --}}
        <div class="col-lg-4">
          {{-- Leave Your Query --}}
          <div class="form-area">
          <form role="form" id="queryForm">
            <input type="hidden" id="catagory_id" value="{{$catagorydata->name}}">
            <input type="hidden" id="vendor_id" value="{{$datas->id}}">
            <h5 style="margin-top: 5px; text-align: center; color:white;">Booking Query</h5>
            <p class="text-center" style="font-size:0.8rem;font-weight:500;padding:0;">Please leave your details and let us take care of the rest</p>
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
            <div class="form-group">
              <textarea class="form-control" type="textarea" id="message" placeholder="Details of your requirments" maxlength="250" rows="4"></textarea>
              <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>
            </div>
            <div align="center">
              <button type="button" id="submit" name="submit" class="btn btn-primary">Send for query & Get a Call</button>
            </div>
          </form>
        </div>
        {{-- Leave Your Number --}}
        {{-- @if (\Session::has('success'))
          <div id="success" class="text-center">
            <p>{!! \Session::get('success') !!}</p>
          </div>
        @else
          <button type="button" class="btn btn-secondary col-md-12" id="leaveNum">Leave A Number</button>
          <div id="leavePhone" style="display:none">
            {!! Form::open(['route'=>'savePhone', 'method' => 'post']) !!}
            <input type="hidden" name="catagory_id" value="{{$catagorydata->id}}">
            <input type="hidden" name="vendor_id" value="{{$datas->id}}">
            <input type="text" name="phone" value="" class="phoneNum" placeholder="Leave your number">
            {!! Form::button('<span class="fa fa-check"></span>', ['type'=>'submit','class' => 'btn btn-secondary levphn']) !!}
            {!! Form::close() !!}
          </div>
        @endif --}}
          <div class="row ">
            <div id="ajax-alert" class="col-lg-12"></div>
          </div>
        </div>
        {{-- End of Booking Form --}}
      </div>
    </section>
    <!-- End Image Gallery -->

    <!-- Review Rating -->
    <section class="page-section">
      <div class="container">
        <div class="text-center wow fadeIn">
          <h3>Your Opinion</h3>
          <hr class="colored">
        </div>

        <div class="row mt-5">
          <!-- Rating Avarage -->
          <div class="col-lg-6" id="review-bar">
            <div class="card">
              <div class="card-body">
                <div class="row">

                  <div class="col-lg-4 text-center">
                    <h1 class="rating-num">{{$opinion->avgtotal}}</h1>
                    <div class="rating">
                      {{-- <span class="fa fa-star-o"></span>
                      <span class="fa fa-star-o"></span>
                      <span class="fa fa-star-o"></span>
                      <span class="fa fa-star-o"></span>
                      <span class="fa fa-star-o"></span> --}}
                      @foreach(range(1,5) as $i)
                        @if($opinion->avgtotal >0)
                          @if ($opinion->avgtotal >0.5)
                            <span class="fa fa-star"></span>
                          @else
                            <span class="fa fa-star-half-o"></span>
                          @endif
                        @else
                          <span class="fa fa-star-o"></span>
                        @endif
                        @php $opinion->avgtotal--; @endphp
                      </span>
                    @endforeach
                  </div>
                  <div class="rating-total">
                    <span class="fa fa-user"></span> {{$opinion->total}} total
                  </div>
                </div>

                <div class="col-lg-8">
                  <div class="row rating-desc">
                    <div class="col-lg-3 text-right progress-data">
                      <span class="fa fa-star"></span>5
                    </div>
                    <div class="col-lg-9 mb-2">
                      <div class="progress progress-striped">
                        <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: {{$opinion->rate5}}%">
                          <span class="sr-only">{{$opinion->rate5}}0%</span>
                        </div>
                      </div>
                    </div>
                    <!-- end 5 -->
                    <div class="col-lg-3 text-right progress-data">
                      <span class="fa fa-star"></span>4
                    </div>
                    <div class="col-lg-9 mb-2">
                      <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: {{$opinion->rate4}}%">
                          <span class="sr-only">{{$opinion->rate4}}%</span>
                        </div>
                      </div>
                    </div>
                    <!-- end 4 -->
                    <div class="col-lg-3 text-right progress-data">
                      <span class="fa fa-star"></span>3
                    </div>
                    <div class="col-lg-9 mb-2">
                      <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: {{$opinion->rate3}}%">
                          <span class="sr-only">{{$opinion->rate3}}%</span>
                        </div>
                      </div>
                    </div>
                    <!-- end 3 -->
                    <div class="col-lg-3 text-right progress-data">
                      <span class="fa fa-star"></span>2
                    </div>
                    <div class="col-lg-9 mb-2">
                      <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: {{$opinion->rate2}}%">
                          <span class="sr-only">{{$opinion->rate2}}%</span>
                        </div>
                      </div>
                    </div>
                    <!-- end 2 -->
                    <div class="col-lg-3 text-right progress-data">
                      <span class="fa fa-star"></span>1
                    </div>
                    <div class="col-lg-9 mb-2">
                      <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: {{$opinion->rate1}}%">
                          <span class="sr-only">{{$opinion->rate1}}%</span>
                        </div>
                      </div>
                    </div>
                    <!-- end 1 -->
                  </div>
                  <!-- end row -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Rating Avarage -->
          <!-- Rating Bar with Rating -->
          <div class="col-lg-6" id="review-box">
            <!-- Review Section -->
            <div class="card review" >
              <div class="card-body">
                <div class="text-right">
                  <div style="color:#ffffff;float:left;font-size:1.2em; font-weight:400;padding:10px;" id="review-title">Your opinion matters</div>
                  @auth
                    <a class="btn btn-primary review" href="#reviews-anchor" id="open-review-box">Leave a Review</a>
                  @endauth
                  @guest
                    <a class="btn btn-primary review" href="#myModal" data-target="#myModal" data-toggle="modal">Login to leave a review</a>
                  @endguest
                </div>

                <div class="row" id="post-review-box" style="display:none;">
                  <div class="col-md-12">
                    <form accept-charset="UTF-8" action="{{route('rating')}}" method="post" id="review-form">
                      {{ csrf_field() }}
                      <input type="hidden" name="vendor_id" value="{{$datas->id}}">
                      <input id="ratings-hidden" name="rating" type="hidden" required>
                      <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Enter your review here..." rows="5"></textarea>

                      <div class="text-right mt-3">
                        <div class="stars starrr" data-rating="0"></div>
                        <a class="btn btn-danger btn-sm review" href="#" id="close-review-box" style="display:none; margin-right: 10px;"><span class="fa fa-remove"></span>Cancel</a>
                        <button class="btn btn-success btn-sm review" type="submit">Save</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Review Section -->
          </div>
          <!-- End Rating Bar with Rating -->
        </div>
        <!-- /end of row-->

        <!-- Reviews Row -->
        <div class="row mt-4">

          <div id="owl-demo" class="owl-carousel owl-theme" style="display: none;">
            @foreach ($reviews as $review)
              <div class="item old-review">

                <div class="card">
                  <div class="card-body">
                    <p class="old-review-title">{{$review->user->name or ""}}</p>
                    <div class="rating">
                      @for ($i=0; $i < $review->rating; $i++)
                        <span class="fa fa-star"></span>
                      @endfor
                    </div>
                    <p id="review-body">{{$review->comment}}</p>
                  </div>
                </div>

              </div>
            @endforeach

          </div>
        </div>
        <!-- /end of Reviews Row -->
</div>

</section>
<!-- /End Review Rating -->

<!-- Suggested Product-->
{{-- <section class="page-section">
<div class="container">
<div class="text-center wow fadeIn">
<h3>You May Also Like</h3>
<hr class="colored">
</div>

<div class="row mt-2">
<div class="col-lg-12">
<div class="row related-product">
<div class="col-md-4">
<div class="thumbnail">
<img src="http://placehold.it/350x222" alt="">
<div class="caption">
<h4><a href="#">First Product</a></h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur scelerisque, neque sodales pellentesque tempus</p>
</div>
<div class="ratings">
<p class="pull-right">15 reviews</p>
<p>
<span class="fa fa-star-o"></span>
<span class="fa fa-star-o"></span>
<span class="fa fa-star-o"></span>
<span class="fa fa-star-o"></span>
<span class="fa fa-star-o"></span>
</p>
</div>
</div>
</div>
<div class="col-md-4">
<div class="thumbnail">
<img src="http://placehold.it/350x222" alt="">
<div class="caption">
<h4><a href="#">First Product</a></h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur scelerisque, neque sodales pellentesque tempus</p>
</div>
<div class="ratings">
<p class="pull-right">15 reviews</p>
<p>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star-o"></span>
</p>
</div>
</div>
</div>
<div class="col-md-4">
<div class="thumbnail">
<img src="http://placehold.it/350x222" alt="">
<div class="caption">
<h4><a href="#">First Product</a></h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur scelerisque, neque sodales pellentesque tempus</p>
</div>
<div class="ratings">
<p class="pull-right">15 reviews</p>
<p>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

</section> --}}
<!-- / End Suggested Product-->
@include('extra.query-step')

@endsection

@push('scripts')
  <script src="{{asset('js/review.js')}}"></script>
  <script type="text/javascript">
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  $('#submit').click(function(e){
    e.preventDefault();
    var catagory = $('#catagory_id').val();
    var vendor = $('#vendor_id').val();
    var date = $('#date').val();
    var mess = $('#message').val();
    var num = $('#phn').val();
    // alert(catagory + ',' + vendor + ',' + date + ',' + time + ',' + pack + ',' + mess);
    $.ajax({
      type: 'POST',
      url:  '/vendors/'+ catagory +'/'+ vendor,
      data: {
        catagory : catagory,
        vendor   : vendor,
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
        }else{
          $("#queryForm")[0].reset();
          $('#ajax-alert').html('<div class="alert alert-danger mt-3" >' + response.flash_messages + '</div>');
        }
      },
      statusCode: {
        422: function() {
          $('#ajax-alert').html('<div class="alert alert-danger alert-dismissible mt-3 fade show"> <button type="button" class="close" data-dismiss="alert">&times;</button> Date and Number is required</div>');
        },
                401: function(data) {
                    $("#myModal").modal('show');
                },
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
  $("#time").datetimepicker({
    autoclose: 1,
    startView: 1,
    minView: 1,
    maxView: 1,
    format:'HH:00 P',
    showMeridian: true
  });
  var owl = $("#owl-demo");

  owl.owlCarousel({
    items : 3, //10 items above 1000px browser width
    autoPlay:2000,
    pagination : true,
    itemsDesktop : [1000,4], //5 items between 1000px and 901px
    itemsDesktopSmall : [900,2], // betweem 900px and 601px
    itemsTablet: [600,1],
    stopOnHover: true, //2 items between 600 and 0
    itemsMobile : true // itemsMobile disabled - inherit from itemsTablet option
  });

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
    $('div.alert').delay(2000).slideUp(900);
    $("#leaveNum").click(function() {
      $("#leaveNum").hide();
      $('#leavePhone').show();
    });
</script>

@endpush
