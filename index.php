<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Reçete</title>
    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- JS Files -->
    <script defer src="js/main.js"></script>
  </head>
  <body>
    <div class="container">
      <!-- navbar test -->
      <?php
      include './components/navbar/navbar.php';
      ?>

      <!-- header -->
      <div class="header">
        <h1 class="title">Online Reçete</h1>
      </div>
      <!-- search bar -->
      <div class="search-container">
        <input
          type="search"
          name="search"
          id="search"
          placeholder="Search..."
        />
      </div>

      <!-- medicine cards -->
      <div class="card-container"></div>

      <!-- footer test -->
      <div data-include="footer"></div>
    </div>
    <!-- JS CODES |  IMPORT COMPONENTS-->
    <!-- <script>
      document.addEventListener("DOMContentLoaded", function () {
        var includes = document.querySelectorAll("[data-include]");

        includes.forEach(function (element) {
          var file =
            "components/" +
            element.getAttribute("data-include") +
            "/" +
            element.getAttribute("data-include") +
            ".html";
          fetch(file)
            .then(function (response) {
              if (!response.ok) {
                throw new Error(
                  "Dosya yüklenirken hata oluştu: " + response.status
                );
              }
              return response.text();
            })
            .then(function (html) {
              element.innerHTML = html;
            })
            .catch(function (error) {
              console.error(error);
            });
        });
      });
    </script> -->
  </body>
</html>
