<?php

session_start();

include 'Connection.php';
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

if(isset($_POST['buyTicket']))
{
    $ticketNumber = testInput($_POST['ticketNumber']);
    $payment = testInput($_POST['payment']);

    if(empty($ticketNumber))
    {
        header("Location: /local.blade.php?error=the ticket number field is empty");
    }
    else if(empty($payment))
    {
        header("Location: /local.blade.php?error=the payment field is empty");
    }
    else
    {
        //checking if the ticket of that number is bought already
        try
        {
            $stmt = $conn->prepare("SELECT * FROM boughttickets WHERE ticketNumber=?");
            $stmt->bindValue(1,$ticketNumber);
            $stmt->execute();

            if($stmt->rowCount())
            {
                header("Location: /organizer.blade.php?error=that ticket is bought already");
            }
            else
            {
                //checking iof the ticket exists in the table
                $stmt = $conn->prepare("SELECT id,ticketType FROM tickets WHERE ticketNumber=?");
                $stmt->bindValue(1,$ticketNumber);
                $stmt->execute();

                if($stmt->rowCount())
                {
                    while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        $ticketType = $data['ticketType'];
                        $ticketId = $data['id'];

                        //checking if the email has already bought the ticket
                        $stmt = $conn->prepare("SELECT * FROM boughttickets WHERE useremail=?");
                        $stmt->bindValue(1,$_SESSION['auth']);
                        $stmt->execute();

                        if($stmt->rowCount())
                        {
                            while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                            {
                                header("Location: /local.blade.php?error=You already have a ".$data['ticketNumber']."ticket number");
                            }
                            
                        }
                        else
                        {
                            //deleting the ticket from the table
                            $stmt = $conn->prepare("DELETE FROM tickets WHERE ticketNumber=?");
                            $stmt->bindParam(1,$ticketNumber);
                            $rt = $stmt->execute();

                            if($rt>0)
                            {
                                $stmt = $conn->prepare("INSERT INTO boughttickets (ticketId,ticketNumber,ticketType,paymentType,useremail,username)
                                                    VALUES(:ticketId,:ticketNumber,:ticketType,:paymentType,:useremail,:username)");
                                $stmt->bindParam(":ticketId",$ticketId);
                                $stmt->bindParam(":ticketNumber",$ticketNumber);
                                $stmt->bindParam(":ticketType",$ticketType);
                                $stmt->bindParam(":paymentType",$payment);
                                $stmt->bindParam(":useremail",$_SESSION['auth']);
                                $stmt->bindParam(":username",$_SESSION['authUsername']);
                                $rt = $stmt->execute();

                                if($rt> 0)
                                {
                                    header("Location: /local.blade.php?success");
                                }
                            }
                        }
                    }
                }
                else
                {
                    header("Location: /local.blade.php?error=the ticket number if invalid please enter the correct one");
                }
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