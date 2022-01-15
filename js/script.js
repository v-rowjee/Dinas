// AUTHENTICATION
$(document).ready(function () {
  // open register
  $("#join-us").click(function () {
    $("#auth-title").html("Register");
    $("#login-form").hide();
    $("#register-form").show();
  });

  // open login
  $("#sign-in").click(function () {
    $("#auth-title").html("Login");
    $("#register-form").hide();
    $("#login-form").show();
  });

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
});