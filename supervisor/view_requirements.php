<?php include("../include/supervisor/header_super_visor.php");?>
<?php include("../include/supervisor/sibebar_supervisor.php");
include('../config/db_conn.php'); ?>
<?php include("../include/authentication.php")?>

        <div class="page">
            <div id="page_top" class="section-body top_dark">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="left">
                            <h1 class="page-title"><i class="fa fa-user"></i> FILE</h1>
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
            <?php include('../include/message.php');?>
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
        </div>

       
    </div>

    <script src="../assets/bundles/lib.vendor.bundle.js"></script>

    <script src="../assets/plugins/dropify/js/dropify.min.js"></script>

    <script src="../assets/js/core.js"></script>
    <script src="../assets/js/form/dropify.js"></script>
</body>

<!-- soccer/project/project-clients.html  07 Jan 2020 03:41:29 GMT -->

</html>