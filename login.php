<?php
  session_start();
  if (isset($_SESSION["ERROR"])){
    echo "Invalid Credentials!";
    unset($_SESSION["ERROR"]);
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">

</head>

<body class="bg b7">
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">HMS</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="signup.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>

      </ul>
    </div>
  </nav>
  <div class="card">
  <div class="card-body mycard">
    <h2>Login Form</h2>

    <form action="./php/login_validation.php" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="uname"
          placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="psw" placeholder="Password">
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="remember" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
  </div>

</body>

</html>