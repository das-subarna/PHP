<?php
    $array1 = 
	array(
	"mohammad" => 
		Array("physics" => 
			Array("volume1" => 
					Array(
					"part1" => "101",
					"part2" => "102"),
				"volume2" => "31"),
		"maths" => "31",
		"chemistry" => "40"),
	"qadir" => 
		Array("physics" => "31",
		"maths" => "33",
		"chemistry" => "30"),
	"zara" => 
		Array("physics" => "32",
		"maths" => "23",
		"chemistry" => "40"));
?>
	
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Assignment6</title>
</head>
<body>

<?php
	echo 'OUTPUT <br> .............................................<br><br>';
	
	function display($x, $level = 0){
        foreach($x as $key => $value){
			for($i=0;$i<$level;$i++){
                echo '...';
            }
            if(is_array($value)){
				#print that key only and proceed
                echo ' ',$key;
				echo '<br>';
				# call recursively if value is an array
                display($value,$level+1); 
            }
			else{
				#print key and value
                echo ' ',$key, ' has value ', $value, '<br>';
            }
        }
    }
    display($array1);
?>
</body>

</html>

