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
        Product Edit
      </h1>
    </section>

    <section class="maincontent">

      <div class="col-md-12" style="margin-top:2rem;">

        <div class="box box-primary">
          <div class="box-body table-responsive">
            <div class="col-md-6">
              @foreach ($datas as $data)

                <form action="{{route('service.update',['id'=>$data->id])}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  <input type="hidden" name="_method" value="PATCH">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="product_name" class="control-label col-md-2">Product Name:</label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" id="product_name" placeholder="Enter name" name="service_title" value="{{$data->title or ""}}" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="product_price" class="control-label col-md-2">Product Price:</label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" id="product_price" placeholder="Enter Price" name="service_price" value="{{$data->price or ""}}" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-2" for="seller_contact">Seller Contact Deatils</label>
                    <div class="col-md-10">
                      <textarea rows="3" class="form-control" id="seller_contact" placeholder="Seller Contact Details" name="seller_contact" required>{{$data->contact or ""}}</textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="product_price" class="control-label col-md-2">Product Suffix:</label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" id="product_suffix" placeholder="Enter Product Suffix" name="price_suffix" value="{{$data->suffix or ""}}" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="short_description" class="control-label col-md-2">Short Description</label>
                    <div class="col-md-10">
                      <textarea rows="2" class="form-control" id="short_description" placeholder="Enter Short Description" name="short_description" required>{{$data->short_des or ""}}</textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-2" for="long_description">Long Description:</label>
                    <div class="col-md-10">
                      <textarea rows="5" class="form-control" id="product_description" placeholder="Enter Long Description" name="long_description" required>{{$data->long_des or ""}}</textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-2" for="feature_image">Feature Image:</label>
                    <div class="col-md-10">
                      <input type="file" name="feature_image" id="feature_image" accept="image/*" class="form-control" multiple>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-2" for="extra_image">Extra Image:</label>
                    <div class="col-md-10">
                      <input type="file" name="extra_image[]" id="extra_image" accept="image/*" class="form-control" multiple>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <button class="btn btn-primary pull-right" type="submit" >Upload Product</button>
                  </div>

                </form>

              @endforeach
            </div>
            <div class="col-md-6">
              <label for="Feature Image">New Feature Image</label>
              {{-- <img src="http://via.placeholder.com/400x400" alt="" style="width:20rem;"> --}}
              <div id="feature-preview"></div>
              <label for="Extra Image">Extra Image</label>
              <div id="extra-preview"></div>
              <hr>
              <div class="row">
                <label class="control-label col-md-3" for="product_imgae">Old Feature Image:</label>
                <div class="col-md-9">
                  <img src="{{asset($data->image)}}" alt="{{$data->title}}" style="width:15rem;">
                </div>
                <label class="control-label col-md-3" for="product_imgae">Old Extra Image:</label>
                <div class="col-md-9">
                  @foreach ($data->images as $image)
                    <img src="{{asset($image->img_location)}}" alt="{{$image->products_id}}" style="width:15rem;">
                  @endforeach
                </div>
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
