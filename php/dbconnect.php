<?php
$link = mysqli_connect("127.0.0.1","root","test","HMS");

if ( !$link ){
    echo"Error:".mysqli_connect_error();
    exit();
}
?>