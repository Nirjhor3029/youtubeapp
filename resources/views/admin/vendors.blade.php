@extends('layouts.admin')

@push('css')

@endpush

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Vendors List
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
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>
                      <center>
                        <a href="{{route('vendors.show',['id'=>$data->id,'catagoryid'=>$data->catagory->id])}}" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="View Product">
                          <span class="glyphicon glyphicon-eye-open" style="" aria-hidden="true"></span>
                        </a>
                        <a href="{{route('vendors.edit',$data->id)}}" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Edit Product">
                          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                        @if ($data->status == 0)
                          {{-- Suspend Button --}}
                          {!! Form::open(['method' => 'POST','route'=> ['vendors.suspend', $data->id,'catagoryid'=>$data->catagory->id], 'style' => 'display:inline']) !!}
                          {!! Form::button('<span class="glyphicon glyphicon-minus-sign" style="" aria-hidden="true"></span>',['class'=> 'btn btn-warning','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Inactive Vendor']) !!}
                          {!! Form::close()!!}
                        @else
                          {{-- Active Button --}}
                          {!! Form::open(['method' => 'POST','route'=> ['vendors.active', $data->id,'catagoryid'=>$data->catagory->id], 'style' => 'display:inline']) !!}
                          {!! Form::button('<span class="glyphicon glyphicon-plus-sign" style="" aria-hidden="true"></span>',['class'=> 'btn btn-info','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Active Vendor']) !!}
                          {!! Form::close()!!}
                        @endif
                        {{-- Delete Button --}}
                        {!! Form::open(['method' => 'DELETE','route'=> ['vendors.destroy', $data->id,'catagoryid'=>$data->catagory->id], 'style' => 'display:inline']) !!}
                        {!! Form::button('<span class="glyphicon glyphicon-remove" style="" aria-hidden="true"></span>',['class'=> 'btn btn-danger','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Remove Vendor','onclick'=>'return deleteAlert()'])  !!}
                        {!! Form::close()!!}
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

    function deleteAlert(){
      //alert("alert");
      var x = confirm("Are you sure you want to delete this data ? ");
      return x;
    }
  </script>
@endpush
