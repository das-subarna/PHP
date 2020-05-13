<?php
//error_reporting(E_ALL);

//ini_set("display_errors", "On");

//ini_set("error_log", "/var/log/apache2/proj1_error");

include('./includes/connection.php');


$selclass = $_REQUEST['stu_class'];
//echo $selclass;
/*

Connect to your database
fetch the sections for your class
*/

$sql="SELECT  sections FROM `class_section` WHERE class='$selclass'";
//echo $sql;
//exit;
$result = mysqli_query($conn,$sql);

while( $row = $result->fetch_assoc() ){
    $section[] = $row['sections'];

} 
/*
$data=mysqli_fetch_assoc($result);
print_r(mysqli_fetch_assoc($result));
$Sections=$data['sections'];
$section=array($Sections);
*/


// Converting Array to JSON format
echo json_encode($section);
// ["A","B","C"]

exit;

?>