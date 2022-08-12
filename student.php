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
<p class="m-2 fs-4 loc">List of Students</p>
<!-- Student list. -->
<div type="button" class="btn btn-primary add_cors d-inline">
<a href="add_student.php"><i class="fas fa-plus"></i></a>
</div>
<div class="d-inline download-button btn btn-primary">
    <a href="report.php" ><i class=" fas fa-file-download"></i></a>
</div>

<?php
    //include('includes/connection.php');
    $sql = "SELECT * FROM student";
    $result = $conn->query($sql) or die($conn->error);
   
    echo'<table class="table">';
    echo'<thead>';
    echo'<tr>';
      echo'<th scope="col">#</th>';
      echo'<th scope="col">Name</th>';
      echo'<th scope="col">Phone</th>';
      echo'<th scope="col">Email</th>';
      echo'<th scope="col">Action</th>';
   echo' </tr>';
 echo' </thead>';
  echo'<tbody> ';
  $i = 1;
      while($row = $result->fetch_assoc()){
        echo'<tr>';
        echo'<th scope="row">'.$i.'</th>';
        echo'<td>'.$row['sname'].'</td>';
        echo'<td>'.$row['sphone'].'</td>';
        echo'<td>'.$row['semail'].'</td>';
        echo'<td>
            <form action="editstudent.php" method="POST" class="d-inline">
            <input action="" type="hidden" name="id" value='.$row['id'].'>
            <button class="act submit btn btn-info mr-2" name="view"><i class="fas fa-pen"></i></button>
            </form>

            <form method="POST" class="d-inline">
            <input action="" type="hidden" name="id" value='.$row['id'].'>
            <button class="act submit btn btn-info bg-danger" name="delete"><i class="fas fa-trash"></i></button>
            </form>
        </td>';
    echo'</tr>';
    $i++;
     }
 echo '</tbody>';
echo'</table>';
?>
<!-- Delete through button. -->
<?php
    if(isset($_REQUEST['delete'])){
        $no = $_REQUEST['id'];
        $sql = "DELETE FROM student WHERE id = '$no' ";
        if($conn->query($sql) == TRUE){
            echo'<meta http-equiv="refresh" content="0;URL=?deleted">';
        }

    }
?>
<?php
    include('includes/toggle.php');
?>
<script>
    var path = window. location. pathname;
    var page = path. split("/"). pop();
    console.log(page)
    if(page.localeCompare("Student.php")){
        document.getElementById("dynamicname").innerText = "Students";
    }
</script>
</body>