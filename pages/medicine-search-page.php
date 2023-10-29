<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Medicines</title>
    <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/x-icon">
    <!-- CSS Files -->
    <link rel="stylesheet" href="/components/medicine-card/medicine-card.css" />
    <link rel="stylesheet" href="/assets/css/medicine-search-page.css">
    <!-- Font Awesome -->
    <script
      src="https://kit.fontawesome.com/d50705f12e.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="container">
      
      <!-- Navbar -->
      
      <?php include "../components/navbar-search/navbar.php"?>
      
      <!-- Card Section | Start -->
      <div class="card-container">
      <?php require_once "../config/config.php"; 

      // Search result
      if (isset($_POST['search'])) {
      // Take search input
      $input = $_POST['search'];

      // SEARCH
      $sql_search = "SELECT id, name, slug, power, powerText, category, method, methodText, ageA, ageC, purpose, instruction, imageURL, prescription FROM medicines WHERE name LIKE '%$input%'";

      // FETCH
      $result_search = mysqli_query($link, $sql_search);

      // Add results into array
      $search_results = [];
        while ($row_search = mysqli_fetch_assoc($result_search)) {
          $search_results[] = $row_search;
        }

        // Show results with card template
        foreach ($search_results as $result) {
            $row = $result; 
            if (isset($_SESSION['username']) && isset($_SESSION['id']) && isset($_SESSION['role'])) {
                include '../pages/logged-card.php';
            } else {
                include '../pages/card.php';
            }
        }
        // No result
        if (empty($search_results)) {
          echo "Aradığınız ilaç sistemde bulunmuyor.";
        }
      } else {
        // Firstly show medicines
        $sql_all = "SELECT * FROM medicines";
        $result_all = mysqli_query($link, $sql_all);

        if ($result_all->num_rows > 0) {
            while ($row_all = mysqli_fetch_assoc($result_all)) {
                $row = $row_all; 
                if (isset($_SESSION['username']) && isset($_SESSION['id']) && isset($_SESSION['role'])) {
                    include '../pages/logged-card.php';
                } else {
                    include '../pages/card.php';
              }
           }
        }
      }
      ?>
    </div>
      <!-- Card Section | End -->

      <!-- Footer -->
      <?php include "../components/footer-secondary/footer-secondary.html"?>
    </div>
  </body>
</html>


