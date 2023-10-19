<?php
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
    // Veritabanından ilgili ilacın bilgilerini çekme sorgusu
    $sql = "SELECT * FROM medicines WHERE slug = '$slug'";
    $result = mysqli_query($link, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $medicine = mysqli_fetch_assoc($result);
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $medicine['name']; ?> Sayfası</title>
            <link rel="stylesheet" href="/assets/css/medicine-page-template.css">
        </head>
        <body>
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
            Paranox Supozituvar nedir ne için kullanılır, Paranox nasıl
            kullanılır, Paranox ilacının yan etkileri ve kullanırken dikkat
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
        <!-- <form action="">
          <input type="text" placeholder="adınız" />
          <input type="text" placeholder="eposta" />
          <textarea
            name=""
            id=""
            cols="30"
            rows="10"
            placeholder="yorumunuzu yazınız"
          ></textarea>
          <button type="submit"></button>
        </form> -->
      </div>
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
