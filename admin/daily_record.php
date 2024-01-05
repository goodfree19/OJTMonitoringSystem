<?php include('../include/header.php'); ?>

<?php include('../include/sidebar_admin.php'); 
include('../config/db_conn.php'); ?>
    <div class="page">
            <div id="page_top" class="section-body top_dark">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="left">
                            <h1 class="page-title"><i class="fa fa-users"></i> Coordinators</h1>
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
                                                class="fa fa-power-off"></i> Sign out</a>
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
          <?php                    $items="SELECT * FROM daily_narative_report ";
                                                $items_run=mysqli_query($con,$items);
                                                if(mysqli_num_rows($items_run)>0)
                
                                                {
                                                     foreach($items_run as $item) {   ?> 
            <div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card mb-3 ">
                <div class="row pt-3">
                    <div class="col-md-3">
                        <img src="../assets/images/student_daily/<?= $item['pic_stud'];?>" class="img-fluid w-100 h-100" alt="Image 1">
                    </div>
                    <div class="col-md-3">
                        <img src="../assets/images/student_daily/<?= $item['pic_stud2'];?>" class="img-fluid w-100 h-100" alt="Image 2">
                    </div>
                    
                    <div class="col-md-3">
                        <img src="../assets/images/student_daily/<?= $item['pic_stud4'];?>" class="img-fluid w-100 h-100" alt="Image 3">
                    </div>
                    <div class="col-md-3">
                        <img src="../assets/images/student_daily/<?= $item['pic_stud3'];?>" class="img-fluid w-100 h-100" alt="Image 4">
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">/<?php $stud_id=$item['user_id'];
                     $items="SELECT * FROM users WHERE id ='$stud_id'";
                     $items_run=mysqli_query($con,$items);
                     if(mysqli_num_rows($items_run)>0)
                     {
                        foreach($items_run as $item_q) {

                        echo $item_q['Fname'];  
                     }}
                    
                    
                    ?></h5>
                    <p class="card-text"><?= $item['narative_report'];?></p>
                </div>
            </div>
            
            <!-- Add more card elements with four images in one row each -->
        </div>
    </div>
</div>
<?php } }?>
        </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <?php include ("../include/supervisor/footer.php");