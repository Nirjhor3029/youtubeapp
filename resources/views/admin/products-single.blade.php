@extends('layouts.admin')

@push('css')

@endpush

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{$datas[0]->title}}
      </h1>
    </section>

    <section class="maincontent">

      <div class="col-md-12" style="margin-top:2rem;">

        <div class="box box-primary">
          <div class="box-body table-responsive">
            @foreach ($datas as $data)
              <div class="col-lg-3">
                <img src="{{asset($data->image)}}" alt="{{$data->title}}" style="width:35rem;padding:1rem 0;">
                @foreach ($data->images as $image)
                    <img src="{{asset($image->img_location)}}" alt="{{$data->title}}" style="width:8.5rem;padding:1rem 0;">
                @endforeach
              </div>
              <div class="col-lg-9">
                <h3>{{$data->title}}</h3>
                <h4 style="font-weight:800;">{{$data->price}} BDT - {{$data->suffix}}</h4>
                <h4 style="text-transform:capitalize">{{$data->catagory->name}}</h4>
                <br>
                <h4 style="font-weight:600;">Short Description :</h4>
                <p>{{$data->short_des}}</p>
                <h4 style="font-weight:600;">Long Description :</h4>
                <p>{{$data->long_des}}</p>
                <h4 style="font-weight:600;">Seller Contact :</h4>
                <p>{{$data->contact or "Not Available"}}</p>
              </div>
            @endforeach
          </div><!-- /.box-body -->
        </div><!-- /.box -->

      </div>



    </section><!-- /.content -->
  </div>

@endsection

@push('scripts')

@endpush
