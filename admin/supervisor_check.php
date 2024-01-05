<?php include('../include/header.php'); ?>
<?php include('../config/db_conn.php'); ?>
<?php include('../include/sidebar_admin.php'); ?>
<?php include("../include/authentication.php")?>
<div class="page">
            <div id="page_top" class="section-body top_dark">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="left">
                            <h1 class="page-title"><i class="fa fa-user"></i> Students Info</h1>
                        </div>
                        <div class="right">
    
                            <div class="notification d-flex">
                                <div class="dropdown d-flex">
                                    <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-2"
                                        data-toggle="dropdown"><i class="fa fa-user"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="page-profile.html"><i
                                                class="fa fa-user"></i> Profile</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="fa fa-cog"></i> Settings</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="../index.html"><i
                                                class="fa fa-power-off"></i> Log out</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
            <?php   $id=$_GET['id'];
    $query = "SELECT * FROM company_name WHERE id='$id'";
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
                        <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7 border shosdow rounded">
                            <div class="row align-items-center bg-white p-2 rounded">
                                <div class="col-lg-6 mb-4 mb-lg-0">
                                   <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <!-- Add your images dynamically based on PHP values -->
                                        <div class="carousel-item active text-center">
                                        <img class="rounded" src="../assets/images/supervisor_images/<?=$row['filename_valid_id'];?>" alt="<?=$row['filename_valid_id'];?>">
                                        </div>
                                        <!-- Add the second image here with a new carousel-item div -->
                                        <div class="carousel-item text-center ">
                                        <img class="rounded" src="../assets/images/supervisor_images/<?=$row['filename_business_permit'];?>" alt="<?=$row['filename_valid_id'];?>">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                    </div>
                                
                                    <h2 class ="text-white  m-3 p-2 bg-success text-center rounded"><?=$row['company_name'];?></h2>
                            </div>
                            
                            <div class="col-lg-6 px-xl-10">
                                <div class="bg-success  rounded">
                                    <h3 class="h2 text-white  p-3 text-center"><?=$row['supervisor_name'];?></h3>
                                </div>
                                <ul class="list-unstyled mt-3 ms-3 border bg-light shadow rounded">
                                <li class="mb-2 mb-xl-3 display-28"><span class="text-dark fs-4 fw-bold p-2">Training Site:</span><?=$row['company_name'];?></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="text-dark fs-4 fw-bold p-2">Email:</span> <?=$row['email'];?></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="text-dark fs-4 fw-bold  p-2">Address:</span><?=$row['address'];?></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="text-dark fs-4 fw-bold p-2">Phone Number:</span> <?=$row['phone_number'];?></li>
                                  
                                  
                                </ul>
                                <?php
                        //  check if na approve na or diri pa e show ang approve sign 
                         $role=$row['role'];
                         if($role==0){ ?>
                                <form action="code.php" method="POST">
                                <div class="row text-center"> 
                                    <input hidden type="text" name="supervisor_id" value="<?= $id ?>">
                                    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0 mt-5"> 
                                        <button class="btn  text-white bg-success fs-5" type="submit" name="approve_supervisor" >Approve  </button>
                                    </div>
                                    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0 mt-5"> 
                                <button class="btn  bg-danger text-white fs-5" type="submit" name="reject_stupervisor" > Reject</button>
                                    </div>
                                </div> 
                                </form>
                                <?php  } else{
                                ?>
                               <div class="text-center">
                                <h3 class="fs-3 text-success ">Approved</h3>
                                </div>
                          
                                <?php
                              }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }} ?>
            <div class="container overflow-hidden text-center">
            
            </div>
            <div class="col-lg-12">
              
                </div>
            </div>
        </div>
    </div>
</section>
   
                </div>
            </div>
      
      
   
           
        
    

    <script src="../assets/bundles/lib.vendor.bundle.js"></script>

    <script src="../assets/plugins/dropify/js/dropify.min.js"></script>

    <script src="../assets/js/core.js"></script>
    <script src="../assets/js/form/dropify.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

<!-- soccer/project/project-clients.html  07 Jan 2020 03:41:29 GMT -->

</html>

         
     
      
    

