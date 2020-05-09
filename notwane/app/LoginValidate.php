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

if(isset($_POST['submit']))
{
    //geting the fields
    $email = testInput($_POST['email']);
    $password = testInput($_POST['password']);

    //checking for empty fields
    if(empty($email))
    {
        header("Location: /index.php?error=email field is empty");
        exit;
    }
    else if(empty($password))
    {
        header("Location: /index.php?error=the password field is empty");
        exit;
    }
    else
    {
        //sending the details to the db
        try
        {
            $stmt = $conn->prepare("SELECT id,username,email,type,password FROM users WHERE email=?");
            $stmt->bindValue(1,$email);
            $stmt->execute();

            if($stmt->rowCount())
            {
                while($data = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    $dbPass = $data['password'];
                    $id = $data['id'];
                    $username = $data['username'];
                    $type = $data['type'];

                    //hushing the password from the user
                    $hushedPass = md5($password);

                    if($hushedPass == $dbPass)
                    {
                        //setting the session
                        $_SESSION['auth'] = $email;
                        $_SESSION['authId'] = $id;
                        $_SESSION['authUsername'] = $username;
                        $_SESSION['authType'] = $type;

                        //redirection to the other page after authentication
                        if($_SESSION['authType'] == "admin")
                        {
                            header("Location: /admin.blade.php");
                        }
                        else if($_SESSION['authType'] == "local")
                        {
                            header("Location: /local.blade.php");
                        }
                        else if($_SESSION['authType'] == "organizer")
                        {
                            header("Location: /organizer.blade.php");
                        }
                        else
                        {
                            header("Location: /index.php?error=invalid type");
                        }
                    }
                    else
                    {
                        header("Location: index.php?error=password do not match try again");
                        exit;
                    }
                }
            }
            else
            {
                header("Location: index.php?error=email does not exist in our record");
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
        header("Location: /index.php?error= unauthorised page access");
        exit;
    }
}