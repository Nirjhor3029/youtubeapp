/*!
 * Vitality v2.0.2 (http://themes.startbootstrap.com/vitality-v2.0.2)
 * Copyright 2013-2017 Start Bootstrap
 * Purchase a license to use this theme at (https://wrapbootstrap.com)
 */
/*!
 * Vitality v2.0.0 (http://themes.startbootstrap.com/vitality-v2.0.0)
 * Copyright 2013-2017 Start Bootstrap
 * Purchase a license to use this theme at (https://wrapbootstrap.com)
 */

// Load WOW.js on non-touch devices
var isPhoneDevice = "ontouchstart" in document.documentElement;
$(document).ready(function() {
  if (isPhoneDevice) {
    //mobile
  } else {
    //desktop
    // Initialize WOW.js
    wow = new WOW({
      offset: 50
    })
    wow.init();
  }
});

(function($) {
  "use strict"; // Start of use strict

  // Smooth scrolling using jQuery easing
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 69)
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });

  // Closes responsive menu when a scroll trigger link is clicked
  $('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });

  // Activate scrollspy to add active class to navbar items on scroll
  $('body').scrollspy({
    target: '#mainNav',
    offset: 70
  });

  // Collapse the navbar when page is scrolled
  $(window).scroll(function() {
    if ($("#mainNav").offset().top > 100) {
      $("#mainNav").addClass("navbar-shrink");
    } else {
      $("#mainNav").removeClass("navbar-shrink");
    }
  });

  // Activates floating label headings for the contact form
  $("body").on("input propertychange", ".floating-label-form-group", function(e) {
    $(this).toggleClass("floating-label-form-group-with-value", !!$(e.target).val());
  }).on("focus", ".floating-label-form-group", function() {
    $(this).addClass("floating-label-form-group-with-focus");
  }).on("blur", ".floating-label-form-group", function() {
    $(this).removeClass("floating-label-form-group-with-focus");
  });

  // Owl Carousel Settings
  $(".team-carousel").owlCarousel({
    items: 3,
    navigation: true,
    pagination: false,
    navigationText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
    ],
  });

  $(".portfolio-carousel").owlCarousel({
    singleItem: true,
    navigation: true,
    pagination: false,
    navigationText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
    ],
    autoHeight: true,
    mouseDrag: false,
    touchDrag: false,
    transitionStyle: "fadeUp"
  });

  $(".testimonials-carousel, .mockup-carousel").owlCarousel({
    singleItem: true,
    navigation: true,
    pagination: true,
    autoHeight: true,
    navigationText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
    ],
    transitionStyle: "backSlide"
  });

  $(".portfolio-gallery").owlCarousel({
    items: 3,
  });

  // Magnific Popup jQuery Lightbox Gallery Settings
  $('.gallery-link').magnificPopup({
    type: 'image',
    gallery: {
      enabled: true
    },
    image: {
      titleSrc: 'title'
    }
  });

  // Magnific Popup Settings
  // $('.mix').magnificPopup({
  //   type: 'image',
  //   image: {
  //     titleSrc: 'title'
  //   }
  // });

  // Vide - Video Background Settings


  $('[data-toggle="tooltip"]').tooltip();

  $(".divclick").click(function() {
  window.location = $(this).find("a").attr("href");
  return false;
});

$('.modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  button.one('focus', function (event) {
    $(this).blur();
  });
});

$(".dropdown").hover(
  function() { $('.dropdown-menu', this).stop().fadeIn("fast");
},
function() { $('.dropdown-menu', this).stop().fadeOut("fast");
});

$('.img-gallery').magnificPopup({
  delegate: 'a', // child items selector, by clicking on it popup will open
  type: 'image',
  gallery:{
    enabled:true,
    preload: [0,2], // read about this option in next Lazy-loading section

    navigateByImgClick: true,

    arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', // markup of an arrow button

    tPrev: 'Previous (Left arrow key)', // title for left button
    tNext: 'Next (Right arrow key)', // title for right button
    tCounter: '<span class="mfp-counter">%curr% of %total%</span>' // markup of counter
  }
  // other options
});

})(jQuery); // End of use strict
