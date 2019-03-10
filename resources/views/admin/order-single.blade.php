@extends('layouts.admin')

@push('css')

@endpush

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Order Details
      </h1>
    </section>

    <section class="maincontent">

      <div class="col-md-4" style="margin-top:2rem;">

        <div class="box box-danger">
          <div class="box-body" id="status">
            <div class="details">
              <label for="id" class="control-label col-md-4">Client ID:</label>
              <div class="col-md-8">
                <p>{{$user->id}}</p>
              </div>
              <label for="email" class="control-label col-md-4">Client Email:</label>
              <div class="col-md-8">
                <p>{{$user->email}}</p>
              </div>
              <label for="username" class="control-label col-md-4">Client Username:</label>
              <div class="col-md-8">
                <p>{{$user->name}}</p>
              </div>
              <label for="name" class="control-label col-md-4">Client Name:</label>
              <div class="col-md-8">
                @if (empty($user->fname) && empty($user->lname))
                  <p>{!!"<span class='label label-warning'>Not Set Yet</span>"!!}</p>
                @else
                  <p>{{$user->fname}} {{$user->lname}}</p>
                @endif
              </div>
              <label for="contact" class="control-label col-md-4">Client Contact:</label>
              <div class="col-md-8">
                <p>{{$user->contact}}</p>
              </div>
              <label for="address" class="control-label col-md-4">Client Address:</label>
              <div class="col-md-8">
                <p>{!!$user->address or "<span class='label label-warning'>Not Set Yet</span>"!!}</p>
              </div>
            </div>
          </div><!-- /.box-body -->
        </div><!-- /.box -->

      </div>

      {{-- Client Summer --}}
      <div class="col-md-4" style="margin-top:2rem;">
        <div class="box box-info">
          <div class="box-header">
            <strong>Client Summery</strong>
          </div>
          <div class="box-body">
            <div class="details row">
              <label for="name" class="control-label col-md-4">Total Order:</label>
              <div class="col-md-8">
                @php
                  $totalOrder = App\Models\order::where('user_id',$user->id)->where('payment_type','>',0)->count();
                @endphp
                <p><strong>{{$totalOrder or 0}}</strong> Service</p>
              </div>

              <label for="name" class="control-label col-md-4">Total Advance Paid:</label>
              <div class="col-md-8">
                @php
                  $totaladvance = App\Models\order::where('user_id',$user->id)->where('payment_type','>',0)->sum('advance');
                @endphp
                <p> <strong>{{$totaladvance or 0}} BDT</strong> </p>
              </div>
              </div>
          </div>
        </div>
      </div>

      {{-- Shipping Address --}}
      {{-- <div class="col-md-4" style="margin-top:2rem;">
        <div class="box box-info">
          <div class="box-header">
            <strong>Shipping</strong>
          </div>
          <div class="box-body">
            <div class="details">
              <label for="name" class="control-label col-md-4">Name:</label>
              <div class="col-md-8">
                <p>{{$shipping->fname}} {{$shipping->lname}}  ({{$shipping->name}})</p>
              </div>
              <label for="company" class="control-label col-md-4">Company:</label>
              <div class="col-md-8">
                <p>{{$shipping->company or "N/A"}}</p>
              </div>
              <label for="address" class="control-label col-md-4">Address:</label>
              <div class="col-md-8">
                <p>{{$shipping->line1}}</p>
                <p>{{$shipping->line2}}</p>
              </div>
              <label for="city" class="control-label col-md-4">City:</label>
              <div class="col-md-8">
                <p>{{$shipping->city}}</p>
              </div>
              <label for="contact" class="control-label col-md-4">Contact:</label>
              <div class="col-md-8">
                <p>{{$shipping->contact}}</p>
              </div>
              <label for="extrainfo" class="control-label col-md-4">Extra Information:</label>
              <div class="col-md-8">
                <p>{{$shipping->extraInfo or "N/A"}}</p>
              </div>
              <label for="refname" class="control-label col-md-4">Reference Address Name:</label>
              <div class="col-md-8">
                <p>{{$shipping->addressName}}</p>
              </div>
            </div>
          </div>
        </div>
      </div> --}}

      <div class="col-md-12" style="margin-top:2rem;">

        <div class="box box-danger">
          <div class="box-body table-responsive">
            <table id="table" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Order Date</th>
                  <th>Order Delivery Date </th>
                  <th>Service Name</th>
                  <th>Delivery Time</th>
                  <th>Advance</th>
                  <th>Total</th>
                  <th>Advance Payment Type</th>
                  <th>Invoice Id</th>
                  <th>Vendor Payment</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($datas as $data)
                  <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->created_at->format('d M Y')}}</td>
                    <td>{{$data->order_date}}</td>
                    <td>{{$data->product->title or $data->vendor->title}}</td>
                    <td>{{$data->time}}</td>
                    <td>{{$data->advance}}</td>
                    <td>{{$data->total}}</td>
                    <td>
                      @if ($data->payment_type == 2)
                        {{_("Bkash")}}
                      @elseif($data->payment_type == 1)
                        {{_("Online Payments")}}
                      @elseif($data->payment_type == 0)
                        {{_("Advance Not Paid")}}
                      @endif
                    </td>
                    <td>
                      {!! Form::open(['method' => 'GET','route'=> ['invoice',$data->invoice_id],'style'=>'display:inline']) !!}
                      {!! Form::button('#'.$user->id.$data->invoice_id,['class'=> 'btn btn-xs', 'style' => 'font-size:1.5rem;color:#f47f20;background: none;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Click, to see the invoice !']) !!}
                      {!! Form::close()!!}
                    </td>
                    <td>
                      @if ($data->is_paid == 0)
                        {{_("Not Paid Yet")}}
                      @else
                        {{_("Paid")}}
                      @endif
                    </td>
                    <td>
                      @if ($data->is_paid == 0)
                        {!! Form::open(['method' => 'POST','route'=> ['manual-payment',$data->id],'style'=>'display:inline']) !!}
                        {!! Form::button('<span class="fa fa-sm fa-check" style="" aria-hidden="true"></span>',['class'=> 'btn btn-xs', 'style' => 'font-size:2rem;color:#f47f20;background: none;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Click, if paid to vendor !']) !!}
                        {!! Form::close()!!}
                      @endif
                    </td>
                    </tr>
                @endforeach
                </tbody>

              </table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->

        </div>



    </section><!-- /.content -->
  </div>

@endsection

@push('scripts')
  <script>
  $(function () {
    $('#table').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })
  })



  </script>

@endpush
