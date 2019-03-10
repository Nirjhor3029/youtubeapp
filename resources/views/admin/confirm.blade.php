@extends('layouts.admin')

@push('css')

@endpush

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Confirm List
      </h1>
    </section>

    <section class="maincontent">

      <div class="col-md-12" style="margin-top:2rem;">

        <div class="box box-danger">
          <div class="box-body table-responsive">
            <table id="table" class="table table-bordered">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Ph No</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($datas as $data)
                    <tr>
                      <td>{{$data->user->name}} - ({{$data->user->fname}}{{$data->user->lame}})</td>
                      <td>{{$data->user->contact or ""}}</td>
                      <td>{{$data->user->email or ""}}</td>
                      <td>
                        <center>
                          <a href="{{url('/admin/confirm/'.$user = $data->user_id)}}" class="btn btn-primary">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                          </a>
                          </center>
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
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
        "order": [[ 4, "desc" ]]
      })
    })
    </script>
  @endpush
