@extends('layouts.admin')

@push('css')

@endpush

@section('content')

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Invoice ID : #{{$invoice->id}}
        </h1>
      </section>

      <section class="maincontent">
        <div class="col-lg-6" style="margin-top:2rem;">
          <div class="box box-info">
            <div class="box-body">
              <label for="bkashusednum" class="control-label col-md-4">Sender Bkash Number:</label>
              <div class="col-md-8">
                <p>{{$bkash->used_num}}</p>
              </div>
              <label for="trxid" class="control-label col-md-4">Transaction ID:</label>
              <div class="col-md-8">
                <p>{{$bkash->trxid}}</p>
              </div>
              <label for="bkaskcomm" class="control-label col-md-4">Comment:</label>
              <div class="col-md-8">
                <p>{{$bkash->comment or ""}}</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12" style="margin-top:2rem;">

          <div class="box box-danger">
            <div class="box-body table-responsive">
              <table id="table" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Catagory</th>
                    <th>Service</th>
                    <th>Time</th>
                    <th>Paid</th>
                    <th>Total</th>
                    <th>Due</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($datas as $data)
                      <tr>
                        <td>#0{{$data->id}}{{$data->user_id}}</td>
                        <td>{{$data->order_date}}</td>
                        <td style="text-transform: capitalize;">{{$data->catagory->name}}</td>
                        <td>{{$data->vendor->title or $data->product->title}}</td>
                        <td>{{$data->time}}</td>
                        <td>{{$data->advance}}</td>
                        <td>{{$data->total}}</td>
                        <td>
                          @if ('is_paid' == 1)
                            {{__("Paid")}}
                          @else
                            {{$data->total - $data->advance}}</td>
                          @endif
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

@endpush
