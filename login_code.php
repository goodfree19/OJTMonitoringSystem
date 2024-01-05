<?php
session_start();
include('config/db_conn.php'); 

if(isset($_POST['btn_login']))
{
    $ID_number = mysqli_real_escape_string($con,$_POST['ID_number']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    $login_query = "SELECT *FROM users WHERE ID_student='$ID_number' AND  password='$password' LIMIT 1";
    $login_query_run = mysqli_query($con,$login_query);
    
    if(mysqli_num_rows($login_query_run) > 0)
    {
        foreach($login_query_run as $data)
        {
        $user_id = $data['id'];
        $user_name  = $data['Fname'].''.$data['Lname'];
        $user_email = $data['ID_number'];
        $role_as = $data['role'];
        }
        if($role_as==2){

            $_SESSION['status'] = "We regret to inform you that your registration process was unsuccessful. Please carefully check your credentials and try again.";
            header("Location: login_student.php");
           exit(0); 
        }else{
        if($role_as==1){
        
            $_SESSION['auth']=true;
            $_SESSION['auth_user'] = [
                'user_id'=>$user_id,
                'user_name'=>$user_name,
                'user_email'=>$user_email,];
                $_SESSION['message'] = "Welcome to dashboard! ";
            header("Location: student/index.php");
            exit(0); 
        }else{
            $_SESSION['status'] = "You are not verified yet!  ";
            header("Location: login_student.php");
           exit(0); 
        }}
  }
   else
  {
    $_SESSION['status'] = "Invalid ID or Password! ";
    header("Location: login_student.php");
    exit(0);
}
}  

// LOGIN FOR SUPERVISOR
if(isset($_POST['btn_login_supervisor']))
{

    $email =  mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    $login_query ="SELECT *FROM company_name WHERE email='$email' AND  password='$password' LIMIT 1";
    $login_query_run = mysqli_query($con,$login_query);
    
    if(mysqli_num_rows($login_query_run) > 0)
    {
        foreach($login_query_run as $data)
        {
        $user_id = $data['id'];
        $user_name  = $data['supervisor_name'];
        $company_id = $data['company_id'];
        $role_as = $data['role'];
        }
        if($role_as==2){

            $_SESSION['status'] = "We regret to inform you that your verification process was unsuccessful. Please review your submitted credentials and try again. If you continue to experience issues, contact our support team for further assistance. Thank you for your understanding.";
            header("Location: login_student.php");
           exit(0); 
        }else{
        if($role_as==1){
        
            $_SESSION['auth']=true;
            $_SESSION['auth_user'] = [
                'user_id'=>$user_id,
                'user_name'=>$user_name,
                'company_id'=>$company_id,];
                $_SESSION['message'] = "Welcome to dashboard! ";
            header("Location: supervisor/index.php");
            exit(0); 
        }else{
            $_SESSION['status'] = "You are not verified yet! ";
            header("Location: login_supervisor.php");
            exit(0); 
        }}
    }
    else{
        $_SESSION['status'] = "Invalid email or password! ";
        header("Location: login_supervisor.php");
        exit(0); 
        
    }
}


if(isset($_POST['btn_login_admin']))
{

    $user_name =  mysqli_real_escape_string($con,$_POST['user_name']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    $login_query ="SELECT *FROM admin WHERE user_name='$user_name' AND  password='$password' LIMIT 1";
    $login_query_run = mysqli_query($con,$login_query);
    

    if(mysqli_num_rows($login_query_run) > 0)
    {
        foreach($login_query_run as $data)
        {
        $user_id = $data['id'];
        $user_name  = $data['supervisor_name'];
        $user_email = $data['ID_number'];
        $role_as = $data['role'];
        }

     
    
        $_SESSION['auth']=true;
        $_SESSION['auth_user'] = [
            'user_id'=>$user_id,
            'user_name'=>$user_name,
            'user_email'=>$user_email,];
            $_SESSION['message'] = "Welcome to dashboard!";
        header("Location: admin/index.php");
        exit(0); 

       
    }
    else{
        $_SESSION['status'] = "Invalid Email or Password!";
        header("Location: login_admin.php");
        exit(0); 
        
    }
}