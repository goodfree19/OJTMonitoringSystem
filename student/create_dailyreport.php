<?php include("../include/header.php");?>
<?php include("../include/authentication.php")?>
<?php include('../config/db_conn.php'); ?>
<?php include("../include/navbar_student.php");?>`


   
       
<style>
    .bg{
        background-image: url("../assets/images/logo/Untitled design (2).png");

/* Full height */
height: 100%;

/* Center and scale the image nicely */
background-position: center;
background-repeat: no-repeat;
background-size: cover;
    }

</style>

                <div class="container">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                <div class="d-md-flex justify-content-between mb-2">
                                        <ul class="nav nav-tabs b-none">
                                          
                                            <h2>Daily Narrative Report</h2>
                                        </ul>
                                        
                                    </div>
                                    <div class="d-md-flex justify-content-between mb-2">
                                        <ul class="nav nav-tabs b-none">
                                            <li class="nav-item"><a class="nav-link " href="narative_report.php"><i class="fa fa-list-ul"> </i>Report List</a>
                                            </li>
                 
                                            <li class="nav-item"><a class="nav-link active"  href="dailyreport.php"><i
                                                        class="fa fa-plus me-1"></i>Create New Report</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
            <?php include('../include/message.php');?>
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                            <form action="submit_code.php" method="POST"  enctype="multipart/form-data">
                                <div class="card-body">
                                <input type="hidden" name="user_id" value="<?= $_SESSION['auth_user']['user_id'];?>">  
                                <div class="container ">
                                    <div class="row">
                                        <div class="col">
                                            <div class="">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Date</span>
                                                    <input type="date" required class="form-control" name="date" id="dateInput" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"max="2023-01-01">
                                                    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the current date in the format "YYYY-MM-DD"
        var currentDate = new Date().toISOString().split('T')[0];

        // Set the value of the date input to the current date
        document.getElementById('dateInput').value = currentDate;

        // Set the max attribute to disable dates beyond the current date
        document.getElementById('dateInput').max = currentDate;
    });
</script>
                                                </div>
                                            </div>
                                        </div>
                                  
                                    <div class="fs-4">Morning</div>
                                    <div class="col-6">
                                        <div class="">
                                            <div class="input-group mb-1">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Time In</span>
                                                <input type="time" id="inputBox1" name="time_in" oninput="calculateTimeDifference()" required class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="">
                                            <div class="input-group mb-1">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Time Out</span>
                                                <input type="time" id="inputBox2" name="time_out" oninput="calculateTimeDifference()" required class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="fs-4">Afternoon</div>
                                    <div class="col-6">
                                        <div class="">
                                            <div class="input-group mb-1">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Time In</span>
                                                <input type="time" id="inputBox11" name="time_in_noon" oninput="calculateTimeDifference_noon()" required class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="">
                                            <div class="input-group mb-1">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Time Out</span>
                                                <input type="time" id="inputBox22" name="time_out_noon" oninput="calculateTimeDifference_noon()" required class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container ">
                                        <div class=" ">
                                    <div class="fs-4">Morning Hours:</div>
                                         <div class="col-6">
                                        
                                            <div class="input-group mb-1">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Morning Hours</span>
                                                <input type="text" id="morning_hours" name="morning_hours" class="form-control" >
                                            
                                        </div>
                                    </div>
                                    <div class="fs-4">Afternoon Hours:</div>
                                         <div class="col-6">
                                     
                                            <div class="input-group mb-1">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Afternoon Hours</span>
                                                <input type="text" id="afternoon_hours1" name="afternoon_hours" class="form-control" >
                                            
                                        </div>
                                    </div>
                                    <div class="fs-4">Total Hours:</div>
                                    <div class="col-6">
                                    <div class="mb-3">
                                            <div class="input-group mb-1">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Total Hours</span>
                                                <input type="text" value="" id="total_hours" name="total_hours" class="form-control" >
                                                
                                            
                                    </div>
                                    </div>
                                    </div>
                                   
                                     <div class="input-group mb-1">
                                         <div class="mb-3">
                                        <label for="formFile" class="form-label">Image 1</label>
                                        <input class="form-control" type="file"  name="pic_stud" id="formFile">
                                        </div>
                                    </div>
                                    </div>
                                     <div class="input-group mb-1">
                                         <div class="mb-3">
                                        <label for="formFile" class="form-label">Image 2</label>
                                        <input class="form-control" type="file"  name="pic_stud2" id="formFile">
                                        </div>
                                    </div>
                                    </div>
                                     <div class="input-group mb-1">
                                         <div class="mb-3">
                                        <label for="formFile" class="form-label">Image 3</label>
                                        <input class="form-control" type="file"  name="pic_stud3" id="formFile">
                                        </div>
                                  
                                                                     </div> 
                                     <div class="input-group mb-1">
                                             <div class="mb-3">
                                   
                                        <label for="formFile" class="form-label">Image 4</label>
                                        <input class="form-control" type="file"  name="pic_stud4" id="formFile">
                                        
                                         </div></div>
                                    
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    
                                  <div class=" ">
                                        <label for="exampleFormControlTextarea1" class="form-label text-center">Daily Accomplishments</label>
                                        <textarea required class="form-control" name="narative_report" id="exampleFormControlTextarea1" rows="20" style="width: 900px; margin: auto; resize: none;" placeholder="Enter text..."></textarea>
                                      </div>
                                    </div>
                                </div>
                                </div>
                                <br>
                                <div class="row" style="width: 200px; margin: auto; ">
                                <button type="submit" name="btn_daily_sub" class="btn btn-success">Upload Report</button>
                                
                                    </div>
                                    
                                    <br>
                            </div>
                            </form>
                        </div>

                  
            
            </div>
            <script>
        function calculateTimeDifference() {
            const timeIn = new Date("1970-01-01T" + document.getElementById("inputBox1").value);
            const timeOut = new Date("1970-01-01T" + document.getElementById("inputBox2").value);

            if (timeIn < timeOut) {
                const timeDiff = (timeOut - timeIn) / 3600000; // Convert milliseconds to hours
                document.getElementById("morning_hours").value = timeDiff.toFixed(2);
                calculateTotalHours();
            }
        }

        function calculateTimeDifference_noon() {
            const timeIn = new Date("1970-01-01T" + document.getElementById("inputBox11").value);
            const timeOut = new Date("1970-01-01T" + document.getElementById("inputBox22").value);

            if (timeIn < timeOut) {
                const timeDiff = (timeOut - timeIn) / 3600000; // Convert milliseconds to hours
                document.getElementById("afternoon_hours1").value = timeDiff.toFixed(2);
                calculateTotalHours();
            }
        }

        function calculateTotalHours() {
            const morningHours = parseFloat(document.getElementById("morning_hours").value);
            const afternoonHours = parseFloat(document.getElementById("afternoon_hours1").value);
            const totalHours = morningHours + afternoonHours;
            document.getElementById("total_hours").value = totalHours.toFixed(2);
        }
    </script>
  
            <?php include("../include/footer.php")?>