<?php
session_start();
include('../config/db_conn.php'); 

if(isset($_POST['btn_DTR'])){
    
    $supervisor_id = $_POST['supervisor_id'];
    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];
    $notes = $_POST['general_notes'];
  

    $dtr_file = $_FILES['dtr_file']['name'];
    //THIS IS FOR RRNAMING THIS IMAGE
    $dtr_file_extension=pathinfo($dtr_file, PATHINFO_EXTENSION);
          $namefile=uniqid().'.'.$dtr_file_extension;


     $query="INSERT INTO suoervisor_dtr (date_start,date_end,suoervisor_id,dtr_file,notes) VALUES ('$date_start','$date_end','$supervisor_id','$namefile','$notes')";
     $query_run = mysqli_query($con, $query); 

     if($query_run){
        move_uploaded_file($_FILES['dtr_file']['tmp_name'],'../assets/images/DTR/'.$namefile);
        $_SESSION['message'] = "DTR uploaded successfully!";
        header("Location: send_DTR.php");
        exit(0);
     }
}
if(isset($_POST['btn_grade'])){
   $stud_id = $_POST['stud_id'];
   $supervisor_id = $_POST['supervisor_id'];
   $grade = $_POST['grade'];
   $comment = $_POST['comments'];
   $ratedBy = $_POST['ratedBy'];
   $date = $_POST['date'];
   $designation = $_POST['designation'];


   $dtr_file = $_FILES['certificate']['name'];
   //THIS IS FOR RRNAMING THIS IMAGE
   $dtr_file_extension=pathinfo($dtr_file, PATHINFO_EXTENSION);
         $namefile=uniqid().'.'.$dtr_file_extension;
  
   $query="INSERT INTO grade_student (stud_id,supervisor_id,grade,comment,ratedby,designation,crertificate,date) VALUES ('$stud_id','$supervisor_id','$grade','$comment','$ratedBy','$designation','$namefile','$date')";
     $query_run = mysqli_query($con, $query); 

     if($query_run){
      $query1="UPDATE users SET status=1 WHERE id=$stud_id";
      $query_run1 = mysqli_query($con, $query1); 
      if($query_run1){
      move_uploaded_file($_FILES['certificate']['tmp_name'],'../assets/images/certificate/'.$namefile);
        $_SESSION['message'] = "Student successfuly graded!";
        header("Location: student_check.php?id=$stud_id");
        exit(0);
     }}
   
}
if(isset($_POST['btn_DTR_edit'])){
   $date_start = $_POST['date_start'];
   $date_end = $_POST['date_end'];
   $comment = $_POST['comment'];
   $id = $_POST['id'];
   $dtr_file = $_FILES['dtr_file']['name'];
   //THIS IS FOR RRNAMING THIS dtr_file
   $dtr_file_extension=pathinfo($dtr_file, PATHINFO_EXTENSION);
   $namefile=uniqid().'.'.$dtr_file_extension;
 

   if (!empty($dtr_file)) {
          
  
 
  
      $query1 = "UPDATE suoervisor_dtr SET date_start='$date_start', date_end='$date_end', notes='$comment', dtr_file='$namefile' WHERE id=$id";
      $query_run1 = mysqli_query($con, $query1);
      
      if ($query_run1) {
          move_uploaded_file($_FILES['dtr_file']['tmp_name'], '../assets/images/DTR/' . $namefile);
          $_SESSION['message'] = "DTR Updated";
          header("Location: send_DTR.php");
          exit(0);
      }

   }else{
      $query1 = "UPDATE suoervisor_dtr SET date_start='$date_start', date_end='$date_end', notes='$comment' WHERE id=$id";
      $query_run1 = mysqli_query($con, $query1); 
      if($query_run1){
     
     
         $_SESSION['message'] = "DTR edited successfuly!";
         header("Location: send_DTR.php");
         exit(0);
      }

   }
   
}
if(isset($_POST['delete_dtr'])){
   $id = $_POST['id'];
   $query1="DELETE FROM suoervisor_dtr  WHERE id=$id";
   $query_run1 = mysqli_query($con, $query1); 
   if($query_run1){
  
  
      $_SESSION['message'] = "DTR deleted successfuly!";
      header("Location: send_DTR.php");
      exit(0);
   }
}

