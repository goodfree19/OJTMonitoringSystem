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
                                          
                                            <h2>Weekly Narrative Report</h2>
                                        </ul>
                                        
                                    </div>
                                    <div class="d-md-flex justify-content-between mb-2">
                                        <ul class="nav nav-tabs b-none">
                                            <li class="nav-item"><a class="nav-link " 
                                                    href="narative_report.php"><i class="fa fa-list-ul"> </i> Daily Report List</a>
                                            </li>
                                            
                                            <li class="nav-item"><a class="nav-link"  href="dailyreport.php"><i
                                                        class="fa fa-plus me-1"></i> Create New Daily Report</a></li>
                                        </ul>
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
                              <form action="submit_code.php" method="POST">
                              <input type="hidden" name="user_id" value="<?= $_SESSION['auth_user']['user_id'];?>">  
                              <div class="card-body">
                                 
                                <div class="container text-center">
                                  <div class="row g-2">
                                    <div class="col-6">
                                    <div class="">
                                    <div class="input-group mb-3">
                                          <span class="input-group-text" id="inputGroup-sizing-default">Hours</span>
                                          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="">
                                         <div class="input-group mb-3">
                                          <span class="input-group-text" id="inputGroup-sizing-default">Days</span>
                                          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                    <div class="">
                                         <div class="input-group mb-3">
                                          <span class="input-group-text" id="inputGroup-sizing-default">Date Start</span>
                                          <input type="date" id="dateInput" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                    <div class="">
                                         <div class="input-group mb-3">
                                          <span class="input-group-text" id="inputGroup-sizing-default">Date End</span>
                                          <input type="date" id="dateInput" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                  <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Weekly Goals</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                      </div>
                                    </div>
                                </div>
                                <div class="row" style="width: 300px; margin: auto; ">
                                <button type="submmit" name="btn_daily_sub" class="btn btn-success"> Upload</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
<script>
    function calculateTimeDifference() {
            var inputBox1 = document.getElementById("inputBox1").value;
            var inputBox2 = document.getElementById("inputBox2").value;
            var result = document.getElementById("result");
            var resultDiv = document.getElementById("resultDiv");

            if (inputBox1 && inputBox2) {
                var time1 = new Date("1970-01-01T" + inputBox1 + "Z");
                var time2 = new Date("1970-01-01T" + inputBox2 + "Z");

                if (time2 >= time1) {
                    var timeDifference = time2 - time1;
                    var hours = Math.floor(timeDifference / 3600000); // 3600000 milliseconds in an hour
                    var minutes = Math.floor((timeDifference % 3600000) / 60000); // 60000 milliseconds in a minute
                    var seconds = ((timeDifference % 3600000) % 60000) / 1000; // 1000 milliseconds in a second
                    result.value = hours + " hours " + minutes + " minutes " + seconds + " seconds";
                    resultDiv.style.display = "block";
                } else {
                    result.value = "End time must be greater than or equal to start time";
                    resultDiv.style.display = "block";
                }
            } else {
                result.value = "";
                resultDiv.style.display = "none";
            }
        }

        document.getElementById("inputBox1").addEventListener("input", calculateTimeDifference);
        document.getElementById("inputBox2").addEventListener("input", calculateTimeDifference);
</script>
            <?php include("../include/footer.php")?>