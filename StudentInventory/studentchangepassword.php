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
        <script>document.getElementById("li_four").classList.add('active');</script>

        <!-- Page Content  -->
        <div id="content">
            <h2>Change Password</h2>
            <div class="line"></div>
            <div class="container">
                <div id="alertwindow" class="alert alert-success" role="alert" style="display:none;">
                    <h6>Password has been updated.</h6>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php
include('./includes/connection.php');
// define variables and set to empty values
$oldpassErr = $passErr = $cpassErr ="";
$oldpass = $pass = $cpass ="";
$flag=1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // old password
    if (empty($_POST["oldpass"])) {
        $oldpassErr = "Password is required";
        $flag=0;
    }
    else {
        $oldpass = format_input($_POST["oldpass"]);
        // check if pass is valid
        $flag=1;
        if (!preg_match("#[a-zA-Z]+#",$oldpass)) {
          $oldpassErr = "Must contain atleast one Character";
          $flag=0;
        }
    }
    // password
    if (empty($_POST["pass"])) {
        $passErr = "Password is required";
        $flag=0;
    }
    else {
        $pass = format_input($_POST["pass"]);
        // check if pass is valid
        $flag=1;
        if (!preg_match("#[a-zA-Z]+#",$pass)) {
          $passErr = "Must contain atleast one Character";
          $flag=0;
        }
    }
    //confirm password
    if (empty($_POST["cpass"])) {
        $cpassErr = "Confirm Password is required";
        $flag=0;
    }
    else {
        $cpass = format_input($_POST["cpass"]);
        // check if cpass is valid
        $flag=1;
        if (strcmp($pass,$cpass) != 0) {
          $cpassErr = "Passwords not matched";
          $flag=0;
        }
    }

    if(flag==0){
      //md5 encryption
      $oldpass_encr=md5($oldpass);
      $pass_encr=md5($pass);

      // check if old password exists
      $sql = "SELECT user_id FROM users where user_id='$user_id' and password='$oldpass_encr'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) == 0) {
        echo '<script>console.log("password didnt match caught")</script>';
        $flag=0;
        $oldpassErr="Old password didn't match.";
      }
      else{
        // password update
        $sql = "UPDATE users SET password='$pass_encr' where user_id='$user_id' and password='$oldpass_encr'";
        $result = mysqli_query($conn,$sql); 
        echo "<script>document.getElementById('alertwindow').style.display = '';</script>";
        echo "<script>console.log('done')</script>";

        $oldpassErr = $passErr = $cpassErr ="";
        $oldpass = $pass = $cpass ="";
        $flag=1;
      }

    }

}

// formats the input strings
function format_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
                <form method="post" name="changepassword">
                    <div class="form-group">
                        <label for="currentpassword" class="for">Current Password</label>
                        <input type="password" class="form-control" value="<?php echo $oldpass;?>" id="oldpass" placeholder="Enter Current Password" name="oldpass">
                        <small id="userIdHelp" class="form-text text-danger"><?php echo $oldpassErr ?></small>
                    </div>
                    <div class="form-group">
                        <label for="newpassword" class="for">New Password</label>
                        <input type="password" class="form-control" value="<?php echo $pass;?>" id="pass" name="pass"placeholder="Enter New Password">
                        <small id="userIdHelp" class="form-text text-danger"><?php echo $passErr ?></small>
                    </div>
                    <div class="form-group">
                        <label for="newpassword2" class="for">Re-enter New Password</label>
                        <input type="password" class="form-control" placeholder="Re-enter New Password" id="cpass" value="<?php echo $cpass;?>" name="cpass">
                        <small id="userIdHelp" class="form-text text-danger"><?php echo $cpassErr ?></small>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-dark button ">Update Details</button>
                    </p>
                </form>

            </div>

            <div class="line"></div>


        </div>
    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
        
    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="./JS/confirm_validation.js"></script>
    <!-- Plugin error color -->
    <style>
        .error{
            color:#CA0B00;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>