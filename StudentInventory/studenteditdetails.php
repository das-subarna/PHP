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
<?php include('./includes/studentsidenavbar.php'); 
    $edit_email=$email;
    $edit_address=$address;   
    $flag=0; 
    $emailErr = $addressErr ="";

?>

        <!-- change active status on menu -->
        <script>document.getElementById("li_three").classList.add('active');</script>
        <!-- Page Content  -->
        <div id="content">
            <h2>Update Details</h2>
            <div class="line"></div>
            <div class="container">
                <div id="alertwindow" class="alert alert-success" role="alert" style="display:none">
                    <b id="alerttext">Details have been updated .</b>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // print_r($_POST);
    // email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $flag=0;
        // print_r("check");
    }
    else {
        $edit_email = format_input($_POST["email"]);
        $flag=1;
        // check if e-mail address is well-formed
        if (!filter_var($edit_email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
          $flag=0;
        }
    }

    // address
    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
        $flag=0;
    } 
    else{
        $edit_address = format_input($_POST["address"]);
        $flag=1;
    }
    // print_r($flag);

    if($flag==1){
        if(strcmp($edit_address,$address) != 0 || strcmp($edit_email,$email) != 0){
            //echo "<script>console.log('email ".$edit_email."');</script>";
            //echo "<script>console.log('id ".$id."');</script>";
            //change
            $sql = "UPDATE users_values SET address='$edit_address', email='$edit_email' where uid='$id'";
            $result = mysqli_query($conn,$sql); 
            //echo "<script>console.log('result ".$result."');</script>";

              
            ?>

            <script>
                document.getElementById("alertwindow").style.display = "";
                document.getElementById('alerttext').innerText='All changed saved.';
            </script>

            <?php
        }
        else{
            // print_r("same");
            ?>

            <script>
                document.getElementById("alertwindow").style.display = "";
                document.getElementById('alerttext').innerText='No changed saved.';
            </script>

            <?php
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
                <form method="POST" name="updateform">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $fname; ?>"
                                disabled>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control"  name="lname" disabled value="<?php echo $lname; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" placeholder="Enter Email" id="email" name="email" value="<?php echo $edit_email; ?>">
                            <small id="userIdHelp" class="form-text text-danger"><?php echo $emailErr ?></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputmobile4">Mobile</label>
                            <input type="tel" class="form-control" placeholder="Enter Mobile No" id="mobile" name="mobile" value="<?php echo $mobile_no; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="for">Address</label>
                        <input type="text" class="form-control" placeholder="Enter Address (upto 100 chars)"
                        id="address" name="address" value="<?php echo $edit_address; ?>">
                        <small id="userIdHelp" class="form-text text-danger"><?php echo $addressErr ?></small>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="selclass">Select Class</label>
                            <select class="form-control" id="selclass" disabled>
                                <option><?php echo $class; ?></option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="selsec">Select Section</label>
                            <select class="form-control" id="selsec" disabled>
                                <option><?php echo $section; ?></option>
                            </select>
                        </div>
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
    <script src="./JS/register_validation.js"></script>
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