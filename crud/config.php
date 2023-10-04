<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'medicinedb');
 

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>

<!-- net ninja, video 24 | creat datas at db -->
<!-- net ninja, video 25 | admin profile creat at db -->
<!-- net ninja, videos 26-33  -->