<?php
session_start();
include('../config/db_conn.php'); 

if(isset($_POST['btn_daily_sub'])){

    $time_in = mysqli_real_escape_string($con,$_POST['time_in']);
    $user_id = mysqli_real_escape_string($con,$_POST['user_id']);
    $time_out = mysqli_real_escape_string($con,$_POST['time_out']);
    $date = mysqli_real_escape_string($con,$_POST['date']);
    $narative_report = mysqli_real_escape_string($con,$_POST['narative_report']);
    $time_in_noon = mysqli_real_escape_string($con,$_POST['time_in_noon']);
    $time_out_noon = mysqli_real_escape_string($con,$_POST['time_out_noon']);
    $total_hours = mysqli_real_escape_string($con,$_POST['total_hours']);
    $morning_hours = mysqli_real_escape_string($con,$_POST['morning_hours']);
    $afternoon_hours = mysqli_real_escape_string($con,$_POST['afternoon_hours']);   
  
  
  
    $pic_stud = $_FILES['pic_stud']['name'];
    //THIS IS FOR RRNAMING THIS IMAGE
          $filename=uniqid().'_'.$pic_stud;
  
     $pic_stud2 = $_FILES['pic_stud2']['name'];
     //THIS IS FOR RRNAMING THIS IMAGE
      
      $filename2=uniqid().'_'.$pic_stud2;
      
      $pic_stud3 = $_FILES['pic_stud3']['name'];
      //THIS IS FOR RRNAMING THIS IMAGE
       
       $filename3=uniqid().'_'.$pic_stud3;
       
       $pic_stud4 = $_FILES['pic_stud4']['name'];
       //THIS IS FOR RRNAMING THIS IMAGE
        
        $filename4=uniqid().'_'.$pic_stud4;

    $query="INSERT INTO daily_narative_report (user_id,time_in,time_out,date,narative_report,total_hours,time_in_noon,time_out_noon,morning_hours,afternoon_hours,pic_stud,pic_stud2,pic_stud3,pic_stud4) 
    VALUES ('$user_id','$time_in','$time_out','$date','$narative_report','$total_hours','$time_in_noon','$time_out_noon','$morning_hours','$afternoon_hours','$filename','$filename2','$filename3','$filename4')";
    $query_run = mysqli_query($con, $query); 
   
if($query_run)
    {
        move_uploaded_file($_FILES['pic_stud']['tmp_name'],'../assets/images/student_daily/'.$filename);
        move_uploaded_file($_FILES['pic_stud2']['tmp_name'],'../assets/images/student_daily/'.$filename2);
        move_uploaded_file($_FILES['pic_stud3']['tmp_name'],'../assets/images/student_daily/'.$filename3);
        move_uploaded_file($_FILES['pic_stud4']['tmp_name'],'../assets/images/student_daily/'.$filename4);
        $_SESSION['message'] = "Daily Narrative Report successfully uploaded!";
        header("Location: index.php");
        exit(0);
    }
    else
    { 
       
        $_SESSION['error'] = "Something went wrong!";
        header("Location: dailyreport.php");
        exit(0);
        
    } 
  
}

if(isset($_POST['btn_papers1'])){
    $user_id = $_POST['user_id'];
    $type_file = $_POST['type_file'];
    
    $filename = $_FILES['papers_1']['name'];
    //THIS IS FOR RRNAMING THIS IMAGE
          $namefile=uniqid().'_'.$filename;


     $query="INSERT INTO paper_requirments (user_id,file_name,type_file) VALUES ('$user_id','$namefile','$type_file')";
     $query_run = mysqli_query($con, $query); 

     if($query_run){
        move_uploaded_file($_FILES['papers_1']['tmp_name'],'../assets/images/papers_requirements/'.$namefile);
        $_SESSION['message'] = "Requirement successfully uploaded!";
        header("Location: requirements.php");
        exit(0);
     }
}

if(isset($_POST['btn_delete_papers'])){
    $type_file = $_POST['type_file'];
   

    $query = "DELETE FROM paper_requirments WHERE type_file='$type_file'LIMIT 1";
    $query_run = mysqli_query($con,$query);

    if($query_run){
        
          
         
            $_SESSION['message']= "Item deleted successfuly!";
            header("Location: requirements.php");
            exit(0);
        }
     }else{
        $_SESSION['status'] = "Error!";
        header("Location: requirements.php");
        exit(0);
     }


   