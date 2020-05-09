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
    //getting the details
    $email = testInput($_POST['email']);
    $username = testInput($_POST['username']);
    $type = testInput($_POST['type']);
    $password = testInput($_POST['password']);
    $repeat_pass = testInput($_POST['repeat_pass']);

    //validating again on the server side
    if(empty($email))
    {
        header("Location: /register.blade.php?error= the email field is empty");
    }
    else if(empty($username))
    {
        header("Location: /registe.blade.php?error= the username is empty");
    }
    else if(empty($type))
    {
        header("Location: /registe.blade.php?error= the type is empty");
    }
    else if(empty($password))
    {
        header("Location: /register.blade.php?error= the password field is empty");
    }
    else if(empty($repeat_pass))
    {
        header("Location: /register.blade.php?error= the repeat password field is empty");
    }
    else 
    {
        //check if the user is already registered
        try
        {
            $stmt = $conn->prepare("SELECT email FROM users WHERE email=?");
            $stmt->bindValue(1,$email);
            $stmt->execute();

            if($stmt->rowCount())
            {
                header("Location: /register.blade.php?error=the email already exist in our record");
            }
            else
            {
                $stmt = $conn->prepare("SELECT username FROM users WHERE username=?");
                $stmt->bindValue(1,$username);
                $stmt->execute();
                if($stmt->rowCount())
                {
                    header("Location: /register.blade.php?error=the username is already taken");
                }
                else
                {
                    //registering the session'
                    $_SESSION['auth'] = $email;
                    $_SESSION['authUsername'] = $username;

                    $typeArr = array("local","organizer");
                    //checking for type
                    foreach($typeArr as $value)
                    {
                        if($type ==  $value)
                        {
                            //sending the details to the db
                            $stmt = $conn->prepare("INSERT INTO users (username,email,type,password) VALUES(:username,:email,:type,:password)");
                            $stmt->bindParam(':email',$email);
                            $stmt->bindParam(':username',$username);
                            $stmt->bindParam(':type',$type);
                            $stmt->bindParam(':password',md5($password));
                            $rt = $stmt->execute();

                            if($rt > 0)
                            {
                                //redirect different users to their pages
                                if($type == "local")
                                {
                                    header("Location: /local.blade.php");
                                }
                                else if($type == "organizer")
                                {
                                    header("Location: /organizer.blade.php");
                                }
                                else
                                {
                                    header("Location : /register.blade.php?error=the type is invald");
                                }
                            }
                        }
                        else
                        {
                            header("Location: ../register.blade.php?error=wrong user type");
                        }
                    }
                    
                }
            }
        }
        catch(PDOException $e)
        {
            //header("Location: /register.blade.php?error=the connection failed");
            echo $e->getMessage();
        }
    }
}
else
{
    if(!isset($_SESSION['auth']))
    {
        header("Location: /register.blade.php?error=unauthorised page request");
        exit;
    }
}