<?php
// db connection
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'medicinedb');
 

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Get slug data
$slug = isset($_GET['slug']) ? $_GET['slug'] : '';

if (!empty($slug)) {
    // Get medicine(slug) data from DB
    $sql = "SELECT * FROM medicines WHERE slug = '$slug'";
    $result = mysqli_query($link, $sql);

    if ($result && mysqli_num_rows($result) >0) 
    { 
      $medicine = mysqli_fetch_assoc($result); 
      $medicineId = $medicine['id']; // İlaç kimliğini burada al
        if (isset($_POST['post_comment'])) {
          $name = $_POST['name'];
          $comment = $_POST['comment'];
  
      // İlaç slug'ını temel alarak ilaç bilgisini çek
      $sqlMedicine = "SELECT * FROM medicines WHERE slug = '$slug'";
      $resultMedicine = mysqli_query($link, $sqlMedicine);
  
          if ($resultMedicine && mysqli_num_rows($resultMedicine) > 0) {
            $medicine = mysqli_fetch_assoc($resultMedicine);
  
        // Yorumu veritabanına ekle Add 
        $sqlInsertComment = "INSERT INTO comments (medicine_id, name, comment) VALUES ('$medicineId', '$name', '$comment')";

        if ($link->query($sqlInsertComment) === TRUE) {
            echo "";
        } else {
            echo "Error: " . $sqlInsertComment . "<br>" . $link->error;
        }
    } else {
        echo "İlaç bulunamadı.";
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $medicine['name']; ?> Page</title>
    <link rel="shortcut icon" href="/assets/images/logo-group-16.svg" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/medicine-page-template.css" />
    <script src="https://kit.fontawesome.com/d50705f12e.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <!-- navbar -->
    <?php include "/xampp/htdocs/Mediqly/components/navbar-main/navbar.php"; ?>

    <div class="main">
      <!-- bread crumbs -->
      <div class="bread-crumbs-container">
      <ul class="bread-crumbs">
        <li>
          <a href="/index.php">
            <i class="fa-solid fa-house"></i>
          </a>
        </li>
        <li>
          <i class="fa-solid fa-chevron-right"></i>
        </li>
        <li>
          <a href="/medicine-search-page.php">
            Medicines
          </a>
        </li>
        <li>
          <i class="fa-solid fa-chevron-right"></i>
        </li>
        <li>
          <?php echo $medicine['name']; ?>
        </li>
      </ul>
      </div>

      <!-- content -->
      <div class="content-container">
      <div class="card">
        <!-- image -->
        <img
          src="<?php echo $medicine['imageURL']; ?>"
          alt="<?php echo $medicine['name']; ?>"
          class="card__image"
        />
        <!-- header -->
        <header class="card__header">
          <h1 class="card__title"><?php echo $medicine['name']; ?></h1>
          <p class="card__subtitle">
            <?php echo $medicine['name']; ?>  nedir ne için kullanılır? <?php echo $medicine['name']; ?> nasıl
            kullanılır? <?php echo $medicine['name']; ?> ilacının yan etkileri ve kullanırken dikkat
            edilmesi gerekenler nelerdir?
          </p>
        </header>

        <!-- descriptions -->
        <div class="card__description">
          <!-- nedir, ne için kullanılır -->
          <div class="purpose-wrapper">
            <h2 class="purpose-title">Ne için kullanılır:</h2>
            <p class="purpose-text">
              <?php echo $medicine['purpose']; ?>
            </p>
          </div>

          <!-- nasıl kullanılır -->
          <div class="instruction-wrapper">
            <h2 class="instruction-title">Nasıl kullanılır:</h2>
            <p class="instruction-text">
              <?php echo $medicine['instruction']; ?>
            </p>
          </div>
        </div>

        <!-- form -->
        <div class="comment-container">
          <div class="comment__form">
            <h1>Add Comment</h1>
            <form action="" method="post" class="form">
              <!-- name wrapper -->
              <div class="name-wrapper">
                <label for="name" class="label__name">Name</label>
                <input
                type="text"
                name="name"
                placeholder="name"
                class="input__name"
                />
              </div>
              <!-- comment wrapper -->
              <div class="comment-wrapper">
                <label for="comment" class="label__comment">Comment</label>
                <textarea
                name="comment"
                placeholder="comment"
                class="input__comment"
                ></textarea>
              </div>
              <!-- button -->
              <button type="submit" class="submit-btn" name="post_comment">Submit</button>
            </form>

          </div>
           <!-- comments -->
           <div class="posted-comments">
            <h1 class="posted-comments__title">Comments</h1>
              <?php
                $sqlComments = "SELECT * FROM comments WHERE  medicine_id = '$medicineId'";
                $resultComments = $link->query($sqlComments);
              
                if ($resultComments->num_rows > 0) {
                  while ($row = $resultComments->fetch_assoc()) {
              ?>
              <div class="posted-comment__body">
                <h2 class="posted-comment__name"><?php echo $row  ['name'];?></h2>
                <p class="posted-comment__text"><?php echo $row ['comment'];?></p>
                <?php }}?>
              </div>
            </div>
        </div>

       
      </div>
      </div>
    </div>
    <!-- footer -->
    <?php
    include "/xampp/htdocs/Mediqly/components/footer-basic/footer-basic.html";
    ?>

  </body>
</html>
<?php
    } else {
        echo "İlaç bulunamadı.";
    }
} else {
    echo "Slug parametresi eksik veya geçersiz.";
}

// Bağlantıyı kapat
mysqli_close($link);
?>
