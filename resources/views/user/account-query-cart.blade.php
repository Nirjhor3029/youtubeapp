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
            <li class="active"> My Query List</li>
          </ul>
        </div>
      </div>

    </div>
  </section>

  <section class="page-section mb-4">
    <div class="container">

      <div class="row mb-4">
        <div class="col-lg-12">
          <div class="wow fadeIn">
            <h3><i class="fa fa-search fa-lg" style="margin-right:1rem;"></i>  My Queries </h3>
          </div>
        </div>
      </div>

      {{-- Tabbed Section --}}
      {{-- <div id="exTab2">
      <ul class="nav nav-tabs">
      <li class="active" style="padding:0.3rem 1rem 0.3rem 0.3rem; border-right:1px solid #dfdfdf">
      <a  href="#1" data-toggle="tab">Queries</a>
    </li>
    <li style="padding:0.3rem 0.3rem 0.3rem 1rem;"><a href="#2" data-toggle="tab">Confirm List</a>
  </li>
</ul> --}}

{{-- <div class="tab-content">
<div class="tab-pane active" id="1"> --}}
{{-- Query List --}}
<div class="row mt-3">

  <div class="my-account">
    <p>Please confirm your selected and available vendors in the list by clicking on the “confirm” button. Ayojok team will contact you very soon to complete the advance payment for your confirmed vendors.
      <br>
      Availability of vendors is subject to change with time. So confirm your bookings as soon as possible to avoid any delays.
    </p>
  </div>
  <div class="col-lg-12">
    <div class="table-responsive">
      <table class="table" id="cart">
        {!! Form::open(['method' => 'POST','route'=> ['clear-query',Auth::user()->id], 'style' => 'display:inline']) !!}
        {!! Form::button('Clear List',['class'=> 'btn btn-xs mb-3' ,'type' => 'submit']) !!}
        {!! Form::close()!!}
        <thead>
          <tr class="d-flex">
            <th class="col-2">Name</th>
            <th class="col-3">Event Date</th>
            <th class="col-2">Avilability</th>
            <th class="col-2">Advance</th>
            <th class="col-2">Totals</th>
            <th class="col-1">Confirm</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($querydatas as $querydata)
            <tr class="id{{$querydata->id}} d-flex">
              <td class="col-2">
                <div class="">
                  @if ($querydata->vendors_id == '0')
                    <h5>{{$querydata->product->title}}</h5>
                    <p style="text-transform:uppercase;">{{$querydata->catagory->name}}</p>
                  @else
                    <h5>{{$querydata->vendors->title}}</h5>
                    <p style="text-transform:uppercase;">{{$querydata->catagory->name}}</p>
                  @endif
                </div>
              </td>
              <td class="col-3">
                @if (is_null($querydata->maindate))
                  <p>{{date('d-m-Y',strtotime($querydata->date))}}</p>
                @else
                  @php
                  $dates = explode(',',$querydata->maindate);
                  @endphp
                  <p>
                    @foreach ($dates as $date)
                      @php
                      $thedate = date("d-m-Y", strtotime($date));
                      @endphp
                      <span>{!! $thedate. '<br/>' !!}</span>
                    @endforeach
                  </p>
                @endif
              </td>
              <td class="col-2">
                @if ($querydata->is_available == 0)
                  <p class="productDetails"><span style="color:brown">Checking</span></p>
                @elseif($querydata->is_available == 1)
                  <p class="productDetails">  <span style="color:green">Available</span></p>
                @elseif($querydata->is_available == 2)
                  <p class="productDetails">  <span style="color:red">Not Available</span></p>
                @endif
              </td>
              <td class="col-2"><p class="productDetails">{{$querydata->advance}} BDT</p></td>
              <td class="col-2"><p class="productDetails">{{$querydata->total}} BDT</p></td>
              <td class="col-1">
                @if ($querydata->is_available == 1)
                  {!! Form::open(['method' => 'POST','route'=> ['confirm-query-id',$querydata->id], 'style' => 'display:inline']) !!}
                  {!! Form::button('<span class="fa fa-sm fa-check" style="" aria-hidden="true"></span>',['class'=> 'btn btn-xs', 'style' => 'font-size:1.5rem;color:#f47f20;background-color: #f2f2f2;padding:2px;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Confirmed Order']) !!}
                  {!! Form::close()!!}
                  {!! Form::open(['method' => 'POST','route'=> ['query-delete',$querydata->id], 'style' => 'display:inline']) !!}
                  {!! Form::button('<span class="fa fa-sm fa-close" style="" aria-hidden="true"></span>',['class'=> 'btn btn-xs', 'style' => 'font-size:1.5rem;color:#dd3333;background-color: #f2f2f2;padding:2px;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Delete']) !!}
                  {!! Form::close()!!}
                  {{-- <button value={{$querydata->id}} name="button" class="btn btn-default btn-sm" style=""><i class="fa fa-sm fa-check" data-toggle="tooltip" title="Confirmed Order"></i></button> --}}
                @elseif ($querydata->is_available == 2)
                  {!! Form::open(['method' => 'POST','route'=> ['query-delete',$querydata->id], 'style' => 'display:inline']) !!}
                  {!! Form::button('<span class="fa fa-sm fa-close" style="" aria-hidden="true"></span>',['class'=> 'btn btn-xs', 'style' => 'font-size:1.5rem;color:#dd3333;background-color: #f2f2f2;padding:2px;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Delete']) !!}
                  {!! Form::close()!!}
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>

      </table>
    </div>

  </div>
  {{-- <div class="col-lg-3" style="overflow:hidden">
    <div class="vertical-links">
      <div class="card" style="background-image:url({{asset('img\background\catagory-title-bg.jpg')}})">
        <div class="card-body">Basic card</div>
      </div>
      <div class="card">
        <div class="card-body">Basic card</div>
      </div>
      <div class="card">
        <div class="card-body">Basic card</div>
      </div>
      <div class="card">
        <div class="card-body">Basic card</div>
      </div>
      <div class="card">
        <div class="card-body">Basic card</div>
      </div>
      <div class="card">
        <div class="card-body">Basic card</div>
      </div>
      <div class="card">
        <div class="card-body">Basic card</div>
      </div>
      <div class="card">
        <div class="card-body">Basic card</div>
      </div>
      <div class="card">
        <div class="card-body">Basic card</div>
      </div>
      <div class="card">
        <div class="card-body">Basic card</div>
      </div>
      <div class="card">
        <div class="card-body">Basic card</div>
      </div>
      <div class="card">
        <div class="card-body">Basic card</div>
      </div>
      <div class="card">
        <div class="card-body">Basic card</div>
      </div>
    </div>
  </div> --}}


</div>
{{-- End Query List --}}
{{-- </div>
<div class="tab-pane" id="2"> --}}
{{-- Conform Query List --}}
{{-- <div class="row mt-3">
<div class="col-lg-12">
<div class="row table-responsive">
<table class="table" id="cart">
<thead>
<tr style="width:100%">
<th></th>
<th>Name</th>
<th>Date</th>
<th>Advance</th>
<th>Totals</th>
</tr>
</thead>
<tbody>
@foreach ($confirmquerys as $confirmquery)
<tr class="id{{$confirmquery->id}}" style="width:100%">
<td>
<div class="productThumb">
@if ($confirmquery->vendors_id == '0')
<img src="{{asset($confirmquery->product->image)}}" alt="" class="img-responsive">
@else
<img src="{{asset($confirmquery->vendors->logo)}}" alt="" class="img-responsive">
@endif

</div>
</td>
<td>
<div class="productDetails">
@if ($confirmquery->vendors_id == '0')
<h5>{{$confirmquery->product->title}}</h5>
<p style="text-transform:uppercase;">{{$confirmquery->catagory->name}}</p>
@else
<h5>{{$confirmquery->vendors->title}}</h5>
<p style="text-transform:uppercase;">{{$confirmquery->catagory->name}}</p>
@endif
</div>
</td>
<td>
@php
$dbdate = strtotime($confirmquery->date);
$date = date("d-m-Y", $dbdate);
@endphp
<p class="productDetails">{{$date}}</p>
</td>
<td><p class="productDetails">{{$confirmquery->advance}} BDT</p></td>
<td><p class="productDetails">{{$confirmquery->total}} BDT</p></td>
</tr>
@endforeach
</tbody>
</table>

</div>
</div>
</div> --}}
{{-- End Conform Query List --}}
{{-- </div>
</div>
</div> --}}


<div class="row mb-5">
  <div class="col-lg-12 ">
    <ul class="pager">
      <li class="previous pull-left"><a href="{{route('my-account')}}"> &larr; Back To My Account </a></li>
      {{-- <li class="next pull-right"><a href="{{route('send-query')}}"> Send for Query <i class="fa fa-check"></i></a></li> --}}
      {{-- @if (!empty($querydata->advance))
      <li class="next pull-right"><a href="#"> Pay Advance <i class="fa fa-check"></i></a></li>
    @endif --}}

  </ul>
</div>
</div>


</div>


</section>

@if (Session::has('modal_message'))
  <div id="confirmModal" class="modal fade">
    <div class="modal-dialog modal-login">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Confirmed Query</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body text-center">
          <p>{{ Session::get('modal_message') }}</p>
        </div>
      </div>
    </div>
  </div>
@endif
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

  $('.query-data').click(function(e) {
    e.preventDefault();
    // get the query ID
    var id = $(this).data('id');

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })
    $.ajax({
      type  : 'GET',
      url   : '/confirm-query/' + id ,
      data  : {id : id},
      success: function (response) {
        var datas = json.parseJSON(response.data);
        //var datas = JSON.stringify(response.date);
        //var data  = datas[0];
        //alert(data);
        //$('#modal-query .modal-body').html(data.date[1]);

        console.log(datas);
      },
      error: function (response) {
        console.log('Error:', response);
      }
    });
  });

  $('#confirmModal').modal('show');
  setTimeout(function() {
    $('#confirmModal').modal('hide');
  }, 4000);
</script>
@endpush
