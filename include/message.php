<?php


if(isset($_SESSION['message']))
{
    ?>
   
<div class="d-flex justify-content-center">
    <div class="alert alert-success alert-dismissible fade show text-center m-2 " style="width: 500px; margin:auto" role="alert" >
  <strong></strong> <?= $_SESSION['message'] ?> 
 
</div>
</div>
    <?php
    unset($_SESSION['message']);
}


if(isset($_SESSION['status']))
{
    ?>
   
<div class="d-flex justify-content-center">
    <div class="alert alert-danger alert-dismissible fade show text-center m-2" style="width: 500px; margin:auto" role="alert" >
  <strong> <?= $_SESSION['status'] ?> </strong>
 
</div>
</div>
    <?php
    unset($_SESSION['status']);
}


?>

