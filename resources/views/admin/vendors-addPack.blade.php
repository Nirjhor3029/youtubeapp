@extends('layouts.admin')

@push('css')
  <style media="screen">
  img{
    max-width:50rem;
    margin: 0.5rem;
  }
  </style>
@endpush

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Packages
      </h1>
    </section>

    <section class="maincontent">
      <div class="col-md-12" style="margin-top:2rem;">
        <div class="box box-info">
          <div class="box-body" style="margin-top:2rem;">
            <div class="col-lg-6">
              {!! Form::open(['method' => 'POST','route'=> ['vendor.addPack',$datas->id],'files' => true]) !!}
              <div class="form-group">
                <label for="package_title">Package Name :</label>
                <input type="text" class="form-control" id="package_title" name="package_title" placeholder="Enter name">
              </div>
              <div class="form-group">
                <label for="package_price">Package Price :</label>
                <input type="text" class="form-control" id="package_price" name="package_price" placeholder="Enter price">
              </div>
              <div class="form-group">
                <label for="package_description">Package Description :</label>
                <textarea class="form-control" id="package_description" name="package_description" placeholder="Enter price"></textarea>
              </div>
              <div class="form-group" style="margin-bottom:8rem;">
                <label class="" for="package_image">Package Image:</label>
                <p>Max (600x400)</p>
                <div class="col-lg-6">
                  <input type="file" name="package_image" id="package_image" accept="image/*" class="form-control">
                </div>
              </div>
              {!! Form::button('Add Package',['class'=> 'btn btn-success','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Add Packages']) !!}
              {!! Form::close()!!}
            </div>
            <div class="col-lg-6">
              <label for="package_image">Package Image Preview</label>
                <div id="package-preview"></div>
            </div>
          </div>
        </div>
        <div class="col-md-12" style="margin-top:2rem;">
          <div class="box box-primary">
            <div class="box-body" style="margin-top:2rem;">
              @foreach ($datas->packages as $package)
                <div class="col-lg-12" style="margin-bottom:2rem">
                  <div class="col-lg-2">
                    <p>{{$package->title}}</p>
                  </div>
                  <div class="col-lg-1">
                    <p>{{$package->price}}</p>
                  </div>
                  <div class="col-lg-5">
                    <p>{{$package->description}} BDT</p>
                  </div>
                  <div class="col-lg-3 text-center">
                    <img src="{{asset($package->image)}}" alt="{{$package->title}}" style="width:20%;">
                  </div>
                  <div class="col-lg-1 text-center">
                    {{-- Delete Button --}}
                    {!! Form::open(['method' => 'POST','route'=> ['vendor.deletePack', $package->id], 'style' => 'display:inline']) !!}
                    {!! Form::button('<span class="glyphicon glyphicon-remove" style="" aria-hidden="true"></span>',['class'=> 'btn btn-danger','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Remove Packages']) !!}
                    {!! Form::close()!!}
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </section>

    </div>
  @endsection

  @push('scripts')
    <script type="text/javascript">
    $('#package_image').on("change", previewpackageImage);
    function previewpackageImage() {
      var $preview = $('#package-preview').empty();
      if (this.files) $.each(this.files, readAndPreview);

      function readAndPreview(i, file) {

        if (!/\.(jpe?g|png|gif)$/i.test(file.name)){
          return alert(file.name +" is not an image");
        }
        var reader = new FileReader();

        $(reader).on("load", function() {
          $preview.append($("<img/>", {src:this.result}));
        });

        reader.readAsDataURL(file);

      }
    }
    </script>
  @endpush
