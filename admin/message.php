<?php include('../include/header.php'); ?>
<?php include("../include/authentication.php")?>
<?php include('../include/sidebar_admin.php'); ?>
<?php include('../config/db_conn.php'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<style>
.message-container {
    width: 80%;
    margin: 10px 0;
}
.message-textarea {
    width: 80%;
    height: 80px;
    padding: 8px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
    font-family: Arial, sans-serif;
}
</style>
        <div class="page">
            <div id="page_top" class="section-body top_dark">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="left">
                            <h1 class="page-title"><i class="fa fa-envelope"></i> Create Announcement</h1>
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
<style>
   
.gbbark{
background-color: rgb(171,233,174);

}

</style>
            <div class="section-body mt-3">
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h1>Announcement</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php include('../include/message.php');?>
        <form action="code.php" method="POST">
            <div class="section-body bg-white mt-3 ">
                <div class="container-fluid ">
                <div class="container border rounded mt-4 gbbark ">
                    <div class="container border rounded mt-3 bg-white mb-4">
                    <div class="mb-3">
                <label for="endDate" class="fs-3">Current Date </label>
                        <input required class="form-control" type="date" name="date" id="endDate"  placeholder="Select end date">
                        <input hidden class="form-control" type="select"  placeholder="Select end date">
                </div>
                <div class="mb-3">
                <textarea style= "resize: none;" required class="form-control" name="announcement" id="exampleFormControlTextarea1" rows="10"></textarea>
                <div class="text-center m-3 " >
                    <button type="submit" class="btn btn-success p-2 rounded-pill" name="announcement_btn" style="width: 200px;">Send Announcement</button>
                </div>
                </form>
                </div>
                    </div>
                  
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="list" role="tabpanel">
                        <div class="row">
                                  
                            
                            <div class="row clearfix">
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="card">
                                        <table id="myTable" class="table app-table-hover mb-0 text-left">
                                            <thead class="text-center">
                                                <tr>
                                                    <th class="cell">Announcements</th>
                                                    <th class="cell">Date</th>
                                                                         
                                                    <th class="text-right">Action</th>
                                                </tr>
                                            </thead>
                                            <?php 
                            $query = "SELECT * FROM announcement ";
                            $result2 = mysqli_query($con, $query);
                            if(mysqli_num_rows($result2) > 0)
                            {
                                while($row = mysqli_fetch_array($result2))
                                                    {
                                 
                                     ?>
                                            <tbody class="">  
                                                <tr>
                                                <td class="message-container">
                                                        
                                                    </td>
                                                    <td class="text-center"><?= date('F j, Y', strtotime($row['date'])); ?></td>
                                        

                                                
                                                   
                                                    <td class="text-right">
                                                        
                                                    <form action="code.php" method="POST" onsubmit="return confirmDelete()">
                                                        <?php $announcement_id = $row['id']; ?>
                                                        
                                                        <input type="text" name="id" hidden value="<?= $announcement_id ?>">
                                                        
                                                        <button type="submit" class="btn-danger rounded" name="delete_annoucement">
                                                            <i class="fa fa-trash m-r-5"></i> Delete
                                                        </button>
                                                    </form>

                                                    <script>
                                                        function confirmDelete() {
                                                            // Display a confirmation dialog
                                                            var confirmDelete = confirm("Are you sure you want to delete this announcement?");

                                                            // If the user clicks "OK", the form will be submitted; otherwise, it won't
                                                            return confirmDelete;
                                                        }
                                                    </script>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <?php }} else{ ?>
                                                <tbody class="">  
                                                <tr>
                                                    <td>  <h3>No Data Found....</h3></td>
                                            
                                                </tr>
                                            </tbody>

                                            <?php  }?>

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

    <script src="../assets/bundles/lib.vendor.bundle.js"></script>

    <script src="../assets/plugins/dropify/js/dropify.min.js"></script>

    <script src="../assets/js/core.js"></script>
    <script src="../assets/js/form/dropify.js">
        
</script>
<script>
        // Get the current date
    var currentDate = new Date();

// Format the date as YYYY-MM-DD (which is the format the date input expects)
var formattedDate = currentDate.toISOString().split('T')[0];

// Set the value of the date input to the current date
document.getElementById('endDate').value = formattedDate;

    </script>
</body>
<!-- soccer/project/project-clients.html  07 Jan 2020 03:41:29 GMT -->

</html>