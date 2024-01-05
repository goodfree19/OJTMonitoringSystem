<?php include('../config/db_conn.php'); 
// Get values from the form
if(isset($_POST['approve'])){
$student_id = $_POST['student_id'];
$new_role = 1;

// Update the role in the database
$query = "UPDATE users SET role = '$new_role' WHERE id = '$student_id'";
$query_run = mysqli_query($con, $query); 
   
if($query_run){
    $_SESSION['message'] = "Student Approved Successfully ";
        header("Location: student.php");
        exit(0);
}else{
    $_SESSION['status'] = "Error";
        header("Location: student.php");
        exit(0);
}}

if(isset($_POST['approve_supervisor'])){
    $student_id = $_POST['supervisor_id'];
    $new_role = 1;
    
    // Update the role in the database
    $query = "UPDATE company_name SET role = '$new_role' WHERE id = '$student_id'";
    $query_run = mysqli_query($con, $query); 
       
    if($query_run){
        $_SESSION['message'] = "Supervisor Approved Successfully ";
            header("Location: student.php");
            exit(0);
    }else{
        $_SESSION['status'] = "Error";
            header("Location: student.php");
            exit(0);
    }}


    if(isset($_POST['delete_annoucement'])){
        $student_id = $_POST['id'];
       
        
        // Update the role in the database
        $query = "DELETE FROM announcement  WHERE id = '$student_id'";
        $query_run = mysqli_query($con, $query); 
           
        if($query_run){
            $_SESSION['message'] = "Delete successfully";
                header("Location: message.php");
                exit(0);
        }else{
            $_SESSION['status'] = "Error";
                header("Location: message.php");
                exit(0);
        }}

 if(isset($_POST['btn_archive'])){
    $query = "UPDATE users SET archive = 1";
    $query_run = mysqli_query($con, $query); 
    if($query_run){
        $_SESSION['message'] = "Supervisor Archive";
            header("Location: student.php");
            exit(0);
    }
        }
        if(isset($_POST['btn_Retrieve'])){
            $query = "UPDATE users SET archive = 0";
            $query_run = mysqli_query($con, $query); 
            if($query_run){
                $_SESSION['message'] = "Supervisor Archive";
                    header("Location: student.php");
                    exit(0);
            }
                }
if(isset($_POST['reject_stud'])){
    $student_id = $_POST['student_id'];
    $new_role = 2;
    
    // Update the role in the database
    $query = "UPDATE users SET role = '$new_role' WHERE id = '$student_id'";
    $query_run = mysqli_query($con, $query); 
       
    if($query_run){
        $_SESSION['message'] = "Student Reject";
            header("Location: student.php");
            exit(0);
    }else{
        $_SESSION['status'] = "Error";
            header("Location: student.php");
            exit(0);
    }}
    if(isset($_POST['reject_stupervisor'])){
        $supervisor_id = $_POST['supervisor_id'];
        $new_role = 2;
        
        // Update the role in the database
        $query = "UPDATE company_name SET role = '$new_role' WHERE id = '$supervisor_id'";
        $query_run = mysqli_query($con, $query); 
           
        if($query_run){
            $_SESSION['message'] = "Student rejected!";
                header("Location: student.php");
                exit(0);
        }else{
            $_SESSION['status'] = "Error";
                header("Location: student.php");
                exit(0);
        }}
if(isset($_POST['announcement_btn'])){
    $date = mysqli_real_escape_string($con,$_POST['date']);
    $announcement = mysqli_real_escape_string($con,$_POST['announcement']);

        $announcement="INSERT INTO announcement  (message,date) VALUE('$announcement','$date')";
        $announcement_run= mysqli_query($con,$announcement); 
          
        if($announcement_run){
               
                $_SESSION['message'] = "Announcement sent!";
                header("Location: message.php");
                exit(0);
            }else{
                $_SESSION['status'] = "Error sending announcement!";
                header("Location: message.php");
                exit(0);
            }
}
if(isset($_POST['delete_annoucement'])){
    $student_id = $_POST['id'];
   
    
    // Update the role in the database
    $query = "DELETE FROM announcement  WHERE id = '$student_id'";
    $query_run = mysqli_query($con, $query); 
       
    if($query_run){
        $_SESSION['message'] = "Announcement deleted!";
            header("Location: message.php");
            exit(0);
    }else{
        $_SESSION['status'] = "Error!";
            header("Location: message.php");
            exit(0);
    }}