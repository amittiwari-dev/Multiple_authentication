<?php 
session_start();
if(isset($_SESSION['user_data']) and !empty($_SESSION['user_data']))
{
    session_destroy();
}
header('Location:login.php?msg=user logout success');
exit();


?>