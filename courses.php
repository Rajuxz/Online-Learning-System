<?php
    include('includes/sidebar.php');
    include('includes/connection.php');
?>
<style>
  <?php 
  include('Stylesheets/course_decor.css');
  ?>
</style>
<body>
<p class="m-2 fs-4 loc">List of courses</p>
<!-- Add course form. -->
<div type="button" class="btn btn-primary add_cors">
<a href="add_course.php"><i class="fas fa-plus"></i></a>
</div>
<?php
  $sql =  "SELECT * FROM courses";
  $result = $conn->query($sql) or die($conn->error);

echo'<table class="table">';
  echo'<thead>';
    echo'<tr>';
     echo' <th scope="col">#</th>';
     echo' <th scope="col">Name</th>';
      echo'<th scope="col">Description</th>';
      echo'<th scope="col">Category</th>';
      echo'<th scope="col">Action</th>';
    echo'</tr>';
 echo' </thead>';
 echo' <tbody>';
 $i = 1;
  while($row = $result->fetch_assoc()){
    echo' <tr>';
    echo' <td scope="row">'.$i.'</td>';
    $i++;
    echo'<td>'.$row['c_name'].'</td>';
    echo' <td>'.$row['c_details'].'</td>';
    echo' <td>'.$row['c_category'].'</td>';
    echo'<td>
        <form action="edit_course.php" method="POST" id="edit" class="d-inline">
        <input type="hidden" name="id" value='.$row['c_id'].'>
        <button class="act submit btn btn-info mr-2" name="view"><i class="fas fa-pen"></i></button>
        </form>

        <form action = "" method="POST" class="d-inline">
        <input type="hidden" name="id" value='.$row['c_id'].'>
        <button class="act submit btn btn-info bg-danger" name="delete"><i class="fas fa-trash"></i></button>
        </form>
      </td>';
    echo'</tr>';
  }
 echo' </tbody>';
echo'</table>';
?>
<?php
  if(isset($_REQUEST['delete'])){
    $no = $_REQUEST['id'];
    $sql = "DELETE from courses where c_id = '$no'";
    if($conn->query($sql) == TRUE){
      echo'<meta http-equiv="refresh" content="0;URL=?deleted">';
    }
    else{
      echo'<script>alert("Can not delete")</script>';
    }
  }
    include('includes/toggle.php');
?>
<script>
    var path = window. location. pathname;
    var page = path. split("/"). pop();
    console.log(page);
    if(page.localeCompare("Courses.php")){
        document.getElementById("dynamicname").innerText = "Courses";
    }
</script>
</body>