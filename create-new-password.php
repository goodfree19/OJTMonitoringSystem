
<?php include("include/header.php");?>
<?php include("include/navbar_login.php");?>
<section class="vh-100">


<div class="row justify-content-center ">
<div class=" " ><img src="assets/img/logo_-_Copy-removebg-preview.png"> </div>
    <div class="col-sm-6 col-md-7 mb-4">
      
        <div class="container  p-3 py-4 login1 shadow rounded-3 ">
        <div class="card-header text-dark">    
            <h4>Reset Password</h4> 
        </div>
        <div class="card-body text-dark" >
            <form action="password-reset-code.php" method="post">   
                
            <?php include('include/message.php');?>
    <input type="hidden" name="password_token" value="<?php if(isset($_GET['token'])){echo$_GET['token'];} ?>">
            
                <div class="form-group py-3 ">
                    <label >Email</label>
                    <input  type="email" name="email" value="<?php if(isset($_GET['email'])){echo$_GET['email'];} ?>"  class="form-control">
                </div>
                <div class="form-group py-3 ">
                    <label > New Password</label>
                    <input required type="password" name="new_password" placeholder="Enter New Password" class="form-control">
                </div>
                <div class="form-group mb-3 ">
                    <label > Confirm Password</label>
                    <input required type="password" name="confirm_password" placeholder="Enter Confirm Password" class="form-control">
                </div> 
                <div class="form-group mb-3 d-grid gap-2">
                    <button type="submit" name="change_password" class="btn p-2 mb-1 bg-dark  text-black shadow border border-1 bg-transparent ">Change Password</button>
                </div>
           </form> 
    </div>
</div>
</div>

</div>

</section>