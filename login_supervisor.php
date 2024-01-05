
<?php include("include/header.php");?>
<?php include("include/navbar_login.php");
if(isset($_SESSION['auth']))
{
    if(!isset($_SESSION['message'])){
        $_SESSION['message']="You are already logged in!";
    }
    header("Location: supervisor/index.php");
    exit(0);
}
?>

    <style>
      .gradiant{
        background: rgba(255,255,255,0.5);
-webkit-backdrop-filter: blur(2px);
backdrop-filter: blur(2px);
border: 1px solid rgba(255,255,255,0.25);

      }
      .p6{
        padding: 100px;
        padding-right: 600px;
        padding-left: 600px;
      }
    </style> 
  <section class="vh-100  ">

  <div class="container-fluid h-custom mt-5 p6">
  <?php include('include/message.php');?>
    
  <div class="border shadow rounded p-2 gradiant">
      <form class="m-2" action="login_code.php" method="POST">
      <div class="form-outline text-center bg-success rounded text-white mb-3"><label class="form-label fs-2 text-center " for="form3Example3">OJT Monitoring System</label></div>
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input required type="text" require name="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter Email Address" />
            <label class="form-label" for="form3Example3">Email</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input required type="password"  name="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" />
            <label class="form-label" for="form3Example4">Password</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
            <div class="input-group-append">
              <input class="form-check-input me-2" type="checkbox" id="showPasswordCheckbox"> Show password
            </div>
            </div>
            <a href="resetpassword.php" class="text-body">Forgot password?</a>
          </div>
     
          <div class="text-lg-start mt-4 pt-2">
          <div class="text-center">
            <button type="submit" name="btn_login_supervisor" class="btn btn-success btn-lg text">Login </button>
            </div>
            <div class="dropdown mt-3 text-center">
              <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
           Supervisor
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="index.php">Student</a></li>
                <li><a class="dropdown-item" href="login_admin.php">Admin</a></li>

              </ul>
            </div>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register_supervisor.php"
                class="link-danger">Register here</a></p>
        
          </div>

        </form>
      </div>
    </div>


</section>


<script>
  var passwordInput = document.getElementById('form3Example4');
  var showPasswordCheckbox = document.getElementById('showPasswordCheckbox');

  showPasswordCheckbox.addEventListener('change', function () {
    passwordInput.type = showPasswordCheckbox.checked ? 'text' : 'password';
  });
</script>

  <?php include ("include/footer.php");?>