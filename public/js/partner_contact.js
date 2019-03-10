$(function() {
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  $("#partnerForm input,#partnerForm textarea").jqBootstrapValidation({
    preventSubmit: true,
    submitError: function($form, event, errors) {
      // additional error messages or events
    },
    submitSuccess: function($form, event) {
      event.preventDefault(); // prevent default submit behaviour
      // get values from FORM
      var your_name = $("input#your_name").val();
      var company_name = $("input#company_name").val();
      var business_type = $("input#business_type").val();
      var contact_address = $("textarea#contact_address").val();
      var office_address = $("textarea#office_address").val();
      var business_type = $("select#business_type").val();
      var your_email = $("input#your_email").val();
      var phone = $("input#phone").val();
      var your_experience = $("input#your_experience").val();
      var mess = $("textarea#mess").val();
      var firstName = your_name; // For Success/Failure Message
      // Check for white space in name for Success/Fail message
      // if (firstName.indexOf(' ') >= 0) {
      //   firstName = name.split(' ').slice(0, -1).join(' ');
      // }
      $this = $("#sendMessageButton");
      $this.prop("disabled", true); // Disable submit button until AJAX call is complete to prevent duplicate messages
      console.log(business_type);
      $.ajax({
        url: "partners",
        type: "POST",
        data: {
          your_name: your_name,
          company_name: company_name,
          business_type: business_type,
          contact_address: contact_address,
          office_address:  office_address,
          business_type:  business_type,
          your_email: your_email,
          phone:  phone,
          your_experience:  your_experience,
          mess: mess,
        },
        cache: false,
        success: function() {
          // Success message
          $('#success').html("<div class='alert alert-success'>");
          $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
            .append("</button>");
          $('#success > .alert-success')
            .append("<strong>Your message has been sent. </strong>");
          $('#success > .alert-success')
            .append('</div>');
          //clear all fields
          $('#partnerForm').trigger("reset");
        },
        error: function() {
          // Fail message
          $('#success').html("<div class='alert alert-danger'>");
          $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
            .append("</button>");
          $('#success > .alert-danger').append($("<strong>").text("Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!"));
          $('#success > .alert-danger').append('</div>');
          //clear all fields
          $('#partnerForm').trigger("reset");
        },
        complete: function() {
          setTimeout(function() {
            $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
          }, 1000);
        }
      });
    },
    filter: function() {
      return $(this).is(":visible");
    },
  });

  $("a[data-toggle=\"tab\"]").click(function(e) {
    e.preventDefault();
    $(this).tab("show");
  });
});

/*When clicking on Full hide fail/success boxes */
$('#name').focus(function() {
  $('#success').html('');
});
