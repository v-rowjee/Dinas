<!-- NAVBAR -->
<nav class="
        navbar navbar-expand-lg navbar-dark
        bg-dark
        fixed-top
        my-md-3
        mx-md-5
        rounded
      ">
    <div class="container">
        <a class="navbar-brand">DINA'S</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0" id="spy-target">
                <li class="nav-item active">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#menu">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#reservation">Reservation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#online-order">Online Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about" role="button">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact" role="button">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" id="sign-in" role="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" onclick="showLogin()">Sign In</a>
                </li>
                <li>
                    <button class="btn btn-primary" id="join-us" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        Join Us
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php
include 'g_auth.php';
?>

<!-- Offcanvas for Authentication -->
<div class="offcanvas offcanvas-end p-2" data-bs-scroll="true" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header mx-2">
        <h2 id="auth-title">Login</h2>
        <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-2">
        <a class="btn btn-outline-secondary mb-4" href="<?php echo $client->createAuthUrl() ?>">
            Sign in with google
        </a>
        <!-- LOGIN -->
        <form id="login-form" action="./includes/login.php" method="$_POST">
            <div class="mb-5">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required />
            </div>
            <div class="mb-5 form-check">
                <input type="checkbox" class="form-check-input" id="checkbox" />
                <label class="form-check-label" for="checkbox">Show password</label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary px-5">Login</button>
        </form>
        <!-- REGISTER -->
        <form id="register-form" action="register.php" method="$_POST">
            <div class="mb-5">
                <label for="username_" class="form-label">New Username</label>
                <input type="text" class="form-control" id="username_" name="username_" required />
            </div>
            <div class="mb-3">
                <label for="password_" class="form-label">New Password</label>
                <input type="password" class="form-control" id="password_" name="password_" required />
            </div>
            <div class="mb-5 form-check">
                <input type="checkbox" class="form-check-input" id="checkbox_" />
                <label class="form-check-label" for="checkbox_">Show password</label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary px-5">Register</button>
        </form>
    </div>
</div>