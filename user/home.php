<?php
session_start();
$user="";
$userEmail="";
// $userPhone="";

if (isset($_SESSION["username"])){
    $user=$_SESSION["name"];
    $userEmail = $_SESSION["username"]; 

    require_once("../php/dbconnect.php");
    $query="select id,name,location from hotels";
    $hotelResult = $link->query($query);
}
else{
    header("Location: login.php");
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

    <!-- <script src="https://code.jquery.com/jquery-3.4.1.js"></script> -->

    <title>Document</title>
</head>

<body class="bg b7">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../index.php">HMS</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="home.php">Home</a></li>
            </ul>
            
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../php/logout.php"><span class="glyphicon glyphicon-user"></span> logout</a></li>

                </ul>

            </ul>
        </div>
    </nav>

    <?php
        echo "<h1 id='header' data-email='".$userEmail."'>welcome ".$user."</h1>";
    ?>

    <div class="dropdown">
        <button id="selected" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select Hotel
            <span  class="caret"></span></button>
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
    <div class="modal fade" id="bookingModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Manager</h4>
                </div>
                <div class="modal-body">
                    <form id="roomBooking">
                        <div class="form-group">
                            <label for="exampleInputHotelName">Hotel Name </label>
                            <input type="text" class="form-control" id="exampleInputHotelName"
                                aria-describedby="nameHelp" name="hotelName" placeholder="Enter name" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputHotelRoomNo">Room Number </label>
                            <input type="text" class="form-control" id="exampleInputHotelRoomNo"
                                aria-describedby="nameHelp" name="roomNo" placeholder="Enter room no" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputRoomRent">Room Rent </label>
                            <input type="text" class="form-control" id="exampleInputRoomRent"
                                aria-describedby="nameHelp" name="rent" placeholder="Enter room no" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputemail">Email </label>
                            <input type="email" class="form-control" id="exampleInputemail" aria-describedby="emailHelp"
                                name="email" placeholder="Enter email" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputcheckin">Check-in </label>
                            <input type="date" class="form-control" id="exampleInputcheckin" aria-describedby="nameHelp"
                                name="checkin">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputcheckout">Check-out </label>
                            <input type="date" class="form-control" id="exampleInputcheckout"
                                aria-describedby="nameHelp" name="checkout">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputAmount">Total Rent</label>
                            <input type="text" class="form-control" id="exampleInputAmount" aria-describedby="nameHelp"
                                name="totalAmount" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="generateInvoice" type="button" class="btn btn-primary invisible" >Generate Invoice</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

</body>
<script src="js/user.js"></script>

</html>