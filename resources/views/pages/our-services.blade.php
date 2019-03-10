@extends('layouts.app')

@push('css')
  <link href="{{asset('css/shop.css')}}" rel="stylesheet" type="text/css">
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

<section class="mt-4 mb-4">
  <div class="container">
    <div class="wow fadeIn text-center">
      <h3>Ayojok Services</h3>
      <hr class="colored">
    </div>
  </div>
</section>

<!-- Catagory 1 -->

<section class="shop-cat">
  <div class="container">
    <div class="row catrow">
      <div class="col-lg-3 no-pad">
        <div class="category-header">
          <h2>Vehicle
            <a href="{{url('services/'.$catagory ='vehicle')}}" class="btn btn-primary">See More</a>
          </h2>
        </div>
      </div>

      <div class="col-lg-6">
        <!-- Product row -->
        <div class="row">
          @foreach ($vehiclehotproducts as $vehiclehotproduct)

          <div class="col-lg-4 col-sm-2 cat-product">
            <a href="{{url('services/'.$catagory = $vehiclehotproduct->name.'/'.$product = $vehiclehotproduct->id)}}">
              <div class="text-center">
                <img class="img-responsive" src="{{url($vehiclehotproduct->image)}}" style="height:120px; width:120px;" alt="">
                <h6>{{$vehiclehotproduct->title}}</h6>
                <p>BDT {{$vehiclehotproduct->price}}</p>
              </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
      <div class="col-lg-3 no-pad cat-ads">
        <a href="#"><img class="img-responsive" src="img/promo/vehicle_ads.jpg" alt=""></a>
      </div>
    </div>

  </div>
</section>



<!-- Catagory 2 -->
<section class="shop-cat">
  <div class="container">
    <div class="row catrow">
      <div class="col-lg-3 no-pad cat-ads">
        <a href="#"><img class="img-responsive" src="img/promo/light_sound_ads.jpg" alt=""></a>
      </div>

      <div class="col-lg-6">
        <!-- Product row -->
        <div class="row">
          @foreach ($lighthotproducts as $lighthotproduct)

          <div class="col-lg-4 col-sm-2 cat-product">
            <a href="{{url('services/'.$catagory = $lighthotproduct->name.'/'.$product = $lighthotproduct->id)}}">
              <div class="text-center">
                <img class="img-responsive" src="{{url($lighthotproduct->image)}}" style="height:120px; width:120px;" alt="">
                <h6>{{$lighthotproduct->title}}</h6>
                <p>BDT {{$lighthotproduct->price}}</p>
                {{-- <div class="ratings">
                  <p>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                  </p>
                </div> --}}
              </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
      <div class="col-lg-3 no-pad">
        <div class="category-header">
          <h2>Light & Sound
            <a href="{{url('services/'.$catagory ='light & sound')}}" class="btn btn-primary">See More</a>
          </h2>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- Catagory 3 -->
<section class="shop-cat">
  <div class="container">
    <div class="row catrow">
      <div class="col-lg-3 no-pad">
        <div class="category-header">
          <h2>Holud Snacks
            <a href="{{url('services/'.$catagory ='holud snacks')}}" class="btn btn-primary">See More</a>
          </h2>
        </div>
      </div>

      <div class="col-lg-6">
        <!-- Product row -->
        <div class="row">
          @foreach ($snackshotproducts as $snackshotproduct)

          <div class="col-lg-4 col-sm-2 cat-product">
            <a href="{{url('services/'.$catagory = $snackshotproduct->name.'/'.$product = $snackshotproduct->id)}}">
              <div class="text-center">
                <img class="img-responsive" src="{{url($snackshotproduct->image)}}" style="height:120px; width:120px;" alt="">
                <h6>{{$snackshotproduct->title}}</h6>
                <p>BDT {{$snackshotproduct->price}}</p>
                {{-- <div class="ratings">
                  <p>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                  </p>
                </div> --}}
              </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
      <div class="col-lg-3 no-pad cat-ads">
        <a href="#"><img class="img-responsive" src="img/promo/holud_snacks_ads.jpg" alt=""></a>
      </div>
    </div>

  </div>
</section>
<!-- Catagory 4 -->
<section class="shop-cat">
  <div class="container">
    <div class="row catrow">
      <div class="col-lg-3 no-pad cat-ads">
        <a href="#"><img class="img-responsive" src="img/promo/dalakula_ads.jpg" alt=""></a>
      </div>
      <div class="col-lg-6">
        <!-- Product row -->
        <div class="row">
          @foreach ($dalashotproducts as $dalashotproduct)

          <div class="col-lg-4 col-sm-2 cat-product">
            <a href="{{url('services/'.$catagory = $dalashotproduct->name.'/'.$product = $dalashotproduct->id)}}">
              <div class="text-center">
                <img class="img-responsive" src="{{url($dalashotproduct->image)}}" style="height:120px; width:120px;" alt="">
                <h6>{{$dalashotproduct->title}}</h6>
                <p>BDT {{$dalashotproduct->price}}</p>
                {{-- <div class="ratings">
                  <p>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                  </p>
                </div> --}}
              </div>
            </a>
          </div>
          @endforeach
        </div>
        <!-- /End Product Row -->
      </div>
      <div class="col-lg-3 no-pad">
        <div class="category-header">
          <h2>Dala Kula
            <a href="{{url('services/'.$catagory ='dala kula')}}" class="btn btn-primary">See More</a>
          </h2>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- Catagory 5 -->
<section class="shop-cat">
  <div class="container">
    <div class="row catrow">
      <div class="col-lg-3 no-pad">
        <div class="category-header" text-center>

          <h2>Holud <span style="font-size:2.2rem;">Accessories</span>
            <a href="{{url('services/'.$catagory ='holud')}}" class="btn btn-primary">See More</a>
          </h2>

        </div>
      </div>

      <div class="col-lg-6">
        <!-- Product row -->
        <div class="row">
          @foreach ($holudhotproducts as $holudhotproduct)

          <div class="col-lg-4 col-sm-2 cat-product">
            <a href="{{url('services/'.$catagory = $holudhotproduct->name.'/'.$product = $holudhotproduct->id)}}">
              <div class="text-center">
                <img class="img-responsive" src="{{url($holudhotproduct->image)}}" style="height:120px; width:120px;" alt="">
                <h6>{{$holudhotproduct->title}}</h6>
                <p>BDT {{$holudhotproduct->price}}</p>
                {{-- <div class="ratings">
                  <p>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                  </p>
                </div> --}}
              </div>
            </a>
          </div>
          @endforeach
        </div>
        <!-- /End Product Row -->

      </div>
      <div class="col-lg-3 no-pad cat-ads">
        <a href="#"><img class="img-responsive" src="img/promo/holud_accessories_ads.jpg" alt=""></a>
      </div>

    </div>

  </div>
</section>

<!-- Catagory 6 -->
<section class="shop-cat">
  <div class="container">
    <div class="row catrow">
      <div class="col-lg-3 no-pad cat-ads">
        <a href="#"><img class="img-responsive" src="img/promo/wedding_accessories_ads.jpg" alt=""></a>
      </div>

      <div class="col-lg-6">
        <!-- Product row -->
        <div class="row">
          @foreach ($weddinghotproducts as $weddinghotproduct)

          <div class="col-lg-4 col-sm-2 cat-product">
            <a href="{{url('services/'.$catagory = $weddinghotproduct->name.'/'.$product = $weddinghotproduct->id)}}">
              <div class="text-center">
                <img class="img-responsive" src="{{url($weddinghotproduct->image)}}" style="height:120px; width:120px;" alt="">
                <h6>{{$weddinghotproduct->title}}</h6>
                <p>BDT {{$weddinghotproduct->price}}</p>
                {{-- <div class="ratings">
                  <p>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                  </p>
                </div> --}}
              </div>
            </a>
          </div>
          @endforeach
        </div>
        <!-- /End Product Row -->
      </div>
      <div class="col-lg-3 no-pad">
        <div class="category-header">
          <h2>Wedding <span style="font-size:2.1rem;">Accessories</span>
            <a href="{{url('services/'.$catagory ='wedding')}}" class="btn btn-primary">See More</a>
          </h2>
        </div>
      </div>
    </div>

  </div>
</section>
<!-- Catagory 7 -->
{{-- <section class="shop-cat">
  <div class="container">
    <div class="row catrow">
      <div class="col-lg-3 no-pad">
        <div class="category-header">
          <h2>Crafts & Alpona
            <a href="{{url('services/'.$catagory ='crafts & alpona')}}" class="btn btn-primary">See More</a>
          </h2>
        </div>
      </div>

      <div class="col-lg-6">
        <!-- Product row -->
        <div class="row">
          @foreach ($crafthotproducts as $crafthotproduct)

          <div class="col-lg-4 col-sm-2 cat-product">
            <a href="{{url('services/'.$catagory = $crafthotproduct->name.'/'.$product = $crafthotproduct->id)}}">
              <div class="text-center">
                <img class="img-responsive" src="http://placehold.it/120x120" alt="">
                <h6>{{$crafthotproduct->title}}</h6>
                <p>BDT {{$crafthotproduct->price}}</p>
              </div>
            </a>
          </div>
          @endforeach
        </div>
        <!-- /End Product Row -->
      </div>
      <div class="col-lg-3 no-pad cat-ads">
        <a href="#"><img class="img-responsive" src="img/cat-ads-placeholder.jpg" alt=""></a>
      </div>

    </div>

  </div>
</section> --}}

<!-- Catagory 8 -->
{{-- <section class="shop-cat">
  <div class="container">
    <div class="row catrow">
      <div class="col-lg-3 no-pad cat-ads">
        <a href="#"><img class="img-responsive" src="img/cat-ads-placeholder.jpg" alt=""></a>
      </div>

      <div class="col-lg-6">
        <!-- Product row -->
        <div class="row">
          @foreach ($flowershotproducts as $flowershotproduct)

          <div class="col-lg-4 col-sm-2 cat-product">
            <a href="{{url('services/'.$catagory = $flowershotproduct->name.'/'.$product = $flowershotproduct->id)}}">
              <div class="text-center">
                <img class="img-responsive" src="http://placehold.it/120x120" alt="">
                <h6>{{$flowershotproduct->title}}</h6>
                <p>BDT {{$flowershotproduct->price}}</p>
              </div>
            </a>
          </div>
          @endforeach
        </div>
        <!-- /End Product Row -->
      </div>
      <div class="col-lg-3 no-pad">
        <div class="category-header">
          <h2>Flowers
            <a href="{{url('services/'.$catagory ='flowers')}}" class="btn btn-primary">See More</a>
          </h2>
        </div>
      </div>

    </div>

  </div>
</section> --}}
<!-- End of catagory -->



@endsection

@push('script')

@endpush
