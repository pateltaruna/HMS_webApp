<?php
session_start();
require_once("../php/dbconnect.php");
$user="";
if (isset($_SESSION["username"])){
    $user=$_SESSION["name"];
    $sql="select * from hotels where manager='".$_SESSION["username"]."'";
    $result = $link->query($sql);
    $row = $result->fetch_assoc();
    
    $hotelid =$row["id"];
    $hotelname =$row["name"];
    $location =$row["location"];
    $manager =$row["manager"];
    $_SESSION["hotel"]="Hotel_".$hotelid;
}else{
    header("Location:../login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <title>Home</title>
</head>

<body class="bg b8">
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="../index.php">HMS</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Home</a></li>
        <li ><a href="staff.php">Staff</a></li>
        <li ><a href="rooms.php">Rooms</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../php/logout.php"><span class="glyphicon glyphicon-user"></span> logout</a></li>
     
      </ul>
    </div>
  </nav>
.

   <h1><?php  echo $hotelname." ".$location; ?></h1>
    <h1>Welcome! Manger <?php echo $user; ?></h1>

    <!-- Trigger the modal with a button -->
   
   
    <!-- Add Hotel Modal -->
    <div class="modal fade" id="hotelModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Hotels</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="HotelName">Hotel Name</label>
                            <input type="text" class="form-control" id="HotelName" placeholder="Hotel Name">
                        </div>
                        <div class="form-group">
                            <label for="HotelLocation">Hotel Location</label>
                            <input type="text" class="form-control" id="HotelLocation" placeholder="Hotel Location">
                        </div>
                        <div class="form-group">
                            <label for="HotelManager">Select Manager</label>
                            <select id="HotelManger" class="form-control form-control-sm">
                                <option>Select Manager</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Add Manger odel -->
    <div class="modal fade" id="managerModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Manager</h4>
                </div>
                <div class="modal-body">
                    <form id="addManger" action="./php/addManager.php">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                                placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <div id="result"></div>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</body>
<script src="js/smanager.js"></script>

</html>