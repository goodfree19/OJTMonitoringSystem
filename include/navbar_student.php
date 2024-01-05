
<style>
.gbbark{
background-color: rgb(58,72,81);

}
</style>
<?php include('../config/db_conn.php'); ?>
<nav class="navbar navbar-expand-lg  gbbark">
<a class="navbar-brand" href="#">
<img class=" ms-4" src="../assets/images/veritas-college-of-sorsogon-removebg-preview.png" height="60px" width="68px" alt="">
    </a>
  <div class="container-fluid fs-6">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNav">
      <ul class="nav justify-content-center">
        <li class="nav-item">
          <a class="nav-link text-white " aria-current="page" href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi ms-1 me-1 bi-house-door-fill" viewBox="0 0 16 16">
  <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
</svg>Dashboard</a>
        </li>
        <li class="nav-item">

        <a class="nav-link text-white" href="narative_report.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi ms-1 me-1 bi-card-checklist" viewBox="0 0 16 16">
  <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
  <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
</svg>Daily Narrative Report</a>
        </li>
        <li class="nav-item">

        <a class="nav-link text-white" href="requirements.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi ms-1 me-1 bi-envelope-paper" viewBox="0 0 16 16">
  <path d="M4 0a2 2 0 0 0-2 2v1.133l-.941.502A2 2 0 0 0 0 5.4V14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5.4a2 2 0 0 0-1.059-1.765L14 3.133V2a2 2 0 0 0-2-2H4Zm10 4.267.47.25A1 1 0 0 1 15 5.4v.817l-1 .6v-2.55Zm-1 3.15-3.75 2.25L8 8.917l-1.25.75L3 7.417V2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v5.417Zm-11-.6-1-.6V5.4a1 1 0 0 1 .53-.882L2 4.267v2.55Zm13 .566v5.734l-4.778-2.867L15 7.383Zm-.035 6.88A1 1 0 0 1 14 15H2a1 1 0 0 1-.965-.738L8 10.083l6.965 4.18ZM1 13.116V7.383l4.778 2.867L1 13.117Z"/>
</svg>Requirements</a>
        </li>
          
   <!-- Add an ID to your anchor tag for easy reference in JavaScript -->
<li class="nav-item">
    <a id="notificationLink" class="nav-link text-white position-relative" href="notification.php" aria-disabled="true">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi ms-1 me-1 bi-bell-fill" viewBox="0 0 16 16">
            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
        </svg> Announcement
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                <!-- Notification badge -->
                <?php
            $totalRows = 0;

            $query = "SELECT COUNT(*) as total_rows FROM announcement ";
            $result = mysqli_query($con, $query);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $totalRows = $row['total_rows'];
            } else {
                // Handle the error if needed
            }
        ?>
        <span id="notificationBadge" class="badge bg-danger position-absolute top-0 start-100 translate-middle p-1 rounded-circle"> <?=$totalRows; ?> </span>
    </a>
</li>

<!-- Add JavaScript code to hide the badge on click -->




      </ul>

  
  </div>





  <form action="../allcode.php" method="POST">
        <div class="d-flex flex-row-reverse">
            <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-2"
                data-toggle="dropdown"><i class="fa fa-user me-2 "></i> <?= $_SESSION['auth_user']['user_name']; ?> </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <button type="submit" name="logout_btn" class="dropdown-item"><i
                        class="fa fa-power-off"></i> Log out</button>
            </div>
        </div>
    </form>
      
</nav>
