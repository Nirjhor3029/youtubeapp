@extends('layouts.admin')

@push('css')
  <style>
  img{
    max-width:30rem;
    margin: 0.5rem;
  }
  </style>
@endpush

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Service
      </h1>
    </section>

    <section class="maincontent">

      <div class="col-md-12" style="margin-top:2rem;">

        <div class="box box-primary">
          <div class="box-body" style="margin-top:2rem;">
            <div class="col-md-6" style="margin-bottom:2rem;">
              <form action="{{route('service.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="service_name" class="control-label col-md-2">Service Title:</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" id="service_name" placeholder="Enter name" name="service_title" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="service_price" class="control-label col-md-2">Service Price:</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" id="service_price" placeholder="Enter Price (BDT)" name="service_price" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="service_price" class="control-label col-md-2">Price Suffix:</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" id="price_suffix" placeholder="Enter Suffix, ex: Per Piece/Per Day" name="price_suffix" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-2" for="service_catagory">Catagory:</label>
                  <div class="col-md-10">
                    <select style="padding: 5px;" class="form-control" id="service_catagory" name="service_catagory" required>
                      <option value="">-- Select any type --</option>
                      @foreach ($catagories as $catagory)
                        <option value="{{$catagory->id}}" style="text-transform:capitalize;">{{$catagory->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-2" for="short_description">Short Description:</label>
                  <div class="col-md-10">
                    <textarea rows="2" class="form-control" id="short_description" placeholder="Enter short description" name="short_description" required></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-2" for="long_description">Long Description:</label>
                  <div class="col-md-10">
                    <textarea rows="5" class="form-control" id="long_description" placeholder="Enter deatils description" name="long_description" required></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-2" for="seller_contact">Seller Contact Deatils</label>
                  <div class="col-md-10">
                    <textarea rows="3" class="form-control" id="seller_contact" placeholder="Seller Contact Details" name="seller_contact" required></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-2" for="feature_image">Feature Image:</label>
                  <div class="col-md-10">
                    <input type="file" name="feature_image" id="feature_image" accept="image/*" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-2" for="extra_image">Extra Image:</label>
                  <div class="col-md-10">
                    <input type="file" name="extra_image[]" id="extra_image" accept="image/*" class="form-control" multiple>
                  </div>
                </div>

                <div class="form-group">
                  <button class="btn btn-primary pull-right" type="submit" >Upload service</button>
                </div>

              </form>
            </div>
            <div class="col-md-6">
              <label for="Feature Image">Feature Image</label>
              {{-- <img src="http://via.placeholder.com/400x400" alt="" style="width:20rem;"> --}}
              <div id="feature-preview"></div>
              <label for="Extra Image">Extra Image</label>
              <div id="extra-preview"></div>
            </div>

          </div><!-- /.box-body -->
        </div><!-- /.box -->

      </div>



    </section><!-- /.content -->
  </div>

@endsection

@push('scripts')
  <script>
  function previewfeatureImage() {
    var $preview = $('#feature-preview').empty();
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

  function previewextraImages() {

    if(this.files.length > 4){
      alert('Too many files');
      var $preview = $('#extra-preview').empty();
    }else{
      var $preview = $('#extra-preview').empty();
      if (this.files) $.each(this.files, readAndPreview);
    }

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

  $('#extra_image').on("change", previewextraImages);
  $('#feature_image').on("change", previewfeatureImage);
  </script>
@endpush
