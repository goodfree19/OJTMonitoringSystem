<?php 
if(!isset($_SESSION['auth']))
{
    $_SESSION['status']="Please login first .";
    header("Location: ../index.php");
    exit(0);
}?>

