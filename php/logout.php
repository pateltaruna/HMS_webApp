<?php 
session_start();
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
unset($_SESSION["username"]);
unset($_SESSION["name"]);
session_destroy();
header("Location:../index.php");
?>