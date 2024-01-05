

 <nav class=" navbar-expand-lg bg-body-tertiary d-flex justify-content-end bg-dark-subtle p-2">
   
    <form action="../allcode.php" method="POST">
        <div class="d-flex flex-row-reverse">
            <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-2"
                data-toggle="dropdown"><i class="fa fa-user me-2 "></i> <?= $_SESSION['auth_user']['user_name']; ?> </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                <a class="dropdown-item" href="profile.php"><i
                        class="fa fa-user"></i> Profile</a>
            <button type="submit" name="logout_btn" class="dropdown-item"><i
                        class="fa fa-power-off"></i> Log out</button>
            </div>
        </div>
    </form>

</nav>