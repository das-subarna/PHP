<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pagination</title>
  <!-- Bootstrap CSS Only -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
  crossorigin="anonymous">
</head>
<body>
<div class='container col-3 mt-4 p-4'>
<?php include 'connection.php';?>
<?php


// custom define here
$results_per_page = 5;

// find no of results stored
$sql='SELECT * FROM employees';
$result = mysqli_query($conn, $sql);
$number_of_results = mysqli_num_rows($result);

// calculate no of ttotal pages
$number_of_pages = ceil($number_of_results/$results_per_page);

// get present page no, init to 1 if not set
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}
$current_page=$page;

//next and prev values
$prev=$page-1;
$next=$page+1;
//prev corner case
if($page==1){
	$prev=1;
}
//next corner case
if($page==$number_of_pages){
	$next=5;
}

// first result of this page
$first_result = ($page-1)*$results_per_page;

// fetch selected results from database
$sql='SELECT * FROM employees LIMIT ' . $first_result . ',' .  $results_per_page;
$result = mysqli_query($conn, $sql);
echo '<table class="table table-hover"><tbody>';
while($row = mysqli_fetch_array($result)) {
  echo '<tr><td>'.$row['lastName'] . '</td><td>' . $row['firstName']. '</td></tr>';
}
echo '</tbody></table>';
// display page links
echo '<center><div class="pagination">';
echo '<a id="prevnext" href="index.php?page='.$prev.'">&laquo;</a>';
for ($page=1;$page<=$number_of_pages;$page++) {
	if($current_page==$page){
		echo '<a class="active" href="index.php?page=' . $page . '">' . $page . '</a>';
	}
	else
		echo '<a href="index.php?page=' . $page . '">' . $page . '</a>';
}
echo '<a id="prevnext" href="index.php?page='.$next.'">&raquo;</a>';
echo '</div></center>';

?>
<style>
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a.active {
  background-color: #13c2b9;
  color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>
</div>
</body>
</html>