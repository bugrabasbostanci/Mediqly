<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Navbar Component</title>
    <link rel="stylesheet" href="/components/navbar-search/navbar.css" />
    <script
      src="https://kit.fontawesome.com/d50705f12e.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <nav class="navbar-container">
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

      <!-- Search Bar -->
      <div class="navbar-search">
          <form action="" method="post">
            <input id="search" type="text" name="search" placeholder="Search"  />
            <input type="submit" value="search">
          </form>
        </div>

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
    </nav>
  </body>
</html>