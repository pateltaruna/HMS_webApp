<?php

session_start();
$user="";
$userEmail="";

if (isset($_SESSION["username"])){
    $user=$_SESSION["name"];
    $userEmail = $_SESSION["username"]; 

    require_once("../php/dbconnect.php");
    $query="select id,name,location from hotels";
    $hotelResult = $link->query($query);
}
else{
    header("Location: ../login.php");
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

    <title>Staff</title>
</head>

<body class="bg b5">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../index.php">HMS</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="home.php">Home</a></li>
                <li class="active"><a href="rooms.php">Rooms</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../php/logout.php"><span class="glyphicon glyphicon-user"></span> logout</a></li>

            </ul>
        </div>
    </nav>



    <div class="dropdown forRooms">
        <button id="selected" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select Hotel
            <span class="caret"></span></button>
        <ul class="dropdown-menu" id="hotelList">

            <?php
            if($hotelResult->num_rows > 0) {
                // output data of each row
                while($row = $hotelResult->fetch_assoc()) {
                    echo "<li><a href='#' data-pdsa-dropdown-val='".$row["id"]."'>".$row["name"].",".$row["location"]."</a></li>";
                }
            }
        ?>
        </ul>
    </div>

    <!-- Trigger the modal with a button -->
    <div id="viewBtn" class="container hidden" data-hotel_id="0">
        <button id="booked" data-hid=0 type="button" class="btn btn-info btn-lg">Booked rooms</button>
        <button id="available" data-hid=0 type="button" class="btn btn-info btn-lg">available rooms</button>
        <h2 id="totalRevText">Total Revemue</h2>
    </div>


    <table id="bookingTable" class="table table-dark hidden ">
        <thead>
            <tr>
                <th scope="col">Room_no.</th>
                <th scope="col">Booked_by</th>
                <th scope="col">Check_in</th>
                <th scope="col">Check_out</th>
                <th scope="col">Total_amount</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <table id="availableTable" class="table table-dark hidden">
        <thead>
            <tr>
                <th scope="col">Room_no.</th>
                <th scope="col">Room type(S/D)</th>
                <th scope="col">Type(AC/NAC)</th>
                <th scope="col">Rent</th>

            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>


    <script src="./js/super.js"></script>
</body>

</html>