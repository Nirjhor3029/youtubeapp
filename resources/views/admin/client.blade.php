@extends('layouts.admin')

@push('css')

@endpush

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Client List
      </h1>
    </section>

    <section class="maincontent">

      <div class="col-md-12" style="margin-top:2rem;">

        <div class="box box-danger">
          <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Ph No</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($datas as $data)
                  <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->name}} - ({{$data->fname}}{{$data->lname}})</td>
                    <td>{{$data->contact}}</td>
                    <td>{{$data->email}}</td>
                    <td>
                      <center>
                          <a href="{{url('/admin/client/'.$id = $data->id)}}" class="btn btn-primary">
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
      $('#example1').DataTable({
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
