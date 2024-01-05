<?php include("../include/header.php");?>
<?php include("../include/authentication.php")?>
<?php include('../config/db_conn.php'); ?>
<?php include("../include/navbar_student.php");?>`


   
       
<style>
    .bg{
        background-image: url("../assets/images/logo/Untitled design (2).png");

/* Full height */
height: 100%;

/* Center and scale the image nicely */
background-position: center;
background-repeat: no-repeat;
background-size: cover;
    }

</style>
<button class="btn btn-primary m-3" onclick="goBack()">Go Back</button>

<script>
    function goBack() {
        window.history.back();
    }
</script>
            
                <div class="container">
                    <div class="card">
                            <div class="card-body">
                            <div class="d-md-flex justify-content-between mb-2">
                                 
                            <h2 class="text-center" > <?php echo $_GET['papername']; ?></h2>
                             
                        </div>
                    </div>
                </div>
            </div>
         
                <div class="container">
                    <?php
                    $file_name = $_GET['papername'];
                $query = "SELECT * FROM paper_requirments WHERE type_file='$file_name'";
                $result = mysqli_query($con, $query);

                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) { ?>
                <iframe src="../assets/images/papers_requirements/<?=$row['file_name'];?>" width="100%" height="800px"></iframe>\
        
                  <?php }}
                    ?> 
                </div>
          
      
       
   

   <?php include("../include/footer.php")?>