// AUTHENTICATION
$(document).ready(function () {
  // // open register
  // $("#join-us").click(function () {
  //   $("#auth-title").html("Register");
  //   $("#login-form").hide();
  //   $("#register-form").show();
  // });

  // // open login
  // $("#sign-in").click(function () {
  //   $("#auth-title").html("Login");
  //   $("#register-form").hide();
  //   $("#login-form").show();
  // });

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

  // date picker
  $("#datepicker").datepicker({
    format: "DD MM yy",
    startDate: 0,
    todayBtn: "linked",
    clearBtn: true,
    autoclose: true,
  });

  // Navbar
  // add padding top to show content behind navbar
  $("body").css("padding-top", $(".navbar").outerHeight() + "px");

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

  // Owl Carousel 2
  $(".owl-carousel").owlCarousel({
    margin: 10,
    nav: true,
    navText: [
      "<i class='fa fa-chevron-left'></i>",
      "<i class='fa fa-chevron-right'></i>",
    ],
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 3,
      },
      1000: {
        items: 5,
      },
    },
  });

  //end
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

// reCAPTCHA
// function onSubmit(token) {
//   document.getElementById("register-form").submit();
// }
// function onRecaptchaLoadCallback() {
//   var clientId = grecaptcha.render("inline-badge", {
//     sitekey: "6LedzUMeAAAAAEopHYgH45weICZbcodupci-dK9W",
//     badge: "inline",
//     size: "invisible",
//   });

//   grecaptcha.ready(function () {
//     grecaptcha
//       .execute(clientId, {
//         action: "includes/register.php",
//       })
//       .then(function (token) {
//         // Verify the token on the server.
//       });
//   });
// }

// Date picker
let today = new Date().toISOString().substr(0, 10);
document.querySelector("#datepicker").value = today;
