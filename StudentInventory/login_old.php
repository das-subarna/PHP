<!doctype html>
<html lang="en">

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

<body class="bg-light">
    <?php include('./includes/navbar.php'); ?>
    <br>
    <?php

    include('./includes/connection.php');
    // Initialize the session
    session_start();

    if(isset($_SESSION['login_student'])){
        header("location:studentdashboard.php");
    }

    // Define variables and initialize with empty values
    $username = $password = "";
    $error = "";

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Check if username is empty
        if(empty(trim($_POST["username"]))){
            $username_err = "Enter username.";
        } else{
            $username = trim($_POST["username"]);
        }
    
        // Check if password is empty
        if(empty(trim($_POST["password"]))){
            $password_err = "Enter password.";
        } else{
            $password = trim($_POST["password"]);
        }

        $password_encr = md5($password);

        // db here
        echo "<script>console.log('uid ".$username."');</script>";
        $sql = "SELECT user_id, user_role FROM users WHERE user_id= '$username' and password= '$password_encr'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        //$active = $row['active'];
        $count = mysqli_num_rows($result);
        // If result matched $myusername and $mypassword, table row must be 1 row
		echo "<script>console.log('count ".$count."');</script>";
        if($count > 0) {
            $user_type=$row["user_role"];
            if(strcmp($user_type,'1') == 0){
                $_SESSION['login_student'] = $username;

                // last login update
                $sql = "UPDATE users SET last_login=CURRENT_TIMESTAMP WHERE user_id = '$username'";
                $result = mysqli_query($conn,$sql); 

                // head to new page
                header("location: studentdashboard.php");
            }
            else if(strcmp($user_type,'0') == 0){
                $_SESSION['login_admin'] = $username;
                header("location: admindashboard.php");
            }
            
        }else {
            $error = "Your User Name or Password is invalid";
        }
    }           
?>
    <div class="container col-xl-3 col-lg-6 bg-white mt-4 rounded shadow">
        <div class="row p-4">
            <div class="col">
				<h3>Login</h3>
				<hr>
                <form method="post" name="login"> 
                    <div class="form-group">
                        <label for="username" class="for">User Name</label>
                        <input type="text" class="form-control" value="<?php echo $username;?>" placeholder="Enter username" name="username">
                        <!-- <small id="userIdHelp" class="form-text text-danger"><?php echo $username_err ?></small> -->
                    </div>
                    <div class="form-group">
                        <label for="password" class="for">Password</label>
                        <div class="input-group" id="show_hide_password">
                        <input type="password" class="form-control" value="<?php echo $password;?>" placeholder="Enter password" name="password">
                        <div class="input-group-append"><div class="input-group-text" ><i class="fa fa-eye-slash" aria-hidden="true"></i></div></div>
                        <!-- <small id="userIdHelp" class="form-text text-danger"><?php echo $password_err ?></small> -->
                        </div>
                    </div>
                    <small id="userIdHelp" class="form-text text-danger"><?php echo $error ?></small>
                    <!-- <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="rememberme">
                        <label class="form-check-label" for="mememberme">Remember me</label>
                    </div> -->
                    <br>
                    <button type="submit" class="btn btn-dark button ">Log in</button>
                    <p class="register"> <small>Not yet registered? <a href="register.php"><b>Register Now</b></a>!</small></p>
                </form>
            </div>
        </div>
    </div>




    <style>
        .button {
            width: 100%;
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


    <script>
        $(document).ready(function() {
        $("#show_hide_password i").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password input').attr("type") == "text"){
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass( "fa-eye-slash" );
                $('#show_hide_password i').removeClass( "fa-eye" );
            }else if($('#show_hide_password input').attr("type") == "password"){
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass( "fa-eye-slash" );
                $('#show_hide_password i').addClass( "fa-eye" );
            }
    });
});
    </script>
</body>

</html>