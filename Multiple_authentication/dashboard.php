<?php

$session=isset($_SESSION['user_data'])? $_SESSION['user_data']:"";
$name=isset($session['name'])? $session['name']:"";
$email=isset($session['email'])? $session['email']:"";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to Dashboard </h1>
    <p> Hello,  <?php
    if(isset($name) && isset($email))
    {
        echo "<b>$name</b> <i>($email)</i>";
    }
    
    ?>
    <p><a href="logoutController.php">Log Out</a></p>
    <p><a href="change-password.php">Change Password</a></p>
    <p><a href="paymemt.php">Pay Fees</a></p>
    
</body>
</html>