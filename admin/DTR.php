<?php include('../include/header.php'); ?>
<?php include('../config/db_conn.php'); ?>
<?php include('../include/sidebar_admin.php'); ?>
<?php include("../include/authentication.php")?>
<?php include('../config/db_conn.php'); ?>

<div class="page">
<div id="page_top" class="section-body top_dark">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="left">
                            <h1 class="page-title"><i class="fa fa-file"></i> Daily Time Record</h1>
                        </div>
                        <form action="../allcode.php" method="POST">
                        <div class="right">
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
                <div class="container">
                <section class="bg-light ">
            <?php  $id=$_GET['id'];
                $query = "SELECT * FROM suoervisor_dtr WHERE id='$id'";
				$result = mysqli_query($con, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{ ?>  <div class="bg-secondary rounded m-3">
                        <div class="text-center">
                          <br>
                          <h5 style="color: white;">Students List</h5>
                        </div>
                         <div class= "m-3 fs-6 border bg-white p-2">
                         <?php $sup=$row['suoervisor_id'];?>
                         <?php 
                $query = "SELECT * FROM users WHERE selected_company='$sup'";
				$result = mysqli_query($con, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row1 = mysqli_fetch_array($result))
					{ ?>  <div class="">
                          <p class="fw-bold">  <?= $row1['Lname']; ?> <?= $row1['Fname']; ?>
                          </div>
                      <?php }} ?>
                        
                        </p>
                         </div>
                         <div class="text-center">

                         <div class="row">
                            <br>
                            <h5 style="color: white;">Notes</h5>
                        </div>   
                        </div>
                        <div class=" m-3 fs-6 border rounded bg-white p-2">
                        <?=$row['notes'];?></p>  
                        </div>
                        <br>
                        </div>
                        <div class="text-center mb-4">                           
                     <img class="rounded img-thumbnail" src="../assets/images/DTR/<?=$row['dtr_file'];?>" alt="<?=$row['dtr_file'];?>">
                      
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

         
     
      
    

