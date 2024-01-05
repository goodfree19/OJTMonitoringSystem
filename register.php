<?php include("include/header.php");?>
<?php include("include/navbar_login.php");?>
<style>
    .center{
      display: grid;
      place-items: center;
      
    }
  
    .circle{
    opacity: 1;
  }
  .circle:hover{
    opacity: 0.5;
    transition: 1s ease;
 
  }
  .b1g{
    background: rgb(215,244,216);
-webkit-backdrop-filter: blur(10px);
backdrop-filter: blur(10px);
border: 1px solid rgba(166,179,139,0.25);
  }

</style>
<?php include('include/message.php');?>
<div class="container  ">
<div class="container text-center bgimage center pt-5">
  <div class="row  rounded b1g ">
    <div class="text-center fs-1 m-2 pt-2 "><p class="badge bg-success  fs-3 text-wrap" style="width: auto;">OJT Monitoring System</p></div>
    <div class="col">
    <a href="login_student.php">
    <div class="circle">
          <img src="assets/images/logo/student-removebg-preview.png" height="270px" width="auto" class=" rounded mx-auto d-block" alt="...">
          <div class="badge bg-warning  fs-3 text-wrap" style="width: auto;">
          Student
          </div>
    </div>
    </a>
   
    
    </div>
    <div class="col">
    <div class="circle pb-5">
    <a href="login_supervisor.php">
    <img src="assets/images/logo/Untitled_design-removebg-preview.png" height="270px" width="auto" class="rounded mx-auto d-block" alt="...">
    
    <div class="badge bg-success  fs-3 text-wrap" style="width: auto;">
    Supervisor
          </div>
    </div>
</a>
    </div>
    <div class="col">
    <div class="circle">
    <a href="login_admin.php">
    <img src="assets/images/logo/admin-removebg-preview.png" height="270px" width="auto"class="rounded mx-auto d-block" alt="...">

    <div class="badge bg-primary  fs-3 text-wrap" style="width: auto;">
    Admin
          </div>
    </div>
</a>
    </div>
  </div>
</div>
</div>