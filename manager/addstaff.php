<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
session_start();
require_once("dbconnect.php");
$link = connectdb($_SESSION["hotel"]);

if(isset($_POST["name"])&&isset($_POST["email"])&&isset($_POST["phone"])&&isset($_POST["address"]))
{
    
    $query="insert into staff values('" .$_POST["name"]. "','" .$_POST["email"]."','".$_POST["phone"]."','".$_POST["address"]."')";
    
    if($link->query($query) === true){
        echo "staff added";
    }
    else{
        echo "error while adding staff";
    }
    
}

?>