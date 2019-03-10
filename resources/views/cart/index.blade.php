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

  <section class="page-section">
    <div class="container">

      <div class="row">
        <div class="col-lg-12">
          <ul class="breadcrumb">
            <li><a href="{{route('mainhome')}}">Home</a></li>
            <li><a href="{{route('my-account')}}">My Account</a></li>
            <li class="active"> Cart</li>
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
            <h3><i class="fa fa-map-marker fa-lg" style="margin-right:1rem;"></i>  My Cart</h3>
          </div>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-lg-12">
          <div class="my-account">
            <p>UPDATE YOUR CART IF IT HAS CHANGED.</p>
          </div>
          <div class="row table-responsive">
            <table class="table">
              <thead>
                <th>Product</th>
                <th>Details</th>
                <th>QNT</th>
                <th>Unit Price</th>
                <th>Sub-total</th>
                <th></th>
              </thead>
              <tbody>
                @php
                $totalitem = 0;
                $totalprice = 0;
                @endphp
                @foreach ($items as $item)
                  @php
                  $totalprice = $item->product->price * $item->quantity + $totalprice;
                  @endphp
                  <tr>
                    <td style="width:10%;">
                      <div class="productThumb">
                      <a href="{{url('services/'.$catagory = $item->catagory->name.'/'.$product = $item->product->id)}}"><img src="{{asset($item->product->image)}}" alt="" class="img-responsive"></a>
                      </div>
                    </td>
                    <td>
                      <div class="productDetails">
                        <h5><a href="{{url('services/'.$catagory = $item->catagory->name.'/'.$product = $item->product->id)}}">{{ $item->product->title }}</a></h5>
                        <p style="text-transform: capitalize;">{{ $item->catagory->name }}</p>
                      </div>
                    </td>
                    {{-- Activate only when the quantity counter will be add --}}
                    {{-- <td style="width:20%;"> --}}
                      <td>
                      {{-- Quantity --}}
                      {{-- <div class="form-group">
                        <div class="input-group">
                          <div class="">
                            <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                              <i class="fa fa-minus"></i>
                            </button>
                          </div>
                          <input type="text" class="form-control" style="padding:5px;" id="quantity" name="quantity" min="1" max="100" value="{{$item->quantity}}">
                          <div class="input-group-append">
                            <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                              <i class="fa fa-plus"></i>
                            </button>
                          </div>
                        </div>
                      </div> --}}

                      <p>{{$item->quantity}}</p>

                    </td>
                    <td>
                      <p> {{ $item->product->price }} BDT</p>
                    </td>
                    <td>
                      <p>
                        @php
                        echo $total = $item->quantity * $item->product->price;
                        @endphp
                      </p>
                    </td>
                    <td class="text-center">
                      {!! Form::open(['method' => 'DELETE','route'=> ['cart.destroy', $item->id], 'style' => 'display:inline']) !!}
                      {!! Form::button('<i class="fa fa-trash" data-toggle="tooltip" title="Remove from query!"></i>',['class'=> 'btn btn-default','type' => 'submit','style'  => 'font-size:1.8rem; background-color:#f2f2f2; color:#f47f20']) !!}
                      {!! Form::close()!!}
                      {{-- <a href="#" class="btn btn-default" style="font-size:2.5rem"><i class="fa fa-trash" data-toggle="tooltip" title="Remove from query!"></i></a> --}}
                    </td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot style="font-size:18px;">
                <tr>
                  <td colspan="5">Total Price</td>

                  <td style="font-weight:700;">BDT {{$totalprice}}</td>
                </tr>
                <tr>
                  <td colspan="5">Shipping</td>
                  <td style="font-weight:700; color:grey;">Free Shipping</td>
                </tr>
                <tr>
                  <td colspan="5">Total</td>
                  @php
                  $totalwithall = $totalprice;
                  @endphp

                  <td style="color:rgb(244, 127, 32); font-weight:800;">BDT {{$totalwithall}}</td>
                </tr>

              </tfoot>
            </table>

          </div>
        </div>
        @if (count($items)>0)
          <div class="col-lg-12">
            {!! Form::open(array('route' => 'cart.store', 'method' => 'POST'))  !!}
            <input type="hidden" name="totalprice" value="{{$totalprice}}">
            <input type="hidden" name="totalall" value="{{$totalwithall}}">
            <button type="submit" class="btn btn-primary btn-block btn-lg btn-proceed" name="button">Proceed to checkout &nbsp; <i class="fa fa-arrow-right"></i></button>
            {!! Form::close() !!}
            {{-- <a class="btn btn-primary btn-block btn-lg btn-proceed" title="checkout" href="#" id="checkout"> Proceed to checkout &nbsp; <i class="fa fa-arrow-right"></i> </a> --}}
          </div>
        @endif
      </div>

      <div class="row mb-5">
        <div class="col-lg-12 ">
          <ul class="pager">
            <li class="previous pull-left"><a href="{{route('my-account')}}" class="btn btn-lg btn-regular"> &larr; Back to My Account </a></li>
            <li class="next pull-right"><a href="{{route('mainhome')}}" class="btn btn-lg btn-regular"> <i class="fa fa-shopping-cart"></i> Continue Shopping</a></li>
          </ul>
        </div>
      </div>


    </div>
  </section>
@endsection

@push('scripts')
  <script type="text/javascript">
  $(document).ready(function(){

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $('#checkout').click(function(e){
      e.preventDefault();
      var total = $('#totalprice').val();
      var tax = $('#tax').val();
      var totalall = $('#totalall').val();

      //alert(total + ',' + tax + ',' + totalall);
      $.ajax({
        type: 'POST',
        url:  'cart.store',
        data: {
          total : total,
          totalall  : totalall
        },

      });

    });


    // Quantity Change Button
    var quantity = 1;
    $('.quantity-right-plus').on('click',function(e){
      e.preventDefault();
      var quantity = parseInt($('#quantity').val());
      $('#quantity').val(quantity + 1);
    });
    $('.quantity-left-minus').click(function(e){
      e.preventDefault();
      var quantity = parseInt($('#quantity').val());
      if(quantity > 1){
        $('#quantity').val(quantity - 1);
      }
    });
  });
</script>
@endpush
