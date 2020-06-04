<?php
// echo "view staff called";
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);


require_once("dbconnect.php");
require_once("functions.php");

if(isset($_POST["room_no"]) && isset($_POST["hotel_id"])&&isset($_POST["check_in"]) && isset($_POST["check_out"]) && isset($_POST["email"])&& isset($_POST["total_amount"]) )
{  
    
    $user = getUserData($_POST["email"]);

    $link = connectdb($_POST["hotel_id"]);
    $userDetail = $user["name"]."," .$user["phone"].",".$user["address"];

    $query="insert into bookings values ('".$userDetail."','".$_POST["email"]."','".$_POST["room_no"]."','".$_POST["check_in"]."','".$_POST["check_out"]."',".$_POST["total_amount"].");";
    if($link->query($query) === true){
        echo "New Booking added";
    }
    else{
        echo "error while booking".$link -> error;
    }
    $link->close();

}

?>