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
  </head>
  <body>
    <div class="container">
      <!-- Navbar | Start -->
      <?php
      include "/xampp/htdocs/online-recete/components/navbar-search/navbar.html";
      ?>
      <!-- Navbar | End -->

      <!-- Card Section | Start -->
        <div class="cards-container">

        <p>İlaçlar burada görüntülensin</p> 

          <?php
          
          require "/xampp/htdocs/online-recete/config.php";
          
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
                    include "/xampp/htdocs/online-recete/map.php";
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
      <?php
      include "/xampp/htdocs/online-recete/components/footer/footer.html";
      ?>
      <!-- Footer | End -->
    </div>
  </body>
</html>