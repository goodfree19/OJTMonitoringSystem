<?php include("../include/header.php");?>
<?php include("../include/authentication.php")?>
<?php include('../config/db_conn.php'); ?>
<?php include("../include/navbar_student.php");?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
      
     
          
           
            <?php include('../include/message.php');?>
                <div class="container pb-5 pt-5">                    
              
                
           
              
        
            <?php $id = $_SESSION['auth_user']['user_id']; 

// Initialize $totalHours before the loop
$totalHours = 0;

$query = "SELECT * FROM daily_narative_report WHERE user_id='$id'";
$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)) {
        // Add the current row's 'total_hours' to $totalHours
        $totalHours += $row['total_hours'];
    }
}
// Now $totalHours contains the sum of 'total_hours' for the user

    $query = "SELECT * FROM users WHERE id='$id'";
				$result2 = mysqli_query($con, $query);
				if(mysqli_num_rows($result2) > 0)
				{
					while($row = mysqli_fetch_array($result2))
					{
                        
                            ?>
    <div class="container border shosdow rounded bg-white ">
        <div class="row ">
          
               
                    <div class="card-body  ">
                        <div class="row align-items-center">
                        <div class="bg-warning  rounded mb-3">
                                   <?php $company_id=$row['selected_company'];
                                   $query = "SELECT * FROM company_name WHERE id='$company_id'";
                                   $result3 = mysqli_query($con, $query);
                                   if(mysqli_num_rows($result2) > 0)
                                   {
                                       while($row3 = mysqli_fetch_array($result3))
                                       {
                                   ?>
                                 <div class=""> <h3 class="h3 text-dark  p-1 text-center">  <?= $row3['company_name']; ?>
                                 </h3></div>
                                        
                                   <?php }}?>
                                   
                                </div>
                            <div class="col-lg-6 mb-4 mb-lg-0">

                                <img class="rounded" src="../assets/images/stud_image/<?=$row['image_id'];?>" alt="<?=$row['image_id'];?>">
                                <h2 class ="text-dark  m-3 p-2 bg-warning text-center rounded"><?=$row['ID_student'];?></h2>
                            </div>

                            
                            <div class="bg-light col-lg-6 px-xl-10 border rounded">
                                
                                <ul class="list-unstyled mt-3 ms-3">
                                <li class="mb-2 mb-xl-3 display-28 text-center"><span class="text-dark fs-2 bg-warning rounded p-2"><?=$row['Fname'];?> <?=$row['Lname'];?></span></li>
                                <li class="mb-2 mb-xl-3 display-28"><span class="text-dark fs-4 fw-bold p-2">Remaining Hours:</span><?php echo $result=486-$totalHours;?> Hours</li>
                                <li class="mb-2 mb-xl-3 display-28"><span class="text-dark fs-4 fw-bold p-2">Address:</span><?=$row['address'];?></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="text-dark fs-4 fw-bold p-2">Email Address:</span><?=$row['email'];?></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="text-dark fs-4 fw-bold p-2">Phone:</span> <?=$row['phone_number'];?></li>
                                                 
                                </ul>
                                
                                <br>
                            
           
                           <?php     $role=$row['status'];
                         if($role==1){ ?>
                         
                                <div class="row text-center">
                                <a class="btn fw-bold  text-dark bg-warning fs-4" href="view_grade.php?id=<?=  $_SESSION['auth_user']['user_id']  ?>">View Grade</a>
                                </div>
                                
                        <?php }?>
                        </div>
                                <ul class="social-icon-style1 list-unstyled mb-0 ps-0">
                                    <li><a href="#!"><i class="ti-twitter-alt"></i></a></li>
                                    <li><a href="#!"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#!"><i class="ti-pinterest"></i></a></li>
                                    <li><a href="#!"><i class="ti-instagram"></i></a></li>
                                </ul>
                                <div class="row text-center"> 
                     
                            </div>
                        </div>
                    </div>
                
            </div>
       
           
        </div>
    </div>
    
    <div class="container">
    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between p-md-1">
                                        <div class="d-flex flex-row">
                                            <div class="align-self-center">
                                                <i class="fa fa-clock text-warning fa-3x me-4"></i>
                                            </div>
                                            <div>
                                                <h4>Total Hours</h4>
                                                <h2 class="h1 mb-0"><?php echo $totalHours;?> Hours</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                 
    </div>

                        <div class="container-fluid">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="list" role="tabpanel">
                                    <div class="row clearfix">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card">
                                    <div class="card-body">
                                        <canvas id="bargraph"></canvas>
                                    </div>
                                </div>
                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            // Bar Chart

            var barChartData = {
                labels: ['Total Hours'],
                datasets: [{
                    label: 'Total',
                    backgroundColor: 'rgba(43, 213, 251, 0.5)',
                    borderColor: 'rgba(23, 158, 251, 1)',
                    borderWidth: 1,
                    data: [<?= $totalHours?>,5]
                }]
            };

            var ctx = document.getElementById('bargraph').getContext('2d');
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        display: false,
                    }
                }
            });

        });
    </script>
             <?php }} ?>   

            <script src="../assets/bundles/lib.vendor.bundle.js"></script>

<script src="../assets/plugins/dropify/js/dropify.min.js"></script>

<script src="../assets/js/core.js"></script>
<script src="../assets/js/form/dropify.js"></script>
<script src="../assets/js/chart.js"></script>

<?php include ("../include/footer.php");?>