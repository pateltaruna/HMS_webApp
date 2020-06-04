<?php

 require_once("../php/dbconnect.php");

 if(isset($_POST["view"]))
 {
     if($_POST["view"]==="manager"){
         $query="select users.name,users.email,users.phone,hotels.name as hname,hotels.location from users join hotels on users.email=hotels.manager";

         $stmt = $link->prepare($query);
         $stmt->execute();
         $result = $stmt->get_result();
         $outp = $result->fetch_all(MYSQLI_ASSOC);
     
         echo json_encode($outp);
     
     }
     else{
     echo "request recieved";
     }
 }
?>