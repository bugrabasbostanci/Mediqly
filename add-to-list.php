<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Reçete</title>
    <link rel="stylesheet" href="/components/medicine-card/medicine-card.css">
    <link rel="stylesheet" href="/assets/css/add-to-list.css">
</head>
<body>
    

<?php
include "/xampp/htdocs/online-recete/components/navbar-search/navbar.php";
?>
<div class="container">
    <div class="card-container">
<?php


// Veritabanı bağlantısı
$link = mysqli_connect('localhost', 'root', '', 'medicinedb');

// Veritabanı bağlantı hatası kontrolü
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// İlaç eklemek için form gönderildiyse
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // İlaç eklemek için gerekli işlemleri buraya ekleyin
    
    // Örneğin:
    $medicine_id = $_POST['medicine_id'];
    $user_id = $_SESSION['id'];
    
    $insert_query = "INSERT INTO user_medicine_list (user_id, medicine_id) VALUES ($user_id, $medicine_id)";
    
    if (mysqli_query($link, $insert_query)) {
        echo "İlaç başarıyla listenize eklendi.";
    } else {
        echo "Hata: " . $insert_query . "<br>" . mysqli_error($link);
    }
}

// Kullanıcının ilaç listesini görüntülemek için sorgu
$user_id = $_SESSION['id'];
$list_query = "SELECT m.name, m.slug, m.power, m.method, m.methodText, m.powerText, m.category, m.ageA, m.ageC, m.purpose, m.imageURL, m.prescription, m.instruction
               FROM user_medicine_list uml
               JOIN medicines m ON uml.medicine_id = m.id
               WHERE uml.user_id = $user_id";

$list_result = mysqli_query($link, $list_query);

// İlaç listesini ekrana yazdır
if ($list_result) {
    
    
    
    while ($row = mysqli_fetch_assoc($list_result)) {
        include "/xampp/htdocs/online-recete/card.php";
    }
    
    
} else {
    echo "Error: " . mysqli_error($link);
}

// Veritabanı bağlantısını kapat
mysqli_close($link);
?>
    </div>
</div>
<?php
include "/xampp/htdocs/online-recete/components/footer/footer.html";
?>

</body>
</html>
