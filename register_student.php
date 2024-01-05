

<?php include("include/header.php");?>
<?php include("include/navbar_login.php");
include('config/db_conn.php'); ?>

<?php include('include/message.php');?>
<div class="container">
<div class="section-body">
                <div class="container-fluid pt-5">
                    <div class="tab-content">
                    
                                    <div class="card ">
                                        <div class="card-header">
                                            <h3 class="card-title"><i></i>Student Registration</h3>
                                        </div>
                                        <form action="register_code_student.php" method="POST" enctype="multipart/form-data" class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 p-1">
                                                <label for="inputAddress">First Name</label>
                                                <input required type="text" name="Fname" class="form-control" id="inputAddress" placeholder="First name">
                                            </div>
                                            <div class="form-group col-md-6 p-1">
                                                <label for="inputAddress2">Last Name</label>
                                                <input required type="text" name="Lname" class="form-control" id="inputAddress2" placeholder="Last Name">
                                            </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 p-1">
                                                <label for="inputEmail4">ID Student ID</label>
                                                <input required type="text" name="ID_student" class="form-control" id="inputEmail4" placeholder="ex. 2020-0925">
                                                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function() {
    // Add an input event listener to the ID_student input field
    $('input[name="ID_student"]').on('input', function() {
        // Remove any non-numeric or non-dash characters
        $(this).val(function(index, value) {
            return value.replace(/[^0-9\-]/g, '');
        });
    });
});
</script>


                                                </div>
                                                <div class="form-group col-md-6 p-1">
                                                <label for="inputEmail4">Email</label>
                                                <input required type="text" name="email" class="form-control" id="inputEmail4" placeholder="Email Address">
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 p-1">
                                                <label for="inputEmail4">Contact Number</label>
                                                <input required type="text" name="phone_number" class="form-control" id="inputEmail4" placeholder="Contact Number">
                                                </div>
                                                <div class="form-group col-md-6 p-1">
                                                <label for="inputEmail4">Address</label>
                                                <input required type="text" name="address" class="form-control" id="inputEmail4" placeholder="Address">
                                                </div>
                                            </div>
                                           <div class="row">
                                           <div class="form-group col-md-6 p-1">
                                                <label for="inputPassword4">Password</label>
                                                <input required type="password" name="password" class="form-control" id="inputPassword4" placeholder=" Password">
                                               
                                                </div>
                                                <div class="form-group col-md-6 p-1">
                                                <label for="inputState">Training Site</label>
                                               

                                                    <div class="input-group">
                                                        <?php 
                                                        $value = "SELECT * FROM company_name";
                                                        $value_run = mysqli_query($con, $value);
                                                        if (mysqli_num_rows($value_run) > 0) { ?>
                                                            <select id="inputState" name="selected_company" class="form-control " require>
                                                            <option selected disabled >--Select Training Site--</option>
                                                               
                                                                <?php 
                                                                foreach ($value_run as $value) { 
                                                                    $company = $value['id'];
                                                                    $company_name = $value['company_name'];

                                                                    ?>
                                                                    <option value="<?php echo $company;?>" ><?php echo $company_name; ?></option>
                                                                <?php 
                                                                } 
                                                                ?>
                                                            </select>
                                                        <?php 
                                                        } else{ ?>
                                                            <select id="inputState" name="selected_company" class="form-control" require>
                                                            <option selected  disabled >--Select Training Site--</option>
                                                             
                                                                </select>
                                                     <?php   }
                                                        ?>
                                                    </div>
                                            </div>
                          
                                                
                                           </div>
                                            <div class="row">
                                            <div class="form-group col-md-6 p-1">
                                                <label for="inputPassword4">Confirm Password</label>
                                                <input required type="password" name="cpassword" class="form-control" id="inputPassword4" placeholder=" Confirm Password">
                                                </div>
                                                
                                                <div class="form-group col-md-6 p-1">
                                                
                                             
                                                    <label for="inputPassword4">Insert Student ID</label>
                                                <input required type="file" class="form-control" name="image_id_stud" id="inputGroupFile01">
                                         
                                              
                                                </div>
                                            </div>
                                       <div class="text-center">
                                       <button type="submit" name="register_student"class="btn btn-warning mt-3 fs-3"> Register </button>
                                       </div>
                                           
                                           
                                        </form>
                                    
                              
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

<!-- soccer/project/project-clients.html  07 Jan 2020 03:41:29 GMT -->

</html>

</div>