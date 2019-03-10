@extends('layouts.app')

@section('content')
        <!-- Masthead -->
<header class="masthead" style="background-image: url('img/backgrounds/Ayojok-UI-1_03.png');background-size: cover;">
  <!-- <div class="container h-100">
  <div class="row h-100">
  <div class="col-12 my-auto text-center text-white">
  <img class="masthead-img img-fluid mb-3" src="img/profile.png" alt="">
</div>
</div>
</div> -->
  <!-- {{-- <div class="scroll-down">
<a class="btn js-scroll-trigger" href="#values">
<i class="fa fa-angle-down fa-fw"></i>
</a>
</div> --}} -->
  <div>
    <div class="scroll-down">
      <div class="logos">
        <img class="logo" src="img/ayojok_v2.png">

        <p class="tagline" style="">Bangladesh's first & biggest event booking service</p>
      </div>
      {{ Form::open(['route'=>'find', 'method' => 'post'])}}
      <div style="text-align:center;" class="catagory input-group">
        <div class="col-lg-4 prefix">
          <span>I am looking for</span>
        </div>
        <div class="col-lg-7 search-cat">
          <select class="form-control" name="catagory">
            @foreach ($vendors as $vendor)
              <option value="{{$vendor->id}}"
                      style="text-transform: capitalize;">{{$vendor->name}}</option>
            @endforeach
            @foreach ($services as $service)
              <option value="{{$service->id}}"
                      style="text-transform: capitalize;">{{$service->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-lg-1 findbtn">
          {{ Form::button('Go',['class'=>'btn btn-search','type'=>'submit'])}}
        </div>
      </div>
      {{ Form::close() }}
      <div class="mobile_view abc">
        <div class="col-lg-4">
          <i class="fa fa-check" aria-hidden="true"></i>
          <span class="header-write">Find services</span>
        </div>
        <div class="col-lg-4">
          <i class="fa fa-check" aria-hidden="true"></i>
          <span class="header-write">Fast and Easy</span>
        </div>
        <div class="col-lg-4">
          <i class="fa fa-check" aria-hidden="true"></i>
          <span class="header-write">Zero Hassle</span>
        </div>
      </div>
    </div>

  </div>
</header>

<!-- /End FB Profile Style -->
<section class=" bg-white">
  <div class="container-fluid">

    <div class="row row pt-2 pb-3">

      <div class="col-lg-12 text-center">
        <div class="fb-profile-text" style="text-align:center;">
          <p class="fb-profile-text1">Ayojok brings wide selection of trusted event service providers for your
            desire budget and occasion.<br>
            Save time & money as you browse all kinds of event related services anywhere, anytime.</p>

          <p class="tag1">How it works? Simple, easy <span class="andSymbl">&</span> fast!</p>

          <div class="row scroll-down" style="text-allign:center;">
            <div class="col-lg-4">
              <div class="content_ico">

                <a href="https://www.ayojok.com/how-it-works">
                  <img class="icon1" src="{{asset('img/icons/mouse.png')}}">
                  <span class="how_it_works_icon">Choose services</span>
                </a>

              </div>

            </div>

            <div class="col-lg-4">

              <div class="content_ico2">
                <a href="https://www.ayojok.com/how-it-works">

                  <img class="icon" src="{{asset('img/icons/phone.png')}}">
                  <span class="how_it_works_icon">Get notified about availability</span>
                </a>

              </div>
            </div>
            <div class="col-lg-4">

              <div class="content_ico3">
                <a href="https://www.ayojok.com/how-it-works">

                  <img class="icon" src="{{asset('img/icons/calender_v2.png')}}">
                  <span class="how_it_works_icon">Confirm!</span>
                </a>

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- /End FB Profile Style -->

<!-- Values Section -->


<!-- Our Service -->
<section class="page-section pricing">
  <div class="container wow fadeIn mb-4">
    <div class="text-center wow fadeIn">
      <p style="color:black; font-size:26px;">Find services at every budget</p>

      <p style="color:black; font-size:18px;">Venues, catering, decoration, photographers & more</p>
    </div>
    <div class="row text-center justify-content-md-center">
      <div class="col-xs-6 col-lg-3">
        <div class="item">

          <a href="{{url('vendors/'.$catagory ='venue')}}">

            <div class="img-wrapper">
              <h4 class="fontOverImage">Venue</h4>
              <img src="{{asset('img/final/Venue.jpg')}}"
                   class="img-fluid mx-auto zoom" alt="">
            </div>
          </a>

        </div>

      </div>
      <div class="col-xs-6 col-lg-3">
        <div class="item">

          <a href="{{url('vendors/'.$catagory ='catering')}}">

            <div class="img-wrapper">
              <h4 class="fontOverImage">Catering</h4>
              <img src="{{asset('img/final/catering.jpg')}}"
                   class="img-fluid mx-auto zoom" alt="">
            </div>
          </a>
          <a href="{{url('vendors/'.$catagory ='photography & cinematography')}}"></a>
        </div>
      </div>
      <div class="col-xs-6 col-lg-3">
        <div class="item">

          <a href="{{url('vendors/'.$catagory ='photography and cinematography')}}">

            <div class="img-wrapper">
              <h4 class="fontOverImage">Photography</h4>
              <img src="{{asset('img/final/Photography.jpg')}}"
                   class="img-fluid mx-auto zoom" alt="">
            </div>
          </a>
        </div>
      </div>
      <div class="col-xs-6 col-lg-3">
        <div class="item">

          <a href="{{url('vendors/'.$catagory ='decoration')}}">

            <div class="img-wrapper">
              <h4 class="fontOverImage">Decoration</h4>
              <img src="{{asset('img/final/Decoration.jpg')}}"
                   class="img-fluid mx-auto zoom" alt="">
            </div>
          </a>
        </div>
      </div>
    </div>

    <!-- Sub Service Start-->
    <div class="row text-center mt-4">
      <div class="col-xs-6 col-lg-3">
        <div class="item">

          <a href="{{url('vendors/'.$catagory ='invitation cards')}}">

            <div class="img-wrapper">
              <h4 class="fontOverImage">Invitation Cards</h4>
              <img src="{{asset('img/final/invitation card.jpg')}}"
                   class="img-fluid mx-auto zoom" alt="">
            </div>
          </a>
        </div>
      </div>
      <div class="col-xs-6 col-lg-3">
        <div class="item">

          <a href="{{url('vendors/'.$catagory ='dj')}}">

            <div class="img-wrapper">
              <h4 class="fontOverImage">DJ</h4>
              <img src="{{asset('img/final/DJ.jpg')}}"
                   class="img-fluid mx-auto zoom" alt="">
            </div>
          </a>
        </div>
      </div>
      <div class="col-xs-6 col-lg-3">
        <div class="item">

          <a href="{{url('vendors/'.$catagory ='makeup artist')}}">

            <div class="img-wrapper">
              <h4 class="fontOverImage">Makeup Artist</h4>
              <img src="{{asset('img/final/Make UP.jpg')}}"
                   class="img-fluid mx-auto zoom" alt="">
            </div>
          </a>
        </div>
      </div>
      <div class="col-xs-6 col-lg-3">
        <div class="item">

          <a href="{{url('vendors/'.$catagory ='bakeries')}}">

            <div class="img-wrapper">
              <h4 class="fontOverImage">Bakeries</h4>
              <img src="{{asset('img/final/Bakeries.jpg')}}"
                   class="img-fluid mx-auto zoom" alt="">
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="row text-center mt-4">
      <div class="col-xs-6 col-lg-3">
        <div class="item">

          <a href="{{url('vendors/'.$catagory ='mehedi')}}">

            <div class="img-wrapper">
              <h4 class="fontOverImage">Mehedi</h4>
              <img src="{{asset('img/final/Mehedi.jpg')}}"
                   class="img-fluid mx-auto zoom" alt="">
            </div>
          </a>
        </div>
      </div>
      <div class="col-xs-6 col-lg-3">
        <div class="item">

          <a href="{{url('vendors/'.$catagory ='kazi')}}">

            <div class="img-wrapper">
              <h4 class="fontOverImage">Kazi</h4>
              <img src="{{asset('img/final/Kazi.jpg')}}"
                   class="img-fluid mx-auto zoom" alt="">
            </div>
          </a>
        </div>
      </div>


      {{--Services start--}}
      <div class="col-xs-6 col-lg-3">
        <div class="item">

          <a href="{{url('services/'.$catagory ='vehicle')}}">

            <div class="img-wrapper">
              <h4 class="fontOverImage">Vehicle</h4>
              <img src="{{asset('img/final/Vehicle.jpg')}}"
                   class="img-fluid mx-auto zoom" alt="">
            </div>
          </a>
        </div>
      </div>

      <div class="col-xs-6 col-lg-3">
        <div class="item">

          <a href="{{url('services/'.$catagory ='light & sound')}}">

            <div class="img-wrapper">
              <h4 class="fontOverImage">light & sound</h4>
              <img src="{{asset('img/final/Lighting.jpg')}}"
                   class="img-fluid mx-auto zoom " alt="">
            </div>
          </a>
        </div>
      </div>

    </div>



    <div class="row text-center justify-content-md-center mt-4" id="hidden_row" style="display: none">
      <div class="col-xs-6 col-lg-3">
        <div class="item">

          <a href="{{url('services/'.$catagory ='holud snacks')}}">

            <div class="img-wrapper">
              <h4 class="fontOverImage">Holud & Snacks</h4>
              <img src="{{asset('img/final/Holud Snacks.jpg')}}"
                   class="img-fluid mx-auto zoom" alt="">
            </div>
          </a>

        </div>

      </div>
      <div class="col-xs-6 col-lg-3">
        <div class="item">

          <a href="{{url('services/'.$catagory ='dala kula')}}">

            <div class="img-wrapper">
              <h4 class="fontOverImage">Dala Kula</h4>
              <img src="{{asset('img/final/Dala-Kula.jpg')}}"
                   class="img-fluid mx-auto zoom" alt="">
            </div>
          </a>
        </div>
      </div>

      <div class="col-xs-6 col-lg-3">
        <div class="item">

          <a href="{{url('services/'.$catagory ='holud')}}">

            <div class="img-wrapper">
              <h4 class="fontOverImage">Holud Accessories</h4>
              <img src="{{asset('img/final/Holud Accessories.jpg')}}"
                   class="img-fluid mx-auto zoom" alt="">
            </div>
          </a>
        </div>
      </div>
      <div class="col-xs-6 col-lg-3">
        <div class="item">

          <a href="{{url('services/'.$catagory ='wedding')}}">

            <div class="img-wrapper">
              <h4 class="fontOverImage">Wedding Accessories</h4>
              <img src="{{asset('img/final/Wedding Accessories.jpg')}}"
                   class="img-fluid mx-auto zoom" alt="">
            </div>
          </a>
        </div>
      </div>
    </div>


    <!-- ./Sub Service Ends-->
    {{--<center><a href="{{url('all_vendors')}}" class="btn btn-danger rounded btn-sm custom-btn mt-3"
               style="color: white;padding: 1% 5%;text-transform: none;background-color: #810D28">Load more</a>
    </center>--}}
            <center><a href="javascript:void(0);" class="btn btn-danger rounded btn-sm custom-btn" style="color: white;padding: 1% 5%;text-transform: none;background-color: #810d28" onclick="makeDisplayBlock()" id="btn_loadMore">Load more</a></center>


  </div>

</section>

<!-- Event Section -->
<!-- <section class="page-section bg-light">
    <div class="container text-center wow fadeIn mt-4 mb-4">
      <div class="row mt-4">
        <div class="col-lg-3 wow fadeIn event-sec" data-wow-delay=".2s">
          <a href="{{url('event-coordinator')}}">
            <div class="hovereffect" style="cursor: pointer;">
              <img class="img-responsive" src="img/service1.jpg" alt="">

              <div class="overlay">
                <h2>Checking</h2>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 wow fadeIn" data-wow-delay=".2s">
          <a href="{{url('event-coordinator')}}">
            <div class="hovereffect" style="cursor: pointer;">
              <img class="img-responsive" src="img/service2.jpg" alt="">
              <div class="overlay">
                <h2>Monitoring</h2>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 mb-3 wow fadeIn" data-wow-delay=".2s">

          <div class="event-dec">
            <div style="text-align:center;">
              <h2>Event </h2><h3>Coordinator</h3>
            </div>
            <ul class="servicelist list-group">
              <li class="list-group">Checking</li>
              <li class="list-group">Monitoring</li>
              <li class="list-group">Assuring</li>
            </ul>
          </div>

          <a href="{{url('event-coordinator')}}" class="btn btn-proceed mt-5">Learn More</a>

        </div>
        <div class="col-lg-3 wow fadeIn" data-wow-delay=".2s" >
          <a href="{{url('event-coordinator')}}">
            <div class="hovereffect" style="cursor: pointer;">
              <img class="img-responsive" src="img/service3.jpg" alt="">
              <div class="overlay">
                <h2>Assuring</h2>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section> -->

<!-- Hours Section - Repurposed from Pricing Table -->
<!-- <section class="page-section pricing" id="hours" style="background-image: url('img/backgrounds/bg-pricing.jpg')">
  <div class="container wow fadeIn mt-4 mb-4">
    <div class="text-center">
      <h2>Planning Tools</h2>
      <hr class="colored">
      <p>Plan your wedding the right way with our effective planning tools</p>
    </div>
    <div class="row"> -->
<!-- Pricing Table 1 -->
<!-- <div class="col-md-4">
          <div class="pricing-item">
            @if (Auth::check())
        <a href="{{route('mychecklist',Auth::user()->id)}}">
              <img src="img/planning-tools/my-checklist.png" style="width:25%;margin:3em;" alt="">
              <h4 class="mb-5">My Checklist</h4>
            </a>
            @else
        <a href="#myModal" data-toggle="modal">
          <img src="img/planning-tools/my-checklist.png" style="width:25%;margin:3em;" alt="">
          <h4 class="mb-5">My Checklist</h4>
        </a>
        @endif

        </div>
      </div> -->
<!-- Pricing Table 2 -->
<!-- <div class="col-md-4">
          <div class="pricing-item">
            @if (Auth::check())
        <a href="{{ route('myvendors', Auth::user()->id) }}">
              <img src="img/planning-tools/my-vendor.png" style="width:25%;margin:3em;" alt="">
              <h4 class="mb-5">My Vendors</h4>
            </a>
            @else
        <a href="#myModal" data-toggle="modal">
          <img src="img/planning-tools/my-vendor.png" style="width:25%;margin:3em;" alt="">
          <h4 class="mb-5">My Vendors</h4>
        </a>
        @endif
        </div>
      </div> -->
<!-- Pricing Table 3 -->
<!-- <div class="col-md-4">
          <div class="pricing-item">
            @if (Auth::check())
        <a href="{{route('mybudget')}}">
              <img src="img/planning-tools/budget-manager.png" style="width:25%;margin:3em;" alt="">
              <h4 class="mb-5">Budget Manager</h4>
            </a>
            @else
        <a href="#myModal" data-toggle="modal">
          <img src="img/planning-tools/budget-manager.png" style="width:25%;margin:3em;" alt="">
          <h4 class="mb-5">Budget Manager</h4>
        </a>
        @endif
        </div>
      </div>
    </div>
  </div>
</section> -->
<!-- plaaning tools new UI -->
<section class="page-section pricing" id="hours" style="background-color: white;color: #323232">


  <div class="container wow fadeIn mt-5 mb-5">

    <div class="row">


      <!-- Pricing Table 1 -->
      {{--
                  <div class="col-md-6">

                      <div class="pricing-item plan_tool_rectangle">


                          <div class="col-md-6">
                              <img src="img/planning-tools/HOMEM.png" style="" class="photo">
                          </div>
                          <div class="pricing_content col-md-6" style="">
                              <h4 style="" class="pricing_title"> Save time & money<br> and be stress free </h4>

                              <p class="pricing_para" style="text-transform: none">Our Event Coordinator <br>
                                  services give you control <br>
                                  and supervision over <br>
                                  your events without<br>
                                  hassle and stress. </p>
                              <a class="btn btn-danger rounded btn-sm custom-btn"
                                 style="color: white;padding: 1% 5%;text-transform: none;background-color: #810D28">Learn
                                  more</a>
                          </div>


                      </div>
                  </div>

      --}}

      <div class="col-md-6">

        <div class="pricing-item_1 plan_tool_rectangle">
          {{--<img class="photo plan_tool_rectangle" src="">--}}

          <div class="pricing_content">
            <h4 style="" class="pricing_title"> Save time & money<br> and be stress free </h4>

            <p class="pricing_para" style="text-transform: none">Our Event Coordinator <br>
              gives you control <br>
              and supervision over <br>
              your events without<br>
              hassle and stress. </p>
            <a href="#" class="btn btn-danger rounded btn-sm custom-btn"
               style="color: white;padding: 1% 5%;text-transform: none;background-color: #810D28">Learn
              more</a>
          </div>
        </div>
      </div>
      <div class="col-md-6 ">
        <div class="pricing-item_2 plan_tool_rectangle pricing_item_2">
          {{--<img class="photo plan_tool_rectangle" src="">--}}

          <div class="pricing_content">
            <h4 style="" class="pricing_title"> Easy Planning<br> with easy tools </h4>

            <p class="pricing_para" style="text-transform: none">Plan your wedding the right way  <br>
              with our effective free planning tools. <br>
              Manage checklists, vendors,<br>
              budgets and more.<br>
            </p>

            {{--<a href="#" class="btn btn-danger rounded btn-sm custom-btn"
               style="color: white;padding: 1% 2%;text-transform: none;background-color: #810D28">Take me to
                tools</a>--}}

            <div class="row planning_tools_icons center-block" style="">

              {{--<div class="col-sm-6">
              </div>--}}


              @if (Auth::check())
                <div class="col-sm-4 planning_tools_icon">
                  <a href="{{route('mychecklist',Auth::user()->id)}}">
                    <img class="icon2" src="{{asset('img/planning-tools/my-checklist.png')}}">

                    <p class="mt-3">My <br> Checklist</p>
                  </a>
                </div>
              @else
                <div class="col-sm-4 planning_tools_icon">
                  <a href="#myModal" data-toggle="modal">
                    <img class="icon2" src="{{asset('img/planning-tools/my-checklist.png')}}">

                    <p class="mt-3">My <br> Checklist</p>
                  </a>
                </div>

              @endif

              @if (Auth::check())
                <div class="col-sm-4 planning_tools_icon">
                  <a href="{{ route('myvendors', Auth::user()->id) }}">
                    <img class="icon2" src="{{asset('img/planning-tools/my-vendor.png')}}">

                    <p class="mt-3">My <br> Vendors</p>
                  </a>
                </div>
              @else
                <div class="col-sm-4 planning_tools_icon">
                  <a href="#myModal" data-toggle="modal">
                    <img class="icon2" src="{{asset('img/planning-tools/my-vendor.png')}}">

                    <p class="mt-3">My <br> Vendors</p>
                  </a>
                </div>
              @endif

              @if (Auth::check())
                <div class="col-sm-4 planning_tools_icon">
                  <a href="{{route('mybudget')}}">
                    <img class="icon2" src="{{asset('img/planning-tools/budget-manager.png')}}">

                    <p class="mt-3">My <br> Budget</p>

                  </a>
                </div>
              @else
                <div class="col-sm-4 planning_tools_icon">
                  <a href="#myModal" data-toggle="modal">
                    <img class="icon2" src="{{asset('img/planning-tools/budget-manager.png')}}">

                    <p class="mt-3">My <br> Budget </p>
                  </a>
                </div>
              @endif

            </div>
          </div>
        </div>
      </div>
    </div>

    {{--<div class="col-md-2"></div>--}}{{--
    <!-- Pricing Table 2 -->
    <div class="col-md-6 padding_none_right">
      <div class="pricing-item plan_tool_rectangle">

          --}}{{--<div class="pricing-item_2" style="" >

            --}}{{----}}{{--<div class="pricing_content" style="">

              <img class="photo" src="img/planning-tools/homem2.jpg">

              <div class="pricing_content" style="margin-top: -50%">
                <h4 style="" class="pricing_title"> Easy Planning<br> with easy tools  </h4>
                <p  class="pricing_para" style="text-transform: none">Use our free planning tools <br>
                  to plan & manage your <br>
                  event-manage checklists, <br>
                  vendors & budget<br>
                </p>

                <a class="btn btn-danger" style="color: white;">Learn more</a>
              </div>
            </div>--}}{{----}}{{--

            </div>--}}{{--

              --}}{{--<div class="" style="height: 100%;width: 100%">
                  <img src="img/planning-tools/homem2.jpg"  class="photo plan_tool_rectangle" style="margin-left: 0">
                <div class="pricing_content" style="margin-top: -50%">
                  <h4 style="" class="pricing_title"> Easy Planning<br> with easy tools  </h4>
                  <p  class="pricing_para" style="text-transform: none">Use our free planning tools <br>
                    to plan & manage your <br>
                    event-manage checklists, <br>
                    vendors & budget<br>
                  </p>

                  <a class="btn btn-danger" style="color: white;">Learn more</a>
                </div>
              </div>--}}{{--

          </div>

      </div>--}}
  </div>

</section>
<!--End of new planning tools  -->
<!-- Menu Gallery -->
<section class="page-section" id="menu">
  <div class="container wow fadeIn  mb-4">
    <div class="text-center">
      <p class="" style="">
        <span style="transform: scale(2, 1.3);font-size: 25px;font-weight: 200;font-family: 'Source Sans Pro', sans-serif;">Ideas and stories</span>
        <br>
        Get your creative inspiration from current trend and tips.</p>
    </div>

    <div class="portfolio-gallery">
      @foreach ($items as $item)
        <div class="item">

          <div class="image">
            <a href="{{ $item->get_link() }}" title="{{ $item->get_title() }}">


              {{--<div>

                @php
                $sentence = $item->get_description();
                preg_match_all('~<img .*?src=["\']+(.*?)["\']+~', $sentence, $urls, PREG_SET_ORDER);
                                      $urls=$urls[0][1];
                //echo $urls;
                @endphp
                <img src="{{$urls}}" class="img-fluid  photo_rectangle photo_idea_stories" alt="">
              </div>--}}
            </a>

          </div>
          <p style="width:100%;" class="text-center txt">{{ $item->get_title() }}</p>


        </div>


      @endforeach
      {{--
        <div class="item">
          <a href="#" class="gallery-link" title="Mini Croissants">
            <div>
              <h4>S2</h4>
              <img src="img/stories/2.jpg" class="img-fluid mx-auto" alt="">
            </div>
          </a>
        </div>
        <div class="item">
          <a href="#" class="gallery-link" title="Gourmet Sweet Cakes">
            <div>
              <h4>S3</h4>
              <img src="img/stories/3.jpg" class="img-fluid mx-auto" alt="">
            </div>
          </a>
        </div>
        <div class="item">
          <a href="#" class="gallery-link" title="Traditional Honey Cake">
            <div>
              <h4>S4</h4>
              <img src="img/stories/4.jpg" class="img-fluid mx-auto" alt="">
            </div>
          </a>
        </div>
        <div class="item">
          <a href="#" class="gallery-link" title="Rosemary Breadsticks and Salami Rolls">
            <div>
              <h4>S5</h4>
              <img src="img/stories/5.jpg" class="img-fluid mx-auto" alt="">
            </div>
          </a>
        </div>
        <div class="item">
          <a href="#" class="gallery-link" title="Mini Croissants">
            <div>
              <h4>S6</h4>
              <img src="img/stories/6.jpg" class="img-fluid mx-auto" alt="">
            </div>
          </a>
        </div> --}}
    </div>

  </div>
</section>


<script>
  function makeDisplayBlock() {
    document.getElementById('hidden_row').style.display = "flex";

    $('#btn_loadMore').hide();
  }
</script>

@endsection
