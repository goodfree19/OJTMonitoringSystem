<?php include("../include/supervisor/header_super_visor.php");?>
<?php include("../include/supervisor/sibebar_supervisor.php");?>
<?php include("../include/authentication.php")?>
        <div class="page">
            <div id="page_top" class="section-body top_dark">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="left">
                            <h1 class="page-title"><i class="fa fa-chart-bar"></i> Reports</h1>
                        </div>
                       
                        <form action="../allcode.php" method="POST">
        <div class="d-flex flex-row-reverse text-dark ">
            <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-2"
                data-toggle="dropdown"><i class="fa fa-user  "></i> <?= $_SESSION['auth_user']['user_name']; ?> </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                <a class="dropdown-item" href=""><i
                        class="fa fa-user"></i> Profile</a>
                <a class="dropdown-item" href="#"><i
                        class="fa fa-cog"></i> Settings</a>
                <div class="dropdown-divider"></div>
            <button type="submit" name="logout_btn" class="dropdown-item"><i
                        class="fa fa-power-off"></i> Sign out</button>
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
                                <div class="chart-title">
                                    <h4>Percentage of Students who submitted the requirements or task</h4>
                                </div>
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

    <script src="../assets/bundles/lib.vendor.bundle.js"></script>

    <script src="../assets/plugins/dropify/js/dropify.min.js"></script>

    <script src="../assets/js/core.js"></script>
    <script src="../assets/js/form/dropify.js"></script> 
    <script src="../assets/js/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            // Bar Chart

            var barChartData = {
                labels: ['Submitted', 'Not Submitted'],
                datasets: [{
                    label: 'Weekly Report',
                    backgroundColor: 'rgba(43, 213, 251, 0.5)',
                    borderColor: 'rgba(23, 158, 251, 1)',
                    borderWidth: 1,
                    data: [50,12]
                },{
                    label: 'Narrative Report',
                    backgroundColor: 'rgba(0, 158, 221, 0.5)',
                    borderColor: 'rgba(0, 158, 251, 1)',
                    borderWidth: 1,
                    data: [40,20]
                }]
            };

            var ctx = document.getElementById('bargraph').getContext('2d');
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        display: true,
                    }
                }
            });

        });
    </script>
</body>
</html>