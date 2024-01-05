<?php include('../include/header.php'); ?>
<?php include("../include/authentication.php")?>
<?php include('../include/sidebar_admin.php'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
                                <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <div class="page">
            <div id="page_top" class="section-body top_dark">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="left">
                            <h1 class="page-title"><i class="fa fa-envelope"></i> New Announcement</h1>
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
                                                class="fa fa-power-off"></i> Sign out</a>
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
                                                    href="message.php"><i class="fa fa-list-ul"> </i> Messages</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link active"  href="#addnew"><i
                                                        class="fa fa-plus"></i> Add New Announcement</a></li>
                                        </ul>
                                    </div>
                                    <div class="row">
                                       <h3> Add New Annoucement</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-body">
               <div class="container ">
               <div class="mb-3">

  <label for="endDate">Current Date </label>
        <input required class="form-control" type="date" name="date_end" id="endDate" disabled placeholder="Select end date">
    </div>

<div class="mb-3">
<input id="editor" name="announcement"> 
<div class="text-center m-3 " >
    <button class="btn btn-success p-2 rounded-pill"> Send Annoucement</button>
    </div>
               </div>
            </div>
        </div>
       
    </div>

    <script src="../assets/bundles/lib.vendor.bundle.js"></script>

    <script src="../assets/plugins/dropify/js/dropify.min.js"></script>

    <script src="../assets/js/core.js"></script>
    <script src="../assets/js/form/dropify.js"></script>
    <script>
    flatpickr('#startDate');
    flatpickr('#endDate');
        // Get the current date in the format YYYY-MM-DD
    const currentDate = new Date().toISOString().split('T')[0];

// Set the value of the input field to the current date
document.getElementById('endDate').value = currentDate;

// Set the minimum attribute of the date input to the current date
document.getElementById('endDate').min = currentDate;
</script>
<script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
   
</body>

<!-- soccer/project/project-clients.html  07 Jan 2020 03:41:29 GMT -->

</html>