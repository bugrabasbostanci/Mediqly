<?php  
session_start();
session_unset();
session_destroy();
header("Location: ../medicine-search-page.php");
