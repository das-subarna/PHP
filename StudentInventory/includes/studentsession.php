<?php
    
   include('connection.php');
   session_start();

   if(!isset($_SESSION['login_student'])){
      header("location:login.php");
      die();
   }
  
   $user_check = $_SESSION['login_student'];
   
   // users
   $ses_sql = mysqli_query($conn,"SELECT id, user_id, status, last_login FROM users WHERE user_id= '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $id = $row["id"];
   $user_id = $row["user_id"];
   $statuscode = $row["status"];
   $last_login = $row["last_login"];
   
   
   // users_values
   $ses_sql = mysqli_query($conn,"SELECT * FROM users_values WHERE uid= '$id' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $fname = $row["fname"];
   $lname = $row["lname"];
   $name=$row["fname"]." ".$row["lname"];
   $mobile_no = $row["mobile_no"];
   $email = $row["email"];
   $class = $row["class"];
   $section = $row["section"];
   $address = $row["address"];
   

   
?>