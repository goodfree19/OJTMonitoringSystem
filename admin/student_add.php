<?php include('../include/header.php'); ?>
<?php include("../include/authentication.php")?>
<?php include('../include/sidebar_admin.php'); ?>

<div class="page">
            <div id="page_top" class="section-body top_dark">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="left">
                            <h1 class="page-title"><i class="fa fa-user"></i> Students</h1>
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
                                        
                                        <a class="dropdown-item" href="../index.html"><i
                                                class="fa fa-power-off"></i> Log out</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-body mt-3">
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-md-flex justify-content-between mb-2">
                                        <ul class="nav nav-tabs b-none">
                                            <li class="nav-item"><a class="nav-link " 
                                                    href="student.php"><i class="fa fa-list-ul"> </i> Student List</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link active"  href=""><i
                                                        class="fa fa-plus"></i> Add New Student</a></li>
                                        </ul>
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
            <div class="section-body">
                <div class="container-fluid">
                    <div class="tab-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title"><i></i>Add Student</h3>
                                        </div>
                                        <form action="add_code.php" method="POST" class="card-body">
                                        
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                <label for="inputEmail4">ID Student ID</label>
                                                <input type=text" name="ID_student" class="form-control" id="inputEmail4" placeholder="ID Number">
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label for="inputPassword4">Password</label>
                                                <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress">First Name</label>
                                                <input type="text" name="fname" class="form-control" id="inputAddress" placeholder="First name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress2">Last Name</label>
                                                <input type="text" name="lname" class="form-control" id="inputAddress2" placeholder="Last Name">
                                            </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                <label for="inputCity">Address</label>
                                                <input type="text" name="address" class="form-control" id="Input Address">
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label for="inputState">Organization</label>
                                                <select id="inputState" name="organization" class="form-control">
                                                    <option selected>Choose...</option>
                                                    <option>...</option>
                                                </select>
                                                </div>
                                              
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                                <label class="form-check-label" for="gridCheck">
                                                    Check me out
                                                </label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Sign in</button>
                                           
                                        </form>
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

<!-- soccer/project/project-clients.html  07 Jan 2020 03:41:29 GMT -->

</html>

         
     
      
    

