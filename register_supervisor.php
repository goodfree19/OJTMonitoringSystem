

<?php include("include/header.php"); ?>
<?php include("include/navbar_login.php");?>

<?php include('include/message.php');?>
<div class="container">
<div class="section-body">
                <div class="container-fluid pt-5">
                    <div class="tab-content">
                       
                                    <div class="card ">
                                        <div class="card-header">
                                            <h3 class="card-title"><i></i>Supervisor Registration</h3>
                                        </div>
                                        <form action="register_supervisor_code.php" method="POST" enctype="multipart/form-data" class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 p-1">
                                                <label for="inputAddress">First Name</label>
                                                <input required type="text" name="Fname" class="form-control" id="inputAddress" placeholder="First Name">
                                            </div>
                                            <div class="form-group col-md-6 p-1">
                                                <label for="inputAddress2">Last Name</label>
                                                <input required type="text" name="Lname" class="form-control" id="inputAddress2" placeholder="Last Name">
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="form-group col-md-6 p-1">
                                                <label for="inputState">Company / Organization / Institution </label>
                                                <input required type="text" name="company_name" class="form-control" id="inputEmail4" placeholder="Company / Organization / Institution Name">
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
                                                <label for="inputPassword4">Insert Business Permit <small>(leave blank if not  applicable)</small> </label>
                                                <input type="file" class="form-control" name="business_permit" id="inputGroupFile01">
                                                </div>
                                           <div class="form-group col-md-6 p-1">
                                                <label for="inputPassword4">Password</label>
                                                <input required type="password" name="password1" class="form-control" id="inputPassword4" placeholder=" Password">
                                               
                                                </div>
                                                                               
                                           </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 p-1">
                                                <label for="inputPassword4">Insert Valid ID</label>
                                                <input required type="file" class="form-control" name="valid_id" id="inputGroupFile01">
                                                </div>
                                                
                                                <div class="form-group col-md-6 p-1">
                                                <label for="inputPassword4">Confirm Password</label>
                                                <input required type="password" name="cpassword1" class="form-control" id="inputPassword4" placeholder=" Confirm Password">
                                                </div>
                                            </div>
                                       <div class="text-center">
                                            <button type="submit" name="btn_supervisor12"class="btn btn-success mt-3 fs-3"> Register </button>
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