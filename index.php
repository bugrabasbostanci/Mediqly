<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mediqly</title>
    <link rel="shortcut icon" href="/assets/images/logo-group-16.svg" type="image/x-icon">
    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- JS Files -->
    <!-- <script defer src="js/main.js"></script> -->
  </head>
  <body>
  <div class="container">
  <?php
   include "./components/navbar-main/navbar.php";
   include "./components/hero/hero.html";
   include "./components/feature-cards/feature-card.html";
   include "./components/info-card/info-card.html";
   include "./components/comments/comments.html";
   include "./components/blog-card/blog-cards.html";
   include "./components/faq/faq.html";
   include "./components/blobz/blob.html";
   include "./components/contact/contact.html";
   include "./components/footer/footer.html";
  ?>
    </div>
  </body>
</html>
