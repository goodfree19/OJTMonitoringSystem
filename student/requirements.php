<?php include("../include/header.php");?>
<?php include("../include/authentication.php")?>
<?php include('../config/db_conn.php'); ?>
<?php include("../include/navbar_student.php");?>


   
       
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
        <div class="container">
            <div class="section-body mt-3">
                <div class="container-fluid">
                    <div class="fs-2 fw-bold pb-3"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-newspaper me-3" viewBox="0 0 16 16">
  <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5z"/>
  <path d="M2 3h10v2H2zm0 3h4v3H2zm0 4h4v1H2zm0 2h4v1H2zm5-6h2v1H7zm3 0h2v1h-2zM7 8h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2z"/>
</svg>Requirements</div>
                </div>
            </div>
            <div class="section-body">
                <div class="container-fluid P-5">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="list" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="card">
                              <form onsubmit="return validateForm()" action="submit_code.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h2 class="card-title ">TRANSMITTAL LETTER</h2>
                                 
                                    <div class="mb-3">

                                        <label for="formFile" class="form-label"> PDF File</label>
                                        <input type="hidden" name="type_file" value="TRANSMITTAL LETTER"> 
                                        <input type="hidden" name="user_id" value="<?= $_SESSION['auth_user']['user_id'];?>">
                                       
                                      
                                   <?php
                                   //check if the file is existed
                                   $id = "TRANSMITTAL LETTER";
                                   $items = "SELECT * FROM paper_requirments WHERE type_file='$id'";
                                   $items_run = mysqli_query($con, $items);
                                   
                                   if (mysqli_num_rows($items_run) > 0) {
                                   ?> <div class="alert text-center alert-success" role="alert">Submitted</div>

                                   </div>
                                   <div class="text-center">
                                              <a href="view_requirements.php?papername=TRANSMITTAL LETTER" name="view_paper" class="ms-2 btn btn-success">View</a>
                                       <button type="submit" name="btn_delete_papers" class="ms-2 btn btn-danger" onclick="confirmDelete()">Clear</button>
                                   </div>
                                      
                                   <?php
                                   } else {
                                   ?>  <input required class="form-control" type="file"accept=".pdf" name="papers_1" id="formFile">
                                   </div>
                                   <div class= "text-center">
                                       <button type="submit" name="btn_papers1" class="btn btn-primary">Upload Paper</button>
                                    </div>
                                   <?php
                                   }
                                   ?>
                                </div>
                                </form>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                <form action="submit_code.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h2 class="card-title">ADDITIONAL   LETTER</h2>
                                 
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label"> PDF File</label>
                                        <input type="hidden" name="type_file" value="LETTER"> 
                                        <input type="hidden" name="user_id" value="<?= $_SESSION['auth_user']['user_id'];?>">
                                        
                                        <?php
                                          //check if the file is existed
                                   $id = "LETTER";
                                   $items = "SELECT * FROM paper_requirments WHERE type_file='$id'";
                                   $items_run = mysqli_query($con, $items);
                                   
                                   if (mysqli_num_rows($items_run) > 0) {
                                   ?><div class="alert text-center alert-success" role="alert">Submitted</div>

                                   </div>
                                   <div class="text-center">
                                              <a href="view_requirements.php?papername=LETTER" name="view_paper" class="ms-2 btn btn-success">View</a>
                                       <button type="submit" name="btn_delete_papers" class="ms-2 btn btn-danger" onclick="confirmDelete()">Clear</button>
                                   </div>
                                     
                                   <?php
                                   } else {
                                   ?><input required class="form-control" type="file" accept=".pdf" name="papers_1" id="formFile">
                                   </div>
                                   <div class= "text-center">
                                       <button type="submit" name="btn_papers1" class="btn btn-primary">Upload Paper</button>
                                    </div>
                                   <?php
                                   }
                                   ?>
                                        
                                </div>
                                </form>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                <form action="submit_code.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h2 class="card-title">ENDORSEMENT LETTER</h2>
                                 
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label"> PDF File</label>
                                        <input type="hidden" name="type_file" value="ENDORSEMENT LETTER"> 
                                        <input type="hidden" name="user_id" value="<?= $_SESSION['auth_user']['user_id'];?>">
                                        
                                        <?php
                                          //check if the file is existed
                                   $id = "ENDORSEMENT LETTER";
                                   $items = "SELECT * FROM paper_requirments WHERE type_file='$id'";
                                   $items_run = mysqli_query($con, $items);
                                   
                                   if (mysqli_num_rows($items_run) > 0) {
                                   ?><div class="alert text-center alert-success" role="alert">Submitted</div>

                                   </div>
                                   
  
                                            <div class="text-center">
                                                          <a href="view_requirements.php?papername=ENDORSEMENT LETTER" name="view_paper" class="ms-2 btn btn-success">View</a>
                                              <button type="submit" name="btn_delete_papers" class="ms-2 btn btn-danger" onclick="confirmDelete()">Clear</button>
                                            </div>                                
                                   <?php
                                   } else {
                                   ?><input required class="form-control" type="file" accept=".pdf" name="papers_1" id="formFile">
                                   </div>
                                   <div class= "text-center">
                                       <button type="submit" name="btn_papers1" class="btn btn-primary">Upload Paper</button>
                                   </div>
                                   <?php
                                   }
                                   ?>
                                        
                                </div>
                                </form>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                <form action="submit_code.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h2 class="card-title">BIO DATA </h2>
                                 
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label"> PDF File</label>
                                        <input type="hidden" name="type_file" value="BIO DATA"> 
                                        <input type="hidden" name="user_id" value="<?= $_SESSION['auth_user']['user_id'];?>">  
                                        
                                        <?php
                                          //check if the file is existed
                                   $id = "BIO DATA";
                                   $items = "SELECT * FROM paper_requirments WHERE type_file='$id'";
                                   $items_run = mysqli_query($con, $items);
                                   
                                   if (mysqli_num_rows($items_run) > 0) {
                                   ?>
                                      <div class="alert text-center alert-success" role="alert">Submitted</div>

                                   </div>
                                   <div class="text-center">

                                   </div>
                                      <div class="text-center">

                                              <a href="view_requirements.php?papername=BIO DATA" name="view_paper" class="ms-2 btn btn-success">View</a>
                                      <button type="submit" name="btn_delete_papers" class="ms-2 btn btn-danger" onclick="confirmDelete()">Clear</button>
                                      </div>
                                   <?php
                                   } else {
                                   ?>
                                   <input required class="form-control" type="file" accept=".pdf" name="papers_1" id="formFile">
                                   </div>
                                   <div class= "text-center">
                                       <button type="submit" name="btn_papers1" class="btn btn-primary">Upload Paper</button>
                                   </div>
                                   <?php
                                   }
                                   ?>
                                        
                                </div>
                                </form>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="card">
                                <form action="submit_code.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h2 class="card-title">MEMORANDUM OF AGREEMENT </h2>
                                 
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label"> PDF File</label>
                                        <input type="hidden" name="type_file" value="MEMORANDUM OF AGREEMENT"> 
                                        <input type="hidden" name="user_id" value="<?= $_SESSION['auth_user']['user_id'];?>">  
                                     
                                        <?php
                                   $id = "MEMORANDUM OF AGREEMENT";
                                   $items = "SELECT * FROM paper_requirments WHERE type_file='$id'";
                                   $items_run = mysqli_query($con, $items);
                                   
                                   if (mysqli_num_rows($items_run) > 0) {
                                   ?><div class="alert text-center alert-success" role="alert">Submitted</div>
                                                           
                                   </div>
                                   <div class="text-center">

                                   </div>
                                   <div class="text-center">
                                                  <a href="view_requirements.php?papername=MEMORANDUM OF AGREEMENT" name="view_paper" class="ms-2 btn btn-success">View</a>
                                       <button type="submit" name="btn_delete_papers" class="ms-2 btn btn-danger" confirmDelete() >Clear</button>  
                                       </div>   
                                   <?php
                                   } else {
                                   ?><input required class="form-control" type="file" accept=".pdf" name="papers_1" id="formFile">
                                   </div>
                                   <div class= "text-center">
                                       <button type="submit" name="btn_papers1" class="btn btn-primary">Upload Paper</button>
                                   </div>
                                   <?php
                                   }
                                   ?>
                                        
                                </div>
                                </form>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                <form action="submit_code.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h2 class="card-title">WAVER </h2>
                                 
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label"> PDF File</label>
                                        <input type="hidden" name="type_file" value="WAVER"> 
                                        <input type="hidden" name="user_id" value="<?= $_SESSION['auth_user']['user_id'];?>">  
                                       
                                              <?php
                                   $id = "WAVER";
                                   $items = "SELECT * FROM paper_requirments WHERE type_file='$id'";
                                   $items_run = mysqli_query($con, $items);
                                   
                                   if (mysqli_num_rows($items_run) > 0) {
                                   ?>
                                    <div class="alert text-center alert-success" role="alert">Submitted</div>

                                        </div>
                                        <div class="text-center">
                                                  <a href="view_requirements.php?papername=WAVER" name="view_paper" class="ms-2 btn btn-success">View</a>
                                       <button type="submit" name="btn_delete_papers" class="ms-2 btn btn-danger" confirmDelete() >Clear</button>  
                                       </div>                        <?php
                                   } else {
                                   ?>
                                 <input required class="form-control" type="file"accept=".pdf" name="papers_1" id="formFile">
                                    </div>
                                        <div class= "text-center">
                                       <button type="submit" name="btn_papers1" class="btn btn-primary">Upload Paper</button>
                                   </div>
                                   <?php
                                   }
                                   ?>

                                </div>
                                </form>
                                </div>
                            </div>
                      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
  

    <script>
    function confirmDelete() {
        if (confirm("Are you sure you want to delete this item?")) {
            // If the user confirms, submit the form to perform the deletion
            document.getElementById("yourFormId").submit(); // Replace "yourFormId" with the actual form ID
        }
    }
</script>
<?php include ("../include/footer.php");?>