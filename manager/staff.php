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
    <script src="./js/smanager.js"></script>
    <title>Staff</title>
</head>

<body class="bg b10">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../index.php">HMS</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="home.php">Home</a></li>
                <li class="active"><a href="staff.php">Staff</a></li>
                <li><a href="rooms.php">Rooms</a></li>
               
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../php/logout.php"><span class="glyphicon glyphicon-user"></span> logout</a></li>

            </ul>
        </div>
    </nav>



    <h1>welcome Manger <?php echo $user; ?></h1>

    <!-- Trigger the modal with a button -->

    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#managerModal">Add
        staff</button>
    <button id="vsbtn" type="button" class="btn btn-info btn-lg">View Staff</button>


    <table id="staffTable" class="table table-dark invisible">
        <thead>
            <tr>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">phone</th>
                <th scope="col">address</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>




    <!-- Add staff model -->
    <div class="modal fade" id="managerModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Manager</h4>
                </div>
                <div class="modal-body">
                    <form id="addStaff" action="addstaff.php">
                        <div class="form-group">
                            <label for="exampleInputname">Name </label>
                            <input type="text" class="form-control" id="exampleInputname" aria-describedby="nameHelp"
                                name="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputemail">Email </label>
                            <input type="email" class="form-control" id="exampleInputemail" aria-describedby="emailHelp"
                                name="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputphone">Phone number </label>
                            <input type="text" class="form-control" id="exampleInputphone" aria-describedby="phoneHelp"
                                name="phone" placeholder="Enter Phone number">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputaddress">Address </label>
                            <input type="text" class="form-control" id="exampleInputaddress"
                                aria-describedby="addressHelp" name="address" placeholder="Enter address">
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