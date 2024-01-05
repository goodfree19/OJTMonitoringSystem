
<?php include('../config/db_conn.php'); ?>
<?php include("../include/supervisor/header_super_visor.php");?>
<?php include("../include/supervisor/sibebar_supervisor.php");?>
<style>
    
</style>
<div class="page">
            <div id="page_top" class="section-body top_dark sticky-top">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="left">
                            <h1 class="page-title"><i class="fa fa-user"></i> Student Profile</h1>
                        </div>
                        <form action="../allcode.php" method="POST">
        <div class="d-flex flex-row-reverse text-dark ">
            <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-2"
                data-toggle="dropdown"><i class="fa fa-user  me-2 "></i> <?= $_SESSION['auth_user']['user_name']; ?> </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
    
            <button type="submit" name="logout_btn" class="dropdown-item"><i
                        class="fa fa-power-off"></i> Log out</button>
            </div>
        </div>
    </form>     
                    </div>
                </div>
            </div>
            <button class="btn btn-primary m-3" onclick="goBack()">Go Back</button>

<script>
    function goBack() {
        window.history.back();
    }
</script>
<?php include('../include/message.php');?>
            <div class="section-body mt-3">
                <div class="container-fluid">
                <section class="bg-light">
            <?php    $id=$_GET['id'];
    $query = "SELECT * FROM users WHERE id='$id'";
				$result = mysqli_query($con, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
                            ?>
    <div class="container ">
        <div class="row ">
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div class="card card-style1 border-0">
                    <div class="card-body  p-1-9 p-sm-2-3 p-md-6 p-lg-7 border shosdow rounded">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4 mb-lg-0">

                                <img class="rounded" src="../assets/images/stud_image/<?=$row['image_id'];?>" alt="<?=$row['image_id'];?>">
                                <h2 class ="text-white  m-3 p-2 bg-success text-center rounded">Student ID</h2>
                            </div>
                            
                            <div class="col-lg-6 px-xl-10 ">
                                <div class="bg-success  rounded">
                                    <h3 class="h2 text-white  text-center p-3 "><?=$row['Fname'];?> <?=$row['Lname'];?></h3>
                                   
                                </div>
                                <ul class="bg-light list-unstyled mt-3 ms-3 mt-5">
                                    
                                    <li class="mb-2 mb-xl-3 display-28"><span class="text-dark fs-4  p-2">ID Number:</span> <?=$row['ID_student'];?></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="text-dark fs-4  p-2">Address:</span><?=$row['address'];?></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="text-dark fs-4  p-2">Phone:</span> <?=$row['phone_number'];?></li>
                                    <?php $compant_id=$row['selected_company'];
                                      $query = "SELECT * FROM company_name WHERE id='$compant_id'";
                                      $result = mysqli_query($con, $query);
                                      if(mysqli_num_rows($result) > 0)
                                      {
                                          while($row1 = mysqli_fetch_array($result))
                                          { ?>
                                           <li class="mb-2 mb-xl-3 display-28"><span class="text-dark fs-3 p-2">Training Site:</span><?=$row1['company_name'];?></li>
                                          <?php
                                          }}
                                    
                                    ?>
                                   
                                </ul>
                               
                                
                                    <?php

                                   $id=$_GET['id'];
                                   $status=$row['status'];
                                   if($status==1){
                                    $query = "SELECT * FROM grade_student WHERE stud_id='$id'";
                                    $result = mysqli_query($con, $query);
                                    if(mysqli_num_rows($result) > 0) {
                                        while($row1 = mysqli_fetch_array($result)) {
                                            // Add the current row's 'total_hours' to $totalHours
                                            ?>
                                            <h2 class="text-center bg-warning text-dark rounded"> Grade: <?=$row1['grade'];?>%</h2>
                                            <?php
                                        }
                                    }
                                   }else{
                                  $totalHours = 0;
                                    $query = "SELECT * FROM daily_narative_report WHERE user_id='$id'";
                                    $result = mysqli_query($con, $query);
                                    if(mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_array($result)) {
                                            // Add the current row's 'total_hours' to $totalHours
                                             $totalHours += $row['total_hours'];
                                        }
                                    }
                                    if($totalHours>=360){?>
                                    <div class="text-center">
                                    <a href="grade.php?id=<?php echo $_GET['id']; ?>" class="btn  text-dark bg-warning fs-5" style="width: 300px ; " type="submit" name="grade" > Grade </a>
                                    </div>
                                <?php
                                            
                                    }}
                                    ?>
                      
                            
                             
                        </div>
                    </div>
                </div>
            </div>
            <?php }} ?>
 
            <!-- section paper Requirements-->
            <div class="container bg-white border rounded text-center">
            <div class="fs-2"> <h2>Requirements</h2></div>
        </div>
        <div class="container bg-white mt-2">
          

                <div class="container-fluid P-5 mt-3">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="list" role="tabpanel">
                        <div class="row mt-3">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="card">
                              <form onsubmit="return validateForm()" action="submit_code.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body text-center">
                                    <h2 class="card-title text-dark fs-4 fw-bold ">TRANSMITTAL LETTER</h2>
                                 
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label"> File </label>
                                        <input type="hidden" name="type_file" value="TRANSMITTAL LETTER"> 
                                        <input type="hidden" name="user_id" value="<?= $_SESSION['auth_user']['user_id'];?>">
                                       
                                      
                                   <?php
                                   //check if the file is existed
                                   $id = "TRANSMITTAL LETTER";
                                   $items = "SELECT * FROM paper_requirments WHERE type_file='$id'";
                                   $items_run = mysqli_query($con, $items);
                                   
                                   if (mysqli_num_rows($items_run) > 0) {
                                   ?> <div class="alert text-center alert-success" role="alert">Submitted</div>

                                   </div>
                                   <div class="text-center">
                                     <a href="view_requirements.php?papername=TRANSMITTAL LETTER" name="view_paper" class="ms-2 btn btn-success">View File</a>
                                   </div>
                                      
                                   <?php
                                   } else {
                                   ?> <div class="alert text-center alert-danger" role="alert">No File attached !</div>
                                   </div>
                                   <?php
                                   }
                                   ?>
                                </div>
                                </form>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                <form action="submit_code.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body text-center">
                                    <h2 class="card-title text-dark fs-4 fw-bold">LETTER</h2>
                                 
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label"> File </label>
                                        <input type="hidden" name="type_file" value="LETTER"> 
                                        <input type="hidden" name="user_id" value="<?= $_SESSION['auth_user']['user_id'];?>">
                                        
                                        <?php
                                          //check if the file is existed
                                   $id = "LETTER";
                                   $items = "SELECT * FROM paper_requirments WHERE type_file='$id'";
                                   $items_run = mysqli_query($con, $items);
                                   
                                   if (mysqli_num_rows($items_run) > 0) {
                                   ?><div class="alert text-center alert-success" role="alert">Submitted</div>

                                   </div>
                                   <div class="text-center">
                                              <a href="view_requirements.php?papername=LETTER" name="view_paper" class="ms-2 btn btn-success">View File</a>
                                       
                                   </div>
                                     
                                   <?php
                                   } else {
                                   ?><div class="alert text-center alert-danger" role="alert">No File Attached !</div>
                                   </div>
                                   <?php
                                   }
                                   ?>
                                        
                                </div>
                                </form>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                <form action="submit_code.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body text-center">
                                    <h2 class="card-title text-dark fs-4 fw-bold">ENDORSEMENT LETTER</h2>
                                 
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label"> File </label>
                                        <input type="hidden" name="type_file" value="ENDORSEMENT LETTER"> 
                                        <input type="hidden" name="user_id" value="<?= $_SESSION['auth_user']['user_id'];?>">
                                        
                                        <?php
                                          //check if the file is existed
                                   $id = "ENDORSEMENT LETTER";
                                   $items = "SELECT * FROM paper_requirments WHERE type_file='$id'";
                                   $items_run = mysqli_query($con, $items);
                                   
                                   if (mysqli_num_rows($items_run) > 0) {
                                   ?><div class="alert text-center alert-success" role="alert">Submitted</div>

                                   </div>
                                   
  
                                            <div class="text-center">
                                                          <a href="view_requirements.php?papername=ENDORSEMENT LETTER" name="view_paper" class="ms-2 btn btn-success">View File</a>
                                              
                                            </div>                                
                                   <?php
                                   } else {
                                   ?><div class="alert text-center alert-danger" role="alert">No File attached !</div>
                                   </div>
                                   <?php
                                   }
                                   ?>
                                        
                                </div>
                                </form>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                <form action="submit_code.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body text-center">
                                    <h2 class="card-title text-dark fs-4 fw-bold">BIO DATA </h2>
                                 
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label"> File </label>
                                        <input type="hidden" name="type_file" value="BIO DATA"> 
                                        <input type="hidden" name="user_id" value="<?= $_SESSION['auth_user']['user_id'];?>">  
                                        
                                        <?php
                                          //check if the file is existed
                                   $id = "BIO DATA";
                                   $items = "SELECT * FROM paper_requirments WHERE type_file='$id'";
                                   $items_run = mysqli_query($con, $items);
                                   
                                   if (mysqli_num_rows($items_run) > 0) {
                                   ?>
                                      <div class="alert text-center alert-success" role="alert">Submitted</div>

                                   </div>
                                   <div class="text-center">

                                   </div>
                                      <div class="text-center">

                                              <a href="view_requirements.php?papername=BIO DATA" name="view_paper" class="ms-2 btn btn-success">View File</a>
                                      
                                      </div>
                                   <?php
                                   } else {
                                   ?>
                                   <div class="alert text-center alert-danger" role="alert">No File attached !</div>
                                   </div>
                                   <?php
                                   }
                                   ?>
                                        
                                </div>
                                </form>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="card">
                                <form action="submit_code.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body text-center">
                                    <h2 class="card-title text-dark fs-4 fw-bold">MEMORANDUM OF AGREEMENT </h2>
                                 
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label"> File </label>
                                        <input type="hidden" name="type_file" value="MEMORANDUM OF AGREEMENT"> 
                                        <input type="hidden" name="user_id" value="<?= $_SESSION['auth_user']['user_id'];?>">  
                                     
                                        <?php
                                   $id = "MEMORANDUM OF AGREEMENT";
                                   $items = "SELECT * FROM paper_requirments WHERE type_file='$id'";
                                   $items_run = mysqli_query($con, $items);
                                   
                                   if (mysqli_num_rows($items_run) > 0) {
                                   ?><div class="alert text-center alert-success" role="alert">Submitted</div>
                                                           
                                   </div>
                                   <div class="text-center">

                                   </div>
                                   <div class="text-center">
                                                  <a href="view_requirements.php?papername=MEMORANDUM OF AGREEMENT" name="view_paper" class="ms-2 btn btn-success">View File</a>
                                      
                                       </div>   
                                   <?php
                                   } else {
                                   ?><div class="alert text-center alert-danger" role="alert">No File attached !</div>
                                   </div>
                                   <?php
                                   }
                                   ?>
                                        
                                </div>
                                </form>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                <form action="submit_code.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body text-center">
                                    <h2 class="card-title text-dark fs-4 fw-bold">WAVER </h2>
                                 
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label"> File </label>
                                        <input type="hidden" name="type_file" value="WAVER"> 
                                        <input type="hidden" name="user_id" value="<?= $_SESSION['auth_user']['user_id'];?>">  
                                       
                                              <?php
                                   $id = "WAVER";
                                   $items = "SELECT * FROM paper_requirments WHERE type_file='$id'";
                                   $items_run = mysqli_query($con, $items);
                                   
                                   if (mysqli_num_rows($items_run) > 0) {
                                   ?><div class="alert text-center alert-success" role="alert">Submitted</div>
                                                           
                                   </div>
                                   <div class="text-center">

                                   </div>
                                   <div class="text-center">
                                                  <a href="view_requirements.php?papername=MEMORANDUM OF AGREEMENT" name="view_paper" class="ms-2 btn btn-success">View File</a>
                                      
                                       </div>   
                                   <?php
                                   } else {
                                   ?><div class="alert text-center alert-danger" role="alert">No File attached !</div>
                                   </div>
                                   <?php
                                   }
                                   ?>
                                        
                                </div>
                                </form>
                                </div>
                               
                            </div>
                      
           
            
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- end section paper Requirements-->
        <div class="container bg-white border rounded text-center">
            <div class="fs-2"> <h2>Daily Narrative Report</h2></div>
        </div>
        <!-- Daily record of the student-->
        <div class="container bg-white mt-2 border rounded">
    <?php
    $id_user = $_GET['id'];
    $items = "SELECT * FROM daily_narative_report WHERE user_id='$id_user'";
    $items_run = mysqli_query($con, $items);

    if (mysqli_num_rows($items_run) > 0) {
        foreach ($items_run as $item) { ?>
            <div class="container mt-2">
              
                 
                        <div class="card">
                            <div class="row pt-3">
                                <!-- Images -->
                                <div class="col-md-3">
                                    <img src="../assets/images/student_daily/<?= $item['pic_stud']; ?>" class="img-fluid w-100 h-100" alt="Image 1">
                                </div>
                                <div class="col-md-3">
                                    <img src="../assets/images/student_daily/<?= $item['pic_stud2']; ?>" class="img-fluid w-100 h-100" alt="Image 2">
                                </div>
                                <div class="col-md-3">
                                    <img src="../assets/images/student_daily/<?= $item['pic_stud4']; ?>" class="img-fluid w-100 h-100" alt="Image 3">
                                </div>
                                <div class="col-md-3">
                                    <img src="../assets/images/student_daily/<?= $item['pic_stud3']; ?>" class="img-fluid w-100 h-100" alt="Image 4">
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="container">
                                    <div class="row gx-5">
                                    
                                            <!-- Student Name and Date -->
                                          
                                                <h5 class=" text-center fs-3 text-wrap">
                                                    <?php
                                                    $stud_id = $item['user_id'];
                                                    $items = "SELECT * FROM users WHERE id ='$stud_id'";
                                                    $items_run = mysqli_query($con, $items);
                                                    if (mysqli_num_rows($items_run) > 0) {
                                                        foreach ($items_run as $item_q) {
                                                            echo $item_q['Fname'] . " " . $item_q['Lname'];
                                                            $id = $item_q['id'];
                                                        }
                                                    }
                                                    ?>
                                                </h5>
                                                <h5>Date: <?= $item['date']; ?></h5>
                                                <h5>Total Hours: <?= $item['total_hours'];?>Hrs</h5>
                                            </div>
                                    
                                       
                                            <!-- Hours -->
                                        
                                               
                                            
                                        
                                    </div>
                                </div>

                                <!-- Narrative Report -->
                                <div class="container">
                                <h4>Accomplishment Report</h4>
                                <p class="card-text text-justify border rounded m-2 p-3"><?= $item['narative_report']; ?></p>
                            
                                </div></div>
                        </div>
                    </div>
                
           
        <?php
        }
    } else {
        ?>
        <!-- No Record Message -->
        <div class="card-body">
            <div class="container">
                <div class="row d-flex justify-content-center ps-3">
                    <h1>No Record...</h1>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
           <!-- End of the daily record of the student-->
</section>
   
                </div>
            </div>
        </div>
  
           
        
    

    <script src="../assets/bundles/lib.vendor.bundle.js"></script>

    <script src="../assets/plugins/dropify/js/dropify.min.js"></script>

    <script src="../assets/js/core.js"></script>
    <script src="../assets/js/form/dropify.js"></script>
</body>

<!-- soccer/project/project-clients.html  07 Jan 2020 03:41:29 GMT -->

</html>

         
     
      
    

