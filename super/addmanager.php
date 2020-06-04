<?php
// echo "view staff called";
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);


require_once("../php/dbconnect.php");

if(isset($_POST["name"]) && isset($_POST["hotel_id"])&&isset($_POST["phone_no"]) && isset($_POST["password"])&&  isset($_POST["address"]) && isset($_POST["email"]) )
{  
    
     
    $query1="insert into users values ('".$_POST["name"]."','".$_POST["email"]."','".$_POST["phone_no"]."','".$_POST["password"]."',2,'".$_POST["address"]."')";
    $query2="update hotels set manager='".$_POST["email"]."' where id=".$_POST["hotel_id"]."";
    
    $flag1 = false;
    $flag2 = false;
    if($link->query($query1) === true){
        $flag1 = true;
    }
    // $link->query($query1) === true &&
    if( $link->query($query2)===true){
        $flag2 = true; 
    }
    $error = "";
    if(!$flag1){
        $error .="Error in query1";
    }
    if(!$flag2){
        $error .="Error in query2";
    }

    if($flag1 && $flag2){
        echo "New manager added";
    }
    else{
        echo $error,$link -> error;
    }
    $link->close();

}

?>