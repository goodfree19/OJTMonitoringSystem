<?php include('../include/header.php'); ?>
<?php include('../config/db_conn.php'); ?>

<?php include("../include/authentication.php")?>
<?php include('../include/sidebar_admin.php');  if (isset($_POST['search_btn'])) {
    $search_query = mysqli_real_escape_string($con, $_POST['search_query']);
    $items = "SELECT * FROM users WHERE supervisor_name LIKE '%$search_query%' OR company_name LIKE '%$search_query%'  ";
} else {
    $items = "SELECT * FROM users WHERE archive=1";
}

$items_run = mysqli_query($con, $items);
 ?>
                     <div class="page">
                        <div id="page_top" class="section-body top_dark">
                            <div class="container-fluid">
                                <div class="page-header">
                                    <div class="left">
                                    <h1 class="page-title"><i class="fa fa-user"></i>Archive Student</h1>
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
                        <?php include('../include/message.php');?>    
            <div class="section-body bg-white mt-3">
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-md-flex  text-center mb-2">
                                       <h2>Archive</h2>
                                    </div>
                                    <form action="code.php" class="text-center" method="POST">
                                    <button id="archiveAllStudents" name="btn_Retrieve" class="btn m-3 btn-success">Retrieve All</button> <br>
                         
                                    </form>
                                    
                                    <form action="organization.php" method="POST">
                                    <div class="row">
                                
                                        <div class=" ">
                                            <div class="input-group mb-1">
                                            <input type="text" class="form-control" placeholder="Search student" id="Search">

                                            </div>
                                        </div>
                                   

                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>

            <?php include('../include/message.php');?>    
            <div class="section-body bg-white ">
                <div class="container-fluid">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="list" role="tabpanel">
                            <div class="row clearfix">
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="card">
                                        
                                    <table id="students" class="table app-table-hover mb-0 text-center">
                                            <thead >
                                                <tr id="heads">
                                                    <th class="cell">School ID</th>
                                                    <th class="cell">Full Name</th>
                                                    <th class="cell">Course</th>
                                                    <th class="cell">Contact Number</th>
                                                    <th class="cell">Training Site</th>
                                                    <th class="cell">Address</th>
                                                    <th class="cell">Status</th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                            <?php  
                                                $id=$_SESSION['auth_user']['user_id'];

                                                foreach ($items_run as $item) {
                                                 ?>
                                                <tr>
                                                    <td><?=$item['ID_student']?></td>
                                                    <td><?php echo $item['Fname'].' '.$item['Lname']?></td>
                                                    <td>BSIT</td>
                                                    <td><?=$item['phone_number']?></td>
                                                    <td><?php $id_company=$item['selected_company'];
                                                     $items1="SELECT * FROM company_name WHERE id='$id_company' ";
                                                     $items_run=mysqli_query($con, $items1);
                                                     if(mysqli_num_rows($items_run)>0)
                     
                                                     {
                                                          foreach($items_run as $item1) {  ?>
                                                                <?=$item1['company_name']?>

                                                      <?php    }}
                                                    
                                                    ?></td>
                                                    <td><?=$item['address']?></td>
                                                    <td class="text-center">
                                                  <?php  $role=$item['role'];
                                                   $status=$item['status'];
                                                   $role=$item['role'];

                                                        if($status==1){
                                                            ?>
                                                             <a class=" text-success ">Completed</a>  
                                                            <?php
                                                        }else{
                                                      if($role==1){
                                                   ?>
                                                       <a class=" text-success ">Approved</a>  
                                                       <?php
                                                      }else if($role==0){?>
                                                      <a class=" text-warning ">Pending..</a>  

                                                      <?php
                                                        
                                                      }else{
                                                        ?>
                                                          <a class=" text-danger ">Rejected..</a>  
                                                        <?php
                                                      }}
                                                      if($role==0||$role==1){ ?>
                                                      
                                                    </td>
                                                    <td class="text-right ">
                                                      <a href="student_check.php?id=<?=$item['id']?>" class="btn btn-success">Check</a>  
                                                    </td><?php } else{ ?>
                                                        <td class="text-right ">
                                                    
                                                    </td>
                                                   <?php } ?>
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
   
</script>
    <script>
    // Function to perform the search
    function Search() {
        var input, filter, found, table, tr, td, i, j;

        input = document.getElementById("Search");
        filter = input.value.toUpperCase();
        table = document.getElementById("students");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");

            for (j = 0; j < td.length; j++) {
                if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    found = true;
                }
            }

            if (found) {
                tr[i].style.display = "";
                found = false;
            } else {
                if (tr[i].id !== 'heads') {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    // Event listener to trigger search on input change
    document.getElementById("Search").addEventListener("input", Search);
</script>
    <script src="../assets/bundles/lib.vendor.bundle.js"></script>

    <script src="../assets/plugins/dropify/js/dropify.min.js"></script>

    <script src="../assets/js/core.js"></script>
    <script src="../assets/js/form/dropify.js"></script>
</body>

<!-- soccer/project/project-clients.html  07 Jan 2020 03:41:29 GMT -->

</html>