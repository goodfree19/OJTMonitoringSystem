<?php
include("../include/header.php");
include("../include/authentication.php");
include('../config/db_conn.php');
include("../include/navbar_student.php");

require_once '../vendor/autoload.php'; // Include Composer autoloader
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

// Fetch data from the database
$id = $_SESSION['auth_user']['user_id'];
$items = "SELECT * FROM daily_narative_report WHERE user_id=$id";
$items_run = mysqli_query($con, $items);

?>

<style>
    .bg {
        background-image: url("../assets/images/logo/Untitled design (2).png");
        /* Full height */
        height: 100%;
        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<?php include('../include/message.php'); ?>

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
                            <li class="nav-item"><a class="nav-link active " href="#list"><i class="fa fa-list-ul"> </i>Report List</a></li>
                            <li class="nav-item"><a class="nav-link" href="create_dailyreport.php"><i class="fa fa-plus me-1"></i>Create New Report</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container ">
    <div class="tab-content">
        <div class="tab-pane fade show active" id="list" role="tabpanel">
            <div class="row clearfix">
                <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card">
                            
                            <?php  
                                                    $id=$_SESSION['auth_user']['user_id'];
                                                    $items="SELECT * FROM daily_narative_report WHERE user_id=$id";
                                                    $items_run=mysqli_query($con,$items);
                                                    if(mysqli_num_rows($items_run)>0)
                    
                                                    {
                                                            foreach($items_run as $item) {    ?>
                                                        
                                                                 
                                                                           
                                                                 <div class="card">
                                                        <div class="row pt-3">
                                                            <!-- Images -->
                                                            <div class="col-md-3">
                                                                <img src="../assets/images/student_daily/<?= $item['pic_stud']; ?>" class="img-fluid w-100 h-100" alt="Image 1">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <img src="../assets/images/student_daily/<?= $item['pic_stud2']; ?>" class="img-fluid w-100 h-100" alt="Image 2">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <img src="../assets/images/student_daily/<?= $item['pic_stud4']; ?>" class="img-fluid w-100 h-100" alt="Image 3">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <img src="../assets/images/student_daily/<?= $item['pic_stud3']; ?>" class="img-fluid w-100 h-100" alt="Image 4">
                                                            </div>
                                                        </div>
                            
                                                        <div class="card-body">
                                                            <div class="container">
                                                                <div class="row gx-5">
                                                                    <div class="col">
                                                                        <!-- Student Name and Date -->
                                                                        <div class="">
                                                                            <h5 class="">
                                                                                <?php
                                                                        echo       $stud_id = $item['user_id'];
                                                                                $items = "SELECT * FROM users WHERE id ='$stud_id'";
                                                                                $items_run = mysqli_query($con, $items);
                                                                                if (mysqli_num_rows($items_run) > 0) {
                                                                                    foreach ($items_run as $item_q) {
                                                                                        echo $item_q['Fname'] . " " . $item_q['Lname'];
                                                                                        $id = $item_q['id'];
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </h5>
                                                                            <h5>Date: <?= $item['date']; ?></h5>
                                                                    <div class="">
                                                                        <!-- Hours -->
                                                                            <h5>Total Hours: <?=$item['total_hours'];?></h5> 
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                            
                                                            <!-- Narrative Report -->
                                                            <div class ="ps-4 text-center"> <h4>Tasks Accomplished</h4></div>
                                                            <textarea disabled class="message-textarea" rows="20" cols="210" style="width: 1220px; margin: auto;px; border-radius: 10px; resize: none"><?= $item['narative_report'];?></textarea>

                                                            <div class="text-center">
                                                            <?php


                                                                // Fetch data from the database
                                                                $items="SELECT * FROM daily_narative_report";
                                                                $items_run=mysqli_query($con,$items);
                                                                if(mysqli_num_rows($items_run)>0)
                                
                                                                {
                                                                     foreach($items_run as $item) {   $myid=$item['id']; }
                                                                    $myid;
                                                                    $items = "SELECT * FROM daily_narative_report WHERE id=$myid";
                                                                    $items_run = mysqli_query($con, $items);{
                                                                        if (mysqli_num_rows($items_run) > 0) {
                                                                            foreach ($items_run as $item) {
                                                                                $phpWord = new PhpWord();
                                                                                $section = $phpWord->addSection();
        
                                                                                // Add content to the Word document
                                                                                // Adjust this based on your report structure
                                                                                $items="SELECT * FROM users WHERE id={$item_q['id']}";
                                                                                $items_run=mysqli_query($con,$items);
                                                                                if(mysqli_num_rows($items_run)>0){
                                                                                    foreach ($items_run as $item_ko) {
                                                                                         $name=$item_ko['Fname']. $item_ko['Lname'];
                                                                                    }
                                                                                }
                                                                                $section->addText("Student Name: {$item_q['Fname']} {$item_q['Lname']}");
                                                                                $section->addText("Date: {$item['date']}");
                                                                                $section->addText("Total Hours: {$item['total_hours']}");
                                                                                $section->addText("Tasks Accomplished", ['size' => 14, 'bold' => true]);
                                                                                $section->addText($item['narative_report']);

                                                                           
        
                                                                                // Add an image to the section
                                                                                $imagePaths = [
                                                                                    "../assets/images/student_daily/{$item['pic_stud']}",
                                                                                    "../assets/images/student_daily/{$item['pic_stud2']}",
                                                                                    "../assets/images/student_daily/{$item['pic_stud4']}",
                                                                                    "../assets/images/student_daily/{$item['pic_stud3']}",
                                                                                ];
                                                                        
                                                                                foreach ($imagePaths as $imagePath) {
                                                                                    if (file_exists($imagePath)) {
                                                                                        $section->addImage(
                                                                                            $imagePath,
                                                                                            array(
                                                                                                'width' => 150, // Adjust the width of the image
                                                                                                'height' => 100, // Adjust the height of the image
                                                                                                'style' => 'display: block; margin: 0 auto;', // Center the image using inline styles
                                                                                            )
                                                                                        );
                                                                                    }
                                                                                }
                                                                                
                                                                                

        
                                                                                // Save the Word document
                                                                                $fileName = "NARATIVE_DOC/{$name}_{$item['date']}.docx";
                                                                                $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
                                                                                $objWriter->save($fileName);
        
                                                                                // Provide download link
                                                                                echo "<a href='$fileName' download>Download Document for {$name} on {$item['date']}</a>";
                                                                         
                                                                                
                                                                            }
                                                                        } else {
                                                                            echo "No records found.";
                                                                        }    

                                                                    }

                                                              
                                                                ?>
                                                              
                                                              
                                                                
                                                                             </div>                                                      
                                                                        </div>
                                                                    </div>
                                                                   </div>
                                                                  </div>
                                                                </div>
                                                                
                                                          <?php
                                                        }
                                                        } 
                                                    } else {
                                                        ?>
                                                        <!-- No Record Message -->
                                                        <div class="card-body">
                                                            <div class="container">
                                                                <div class="row d-flex justify-content-center ps-3">
                                                                    <h1>No Record...</h1>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                      



<!-- Your existing HTML code -->




            </div>
        </div>
    </div>
</div>
<!-- Include the html2pdf library for PDF export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.js"></script>

<script>
// Function to export report to PDF
function exportToPDF() {
    // Adjust the container ID based on your HTML structure
    var element = document.querySelector(".tab-content");

    // Configure the PDF options
    var options = {
        margin: 0,
        filename: 'report.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
    };

    // Generate PDF
    html2pdf(element, options);
}
</script>

<!-- Include the html2pdf library for PDF export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.js"></script>

<!-- Include the SheetJS library for Excel export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>

<?php include("../include/footer.php") ?>
