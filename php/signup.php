<?php
// For reporting error
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

$responseObj = isset($responseObj) ? $responseObj : new stdClass();
$responseObj->for = null;
$responseObj->error = false;
$responseObj->data = null;
$responseObj->info = null;

require_once("dbconnect.php");

if(isset($_POST["uname"]) &&
    isset($_POST["phone"]) &&
    isset($_POST["email"]) &&
    isset($_POST["psw"]) &&
    isset($_POST["address"]) ){

    $name = $_POST["uname"];
    $pass = $_POST["psw"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    
    $query = "insert into users value('".$name."','".$email."','".$phone."','".$pass."',1,'".$address."')";

    if($link->query($query) === true){
        $responseObj->for = "signup";
        $responseObj->error = false;
        $responseObj->data = "Successfuly added";
    }
    else{
        $responseObj->error = true;
        $responseObj->info = "Error while Signing up!";
    }

}else{
    $responseObj->error = true;
    $responseObj->info = "Invalid Post Data";
    
}

$myJSON = json_encode($responseObj);

echo $myJSON;

?>