<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Reçete</title>
    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- JS Files -->
    <!-- <script defer src="js/main.js"></script> -->
  </head>
  <body>
    <div class="container">
      <?php
      include "./components/navbar/navbar.php";
      include "./components/hero/hero.html";
      include "./components/feature-cards/feature-card.html";
      include "./components/info-card/info-card.html";
      include "./components/comments/comments.html";
      include "./components/blog-card/blog-cards.html";
      include "./components/faq/faq.html";
      include "./components/subscribe/subscribe.html";
      include "./components/contact/contact.html";
      include "./components/footer/footer.html";
      ?>
  </body>
</html>
