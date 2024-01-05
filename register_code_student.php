<?php
session_start();
include('config/db_conn.php'); 

if(isset($_POST['register_student'])){
    $Fname = mysqli_real_escape_string($con,$_POST['Fname']);
    $Lname = mysqli_real_escape_string($con,$_POST['Lname']);
    $ID_student = mysqli_real_escape_string($con,$_POST['ID_student']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);
    $address = mysqli_real_escape_string($con,$_POST['address']);
    $phone_number = mysqli_real_escape_string($con,$_POST['phone_number']);
   
    $selected_company = mysqli_real_escape_string($con,$_POST['selected_company']);
  
    $image_id = $_FILES['image_id_stud']['name'];
   
    
    $filename=uniqid().'.'.$image_id;
 
    
     if($password == $cpassword)
    {
            //check email
            $checkemail="SELECT ID_student  FROM  users WHERE ID_student='$ID_student'";
            $checkemail_run= mysqli_query($con,$checkemail);   
           
       if(mysqli_num_rows($checkemail_run)>0)
                    {
                    
                        $_SESSION['message'] = "ID is already registered!";
                        header("Location: login_student.php");
                        exit(0);
                    }
       
            else{
                    //insert the info
                    $user_query = "INSERT INTO  users (Fname,Lname,ID_student,email,phone_number,image_id,address,password,selected_company) VALUES ('$Fname','$Lname','$ID_student','$email','$phone_number','$filename','$address','$password','$selected_company')";
                    $user_query_run = mysqli_query($con,$user_query);
                    
                        if($user_query_run){
                            
                            move_uploaded_file($_FILES['image_id_stud']['tmp_name'],'assets/images/stud_image/'.$filename);
                          
                            $_SESSION['message'] = "Registration successfully sent!";
                            header("Location: index.php");
                            exit(0);
                        }
                        else
                          {
                        $_SESSION['status'] = "Something went wrong!";
                        header("Location: register_student.php");
                        exit(0);
                         }
                }
                  
    }
    else
    {
       $_SESSION['status'] = "Password and Confirm Password does not match";
       header("Location: register_student.php");
       exit(0);
    }
} 