<?php

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
    <link rel="stylesheet" href="/components/navbar-search/navbar.css" />
    <script
      src="https://kit.fontawesome.com/d50705f12e.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <nav class="navbar">
      <!-- Navbar logo -->
      <div class="navbar__logo">
        <!-- logo -->
        <a href="/index.php" class="navbar__logo-image-link">
          <img
            src="/assets/images/ilac-dunyasi-logo.png"
            class="navbar__logo-image"
            alt="logo"
          />
        </a>
        <!-- name -->
        <a href="/index.php" class="navbar__logo-name-link">
          <h1 class="navbar__logo-name">Mediqly</h1>
        </a>

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
    </div>

      <!-- Search Bar -->
      <?php
      if (strpos($_SERVER['REQUEST_URI'], 'add-to-list.php') === false) {
        echo '
            <div class="navbar__search">
                <form action="" method="post" class="search__form">
                    <input
                        id="search"
                        type="text"
                        name="search"
                        placeholder="Search"
                        class="search__input"
                        onclick="hide()"
                    />
                    <input type="submit" value="search" class="search__button" />
                </form>
            </div>
        ';
    }
    else {
      echo '';
    }
      ?>
      

      <!-- Navbar menu -->
      <div class="navbar__menu">
        <i class="navbar__menu-toggler fa-solid fa-bars"></i>
        <ul class="menu__items">
          <li class="menu__item">
            <a class="item__link item__link-home" href="/index.php">Home</a>
          </li>
          <li class="menu__item menu__item--normal">
            <a
              class="item__link item__link-meds"
              href="/medicine-search-page.php"
              >Medicines</a
            >
          </li>

          <li class="menu__item menu__item--normal">
          <?php
        
        if(isset($_SESSION['role'])) {
          echo "<a
          class='item__link item__link-meds'
          href='/add-to-list.php'
          >List</a
        >
        ";
          
        }
        else {
          echo "";
        }
        ?> 
            
          </li>
        </ul>
      </div>
    </nav>
  </body>
</html>
