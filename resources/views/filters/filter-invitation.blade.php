<!-- Sorting and Filter -->
<div class="row mt-4 mb-4">


{{-- It will be use later when city filter needed --}}
  {{-- Filter City Area --}}
  {{-- <div class="col-lg-3">
    <div class="form-group" style="width:100%;padding-top: 1rem;">
      <select class="form-control" id="city" style="width:100%;">
        <option value="">City</option>
        <option class="option" value="dhaka">Dhaka</option>
      </select>
    </div>
  </div> --}}
  {{-- Filter City End --}}

  {{-- Filter City Area --}}
  <div class="col-lg-4">
    <div class="form-group" style="width:100%;padding-top: 1rem;">
      <select class="form-control area" id="experience" style="width:100%;">
        <option value="">Experience</option>
        <option class="option" value="1-5">1-5 Years</option>
        <option class="option" value="6-10">6-10 Years</option>
        <option class="option" value="11-15">11-15 Years</option>
        <option class="option" value="16-20">16-20 Years</option>
        <option class="option" value=">20">More then 20 Years</option>
      </select>
    </div>
  </div>
  {{-- Filter City Area End --}}

  {{-- Filter Speciality --}}
  <div class="col-lg-4">
    <div class="form-group" style="width:100%;padding-top: 1rem;">
      <select class="form-control" id="speciality" style="width:100%;">
        <option value="">Speciality</option>
        <option class="option" value="paper">Paper Made</option>
        <option class="option" value="wood">Wood Made</option>
        <option class="option" value="hand">Hand Made</option>
      </select>
    </div>
  </div>
  {{-- Filter Speciality End --}}

  {{-- Filter Price --}}
  <div class="col-lg-4">
    <div class="form-group">
      <input type="hidden" id="price" name="price" value="" />
    </div>
  </div>
  {{-- Filter Price --}}

</div>

<!--/ end of Sorting and Filter -->
