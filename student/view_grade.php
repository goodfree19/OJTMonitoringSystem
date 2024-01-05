<?php include("../include/header.php");?>
<?php include("../include/authentication.php")?>
<?php include('../config/db_conn.php'); ?>
<?php include("../include/navbar_student.php");?>
<style>
    
</style>

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
                                
                                <?php $id1=$_GET['id'];
                                  $query = "SELECT * FROM grade_student WHERE stud_id='$id1'";
                                        $result = mysqli_query($con, $query);
                                        if(mysqli_num_rows($result) > 0)
                                        {
                                            while($row12 = mysqli_fetch_array($result))
                                            {
                                                $certificate=$row12['crertificate'];
                                                $notes=$row12['comment'];
                                                
                                            }}  ?>
           <iframe src="../assets/images/certificate/<?php echo $certificate; ?>" width="100%" height="500px"></iframe>

                                            <?php
                                    $certificatePath = "../assets/images/certificate/" . $certificate;
                                    if (file_exists($certificatePath)) {
                                        
                                    } else {
                                        echo "File does not exist!";
                                    }
                                    ?>

                                <h2 class ="text-white  m-3 p-2 bg-success text-center rounded">Certificate</h2>
                            </div>
                            
                            <div class="col-lg-6 px-xl-10 ">
                                <div class="bg-success  rounded">
                                    <h3 class="h2 text-white text-center p-3 "><?=$row['Fname'];?> <?=$row['Lname'];?></h3>
                                   
                                </div>
                                <div class="rounded border bg-light">
                                <ul class="list-unstyled mt-3 ms-3">
                                    
                                  
                                    <li class="mb-2 mb-xl-3 display-28 text-center "><span class="text-dark fs-3 fw-bold text-center p-2">Comment</span> </li>
                                    <li class="mb-2 mb-xl-3 display-28">
                                        <div>
                                            <h6 style="text-align: justify;" name="" id="" cols="70" rows="10"><?=$notes?></h6>
                                        </div>
                                    </li>
                                    <br><br><br><br>
                                 
                                    <?php $compant_id=$row['selected_company'];
                                      $query = "SELECT * FROM company_name WHERE id='$compant_id'";
                                      $result = mysqli_query($con, $query);
                                      if(mysqli_num_rows($result) > 0)
                                      {
                                          while($row1 = mysqli_fetch_array($result))
                                          { ?>
                                           <li class="mb-2 mb-xl-3 display-28"><span class="text-dark fs-3 fw-bold  p-2">Rated By:</span> <?= $row1['supervisor_name'];?></li>
                                    
                                   
                                    <li class="display-28"><span class="text-dark fs-3  fw-bold p-2">Company Name:</span><?=$row1['company_name'];?></li>
                                    <?php }} ?>
                                </ul>
                                </div>
                              
                                <div class="row text-center"> 
                                <?php
                        //  check if na approve na or diri pa e show ang approve sign 
                        $role=$row['role'];
                        $status=$row['status'];
                        $stud_id=$row['id'];
                        if($status==1){
                            $query = "SELECT * FROM grade_student WHERE stud_id='$id'";
                            $result = mysqli_query($con, $query);
                            if(mysqli_num_rows($result) > 0) {
                                while($row1 = mysqli_fetch_array($result)) {
                                    // Add the current row's 'total_hours' to $totalHours
                                    ?>
                                    <h2 class="text-center bg-warning text-dark m-3 border rounded bg-info"> Grade: <?=$row1['grade'];?>%</h2>
                                 
                                    <?php
                                }
                            } ?>
                          
                           <?php
                        }else{
                        }?>
                            
                             </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }} ?>

</section>
   
                </div>
            </div>
      
  
           
        
    

    <script src="../assets/bundles/lib.vendor.bundle.js"></script>

    <script src="../assets/plugins/dropify/js/dropify.min.js"></script>

    <script src="../assets/js/core.js"></script>
    <script src="../assets/js/form/dropify.js"></script>
</body>

<!-- soccer/project/project-clients.html  07 Jan 2020 03:41:29 GMT -->

</html>

         
     
      
    

