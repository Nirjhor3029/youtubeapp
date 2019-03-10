@extends('layouts.admin')

@push('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <style>
  img{
    max-width:30rem;
    margin: 0.5rem;
  }
  .select2 {
  width:100%!important;
  }
  </style>
@endpush

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Vendor
      </h1>
    </section>

    <section class="maincontent">

      <div class="col-md-12" style="margin-top:2rem;">

        <div class="box box-primary">
          <div class="box-body" style="margin-top:2rem;">
            <form action="{{route('vendors.update',['id'=>$vendata->id])}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
              <div class="col-md-6" style="margin-bottom:2rem;">
                <input type="hidden" name="_method" value="PATCH">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="vendor_name" class="control-label col-md-3">Vendor Name: <span style="color:red;">*</span> </label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" id="vendor_name" placeholder="Enter name" name="vendor_title" value="{{$vendata->title or ""}}" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="about_us">Vendor About Us: <span style="color:red;">*</span> </label>
                  <div class="col-md-9">
                    <textarea rows="5" class="form-control" id="about_us" placeholder="Enter about us" name="about_us" >{{$vendata->about_us or ""}}</textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="vendor_contact">Vendor Contact : <span style="color:red;">*</span> </label>
                  <div class="col-md-9">
                    <textarea rows="3" class="form-control" id="vendor_contact" placeholder="Enter contact us" name="vendor_contact" required>{{$vendata->contact or ""}}</textarea>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-9">
                    <input type="hidden" class="form-control" id="vendor_catagory" name="vendor_catagory" value="{{$vendata->catagory_id or ""}}" required>
                  </div>
                </div>

                <hr>

                <div class="form-group">
                  <label for="startingat_1_title" class="control-label col-md-4">Starting Price Title (Catagory 1): <span style="color:red;">*</span> </label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" id="startingat_1_title" placeholder="Enter name" name="startingat_1_title" value="{{$vendata->startingat_1_title or ""}}" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="startingat_1_price" class="control-label col-md-4">Starting Price Price (Catagory 1): <span style="color:red;">*</span> </label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" id="startingat_1_price" placeholder="Enter name" name="startingat_1_price" value="{{$vendata->startingat_1_price or ""}}" required>
                  </div>
                </div>

                <hr>

                <div class="form-group">
                  <label for="startingat_1_title" class="control-label col-md-4">Starting Price Title (Catagory 2):</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" id="startingat_2_title" placeholder="Enter name" name="startingat_2_title" value="{{$vendata->startingat_2_title or ""}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="startingat_1_price" class="control-label col-md-4">Starting Price Price (Catagory 2):</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" id="startingat_2_price" placeholder="Enter name" name="startingat_2_price" value="{{$vendata->startingat_2_price or ""}}">
                  </div>
                </div>

                <hr>

                <div class="form-group">
                  <label for="startingat_1_title" class="control-label col-md-4">Starting Price Title (Catagory 3):</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" id="startingat_3_title" placeholder="Enter name" name="startingat_3_title" value="{{$vendata->startingat_3_title or ""}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="startingat_1_price" class="control-label col-md-4">Starting Price Price (Catagory 3):</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" id="startingat_3_price" placeholder="Enter name" name="startingat_3_price" value="{{$vendata->startingat_3_price or ""}}">
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <table class="table table-responsive">
                  <tbody>
                    <tr>
                      <td>
                        <div class="form-group">
                          <label for="feature1" class="control-label">Feature 1: <span style="color:red;">*</span> </label>
                          <input type="text" class="form-control" id="feature1" name="feature1" placeholder="Feature 1" value="{{$data->feature_1 or ""}}" required>
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <label for="feature2" class="control-label">Feature 2: <span style="color:red;">*</span> </label>
                          <input type="text" class="form-control" id="feature2" name="feature2" placeholder="Feature 2" value="{{$data->feature_2 or ""}}" required>
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <label for="feature3" class="control-label">Feature 3: <span style="color:red;">*</span> </label>
                          <input type="text" class="form-control" id="feature3" name="feature3" placeholder="Feature 3" value="{{$data->feature_3 or ""}}" required>
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <label for="feature4" class="control-label">Feature 4: <span style="color:red;">*</span> </label>
                          <input type="text" class="form-control" id="feature4" name="feature4" placeholder="Feature 4" value="{{$data->feature_4 or ""}}" required>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <div class="form-group">
                          <label for="feature5" class="control-label">Feature 5: <span style="color:red;">*</span> </label>
                          <input type="text" class="form-control" id="feature5" name="feature5" placeholder="Feature 5" value="{{$data->feature_5 or ""}}" required>
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <label for="feature6" class="control-label">Feature 6: <span style="color:red;">*</span> </label>
                          <input type="text" class="form-control" id="feature6" name="feature6" placeholder="Feature 6" value="{{$data->feature_6 or ""}}" required>
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <label for="feature7" class="control-label">Feature 7:</label>
                          <input type="text" class="form-control" id="feature7" name="feature7" placeholder="Feature 7" value="{{$data->feature_7 or ""}}">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <label for="feature8" class="control-label">Feature 8:</label>
                          <input type="text" class="form-control" id="feature8" name="feature8" placeholder="Feature 8" value="{{$data->feature_8 or ""}}">
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>

                <div class="form-group">
                  <label class="control-label col-md-2" for="lowest_price">Lowest Price: (BDT)</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" id="lowest_price" name="lowest_price" placeholder="Enter the lowest price for the filter" value="{{$data->low_price or ""}}" required>
                  </div>
                </div>

                <div class="form-group" id="venue_area" style="display:none;">
                  <label class="control-label col-md-2" for="venue_area">Area:</label>
                  <div class="col-md-10">
                    <select class="form-control" name="venue_area" id="venue_area_select">
                      <option value="">-- Area In The City --</option>
                      <option class="option" value="destination wedding">destination wedding</option>
                      <option class="option" value="uttara">Uttara</option>
                      <option class="option" value="Lalmatia-Dhanmondi">Lalmatia - Dhanmondi</option>
                      <option class="option" value="Paltan-Motijheel">Paltan - Motijheel</option>
                      <option class="option" value="Badda-Banasree">Badda - Banasree</option>
                      <option class="option" value="gulshan-banani">Gulshan - Banani</option>
                      <option class="option" value="Rampura-Khilgaon">Rampura - Khilgaon</option>
                      <option class="option" value="Rajarbag-Shantinagar">Rajarbag - Shantinagar</option>
                      <option class="option" value="Magbazar - Eskaton">Magbazar - Eskaton</option>
                      <option class="option" value="mirpur-pallabi">Mirpur - Pallabi</option>
                      <option class="option" value="Lalbag-Azimpur">Lalbag - Azimpur</option>
                      <option class="option" value="shamoli-mohammadpur">Shamoli - Mohammadpur</option>

                      <option class="option" value="Mohakhali-Khilgaon">Mohakhali - Khilgaon</option>

                    </select>
                  </div>
                </div>

                <div class="form-group" id="kazi_area" style="display:none;">
                  <label class="control-label col-md-2" for="kazi_area">Area:</label>
                  <div class="col-md-10">
                    <select class="form-control" name="kazi_area" id="kazi_area_select">
                      <option value="">Area In The City</option>
                      <option class="option" value="uttara">Uttara</option>
                      <option class="option" value="Shamoli-Mohammadpur">Shamoli - Mohammadpur</option>
                      <option class="option" value="Magbazar-Eskaton">Magbazar - Eskaton</option>
                      <option class="option" value="Badda-Banasree">Badda - Banasree</option>
                      <option class="option" value="Baridhara-Bosundhara">Baridhara - Bosundhara</option>
                      <option class="option" value="Firmget-Mohakhali">Firmget - Mohakhali</option>
                      <option class="option" value="Old-dhaka">Old Dhaka</option>
                      <option class="option" value="Lalbag-Azimpur">Lalbag - Azimpur</option>
                      <option class="option" value="Mirpur-Pallabi">Mirpur - Pallabi</option>
                      <option class="option" value="Cantonment-Kafrul">Cantonment - Kafrul</option>
                      <option class="option" value="Paltan-Motijheel">Paltan - Motijheel</option>
                      <option class="option" value="Gulshan-Banani">Gulshan - Banani</option>
                      <option class="option" value="Lalmatia-Dhanmondi">Lalmatia - Dhanmondi</option>
                      <option class="option" value="Rampura-Khilgaon">Rampura - Khilgaon</option>
                    </select>
                  </div>
                </div>

                <div class="form-group" id="menu_type" style="display:none;">
                  <label class="control-label col-md-2" for="menu_type">Menu Type:</label>
                  <div class="col-md-10">
                    <select class="form-control" id="menu_type_select" name="menu_type[]" multiple="multiple">
                      <option class="option" value="fixed">Fixed Menu</option>
                      <option class="option" value="chef">Chef Only</option>
                    </select>
                  </div>
                </div>

                <div class="form-group" id="event_type" style="display:none;">
                  <label class="control-label col-md-2" for="event_type">Event Type:</label>
                  <div class="col-md-10">
                    <select class="form-control" id="event_type_select" name="event_type[]" multiple="multiple">
                      <option class="option" value="wedding">Wedding</option>
                      <option class="option" value="birthday">Birthday</option>
                      <option class="option" value="corporate">Corporate</option>
                    </select>
                  </div>
                </div>

                <div class="form-group" id="speciality" style="display:none;">
                  <label class="control-label col-md-2" for="speciality">Speciality:</label>
                  <div class="col-md-10">
                    <select class="form-control" id="speciality_select" name="speciality[]" multiple="multiple">
                      <option class="option" value="paper">Paper Made</option>
                      <option class="option" value="wood">Wood Made</option>
                      <option class="option" value="hand">Hand Made</option>
                    </select>
                  </div>
                </div>

                <div class="form-group" id="bakery_speciality" style="display:none;">
                  <label class="control-label col-md-2" for="bakery_speciality">Bakery Speciality:</label>
                  <div class="col-md-10">
                    <select class="form-control" id="bakery_speciality_select" name="bakery_speciality[]" multiple="multiple">
                      <option class="option" value="birthday">Birthday Pastry</option>
                      <option class="option" value="wedding">Wedding Pastry</option>
                      <option class="option" value="snacks">Snacks</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="control-label col-lg-2">
                    <label class="" for="profile_image">Profile Image:</label>
                    <p>Max (600x600)</p>
                  </div>
                  <div class="col-lg-4">
                    <input type="file" name="profile_image" id="profile_image" accept="image/*" class="form-control">
                  </div>
                  <div class="col-md-4">
                    <label for="profile_image">Profile Image Preview</label>
                    <div id="profile-preview"></div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="control-label col-lg-2">
                    <label class="" for="logo_image">Logo Image:</label>
                    <p>Max (600x600)</p>
                  </div>
                  <div class="col-lg-4">
                    <input type="file" name="logo_image" id="logo_image" accept="image/*" class="form-control">
                  </div>
                  <div class="col-md-4">
                    <label for="Feature Image">Logo Image Preview</label>
                    <div id="logo-preview"></div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="control-label col-lg-2">
                    <label class="" for="feature_image">Feature Image:</label>
                    <p>Max (600x400)</p>
                  </div>
                  <div class="col-lg-4">
                    <input type="file" name="feature_image[]" id="feature_image" accept="image/*" class="form-control" multiple>
                  </div>
                  <div class="col-lg-4">
                    <label for="Extra Image">Feature Image Preview</label>
                    <div id="feature_image_preview"></div>
                  </div>
                </div>

              </div>
              <div class="col-lg-6">
                <button class="btn btn-primary" type="submit" >Update Vendor</button>
              </div>
            </form>
          </div><!-- /.box-body -->
        </div><!-- /.box -->

      </div>
      <div class="col-lg-12">
        <div class="col-lg-4 text-center">
          <label for="Profile Image">Logo Profile Preview</label>
          <div id="old-profile-preview"> <img src="{{asset($vendata->profile_img)}}" alt="old-profile-preview"> </div>
        </div>
        <div class="col-lg-4 text-center">
          <label for="Old Logo Image">Old Logo Image Preview</label>
          <div id="old-logo-preview"> <img src="{{asset($vendata->logo)}}" alt="old-logo-preview"> </div>
        </div>
        <div class="col-lg-4 text-center">
          <label for="Old Feature Image">Old Feature Image Preview</label>
          <div id="old-feature-preview">
            <img src="{{asset($vendata->feature_image_1)}}" alt="old-feature-preview">
            <img src="{{asset($vendata->feature_image_2)}}" alt="old-feature2-preview">
            <img src="{{asset($vendata->feature_image_3)}}" alt="old-feature3-preview">
          </div>
        </div>
      </div>



    </section><!-- /.content -->
  </div>


@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script>
  $('#menu_type_select,#event_type_select,#speciality_select,#bakery_speciality_select,#venue_area_select,#home_service_select').select2();
  function previewprofileImage() {
    var $preview = $('#profile-preview').empty();
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

  function previewlogoImage() {
    var $preview = $('#logo-preview').empty();
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

  function previewfeatureImages() {

    if(this.files.length > 3){
      alert('Too many files');
      var $preview = $('#feature_image_preview').empty();
    }else{
      var $preview = $('#feature_image_preview').empty();
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

  $('#profile_image').on("change", previewprofileImage);
  $('#logo_image').on("change", previewlogoImage);
  $('#feature_image').on("change", previewfeatureImages);

  $(window).on('load', function () {
    //alert($("#vendor_catagory").val());
    if ($("#vendor_catagory").val() == '9') {
      $("#venue_area").css('display', ($("#vendor_catagory").val() == '9') ? 'block' : 'none').attr('required',true);
      $("#venue_area option[value='{{$data->area}}']").attr("selected", true).trigger('change');
      $("#menu_type").css('display', ($("#vendor_catagory").val() == '9') ? 'none' : 'none').attr('required',true);
      $("#event_type").css('display', ($("#vendor_catagory").val() == '9') ? 'none' : 'none').attr('required',true);
      $("#speciality").css('display', ($("#vendor_catagory").val() == '9') ? 'none' : 'none').attr('required',true);
      $("#bakery_speciality").css('display', ($("#vendor_catagory").val() == '9') ? 'none' : 'none').attr('required',true);
      $("#home_service").css('display', ($("#vendor_catagory").val() == '9') ? 'none' : 'none').attr('required',true);
    }
    else if ($("#vendor_catagory").val() == '11'){
      $("#menu_type").css('display', ($("#vendor_catagory").val() == '11') ? 'block' : 'none').attr('required',true);
      @php
        $menus = explode(",",$data->menu_type);
      @endphp
      @foreach ($menus as $menu)
        $("#menu_type option[value='{{$menu}}']").attr("selected", true).trigger('change');
      @endforeach
      $("#venue_area").css('display', ($("#vendor_catagory").val() == '11') ? 'none' : 'none').attr('required',true);
      $("#event_type").css('display', ($("#vendor_catagory").val() == '11') ? 'none' : 'none').attr('required',true);
      $("#speciality").css('display', ($("#vendor_catagory").val() == '11') ? 'none' : 'none').attr('required',true);
      $("#bakery_speciality").css('display', ($("#vendor_catagory").val() == '11') ? 'none' : 'none').attr('required',true);
      $("#home_service").css('display', ($("#vendor_catagory").val() == '11') ? 'none' : 'none').attr('required',true);
    }
    else if ($("#vendor_catagory").val() == '12'){
      $("#event_type").css('display', ($("#vendor_catagory").val() == '12') ? 'block' : 'none').attr('required',true);
      @php
        $events = explode(",",$data->event_type);
      @endphp
      @foreach ($events as $event)
        $("#event_type option[value='{{$event}}']").attr("selected", true).trigger('change');
      @endforeach
      $("#menu_type").css('display', ($("#vendor_catagory").val() == '12') ? 'none' : 'none').attr('required',true);
      $("#venue_area").css('display', ($("#vendor_catagory").val() == '12') ? 'none' : 'none').attr('required',true);
      $("#speciality").css('display', ($("#vendor_catagory").val() == '12') ? 'none' : 'none').attr('required',true);
      $("#bakery_speciality").css('display', ($("#vendor_catagory").val() == '12') ? 'none' : 'none').attr('required',true);
      $("#home_service").css('display', ($("#vendor_catagory").val() == '12') ? 'none' : 'none').attr('required',true);
    }
    else if ($("#vendor_catagory").val() == '13'){
      $("#event_type").css('display', ($("#vendor_catagory").val() == '13') ? 'block' : 'none').attr('required',true);
      @php
        $events = explode(",",$data->event_type);
      @endphp
      @foreach ($events as $event)
        $("#event_type option[value='{{$event}}']").attr("selected", true).trigger('change');
      @endforeach
      $("#menu_type").css('display', ($("#vendor_catagory").val() == '13') ? 'none' : 'none').attr('required',true);
      $("#venue_area").css('display', ($("#vendor_catagory").val() == '13') ? 'none' : 'none').attr('required',true);
      $("#speciality").css('display', ($("#vendor_catagory").val() == '13') ? 'none' : 'none').attr('required',true);
      $("#bakery_speciality").css('display', ($("#vendor_catagory").val() == '13') ? 'none' : 'none').attr('required',true);
      $("#home_service").css('display', ($("#vendor_catagory").val() == '13') ? 'none' : 'none').attr('required',true);
    }
    else if ($("#vendor_catagory").val() == '14'){
      $("#speciality").css('display', ($("#vendor_catagory").val() == '14') ? 'block' : 'none').attr('required',true);
      @php
        $specialitys = explode(",",$data->speciality_type);
      @endphp
      @foreach ($specialitys as $speciality)
        $("#speciality option[value='{{$speciality}}']").attr("selected", true).trigger('change');
      @endforeach
      $("#bakery_speciality").css('display', ($("#vendor_catagory").val() == '14') ? 'none' : 'none').attr('required',true);
      $("#home_service").css('display', ($("#vendor_catagory").val() == '14') ? 'none' : 'none').attr('required',true);
      $("#event_type").css('display', ($("#vendor_catagory").val() == '14') ? 'none' : 'none').attr('required',true);
      $("#menu_type").css('display', ($("#vendor_catagory").val() == '14') ? 'none' : 'none').attr('required',true);
      $("#venue_area").css('display', ($("#vendor_catagory").val() == '14') ? 'none' : 'none').attr('required',true);
    }
    else if ($("#vendor_catagory").val() == '16'){
      $("#bakery_speciality").css('display', ($("#vendor_catagory").val() == '16') ? 'block' : 'none').attr('required',true);
      @php
        $bake_specialitys = explode(",",$data->speciality_type);
      @endphp
      @foreach ($bake_specialitys as $bake_speciality)
        $("#bakery_speciality option[value='{{$bake_speciality}}']").attr("selected", true).trigger('change');
      @endforeach
      $("#home_service").css('display', ($("#vendor_catagory").val() == '16') ? 'none' : 'none').attr('required',true);
      $("#event_type").css('display', ($("#vendor_catagory").val() == '16') ? 'none' : 'none').attr('required',true);
      $("#menu_type").css('display', ($("#vendor_catagory").val() == '16') ? 'none' : 'none').attr('required',true);
      $("#venue_area").css('display', ($("#vendor_catagory").val() == '16') ? 'none' : 'none').attr('required',true);
      $("#speciality").css('display', ($("#vendor_catagory").val() == '16') ? 'none' : 'none').attr('required',true);
    }
    // else if ($("#vendor_catagory").val() == '17'){
    //   $("#home_service").css('display', ($("#vendor_catagory").val() == '17') ? 'block' : 'none').attr('required',true);
    //   $("#event_type").css('display', ($("#vendor_catagory").val() == '17') ? 'none' : 'none').attr('required',true);
    //   $("#menu_type").css('display', ($("#vendor_catagory").val() == '17') ? 'none' : 'none').attr('required',true);
    //   $("#venue_area").css('display', ($("#vendor_catagory").val() == '17') ? 'none' : 'none').attr('required',true);
    //   $("#speciality").css('display', ($("#vendor_catagory").val() == '17') ? 'none' : 'none').attr('required',true);
    //   $("#bakery_speciality").css('display', ($("#vendor_catagory").val() == '17') ? 'none' : 'none').attr('required',true);
    // }
  });

</script>

@endpush
