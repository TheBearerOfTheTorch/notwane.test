<?php

session_start();
if(!isset($_SESSION['auth']))
{
    header("Location: /index.php?error=unauthorised page access. please login");
    exit;
}

function testInput($data)
{
    $data = stripslashes($data);
    $data = trim($data);
    $data = htmlspecialchars($data);

    return $data;
}

if(isset($_POST['submit']))
{
    //validating the inputs details'
    $ticketType = testInput($_POST['ticket_type']);
    $ticketNumber = testInput($_POST['ticket_number']);

    if(empty($ticketType))
    {
        header("Location: /organizer.blade.php?error=the ticket type field is empty");
    }
    else if(empty($ticketNumber))
    {
        header("Location: /organizer.blade.php?error=the ticket number field is empty");
    }
    else
    {
        //checking if the ticket nuimber already exists
        //database connection
        $servername = '127.0.0.1';
        $dbname = 'notwane';
        $username = 'root';
        $pass = "";
        try
        {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT ticketNumber FROM tickets WHERE ticketNumber=?");
            $stmt->bindValue(1,$ticketNumber);
            $stmt->execute();

            if($stmt->rowCount())
            {
                header("Location: /organizer.blade.php?error=the ticket number already exist in the ticket table");
            }
            else
            {
                $stmt = $conn->prepare("SELECT ticketNumber FROM usertickets WHERE ticketNumber=?");
                $stmt->bindValue(1,$ticketNumber);

                if($stmt->rowCount())
                {
                    header("Location: /organizer.blade.php?error=the ticket number exist in the bought ticket table");
                }
                else
                {
                   $stmt = $conn->prepare("INSERT INTO tickets (ticketType,ticketNumber,userEmail) VALUES(:ticketType,:ticketNumber,:userEmail)");
                   $stmt->bindParam(":ticketType",$ticketType);
                   $stmt->bindParam(":ticketNumber",$ticketNumber);
                   $stmt->bindParam(":userEmail",$_SESSION['auth']);

                   $rt = $stmt->execute();
                   if($rt > 0)
                   {
                       header("Location: /organizer.blade.php?success=ticket has been added successfully");
                   }
                   else
                   {
                       header("Location: /organizer.blade.php?error=the ticket failed to be added successfully");
                   }
                }
                $stmt->close();
            }
        } 
        catch(PDOException $e)
        {
        echo "failed to establish a connection with the database. server might be off";
        }
    }
}
else if(isset($_POST['delete']))
{
    //getting the details from the front end
    $ticketNumber = testInput($_POST['ticket_number']);

    if(empty($ticketNumber))
    {
        header("Location: /organizer.blade.php?error=the ticket number field is empty");
    }
    else
    {
        //deleting the ticket if the fields are not empty
        try
        {
            $servername = '127.0.0.1';
            $dbname = 'notwane';
            $username = 'root';
            $pass = "";

            $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT * FROM tickets WHERE ticketNumber=?");
            $stmt->bindValue(1,$ticketNumber);
            $stmt->execute();

            if($stmt->rowCount())
            {
                $stmt= $conn->prepare("DELETE FROM tickets WHERE ticketNumber=?");
                $stmt->bindValue(1,$ticketNumber);
                $rt = $stmt->execute();

                if($rt > 0)
                {
                    header("Location: /organizer.blade.php?success=the ticket id deleted successfully");
                }
            }
            else
            {
                header("Location: /organizer.blade.php?error=the ticket number does not exist in our records");
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}
else
{
    if(!isset($_SESSION['auth']))
    {
        header("Location: /index.php?error=invalid page access");
        exit;
    }
}