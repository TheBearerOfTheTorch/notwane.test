<?php
session_start();
if(!isset($_SESSION['auth']))
{
    header("Location: /index.php?error=unauthorised page access. please login");
    exit;
}
else
{
    if($_SESSION['authType'] != "local")
    {
        header("Location: /index.php?error=unauthorised page request");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Locals</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assetsx/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assetsx/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assetsx/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assetsx/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assetsx/css/countdown-timer-1.css">
    <link rel="stylesheet" href="assetsx/css/countdown-timer.css">
    <link rel="stylesheet" href="assetsx/css/Custom-File-Upload.css">
    <link rel="stylesheet" href="assetsx/css/Drag--Drop-Upload-Form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <!-- <link rel="stylesheet" href="assetsx/css/styles.css"> -->
    <link rel="stylesheet" href="assetsxx/css/styles.min.css">
</head>
<body>
    <div class="wrapper" style="width:98%;" >
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="col-md-3">
                <a class="navbar-brand" href="#"><img src="uploads/200px-Olympic_rings_without_rims.svg.webp" style="height:50;width:50px;">Netwane Olympics</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            
            <div class="col-md-3" style="margin-left:200px;">
                <div class="collapse navbar-collapse text-center" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="#"><i class="far fa-bell" style="font-size: 23px;"></i></a></li>
                        <li class="dropdown nav-item">
                            <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Profile</a>
                            <div class="dropdown-menu text-center" style="color:white" role="menu">
                                <a class="dropdown-item" role="presentation" href="app/Logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-5">
                <form method="GET" action="app/Search.php" class="form-inline mt-2 mt-md-0">
                    <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" name="searchB"  type="submit"><i class="icon ion-ios-search" style="font-size: 20px;"></button>
                </form>
            </div>
        </nav>
        <div class="row">
            <div class="wrapper " style="padding-top:70px; padding-left:10px;">
                <!-- this is where the sexont one start -->
                <div class="col-md-4">
                    <main role="main" style="margin-top:10px;">
                        <div class="container">
                            <?php
                                    $servername = '127.0.0.1';
                                    $dbname = 'notwane';
                                    $username = 'root';
                                    $pass = "";
                                try
                                {
                                    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$pass);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                                    $stmt = $conn->prepare("SELECT * FROM tickets");
                                    $stmt->execute();

                                    if($stmt->rowCount())
                                    {
                                        while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                                        {
                                            $ticket = $data['ticketType'];

                                            if($ticket == "master")
                                            {
                                                ?>
                                                <div class="card" style="margin-left:60px;width:400px;">
                                                    <div class="card-head">
                                                        <div class="card-title">
                                                            Ticket Num:<?php echo $data['ticketNumber'];?><br>
                                                            Ticket price:<?php
                                                                echo "P200.00";
                                                            ?>
                                                        </div>
                                                        <img alt="Boxing pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/c/c2/Boxing_pictogram.svg/17px-Boxing_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/c/c2/Boxing_pictogram.svg/26px-Boxing_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/c/c2/Boxing_pictogram.svg/34px-Boxing_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" />
                                                        <img alt="Athletics pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Athletics_pictogram.svg/17px-Athletics_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Athletics_pictogram.svg/26px-Athletics_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Athletics_pictogram.svg/34px-Athletics_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" />
                                                        <img alt="Archery pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Archery_pictogram.svg/17px-Archery_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Archery_pictogram.svg/26px-Archery_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Archery_pictogram.svg/34px-Archery_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" />
                                                        <img alt="Baseball pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Baseball_pictogram.svg/17px-Baseball_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Baseball_pictogram.svg/26px-Baseball_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Baseball_pictogram.svg/34px-Baseball_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" />
                                                        <img alt="Wrestling Freestyle pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/3/35/Wrestling_Freestyle_pictogram.svg/17px-Wrestling_Freestyle_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/3/35/Wrestling_Freestyle_pictogram.svg/26px-Wrestling_Freestyle_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/3/35/Wrestling_Freestyle_pictogram.svg/34px-Wrestling_Freestyle_pictogram.svg.png 2x" data-file-width="960" data-file-height="960" />
                                                        <img alt="Equestrian Dressage pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Equestrian_Dressage_pictogram.svg/17px-Equestrian_Dressage_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Equestrian_Dressage_pictogram.svg/26px-Equestrian_Dressage_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Equestrian_Dressage_pictogram.svg/34px-Equestrian_Dressage_pictogram.svg.png 2x" data-file-width="960" data-file-height="960" />
                                                        <img alt="Volleyball (beach) pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/7/76/Volleyball_%28beach%29_pictogram.svg/17px-Volleyball_%28beach%29_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/7/76/Volleyball_%28beach%29_pictogram.svg/26px-Volleyball_%28beach%29_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/7/76/Volleyball_%28beach%29_pictogram.svg/34px-Volleyball_%28beach%29_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" />
                                                        <img alt="Gymnastics (artistic) pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/1/12/Gymnastics_%28artistic%29_pictogram.svg/17px-Gymnastics_%28artistic%29_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/1/12/Gymnastics_%28artistic%29_pictogram.svg/26px-Gymnastics_%28artistic%29_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/1/12/Gymnastics_%28artistic%29_pictogram.svg/34px-Gymnastics_%28artistic%29_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" />
                                                        <img alt="BMX freestyle pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/c/c7/BMX_freestyle_pictogram.svg/17px-BMX_freestyle_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/c/c7/BMX_freestyle_pictogram.svg/26px-BMX_freestyle_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/c/c7/BMX_freestyle_pictogram.svg/34px-BMX_freestyle_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" />
                                                        <img alt="Canoeing (slalom) pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/a/af/Canoeing_%28slalom%29_pictogram.svg/17px-Canoeing_%28slalom%29_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/a/af/Canoeing_%28slalom%29_pictogram.svg/26px-Canoeing_%28slalom%29_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/a/af/Canoeing_%28slalom%29_pictogram.svg/34px-Canoeing_%28slalom%29_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" />
                                                        <img alt="3x3 basketball pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/4/43/3x3_basketball_pictogram.svg/17px-3x3_basketball_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/4/43/3x3_basketball_pictogram.svg/26px-3x3_basketball_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/4/43/3x3_basketball_pictogram.svg/34px-3x3_basketball_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" />
                                                        <img alt="Swimming pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Swimming_pictogram.svg/17px-Swimming_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Swimming_pictogram.svg/26px-Swimming_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Swimming_pictogram.svg/34px-Swimming_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" />
                                                        <img alt="Equestrian Jumping pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/6/69/Equestrian_Jumping_pictogram.svg/17px-Equestrian_Jumping_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/6/69/Equestrian_Jumping_pictogram.svg/26px-Equestrian_Jumping_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/6/69/Equestrian_Jumping_pictogram.svg/34px-Equestrian_Jumping_pictogram.svg.png 2x" data-file-width="960" data-file-height="960" />
                                                        <img alt="Wrestling Freestyle pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/3/35/Wrestling_Freestyle_pictogram.svg/17px-Wrestling_Freestyle_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/3/35/Wrestling_Freestyle_pictogram.svg/26px-Wrestling_Freestyle_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/3/35/Wrestling_Freestyle_pictogram.svg/34px-Wrestling_Freestyle_pictogram.svg.png 2x" data-file-width="960" data-file-height="960" />
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <img src="uploads/200px-Olympic_rings_without_rims.svg.webp" style="height:90;width:90px;">
                                                            <a href="#" class="btn btn-primary" data-target="#director_leader_reassign" data-toggle="modal">Buy master event Ticket</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <?php
                                            }
                                            else if($ticket == "medium")
                                            {
                                                ?>
                                                <div class="card" style="margin-left:60px;width:400px;">
                                                    <div class="card-head">
                                                        <div class="card-title">
                                                            Ticket Num:<?php
                                                                echo $data['ticketNumber'];
                                                            ?><br>
                                                            Ticket price:<?php
                                                                echo "P100.00";
                                                            ?>
                                                        </div>
                                                        <img alt="Boxing pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/c/c2/Boxing_pictogram.svg/17px-Boxing_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/c/c2/Boxing_pictogram.svg/26px-Boxing_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/c/c2/Boxing_pictogram.svg/34px-Boxing_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" />
                                                        <img alt="Athletics pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Athletics_pictogram.svg/17px-Athletics_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Athletics_pictogram.svg/26px-Athletics_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Athletics_pictogram.svg/34px-Athletics_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" />
                                                        <img alt="Archery pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Archery_pictogram.svg/17px-Archery_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Archery_pictogram.svg/26px-Archery_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Archery_pictogram.svg/34px-Archery_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" />
                                                        <img alt="Baseball pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Baseball_pictogram.svg/17px-Baseball_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Baseball_pictogram.svg/26px-Baseball_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Baseball_pictogram.svg/34px-Baseball_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" />
                                                        <img alt="Wrestling Freestyle pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/3/35/Wrestling_Freestyle_pictogram.svg/17px-Wrestling_Freestyle_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/3/35/Wrestling_Freestyle_pictogram.svg/26px-Wrestling_Freestyle_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/3/35/Wrestling_Freestyle_pictogram.svg/34px-Wrestling_Freestyle_pictogram.svg.png 2x" data-file-width="960" data-file-height="960" />
                                                        <img alt="Equestrian Dressage pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Equestrian_Dressage_pictogram.svg/17px-Equestrian_Dressage_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Equestrian_Dressage_pictogram.svg/26px-Equestrian_Dressage_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Equestrian_Dressage_pictogram.svg/34px-Equestrian_Dressage_pictogram.svg.png 2x" data-file-width="960" data-file-height="960" />
                                                        <img alt="Volleyball (beach) pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/7/76/Volleyball_%28beach%29_pictogram.svg/17px-Volleyball_%28beach%29_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/7/76/Volleyball_%28beach%29_pictogram.svg/26px-Volleyball_%28beach%29_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/7/76/Volleyball_%28beach%29_pictogram.svg/34px-Volleyball_%28beach%29_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" />
                                                        
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <img src="uploads/200px-Olympic_rings_without_rims.svg.webp" style="height:90;width:90px;">
                                                            <a href="#" class="btn btn-primary" data-target="#director_leader_reassign" data-toggle="modal">Buy Ticket medium event</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <div class="card" style="margin-left:60px;width:400px;">
                                                    <div class="card-head">
                                                        <div class="card-title">
                                                            Ticket Num:<?php echo $data['ticketNumber'];?><br>
                                                            Ticket price:<?php
                                                                echo "P70.00";
                                                            ?>
                                                        </div>
                                                        <img alt="Boxing pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/c/c2/Boxing_pictogram.svg/17px-Boxing_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/c/c2/Boxing_pictogram.svg/26px-Boxing_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/c/c2/Boxing_pictogram.svg/34px-Boxing_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" />
                                                        <img alt="Athletics pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Athletics_pictogram.svg/17px-Athletics_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Athletics_pictogram.svg/26px-Athletics_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Athletics_pictogram.svg/34px-Athletics_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" />
                                                        <img alt="Archery pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Archery_pictogram.svg/17px-Archery_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Archery_pictogram.svg/26px-Archery_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Archery_pictogram.svg/34px-Archery_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" />
                                                        <img alt="Baseball pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Baseball_pictogram.svg/17px-Baseball_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Baseball_pictogram.svg/26px-Baseball_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Baseball_pictogram.svg/34px-Baseball_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" />
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <img src="uploads/200px-Olympic_rings_without_rims.svg.webp" style="height:90;width:90px;">
                                                            <a href="#" class="btn btn-primary" data-target="#director_leader_reassign" data-toggle="modal">Buy normal event Ticket</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="modal fade" role="dialog" tabindex="-1" id="director_leader_reassign" style="margin-top: 70px;">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title text-center" style="width: 100%;">Buy this Ticket</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                            <div class="modal-body">
                                                                <form method="post" action="app/LocalTicket.php">
                                                                    <img src="uploads/200px-Olympic_rings_without_rims.svg.webp" style="height:150;width:150px;">
                                                                    <input class="form-control" type="number" placeholder="Enter The ticket Number" style="margin-bottom: 10px;" required="" name="ticketNumber">
                                                                    <p style="margin-bottom: 0px;font-size: 14px;">Choose Payment option</p>
                                                                    <input class="form-control" type="text" style="width: 100%;margin-bottom: 10px;" required="" name="payment" placeholder="Enter payment type">
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-primary btn-block" name="buyTicket" type="submit">Pay for the ticket</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                    }
                                }
                                catch(PDOException $e)
                                {
                                    echo "failed to establish a connection with the database. server might be off";
                                }
                                
                            ?>
                        </div>
                    </main>
                </div>
                <div class="col-md-3 " style="margin-top:10px;">
                    <?php

                        //checking if the user has bought a ticket
                        $servername = '127.0.0.1';
                        $dbname = 'notwane';
                        $username = 'root';
                        $pass = "";
                        try
                        {
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$pass);
                            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                            $stmt = $conn->prepare("SELECT * FROM boughttickets WHERE useremail=?");
                            $stmt->bindValue(1,$_SESSION['auth']);
                            $stmt->execute();

                            if($stmt->rowCount())
                            {
                                while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                                {
                                    $username = $data['username'];
                                    $ticketType = $data['ticketType'];

                                    ?>
                                    <!-- inside the while loop -->
                                    <div class="card" style="margin-left:180px;width:600px;">
                                        <div class="card">
                                            <div class="card-head">
                                                <img src="uploads/200px-Olympic_rings_without_rims.svg.webp" style="height:90;width:90px;margin-left:100px;">
                                                <p class="btn btn-primary">Your Event Schedule for a <?php echo $data['ticketType']." ticket";?></p>
                                            </div>
                                            <div class="jumbotron">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Mon</th>
                                                                <th>Tue</th>
                                                                <th>Wed</th>
                                                                <th>thu</th>
                                                                <th>fri</th>
                                                                <th>sat</th>
                                                                <th>sun</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center" >
                                                                    <?php
                                                                        if($data['ticketType'] == "master")
                                                                        {
                                                                            echo"<big><b>•</b></big>";
                                                                        }
                                                                        else if($data['ticketType'] == "medium")
                                                                        {
                                                                           echo "<big><b>•</b></big>";
                                                                        }
                                                                    ?>
                                                                    
                                                                </td>
                                                                <td class="text-center" >
                                                                    <?php
                                                                        if($data['ticketType'] == "master")
                                                                        {
                                                                            echo"<big><b>•</b></big>";
                                                                        }
                                                                        else if($data['ticketType'] == "normal")
                                                                        {
                                                                           echo "<big><b>•</b></big>";
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td class="text-center" >
                                                                    <?php
                                                                        if($data['ticketType'] == "master")
                                                                        {
                                                                           echo "<big><b>•</b></big>";
                                                                        }
                                                                        else if($data['ticketType'] == "medium")
                                                                        {
                                                                           echo "<big><b>•</b></big>";
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td class="text-center" >
                                                                    <?php
                                                                        if($data['ticketType'] == "master")
                                                                        {
                                                                           echo "<big><b>•</b></big>";
                                                                        }
                                                                        else if($data['ticketType'] == "normal")
                                                                        {
                                                                           echo "<big><b>•</b></big>";
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td class="text-center" >
                                                                    <?php
                                                                        if($data['ticketType'] == "master")
                                                                        {
                                                                           echo "<big><b>•</b></big>";
                                                                        }
                                                                        else if($data['ticketType'] == "medium")
                                                                        {
                                                                           echo "<big><b>•</b></big>";
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td class="text-center" >
                                                                <?php
                                                                        if($data['ticketType'] == "master")
                                                                        {
                                                                           echo "<big><b>•</b></big>";
                                                                        }
                                                                        else if($data['ticketType'] == "normal")
                                                                        {
                                                                           echo "<big><b>•</b></big>";
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td class="text-center" >
                                                                <?php
                                                                        if($data['ticketType'] == "master")
                                                                        {
                                                                           echo "<big><b>•</b></big>";
                                                                        }
                                                                        else if($data['ticketType'] == "medium")
                                                                        {
                                                                           echo "<big><b>•</b></big>";
                                                                        }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="jumbotron">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        <?php echo $data['username'];?>
                                                            <tr>
                                                                <?php
                                                                    if($data['ticketType'] == "master")
                                                                    {
                                                                        ?>
                                                                        <th><img alt="Boxing pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/c/c2/Boxing_pictogram.svg/17px-Boxing_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/c/c2/Boxing_pictogram.svg/26px-Boxing_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/c/c2/Boxing_pictogram.svg/34px-Boxing_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></th>
                                                                        <th><img alt="Athletics pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Athletics_pictogram.svg/17px-Athletics_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Athletics_pictogram.svg/26px-Athletics_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Athletics_pictogram.svg/34px-Athletics_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></th>
                                                                        <th><img alt="Archery pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Archery_pictogram.svg/17px-Archery_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Archery_pictogram.svg/26px-Archery_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Archery_pictogram.svg/34px-Archery_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></th>
                                                                        <th><img alt="Baseball pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Baseball_pictogram.svg/17px-Baseball_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Baseball_pictogram.svg/26px-Baseball_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Baseball_pictogram.svg/34px-Baseball_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></th>
                                                                        <th><img alt="Wrestling Freestyle pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/3/35/Wrestling_Freestyle_pictogram.svg/17px-Wrestling_Freestyle_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/3/35/Wrestling_Freestyle_pictogram.svg/26px-Wrestling_Freestyle_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/3/35/Wrestling_Freestyle_pictogram.svg/34px-Wrestling_Freestyle_pictogram.svg.png 2x" data-file-width="960" data-file-height="960" /></th>
                                                                        <th><img alt="Equestrian Dressage pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Equestrian_Dressage_pictogram.svg/17px-Equestrian_Dressage_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Equestrian_Dressage_pictogram.svg/26px-Equestrian_Dressage_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Equestrian_Dressage_pictogram.svg/34px-Equestrian_Dressage_pictogram.svg.png 2x" data-file-width="960" data-file-height="960" /></th>
                                                                        <th><img alt="Volleyball (beach) pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/7/76/Volleyball_%28beach%29_pictogram.svg/17px-Volleyball_%28beach%29_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/7/76/Volleyball_%28beach%29_pictogram.svg/26px-Volleyball_%28beach%29_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/7/76/Volleyball_%28beach%29_pictogram.svg/34px-Volleyball_%28beach%29_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></th>
                                                                        <th><img alt="Gymnastics (artistic) pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/1/12/Gymnastics_%28artistic%29_pictogram.svg/17px-Gymnastics_%28artistic%29_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/1/12/Gymnastics_%28artistic%29_pictogram.svg/26px-Gymnastics_%28artistic%29_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/1/12/Gymnastics_%28artistic%29_pictogram.svg/34px-Gymnastics_%28artistic%29_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></th>
                                                                        <th><img alt="BMX freestyle pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/c/c7/BMX_freestyle_pictogram.svg/17px-BMX_freestyle_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/c/c7/BMX_freestyle_pictogram.svg/26px-BMX_freestyle_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/c/c7/BMX_freestyle_pictogram.svg/34px-BMX_freestyle_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></th>
                                                                        <th><img alt="Canoeing (slalom) pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/a/af/Canoeing_%28slalom%29_pictogram.svg/17px-Canoeing_%28slalom%29_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/a/af/Canoeing_%28slalom%29_pictogram.svg/26px-Canoeing_%28slalom%29_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/a/af/Canoeing_%28slalom%29_pictogram.svg/34px-Canoeing_%28slalom%29_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></th>
                                                                        <th><img alt="3x3 basketball pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/4/43/3x3_basketball_pictogram.svg/17px-3x3_basketball_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/4/43/3x3_basketball_pictogram.svg/26px-3x3_basketball_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/4/43/3x3_basketball_pictogram.svg/34px-3x3_basketball_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></th>
                                                                        <th><img alt="Swimming pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Swimming_pictogram.svg/17px-Swimming_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Swimming_pictogram.svg/26px-Swimming_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Swimming_pictogram.svg/34px-Swimming_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" />
                                                                        <th><img alt="Equestrian Jumping pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/6/69/Equestrian_Jumping_pictogram.svg/17px-Equestrian_Jumping_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/6/69/Equestrian_Jumping_pictogram.svg/26px-Equestrian_Jumping_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/6/69/Equestrian_Jumping_pictogram.svg/34px-Equestrian_Jumping_pictogram.svg.png 2x" data-file-width="960" data-file-height="960" /></th>
                                                                        <th><img alt="Wrestling Freestyle pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/3/35/Wrestling_Freestyle_pictogram.svg/17px-Wrestling_Freestyle_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/3/35/Wrestling_Freestyle_pictogram.svg/26px-Wrestling_Freestyle_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/3/35/Wrestling_Freestyle_pictogram.svg/34px-Wrestling_Freestyle_pictogram.svg.png 2x" data-file-width="960" data-file-height="960" /></th>
                                                                        <?php
                                                                    }
                                                                    else if($data['ticketType'] == "medium")
                                                                    {
                                                                        ?>
                                                                        <th><img alt="Boxing pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/c/c2/Boxing_pictogram.svg/17px-Boxing_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/c/c2/Boxing_pictogram.svg/26px-Boxing_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/c/c2/Boxing_pictogram.svg/34px-Boxing_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></th>
                                                                        <th><img alt="Athletics pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Athletics_pictogram.svg/17px-Athletics_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Athletics_pictogram.svg/26px-Athletics_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Athletics_pictogram.svg/34px-Athletics_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></th>
                                                                        <th><img alt="Archery pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Archery_pictogram.svg/17px-Archery_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Archery_pictogram.svg/26px-Archery_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Archery_pictogram.svg/34px-Archery_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></th>
                                                                        <th><img alt="Baseball pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Baseball_pictogram.svg/17px-Baseball_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Baseball_pictogram.svg/26px-Baseball_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Baseball_pictogram.svg/34px-Baseball_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></th>
                                                                        <th><img alt="Wrestling Freestyle pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/3/35/Wrestling_Freestyle_pictogram.svg/17px-Wrestling_Freestyle_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/3/35/Wrestling_Freestyle_pictogram.svg/26px-Wrestling_Freestyle_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/3/35/Wrestling_Freestyle_pictogram.svg/34px-Wrestling_Freestyle_pictogram.svg.png 2x" data-file-width="960" data-file-height="960" /></th>
                                                                        <th><img alt="Equestrian Dressage pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Equestrian_Dressage_pictogram.svg/17px-Equestrian_Dressage_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Equestrian_Dressage_pictogram.svg/26px-Equestrian_Dressage_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Equestrian_Dressage_pictogram.svg/34px-Equestrian_Dressage_pictogram.svg.png 2x" data-file-width="960" data-file-height="960" /></th>
                                                                        <th><img alt="Volleyball (beach) pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/7/76/Volleyball_%28beach%29_pictogram.svg/17px-Volleyball_%28beach%29_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/7/76/Volleyball_%28beach%29_pictogram.svg/26px-Volleyball_%28beach%29_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/7/76/Volleyball_%28beach%29_pictogram.svg/34px-Volleyball_%28beach%29_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></th>
                                                                        <?php
                                                                    }
                                                                    else if($data['ticketType'] == "normal")
                                                                    {
                                                                        ?>
                                                                        <th><img alt="Boxing pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/c/c2/Boxing_pictogram.svg/17px-Boxing_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/c/c2/Boxing_pictogram.svg/26px-Boxing_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/c/c2/Boxing_pictogram.svg/34px-Boxing_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></th>
                                                                        <th><img alt="Athletics pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Athletics_pictogram.svg/17px-Athletics_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Athletics_pictogram.svg/26px-Athletics_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Athletics_pictogram.svg/34px-Athletics_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></th>
                                                                        <th><img alt="Archery pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Archery_pictogram.svg/17px-Archery_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Archery_pictogram.svg/26px-Archery_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Archery_pictogram.svg/34px-Archery_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></th>
                                                                        <th><img alt="Baseball pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Baseball_pictogram.svg/17px-Baseball_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Baseball_pictogram.svg/26px-Baseball_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Baseball_pictogram.svg/34px-Baseball_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></th>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <?php
                                                                    if($data['ticketType'] == "master")
                                                                    {
                                                                        ?>
                                                                        <td class="text-center" >Boxing</td>
                                                                        <td class="text-center" >Athletics</td>
                                                                        <td class="text-center" >Archery</td>
                                                                        <td class="text-center" >Baseball</td>
                                                                        <td class="text-center" >Wrestling</td>
                                                                        <td class="text-center" >Equestrian</td>
                                                                        <td class="text-center" >Volleyball</td>
                                                                        <td class="text-center" >Gymnastics</td>
                                                                        <td class="text-center" >BMX freestyle</td>
                                                                        <td class="text-center" >Canoeing</td>
                                                                        <td class="text-center" >3x3 basketball</td>
                                                                        <td class="text-center" >Swimming</td>
                                                                        <td class="text-center" >Equestrian Jumping</td>
                                                                        <td class="text-center" >Wrestling Freestyle</td>
                                                                        <?php
                                                                    }
                                                                    else if($data['ticketType'] == "medium")
                                                                    {
                                                                        ?>
                                                                        <td class="text-center" >Boxing</td>
                                                                        <td class="text-center" >Athletics</td>
                                                                        <td class="text-center" >Archery</td>
                                                                        <td class="text-center" >Baseball</td>
                                                                        <td class="text-center" >Wrestling</td>
                                                                        <td class="text-center" >Equestrian</td>
                                                                        <td class="text-center" >Volleyball</td>
                                                                        <?php
                                                                    }
                                                                    else if($data['ticketType'] == "normal")
                                                                    {
                                                                        ?>
                                                                        <td class="text-center" >Boxing</td>
                                                                        <td class="text-center" >Athletics</td>
                                                                        <td class="text-center" >Archery</td>
                                                                        <td class="text-center" >Baseball</td>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            else
                            {
                                ?>
                                    <img src="uploads/200px-Olympic_rings_without_rims.svg.webp" style="height:300;width:300px;margin-left:250px; margin-top:10px;">
                                    <img src="uploads/200px-Olympic_rings_without_rims.svg.webp" style="height:300;width:300px;margin-left:250px; margin-top:180px;">
                                    <img src="uploads/200px-Olympic_rings_without_rims.svg.webp" style="height:300;width:300px;margin-left:250px; margin-top:180px;">
                                    <img src="uploads/200px-Olympic_rings_without_rims.svg.webp" style="height:300;width:300px;margin-left:250px; margin-top:180px;">
                                <?php
                            }
                        }
                        catch(PDOException $e)
                        {
                            echo "failed to establish a connection with the database. server might be off";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
     </script>
     <script src="assetsxx/js/jquery.min.js"></script>
    <script src="assetsxx/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>