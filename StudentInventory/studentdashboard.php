<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
    integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="./css/style.css">

  <!-- Font Awesome JS -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
    integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
    crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
    integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
    crossorigin="anonymous"></script>

  <title>Student Inventory</title>
</head>

<body class="bg-light">
<?php include('./includes/dashboardnavbar.php'); ?>


  <div class="wrapper">

    <!-- include side navbar -->
    <?php include('./includes/studentsidenavbar.php'); ?>

    <!-- change active status on menu -->
    <script>document.getElementById("li_one").classList.add('active');</script>

    <!-- Page Content  -->
    <div id="content">


      <h2>My Details</h2>
      <div class="line"></div>
      <div class="container">

        <p>Approval Status:
          <?php
          if($statuscode == 0){
            echo '<span class="text-warning">Pending</span>';
         } else if($statuscode == 1){
          echo '<span class="text-success">Approved</span>';
         }else{
          echo '<span class="text-danger">Rejected</span>';
         }
         ?>
         </p>
        <p>Last login: <span class="text-primary"><?php echo $last_login; ?></span></p>

        <table class="table table-striped">
          <tbody>
            <tr>
              <td><b>Name</b></td>
              <td><?php echo $name; ?></td>
            </tr>
            <tr>
              <td><b>User ID</b></td>
              <td><?php echo $user_id; ?></td>
            </tr>
            <tr>
              <td><b>Email</b></td>
              <td><?php echo $email; ?></td>
            </tr>
            <tr>
              <td><b>Mobile No (+91)</b></td>
              <td><?php echo $mobile_no; ?></td>
            </tr>
            <tr>
              <td><b>Address</b></td>
              <td><?php echo $address ?></td>
            </tr>
            <tr>
              <td><b>Class</b></td>
              <td><?php echo $class; ?></td>
            </tr>
            <tr>
              <td><b>Section</b></td>
              <td><?php echo $section; ?></td>
            </tr>
          </tbody>
        </table>
        
      </div>

      <div class="line"></div>



    </div>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
      });
    });
  </script>

  
</body>

</html>