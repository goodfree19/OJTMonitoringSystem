<?php
session_start();
include('config/db_conn.php');

if(isset($_POST['logout_btn']))
{
   //session_destroy();
   unset($_SESSION['auth']);
   unset($_SESSION['auth_role']);
   unset($_SESSION['auth_user']);
   $_SESSION ['message']="You have been successfully logged out!";
   header("Location:  index.php");
   exit(0);
}

if(isset($_POST['logout_btn_admin']))
{
   //session_destroy();
   unset($_SESSION['auth']);
   unset($_SESSION['auth_role']);
   unset($_SESSION['auth_user']);
   $_SESSION ['message']="You have been successfully logged out!";
   header("Location:  index.php");
   exit(0);
}