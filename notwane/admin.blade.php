
<?php
include "app/Users.php";

if(!isset($_SESSION['auth']))
{
    header("Location: /index.php?error=unauthorised page access. please login");
    exit;
}
else
{
    if($_SESSION['authType'] != "admin")
    {
        header("Location: /index.php?error=unauthorised page request");
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin</title>
    <link rel="stylesheet" href="assetsx/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assetsx/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assetsx/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assetsx/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assetsx/css/countdown-timer-1.css">
    <link rel="stylesheet" href="assetsx/css/countdown-timer.css">
    <link rel="stylesheet" href="assetsx/css/Custom-File-Upload.css">
    <link rel="stylesheet" href="assetsx/css/Drag--Drop-Upload-Form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assetsx/css/styles.css">
</head>

<body>
    <header>
    <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container">
                
                <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    
                        <a class="nav-link" href="#"><img src="uploads/200px-Olympic_rings_without_rims.svg.webp" style="height:50;width:50px;"><strong> Admin Panel</strong> <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <!-- this for the drop down -->
                    <button
                        data-toggle="collapse" class="navbar-toggler collapsed" data-target="#navcol-1">
                        <span>MENU</span>
                    </button>
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
            </div>
        </nav>
    </header>
    <div class="container" style="margin-top: 80px;width: 100%;">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-3">
                <a id="review_all_work_link" href="#" style="color: rgba(30, 218, 162, 0.932);">
                    <div class="text-center shadow bg-dark" id="director_jobs" style="width: 100%;height: 100%;padding: 10px;"><i class="far fa-check-square" style="font-size: 82px;"></i>
                        <p style="margin-top: 10px;"><strong>View Report</strong></p>
                    </div>
                </a>
            </div>
            
            <div class="col-md-3">
                <a id="director_all_jobs_link" href="#" style="color: rgba(30, 218, 162, 0.932);">
                    <div class="text-center shadow bg-dark" id="director_jobs" style="width: 100%;height: 100%;padding: 10px;"><i class="far fa-list-alt" style="font-size: 82px;"></i>
                        <p style="margin-top: 10px;"><strong>View Registered users</strong></p>
                    </div>
                </a>
            </div>
            
        </div>
    </div>

    <div class="container" id="All_project_container">
        <div style="margin-top: 10px;">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>USERNAME</th>
                            <th>EMAIL</th>
                            <th>TYPE OF USER</th>
                            <th>UPDATED AT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <!-- this for the id -->
                            <td class="text-center" id="project_name">
                                <?php
                                    if($stmt->rowCount())
                                    {
                                        while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                                        {
                                            $userId = $data['id'];
                                            echo $userId."<br>";
                                        }
                                    }
                                ?>
                            </td>
                            <!-- this is for the username -->
                            <td class="text-center" id="project_id">
                                <?php
                                    try
                                    {
                                        //we have to display all the registered users
                                        $stmt = $conn->prepare("SELECT username FROM users");
                                        $stmt->execute();
                                        if($stmt->rowCount())
                                        {
                                            while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                                            {
                                                
                                                echo $data['username']."<br>";
                                            }
                                        }
                                    }
                                    catch(PDOException $e)
                                    {
                                    echo "failed to establish a connection with the database. server might be off";
                                    }
                                ?>
                            </td>
                            <!-- this is for the email -->
                            <td class="text-center" id="project_members">
                                <?php
                                    try
                                    {
                                        //we have to display all the registered users
                                        $stmt = $conn->prepare("SELECT email FROM users");
                                        $stmt->execute();
                                        if($stmt->rowCount())
                                        {
                                            while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                                            {
                                                
                                                echo $data['email']."<br>";
                                            }
                                        }
                                    }
                                    catch(PDOException $e)
                                    {
                                    echo "failed to establish a connection with the database. server might be off";
                                    }
                                ?>
                            </td>
                            <!-- this for the type -->
                            <td class="text-center" id="project_members">
                                <?php
                                    try
                                    {
                                        //we have to display all the registered users
                                        $stmt = $conn->prepare("SELECT type FROM users");
                                        $stmt->execute();
                                        if($stmt->rowCount())
                                        {
                                            while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                                            {
                                                
                                                echo $data['type']."<br>";
                                            }
                                        }
                                    }
                                    catch(PDOException $e)
                                    {
                                    echo "failed to establish a connection with the database. server might be off";
                                    }
                                ?>
                            </td>
                            <td class="text-center" id="project_progress" style="padding-top: 18px;">
                                <?php
                                    try
                                    {
                                        //we have to display all the registered users
                                        $stmt = $conn->prepare("SELECT updated_at FROM users");
                                        $stmt->execute();
                                        if($stmt->rowCount())
                                        {
                                            while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                                            {
                                                
                                                echo $data['updated_at']."<br>";
                                            }
                                        }
                                    }
                                    catch(PDOException $e)
                                    {
                                    echo "failed to establish a connection with the database. server might be off";
                                    }
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- the second slide show -->
    <div class="container" style="padding-top:30px" id="review_project_container">
    <!-- it start here -->
        <table class="wikitable collapsible" style="width:100%;margin:0.5em auto;font-size:90%;line-height:1.25;text-align:center">
            <thead>
                <tr>
                    <th colspan="2">Sport (Discipline)
                    </th>
                    <th>
                        <a href="/wiki/Sport_governing_body" class="mw-redirect" title="Sport governing body">Classes</a>
                    </th>
                    <th style="width:2em">
                        <a href="/wiki/1896_Summer_Olympics" title="1896 Summer Olympics">Mon</a>
                    </th>
                    <th style="width:2em">
                        <a href="/wiki/1900_Summer_Olympics" title="1900 Summer Olympics">Tue</a>
                    </th>
                    <th style="width:2em">
                        <a href="/wiki/1904_Summer_Olympics" title="1904 Summer Olympics">Wed</a>
                    </th>
                    <th style="width:2em">
                        <a href="/wiki/1906_Intercalated_Games" title="1906 Intercalated Games">thu</a>
                    </th>
                    <th style="width:2em">
                        <a href="/wiki/1932_Summer_Olympics" title="1932 Summer Olympics">fri</a>
                    </th>
                    <th style="width:2em">
                        <a href="/wiki/1932_Summer_Olympics" title="1932 Summer Olympics">sat</a>
                    </th>
                    <th style="width:2em">
                        <a href="/wiki/1932_Summer_Olympics" title="1932 Summer Olympics">sun</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr style="background:#ddd;">
                    <td colspan="33" style="font-size:0.2em; line-height:1px;;">&#160;
                    </td>
                </tr>
                <tr>
                    <td colspan="33"><b>Current summer sports</b>
                    </td>
                </tr>
                <tr style="background:#ddd;">
                    <td colspan="33" style="font-size:0.2em; line-height:1px;;">&#160;
                    </td>
                </tr>
                <tr style="background:#f0f8ff;">
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Diving_at_the_Summer_Olympics" title="Diving at the Summer Olympics">Diving</a></td>
                    <td><a href="/wiki/File:Diving_pictogram.svg" class="image"><img alt="Diving pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/9/94/Diving_pictogram.svg/17px-Diving_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/9/94/Diving_pictogram.svg/26px-Diving_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/9/94/Diving_pictogram.svg/34px-Diving_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></a>
                    </td>
                    <td rowspan="5"><a href="/wiki/FINA" title="FINA">FINA</a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><i></i></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="background:#f0f8ff;">
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Marathon_swimming_at_the_Summer_Olympics" class="mw-redirect" title="Marathon swimming at the Summer Olympics">Marathon swimming</a></td>
                    <td><a href="/wiki/File:Open_water_swimming_pictogram.svg" class="image"><img alt="Open water swimming pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/f/fc/Open_water_swimming_pictogram.svg/17px-Open_water_swimming_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/f/fc/Open_water_swimming_pictogram.svg/26px-Open_water_swimming_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/f/fc/Open_water_swimming_pictogram.svg/34px-Open_water_swimming_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="background:#f0f8ff;">
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Swimming_at_the_Summer_Olympics" title="Swimming at the Summer Olympics">Swimming</a></td>
                    <td><a href="/wiki/File:Swimming_pictogram.svg" class="image"><img alt="Swimming pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Swimming_pictogram.svg/17px-Swimming_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Swimming_pictogram.svg/26px-Swimming_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Swimming_pictogram.svg/34px-Swimming_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="background:#f0f8ff;">
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Synchronized_swimming_at_the_Summer_Olympics" class="mw-redirect" title="Synchronized swimming at the Summer Olympics">Synchronized swimming</a></td>
                    <td><a href="/wiki/File:Synchronized_swimming_pictogram.svg" class="image"><img alt="Synchronized swimming pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Synchronized_swimming_pictogram.svg/17px-Synchronized_swimming_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Synchronized_swimming_pictogram.svg/26px-Synchronized_swimming_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Synchronized_swimming_pictogram.svg/34px-Synchronized_swimming_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="background:#f0f8ff;">
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Water_polo_at_the_Summer_Olympics" title="Water polo at the Summer Olympics">Water polo</a></td>
                    <td><a href="/wiki/File:Water_polo_pictogram.svg" class="image"><img alt="Water polo pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/0/0e/Water_polo_pictogram.svg/17px-Water_polo_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/0/0e/Water_polo_pictogram.svg/26px-Water_polo_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/0/0e/Water_polo_pictogram.svg/34px-Water_polo_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><big><b>•</b></big></td>
                </tr>
                <tr style="background:#ddd;">
                    <td colspan="33" style="font-size:0.2em; line-height:1px;">&#160;
                    </td>
                </tr>
                <tr style="background:#eecccc">
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Basketball_at_the_Summer_Olympics" title="Basketball at the Summer Olympics">3-on-3 basketball</a></td>
                    <td><a href="/wiki/File:3x3_basketball_pictogram.svg" class="image"><img alt="3x3 basketball pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/4/43/3x3_basketball_pictogram.svg/17px-3x3_basketball_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/4/43/3x3_basketball_pictogram.svg/26px-3x3_basketball_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/4/43/3x3_basketball_pictogram.svg/34px-3x3_basketball_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></a>
                    </td>
                    <td rowspan="2"><a href="/wiki/FIBA" title="FIBA">FIBA</a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><big><b>•</b></big></td>
                </tr>
                <tr style="background:#eecccc">
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Basketball_at_the_Summer_Olympics" title="Basketball at the Summer Olympics">Basketball</a></td>
                    <td><a href="/wiki/File:Basketball_pictogram.svg" class="image"><img alt="Basketball pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Basketball_pictogram.svg/17px-Basketball_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Basketball_pictogram.svg/26px-Basketball_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Basketball_pictogram.svg/34px-Basketball_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></a>
                    </td>
                    <td></td>
                    <td></td>
                    <td><big><b>•</b></big></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="background:#ddd;">
                    <td colspan="33" style="font-size:0.2em; line-height:1px;;">&#160;
                    </td>
                </tr>
                <tr style="background:honeyDew;">
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Canoeing_and_kayaking_at_the_Summer_Olympics" class="mw-redirect" title="Canoeing and kayaking at the Summer Olympics">Canoe/kayak (sprint)</a></td>
                    <td><a href="/wiki/File:Canoeing_(flatwater)_pictogram.svg" class="image"><img alt="Canoeing (flatwater) pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Canoeing_%28flatwater%29_pictogram.svg/17px-Canoeing_%28flatwater%29_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Canoeing_%28flatwater%29_pictogram.svg/26px-Canoeing_%28flatwater%29_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Canoeing_%28flatwater%29_pictogram.svg/34px-Canoeing_%28flatwater%29_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></a>
                    </td>
                    <td rowspan="2"><a href="/wiki/International_Canoe_Federation" title="International Canoe Federation">ICF</a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="background:honeyDew;">
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Canoeing_and_kayaking_at_the_Summer_Olympics" class="mw-redirect" title="Canoeing and kayaking at the Summer Olympics">Canoe/kayak (slalom)</a></td>
                    <td>
                        <a href="#" class="image">
                            <img alt="Canoeing (slalom) pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/a/af/Canoeing_%28slalom%29_pictogram.svg/17px-Canoeing_%28slalom%29_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/a/af/Canoeing_%28slalom%29_pictogram.svg/26px-Canoeing_%28slalom%29_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/a/af/Canoeing_%28slalom%29_pictogram.svg/34px-Canoeing_%28slalom%29_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" />
                        </a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="background:#ddd;">
                    <td colspan="33" style="font-size:0.2em; line-height:1px;;">&#160;
                    </td>
                </tr>
                <tr style="background:beige;">
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Cycling_at_the_Summer_Olympics" title="Cycling at the Summer Olympics">BMX freestyle</a></td>
                    <td><a href="/wiki/File:BMX_freestyle_pictogram.svg" class="image"><img alt="BMX freestyle pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/c/c7/BMX_freestyle_pictogram.svg/17px-BMX_freestyle_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/c/c7/BMX_freestyle_pictogram.svg/26px-BMX_freestyle_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/c/c7/BMX_freestyle_pictogram.svg/34px-BMX_freestyle_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></a>
                    </td>
                    <td rowspan="5"><a href="/wiki/Union_Cycliste_Internationale" title="Union Cycliste Internationale">UCI</a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="background:beige;">
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Cycling_at_the_Summer_Olympics" title="Cycling at the Summer Olympics">BMX racing</a></td>
                    <td><a href="/wiki/File:Cycling_(BMX)_pictogram.svg" class="image"><img alt="Cycling (BMX) pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/d/db/Cycling_%28BMX%29_pictogram.svg/17px-Cycling_%28BMX%29_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/d/db/Cycling_%28BMX%29_pictogram.svg/26px-Cycling_%28BMX%29_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/d/db/Cycling_%28BMX%29_pictogram.svg/34px-Cycling_%28BMX%29_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="background:beige;">
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Cycling_at_the_Summer_Olympics" title="Cycling at the Summer Olympics">Mountain biking</a></td>
                    <td><a href="/wiki/File:Cycling_(mountain_biking)_pictogram.svg" class="image"><img alt="Cycling (mountain biking) pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/7/78/Cycling_%28mountain_biking%29_pictogram.svg/17px-Cycling_%28mountain_biking%29_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/7/78/Cycling_%28mountain_biking%29_pictogram.svg/26px-Cycling_%28mountain_biking%29_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/7/78/Cycling_%28mountain_biking%29_pictogram.svg/34px-Cycling_%28mountain_biking%29_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="background:beige;">
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Cycling_at_the_Summer_Olympics" title="Cycling at the Summer Olympics">Road cycling</a></td>
                    <td><a href="/wiki/File:Cycling_(road)_pictogram.svg" class="image"><img alt="Cycling (road) pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/8/86/Cycling_%28road%29_pictogram.svg/17px-Cycling_%28road%29_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/8/86/Cycling_%28road%29_pictogram.svg/26px-Cycling_%28road%29_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/8/86/Cycling_%28road%29_pictogram.svg/34px-Cycling_%28road%29_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="background:beige;">
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Cycling_at_the_Summer_Olympics" title="Cycling at the Summer Olympics">Track cycling</a></td>
                    <td><a href="/wiki/File:Cycling_(track)_pictogram.svg" class="image"><img alt="Cycling (track) pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Cycling_%28track%29_pictogram.svg/17px-Cycling_%28track%29_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Cycling_%28track%29_pictogram.svg/26px-Cycling_%28track%29_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Cycling_%28track%29_pictogram.svg/34px-Cycling_%28track%29_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="background:#ddd;">
                    <td colspan="33" style="font-size:0.2em; line-height:1px;;">&#160;
                    </td>
                </tr>
                <tr style="background:#fff0f5;">
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Gymnastics_at_the_Summer_Olympics" title="Gymnastics at the Summer Olympics">Artistic</a></td>
                    <td><a href="/wiki/File:Gymnastics_(artistic)_pictogram.svg" class="image"><img alt="Gymnastics (artistic) pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/1/12/Gymnastics_%28artistic%29_pictogram.svg/17px-Gymnastics_%28artistic%29_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/1/12/Gymnastics_%28artistic%29_pictogram.svg/26px-Gymnastics_%28artistic%29_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/1/12/Gymnastics_%28artistic%29_pictogram.svg/34px-Gymnastics_%28artistic%29_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></a>
                    </td>
                    <td rowspan="3"><a href="/wiki/International_Federation_of_Gymnastics" class="mw-redirect" title="International Federation of Gymnastics">FIG</a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="background:#fff0f5;">
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Gymnastics_at_the_Summer_Olympics" title="Gymnastics at the Summer Olympics">Rhythmic</a></td>
                    <td><a href="/wiki/File:Gymnastics_(rhythmic)_pictogram.svg" class="image"><img alt="Gymnastics (rhythmic) pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Gymnastics_%28rhythmic%29_pictogram.svg/17px-Gymnastics_%28rhythmic%29_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Gymnastics_%28rhythmic%29_pictogram.svg/26px-Gymnastics_%28rhythmic%29_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Gymnastics_%28rhythmic%29_pictogram.svg/34px-Gymnastics_%28rhythmic%29_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="background:#fff0f5;">
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Gymnastics_at_the_Summer_Olympics" title="Gymnastics at the Summer Olympics">Trampoline</a></td>
                    <td><a href="/wiki/File:Gymnastics_(trampoline)_pictogram.svg" class="image"><img alt="Gymnastics (trampoline) pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/5/59/Gymnastics_%28trampoline%29_pictogram.svg/17px-Gymnastics_%28trampoline%29_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/5/59/Gymnastics_%28trampoline%29_pictogram.svg/26px-Gymnastics_%28trampoline%29_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/5/59/Gymnastics_%28trampoline%29_pictogram.svg/34px-Gymnastics_%28trampoline%29_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="background:#ddd;">
                    <td colspan="33" style="font-size:0.2em; line-height:1px;;">&#160;
                    </td>
                </tr>
                <tr style="background:#ffffe0;">
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Beach_volleyball_at_the_Summer_Olympics" title="Beach volleyball at the Summer Olympics">Volleyball (beach)</a></td>
                    <td><a href="/wiki/File:Volleyball_(beach)_pictogram.svg" class="image"><img alt="Volleyball (beach) pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/7/76/Volleyball_%28beach%29_pictogram.svg/17px-Volleyball_%28beach%29_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/7/76/Volleyball_%28beach%29_pictogram.svg/26px-Volleyball_%28beach%29_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/7/76/Volleyball_%28beach%29_pictogram.svg/34px-Volleyball_%28beach%29_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></a>
                    </td>
                    <td rowspan="2"><a href="/wiki/F%C3%A9d%C3%A9ration_Internationale_de_Volleyball" title="Fédération Internationale de Volleyball">FIVB</a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="background:#ffffe0;">
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Volleyball_at_the_Summer_Olympics" title="Volleyball at the Summer Olympics">Volleyball (indoor)</a></td>
                    <td><a href="/wiki/File:Volleyball_(indoor)_pictogram.svg" class="image"><img alt="Volleyball (indoor) pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Volleyball_%28indoor%29_pictogram.svg/17px-Volleyball_%28indoor%29_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Volleyball_%28indoor%29_pictogram.svg/26px-Volleyball_%28indoor%29_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Volleyball_%28indoor%29_pictogram.svg/34px-Volleyball_%28indoor%29_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="background:#ddd;">
                    <td colspan="33" style="font-size:0.2em; line-height:1px;;">&#160;
                    </td>
                </tr>
                <tr style="background:PapayaWhip;">
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Equestrian_at_the_Summer_Olympics" title="Equestrian at the Summer Olympics">Equestrian / Dressage</a></td>
                    <td><a href="/wiki/File:Equestrian_Dressage_pictogram.svg" class="image"><img alt="Equestrian Dressage pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Equestrian_Dressage_pictogram.svg/17px-Equestrian_Dressage_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Equestrian_Dressage_pictogram.svg/26px-Equestrian_Dressage_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Equestrian_Dressage_pictogram.svg/34px-Equestrian_Dressage_pictogram.svg.png 2x" data-file-width="960" data-file-height="960" /></a>
                    </td>
                    <td rowspan="3"><a href="/wiki/International_Federation_for_Equestrian_Sports" title="International Federation for Equestrian Sports">FEI</a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="background:PapayaWhip;">
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Equestrian_at_the_Summer_Olympics" title="Equestrian at the Summer Olympics">Equestrian / Eventing</a></td>
                    <td><a href="/wiki/File:Equestrian_Eventing_pictogram.svg" class="image"><img alt="Equestrian Eventing pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Equestrian_Eventing_pictogram.svg/17px-Equestrian_Eventing_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Equestrian_Eventing_pictogram.svg/26px-Equestrian_Eventing_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Equestrian_Eventing_pictogram.svg/34px-Equestrian_Eventing_pictogram.svg.png 2x" data-file-width="960" data-file-height="960" /></a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="background:PapayaWhip;">
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Equestrian_at_the_Summer_Olympics" title="Equestrian at the Summer Olympics">Equestrian / Jumping</a></td>
                    <td><a href="/wiki/File:Equestrian_Jumping_pictogram.svg" class="image"><img alt="Equestrian Jumping pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/6/69/Equestrian_Jumping_pictogram.svg/17px-Equestrian_Jumping_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/6/69/Equestrian_Jumping_pictogram.svg/26px-Equestrian_Jumping_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/6/69/Equestrian_Jumping_pictogram.svg/34px-Equestrian_Jumping_pictogram.svg.png 2x" data-file-width="960" data-file-height="960" /></a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="background:#ddd;">
                    <td colspan="33" style="font-size:0.2em; line-height:1px;;">&#160;
                    </td>
                </tr>
                <tr style="background:Thistle;">
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Wrestling_at_the_Summer_Olympics" title="Wrestling at the Summer Olympics">Freestyle wrestling</a></td>
                    <td><a href="/wiki/File:Wrestling_Freestyle_pictogram.svg" class="image"><img alt="Wrestling Freestyle pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/3/35/Wrestling_Freestyle_pictogram.svg/17px-Wrestling_Freestyle_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/3/35/Wrestling_Freestyle_pictogram.svg/26px-Wrestling_Freestyle_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/3/35/Wrestling_Freestyle_pictogram.svg/34px-Wrestling_Freestyle_pictogram.svg.png 2x" data-file-width="960" data-file-height="960" /></a>
                    </td>
                    <td rowspan="2"><a href="/wiki/United_World_Wrestling" title="United World Wrestling">UWW</a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="background:Thistle;">
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Wrestling_at_the_Summer_Olympics" title="Wrestling at the Summer Olympics">Greco-Roman wrestling</a></td>
                    <td><a href="/wiki/File:Wrestling_pictogram.svg" class="image"><img alt="Wrestling pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/1/12/Wrestling_pictogram.svg/17px-Wrestling_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/1/12/Wrestling_pictogram.svg/26px-Wrestling_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/1/12/Wrestling_pictogram.svg/34px-Wrestling_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="background:#ddd;">
                    <td colspan="33" style="font-size:0.2em; line-height:1px;;">&#160;
                    </td>
                </tr>
                <tr style="background:#ffffe0;">
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Baseball_at_the_Summer_Olympics" title="Baseball at the Summer Olympics">Baseball</a></td>
                    <td><a href="/wiki/File:Baseball_pictogram.svg" class="image"><img alt="Baseball pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Baseball_pictogram.svg/17px-Baseball_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Baseball_pictogram.svg/26px-Baseball_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Baseball_pictogram.svg/34px-Baseball_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></a></td>
                    <td rowspan="2"><a href="/wiki/World_Baseball_Softball_Confederation" title="World Baseball Softball Confederation">WBSC</a><sup id="cite_ref-WBSC_23-0" class="reference"><a href="#cite_note-WBSC-23">&#91;s 1&#93;</a></sup>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="background:#ffffe0;">
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Softball_at_the_Summer_Olympics" title="Softball at the Summer Olympics">Softball</a></td>
                    <td><a href="/wiki/File:Softball_pictogram.svg" class="image"><img alt="Softball pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/9/95/Softball_pictogram.svg/17px-Softball_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/9/95/Softball_pictogram.svg/26px-Softball_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/9/95/Softball_pictogram.svg/34px-Softball_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="background:#ddd;">
                    <td colspan="33" style="font-size:0.2em; line-height:1px;;">&#160;
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Archery_at_the_Summer_Olympics" title="Archery at the Summer Olympics">Archery</a></td>
                    <td><a href="/wiki/File:Archery_pictogram.svg" class="image"><img alt="Archery pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Archery_pictogram.svg/17px-Archery_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Archery_pictogram.svg/26px-Archery_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Archery_pictogram.svg/34px-Archery_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></a>
                    </td>
                    <td><a href="/wiki/World_Archery_Federation" title="World Archery Federation">WA</a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Athletics_at_the_Summer_Olympics" title="Athletics at the Summer Olympics">Athletics</a></td>
                    <td><a href="/wiki/File:Athletics_pictogram.svg" class="image"><img alt="Athletics pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Athletics_pictogram.svg/17px-Athletics_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Athletics_pictogram.svg/26px-Athletics_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Athletics_pictogram.svg/34px-Athletics_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></a>
                    </td>
                    <td><a href="/wiki/World_Athletics" title="World Athletics">WA</a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Boxing_at_the_Summer_Olympics" title="Boxing at the Summer Olympics">Boxing</a></td>
                    <td><a href="/wiki/File:Boxing_pictogram.svg" class="image"><img alt="Boxing pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/c/c2/Boxing_pictogram.svg/17px-Boxing_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/c/c2/Boxing_pictogram.svg/26px-Boxing_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/c/c2/Boxing_pictogram.svg/34px-Boxing_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></a>
                    </td>
                    <td><a href="/wiki/International_Boxing_Association_(amateur)" title="International Boxing Association (amateur)">AIBA</a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Field_hockey_at_the_Olympic_Games" class="mw-redirect" title="Field hockey at the Olympic Games">Field hockey</a></td>
                    <td><a href="/wiki/File:Field_hockey_pictogram.svg" class="image"><img alt="Field hockey pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Field_hockey_pictogram.svg/17px-Field_hockey_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Field_hockey_pictogram.svg/26px-Field_hockey_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Field_hockey_pictogram.svg/34px-Field_hockey_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></a>
                    </td>
                    <td><a href="/wiki/International_Hockey_Federation" title="International Hockey Federation">FIH</a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align:left;white-space:nowrap"><a href="/wiki/Golf_at_the_Summer_Olympics" title="Golf at the Summer Olympics">Golf</a></td>
                    <td><a href="/wiki/File:Golf_pictogram.svg" class="image"><img alt="Golf pictogram.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Golf_pictogram.svg/17px-Golf_pictogram.svg.png" decoding="async" width="17" height="17" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Golf_pictogram.svg/26px-Golf_pictogram.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Golf_pictogram.svg/34px-Golf_pictogram.svg.png 2x" data-file-width="300" data-file-height="300" /></a></td>
                    <td><a href="/wiki/International_Golf_Federation" title="International Golf Federation">IGF</a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="modal fade" role="dialog" tabindex="-1" id="director_leader_assign" style="margin-top: 70px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ticketID</th>
                                    <th>ticket_type</th>
                                    <th>ticket_number</th>
                                    <th>created By</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center" id="project_name">
                                        <?php
                                            $stmt = $conn->prepare("SELECT * FROM tickets");
                                            $stmt->execute();

                                            if($stmt->rowCount())
                                            {
                                                while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    echo $data['id']."<br>";
                                                }
                                            }
                                        ?>
                                    </td>
                                    <td class="text-center" id="project_id">
                                        <?php
                                            $stmt = $conn->prepare("SELECT * FROM tickets");
                                            $stmt->execute();

                                            if($stmt->rowCount())
                                            {
                                                while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    echo $data['ticketType']."<br>";
                                                }
                                            }  
                                        ?>
                                    </td>
                                    <td class="text-center" id="project_members">
                                        <?php
                                            $stmt = $conn->prepare("SELECT * FROM tickets");
                                            $stmt->execute();

                                            if($stmt->rowCount())
                                            {
                                                while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    echo $data['ticketNumber']."<br>";
                                                }
                                            }   
                                        ?>
                                    </td>
                                    <td class="text-center" id="project_progress">
                                        <?php
                                            $stmt = $conn->prepare("SELECT * FROM tickets");
                                            $stmt->execute();

                                            if($stmt->rowCount())
                                            {
                                                while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    echo $data['userEmail']."<br>";
                                                }
                                            }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="director_leader_reassign" style="margin-top: 70px;margin-left:400px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" style="width: 100%;">View Bought Tickets</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ticketID</th>
                                    <th>ticket_type</th>
                                    <th>ticket_number</th>
                                    <th>username</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center" id="project_name">
                                        <?php
                                            $stmt = $conn->prepare("SELECT * FROM boughttickets");
                                            $stmt->execute();

                                            if($stmt->rowCount())
                                            {
                                                while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    echo $data['ticketId']."<br>";
                                                }
                                            }
                                        ?>
                                    </td>
                                    <td class="text-center" id="project_id">
                                        <?php
                                            $stmt = $conn->prepare("SELECT * FROM boughttickets");
                                            $stmt->execute();

                                            if($stmt->rowCount())
                                            {
                                                while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    echo $data['ticketType']."<br>";
                                                }
                                            }   
                                        ?>
                                    </td>
                                    <td class="text-center" id="project_members">
                                        <?php
                                            $stmt = $conn->prepare("SELECT * FROM boughttickets");
                                            $stmt->execute();

                                            if($stmt->rowCount())
                                            {
                                                while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    echo $data['ticketNumber']."<br>";
                                                }
                                            }   
                                        ?>
                                    </td>
                                    <td class="text-center" id="project_members">
                                        <?php
                                            $stmt = $conn->prepare("SELECT * FROM boughttickets");
                                            $stmt->execute();

                                            if($stmt->rowCount())
                                            {
                                                while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    echo $data['username']."<br>";
                                                }
                                            }   
                                        ?>
                                    </td>
                                    <td class="text-center" id="project_progress">
                                        <?php
                                            $stmt = $conn->prepare("SELECT * FROM boughttickets");
                                            $stmt->execute();

                                            if($stmt->rowCount())
                                            {
                                                while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    echo $data['updated_at']."<br>";
                                                }
                                            }  
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- this the first in the second -->
    <div class="modal fade" role="dialog" tabindex="-1" id="add_employee" style="margin-top: 70px;width:40%;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" style="width: 100%;">View User Permission to events</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ticket type</th>
                                    <th>user email</th>
                                    <th>username</th>
                                    <th>permission</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center" id="project_name">
                                        <?php
                                            $stmt = $conn->prepare("SELECT * FROM boughttickets");
                                            $stmt->execute();

                                            if($stmt->rowCount())
                                            {
                                                while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    echo $data['id']."<br>";
                                                }
                                            }
                                        ?>
                                    </td>
                                    <td class="text-center" id="project_id">
                                        <?php
                                            $stmt = $conn->prepare("SELECT * FROM boughttickets");
                                            $stmt->execute();

                                            if($stmt->rowCount())
                                            {
                                                while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    echo $data['ticketType']."<br>";
                                                }
                                            }   
                                        ?>
                                    </td>
                                    <td class="text-center" id="project_members">
                                        <?php
                                            $stmt = $conn->prepare("SELECT * FROM boughttickets");
                                            $stmt->execute();

                                            if($stmt->rowCount())
                                            {
                                                while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    echo $data['username']."<br>";
                                                }
                                            }   
                                        ?>
                                    </td>
                                    <td class="text-center" id="project_members">
                                        <?php
                                            $stmt = $conn->prepare("SELECT * FROM boughttickets");
                                            $stmt->execute();

                                            if($stmt->rowCount())
                                            {
                                                while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    echo $data['useremail']."<br>";
                                                }
                                            }   
                                        ?>
                                    </td>
                                    <td class="text-center" id="project_progress">
                                        <?php
                                            $stmt = $conn->prepare("SELECT * FROM boughttickets");
                                            $stmt->execute();

                                            if($stmt->rowCount())
                                            {
                                                while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    if($data['ticketType'] == "master")
                                                    {
                                                        echo "Full Event Access"."<br>";
                                                    }
                                                    else if($data['ticketType'] == "medium")
                                                    {
                                                        echo "Half Event Access"."<br>";
                                                    }
                                                    else 
                                                    {
                                                        echo "Low Event Access"."<br>";
                                                    }
                                                    
                                                }
                                            }  
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- just testing -->
    <div class="container" style="margin-top: 50px;margin-bottom: 50px;width: 100%;">
        <div class="row">
            <div class="col-md-4">
                <a id="director_rejobs_link" href="#" style="color: rgba(30, 218, 162, 0.932)" data-target="#add_employee" data-toggle="modal">
                    <div class="text-center shadow bg-dark" id="director_jobs" style="width: 100%;height: 100%;padding: 10px;"><i class="fa fa-wechat" style="font-size: 82px;"></i>
                        <p style="margin-top: 10px;"><strong>Access Permission</strong></p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a id="director_jobs_link" href="#" style="color: rgba(30, 218, 162, 0.932);" data-target="#director_leader_assign" data-toggle="modal">
                    <div class="text-center shadow bg-dark" id="director_jobs" style="width: 100%;height: 100%;padding: 10px;"><i class="far fa-user" style="font-size: 82px;"></i>
                        <p style="margin-top: 10px;"><strong>Available Tickets</strong></p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a id="director_rejobs_link" href="#" style="color: rgba(30, 218, 162, 0.932);" data-target="#director_leader_reassign" data-toggle="modal">
                    <div class="text-center shadow bg-dark" id="director_jobs" style="width: 100%;height: 100%;padding: 10px;"><i class="fa fa-users" style="font-size: 82px;"></i>
                        <p style="margin-top: 10px;"><strong>Bought Tickets</strong></p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <script src="assetsx/js/jquery.min.js"></script>
    <script src="assetsx/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="assetsx/js/Animatecss--Wowjs.js"></script>
    <script src="assetsx/js/countdown-timer.js"></script>
    <script src="assetsx/js/Custom-File-Upload.js"></script>
    <script src="assetsx/js/show_project_div.js"></script>
</body>

</html>
