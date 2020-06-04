<?php
// For reporting error
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
session_start();

require_once("dbconnect.php");

if(isset($_POST["uname"]) && isset($_POST["psw"]))
{ 
    $usname = $_POST["uname"];
    $pass = $_POST["psw"];
    $sql = "select *from users where email='".$usname."' and password='".$pass."'";

    $result = $link->query($sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();

        $_SESSION["username"]=$row["email"];
        $_SESSION["name"] = $row["name"];


        $sql = "select role.role from role right join users on users.role_id = role.id where users.email='".$row["email"]."'";
        
        $result = $link->query($sql);
        $row = $result->fetch_assoc();

        if($row["role"]=="manager"){
            header("Location: ../manager/home.php");
            exit;
        }
        elseif($row["role"]=="user")
        {
            header("Location: ../user/home.php");
            exit;   
        }
        elseif($row["role"]=="super_manager")
        {
            header("Location: ../super/home.php");
            exit;       

        }
        else
        {
            exit;
        }

        
    }else{
        $_SESSION["ERROR"]= "Invalid username or password!";
        header("Location: ../login.php"); ;
    }

}

?>