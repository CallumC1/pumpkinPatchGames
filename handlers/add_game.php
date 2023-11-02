<?php
session_start();
require "./authentication.php";
echo ("user type: " . getUserType());
if (getUserType() != "admin") { 
    header("Location: ../pages/index.php");
    exit();
}



?>
