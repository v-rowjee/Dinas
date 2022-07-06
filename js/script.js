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

// Confirm Form Resubmission
if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}

// Magic mouse *default.css cursor*
$("a,img,button,video,input,select").addClass("magic-hover");
options = {
  cursorOuter: "circle-basic",
  hoverEffect: "pointer-blur", //pointer-overlay
  hoverItemMove: false,
  defaultCursor: false,
  outerWidth: 41, //50
  outerHeight: 41, //50
};
// magicMouse(options);

// TagCanvas
$(document).ready(function () {
  if (
    !$("#myCanvas").tagcanvas({
      textColour: "#ffffff",
      outlineThickness: 0.001,
      maxSpeed: 0.04,
      depth: 0.5,
      decel: 1,
      shuffleTags: true,
      wheelZoom: false,
      initial: [0.1, -0.3],
    })
  ) {
    // TagCanvas failed to load
    $("#myCanvasContainer").hide();
  }
});
$("#myCanvas").tagcanvas(
  {
    depth: 0.5,
  },
  "tagList"
);

// toggle visibility of passwords
$(function () {
  $("input[type='password']").showHidePassword();
  $(".show-hide-password").css({
    position: "absolute",
    display: "none",
    top: "0",
    right: "0",
    height: $(this).outerHeight(true) - 2,
    marginTop: "1px",
    padding: "6px 11px",
    cursor: "pointer",
    zIndex: "999",
    color: "grey",
  });
});

// send mail
$("#send_mail_form").submit(function (e) {
  e.preventDefault(); // avoid to execute the actual submit of the form.

  var form = $(this);

  $.ajax({
    type: "POST",
    url: "config/send_mail.php",
    data: form.serialize(), // serializes the form's elements.
    success: function (data) {
      Snackbar.show({text: data,actionTextColor:"#B4A064"}); // show response from the php script.
    },
    error: (xhr) => {
      Snackbar.show({
        text: "Error Occured: " + xhr.status + " " + xhr.statusText,
        actionTextColor:"#B4A064"
      });
    },
  });
});

// Tilt.js
$(".card").tilt({
  maxTilt: 0,
  perspective: 100,
  glare: true,
  maxGlare: 0.15,
  transition: false,
});
$(".card-tilt").tilt({
  maxTilt: 15,
  perspective: 1000,
  glare: true,
  maxGlare: 0.25,
  transition: true,
});

// SOUNDCLOUD
var widget = SC.Widget("soundcloud");

$(document).ready(function () {
  widget.pause();
  $("#playSC").click(function () {
    widget.setVolume(20);
    $("#playSC").toggleClass("fa-play fa-pause");
    $("#playSC").hasClass("fa-pause") ? widget.play() : widget.pause();
  });
});

// Preloader
$(window).on("load", function () {
  $("#preloader").css("transition-duration", "1s");
  $("#preloader").css("opacity", "0");
  $("#preloader").css("z-index", "-100");
  $("#home").css("background-size", "100%");
});

let slides = document.querySelectorAll(".slide");

for (let slide of slides) {
  slide.addEventListener("click", () => {
    clearActiveClasses();

    slide.classList.add("active");
  });
}

// Interior
function clearActiveClasses() {
  slides.forEach((slide) => {
    slide.classList.remove("active");
  });
}

// GOOGLE one tap sign in
// callback function that will be called when the user is successfully logged-in with Google
function googleLoginEndpoint(googleUser) {
  // get user information from Google
  console.log(googleUser);

  // send an AJAX request to register the user in your website
  var ajax = new XMLHttpRequest();

  // path of server file
  ajax.open("POST", "config/g_one_tap.php", true);

  // callback when the status of AJAX is changed
  ajax.onreadystatechange = function () {
    // when the request is completed
    if (this.readyState == 4) {
      // when the response is okay
      if (this.status == 200) {
        window.location.reload();
        console.log(this.responseText);
      }

      // if there is any server error
      if (this.status == 500) {
        console.log(this.responseText);
      }
    }
  };

  // send google credentials in the AJAX request
  var formData = new FormData();
  formData.append("id_token", googleUser.credential);
  ajax.send(formData);
}
