<?php
// echo "view staff called";
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
session_start();
require_once("dbconnect.php");
$link = connectdb($_SESSION["hotel"]);

if(isset($_POST["view"]))
{   $query="";
    if($_POST["view"]==="booked")
    {
        $query="select * from rooms join bookings on rooms.room_no=bookings.room_no ORDER BY CAST(rooms.room_no as SIGNED INTEGER) ASC";
    }
    elseif($_POST["view"]==="available"){
        $query="select * from rooms where rooms.room_no not in (select room_no from bookings) ORDER BY CAST(room_no as SIGNED INTEGER) ASC";

    }
   

    $stmt = $link->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $outp = $result->fetch_all(MYSQLI_ASSOC);

    echo json_encode($outp);

}
$link->close();
?>