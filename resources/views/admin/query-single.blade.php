@extends('layouts.admin')

@push('css')

@endpush

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Query Details
      </h1>
    </section>

    <section class="maincontent">

      <div class="col-md-4" style="margin-top:2rem;">

        <div class="box box-danger">
          <div class="box-body">
            <div class="details">

                <label for="id" class="control-label col-md-4">Client ID:</label>
                <div class="col-md-8">
                  <p>{{$datas->id}}</p>
                </div>
                <label for="email" class="control-label col-md-4">Client Email:</label>
                <div class="col-md-8">
                  <p>{{$datas->email}}</p>
                </div>
                <label for="username" class="control-label col-md-4">Client Username:</label>
                <div class="col-md-8">
                  <p>{{$datas->name}}</p>
                </div>
                <label for="name" class="control-label col-md-4">Client Name:</label>
                <div class="col-md-8">
                  @if (empty($datas->fname) && empty($data->lname))
                    <p>{{"Not Set Yet"}}</p>
                  @else
                    <p>{{$datas->fname}} {{$datas->lname}}</p>
                  @endif
                </div>
                <label for="contact" class="control-label col-md-4">Client Contact:</label>
                <div class="col-md-8">
                  <p>{{$datas->contact}}</p>
                </div>

            </div>

          </div><!-- /.box-body -->
        </div><!-- /.box -->

      </div>
      {{-- <div class="col-md-4" style="margin-top:2rem;">
        <div class="box box-info">
          <div class="box-body">
            <div class="deatils">
              <p>
                Notify Client for this query update using email.
              </p>

                @if ($emails->first()->is_mailed == 0)

                  {!! Form::open(['method' => 'POST','route'=> ['notify-client',$emails->first()->user_id,], 'style' => 'display:inline']) !!}
                  {!! Form::button('<span class="fa fa-envelope" aria-hidden="true"> Send Mail</span>',['class'=> 'btn btn-success a-btn-slide-text','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Send notification to client']) !!}
                  {!! Form::close()!!}

                @else
                  <p>Client Notified</p>
                @endif

            </div>
          </div>
        </div>
      </div> --}}

      {{-- Vendor Query --}}
      <div class="col-md-12" style="margin-top:2rem;">
        <div class="box box-success">
          <div class="box-header">
            <h3 class="box-title">Vendor query</h3>
          </div><!-- /.box-header -->
          <div class="box-body table-responsive">
            <table id="vendor" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Catagory</th>
                  <th>Vendor Name</th>
                  <th>Date</th>
                  <th>Message</th>
                  <th>Main Dates</th>
                  <th>Shift/Time</th>
                  <th>Advance</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($vendors as $vendor)
                  <tr>
                    <td>{{$vendor->id}}</td>
                    <td style="text-transform:uppercase;">{{$vendor->catagory->name}}</td>
                    <td>{{$vendor->vendors->title}}</td>
                    <td>{{$vendor->date}}</td>
                    <td>{{$vendor->mess}}</td>
                    <td>

                    {!! Form::open(['method' => 'POST','route'=> ['query-update',$vendor->id,$datas->id,], 'style' => 'display:inline']) !!}
                    {!! Form::text('maindate',null,['class'=>'maindate']) !!}

                      {{-- <input class="maindate"> --}}
                    </td>
                    <td>
                      {!! Form::text('time') !!}
                    </td>
                    <td>

                      {!! Form::text('advance')!!}<span style="color:red;">*</span>
                      <p style="color:red;">{{ $errors->first('advance') }}</p>

                    </td>
                    <td>

                      {!! Form::text('total') !!}<span style="color:red;">*</span>
                      <p style="color:red;">{{ $errors->first('total') }}</p>

                    </td>
                    <td>
                      <center>

                          {!! Form::button('<span class="glyphicon glyphicon-ok" style="" aria-hidden="true"></span>',['class'=> 'btn btn-success a-btn-slide-text','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Click if it is available']) !!}
                          {!! Form::close()!!}
                          {!! Form::open(['method' => 'POST','route'=> ['no-update',$vendor->id,$datas->id,], 'style' => 'display:inline']) !!}
                          {!! Form::button('<span class="glyphicon glyphicon-remove" style="" aria-hidden="true"></span>',['class'=> 'btn btn-danger a-btn-slide-text','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Click if not available']) !!}
                          {!! Form::close()!!}
                          {{-- <a href="#" class="btn btn-danger a-btn-slide-text"style="padding:10px auto;">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                          </a> --}}

                      </center>
                    </td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->

      </div>
      {{-- End of Vendor Query --}}

      {{-- Ayojok Service Bookable Query --}}
      <div class="col-md-12" style="margin-top:2rem;">

        <div class="box box-info ">
          <div class="box-header">
            <h3 class="box-title">Service Book</h3>
          </div><!-- /.box-header -->
          <div class="box-body table-responsive">
            <table id="service" class="table table-bordered table-striped">
              <thead>
                  <tr>
                    <th>ID</th>
                    <th>Catagory</th>
                    <th>Service Name</th>
                    <th>Service Price</th>
                    <th>Date</th>
                    <th>Message</th>
                    <th>Main Date</th>
                    <th>Shift/Time</th>
                    <th>Advance</th>
                    <th>Total</th>
                    <th>Action</th>
                  </tr>
              </thead>
              <tbody>


                  @foreach ($services as $service)
                    <tr>
                      <td>{{$service->id}}</td>
                      <td style="text-transform:uppercase;">{{$service->catagory->name}}</td>
                      <td>{{$service->product->title}}</td>
                      <td>{{$service->product->price}} BDT</td>
                      <td>{{$service->date}}</td>
                      <td>{{$service->mess}}</td>
                      <td>
                        {!! Form::open(['method' => 'POST','route'=> ['query-update',$service->id] ]) !!}
                        {!! Form::text('maindate',null,['class'=>'maindate']) !!}
                      </td>
                      <td>
                          {!! Form::text('time') !!}
                      </td>
                      <td>
                        {!! Form::text('advance') !!}<span style="color:red;">*</span>
                        <p style="color:red;">{{ $errors->first('advance') }}</p>
                      </td>
                      <td>
                        {!! Form::text('total') !!}<span style="color:red;">*</span>
                        <p style="color:red;">{{ $errors->first('total') }}</p>
                      </td>
                      {{-- <td>
                        <center>
                          <a href="#" class="btn btn-success a-btn-slide-text"style="padding:10px auto;">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                          </a>
                          <a href="#" class="btn btn-danger a-btn-slide-text"style="padding:10px auto;">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                          </a>
                        </center>
                      </td> --}}
                      <td>
                        <center>


                            {!! Form::button('<span class="glyphicon glyphicon-ok" style="" aria-hidden="true"></span>',['class'=> 'btn btn-success a-btn-slide-text','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Click if it is available']) !!}
                            {!! Form::close()!!}
                            {!! Form::open(['method' => 'POST','route'=> ['no-update',$service->id,$datas->id,], 'style' => 'display:inline']) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-remove" style="" aria-hidden="true"></span>',['class'=> 'btn btn-danger a-btn-slide-text','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Click if not available']) !!}
                            {!! Form::close()!!}
                            {{-- <a href="#" class="btn btn-danger a-btn-slide-text"style="padding:10px auto;">
                              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </a> --}}

                        </center>
                      </td>
                    </tr>
                  @endforeach



              </tbody>

            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
      {{-- End of Ayojok Service Bookable Query --}}


    </section><!-- /.content -->
  </div>

@endsection

@push('scripts')

  <script>

  $('.maindate').datepicker({
    multidate: true,
    todayHighlight: true
});
  $(function () {
    $('#vendor,#service').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  </script>
@endpush
