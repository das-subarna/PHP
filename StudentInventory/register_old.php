<!doctype html>
<html lang="en">
<?php include('./includes/connection.php'); ?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Student Inventory</title>
    
</head>


<?php
    // define variables and set to empty values
    $fnameErr = $lnameErr = $emailErr = $mobileErr = $addressErr = $classErr = $sectionErr = $passErr = $cpassErr ="";
    $fname = $lname = $email = $mobile = $address = $class = $section = $pass = $cpass ="";
    $flag=0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // first name
        if (empty($_POST["fname"])) {
            $fnameErr = "First Name is required";
            $flag=0;
        } 
        else{
            $fname = format_input($_POST["fname"]);
            // check if name only contains letters
            $flag=1;
            if (!preg_match("/^[a-zA-Z]*$/",$fname)) {
              $fnameErr = "Only letters allowed";
              $flag=0;
            }
        }
        // last name
        if (empty($_POST["lname"])) {
            $lnameErr = "Last Name is required";
            $flag=0;
        } 
        else{
            $lname = format_input($_POST["lname"]);
            // check if name only contains letters
            $flag=1;
            if (!preg_match("/^[a-zA-Z]*$/",$lname)) {
              $lnameErr = "Only letters allowed";
              $flag=0;
            }
        }
        // email
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
            $flag=0;
        }
        else {
            $email = format_input($_POST["email"]);
            $flag=1;
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailErr = "Invalid email format";
              $flag=0;
            }
        }
        // mobile no
        if (empty($_POST["mobile"])) {
            $mobileErr = "Mobile no. is required";
            $flag=0;
        }
        else {
            $mobile = format_input($_POST["mobile"]);
            // check if mobile is valid
            $flag=1;
            if (!preg_match("/^[0-9]{10}/",$mobile)) {
              $mobileErr = "Enter 10 digit mobile number";
              $flag=0;
            }
        }
        // address
        if (empty($_POST["address"])) {
            $addressErr = "Address is required";
            $flag=0;
        } 
        else{
            $address = format_input($_POST["address"]);
            $flag=1;
        }
        // password
        if (empty($_POST["pass"])) {
            $passErr = "Password is required";
            $flag=0;
        }
        else {
            $pass = format_input($_POST["pass"]);
            // check if mobile is valid
            $flag=1;
            if (!preg_match("#[a-z]+#",$pass)) {
              $passErr = "Must contain atleast one Lower Case, Upper Case, and Number";
              $flag=0;
            }
        }
        //confirm password


    }
    // formats the input strings
    function format_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?>

<body class="bg-light">
    <?php include('./includes/navbar.php'); ?>
    <br>
    <div class="container col-xl-6 col-lg-7 bg-white rounded shadow mt-4">
        <div class="row p-4">
            <div class="col">
				<h3>Register</h3>
				<hr>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" name="fname" value="<?php echo $fname;?>" placeholder="Enter First Name"
                                name="fname">
                            <small id="userIdHelp" class="form-text text-danger"><?php echo $fnameErr ?></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control" value="<?php echo $lname;?>" placeholder="Enter Last Name" name="lname">
                            <small id="userIdHelp" class="form-text text-danger"><?php echo $lnameErr ?></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" value="<?php echo $email;?>" placeholder="Enter Email" name="email">
                            <small id="userIdHelp" class="form-text text-danger"><?php echo $emailErr ?></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Mobile</label>
                            <input type="tel" class="form-control" name="mobile" value="<?php echo $mobile;?>" placeholder="10 Digit Mobile No">
                            <small id="userIdHelp" class="form-text text-danger"><?php echo $mobileErr ?></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="for">Address</label>
                        <input type="text" class="form-control" name="address" value="<?php echo $address;?>" placeholder="Enter Address (upto 100 chars)">
                        <small id="userIdHelp" class="form-text text-danger"><?php echo $addressErr ?></small>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="selclass">Select Class</label>
                            <select class="form-control" id="selclass" name="class">
                                <option selected value="selected">Select Class</option>
<?php 
$sql = "SELECT class FROM class";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row["class"]. "'>".$row["class"]."</option>";
    }
}
?>                                
                            </select>
                            <small id="userIdHelp" class="form-text text-danger"><?php echo $classErr ?></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="selsec">Select Section</label>
                            <select class="form-control" id="selsec" name="section">
                                <option selected>Select Section</option>
                            </select>
                            <small id="userIdHelp" class="form-text text-danger"><?php echo $sectionErr ?></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" value="<?php echo $pass;?>" placeholder="Enter Password" name="pass">
                            <small id="userIdHelp" class="form-text text-danger"><?php echo $passErr ?></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="confpassword">Confirm Password</label>
                            <input type="password" class="form-control" value="<?php echo $cpass;?>" placeholder="Confirm Password" name="cpass">
                            <small id="userIdHelp" class="form-text text-danger"><?php echo $cpassErr ?></small>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-dark button">Register Now</button>
                    <p class="register"> <small>Already registered? <a href="login.php"><b>Login Now</b></a>!</small>
                    </p>
                </form>
            </div>
        </div>
    </div>




    <style>
        .button {
            width: 40%;
            float: left;
            text-align: center;
            background-color: rgb(3, 59, 105);
            cursor: pointer;

        }

        .button:hover {
            font-size: 1.1em;
            margin-top: -0.5%;
            margin-bottom: -0.5%;
        }

        .register {
            text-align: center;
            padding-top: 10px;
        }
    </style>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
        
    <!-- Optional JavaScript -->
    <script src="./JS/register_js.js"></script>
</body>

</html>