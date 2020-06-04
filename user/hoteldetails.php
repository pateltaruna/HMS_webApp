<?php
// echo "view staff called";
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);


require_once("dbconnect.php");



if(isset($_POST["view"]) && isset($_POST["hotel_id"]) )
{  
    $link = connectdb($_POST["hotel_id"]);

    $query="select * from rooms where rooms.room_no not in (select room_no from bookings) ORDER BY CAST(room_no as SIGNED INTEGER) ASC";

    $stmt = $link->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $outp = $result->fetch_all(MYSQLI_ASSOC);

    echo json_encode($outp);
    $link->close();

}

?>