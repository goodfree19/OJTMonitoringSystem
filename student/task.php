<?php include("../include/header.php");?>
<?php include("../include/authentication.php")?>
<div id="main_content"> 
<?php include("../include/navbar.php")?>
 <div class="page">
<?php include("../include/navbar_top_page.php")?>
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
                                                                        class="fa fa-pen m-r-5"></i> Comply</a>
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
        <div id="edit_task" class="modal fade delete-modal animated rubberBand" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title"><i></i>Comply Tasks</h3>
                                        </div>
                                        <form class="card-body">
                                            <div class="row clearfix">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Upload File</label>
                                                        <input type="file" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary">Upload</button>
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

<?php include("../include/footer.php");?>