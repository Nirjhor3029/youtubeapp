<!-- Vendor Listing -->
<div class="portfolio-grid vendor-list clearfix">

  <!-- Grid Item -->
  <div class="productList">

    <?php


    ?>

    @foreach($datas as $data)
      <div class="mix green">
        <div class="portfolio-wrapper divclick">
          @php
          if(!empty($data->vendor->profile_img)) {
            $img = $data->vendor->profile_img;
          }
          else {
            $img = 'img/vendor-profile/default.png';
          }
          @endphp
          <a class="text-title" href="{{url('vendors/'.$catagory = $catagorydata->name.'/'.$vendor = $data->vendor->id)}}" target="_blank">
          <img src="{{asset($img)}}" alt="{{ $data->vendor->title }}">
          <div class="caption">
            <div class="caption-text pull-left">

              <?php

                    $max_length = 20;
                    $string = $data->vendor->title;

                    $string = (strlen($string) > $max_length) ? substr($string,0,$max_length).'...' : $string;

              ?>


                {{ $string }}
                {{--{{ substr($data->vendor->title,0, 30) }}--}}


              <span class="text-category" style="text-transform:uppercase;">{{ $catagorydata->name }}</span>
            </div>
        </div>
          </a>
      </div>
    </div>
  @endforeach
</div>
</div>
<!--/ End Vendor Listing -->
