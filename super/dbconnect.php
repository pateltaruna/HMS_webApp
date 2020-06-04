<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

function connectdb($dbname){
    $link = mysqli_connect("127.0.0.1","root","test",$dbname);

    if ( !$link ){
        echo"Error:".mysqli_connect_error();
        exit();

    }
    return $link;

}
?>
