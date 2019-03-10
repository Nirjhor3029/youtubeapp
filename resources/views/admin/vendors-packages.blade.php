@extends('layouts.admin')

@push('css')

@endpush

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Packages Vendors List
      </h1>
    </section>

    <section class="maincontent">

      <div class="col-md-12" style="margin-top:2rem;">

        <div class="box box-primary">
          <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th>Catagory</th>
                  <th>Name</th>
                  <th>Package Status</th>
                  <th>Gallery Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($datas as $data)
                  @if ($data->catagory_id != 18)
                    <tr>
                      <td>{{$data->id}}</td>
                      <td>
                        @if (!empty($data->logo))
                          <img src="{{asset($data->logo)}}" alt="{{$data->title}}" style="width:8rem">
                        @else
                          <img src="{{asset('img\vendor-logo\vendor_logo_default.jpg')}}" alt="Ayojok Vendors" style="width:8rem">
                        @endif
                      </td>
                      <td style="text-transform:uppercase;">{{$data->catagory->name}}</td>
                      <td>{{$data->title}}</td>
                      <td>
                        @if (count($data->packages) > 0)
                          Available
                        @else
                          <span style="color:red">Not Available</span>
                        @endif
                        {{-- {{$data->packages}} --}}
                      </td>
                      <td>N/A</td>
                      <td>
                        <center>
                          <a href="{{route('vendors.show',['id'=>$data->id,'catagoryid'=>$data->catagory->id])}}" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="View Details">
                            <span class="glyphicon glyphicon-eye-open" style="" aria-hidden="true"></span>
                          </a>
                          {{-- <a href="{{route('vendor.addPack',$data->id)}}" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Edit Package">
                            <span class="glyphicon glyphicon-pencil" style="" aria-hidden="true"></span>
                          </a> --}}
                          <a href="{{route('vendor.getPack',$data->id)}}" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Add Packages">
                            <span class="glyphicon glyphicon-plus" style="" aria-hidden="true"></span>
                          </a>
                          <a href="{{route('vendor.getGalleries',$data->id)}}" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Add Galleries">
                            <span class="glyphicon glyphicon-plus" style="" aria-hidden="true"></span>
                          </a>
                        </center>
                      </td>
                    </tr>
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
