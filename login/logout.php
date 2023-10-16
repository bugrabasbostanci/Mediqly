<?php  
session_start();

session_unset();
session_destroy();

// header("Location: index.php");
header("Location: ../medicine-page.php");
