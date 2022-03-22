<?php 
  $active = "menu"; 
  include 'includes/header.php';
  
?>
    <section id="menu">
      <div class="container">
        <h1 class="text-center pb-3">MENU</h1>
        <ul class="nav nav-pills justify-content-around g-3" role="tablist">
          <li class="nav-item" role="presentation">
            <button
              class="nav-link active"
              data-bs-toggle="pill"
              data-bs-target="#all"
              type="button"
              role="tab"
              aria-controls="all"
              aria-selected="true"
            >
              View All
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              data-bs-toggle="pill"
              data-bs-target="#starter"
              type="button"
              role="tab"
              aria-controls="starter"
              aria-selected="true"
            >
              Starter
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              data-bs-toggle="pill"
              data-bs-target="#pasta"
              type="button"
              role="tab"
              aria-controls="pasta"
              aria-selected="false"
            >
              Pasta
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              data-bs-toggle="pill"
              data-bs-target="#pizza"
              type="button"
              role="tab"
              aria-controls="pizza"
              aria-selected="false"
            >
              Pizza
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              data-bs-toggle="pill"
              data-bs-target="#dessert"
              type="button"
              role="tab"
              aria-controls="dessert"
              aria-selected="false"
            >
              Dessert
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              data-bs-toggle="pill"
              data-bs-target="#drinks"
              type="button"
              role="tab"
              aria-controls="drinks"
              aria-selected="false"
            >
              Drinks
            </button>
          </li>
        </ul>
      </div>
    </section>

    <!-- Divider -->
    <div class="divider">
      <svg
        preserveAspectRatio="none"
        viewBox="0 0 1200 120"
        xmlns="http://www.w3.org/2000/svg"
        style="fill: #140f0c; width: 145%; height: 60px"
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

    <main class="tab-content">
      <section id="all" class="tab-pane fade show active" role="tabpanel">
        <div class="container mb-3">
          <!-- starter -->
            <div class="row">
              <h1>Starter</h1>
            </div>
            <div class="row g-4">
              <?php $category = 'starter'; include 'includes/menu-items.php' ?>
            </div>

          <!-- pasta -->
            <div class="row mt-5">
              <h1>Pasta</h1>
            </div>
            <div class="row g-4">
              <?php $category = 'pasta'; include 'includes/menu-items.php' ?>
            </div>

          <!-- pizza -->
            <div class="row mt-5">
              <h1>Pizza</h1>
            </div>
            <div class="row g-4">
              <?php $category = 'pizza'; include 'includes/menu-items.php' ?>
            </div>

          <!-- dessert -->
            <div class="row mt-5">
              <h1>Dessert</h1>
            </div>
            <div class="row g-4">
              <?php $category = 'dessert'; include 'includes/menu-items.php' ?>
            </div>

          <!-- drinks -->
            <div class="row mt-5">
              <h1>Drinks</h1>
            </div>
            <div class="row g-4">
              <?php $category = 'drinks'; include 'includes/menu-items.php' ?>
            </div>
        </div>
      </section>

      <section id="starter" class="tab-pane fade" role="tabpanel">
        <div class="container">
            <div class="row">
              <h1>Starter</h1>
            </div>
            <div class="row g-5">
              <?php $category = 'starter'; include 'includes/menu-items.php' ?>
            </div>
        </div>
      </section>

      <section id="pasta" class="tab-pane fade" role="tabpanel">
        <div class="container">
            <div class="row">
              <h1>Pasta</h1>
            </div>
            <div class="row g-5">
              <?php $category = 'pasta'; include 'includes/menu-items.php' ?>
            </div>
        </div>
      </section>

      <section id="pizza" class="tab-pane fade" role="tabpanel">
        <div class="container">
            <div class="row">
              <h1>Pizza</h1>
            </div>
            <div class="row g-5">
              <?php $category = 'pizza'; include 'includes/menu-items.php' ?>
            </div>
        </div>
      </section>

      <section id="dessert" class="tab-pane fade" role="tabpanel">
        <div class="container">
            <div class="row">
              <h1>Dessert</h1>
            </div>
            <div class="row g-5">
              <?php $category = 'dessert'; include 'includes/menu-items.php' ?>
            </div>
        </div>
      </section>

      <section id="drinks" class="tab-pane fade" role="tabpanel">
        <div class="container">
            <div class="row">
              <h1>Drinks</h1>
            </div>
            <div class="row g-5">
              <?php $category = 'drinks'; include 'includes/menu-items.php' ?>
            </div>
        </div>
      </section>
    </main>

<?php include 'includes/footer.php'; ?>
