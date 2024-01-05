<?php include('../include/header.php'); ?>
<?php include("../include/authentication.php")?>
<?php include('../include/sidebar_admin.php'); ?>
<button class="btn btn-primary m-3" onclick="goBack()">Go Back</button>

<script>
    function goBack() {
        window.history.back();
    }
</script>

<div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><i></i>Update Student</h3>
                                </div>
                                <form class="card-body">
                                    <div class="row clearfix">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>School ID Number</label>
                                                <input type="number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-12">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Course</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Contact</label>
                                                <input type="number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <button type="submit" class="btn btn-outline-secondary">Cancel</button>
                                        </div>
                                    </div>
                                </form>
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