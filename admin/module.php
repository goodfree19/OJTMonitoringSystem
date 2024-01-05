<?php include('../include/header.php'); ?>
<?php include('../config/db_conn.php'); ?>
<?php include('../include/sidebar_admin.php'); ?>
<?php include("../include/authentication.php")?>
<?php include('../config/db_conn.php'); ?>

        <div class="page">
            <div id="page_top" class="section-body top_dark">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="left">
                            <h1 class="page-title"><i class="fa fa-book"></i> Daily Time Record</h1>
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
            <div class="section-body mt-3">
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-md-flex justify-content-between mb-2">
                                        <ul class="nav nav-tabs b-none">
                                            <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                                    href="#list"><i class="fa fa-list-ul me-3"> </i>Daily Time Record</a>
                                            </li>
                                          
                                        </ul>
                                    </div>
                                    <div class="row">
                                     
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
   
            <div class="section-body bg-white ">
                <div class="container-fluid">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="list" role="tabpanel">
                            <div class="row clearfix">
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="card">
                                        <table id="myTable" class="table app-table-hover mb-0 text-left">
                                            <thead class="text-center">
                                                <tr>
                                                    <th class="cell">Supervisor</th>
                                                    <th class="cell">Date</th>
                                                    <th class="cell">Notes</th>
                                                 
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                       
                                                    <?php
                                                      
                                                      $items="SELECT * FROM suoervisor_dtr ";
                                                      $items_run=mysqli_query($con,$items);
                                                      if(mysqli_num_rows($items_run)>0)
                      
                                                      {
                                                           foreach($items_run as $item) {   ?>
                                                           
                                                    <td><?php $id=$item['suoervisor_id']?>
                                                         <?php
                                                          $items="SELECT * FROM company_name WHERE id='$id' ";
                                                          $items_run=mysqli_query($con,$items);
                                                          if(mysqli_num_rows($items_run)>0)
                          
                                                          {
                                                               foreach($items_run as $item1) {

                                                                echo $item1['supervisor_name'];
                                                               }
                                                            }
                                                         ?>   
                                                </td>
                                                    <td><?=$item['date_start'].' to '.$item['date_end'] ?></td>
                                                    <td><?=$item['notes']?></td>
                                                
                                                    <td class="text-right">
                                                    <a href="DTR.php?id=<?=$item['id']?>" class="btn btn-success">View DTR</a>  
                                                    </td>
                                                </tr>
                                                           <?php }}else{?>
                                                <tr class="text-center">
                                                    <td class="text-center fs-2">No Record Found...</td>
                                                   
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
        </div>
        <div id="delete_student" class="modal fade delete-modal animated rubberBand" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img src="../assets/images/sent.png" alt="" width="50" height="46">
                        <h3>Are you sure want to delete this Student?</h3>
                        <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="edit_student" class="modal fade delete-modal animated rubberBand" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><i></i>Update Trainee</h3>
                                </div>
                                <form class="card-body">
                                    <div class="row clearfix">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>School Year</label>
                                                <input type="number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label>Student</label>
                                            <select class="form-control show-tick">
                                                <option value="">-- Students --</option>
                                                <option value="10">John Doe</option>
                                                <option value="20">James Bond</option>
                                                <option value="20">Juan Dela Cruz</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label>Coordinator</label>
                                            <select class="form-control show-tick">
                                                <option value="">-- Coordinator --</option>
                                                <option value="10">Coordinator 1</option>
                                                <option value="20">Coordinator 2</option>
                                                <option value="20">Coordinator 3</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label>Organization</label>
                                            <select class="form-control show-tick">
                                                <option value="">-- Organization --</option>
                                                <option value="10">Organization 1</option>
                                                <option value="20">Organization 2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 20px;">
                                        <button type="submit" class="btn btn-primary">Update</button>
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

    <script src="../assets/bundles/lib.vendor.bundle.js"></script>

    <script src="../assets/plugins/dropify/js/dropify.min.js"></script>

    <script src="../assets/js/core.js"></script>
    <script src="../assets/js/form/dropify.js"></script>
</body>

<!-- soccer/project/project-clients.html  07 Jan 2020 03:41:29 GMT -->

</html>