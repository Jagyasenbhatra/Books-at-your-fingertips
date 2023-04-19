<?php
//This script will handle login
session_start();
require("config.php");
if (isset($_POST['submit']))
 {
    $mail = $_POST['mail'];
    $pass = $_POST['password'];

    $sql= "SELECT *  FROM `users` WHERE mail='$mail'";
    $query = mysqli_query($conn, $sql);
    
    $count=0;
    while($demo=mysqli_fetch_array($query))
    {

        $_SESSION['username']=$demo['name'];
        $count=$count+1;
        if(password_verify($pass,$demo['password']))
            {
                header("location:course.php");
            }
            else 
            {
                echo "password not match";
            }
    }
    if($count==0)
    {
      echo "record not found";
    }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKS AT YOUR FINGERTIPS</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="header">
        <div class="title">
            <h1>BOOKS</h1>
            <h1>AT</h1>
            <h1>YOUR</h1>
            <h1>FINGERTIPS</h1>
        </div>
    </div>
    <div class="menubar">
        <a href="login.php">Home</a>
        <a href="register.php">Register</a>
        <a href="login.php">Login</a>
    </div>
    <div class="middle">
        <div class="middle1"></div>
        <div class="middle2">
            <div class="fm">
                <form action="" method="post">
                    <input type="mail" placeholder="Enter mail id.." class="box" name="mail"><br>
                    <input type="password" placeholder="Password..." class="box" name="password"><br>
                    <div class="btn">
                        <input type="submit" value="Login" class="btn1" name="submit">
                        <input type="reset" value="Clear" class="btn1">
                    </div>
                </form>

                <p class="hint"><a href="reset.php">Forget Password</a></p>
            </div>
        </div>
    </div>
    <div class="footer">&copy;2023
        <a href="">Facebook</a>
        <a href="">Youtube</a>
        <a href="">Twitter</a>
    </div>

</body>

</html>