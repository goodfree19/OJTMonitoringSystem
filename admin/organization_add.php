<?php include('../include/header.php'); ?>
<?php include("../include/authentication.php")?>
<?php include('../include/sidebar_admin.php'); ?>

<div class="page">

<div id="page_top" class="section-body top_dark">
                            <div class="container-fluid">
                                <div class="page-header">
                                    <div class="left">
                                        <h1 class="page-title"><i class="fa fa-building text-success"></i> Organization</h1>
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
                                                            class="fa fa-power-off"></i> Log out</a>
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
            <div class="section-body mt-3">
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-md-flex justify-content-between mb-2">
                                        <ul class="nav nav-tabs b-none">
                                            <li class="nav-item"><a class="nav-link " 
                                                    href="organization.php"><i class="fa fa-list-ul"> </i> Organizations List</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link active"  href=""><i
                                                        class="fa fa-plus"></i> Add Organization</a></li>
                                        </ul>
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
                       
                    <div class="col-sm-12 " >
                            <div class="row">
                                <div class="">
                                     
                                    <div class="card ">
                                    <div class="card-header">
                                            <h3 class="card-title"><i></i>Add Organization</h3>
                                        </div>
                                        <form class="card-body" >
                                            <div class="row clearfix">
                                                <div class="col-md-4 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Organization Name</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Contact Person</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Contact Number</label>
                                                        <input type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Company Background</label>
                                                        <textarea rows="4" class="form-control no-resize"
                                                            placeholder="Please input company background..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" style="margin-top: 20px;">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <button type="submit" class="btn btn-outline-secondary">Cancel</button>
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
      
   
           
        
    </div>

    <script src="../assets/bundles/lib.vendor.bundle.js"></script>

    <script src="../assets/plugins/dropify/js/dropify.min.js"></script>

    <script src="../assets/js/core.js"></script>
    <script src="../assets/js/form/dropify.js"></script>
</body>

<!-- soccer/project/project-clients.html  07 Jan 2020 03:41:29 GMT -->

</html>

         
     
      
    
