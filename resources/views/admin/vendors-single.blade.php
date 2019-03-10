@extends('layouts.admin')

@push('css')
<style media="screen">
.gal {


-webkit-column-count: 4; /* Chrome, Safari, Opera */
  -moz-column-count: 4; /* Firefox */
  column-count: 4;


}
.gal img{ width: 100%; padding: 10px 0;}
@media (max-width: 500px) {

  .gal {
-webkit-column-count: 2; /* Chrome, Safari, Opera */
  -moz-column-count: 2; /* Firefox */
  column-count: 2;
}

}
</style>
@endpush

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{$vendors[0]->title}}
      </h1>
    </section>

    <section class="maincontent">

      <div class="col-md-12" style="margin-top:2rem;">

        <div class="box box-primary">
          <div class="box-body">
            <div class="row">
              @foreach ($vendors as $vendor)
                <div class="col-lg-2">
                  <label for="vendor_logo">Logo</label>
                  <img src="{{asset($vendor->logo)}}" alt="{{$vendor->title}}" style="width:100%;padding:1rem 0;">
                </div>
                <div class="col-lg-4">
                  <h3>{{$vendor->title}}</h3>
                  <h4 style="text-transform:capitalize">{{$vendor->catagory->name}}</h4>
                  <br>
                  <h4 style="font-weight:600;">About Us :</h4>
                  <p>{{$vendor->about_us}}</p>
                  <h4 style="font-weight:600;">Seller Contact :</h4>
                  <p>{{$vendor->contact or "Not Available"}}</p>
                </div>
                <div class="col-lg-2">
                  <h4 style="font-weight:600;">Starting Price</h4>
                  <p><strong>{{$vendor->startingat_1_title}}</strong> - {{$vendor->startingat_1_price}}BDT</p>
                  <p><strong>{{$vendor->startingat_2_title or "N/A"}}</strong> - {{$vendor->startingat_2_price or "N/A"}}BDT</p>
                  <p><strong>{{$vendor->startingat_3_title or "N/A"}}</strong> - {{$vendor->startingat_3_price or "N/A"}}BDT</p>
                </div>
                <div class="col-lg-2">
                  <h4 style="font-weight:600;">Feature</h4>
                  <p>{{$features->feature1_title or ""}} - {{$datas->feature_1 or ""}}</p>
                  <p>{{$features->feature2_title or ""}} - {{$datas->feature_2 or ""}}</p>
                  <p>{{$features->feature3_title or ""}} - {{$datas->feature_3 or ""}}</p>
                  <p>{{$features->feature4_title or ""}} - {{$datas->feature_4 or ""}}</p>
                  <p>{{$features->feature5_title or ""}} - {{$datas->feature_5 or ""}}</p>
                  <p>{{$features->feature6_title or ""}} - {{$datas->feature_6 or ""}}</p>
                  <p>{{$features->feature7_title or ""}} - {{$datas->feature_7 or ""}}</p>
                  <p>{{$features->feature8_title or ""}} - {{$datas->feature_8 or ""}}</p>
                </div>
                <div class="col-lg-2">
                  <label for="vendor_profile">Profile Image</label>
                  <img src="{{asset($vendor->profile_img)}}" alt="{{$vendor->title}}" style="width:100%;padding:1rem 0;">
                </div>
              @endforeach
            </div>
            <hr>

              <div class="text-center" style="margin-top:2rem;margin-bottom:2rem;">
                <h3>Package Details</h3>
              </div>
              <div class="col-lg-12">
                @foreach ($vendors[0]->packages as $package)
                  <div class="col-lg-2 text-center">
                    <p>{{$package->title or ""}}</p>
                  </div>
                  <div class="col-lg-2 text-center">
                    <p>{{$package->price or ""}} BDT</p>
                  </div>
                  <div class="col-lg-5">
                    <p>{{$package->description or ""}}</p>
                  </div>
                  <div class="col-lg-3 text-center">
                    <img src="{{asset($package->image)}}" alt="{{$package->title}}" style="width:25rem;padding:1rem 0;">
                  </div>
                @endforeach
              </div>

            <div class="text-center" style="margin-top:2rem;margin-bottom:2rem;">
              <hr>
              <h3>Gallery Image</h3>
            </div>
            <div class="col-lg-12">
              <div class="row">
                <div class="gal">
                  @foreach ($vendors[0]->images as $image)
                    <img src="{{asset($image->image_locations)}}" alt="{{$image->vendors_id}}">
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

@endpush
