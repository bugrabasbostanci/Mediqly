<?php
include("/xampp/htdocs/online-recete/config.php");
session_start();
$user = "";
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $sql = "SELECT * FROM users WHERE role='$user'";
    $result = mysqli_query($link, $sql);
}
?>
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
    <script src="/components/navbar-main/script.js"></script>
  </head>
  <body>

  <nav class='navbar'>
    <!-- navbar left side -->
    <section class='navbar__left'>
      <!-- Navbar logo -->
      <div class='navbar__logo'>
        <!-- logo -->
        <a href='/' class='navbar__logo-image-link'>
          <img
            src='/assets/images/ilac-dunyasi-logo.png'
            class='navbar__logo-image'
            alt='logo'
          />
        </a>
        <!-- name -->
        <a href='/' class='navbar__logo-name-link logo-button'>
          <span class='navbar__logo-name actual-text '>&nbsp;Mediqly&nbsp;</span>
          <span class='navbar__logo-name hover-text'>&nbsp;Mediqly&nbsp;</span>
        </a>
      </div>

      <!-- Login -->
      <div class='navbar__login'>
        <div class='dropdown'>
        <a href='/login/index.php' class='navbar__login-link'>

        <?php
        if (isset($_SESSION['role']) && $_SESSION['role'] == "user") {
          echo "<i class='fa-solid fa-user navbar__login-icon'></i>
          <h1 class='navbar__login-text'>Profile</h1>
          </a>
          <div class='menu'>
              <a href='/medicine-search-page.php'> Medicines </a>
              <a href='/add-to-list.php'> List </a>
              <a href='/login/logout.php'> Logout </a>
          </div>";
      } else {
          echo "<i class='fa-solid fa-arrow-right-to-bracket navbar__login-icon'></i>
          <h1 class='navbar__login-text'>Login</h1>
          </a>";
      }
        ?>
          
      </div>
      </div>
    </section>

    <!-- navbar right side -->
    <section class='navbar__right'>
      <!-- Navbar menu -->
      <div class='navbar__menu'>
      <img
                        class="navbar__menu-toggler"
                        src="/components/navbar-main/burger-menu.svg"
                        title='Burger Menu'
                        alt='Burger Menu'
                        onclick="toggleMenu(this)"
                    >
        <ul class='menu__items'>
          <li class='menu__item'>
            <a class='item__link ' href='/index.php'>Home</a>
          </li>
          <li class='menu__item '>
            <a
              class='item__link'
              href='/medicine-search-page.php'
              >Medicines</a
            >
          </li>
          <li class='menu__item '>
            <a class='item__link ' href='/'>Blogs</a>
          </li>
          <li class='menu__item '>
            <a class='item__link ' href='/'>Contact</a>
          </li>
          <li class='menu__item  menu__item--search'>
        <!-- Search Bar -->
      
        <a href='/medicine-search-page.php' class='navbar__search-link item__link'>
          <i class='fa-solid fa-magnifying-glass navbar__search-icon'></i>
          Search
        </a>
          </li>
        </ul>
      </div>
    </section>
  </nav> 
  </body>
</html>
