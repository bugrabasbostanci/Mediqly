<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/medicine-list-page.css" />
    <!-- <link rel="stylesheet" href="assets/css/style.css" /> -->
    <link rel="stylesheet" href="/components/medicine-card/medicine-card.css" />

    <script
      src="https://kit.fontawesome.com/d50705f12e.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <?php
    include "/xampp/htdocs/online-recete/components/navbar-list/navbar.php";

    ?>
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

    <?php
    include "/xampp/htdocs/online-recete/components/footer/footer.html";
    ?>
  </body>
</html>
