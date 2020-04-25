<?php
error_reporting(E_ALL);

$sclass = $_REQUEST['stu_class'];

$section = array('A', 'B', 'C');

// Converting Array to JSON format
echo json_encode($section);
// ["A","B","C"]

exit;

?>