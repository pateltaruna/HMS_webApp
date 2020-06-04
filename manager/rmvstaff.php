<?php
// echo "view staff called";
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
session_start();
require_once("dbconnect.php");
$link = connectdb($_SESSION["hotel"]);

if(isset($_POST["email"]))
{
    
    $query="delete from staff where email='".$_POST["email"]."'";

    if($link->query($query) === true){

        echo "Staff Removed";
    }
    else{
        echo "error while removing".$link -> error;
    }
    $link->close();

}
?>