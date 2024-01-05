<?php include("../include/supervisor/header_super_visor.php");?>
<?php include("../include/supervisor/sibebar_supervisor.php");?>
<?php include("../include/authentication.php");
include('../config/db_conn.php');?>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                                <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <div class="page">
            <div id="page_top" class="section-body top_dark">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="left">
                            <h1 class="page-title"><i class="fa fa-tasks"></i> Edit DTR</h1>
                        </div>
                        <form action="../allcode.php" method="POST">
        <div class="d-flex flex-row-reverse text-dark ">
            <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-2"
                data-toggle="dropdown"><i class="fa fa-user  "></i> <?= $_SESSION['auth_user']['user_name']; ?> </a>
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

<?php  
                                                $id=$_GET['id'];;
                                                $items="SELECT * FROM suoervisor_dtr  WHERE  id='$id' ";
                                                $items_run=mysqli_query($con,$items);
                                                if(mysqli_num_rows($items_run)>0)
                
                                                {
                                                     foreach($items_run as $item) {   ?>
            <div class="section-body rounded bg-dark m-2 ">
                <div class="container-fluid   ">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card m-3">
                                <div class="card-body rounded ">
                                <div class="container px-4 text-center  p-3">
                                <form action="code.php" method="POST" enctype="multipart/form-data">
                           
                        
                                        <div class="row gx-5">
                                            <div class="col">
                                                <div class="p-1">
                                                    
                                                    <div class="fs-6">Start Date</div>
                                                    <input required class="form-control" type="date" name="date_start" id="startDate" placeholder="Select end date" value="<?php echo $item['date_start']; ?>">

                                                    <input hidden class="form-control" type="text" value="<?=$_GET['id'];?>" name="id" id="formFile">
                                                </div>
                                            </div>
                                            <div class="col">
                                            <div class="fs-6">End Date</div>
                                                            <input required class="form-control" type="date" name="date_end" id="endDate" placeholder="Select end date" value="<?php echo $item['date_end']; ?>" data-flatpickr="{'mode': 'week', 'dateFormat': 'Y-m-d', 'enable': ['Mon', 'Tue', 'Wed', 'Thu', 'Fri']}">

                                            
                                            </div>
                                        </div>

                                        <script>
                                        flatpickr('#startDate');
                                        flatpickr('#endDate');
                                    </script>
                                    

                                        <!-- Notes Section -->
                                        <div class="p-1 mt-3">
                                            <div class="fs-6">Notes</div>
                                            <!-- You can use another textarea for users to input general notes -->
                                            <textarea class="form-control" name="comment" rows="5" placeholder="Enter any additional notes"><?=$item['notes'];?></textarea>
                                        </div>

                                        <!-- Image Section -->
                                        <div class="p-1 mt-3">
                                            <div class="fs-5">change Image</div>
                                        <!-- Allow users to upload only images -->
                                        <input  class="form-control" type="file" name="dtr_file" accept="image/*" single >
                                        </div>

                                        <div class="text-center mt-3">

                                            <button  type="submit" name="btn_DTR_edit" class="btn btn-success fs-6">Edit</button>
                                        </div>
                                    </form>

                                </div>
                           </div>
                    </div>
                </div>
            </div>
         
        </div>
        <?php } }?>
   
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/bundles/lib.vendor.bundle.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    // Get the clickable image
    const clickableImage = document.querySelector('.clickable-image');

    // Get the modal and modal image
    const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
    const modalImage = document.getElementById('modalImage');

    // Add click event listener to the clickable image
    clickableImage.addEventListener('click', function () {
        // Set the source of the modal image to the clicked image source
        modalImage.src = this.src;

        // Show the modal
        imageModal.show();
    });
});

    </script>
    

    <script src="../assets/plugins/dropify/js/dropify.min.js"></script>

    <script src="../assets/js/core.js"></script>
    <script src="../assets/js/form/dropify.js"></script>
</body>

</html>