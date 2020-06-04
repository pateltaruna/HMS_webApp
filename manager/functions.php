<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
session_start();
$HOTEL_DB = "";
// For respone
$responseObj = isset($responseObj) ? $responseObj : new stdClass();
$responseObj->for = null;
$responseObj->error = false;
$responseObj->data = null;
$responseObj->info = null;

if(isset($_SESSION["hotel"])){
    $HOTEL_DB = $_SESSION["hotel"];
}
else{
    $responseObj->error = true;
    $responseObj->info = "No Hotel Specified!";
}
if( !$responseObj->error && 
    isset($_POST["view"]) &&
    isset($_POST["from"]) &&
    isset($_POST["to"])){

    $data = $_POST["view"];
    if ($data == "totalRevenue"){
       $revenue = getTotalRevenue($HOTEL_DB);
       if ($revenue != null){
           
           $responseObj->for = "Total Revenue";
           $responseObj->data = $revenue;
           $responseObj->error = false;
           $responseObj->info = "Hotel Revenue";

       }else{
        $responseObj->error = true;
        $responseObj->info = "Error While Calculating Revenue for Hotel";
       }
    }

}


// Encode object to json and send
$myJSON = json_encode($responseObj);

echo $myJSON;




function getTotalRevenue($hotel_db){

    $link = mysqli_connect("127.0.0.1","root","test",$hotel_db);
    if ( !$link ){
        return null;
    }
    $query="select sum(total_amt) as revenue from bookings;";

    $stmt = $link->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $outp = $result->fetch_assoc();
    
    $link->close();
    return $outp["revenue"];
}

?>
