@extends('layouts.admin')

@push('css')

@endpush

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Message
      </h1>
    </section>

    <section class="maincontent">

      <div class="col-md-8" style="margin-top:2rem;">

        <div class="box box-danger">
          <div class="box-body">
            <div class="details">

                <label for="id" class="control-label col-md-4">Message ID:</label>
                <div class="col-md-8">
                  <p>{{$datas->first()->id}}</p>
                </div>
                <label for="datetime" class="control-label col-md-4">Date & Time</label>
                <div class="col-md-8">
                  <p>{{$datas->first()->updated_at}}</p>
                </div>
                <label for="email" class="control-label col-md-4">Email:</label>
                <div class="col-md-8">
                  <p>{{$datas->first()->email}}</p>
                </div>
                <label for="name" class="control-label col-md-4">Name:</label>
                <div class="col-md-8">
                    <p>{{$datas->first()->name}}</p>
                </div>
                <label for="contact" class="control-label col-md-4">Contact:</label>
                <div class="col-md-8">
                  <p>{{$datas->first()->phone}}</p>
                </div>
                <label for="mess" class="control-label col-md-4">Message:</label>
                <div class="col-md-8">
                  <p>{{$datas->first()->messbody}}</p>
                </div>

            </div>
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
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
    </script>
  @endpush
