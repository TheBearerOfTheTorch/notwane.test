<?php
session_start();

if(isset($_SESSION['auth']))
{
    if($_SESSION['authType'] == "admin")
    {
        //database connection
        $servername = '127.0.0.1';
        $dbname = 'notwane';
        $username = 'root';
        $pass = "";
        try
        {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            //we have to display all the registered users
            $stmt = $conn->prepare("SELECT id,username,email,type,updated_at FROM users");
            $stmt->execute();
        }
        catch(PDOException $e)
        {
        echo "failed to establish a connection with the database. server might be off";
        }
        
    }
    else if($_SESSION['authType'] == "organizer")
    {

    }
}
else
{
    header("Location: /index.php?error=you are not loged in to access this page");
}