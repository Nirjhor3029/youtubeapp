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


  <section class="page-section">
    <div class="container">

      <div class="row">
        <div class="col-lg-12">
          <ul class="breadcrumb">
            <li><a href="{{route('mainhome')}}">Home</a></li>
            <li><a href="{{route('my-account')}}">My Account</a></li>
            <li class="active"> Query Cart</li>
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
            <h3><i class="fa fa-map-marker fa-lg" style="margin-right:1rem;"></i>  My Query Cart</h3>
          </div>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-lg-12">
          <div class="my-account">
            <p>UPDATE YOUR QUERYLIST IF IT HAS CHANGED.</p>
          </div>
          <div class="row table-responsive">
            <table class="table" id="cart">
              <tbody>
                @foreach ($querydatas as $querydata)
                  <tr class="id{{$querydata->id}}">
                    <td>
                      <div class="productThumb">
                        @if ($querydata->vendors_id == '0')
                          <img src="{{asset($querydata->product->image)}}" alt="" class="img-responsive">
                        @else
                          <img src="{{asset($querydata->vendors->logo)}}" alt="" class="img-responsive">
                        @endif

                      </div>
                    </td>
                    <td style="width:20%;">
                      <div class="productDetails">
                        @if ($querydata->vendors_id == '0')
                          <h5>{{$querydata->product->title}}</h5>
                          <p style="text-transform:uppercase;">{{$querydata->catagory->name}}</p>
                        @else
                          <h5>{{$querydata->vendors->title}}</h5>
                          <p style="text-transform:uppercase;">{{$querydata->catagory->name}}</p>
                        @endif

                      </div>
                    </td>
                    <td>
                      @php
                      $dbdate = strtotime($querydata->date);
                      $date = date("d-m-Y", $dbdate);
                      @endphp
                      <p class="productDetails">{{$date}}</p>
                    </td>
                    <td>
                      @if ($querydata->vendors_id == '0')
                        <p class="productDetails">{{$querydata->product->price or "0"}} BDT</p>
                      @else
                        <p class="productDetails">{{$querydata->package->price or "0"}} BDT</p>
                      @endif

                    </td>
                  </td>
                  <td class="text-center">

                    <button value={{$querydata->id}} name="button" class="btn btn-default dlt-btn" style="font-size:2.5rem;color:#f47f20;background-color: #f2f2f2;"><i class="fa fa-trash" data-toggle="tooltip" title="Remove from query!"></i></button>

                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

        </div>
      </div>
    </div>

    <div class="row mb-5">
      <div class="col-lg-12 ">
        <ul class="pager">
          <li class="previous pull-left"><a href="{{route('mainhome')}}"> &larr; Back To Home </a></li>
          @if (count($querydatas)>0)
          <li class="next pull-right"><a href="{{route('send-query')}}"> Send for Query <i class="fa fa-check"></i></a></li>
        @endif
        </ul>
      </div>
    </div>


  </div>
</section>
@endsection

@push('scripts')
  <script type="text/javascript">
  $("#cart").on('click','.dlt-btn', function(){
    var id = $(this).val();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })
    $.ajax({
      type  : 'DELETE',
      url   : 'query-cart/'+ id ,
      data  : {id : id},
      success: function (data) {
        // console.log(data);
        // $("#id" +id).remove();
        location.reload();

      },
      error: function (data) {
        console.log('Error:', data);
      }
    });
  });

</script>
@endpush
