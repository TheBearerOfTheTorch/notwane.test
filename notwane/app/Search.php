<?php

session_start();
include 'Connection.php';
function testInput($data)
{
    $data = stripslashes($data);
    $data = trim($data);
    $data = htmlspecialchars($data);

    return $data;
}
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
    else
    {
        if(isset($_GET['searchB']))
        {
            $search = testInput($_GET['search']);

            if(empty($search))
            {
                header("Location: /local.blade.php?error=the search field is empty");
            }
            else
            {
                //searching for tickets
                $stmt = $conn->prepare("SELECT * FROM tickets WHERE ticketType=?");
                $stmt->bindValue(1,$search);
                $stmt->execute();

                if($stmt->rowCount())
                {
                    while($data = $stmt->fetch(PDO::FETCH_ASSOC))
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
                        <?php
                    }
                }
            }
        }
    }
}
?>