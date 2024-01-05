

<?php include("include/header.php");?>
<?php include("include/navbar_login.php");?>
<section class="vh-100">

<?php include('include/message.php');?>
<div class="row justify-content-center ">

    <div class="col-sm-6 col-md-7 mb-4 mt-5">
    
        <div class="container  p-3 py-4 login1 shadow rounded-3 ">
        <div class="card-header text-dark">    
            <h4>Reset Password</h4> 
        </div>
        <div class="card-body text-dark" >
            <form action="password-reset-code_student.php" method="POST">   
                
            <div class="form-group py-3 text-center">
                <label > Email Address</label>
                <input required type="email" name="email1" placeholder="Enter Email Address" class="form-control">
            </div>
           
            <div class="form-group mb-3 d-grid gap-2">
                <button type="submit" name="password_reset_link_student" class="btn p-2 mb-1   text-white shadow border border-1 bg-dark ">Send Password Reset Link</button>
            </div>
           </form> 
    </div>
</div>
</div>

</div>

</section>