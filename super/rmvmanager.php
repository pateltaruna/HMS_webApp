<?php
// echo "view staff called";
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);


require_once("../php/dbconnect.php");

if(isset($_POST["email"]) )
{  
    
    
    $query1="delete from users where email='".$_POST["email"]."'";

    $query2="update hotels set manager=null where manager='".$_POST["email"]."'";
    
    if($link->query($query1) === true && $link->query($query2)){

        echo "Manager Removed";
    }
    else{
        echo "error while adding".$link -> error;
    }
    $link->close();

}

?>