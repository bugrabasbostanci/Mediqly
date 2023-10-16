<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Navbar Component</title>
    <link rel="stylesheet" href="/components/navbar-main/navbar.css" />
    <script
      src="https://kit.fontawesome.com/d50705f12e.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <nav class="navbar-container">
      <div class="left">
        <!-- Navbar logo -->
        <div class="navbar-logo">
          <!-- logo -->
          <a href="#">
            <img src="/assets/images/ilac-dunyasi-logo.png" alt="logo" />
          </a>
          <!-- name -->
          <a href="#">
            <h1>MediCenter</h1>
          </a>
        </div>

        <!-- Find Pharmacy -->
        <div class="find-pharmacy">
          <a href="/pharmacy.php" class="find-pharmacy-link">
            <i class="fa-solid fa-location-dot"></i>
            <span class="find-pharmacy-text">Find Pharmacy</span>
          </a>
        </div>
      </div>
      <div class="right">
        <!-- Nav links -->
        <div class="navbar-links">
          <i class="fa-solid fa-bars toggle"></i>
          <ul class="navbar-menu">
            <li>
              <a href="/index.php">Home</a>
            </li>
            <li>
              <a href="/medicine-page.php">Medicines</a>
            </li>
            <li>
              <a href="">Blogs</a>
            </li>
            <li>
              <a href="">Contact</a>
            </li>
          </ul>
        </div>

        <!-- Search Bar -->
        <div class="navbar-search">
          <a href="/medicine-page.php" class="navbar-search-link">
            <i class="fa-solid fa-magnifying-glass"></i>
            <span class="navbar-search-text">Search</span>
          </a>
        </div>
      </div>
    </nav>
  </body>
</html>
