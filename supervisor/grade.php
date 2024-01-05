<?php include("../include/supervisor/header_super_visor.php");?>
<?php include("../include/supervisor/sibebar_supervisor.php");
include('../config/db_conn.php'); ?>
<?php include("../include/authentication.php")?>
        <div class="page">
            <div id="page_top" class="section-body top_dark">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="left">
                            <h1 class="page-title"><i class="fa fa-user"></i> Students</h1>
                        </div>
                        <form action="../allcode.php" method="POST">
                            <div class="d-flex flex-row-reverse text-dark ">
                                <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-2"
                                    data-toggle="dropdown"><i class="fa fa-user  me-2 "></i> <?= $_SESSION['auth_user']['user_name']; ?> </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href=""><i
                                            class="fa fa-user"></i> Profile</a>
                                <button type="submit" name="logout_btn" class="dropdown-item"><i
                                            class="fa fa-power-off"></i> Log out</button>
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
     
            <div class="section-body">
                <div class="container-fluid">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="list" role="tabpanel">
                            <div class="row clearfix">
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="card">
                                    <div class="container mt-5 mb-5">
                <h2 class="mb-4">Veritas College of Irosin - Student Evaluation</h2>
                <?php    $id=$_GET['id'];
                $query = "SELECT * FROM users WHERE id='$id'";
				$result = mysqli_query($con, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{ ?>

        <form action="code.php" method="POST" enctype="multipart/form-data">

            <!-- Student Information -->
            <div class="mb-3">
                <label for="studentName" class="form-label">Student's Name:</label>
                <input type="text" require class="form-control" id="studentName" value="<?=$row['Fname'];?> <?=$row['Lname'];?>" readonly>
            </div>

            <div class="mb-3">
                <label for="course" class="form-label">Course:</label>
                <input type="text" require class="form-control" id="course" value="Bachelor of Science in Information Technology" readonly>
            </div>

            <div class="mb-3">
                <label for="agency" class="form-label">Cooperating Agency / Firm / Industry:</label>
                <?php  $company_name=$row['selected_company'];
                 
                 $query = "SELECT * FROM company_name WHERE id='$company_name'";
                 $result = mysqli_query($con, $query);
                 if(mysqli_num_rows($result) > 0)
                 {
                     while($row1 = mysqli_fetch_array($result))
                     { ?>
                                 <input type="text" require class="form-control" id="agency" value="<?= $row1['company_name']?>" readonly>
                      <?php } }?> 
              
            </div>

          

            <div class="mb-3">
    <label for="evaluationDate" class="form-label">Date of Evaluation:</label>
    <?php
    // Get the current date in the format "F d, Y" (e.g., "June 20, 2023")
    $currentDate = date("F d, Y");
    ?>
    <input type="text" require class="form-control" name="date" id="evaluationDate" value="<?php echo $currentDate; ?>" readonly>
</div>

         <!-- Evaluation Criteria -->
<h3 class="mt-4">Evaluation Criteria</h3>

<!-- Promptness -->
<h4 class="mt-3">Promptness (15%)</h4>
<!-- a. Attendance/ Punctuality -->
<div class="mb-3">
    <label for="attendance" class="form-label">Attendance/ Punctuality:</label>
    <select class="form-control" id="attendance">
        <?php echo generateScoreOptions(15); ?>
    </select>
</div>

<!-- Workmanship -->
<h4 class="mt-3">Workmanship (60%)</h4>
<!-- a. Quality of Work -->
<div class="mb-3">
    <label for="qualityOfWork" class="form-label">Quality of Work:</label>
    <select class="form-control" id="qualityOfWork">
        <?php echo generateScoreOptions(20); ?>
    </select>
</div>
<!-- b. Quantity of Work -->
<div class="mb-3">
    <label for="quantityOfWork" class="form-label">Quantity of Work:</label>
    <select class="form-control" id="quantityOfWork">
        <?php echo generateScoreOptions(10); ?>
    </select>
</div>
<!-- c. Reliability and Resourcefulness -->
<div class="mb-3">
    <label for="reliability" class="form-label">Reliability and Resourcefulness:</label>
    <select class="form-control" id="reliability">
        <?php echo generateScoreOptions(10); ?>
    </select>
</div>
<!-- d. Cooperativeness -->
<div class="mb-3">
    <label for="cooperativeness" class="form-label">Cooperativeness:</label>
    <select class="form-control" id="cooperativeness">
        <?php echo generateScoreOptions(10); ?>
    </select>
</div>
<!-- e. Judgment -->
<div class="mb-3">
    <label for="judgment" class="form-label">Judgment:</label>
    <select class="form-control" id="judgment">
        <?php echo generateScoreOptions(10); ?>
    </select>
</div>

<!-- Personality -->
<h4 class="mt-3">Personality (25%)</h4>
<!-- a. Personality -->
<div class="mb-3">
    <label for="personality" class="form-label">Personality:</label>
    <select class="form-control" id="personality">
        <?php echo generateScoreOptions(15); ?>
    </select>
</div>
<!-- b. Overall Attitude -->
<div class="mb-3">
    <label for="overallAttitude" class="form-label">Overall Attitude:</label>
    <select class="form-control" id="overallAttitude">
        <?php echo generateScoreOptions(10); ?>
    </select>
</div>

<!-- Total Score -->
<h4 class="mt-4">Total Score (Rating)</h4>
<div class="mb-3">
    <label for="totalScore" class="form-label">Total Score:</label>
    <input type="text" require class="form-control" name="grade" id="totalScore" readonly>
</div>
<style>
    .pads{
        padding-left: 300px;
        padding-right: 300px;
        
    }
</style>
<div class="text-center">
    <h4 class="mt-4">Certificate</h4>
    <div class="m-3 border rounded ">
        <label for="comments" class="form-label mt-3 text-white">Upload File</label>
        <div class="m-3 pads text-center">
            <input type="file" require accept=".pdf" class="form-control" id="ratedBy" name="certificate" required>
        </div>
    </div>
</div>

            <!-- Remarks/Comments -->
            <h4 class="mt-4">Evaluation/Remarks/Comment:</h4>
            <div class="mb-3">
                <label for="comments" class="form-label">Remarks/Comments:</label>
                <textarea class="form-control" id="comments" rows="3" name="comments"></textarea>
            </div>

            <!-- Rated by -->
            <div class="mb-3">
                <label for="ratedBy" class="form-label">Rated by:</label>
                <input type="text" require class="form-control" id="ratedBy" name="ratedBy" placeholder="Enter name" required>

            </div>
            <input hidden type="text" require name="stud_id" value="<?= $_GET['id'];?>">
            <input  hidden type="text" require name="supervisor_id" value="<?= $_SESSION['auth_user']['user_id'];?>">
            <!-- Submit Button -->
            <div class="text-center">
            <button type="submit" name="btn_grade" class="btn btn-success" style="width: 300px;">Submit Grade</button>
            </div>
        </form>
        <?php }}?>

    </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
                </div>
            </div>
        </div>
    </div>
<!-- Add this script at the end of your HTML body -->
<script>
    // Function to calculate the total score
    function calculateTotalScore() {
        // Get the values of individual scores
        var attendance = parseInt(document.getElementById('attendance').value) || 0;
        var qualityOfWork = parseInt(document.getElementById('qualityOfWork').value) || 0;
        var quantityOfWork = parseInt(document.getElementById('quantityOfWork').value) || 0;
        var reliability = parseInt(document.getElementById('reliability').value) || 0;
        var cooperativeness = parseInt(document.getElementById('cooperativeness').value) || 0;
        var judgment = parseInt(document.getElementById('judgment').value) || 0;
        var personality = parseInt(document.getElementById('personality').value) || 0;
        var overallAttitude = parseInt(document.getElementById('overallAttitude').value) || 0;

        // Calculate the total score
        var totalScore = attendance + qualityOfWork + quantityOfWork + reliability +
                         cooperativeness + judgment + personality + overallAttitude;

        // Display the total score in the totalScore input field
        document.getElementById('totalScore').value = totalScore;
    }

    // Attach the calculateTotalScore function to the change event of each select element
    document.getElementById('attendance').addEventListener('change', calculateTotalScore);
    document.getElementById('qualityOfWork').addEventListener('change', calculateTotalScore);
    document.getElementById('quantityOfWork').addEventListener('change', calculateTotalScore);
    document.getElementById('reliability').addEventListener('change', calculateTotalScore);
    document.getElementById('cooperativeness').addEventListener('change', calculateTotalScore);
    document.getElementById('judgment').addEventListener('change', calculateTotalScore);
    document.getElementById('personality').addEventListener('change', calculateTotalScore);
    document.getElementById('overallAttitude').addEventListener('change', calculateTotalScore);

    // Initial calculation when the page loads
    calculateTotalScore();
</script>


<?php
function generateScoreOptions($maxScore) {
    $options = '';
    for ($i = 0; $i <= $maxScore; $i++) {
        $options .= "<option value=\"$i\">$i</option>";
    }
    return $options;
}
?>

    <script src="../assets/bundles/lib.vendor.bundle.js"></script>

    <script src="../assets/plugins/dropify/js/dropify.min.js"></script>

    <script src="../assets/js/core.js"></script>
    <script src="../assets/js/form/dropify.js"></script>
</body>

</html>