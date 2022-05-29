// AUTHENTICATION
$(document).ready(function () {
  // toggle passwod visibility
  $("#checkbox").click(function () {
    var x = document.querySelector("#password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  });
  $("#checkbox_").click(function () {
    var x = document.querySelector("#password_");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  });

  // add autocomplete for all form / input
  let tagArr = document.getElementsByTagName("input");
  for (let i = 0; i < tagArr.length; i++) {
    tagArr[i].autocomplete = "off";
  }

  // detect scroll top or down
  if ($(".smart-scroll").length > 0) {
    // check if element exists
    var last_scroll_top = 0;
    $(window).on("scroll", function () {
      scroll_top = $(this).scrollTop();
      if (scroll_top < last_scroll_top) {
        $(".smart-scroll").removeClass("scrolled-down").addClass("scrolled-up");
      } else {
        $(".smart-scroll").removeClass("scrolled-up").addClass("scrolled-down");
      }
      last_scroll_top = scroll_top;
    });
  }

  //end
});

// AOS Animation
AOS.init({
  duration: 1000,
  disable: "mobile",
});

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  "use strict";
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll(".needs-validation");

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener(
      "submit",
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });
})();

// Interior
$("#interior").on("mouseover", "img", function () {
  $("img.active").removeClass("active");
  $(this).addClass("active");
});

// Confirm Form Resubmission
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

// Magic mouse *default.css cursor*
// $("a,img,button,video,input,select").addClass("magic-hover");
// options = {
//   cursorOuter: "circle-basic",
//   hoverEffect: "pointer-blur",//pointer-overlay
//   hoverItemMove: false,
//   defaultCursor: false,
//   outerWidth: 41, //50
//   outerHeight: 41,  //50
// };
// magicMouse(options);

// TagCanvas
$(document).ready(function() {
  if( ! $('#myCanvas').tagcanvas({
    textColour : '#ffffff',
    outlineThickness : 0.001,
    maxSpeed : 0.04,
    depth : 0.5,
    decel : 1,
    shuffleTags : true,
    wheelZoom : false,
    initial : [0.1, -0.3]
  })) {
    // TagCanvas failed to load
    $('#myCanvasContainer').hide();
  }
});
$('#myCanvas').tagcanvas({
  depth : 0.5
},'tagList');

// toggle visibility of passwords
$(function(){
  $('input[type=\'password\']').showHidePassword();
  $('.show-hide-password').css({
    position: 'absolute',
    display: 'none',
    top: '0',
    right: '0',
    height: $(this).outerHeight(true) - 2,
    marginTop: '1px',
    padding: '6px 11px',
    cursor: 'pointer',
    zIndex : '999',
    color : 'grey'
  });
});


// send mail
$("#send_mail_form").submit(function(e) {

e.preventDefault(); // avoid to execute the actual submit of the form.

var form = $(this);

$.ajax({
    type: "POST",
    url: "includes/send_mail.php",
    data: form.serialize(), // serializes the form's elements.
    success: function(data)
    {
      alert(data); // show response from the php script.
    }
});

});


// Tilt.js
$('.card').tilt({
  maxTilt: 0,
  perspective: 100,
  glare: true,
  maxGlare: .15,
  transition: false,
})
$('.card-tilt').tilt({
  maxTilt: 15,
  perspective: 1000,
  glare: true,
  maxGlare: .25,
  transition: true,
})

// Preloader
$(window).on('load',function(){
  // $('#preloader').fadeOut();
  $('#preloader').css('transition-duration','1s');
  $('#preloader').css('opacity','0'); 
  $('#preloader').css('z-index', '-100');
  $('#home').css('background-size','100%');
})