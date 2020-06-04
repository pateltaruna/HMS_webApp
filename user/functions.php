<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);


function getUserData($email){

    $link = mysqli_connect("127.0.0.1","root","test","HMS");
    if ( !$link ){
        return null;
    }
    $query="select * from users where email='".$email."'";

    $stmt = $link->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $outp = $result->fetch_assoc();
    
    $link->close();
    return $outp;
}

function getHotelData($hotel_id){

    $link = mysqli_connect("127.0.0.1","root","test","HMS");
    if ( !$link ){
        return null;
    }
    
    $query="select * from hotels where id=".$hotel_id."";

    $stmt = $link->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $outp = $result->fetch_assoc();
    
    $link->close();
    return $outp;
}

function getRoomData($hotel_id,$room_no){
    
    $hotel_db="Hotel_".$hotel_id;
    $link = mysqli_connect("127.0.0.1","root","test",$hotel_db);

    if ( !$link ){
        return null;
    }
    
    $query="select * from rooms where room_no=".$room_no."";

    $stmt = $link->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $outp = $result->fetch_assoc();
    
    $link->close();
    return $outp;
}
?>
