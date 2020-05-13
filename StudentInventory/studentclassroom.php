

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
    integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="./css/style.css">

  <!-- Font Awesome JS -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
    integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
    crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
    integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
    crossorigin="anonymous"></script>

  <title>Student Inventory</title>
</head>

<body class="bg-light">
<?php include('./includes/dashboardnavbar.php'); ?>

  <div class="wrapper">
    <!-- include side navbar -->
    <?php include('./includes/studentsidenavbar.php'); ?>

    <!-- change active status on menu -->
    <script>document.getElementById("li_two").classList.add('active');</script>


    <?php 
  // print_r($_POST);
  // custom define here
  $results_per_page = 6;
  
  // find no of results stored
  $sql="SELECT * FROM users_values where class='$class' and section='$section'";
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
    $prev=$page;
  }
  //next corner case
  if($page==$number_of_pages){
    $next=$page;
  }
  echo "<script>console.log('prev".$prev."next".$next."')</script>";
?>
         
    <!-- Page Content  -->
    <div id="content">
      
        <div class="form-row">
        <div class="form-group col-lg-11 col-md-10">
        <h3>My Classroom</h3>
        <p><bold>Class <?php echo $class ?> Section <?php echo $section ?></bold></p>
        </div>
      
          <!-- <div class="form-group col-lg-1 col-md-2">
            <form method="POST" id="form_limit">
              <select id="limit-records" class="form-control">
                <?php foreach([1,5,10] as $limit) :?>
                <option 
                <?php if($_POST["limit-records"] == $limit) echo "selected" ?> 
                  value="<?= $limit; ?>"><?= $limit; ?></option>
                <?php endforeach; ?>
              </select>
            </form>
          </div> -->


        </div>
      <div class="line"></div>
      <div class="container">
        <div class="card-columns col-lg-8 offset-lg-2">
<?php


// first result of this page
$first_result = ($page-1)*$results_per_page;

// fetch selected results from database
$sql="SELECT * FROM users_values where class='$class' and section='$section' LIMIT " . $first_result . "," .  $results_per_page;
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)) {
?>
          <div class="card bg-info text-light">
            <div class="card-body text-center">
              <p class="card-text"><?php echo $row['fname']." ".$row['lname'] ?></p>
            </div>
          </div>         
<?php 
  }
?>
        </div>
      </div>
      <div class="line"></div>
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
          <li class="page-item">
            <a class="page-link" href="studentclassroom.php?page=<?php echo $prev ?>" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>
<?php 
  for ($page=1;$page<=$number_of_pages;$page++) {
    if($current_page==$page){
      echo '<li class="page-item active"><a class="page-link" href="studentclassroom.php?page=' . $page . '">' . $page . '</a></li>';
    }
    else
    echo '<li class="page-item"><a class="page-link" href="studentclassroom.php?page=' . $page . '">' . $page . '</a></li>';
  }
?>
          <li class="page-item">
            <a class="page-link" href="studentclassroom.php?page=<?php echo $next ?>" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav>

      

    </div>
  </div>


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

  <script type="text/javascript">
    $(document).ready(function () {
      $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
      }),
      $('#limit-records').change(function(){
        $('#form_limit').submit();
      });
    });


  </script>
</body>

</html>