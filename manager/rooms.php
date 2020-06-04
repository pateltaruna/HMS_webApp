<?php

session_start();
$user="";
if (isset($_SESSION["username"])){
    // require_once("dbconnect.php");
}else{
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
                <li ><a href="staff.php">Staff</a></li>
                <li class="active"><a href="rooms.php">Rooms</a></li>
                
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../php/logout.php"><span class="glyphicon glyphicon-user"></span> logout</a></li>

            </ul>
        </div>
    </nav>



    <h1>welcome Manger <?php echo $user; ?></h1>

    <!-- Trigger the modal with a button -->

    <button id="booked" type="button" class="btn btn-info btn-lg">Booked rooms</button>
    <button id="available" type="button" class="btn btn-info btn-lg">available rooms</button>

    <button id="revenue" type="button" class="btn btn-info btn-lg">Total Revenue</button>
    <h2 id="totalRevText"></h2>


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


    <script src="./js/smanager.js"></script>
</body>
</html>