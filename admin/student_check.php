<?php include('../include/header.php'); ?>
<?php include('../config/db_conn.php'); ?>
<?php include("../include/authentication.php")?>
<?php include('../include/sidebar_admin.php'); ?>
<style>
    
</style>
<div class="page">
            <div id="page_top" class="section-body top_dark sticky-top">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="left">
                            <h1 class="page-title"><i class="fa fa-user"></i> Student Profile</h1>
                        </div>
                        <div class="right">
                        <form action="../allcode.php" method="POST">
                            <div class="notification d-flex">
                                <div class="dropdown d-flex">
                                    <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-2"
                                        data-toggle="dropdown"><i class="fa fa-user"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <button type="submit" name="logout_btn" class="dropdown-item"><i
                                          class="fa fa-power-off"></i> Log out</button>
                                    </div>
                                </div>
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
                                <div class="rounded border">
                                <ul class="list-unstyled mt-3 ms-3" bg-light">

                                <?php $compant_id=$row['selected_company'];
                                      $query = "SELECT * FROM company_name WHERE id='$compant_id'";
                                      $result = mysqli_query($con, $query);
                                      if(mysqli_num_rows($result) > 0)
                                      {
                                          while($row1 = mysqli_fetch_array($result))
                                          { ?>
                                           <li class="mb-2 mb-xl-3 display-28"><span class="text-dark fs-3 fw-bold  p-2">Training Site:</span><?=$row1['company_name'];?></li>
                                          <?php
                                          }}
                                    
                                    ?>
                                   
                                    <li class="mb-2 mb-xl-3 display-28"><span class="text-dark fs-3 fw-bold  p-2">ID Number:</span> <?=$row['ID_student'];?></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="text-dark fs-3 fw-bold  p-2">Address:</span><?=$row['address'];?></li>
                                    <li class="display-28"><span class="text-dark fs-3  fw-bold p-2">Email:</span> <?= $row['email']; ?></li><br>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="text-dark fs-3 fw-bold  p-2">Phone:</span> <?=$row['phone_number'];?></li>
                                   
                                </ul>
                                </div>
                               <br>
                               
                                <div class="row text-center"> 
                                <?php
                        //  check if na approve na or diri pa e show ang approve sign 
                        $role=$row['role'];     // approve pag 1  reject man pag 2 pending pag 0
                        $status=$row['status']; // kung value niya 1 siya and graded na 0 diri pa graded
                        $stud_id=$row['id'];
                       
                       // pag nag ang role is 1 show approve
                        if($role==1&&$status==1){
                            $query = "SELECT * FROM grade_student WHERE stud_id='$id'";
                            $result = mysqli_query($con, $query);
                            if(mysqli_num_rows($result) > 0) {
                                while($row1 = mysqli_fetch_array($result)) {
                                    // Add the current row's 'total_hours' to $totalHours
                                    ?>
                                    
                                    <a class="btn  text-dark fw-bold bg-warning fs-4" href="view_grade.php?id=<?= $stud_id ?>">View Grade</a>
                                    <?php
                                    
                                }
                            } ?>
                          
                           <?php
                        }else{
                     
                         if($role==0){ ?>
                        <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0 mt-5"> 

                    
                                    <form action="code.php" method="POST">
                            <input type="text" hidden name="student_id" value="<?= $row['id'];?>">
                            <button class="btn  text-white bg-success fs-5" type="submit" name="approve" >Approve</button>
                           
                        </div>
                        <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0 mt-5"> 
                      <button class="btn  bg-danger text-white fs-5" type="submit" name="reject_stud">Reject</button>
                        </div>
                        </form>
                       <?php  } else{
                                ?>
                               <div class="text-center">
                                <h3 class="fs-3 text-success mt-2 ">Approved</h3>
                                </div>
                          
                                <?php
                              }}
                                ?>
                            
                             </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }} ?>
    <?php
                        //  check if na approve na or diri pa e show ang approve sign 
                        
            if($role==1){?>
            <!-- section paper Requirements-->
            <div class="container bg-white border rounded text-center">
            <div class="fs-2">Requirements</div>
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
                                   $id_student=$_GET['id'];
                                   $items = "SELECT * FROM paper_requirments WHERE type_file='$id' AND user_id='$id_student'";
                                   $items_run = mysqli_query($con, $items);
                                   
                                   if (mysqli_num_rows($items_run) > 0) {
                                   ?>
                                    <div class="alert text-center alert-success" role="alert">Submitted</div>
                                   </div>
                                   <div class="text-center">
                                     <a href="view_requirements.php?papername=TRANSMITTAL LETTER" name="view_paper" class="ms-2 btn btn-success">View File</a>
                                   </div>
                                      
                                   <?php
                                   } else {
                                   ?> <div class="alert text-center alert-danger" role="alert">No file attached!</div>
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
                                   $items = "SELECT * FROM paper_requirments WHERE type_file='$id' AND user_id='$id_student'";
                                   $items_run = mysqli_query($con, $items);
                                   
                                   if (mysqli_num_rows($items_run) > 0) {
                                   ?><div class="alert text-center alert-success" role="alert">Submitted</div>

                                   </div>
                                   <div class="text-center">
                                              <a href="view_requirements.php?papername=LETTER" name="view_paper" class="ms-2 btn btn-success">View File</a>
                                       
                                   </div>
                                     
                                   <?php
                                   } else {
                                   ?><div class="alert text-center alert-danger" role="alert">No file attached!</div>
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
                                   $items = "SELECT * FROM paper_requirments WHERE type_file='$id' AND user_id='$id_student'";
                                   $items_run = mysqli_query($con, $items);
                                   
                                   if (mysqli_num_rows($items_run) > 0) {
                                   ?><div class="alert text-center alert-success" role="alert">Submitted</div>

                                   </div>
                                   
  
                                            <div class="text-center">
                                                          <a href="view_requirements.php?papername=ENDORSEMENT LETTER" name="view_paper" class="ms-2 btn btn-success">View File</a>
                                              
                                            </div>                                
                                   <?php
                                   } else {
                                   ?><div class="alert text-center alert-danger" role="alert">No file attached!</div>
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
                                   $items = "SELECT * FROM paper_requirments WHERE type_file='$id' AND user_id='$id_student'";
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
                                   <div class="alert text-center alert-danger" role="alert">No file attached!</div>
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
                                   $items = "SELECT * FROM paper_requirments WHERE type_file='$id' AND user_id='$id_student'";
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
                                   ?><div class="alert text-center alert-danger" role="alert">No file attached!</div>
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
                                   $items = "SELECT * FROM paper_requirments WHERE type_file='$id' AND user_id='$id_student'";
                                   $items_run = mysqli_query($con, $items);
                                   
                                   if (mysqli_num_rows($items_run) > 0) {
                                   ?><div class="alert text-center alert-success" role="alert">Submitted</div>
                                                           
                                   </div>
                                   <div class="text-center">

                                   </div>
                                   <div class="text-center">
                                                  <a href="view_requirements.php?papername=WAVER" name="view_paper" class="ms-2 btn btn-success">View File</a>
                                      
                                       </div>   
                                   <?php
                                   } else {
                                   ?><div class="alert text-center alert-danger" role="alert">No file attached!</div>
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
            <div class="fs-2">Daily Narrative Report</div>
        </div>
        <!-- Daily record of the student-->
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
                                        <div class="col">
                                            <!-- Student Name and Date -->
                                            <div class="">
                                                <h5 class="">
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
                                        <div class="">
                                            <!-- Hours -->
                                                <h5>Total Hours: <?=$item['total_hours'];?></h5> 
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Narrative Report -->
                                <div class ="ps-4 text-center"> <h4>Tasks Accomplished</h4></div>
                                <textarea disabled class="message-textarea" rows="20" cols="110" style="width: 950px; margin: auto;px; border-radius: 10px; resize: none"><?= $item['narative_report'];?></textarea
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
    }}
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

         
     
      
    

