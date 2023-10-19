<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Medicines</title>
    <link rel="shortcut icon" href="/assets/images/ilac-dunyasi-logo.png" type="image/x-icon">
    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="/components/navbar-search/navbar.css" />
    <link rel="stylesheet" href="/components/medicine-card/medicine-card.css" />
    <link rel="stylesheet" href="/components/footer/footer.css" />
    <!-- Font Awesome -->
    <script
      src="https://kit.fontawesome.com/d50705f12e.js"
      crossorigin="anonymous"
    ></script>
    <!-- JS Files -->
    <!-- <script defer src="js/main.js"></script> -->
    <script defer src="/js/test.js"></script>
  </head>
  <body>
    <div class="container">
      <!-- Navbar | Start -->
      <?php
      include "/xampp/htdocs/online-recete/components/navbar-search/navbar.html";
      ?>
      <!-- Navbar | End -->

      <!-- Card Section | Start -->
        <div class="card-container">

        <?php
        
  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');
  define('DB_NAME', 'medicinedb');
   
  
  $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
   
  
  if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  
  // Veritabanından ilaç verilerini çekme sorgusu
  $sql = "SELECT id, name, slug, power, powerText, category, method, methodText, ageA, ageC, purpose, instruction, imageURL, prescription FROM medicines";
  $result = mysqli_query($link, $sql);
  
  if ($result->num_rows > 0) {
      // Verileri döngü ile alıp kullanma
      while($row = mysqli_fetch_assoc($result)) {
          include "/xampp/htdocs/online-recete/card.php" ;
      }
      
  } else {
      echo "Veritabanında ilaç bulunamadı.";
  }
  
  // Bağlantıyı kapat
  mysqli_close($link);
  
        ?>

        </div>
      <!-- Card Section | End -->

      <!-- Footer | Start -->
      <?php
      include "/xampp/htdocs/online-recete/components/footer/footer.html";
      ?>
      <!-- Footer | End -->
    </div>
  </body>
</html>


