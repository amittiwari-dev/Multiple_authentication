<?php
define('Redirect_url','login.php');
require __DIR__.'/publicPages.php';


session_start();
$pathName=basename($_SERVER['PHP_SELF'],'.php');
$session=isset($_SESSION['user_data']) ? $_SESSION['user_data']:"";

if($session=="" and !in_array($pathName,$PUBLIC_PATH))

{
    header("Location:".Redirect_url.'?session-expired');
    exit;
}


?>