<?php include('./includes/studentsession.php'); ?>

<!-- Sidebar  -->
<nav id="sidebar">
      <div class="sidebar-header">
        <h4><?php echo $name; ?></h4>
        <p class="text-light"><small><?php echo $user_id; ?></small></p>
      </div>

      <ul class="list-unstyled components">
        <p>Student Dashboard</p>
        <li id="li_one" >
          <a href="./studentdashboard.php">My Details</a>
        </li>
        <li id="li_two">
          <a href="./studentclassroom.php">My Classroom</a>
        </li>
        <li id="li_three">
          <a href="./studenteditdetails.php">Update Details</a>
        </li>
        <li id="li_four">
          <a href="./studentchangepassword.php">Change Password</a>
        </li>
      </ul>

      <ul class="list-unstyled CTAs">
        <li>
          <a href="logout.php" class="logout">Logout</a>
        </li>
      </ul>
    </nav>




    