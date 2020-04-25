<?php
$ceu = array( "Italy"=>"Rome",
"Luxembourg"=>"Luxembourg",
"Belgium"=> "Brussels", 
"Denmark"=>"Copenhagen", 
"Finland"=>"Helsinki", 
"France" => "Paris", 
"Slovakia"=>"Bratislava", 
"Slovenia"=>"Ljubljana", 
"Germany" => "Berlin", 
"Greece" => "Athens", 
"Ireland"=>"Dublin", 
"Netherlands"=>"Amsterdam", 
"Portugal"=>"Lisbon", 
"Spain"=>"Madrid", 
"Sweden"=>"Stockholm", 
"United Kingdom"=>"London", "Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius", "Czech Republic"=>"Prague", "Estonia"=>"Tallin", "Hungary"=>"Budapest", "Latvia"=>"Riga", "Malta"=>"Valetta", "Austria" => "Vienna", "Poland"=>"Warsaw") ;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Assignment2</title>
</head>

<body>
	<h1></h1>
	
<?php 
asort($ceu) ;
foreach($ceu as $c => $cap){
        echo "The capital of ".$c." is ".$cap.". <br>";
    }
?>
</body>

</html>



