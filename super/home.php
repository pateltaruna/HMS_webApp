<?php
session_start();
$user="";
if (isset($_SESSION["username"])){
    $user=$_SESSION["name"];

    require_once("../php/dbconnect.php");
    $query="select id,name,location from hotels";
    $hotelResult = $link->query($query);
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

    <title>Document</title>
</head>

<body class="bg b9">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../index.php">HMS</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="home.php">Home</a></li>
                <li><a href="rooms.php">Rooms</a></li>
            </ul>
           
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../php/logout.php"><span class="glyphicon glyphicon-user"></span> logout</a></li>

            </ul>

        </div>
    </nav>


    <h1>welcome Super Manger <?php echo $user; ?></h1>

    <!-- Trigger the modal with a button -->

    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#managerModal">Add
        Managers</button>
    <button id="viewmanagerbtn" type="button" class="btn btn-info btn-lg" data-toggle="modal"
        data-target="#hotelModal">view
        Manager Details</button>

    <table id="viewManagerTable" class="table table-dark hidden">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Hotel Name,Location</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>







    <!-- Add Manger model -->
    <div class="modal fade" id="managerModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Manager</h4>
                </div>
                <div class="modal-body">
                    <form id="addManger">
                        <div class="form-group">
                            <label for="exampleInputName">Name</label>
                            <input type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp"
                                name="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword">Password</label>
                            <input type="text" class="form-control" id="exampleInputPassword"
                                aria-describedby="emailHelp" name="password" placeholder="Enter password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPhone">Phone number</label>
                            <input type="text" class="form-control" name="phone" id="exampleInputPhone"
                                placeholder="Phone_no">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputAddress">Address</label>
                            <input type="text" class="form-control" id="exampleInputAddress"
                                aria-describedby="addressHelp" name="address" placeholder="Enter address">

                        </div>
                        <div class="form-group">
                            <div class="dropdown forManager">
                                <button id="selected" class="btn btn-primary dropdown-toggle" data-hotel_id="0"
                                    type="button" data-toggle="dropdown">Select Hotel
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
<script src="js/super.js"></script>

</html>