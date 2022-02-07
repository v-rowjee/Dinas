<!-- Nav Bar -->
<nav class="navbar navbar-expand-lg smart-scroll navbar-dark bg-dark fixed-top my-md-3 mx-md-5 rounded">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <img src="images/logo.png" alt="" />
    </a>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0" id="spy-target">
        <li class="nav-item">
          <a class="nav-link <?php if($active == "menu")echo "active"?>" href="index.php#menu">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($active == "reservation")echo "active"?>" href="index.php#reservation">Reservation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($active == "online-order")echo "active"?>" href="index.php#online-order">Online Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($active == "contact")echo "active"?>" href="index.php#contact" role="button">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($active == "about-us")echo "active"?>" href="index.php#about-us" role="button">About Us</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        
        <?php 
        if(isset($_SESSION['id'])){ // if user is logged in
        ?>

        <li class="nav-item nowrap">
          <a class="nav-link" href="includes/logout.php">Sign Out</a>
        </li>

        <?php
        }else{  // else
        ?>

          <li class="nav-item">
            <a class="nav-link" href="login.php">Sign In</a>
          </li>
          <li>
            <button class="btn btn-primary text-dark nowrap">
              <a class="text-dark" href="register.php">Join Us</a>
            </button>
          </li>

        <?php
        } // end else
        ?>

      </ul>
    </div>
  </div>
</nav>

<script>
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
</script>