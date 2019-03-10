@extends('layouts.app')

@push('css')

@endpush

@section('content')
  <!-- Masthead -->
<header class="pagehead" style="background-image: url('img/backgrounds/bg-footer.jpg');">
  <div class="container">
    <div class="row">
      <div class="col-12 my-auto text-center text-white">
        <img class="pagehead-img img-responsive mb-3" src="img/ayojok-logo-transparent.png" alt="">
      </div>
    </div>
  </div>
</header>

<!-- Event Coordinator description section -->

  <!--/ End Event Coordinator description section -->

  <!-- Form for query section -->
  <section class="page-section" id="contact" style="background-image: url('img/backgrounds/partner2.jpg');">
      <div class="container wow fadeIn mt-3">
        <div class="text-center contact-header">
          <h2>BE A PART OF OUR TEAM</h2>
          <hr class="colored">
          <p>Join our ever increasing team of vendors who have trusted us to take their business to the next level.</p>
        </div>
        <div class="row mt-4">
          <div class="col-lg-8 mx-auto">
            <form name="sentMessage" id="partnerForm" novalidate>
              {{ csrf_field() }}
              <div class="row control-group">
                <div class="form-group col-12 floating-label-form-group controls">
                  <label>Name</label>
                  <input type="text" class="form-control contact-placeholder" placeholder="Name" id="your_name" required data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="row control-group">
                <div class="form-group col-12 floating-label-form-group controls">
                  <label>Company Name</label>
                  <input type="text" class="form-control contact-placeholder" placeholder="Company Name" id="company_name" required data-validation-required-message="Please enter your company's name.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="row control-group">
                <div class="form-group col-12 floating-label-form-group controls">
                  <label>Select Your Business Type</label>
                  <select id="business_type" class="form-control" style="z-index: 1; margin-bottom: 15px;z-index: 1;position: relative;align-items: center;padding-bottom: 5px;border: none;border-radius: 0;font-size: 1.5em;background: none;color: #f6f6f6;font-weight: inherit;resize: none;padding-left: 0px;" required data-validation-required-message="Please select your business type">
                  <option style="color:#f6f6f6;background-color:#1d1c1c;" value="">Select Your Business Type</option>
                  <option style="color:#f6f6f6;background-color:#1d1c1c;" value="Venue">Venue</option>
                  <option style="color:#f6f6f6;background-color:#1d1c1c;" value="Catering">Catering</option>
                  <option style="color:#f6f6f6;background-color:#1d1c1c;" value="Photography & Cinematography">Photography & Cinematography</option>
                  <option style="color:#f6f6f6;background-color:#1d1c1c;" value="Decoration">Decoration</option>
                  <option style="color:#f6f6f6;background-color:#1d1c1c;" value="Invitation Cards">Invitation Cards</option>
                  <option style="color:#f6f6f6;background-color:#1d1c1c;" value="DJ">DJ</option>
                  <option style="color:#f6f6f6;background-color:#1d1c1c;" value="Makeup Artist">Makeup Artist</option>
                  <option style="color:#f6f6f6;background-color:#1d1c1c;" value="Bakeries">Bakeries</option>
                  <option style="color:#f6f6f6;background-color:#1d1c1c;" value="Mehedi">Mehedi</option>
                  <option style="color:#f6f6f6;background-color:#1d1c1c;" value="Kazi">Kazi</option>
                </select>
                </div>
              </div>

                <div class="row control-group">
                <div class="form-group col-12 floating-label-form-group controls">
                  <label>Contact Address</label>
                  <textarea type="text" class="form-control contact-placeholder" placeholder="Contact Address" id="contact_address" required data-validation-required-message="Please enter your contact address."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="row control-group">
                <div class="form-group col-12 floating-label-form-group controls">
                  <label>Office Address</label>
                  <textarea type="text" class="form-control contact-placeholder" placeholder="Office Address" id="office_address"></textarea>
                </div>
              </div>


              <div class="row control-group">
                <div class="form-group col-12 floating-label-form-group controls">
                  <label>Email Address</label>
                  <input type="email" class="form-control contact-placeholder" placeholder="Email Address" id="your_email" required data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="row control-group">
                <div class="form-group col-12 floating-label-form-group controls">
                  <label>Phone Number</label>
                  <input type="tel" class="form-control contact-placeholder" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
               <div class="row control-group">
                <div class="form-group col-12 floating-label-form-group controls">
                  <label>Years of Experience</label>
                  <input type="number" class="form-control contact-placeholder" placeholder="Years of Experience" id="your_experience" required data-validation-required-message="Please enter your working experience">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="row control-group">
                <div class="form-group col-12 floating-label-form-group controls">
                  <label>Message</label>
                  <textarea rows="5" class="form-control contact-placeholder" placeholder="Message" id="mess"></textarea>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="row">
                <div class="form-group col-12">
                  <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  <!--/ End Form for query section -->
@endsection

@push('scripts')
<script src="{{asset('js/partner_contact.js')}}" charset="utf-8"></script>
@endpush
