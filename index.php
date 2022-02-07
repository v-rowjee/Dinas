<?php 
$active = "index"; 
include 'includes/header.php';
include 'includes/navbar.php';
?>

<!-- Home Section -->
<section id="home">
  <div class="container col-12 align-items-stretch">
    <div class="row align-items-center">
      <div class="col-xxs-6 col-sm-12 col-lg-7 mt-3">
        <h6><i>Mauritian Bistronomy</i></h6>
        <h1 style="white-space: nowrap">Dina's Restaurant</h1>
        <h5>
          Treat yourself to a moment of bistronomic delight at Dina's! The
          gourmet bistro's specials feature the “Trust Me” six-course
          discovery menu designed and regularly updated by the chef.
        </h5>

        <a href="reservation.php" class="btn btn-outline-primary my-5"
          >Reserve A Table Now</a
        >
      </div>
    </div>
    <div class="row align-items-center">
      <div class="col social-media">
        <a
          href="https://www.tripadvisor.com/Restaurant_Review-g488105-d2571445-Reviews-Dina_s-Le_Morne.html"
          target="_blank"
          ><i class="fa fa-tripadvisor"></i
        ></a>
        <a
          href="https://www.facebook.com/DinarobinBeachcomber/"
          target="_blank"
          ><i class="fa fa-facebook"></i
        ></a>
        <a
          href="https://www.instagram.com/dinarobinbeachcomber/"
          target="_blank"
          ><i class="fa fa-instagram"></i
        ></a>
        <a href="tel:+230407-9000" class="nowrap">
          <i class="fa fa-phone me-1"></i>
          <p class="d-inline">(+230) 407-9000</p>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Divider -->
<div class="divider">
  <svg
    preserveAspectRatio="none"
    viewBox="0 0 1200 120"
    xmlns="http://www.w3.org/2000/svg"
    style="fill: #010d0d; width: 145%; height: 60px"
  >
    <path
      d="M0 0v46.29c47.79 22.2 103.59 32.17 158 28 70.36-5.37 136.33-33.31 206.8-37.5 73.84-4.36 147.54 16.88 218.2 35.26 69.27 18 138.3 24.88 209.4 13.08 36.15-6 69.85-17.84 104.45-29.34C989.49 25 1113-14.29 1200 52.47V0z"
      opacity=".25"
    />
    <path
      d="M0 0v15.81c13 21.11 27.64 41.05 47.69 56.24C99.41 111.27 165 111 224.58 91.58c31.15-10.15 60.09-26.07 89.67-39.8 40.92-19 84.73-46 130.83-49.67 36.26-2.85 70.9 9.42 98.6 31.56 31.77 25.39 62.32 62 103.63 73 40.44 10.79 81.35-6.69 119.13-24.28s75.16-39 116.92-43.05c59.73-5.85 113.28 22.88 168.9 38.84 30.2 8.66 59 6.17 87.09-7.5 22.43-10.89 48-26.93 60.65-49.24V0z"
      opacity=".5"
    />
    <path
      d="M0 0v5.63C149.93 59 314.09 71.32 475.83 42.57c43-7.64 84.23-20.12 127.61-26.46 59-8.63 112.48 12.24 165.56 35.4C827.93 77.22 886 95.24 951.2 90c86.53-7 172.46-45.71 248.8-84.81V0z"
    />
  </svg>
</div>

<!-- Menu Section -->
<section id="menu">
  <div class="container text-center">
    <div class="row my-5 align-items-center justify-content-between">
      <div class="col-12 col-md-6">
        <img src="images/farfalle.jpg" alt="" />
      </div>
      <div class="col-12 col-md-5">
        <h1>- Starter -</h1>
        <p>
          <?php $categorie="starter"; include 'includes/menu-items.php'; ?>
        </p>
        <a href="menu.php">View Menu</a>
      </div>
    </div>

    <div class="row my-5 align-items-center justify-content-between">
      <div class="col-12 col-md-6">
        <img src="images/spaghetti.jpg" alt="" />
      </div>
      <div class="col-12 col-md-5">
        <h1>- Pasta -</h1>
        <p><?php $categorie="pasta"; include 'includes/menu-items.php'?></p>
        <a href="menu.php">View Menu</a>
      </div>
    </div>

    <div class="row my-5 align-items-center justify-content-between">
      <div class="col-12 col-md-6">
        <img src="images/pizza.jpg" alt="" />
      </div>
      <div class="col-12 col-md-5">
        <h1>- Pizza -</h1>
        <p><?php $categorie="pizza"; include 'includes/menu-items.php'?></p>
        <a href="menu.php">View Menu</a>
      </div>
    </div>

    <div class="row my-5 align-items-center justify-content-between">
      <div class="col-12 col-md-6">
        <img src="images/chestnut.jpg" alt="" />
      </div>
      <div class="col-12 col-md-5">
        <h1>- Dessert -</h1>
        <p><?php $categorie="dessert"; include 'includes/menu-items.php'?></p>
        <a href="menu.php">View Menu</a>
      </div>
    </div>

    <div class="row my-5 align-items-center justify-content-between">
      <div class="col-12 col-md-6">
        <img src="images/greentea.jpg" alt="" />
      </div>
      <div class="col-12 col-md-5">
        <h1>- Drinks -</h1>
        <p><?php $categorie="drinks"; include 'includes/menu-items.php'?></p>
        <a href="menu.php">View Menu</a>
      </div>
    </div>
  </div>
</section>

<!-- <div class="restaurant-divider"></div> -->
<div class="video" id="reservations" >
  <div class="divider">
    <div style="overflow: hidden">
      <svg
        preserveAspectRatio="none"
        viewBox="0 0 1200 120"
        xmlns="http://www.w3.org/2000/svg"
        style="
          fill: #636152;
          width: 139%;
          height: 60px;
          transform: rotate(180deg);
          background-color: rgb(34, 34, 34);
        "
      >
        <path
          d="M0 0v46.29c47.79 22.2 103.59 32.17 158 28 70.36-5.37 136.33-33.31 206.8-37.5 73.84-4.36 147.54 16.88 218.2 35.26 69.27 18 138.3 24.88 209.4 13.08 36.15-6 69.85-17.84 104.45-29.34C989.49 25 1113-14.29 1200 52.47V0z"
          opacity=".25"
        />
        <path
          d="M0 0v15.81c13 21.11 27.64 41.05 47.69 56.24C99.41 111.27 165 111 224.58 91.58c31.15-10.15 60.09-26.07 89.67-39.8 40.92-19 84.73-46 130.83-49.67 36.26-2.85 70.9 9.42 98.6 31.56 31.77 25.39 62.32 62 103.63 73 40.44 10.79 81.35-6.69 119.13-24.28s75.16-39 116.92-43.05c59.73-5.85 113.28 22.88 168.9 38.84 30.2 8.66 59 6.17 87.09-7.5 22.43-10.89 48-26.93 60.65-49.24V0z"
          opacity=".5"
        />
        <path
          d="M0 0v5.63C149.93 59 314.09 71.32 475.83 42.57c43-7.64 84.23-20.12 127.61-26.46 59-8.63 112.48 12.24 165.56 35.4C827.93 77.22 886 95.24 951.2 90c86.53-7 172.46-45.71 248.8-84.81V0z"
        />
      </svg>
    </div>
  </div>
  <video autoplay loop class="align-bottom">
    <source src="images/vid-gnocchi.mp4" type="video/mp4" />
  </video>
  <div class="divider">
    <svg
      preserveAspectRatio="none"
      viewBox="0 0 1200 120"
      xmlns="http://www.w3.org/2000/svg"
      style="
        fill: #4b443b;
        width: 145%;
        height: 60px;
        background-color: rgba(50, 51, 51, 0.4);
      "
    >
      <path
        d="M0 0v46.29c47.79 22.2 103.59 32.17 158 28 70.36-5.37 136.33-33.31 206.8-37.5 73.84-4.36 147.54 16.88 218.2 35.26 69.27 18 138.3 24.88 209.4 13.08 36.15-6 69.85-17.84 104.45-29.34C989.49 25 1113-14.29 1200 52.47V0z"
        opacity=".25"
      />
      <path
        d="M0 0v15.81c13 21.11 27.64 41.05 47.69 56.24C99.41 111.27 165 111 224.58 91.58c31.15-10.15 60.09-26.07 89.67-39.8 40.92-19 84.73-46 130.83-49.67 36.26-2.85 70.9 9.42 98.6 31.56 31.77 25.39 62.32 62 103.63 73 40.44 10.79 81.35-6.69 119.13-24.28s75.16-39 116.92-43.05c59.73-5.85 113.28 22.88 168.9 38.84 30.2 8.66 59 6.17 87.09-7.5 22.43-10.89 48-26.93 60.65-49.24V0z"
        opacity=".5"
      />
      <path
        d="M0 0v5.63C149.93 59 314.09 71.32 475.83 42.57c43-7.64 84.23-20.12 127.61-26.46 59-8.63 112.48 12.24 165.56 35.4C827.93 77.22 886 95.24 951.2 90c86.53-7 172.46-45.71 248.8-84.81V0z"
      />
    </svg>
  </div>
</div>

<!-- Reservation Section -->
<section id="reservation">
  <div class="container text-center">

    <!-- custom reservation -->
    <?php 
    
    if(!isset($_SESSION['id'])){ // not logged in
      header('location: login.php');

    }else{
      if(!isset($_SESSION['rid'])){   // no reservation yet
        include 'includes/reservation_add.php';
        if($msg == 'Refresh page')
          header('location: reservation.php');

      }else{
        include 'includes/reservation_cancel.php';
        if($msg == 'Refresh page')
          header('location: reservation.php');
      }

      
    }
    
    ?>


    <!-- OpenTable API -->
    <!-- <div class="row justify-content-center">
      <div
        class="ot-wide"
        style="filter: hue-rotate(240deg) invert(0.9) saturate(0.8)"
      >
        <script
          type="text/javascript"
          src="//www.opentable.com/widget/reservation/loader?rid=205668&type=standard&theme=wide&iframe=true&domain=com&lang=en-US&newtab=false&ot_source=Restaurant%20website"
        ></script>
      </div>

      <div
        class="mb-5 ot-button"
        style="filter: hue-rotate(240deg) invert(0.9) saturate(0.8)"
      >
        <script
          type="text/javascript"
          src="//www.opentable.com/widget/reservation/loader?rid=205668&type=button&theme=wide&iframe=true&domain=com&lang=en-US&newtab=false&ot_source=Restaurant%20website"
        ></script>
      </div>
    </div> -->
  </div>
</section>

<!-- Order online -->
<section id="online-order">
  <div class="container text-center">
    <div class="row align-items-center justify-content-around g-5">
      <div class="col-10 col-lg-5">
        <img src="images/mockup.png" alt="" class="img-fluid" />
      </div>
      <div class="col-12 col-lg-5">
        <h6 class="gold">We make your life easier !</h6>
        <h1>Order Online</h1>
        <p class="mb-5">
          Canva.com dolor sit amet consectetur adipisicing elit. Sunt
          officia ab natus aperiam. Facilis, quam quod? Molestiae hic
          tempore deleniti fugit, delectus.
        </p>
        <a
          href="online_order.php"
          class="btn btn-outline-primary px-5"
          >Order now</a
        >
      </div>
    </div>
  </div>
</section>

<!-- Contact -->
<section id="contact">
  <div class="container">
    <div class="row justify-content-around align-items-center gy-5">
      <div class="col-sm-12 col-lg-7">
        <h6 class="gold">Let's get in touch,</h6>
        <h1>Contact Us</h1>
        <form action="includes/send_mail.php" method="post" class="needs-validation" novalidate>
          <label for="name" class="form-label">Name</label>
          <input
            type="text"
            name="name"
            class="form-control"
            placeholder="Ex. Joe Crimson"
            maxlength="16"
            pattern="[a-zA-Z\s]+"
            title="Letters and white space only"
            value="<?php if(isset($_SESSION['name'])) echo $_SESSION['name'] ?>"
            required
          />
          <div class="invalid-feedback">* Invalid input</div>

          <label for="email" class="form-label mt-5">Email</label>
          <input
            type="email"
            class="form-control"
            name="email"
            placeholder="Ex. email@example.com"
            value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email'] ?>"
            required
          />
          <div class="invalid-feedback">* Invalid input</div>

          <label for="name" class="form-label mt-5">Message</label>
          <textarea
            class="form-control"
            rows="6"
            name="message"
            placeholder="Write your message here..."
            required
          ></textarea>
          <div class="invalid-feedback">* Required</div>

          <button type="submit" class="btn btn-outline-primary mt-5">
            Send
          </button>
        </form>
      </div>
      <div class="col-sm-12 col-lg-2 h-100">
        <div class="row gy-5">
          <div class="col">
            <h6 class="mb-4">Opening Hours</h6>
            <h5 class="mb-3 nowrap">Monday - Saturday<br />5pm - 10pm</h5>
            <h5 class="mt-2">Sunday<br />5pm - 8pm</h5>
          </div>

          <div class="col">
            <h6 class="mb-4">Location</h6>
            <h5 style="white-space: nowrap">
              Beachcomber, <br />
              Le Morne, <br />
              Mauritius
            </h5>
          </div>

          <div class="col">
            <h6 class="mb-4">Support</h6>
            <h5 style="font-size: medium" class="mb-3">dinasrestaurant.test@gmail.com</h5>
            <h5 style="white-space: nowrap">+230 407-9000</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- about us divider -->
<div id="about-us-divider">
  <div class="divider">
    <div style="overflow: hidden">
      <svg
        preserveAspectRatio="none"
        viewBox="0 0 1200 120"
        xmlns="http://www.w3.org/2000/svg"
        style="
          fill: #130609;
          width: 139%;
          height: 60px;
          transform: rotate(180deg);
          background-color: rgba(50, 51, 51, 0.4);
        "
      >
        <path
          d="M0 0v46.29c47.79 22.2 103.59 32.17 158 28 70.36-5.37 136.33-33.31 206.8-37.5 73.84-4.36 147.54 16.88 218.2 35.26 69.27 18 138.3 24.88 209.4 13.08 36.15-6 69.85-17.84 104.45-29.34C989.49 25 1113-14.29 1200 52.47V0z"
          opacity=".25"
        />
        <path
          d="M0 0v15.81c13 21.11 27.64 41.05 47.69 56.24C99.41 111.27 165 111 224.58 91.58c31.15-10.15 60.09-26.07 89.67-39.8 40.92-19 84.73-46 130.83-49.67 36.26-2.85 70.9 9.42 98.6 31.56 31.77 25.39 62.32 62 103.63 73 40.44 10.79 81.35-6.69 119.13-24.28s75.16-39 116.92-43.05c59.73-5.85 113.28 22.88 168.9 38.84 30.2 8.66 59 6.17 87.09-7.5 22.43-10.89 48-26.93 60.65-49.24V0z"
          opacity=".5"
        />
        <path
          d="M0 0v5.63C149.93 59 314.09 71.32 475.83 42.57c43-7.64 84.23-20.12 127.61-26.46 59-8.63 112.48 12.24 165.56 35.4C827.93 77.22 886 95.24 951.2 90c86.53-7 172.46-45.71 248.8-84.81V0z"
        />
      </svg>
    </div>
  </div>
  <div id="img-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button
        type="button"
        data-bs-target="#carouselExampleCaptions"
        data-bs-slide-to="0"
        class="active"
        aria-current="true"
        aria-label="Interior"
      ></button>
      <button
        type="button"
        data-bs-target="#carouselExampleCaptions"
        data-bs-slide-to="1"
        aria-label="Bar"
      ></button>
      <button
        type="button"
        data-bs-target="#carouselExampleCaptions"
        data-bs-slide-to="2"
        aria-label="Outdoor"
      ></button>
      <button
        type="button"
        data-bs-target="#carouselExampleCaptions"
        data-bs-slide-to="3"
        aria-label="Private"
      ></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/interior.jpg" class="d-block w-100" alt="..." />
      </div>
      <div class="carousel-item">
        <img
          src="images/interior-bar.jpg"
          class="d-block w-100"
          alt="..."
        />
      </div>
      <div class="carousel-item">
        <img
          src="images/interior-outdoor.jpg"
          class="d-block w-100"
          alt="..."
        />
      </div>
      <div class="carousel-item">
        <img
          src="images/interior-vip.jpg"
          class="d-block w-100"
          alt="..."
        />
      </div>
    </div>
    <button
      class="carousel-control-prev"
      type="button"
      data-bs-target="#img-carousel"
      data-bs-slide="prev"
    >
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button
      class="carousel-control-next"
      type="button"
      data-bs-target="#img-carousel"
      data-bs-slide="next"
    >
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <div class="divider">
    <svg
      preserveAspectRatio="none"
      viewBox="0 0 1200 120"
      xmlns="http://www.w3.org/2000/svg"
      style="
        fill: #4b443b;
        width: 145%;
        height: 60px;
        background-color: transparent;
      "
    >
      <path
        d="M0 0v46.29c47.79 22.2 103.59 32.17 158 28 70.36-5.37 136.33-33.31 206.8-37.5 73.84-4.36 147.54 16.88 218.2 35.26 69.27 18 138.3 24.88 209.4 13.08 36.15-6 69.85-17.84 104.45-29.34C989.49 25 1113-14.29 1200 52.47V0z"
        opacity=".25"
      />
      <path
        d="M0 0v15.81c13 21.11 27.64 41.05 47.69 56.24C99.41 111.27 165 111 224.58 91.58c31.15-10.15 60.09-26.07 89.67-39.8 40.92-19 84.73-46 130.83-49.67 36.26-2.85 70.9 9.42 98.6 31.56 31.77 25.39 62.32 62 103.63 73 40.44 10.79 81.35-6.69 119.13-24.28s75.16-39 116.92-43.05c59.73-5.85 113.28 22.88 168.9 38.84 30.2 8.66 59 6.17 87.09-7.5 22.43-10.89 48-26.93 60.65-49.24V0z"
        opacity=".5"
      />
      <path
        d="M0 0v5.63C149.93 59 314.09 71.32 475.83 42.57c43-7.64 84.23-20.12 127.61-26.46 59-8.63 112.48 12.24 165.56 35.4C827.93 77.22 886 95.24 951.2 90c86.53-7 172.46-45.71 248.8-84.81V0z"
      />
    </svg>
  </div>
</div>

<!-- About Us -->
<section id="about-us">
  <div class="container text-center">
    <div class="row justify-content-around">
      <div class="col-12 col-md-5 align-self-center order-md-2">
        <h6 class="gold">Who are we?</h6>
        <h1>About Us</h1>
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia
          voluptate facilis quia, vero nostrum officia iste qui minus
          voluptatibus sapiente deserunt.
        </p>
        <a
          href="about.php"
          class="btn btn-outline-primary px-5 my-4"
          >Explore</a
        >
      </div>
      <div class="col-12 col-md-5">
        <img src="images/chef-1.png" alt="" class="img-fluid order-md-1" />
      </div>
    </div>
  </div>
</section>

<!-- Reviews -->
<section id="reviews">
  <div class="container text-center">
    <div class="row flex-row-reverse justify-content-around g-4">
      <div class="col-12 col-lg-6 order-2 order-lg-1">
        <div
          id="reviews-carousel"
          class="carousel slide"
          data-bs-ride="carousel" >
          <div class="carousel-inner">
            <div class="carousel-item active">
              <blockquote
                class="blockquote blockquote-custom p-5 m-5 shadow rounded"
              >
                <div class="blockquote-custom-icon shadow-sm">
                  <i class="fa fa-quote-left text-dark"></i>
                </div>
                <p class="mb-0 mt-2 font-italic">
                  "1Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip ex ea commodo
                  <a href="#" class="text-info">@consequat</a>."
                </p>
                <hr />
                <footer class="blockquote-footer pt-4">
                  Someone famous in
                  <cite title="Source Title">Source Title</cite>
                </footer>
              </blockquote>
            </div>
            <div class="carousel-item">
              <blockquote
                class="blockquote blockquote-custom p-5 m-5 shadow rounded"
              >
                <div class="blockquote-custom-icon shadow-sm">
                  <i class="fa fa-quote-left text-dark"></i>
                </div>
                <p class="mb-0 mt-2 font-italic">
                  "2Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip ex ea commodo
                  <a href="#" class="text-info">@consequat</a>."
                </p>
                <hr />
                <footer class="blockquote-footer pt-4">
                  Someone famous in
                  <cite title="Source Title">Source Title</cite>
                </footer>
              </blockquote>
            </div>
            <div class="carousel-item">
              <blockquote
                class="blockquote blockquote-custom p-5 m-5 shadow rounded"
              >
                <div class="blockquote-custom-icon shadow-sm">
                  <i class="fa fa-quote-left text-dark"></i>
                </div>
                <p class="mb-0 mt-2 font-italic">
                  "3Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip ex ea commodo
                  <a href="#" class="text-info">@consequat</a>."
                </p>
                <hr />
                <footer class="blockquote-footer pt-4">
                  Someone famous in
                  <cite title="Source Title">Source Title</cite>
                </footer>
              </blockquote>
            </div>
          </div>
        </div>

        <!-- <div data-rw-slider="27672"></div>
        <script>
          var script = document.createElement("script");
          script.type = "module";
          script.src =
            "https://widgets.thereviewsplace.com/2.0/rw-widget-slider.js";
          document.getElementsByTagName("head")[0].appendChild(script);
        </script>
      </div> -->

      <!-- <script src="https://apps.elfsight.com/p/platform.js" defer></script>
      <div class="elfsight-app-9e526d95-464e-4fdc-ba0b-5b494aaf413c"></div> -->
    </div>
    <div class="col-12 col-lg-6 align-self-center order-1 order-lg-2">
        <h6 class="gold">What people say about us,</h6>
        <h1>Reviews</h1>
        <p class="mb-5">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit.
          Necessitatibus dolore atque rerum vel! Explicabo molestias ipsam
          tenetur, impedit quae iure.
        </p>
        <a href="reviews.php" class="btn btn-outline-primary px-5"
          >Share your experience</a
        >
      </div>

      <div class="show-reviews-text order-3">
        <a href="reviews.php" class="">Show all reviews</a>
      </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>