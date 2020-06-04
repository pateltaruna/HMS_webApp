<?php
session_start();
require_once("./php/dbconnect.php");

if (isset($_SESSION["username"])){
    
    $sql="select role_id from users where email='".$_SESSION["username"]."'";
    $result = $link->query($sql);
    $row = $result->fetch_assoc();
    
    $roleid =$row["role_id"];
    echo $roleid;
    if($roleid=="1" || $roleid== 1)
    {
      header("Location:./user/home.php");
    }
    
    elseif($roleid=="2"|| $roleid==2)
    {
       header("Location:./manager/home.php");
    }
    else
    {
        header("Location:./super/home.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body class="bg bg1" >
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">HMS</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="signup.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>

</body>
</html>