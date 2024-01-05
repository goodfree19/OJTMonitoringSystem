<?php include("../include/supervisor/header_super_visor.php");?>
<?php include("../include/supervisor/sibebar_supervisor.php");
include('../config/db_conn.php'); ?>
<?php include("../include/authentication.php");
     $company=$_SESSION['auth_user']['user_id'];
if (isset($_POST['search_btn'])) {
    $search_query = mysqli_real_escape_string($con, $_POST['search_query']);
    $item = "SELECT * FROM users WHERE Fname LIKE '%$search_query%' OR Lname LIKE '%$search_query%' OR ID_student LIKE '%$search_query%' OR selected_company LIKE '%$search_query%'";
} else {
    $item = "SELECT * FROM users WHERE selected_company='$company'";
}

$items_run = mysqli_query($con, $item);
 ?>
        <div class="page">
            <div id="page_top" class="section-body top_dark">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="left">
                            <h1 class="page-title"><i class="fa fa-user"></i> Students</h1>
                        </div>
                        <form action="../allcode.php" method="POST">
        <div class="d-flex flex-row-reverse text-dark ">
            <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-2"
                data-toggle="dropdown"><i class="fa fa-user  me-2  "></i> <?= $_SESSION['auth_user']['user_name']; ?> </a>
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
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-md-flex justify-content-between mb-2">
                                        <ul class="nav nav-tabs b-none">
                                            <li class="nav-item"><a class="nav-link active" 
                                                    href="#"> <i class="fa fa-list-ul"> </i> Student List</a>
                                            </li>
                                           
                                        </ul>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-body">
                <div class="container-fluid">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="list" role="tabpanel">
                            <div class="row clearfix">
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="card">
                                        <table id="myTable" class="table app-table-hover mb-0 text-center">
                                            <thead >
                                                <tr>
                                                    <th class="cell">School ID</th>
                                                    <th class="cell">Full Name</th>
                                                    <th class="cell">Course</th>
                                                    <th class="cell">Contact</th>
                                                    
                                                    <th class="cell">Address</th>
                                                    <th class="cell">Remaining Hours</th>
                                                    <th class="cell">Status</th>
                                              
                                                    <th class="text-right">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center ">
                                            <?php  
                                        
                                                $items="SELECT * FROM users WHERE selected_company='$company' && role=1";
                                                $items_run=mysqli_query($con,$items);
                                                if(mysqli_num_rows($items_run)>0)
                
                                                {
                                                     foreach($items_run as $item) { 
                                                     
                                                      
                                                       
                                                            
                                                                ?>
                                                                 <tr>
                                                  
                                                    <td><?=$item['ID_student']?></td>
                                                    <td><?php echo $item['Fname'].' '.$item['Lname']?></td>
                                                    <td>BSIT</td>
                                                    <td><?=$item['phone_number']?></td>
                                              
                                                    <td><?=$item['address']?></td>
                                                 
                                                    <?php 
                                                    $id=$item['id'];
                                                    $totalHours = 0;
                                                    $query = "SELECT * FROM daily_narative_report WHERE user_id='$id'";
                                                    $result = mysqli_query($con, $query);
                                                    if(mysqli_num_rows($result) > 0) {
                                                        while($row = mysqli_fetch_array($result)) {
                                                            // Add the current row's 'total_hours' to $totalHours
                                                            $totalHours += $row['total_hours'];
                                                        }
                                                    }?>
                                                       <td class="text-info fw-bold" ><?php echo 486-$totalHours?> Hours</td>
                                                       <?php
                                                    
                                                    if($totalHours>=486){?>
                                                  <td class="text-success">Completed...</td>
                                                <?php
                                                            
                                                    }else{
                                                    ?>
                                                    <td class="text-danger">On Going...</td>
                                                 <?php } ?>
                                                    <td class="text-right ">
                                                      <a href="student_check.php?id=<?=$item['id']?>" class="btn btn-success"> Profile</a>  
                                                    </td>
                                                </tr>
                                                          
                                               
                                                <?php }}
                                                else
                                                { ?>
                                                   <tbody class="text-center ">
                                                    <td> No record found....</td>
                                                   
                                                   </tbody>
                                                <?php } ?>
                                                
                                                
                                            </tbody>
                                        </table>
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

    <script src="../assets/bundles/lib.vendor.bundle.js"></script>

    <script src="../assets/plugins/dropify/js/dropify.min.js"></script>

    <script src="../assets/js/core.js"></script>
    <script src="../assets/js/form/dropify.js"></script>
</body>

</html>