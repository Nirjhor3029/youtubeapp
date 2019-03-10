@extends('layouts.admin')

@push('css')

@endpush

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product List
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
                  <th>Price</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($datas as $data)
                  <tr>
                    <td>{{$data->id}}</td>
                    <td><img src="{{asset($data->image)}}" alt="{{$data->title}}" style="width:8rem"></td>
                    <td style="text-transform:uppercase;">{{$data->catagory->name}}</td>
                    <td>{{$data->title}}</td>
                    <td>{{$data->price}} BDT</td>
                    <td>
                      <center>
                        <a href="{{route('service.show',$data->id)}}" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="View Product">
                          <span class="glyphicon glyphicon-eye-open" style="" aria-hidden="true"></span>
                        </a>
                        <a href="{{route('service.edit',$data->id)}}" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Edit Product">
                          <span class="glyphicon glyphicon-pencil" style="" aria-hidden="true"></span>
                        </a>
                        @if ($data->status == 0)
                          {{-- Suspend Button --}}
                          {!! Form::open(['method' => 'POST','route'=> ['service.suspend', $data->id], 'style' => 'display:inline']) !!}
                          {!! Form::button('<span class="glyphicon glyphicon-minus-sign" style="" aria-hidden="true"></span>',['class'=> 'btn btn-warning','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Inactive Product']) !!}
                          {!! Form::close()!!}
                        @else
                          {{-- Active Button --}}
                          {!! Form::open(['method' => 'POST','route'=> ['service.active', $data->id], 'style' => 'display:inline']) !!}
                          {!! Form::button('<span class="glyphicon glyphicon-plus-sign" style="" aria-hidden="true"></span>',['class'=> 'btn btn-info','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Active Product']) !!}
                          {!! Form::close()!!}
                        @endif
                        {{-- Delete Button --}}
                        {!! Form::open(['method' => 'DELETE','route'=> ['service.destroy', $data->id], 'style' => 'display:inline','onsubmit'=>'return confirmDelete()']) !!}
                        {!! Form::button('<span class="glyphicon glyphicon-remove" style="" aria-hidden="true"></span>',['class'=> 'btn btn-danger','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Remove Product']) !!}
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

  <script>
    function confirmDelete(){
      sts = confirm("are you sure to delete your products ?!!");
      if(sts){
        return true;
      }else{
        return false;
      }
    }
  </script>

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
