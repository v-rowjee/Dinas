<body id="body-pd">
    <header class="header" id="header">
      <div class="header_toggle">
        <i class="bx bx-menu" id="header-toggle"></i>
      </div>
    </header>
    <div class="l-navbar" id="nav-bar">
      <nav class="nav">
        <a href="../index.php" class="nav_logo">
          <i class="bx bx-layer nav_logo-icon"></i>
          <span class="nav_logo-name">Dina's Restaurant</span>
        </a>
        <div class="nav_list">
          <a href="dashboard.php" class="nav_link <?php if($active == 'dashboard') echo 'active' ?>">
            <i class="bx bx-grid-alt nav_icon" title="Dashboard"></i>
            <span class="nav_name">Dashboard</span>
          </a>
          <a href="users.php" class="nav_link <?php if($active == 'users') echo 'active' ?>">
            <i class="bx bx-user nav_icon" title="Users"></i>
            <span class="nav_name">Users</span>
          </a>
          <a href="menu.php" class="nav_link <?php if($active == 'menu') echo 'active' ?>">
            <i class="bx bx-food-menu nav_icon" title="Menu items"></i>
            <span class="nav_name">Menu items</span>
          </a>
          <a href="reservations.php" class="nav_link <?php if($active == 'reservations') echo 'active' ?>">
            <i class="bx bx-bookmark nav_icon" title="Reservations"></i>
            <span class="nav_name">Reservation</span>
          </a>
          <a href="orders.php" class="nav_link <?php if($active == 'orders') echo 'active' ?>">
            <i class="bx bx-cart nav_icon" title="Orders"></i>
            <span class="nav_name">Orders</span>
          </a>
          <a href="reviews.php" class="nav_link <?php if($active == 'reviews') echo 'active' ?>">
            <i class="bx bx-message-detail nav_icon" title="Reviews"></i>
            <span class="nav_name">Reviews</span>
          </a>
        </div>
        <a href="../includes/logout.php" class="nav_link">
          <i class="bx bx-log-out nav_icon" title="Sign Out"></i>
          <span class="nav_name">SignOut</span>
        </a>
      </nav>
    </div>