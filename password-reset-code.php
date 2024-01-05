<?php 
session_start();
include('config/db_conn.php'); 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php' ;


function send_password_reset($get_name,$get_email, $token)
{
    $mail = new PHPMailer(true);
    $tempalte_file="emailtemplate.php";   
 $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
 $mail->isSMTP();  
 $mail->SMTPAuth   = true;    

 //Send using SMTP
 $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through                        //Enable SMTP authentication
 $mail->Username   = 'vci.ojtmonitor@gmail.com';                     //SMTP username
 $mail->Password   = 'ateh khdu ddnc vrnj'; 
                               //SMTP password
 $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
 $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

 //Recipients
 $mail->setFrom('vci.ojtmonitor@gmail.com', $get_name);
 $mail->addAddress($get_email);     //Add a recipient
 
 $mail->isHTML(true);               //Name is optional
 $mail->Subject="OJT Monitoring VCI Reset Password Notification ";


$mail_template="<h2> Hi $get_name </h2>
    
    <h3> We're Sending you this email because you requested a passsword reset. <br> Click on this link to create a new password: </h3>
    <br/><br/>
    
    <a href='http://localhost/OJTMonitoringSystem/create-new-password.php?token=$token&email=$get_email'>Click me</a>";
 $mail->Body = $mail_template;         //Add attachments
 $mail->send();    //Optional name

}

function send_password_reset_student($get_name,$get_email, $token)
{
    $mail = new PHPMailer(true);
    $tempalte_file="emailtemplate.php";   
 $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
 $mail->isSMTP();  
 $mail->SMTPAuth   = true;    

 //Send using SMTP
 $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through                        //Enable SMTP authentication
 $mail->Username   = 'vci.ojtmonitor@gmail.com';                     //SMTP username
 $mail->Password   = 'ateh khdu ddnc vrnj'; 
                               //SMTP password
 $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
 $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

 //Recipients
 $mail->setFrom('vci.ojtmonitor@gmail.com', $get_name);
 $mail->addAddress($get_email);     //Add a recipient
 
 $mail->isHTML(true);               //Name is optional
 $mail->Subject="OJT Monitoring VCI Reset Password Notification ";


$mail_template="<h2> Hi $get_name </h2>
    
    <h3> We're Sending you this email because you requested a passsword reset. <br> Click on this link to create a new password: </h3>
    <br/><br/>
    
    <a href='http://localhost/OJTMonitoring-System/create-new-password_student.php?token=$token&email=$get_email'>Click me</a>";
 $mail->Body = $mail_template;         //Add attachments
 $mail->send();    //Optional name

}


if(isset($_POST['password_reset_link'])){

$email1=mysqli_real_escape_string($con,$_POST['email1']);
$token = md5(rand());

$check_email = "SELECT email FROM company_name WHERE email='$email1' LIMIT 1 ";
$check_email_run =mysqli_query($con,$check_email);
    if(mysqli_num_rows($check_email_run)>0)
    {
        $row = mysqli_fetch_array($check_email_run);
        
        $get_name=$row['supervisor_name'];
        $get_email=$row['email'];

        $update_token = "UPDATE company_name SET verify_token='$token' WHERE email='$get_email' Limit 1";
        $update_token_run = mysqli_query($con,$update_token);
       
        if($update_token_run)
        {
           send_password_reset($get_name,$get_email, $token);
           $_SESSION['message'] ="Password reset request was sent successfully.</br> Please check your email to reset your password";
           header("Location: resetpassword.php");
           exit(0);
        }
        else
        {
            $_SESSION['status'] ="Somthing went wrong.";
            header("Location:resetpassword.php");
            exit(0);

        }
    }
    else
    {
        $_SESSION['status'] ="No Email Found";
        header("Location:resetpassword.php");
        exit(0);
    }
}

if(isset($_POST['change_password']))
{
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $new_password=mysqli_real_escape_string($con,$_POST['new_password']);
    $confirm_password=mysqli_real_escape_string($con,$_POST['confirm_password']);
    $token=mysqli_real_escape_string($con,$_POST['password_token']);


    if(!empty($token))
    {
        if(!empty($email) && !empty($new_password) && !empty($confirm_password))
        {
            //cheing token is valid or not
            $check_token ="SELECT verify_token FROM company_name WHERE verify_token='$token' LIMIT 1 ";
            $check_token_run=mysqli_query($con,$check_token);
            if(mysqli_num_rows($check_token_run)>0)
            {
                if($new_password == $confirm_password)
                {
                    $update_password =" UPDATE company_name SET password='$new_password' WHERE verify_token='$token' LIMIT 1";
                    $update_password_run= mysqli_query($con,$update_password);
                    if($update_password_run)
                    {   
                        $new_token=md5(rand())."funda";
                        $update_to_new_token=" UPDATE company_name SET verify_token='$new_token' WHERE verify_token='$token' LIMIT 1";
                        $update_to_new_token_run= mysqli_query($con, $update_to_new_token);

                        $_SESSION['status'] ="Password Changed Successfully!";
                        header("Location: index.php");
                        exit(0);
                    }
                    else
                    {
                        $_SESSION['message'] ="Did not update the password. Something went wrong.";
                    header("Location: create-new-password.php?token=$token&email=$email");
                    exit(0);
                    }
                }
                else
                {
                    $_SESSION['message'] ="Password and Confirm Password does not match";
                header("Location: create-new-password.php?token=$token&email=$email");
                exit(0);
                }
            }
            else
            {
                $_SESSION['message'] ="Request a new reset password email link.";
            header("Location: create-new-password.php?token=$token&email=$email");
            exit(0);
            }
        }
        else
        {
            $_SESSION['message'] ="All filed are mandetory";
            header("Location: create-new-password.php?token=$token&email=$email");
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] ="No Token Available";
        header("Location: create-new-password.php");
        exit(0);
    }
}

?>