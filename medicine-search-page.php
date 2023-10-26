<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Medicines</title>
    <link rel="shortcut icon" href="/assets/images/logo-group-16.svg" type="image/x-icon">
    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="/components/medicine-card/medicine-card.css" />
    <!-- Font Awesome -->
    <script
      src="https://kit.fontawesome.com/d50705f12e.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="container">
      <!-- Navbar | Start -->
      <?php
      include "/xampp/htdocs/Mediqly/components/navbar-search/navbar.php";
      ?>
      <!-- Navbar | End -->

      <!-- Card Section | Start -->

       

<div class="card-container">

<?php
  include("/xampp/htdocs/Mediqly/config.php");

  // Arama sonucunu gösteren kod
  if (isset($_POST['search'])) {
      // Kullanıcının girdiği ilaç adını al
      $input = $_POST['search'];

      // SEARCH
      $sql_search = "SELECT id, name, slug, power, powerText, category, method, methodText, ageA, ageC, purpose, instruction, imageURL, prescription FROM medicines WHERE name LIKE '%$input%'";
      // FETCH
      $result_search = mysqli_query($link, $sql_search);

      // Arama sonuçlarını bir diziye ekleyelim
      $search_results = [];
      while ($row_search = mysqli_fetch_assoc($result_search)) {
          $search_results[] = $row_search;
      }

      // Tek bir card.php dosyasını döngü içinde dahil ederek sonuçları gösterelim
      foreach ($search_results as $result) {
          $row = $result; // Bu satır eklenmiştir
          if (isset($_SESSION['username']) && isset($_SESSION['id']) && isset($_SESSION['role'])) {
              include '/xampp/htdocs/Mediqly/logged-card.php';
          } else {
              include '/xampp/htdocs/Mediqly/card.php';
          }
      }

      // Eğer sonuç yoksa mesajı gösterelim
      if (empty($search_results)) {
          echo "0 results";
      }
  } else {
      // İlk olarak tüm ilaçları göster
      $sql_all = "SELECT * FROM medicines";
      $result_all = mysqli_query($link, $sql_all);

      if ($result_all->num_rows > 0) {
          // Verileri döngü ile alıp kullanma
          while ($row_all = mysqli_fetch_assoc($result_all)) {
              $row = $row_all; // Bu satır eklenmiştir
              if (isset($_SESSION['username']) && isset($_SESSION['id']) && isset($_SESSION['role'])) {
                  include '/xampp/htdocs/Mediqly/logged-card.php';
              } else {
                  include '/xampp/htdocs/Mediqly/card.php';
              }
          }
      }
  }
  ?>


</div>


       
      <!-- Card Section | End -->

      <!-- Footer | Start -->
      <?php
      include "/xampp/htdocs/Mediqly/components/footer-basic/footer-basic.html";
      ?>
      <!-- Footer | End -->
    </div>
  </body>
</html>


