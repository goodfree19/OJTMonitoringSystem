<?php include("../include/supervisor/header_super_visor.php");?>
<?php include("../include/supervisor/sibebar_supervisor.php");
include('../config/db_conn.php'); ?>
<?php include("../include/authentication.php")?>
        <div class="page">
            <div id="page_top" class="section-body top_dark">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="left">
                            <h1 class="page-title"><i class="fa fa-home"></i> Dashboard</h1>
                        </div>
                        <form action="../allcode.php" method="POST">
                            <div class="d-flex flex-row-reverse text-dark ">
                                <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-2"
                                    data-toggle="dropdown"><i class="fa fa-user  me-2"></i> <?= $_SESSION['auth_user']['user_name'];?> </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            
                                   
                                <button type="submit" name="logout_btn" class="dropdown-item"><i
                                            class="fa fa-power-off"></i> Log out</button>
                                </div>
                            </div>
                        </form>
      
                        
                    </div>
                </div>
            </div>
            <div class="section-body mt-3">
                <div class="container-fluid">
                <?php include('../include/message.php');?>
                </div>
            </div>
            <div class="section-body">
                <div class="container-fluid">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="list" role="tabpanel">
                            <div class="row clearfix">
                        <div class="col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between p-md-1">
                                        <div class="d-flex flex-row">
                                            <div class="align-self-center">
                                                <i class="fa fa-user text-success fa-3x m-4 "></i>
                                            </div>
                                            <div>
                                                <h4>STUDENT</h4>
                                                <?php
                                     $company_id = $_SESSION['auth_user']['user_id']; 
                                     $query = "SELECT * FROM users WHERE selected_company = $company_id && role=1";
                                     $result = mysqli_query($con, $query);
                                     
                                     // Initialize the variable to count the number of rows
                                     $totalRows = 0;
                                     
                                     if(mysqli_num_rows($result) > 0) {
                                         while($row = mysqli_fetch_array($result)) {
                                             // Increment the row count for each iteration
                                             $totalRows++;
                                         }
                                     }
                                     ?>
                                                
                                                <h2 class="h1 mb-0"><?= $totalRows?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between p-md-1">
                                        <div class="d-flex flex-row">
                                            <div class="align-self-center">
                                                <i class="fa fa-tasks text-info fa-3x m-4"></i>
                                            </div>
                                            <div>
                                                <h4>DAILY TIME RECORD</h4>
                                                
                                                <?php
                                     $company_id = $_SESSION['auth_user']['user_id']; 
                                     $query = "SELECT * FROM suoervisor_dtr WHERE suoervisor_id = $company_id";
                                     $result = mysqli_query($con, $query);
                                     
                                     // Initialize the variable to count the number of rows
                                     $totalRows1 = 0;
                                     
                                     if(mysqli_num_rows($result) > 0) {
                                         while($row = mysqli_fetch_array($result)) {
                                             // Increment the row count for each iteration
                                             $totalRows1++;
                                         }
                                     }
                                     ?>
                                                
                                                <h2 class="h1 mb-0"><?= $totalRows1?></h2>
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
    <script src="../assets/js/core.js"></script>
    <script src="../assets/js/form/dropify.js"></script>
    <script src="../assets/js/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            // Bar Chart

            var barChartData = {
                labels: ['Student', 'Daily Time Record',],
                datasets: [{
                    label: 'Total',
                    backgroundColor: 'rgba(43, 213, 251, 0.5)',
                    borderColor: 'rgba(23, 158, 251, 1)',
                    borderWidth: 3,
                    data: [<?= $totalRows?>,<?= $totalRows1?>]
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

