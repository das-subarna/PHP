<?php
    $array1 = array(array(77, 87), array(23, 45));
    $array2 = array("Drupal Community", "com");
?>
	
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Assignment5</title>
</head>
<body>

<?php
    array_splice($array1[0],0,0,$array2[0]);
    array_splice($array1[1],0,0,$array2[1]);
	echo "<pre>";
	print_r ($array1);
	echo "<pre>";
?>
</body>

</html>

