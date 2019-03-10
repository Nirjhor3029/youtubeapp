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
<section class="page-section">
  <div class="container">
    <div class="wow fadeIn text-center">
      <h3>Event Coordinator</h3>
      <hr class="colored">
    </div>
    <div class="row mt-4" style="text-align: justify;">
      <p>Save yourself a lot of time and stress by hiring our trusted and professional event coordinator who will ensure that your event takes place without any hindrance. Our event coordinator will take on the task of</p>
      <p>
        <ul style="font-size:18px;line-height:1.5;">
          <li>Creating a checklist according to your plans</li>
          <li>Checking up with vendors on a regular basis</li>
          <li>Making sure your plan is being executed</li>
          <li>Ensuring deadlines of services are met</li>
          <li>Effective organizing of decoration, catering, seating arrangement etc.</li>
        </ul>
      </p>
      <p>More than often it has been the case that on the day of the wedding, the father, son or a relative cannot be found as they have to run around and make sure all the guests have been served food or whether the catering service has been started in due time. This takes out a lot of time and makes them unable to enjoy the event itself, like socializing with guests or being in photographs with the bride and groom a time that is better spent on something more useful. This is where our event coordinator steps in and takes on these responsibilities ensuring that you have a stress free event.</p>
    </div>

    </div>
  </section>
  <!--/ End Event Coordinator description section -->

  <!-- Form for query section -->
  <section class="page-section" id="contact" style="background-image: url('img/backgrounds/bg-service.jpg');">
      <div class="container wow fadeIn">
        <div class="text-center contact-header">
          <h2>Contact Us</h2>
          <hr class="colored">
          <p>We are interested in being a part of organizing your events so feel free to contact us anytime for our assistance.</p>
        </div>
        <div class="row mt-4">
          <div class="col-lg-8 mx-auto">
            <form name="sentMessage" id="contactForm" novalidate>
              {{ csrf_field() }}
              <div class="row control-group">
                <div class="form-group col-12 floating-label-form-group controls">
                  <label>Name</label>
                  <input type="text" class="form-control contact-placeholder" placeholder="Name" id="your-name" required data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="row control-group">
                <div class="form-group col-12 floating-label-form-group controls">
                  <label>Email Address</label>
                  <input type="email" class="form-control contact-placeholder" placeholder="Email Address" id="your-email" required data-validation-required-message="Please enter your email address.">
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
                  <label>Message</label>
                  <textarea rows="5" class="form-control contact-placeholder" placeholder="Message" id="mess" required data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="row">
                <div class="form-group col-12">
                  <button type="submit" class="btn btn-primary">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  <!--/ End Form for query section -->
@endsection

@push('script')

@endpush
