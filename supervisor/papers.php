<?php include("../include/supervisor/header_super_visor.php");?>
<?php include("../include/supervisor/sibebar_supervisor.php");?>
<?php include("../include/authentication.php")?>
        <div class="page">
            <div id="page_top" class="section-body top_dark">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="left">
                            <h1 class="page-title"><i class="fa fa-tasks"></i> Tasks</h1>
                        </div>
                        <form action="../allcode.php" method="POST">
        <div class="d-flex flex-row-reverse text-dark ">
            <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-2"
                data-toggle="dropdown"><i class="fa fa-user  "></i> <?= $_SESSION['auth_user']['user_name']; ?> </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                <a class="dropdown-item" href=""><i
                        class="fa fa-user"></i> Profile</a>
                <a class="dropdown-item" href="#"><i
                        class="fa fa-cog"></i> Settings</a>
                <div class="dropdown-divider"></div>
            <button type="submit" name="logout_btn" class="dropdown-item"><i
                        class="fa fa-power-off"></i> Sign out</button>
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
                                                    href="#list"><i class="fa fa-list-ul"> </i> Tasks List</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#addnew"><i
                                                        class="fa fa-plus"></i> Add New</a></li>
                                        </ul>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <div class="input-group mb-1">
                                                <input type="text" class="form-control" placeholder="Search tasks">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <a href="javascript:void(0);" class="btn btn-primary btn-block mb-1"
                                                title="">Search</a>
                                        </div>
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
                        <div class="tab-pane fade show active" id="list" role="tabpanel">
                            <div class="row clearfix">
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="card">
                                        <table id="myTable" class="table app-table-hover mb-0 text-left">
                                            <thead>
                                                <tr>
                                                    <th class="cell">Task Code</th>
                                                    <th class="cell">Task Name</th>
                                                    <th class="cell">Description</th>
                                                    <th class="cell">Deadline</th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>123-456</td>
                                                    <td>Task 1</td>
                                                    <td>Description 1</td>
                                                    <td class="text-danger">05-30-2021</td>
                                                    <td class="text-right">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle"
                                                                data-toggle="dropdown" aria-expanded="false"><i
                                                                    class="fa fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                                    data-target="#edit_task"><i
                                                                        class="fa fa-pen m-r-5"></i> Edit</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                                    data-target="#delete_task"><i
                                                                        class="fa fa-trash m-r-5"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="addnew" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title"><i></i>Add Tasks</h3>
                                        </div>
                                        <form class="card-body">
                                            <div class="row clearfix">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Task Code</label>
                                                        <input type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Task Name</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Deadline</label>
                                                        <input type="date" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    <button type="submit"
                                                        class="btn btn-outline-secondary">Cancel</button>
                                                </div>
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
        <div id="delete_task" class="modal fade delete-modal animated rubberBand" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img src="../assets/images/sent.png" alt="" width="50" height="46">
                        <h3>Are you sure want to delete this tasks?</h3>
                        <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="edit_task" class="modal fade delete-modal animated rubberBand" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title"><i></i>Update Tasks</h3>
                                        </div>
                                        <form class="card-body">
                                            <div class="row clearfix">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Task Code</label>
                                                        <input type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Task Name</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Deadline</label>
                                                        <input type="date" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                    <button type="submit"
                                                        class="btn btn-outline-secondary">Cancel</button>
                                                </div>
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

</html>