<?php
session_start();
include('config/db_conn.php'); 
if(isset($_POST['btn_supervisor12'])){
    $supervisor_Fname = mysqli_real_escape_string($con,$_POST['Fname']);
    $supervisor_Lname = mysqli_real_escape_string($con,$_POST['Lname']);
    
    $supervisor_name = "$supervisor_Fname"." "."$supervisor_Lname";
    $password11 = mysqli_real_escape_string($con,$_POST['password1']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $cpassword11 = mysqli_real_escape_string($con,$_POST['cpassword1']);
    $address = mysqli_real_escape_string($con,$_POST['address']);
    $phone_number = mysqli_real_escape_string($con,$_POST['phone_number']);
    $company_name = mysqli_real_escape_string($con,$_POST['company_name']);

    $valid_id = $_FILES['valid_id']['name'];
    $business_permit = $_FILES['business_permit']['name'];
  
    // Generate unique filenames for uploaded files
    $filename_valid_id = uniqid() . '_' . $valid_id;
    $filename_business_permit = uniqid() . '_' . $business_permit;
     
    
      if($password11 == $cpassword11)
    {
        //check company
        $checkcompany="SELECT company_name  FROM  company_name WHERE company_name='$company_name'";
        $checkcompany_run= mysqli_query($con,$checkcompany); 
            if(mysqli_num_rows($checkcompany_run)>0){
               
                $_SESSION['message'] = "This Company is already registered, please log in.";
                header("Location: login_supervisor.php");
                exit(0);
            }
            else
            { 
              
         
                   //INSER THE COMPANY AND THE IMAGE
                   $user_query = "INSERT INTO  company_name (supervisor_name,email,password,company_name,address,phone_number,filename_valid_id,filename_business_permit) VALUES ('$supervisor_name','$email','$password11','$company_name','$address','$phone_number','$filename_valid_id','$filename_business_permit')";
                   $user_query_run = mysqli_query($con,$user_query);
                
                   if($user_query_run){
                    move_uploaded_file($_FILES['business_permit']['tmp_name'],'assets/images/supervisor_images/'.$filename_business_permit);
                       move_uploaded_file($_FILES['valid_id']['tmp_name'],'assets/images/supervisor_images/'.$filename_valid_id);
                       
                       $_SESSION['message'] = "Registration successfuly sent!";
                       header("Location: index.php");
                       exit(0);
                   }
                   else
                     {
                   $_SESSION['status'] = "Something went wrong!";
                   header("Location: register_supervisor.php");
                   exit(0);
                    }
                
            }
     } 
            
     else
     {
        $_SESSION['status'] = "Password not match";
        header("Location: register_supervisor.php");
        exit(0);
     }
    }
    
