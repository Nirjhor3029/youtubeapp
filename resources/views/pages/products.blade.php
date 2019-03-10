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
<!-- FB Profile Style -->


<!-- Blank section -->

<section class="page-section services">
<div class="container">
  <div class="wow fadeIn">
    <h3>{{ $catagorydata->name }}</h3>
  </div>
  <div class="row">

      <ul class="breadcrumb">
        <li><a href="{{route('mainhome')}}">Home</a></li>
        {{-- <li><a href="{{route('our-service')}}">Ayojok Service</a></li> --}}
        <li class="active" style="text-transform: capitalize;"> {{ $catagorydata->name }}</li>
      </ul>

  </div>

  <!-- Sorting and Filter -->
  {{-- <div class="row sub-controls mt-2 mb-2">

  <div class="col-lg-6 row">
  <datalist id="sizeLegend">
  <option value="0"/>
  <option value="1"/>
  <option value="2"/>
  <option value="3"/>
  <option value="4"/>
  <option value="6"/>
  <option value="7"/>
  <option value="8"/>
  <option value="9"/>
  <option value="10"/>
  <option value="11"/>
  <option value="12"/>
  <option value="13"/>
</datalist>

<div class="col-lg-3 h-100 mt-2">
<button type="button" class="control" data-sort="size:asc">Asc</button>
<button type="button" class="control" data-sort="size:desc">Desc</button>
</div>

<div class="col-lg-8">
<div class="range-slider">
<label class="range-slider-label">Max</label>
<input name="minSize" class="range-slider-input" type="range" min="0" max="13" value="0" list="sizeLegend"/>
</div>
</div>

</div>

<div class="col-lg-6 clearfix" style="border-left:1px solid #dbdbdb;">
<div class="dropdown-filter pull-right">
<label>Sort by:</label>
<select class="select-filter btn btn-primary">
<option value="all" selected="selected">All</option>
<option value=".green">Green</option>
<option value=".blue">Blue</option>
<option value=".pink">Pink</option>
</select>
</div>
</div>


</div> --}}
<!--/ end of Sorting and Filter -->

<!-- Sub-catagory Product -->
<div class="row mt-2 text-center product-list" id="container" data-ref="container">

  @foreach($datas as $data)
<div class="col-lg-3 col-md-4 mb-4 shop-product mix green">
  <div class="card">
    <a href="{{url('services/'.$catagory = $catagorydata->name.'/'.$product = $data->id)}}"><img class="card-img-top" src="{{ url($data->image) }}" alt="{{ $data->title }}"></a>
    <div class="card-body body">
      <h5 class="card-title">
        <a href="{{url('services/'.$catagory = $catagorydata->name.'/'.$product = $data->id)}}">{{ $data->title }}</a>
      </h5>
      <h5>BDT {{ $data->price }}</h5>
    @if (Auth::check())
      <div class="shop-btn">
        {{-- <a href="#" class="btn btn-primary btn-sm hidden-sm" data-toggle="tooltip" data-placement="bottom" title="Add to cart"><i class="fa fa-shopping-cart fa-lg"></i></a> --}}
        {{-- <a href="#" class="btn btn-primary btn-sm hidden-sm" data-toggle="tooltip" data-placement="bottom" title="Add to wish list"><i class="fa fa-heart fa-lg"></i></a> --}}
          <button type="button" id="wishlistbtn{{$data->id}}" class="btn btn-primary btn-sm hidden-sm" data-toggle="tooltip" data-placement="bottom" title="Add to wish list" onclick="event.preventDefault();document.getElementById('wishlist{{$data->id}}').submit();"><i class="fa fa-heart fa-lg"></i></button>
        <form id="wishlist{{$data->id}}" action="{{route('wishlist.store')}}" method="post">
          {{csrf_field()}}
          @if (Auth::check())
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
          @endif
          <input type="hidden" name="catagory_id" value="{{$data->catagory_id}}">
          <input type="hidden" name="product_id" value="{{$data->id}}">
        </form>
      </div>
    @endif

    </div>
  </div>
</div>
@endforeach
{{--
<div class="col-lg-3 col-md-4 mb-4 shop-product mix pink" data-size="6">
  <div class="card">
    <a href="#"><img class="card-img-top" src="http://placehold.it/700x600" alt=""></a>
    <div class="card-body body">
      <h4 class="card-title">
        <a href="#">Item One</a>
      </h4>
      <h5>BDT 24.99</h5>
      <div class="shop-btn">
        <a href="#" class="btn btn-primary btn-sm hidden-sm" data-toggle="tooltip" data-placement="bottom" title="Add to cart"><i class="fa fa-shopping-cart fa-lg"></i></a>
        <a href="#" class="btn btn-primary btn-sm hidden-sm" data-toggle="tooltip" data-placement="bottom" title="Add to wish list"><i class="fa fa-heart fa-lg"></i></a>
      </div>
    </div>
    <div class="card-footer">
      <div>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star-o fa-sm"></span>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-3 col-md-4 mb-4 shop-product mix blue" data-size="7">
  <div class="card">
    <a href="#"><img class="card-img-top" src="http://placehold.it/700x600" alt=""></a>
    <div class="card-body body">
      <h4 class="card-title">
        <a href="#">Item One</a>
      </h4>
      <h5>BDT 24.99</h5>
      <div class="shop-btn">
        <a href="#" class="btn btn-primary btn-sm hidden-sm" data-toggle="tooltip" data-placement="bottom" title="Add to cart"><i class="fa fa-shopping-cart fa-lg"></i></a>
        <a href="#" class="btn btn-primary btn-sm hidden-sm" data-toggle="tooltip" data-placement="bottom" title="Add to wish list"><i class="fa fa-heart fa-lg"></i></a>
      </div>
    </div>
    <div class="card-footer">
      <div>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star-o fa-sm"></span>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-3 col-md-4 mb-4 shop-product mix green" data-size="4">
  <div class="card">
    <a href="#"><img class="card-img-top" src="http://placehold.it/700x600" alt=""></a>
    <div class="card-body body">
      <h4 class="card-title">
        <a href="#">Item One</a>
      </h4>
      <h5>BDT 24.99</h5>
      <div class="shop-btn">
        <a href="#" class="btn btn-primary btn-sm hidden-sm" data-toggle="tooltip" data-placement="bottom" title="Add to cart"><i class="fa fa-shopping-cart fa-lg"></i></a>
        <a href="#" class="btn btn-primary btn-sm hidden-sm" data-toggle="tooltip" data-placement="bottom" title="Add to wish list"><i class="fa fa-heart fa-lg"></i></a>
      </div>
    </div>
    <div class="card-footer">
      <div>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star-o fa-sm"></span>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-3 col-md-4 mb-4 shop-product mix green" data-size="10">
  <div class="card">
    <a href="#"><img class="card-img-top" src="http://placehold.it/700x600" alt=""></a>
    <div class="card-body body">
      <h4 class="card-title">
        <a href="#">Item One</a>
      </h4>
      <h5>BDT 24.99</h5>
      <div class="shop-btn">
        <a href="#" class="btn btn-primary btn-sm hidden-sm" data-toggle="tooltip" data-placement="bottom" title="Add to cart"><i class="fa fa-shopping-cart fa-lg"></i></a>
        <a href="#" class="btn btn-primary btn-sm hidden-sm" data-toggle="tooltip" data-placement="bottom" title="Add to wish list"><i class="fa fa-heart fa-lg"></i></a>
      </div>
    </div>
    <div class="card-footer">
      <div>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star-o fa-sm"></span>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-3 col-md-4 mb-4 shop-product mix blue" data-size="5">
  <div class="card">
    <a href="#"><img class="card-img-top" src="http://placehold.it/700x600" alt="" data-size="5"></a>
    <div class="card-body body">
      <h4 class="card-title">
        <a href="#">Item One</a>
      </h4>
      <h5>BDT 24.99</h5>
      <div class="shop-btn">
        <a href="#" class="btn btn-primary btn-sm hidden-sm" data-toggle="tooltip" data-placement="bottom" title="Add to cart"><i class="fa fa-shopping-cart fa-lg"></i></a>
        <a href="#" class="btn btn-primary btn-sm hidden-sm" data-toggle="tooltip" data-placement="bottom" title="Add to wish list"><i class="fa fa-heart fa-lg"></i></a>
      </div>
    </div>
    <div class="card-footer">
      <div>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star-o fa-sm"></span>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-3 col-md-4 mb-4 shop-product mix pink" data-size="1">
  <div class="card">
    <a href="#"><img class="card-img-top" src="http://placehold.it/700x600" alt=""></a>
    <div class="card-body body">
      <h4 class="card-title">
        <a href="#">Item One</a>
      </h4>
      <h5>BDT 24.99</h5>
      <div class="shop-btn">
        <a href="#" class="btn btn-primary btn-sm hidden-sm" data-toggle="tooltip" data-placement="bottom" title="Add to cart"><i class="fa fa-shopping-cart fa-lg"></i></a>
        <a href="#" class="btn btn-primary btn-sm hidden-sm" data-toggle="tooltip" data-placement="bottom" title="Add to wish list"><i class="fa fa-heart fa-lg"></i></a>
      </div>
    </div>
    <div class="card-footer">
      <div>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star-o fa-sm"></span>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-3 col-md-4 mb-4 shop-product mix pink" data-size="3">
  <div class="card">
    <a href="#"><img class="card-img-top" src="http://placehold.it/700x600" alt=""></a>
    <div class="card-body body">
      <h4 class="card-title">
        <a href="#">Item One</a>
      </h4>
      <h5>BDT 24.99</h5>
      <div class="shop-btn">
        <a href="#" class="btn btn-primary btn-sm hidden-sm" data-toggle="tooltip" data-placement="bottom" title="Add to cart"><i class="fa fa-shopping-cart fa-lg"></i></a>
        <a href="#" class="btn btn-primary btn-sm hidden-sm" data-toggle="tooltip" data-placement="bottom" title="Add to wish list"><i class="fa fa-heart fa-lg"></i></a>
      </div>
    </div>
    <div class="card-footer">
      <div>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star fa-sm"></span>
        <span class="fa fa-star-o fa-sm"></span>
      </div>
    </div>
  </div>
</div> --}}

</div>
<!--/ End of Sub-catagory Produt -->
{{-- <div class="text-center">
<div id="pagination" class="pagination"></div>
</div> --}}
</div>
</section>
@endsection

@push('script')

@endpush
