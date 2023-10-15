<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>İlaç Dünyası | İlaç Sayfası</title>
    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="/components/navbar/navbar.css" />
    <link rel="stylesheet" href="/components/medicine-card/medicine-card.css" />
    <link rel="stylesheet" href="/components/footer/footer.css" />
    <!-- Font Awesome -->
    <script
      src="https://kit.fontawesome.com/d50705f12e.js"
      crossorigin="anonymous"
    ></script>
    <!-- JS Files -->
    <!-- <script defer src="js/main.js"></script> -->
  </head>
  <body>
    <div class="container">
      <!-- Navbar | Start -->
      <nav class="navbar-container">
        <!-- Navbar logo -->
        <div class="navbar-logo">
          <!-- logo -->
          <a href="#">
            <img src="/assets/images/ilac-dunyasi-logo.png" alt="logo" />
          </a>
          <!-- name -->
          <a href="#">
            <h1>İlaç Dünyası</h1>
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
              <a href="#">Medicines</a>
            </li>
            <li>
              <a href="/crud-dashboard/index.php">Add</a>
            </li>
            <li>
              <a href="/login/welcome.php">Login</a>
            </li>
          </ul>
        </div>
      </nav>
      <!-- Navbar | End -->

      <!-- Card Section | Start -->
        <div class="cards-container">

        <p>Lütfen ilaç arayınız</p>
        <p>İlaçlar burada görüntülensin</p>

          <?php
          
          require "/xampp/htdocs/online-recete/db/connect.php";
          
            // Formun submit işlemini işleyen kod
            if (isset($_POST['search'])) {
              // Kullanıcının girdiği ilaç adını alın
              $input = $_POST['search'];

              // SEARCH
              $sql = "SELECT id, name, power, powerText, category, method, methodText, ageA, ageC, purpose, instruction, imageURL, prescription FROM medicines WHERE name LIKE '%$input%'";
              // FETCH
              $result = mysqli_query($conn, $sql);

          
              // Arama sonucunu gösteren kod
              if (mysqli_num_rows($result) > 0) {
                
                  while($row = mysqli_fetch_assoc($result)) {
                    // MAP
                    include "/xampp/htdocs/online-recete/db/map.php";
                  }
                  
              } else {
                  echo "0 results";
              }
          }

          mysqli_close($conn);
          ?>
        </div>
      <!-- Card Section | End -->

      <!-- Footer | Start -->
      <footer class="footer-container">
        <!-- footer logo -->
        <div class="footer-logo">
          <a href="#">
            <img
              class="footer-image"
              src="/assets/images/ilac-dunyasi-logo.png"
              alt="logo"
            />
          </a>
          <!-- name -->
          <a href="#" class="footer-name">
            <h1>İlaç Dünyası</h1>
          </a>
        </div>
        <!-- rights -->
        <p class="footer-text">© 2023 İlaç Dünyası. Tüm hakları saklıdır.</p>

        <!-- icons -->
        <div class="footer-icons">
          <i class="fa-brands fa-x-twitter"></i>
          <i class="fa-brands fa-instagram"></i>
          <i class="fa-brands fa-threads"></i>
          <i class="fa-brands fa-youtube"></i>
          <i class="fa-brands fa-facebook"></i>
        </div>
      </footer>
      <!-- Footer | End -->
    </div>
  </body>
</html>