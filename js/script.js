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

  // date picker
  // $("#datepicker").datepicker({
  //   format: "DD MM yy",
  //   startDate: 0,
  //   todayBtn: "linked",
  //   clearBtn: true,
  //   autoclose: true,
  // });


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
  disable: 'mobile'
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
// let today = new Date().toISOString().substr(0, 10);
// document.querySelector("#datepicker").value = today;

// Interior
$('#interior').on('mouseover', 'img', function() {
  $('img.active').removeClass('active');
  $(this).addClass('active');
});