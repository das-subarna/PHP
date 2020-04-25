
<?php
// connect to database
$hostname = "localhost";
$username = "root";
$password = "";
$database = "classicmodels";

$conn = mysqli_connect($hostname,$username,$password,$database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>