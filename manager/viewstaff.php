<?php
// echo "view staff called";
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
session_start();
require_once("dbconnect.php");
$link = connectdb($_SESSION["hotel"]);

if(isset($_POST["view"]))
{
    
    $query="select * from staff";

    $stmt = $link->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $outp = $result->fetch_all(MYSQLI_ASSOC);

    echo json_encode($outp);

}
$link->close();
?>