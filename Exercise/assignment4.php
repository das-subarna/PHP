

<?php 
$x = array("Sophia"=>"31","Jacob"=>"41","William"=>"39","Ramesh"=>"40");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Assignment4</title>
</head>

<body>
	<h3>ascending order sort by value</h3>
	<br>
<?php
    asort($x);
	echo "<pre>";
    print_r($x);
	echo "<pre>";
?>
	<br><br>
    <h3>descending order sorting by Value</h3>
	<br>
<?php	
    arsort($x);
    echo "<pre>";
    print_r($x);
	echo "<pre>";
?>
	<br><br>
    <h3>ascending order sorting by Key</h3>
	<br>
<?php	
	echo "<br>";
    ksort($x);
    echo "<pre>";
    print_r($x);
	echo "<pre>";
?>
	<br><br>
    <h3>descending order sorting by key</h3>
	<br>
<?php	
    krsort($x);
    echo "<pre>";
    print_r($x);
	echo "<pre>";
?>
</body>

</html>

