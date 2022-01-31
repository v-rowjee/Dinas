<!-- Nav Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top my-md-3 mx-md-5 rounded">
  <div class="container">
    <a class="navbar-brand" href="#">
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
          <a class="nav-link <?php if($active == "menu")echo "active"?>" href="<?php if($active != "index") echo "index.php" ?>#menu">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($active == "reservation")echo "active"?>" href="<?php if($active != "index") echo "index.php" ?>#reservation">Reservation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($active == "online-order")echo "active"?>" href="<?php if($active != "index") echo "index.php" ?>#online-order">Online Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($active == "contact")echo "active"?>" href="<?php if($active != "index") echo "index.php" ?>#contact" role="button">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($active == "about-us")echo "active"?>" href="<?php if($active != "index") echo "index.php" ?>#about-us" role="button">About Us</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        
        <?php 
        if(isset($_SESSION['username'])){
        ?>

        <li class="nav-item nowrap">
          <a
            class="nav-link"
            href="includes/logout.php"
            >Sign Out</a
          >
        </li>

        <?php
        }else{  // else
        ?>

          <li class="nav-item">
          <a
            class="nav-link"
            id="sign-in"
            role="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasRight"
            aria-controls="offcanvasRight"
            >Sign In</a
          >
        </li>
        <li>
          <button
            class="btn btn-primary text-dark nowrap"
            id="join-us"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasRight"
            aria-controls="offcanvasRight"
          >
            Join Us
          </button>
        </li>

        <?php
        } // end else
        ?>

      </ul>
    </div>
  </div>
  </nav>

    <!-- Offcanvas for Authentication -->
    <div
      class="offcanvas offcanvas-end p-2"
      data-bs-scroll="false"
      id="offcanvasRight"
      >
      <div class="offcanvas-header mx-2">
        <h2 id="auth-title">Login</h2>
        <button
          type="button"
          class="btn-close btn-close-white text-reset"
          data-bs-dismiss="offcanvas"
          aria-label="Close"
        ></button>
      </div>
      <div class="offcanvas-body mx-2">
        <a
          class="btn btn-outline-secondary mb-4"
          href="&lt;?php echo $client->createAuthUrl() ?>"
        >
          Sign in with google
        </a>
        <!-- LOGIN -->
        <form
          id="login-form"
          class="needs-validation"
          novalidate
          action="includes/login.php"
          method="POST"
        >
          <div class="mb-5">
            <label for="username" class="form-label">Username</label>
            <input
              type="text"
              class="form-control"
              name="username"
              pattern="[a-zA-Z0-9-]+"
              title="Letters and numbers only"
              maxlength="16"
              required
            />
            <div class="invalid-feedback">* Invalid input</div>
          </div>
          

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input
              type="password"
              class="form-control password"
              id="password"
              name="password"
              required
            />
            <div class="invalid-feedback">* Required field</div>
          </div>
          <div class="mb-5 form-check">
            <input type="checkbox" class="form-check-input" id="checkbox"/>
            <label class="form-check-label" for="checkbox">Show password</label>
          </div>
          <button
            type="submit"
            name="submit"
            class="btn btn-primary text-dark px-5"
          >
            Login
          </button>
        </form>

        <!-- REGISTER -->
        <form id="register-form" class="needs-validation" novalidate action="includes/register.php" method="POST">
          <div class="mb-5">
            <label for="username" class="form-label">Username</label>
            <input
              type="text"
              class="form-control"
              name="username"
              pattern="[a-zA-Z0-9-]+"
              title="Letters and numbers only"
              maxlength="16"
              required              
            />
            <div class="invalid-feedback">* Invalid input</div>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input
              type="password"
              class="form-control password"
              id="password_"
              name="password"
              required
            />
            <div class="invalid-feedback">* Required field</div>
          </div>
          <div class="mb-5 form-check">
            <input type="checkbox" class="form-check-input" id="checkbox_"/>
            <label class="form-check-label" for="checkbox"
              >Show password</label
            >
          </div>

          <div class="mb-5">
            <label for="name" class="form-label">Name</label>
            <input
              type="text"
              class="form-control"
              name="name"
              pattern="[a-zA-Z\s]+"
              title="Letters,numbers and spaces only"
              style="text-transform: capitalize;"
              required
            />
            <div class="invalid-feedback">* Invalid input</div>
          </div>

          <div class="mb-5">
            <label for="email" class="form-label">Email</label>
            <input
              type="email"
              class="form-control"
              name="email"
              required
            />
            <div class="invalid-feedback">* Invalid input</div>
          </div>

          <div class="mb-5">
            <label for="phone" class="form-label">Mobile Phone</label>
            <input
              type="number"
              class="form-control"
              name="phone"
              required
            />
            <div class="invalid-feedback">* Invalid input</div>
          </div>

          <button
            type="submit"
            name="submit"
            class="g-recaptcha btn btn-primary text-dark px-5"
          >
            Register
          </button>
        </form>
      </div>
    </div>