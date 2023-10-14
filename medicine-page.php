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
          <form>
            <input id="search" type="text" name="search" placeholder="Search" />
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
              <a href="/crud/index.php">Add</a>
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
        <?php
        define('DB_SERVER', 'localhost');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', '');
        define('DB_NAME', 'medicinedb');
    
        
        // Create connection
        $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        // Check connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }

// FETCH PROCESS
        $sql = "SELECT id, name, power, powerText, category, method, methodText, ageA, ageC, purpose, instruction, imageURL, prescription FROM medicines";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {

// SEARCH PROCESS

            
            // FONKSİYON KULLANARAK YILDIZ OLUŞTURMA
              //   $stars = 0;

              //   if($row['power'] > 1 ) {
              //     $stars=$row['power'];
              //   }
              //   else{
              //     $stars=1;
              //  }

              //  function createIcons($stars) {
              //    $starIcons = array_fill
              //     (0, $stars, '<i class="fa-solid fa-star"></i>');
              //     return implode('', $starIcons);
              //   }

              // " . createIcons($stars) . " şeklinde çağır
  

// MAP PROCESS
            echo "
            <div class='card'>
      <!-- image -->
      <div class='image-container'>
        <a href='null'>
          <img
            class='medicine-image'
            src='". $row["imageURL"]."'
            alt='". $row["name"]."'
          />
        </a>
      </div>
      <!-- labels, icons and rates -->
      <div class='status-container'>
        <!-- labels -->
        <div class='label-container'>
          <span class='medicine-tag'>". $row["category"]."</span>
        </div>
        <!-- icons -->
        <div class='icon-container'>
          <i class='fa-solid fa-". $row["method"]."' title='". $row["methodText"]."'></i>
          <i class='fa-solid fa-". $row["ageA"]."' title='Yetişkinler içindir'></i>
          <i class='fa-solid fa-". $row["ageC"]."' title='Çocuklar içindir'></i> 
        </div>
        <!-- rates -->
        <div class='rate-container' title=". $row["powerText"].">
    
        " . str_repeat("<i class='fa-solid fa-star'></i>",$row["power"]) . "
        
        </div>
      </div>
      <!-- informations -->
      <div class='information-container'>
        <h1 class='medicine-name'>". $row["name"]."</h1>
        <p class='medicine-purpose'>
          <b>Ne için kullanılır:</b> ". $row["purpose"]."
        </p>
        <p class='medicine-instruction'>
          <b>Nasıl kullanılır:</b> ". $row["instruction"]."
        </p>
        <p class='medicine-warning'>
          <i class='fa-solid fa-triangle-exclamation'></i>
          Kullanmadan önce prospektüse bakın
          <i class='fa-solid fa-triangle-exclamation'></i>
        </p>
        <a href='". $row["prescription"]."' class='medicine-prescription' target='_blank'>
          <button>Prospektüsü İncele</button>
        </a>
      </div>
    </div>
            ";
            
            
          }
        } else {
          echo "0 results";
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