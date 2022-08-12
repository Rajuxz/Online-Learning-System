<?php
    include('includes/sidebar.php');
    include('includes/connection.php');
?>
<style>
  <?php include('Stylesheets/Lession_decor.css');?>
</style>

<body>
 <!-- Search -->
 <div class="container">
   <form action="" method="post">
     <div class="input-group mb-3" style="width:230px !important;margin-left:10px;">
      <input type="number" id="in_id" class="form-control" placeholder="Enter id" aria-describedby="button-addon1" name="search" required>

      <button class="btn btn-danger" name="search_btn" type="submit" id="button-addon1">Search</button>
      <div class="button-group">
        <a href="add_lession.php" class="btn btn-plus"><i class="fas fa-plus"></i></a>
      </div>
    </div> 
  </form>
</div>
<!-- Script to search -->
<?php
    if(isset($_REQUEST['search_btn'])){
      $search_id = $_REQUEST['search'];
      $sql = "SELECT * FROM  courses where c_id = $search_id";
      $result = $conn->query($sql) or die($conn->error);
      $row = $result->fetch_assoc();
      
      if(isset($row['c_id'])){
        $_SESSION['c_id'] = $row['c_id'];
        $_SESSION['c_name'] = $row['c_name'];

        #echo $_SESSION['c_id'];
        #echo $_SESSION['c_name'];
        
        
        ?>
        <span class="m-2 fs-5"style="color:radium;">Course ID: <?php echo $row['c_id'];?></span><br>
        <span class="m-2 fs-5"style="color:radium;">Course Name: <?php echo $row['c_name'];?></span>
        <?php
      }else{
        echo'<span class="m-2 fs-5 text-danger">No items found</span>';
      }
    }
    ?>
  <!-- Script to search ends here -->
    
 <!-- Search Area END -->
 <?php

 if(isset($_REQUEST['search_btn'])){
  $key =  $_REQUEST['search'];
  // echo $key;
  $sql = "SELECT * FROM lession where course_id = $key";
  $result = $conn->query($sql) or die("Error");
  if($result->num_rows>0){
    echo'<table class="table">
    <thead>
    <tr>
    <th scope="col">Lession ID</th>
    <th scope="col">Lession Name</th>
    <th scope="col">Lession Link</th>
    <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>';
    while($row = $result->fetch_assoc()){
      echo'<tr>
      <th scope="row">'.$row['lession_id'].'</th>
      <td>'.$row['lession_name'].'</td>
      <td>'.$row['lession_link'].'</td>
      <td>    
      <form action="edit_lesson.php" method="POST" class="d-inline">
      <input action="" type="hidden" name="id" value='.$row['lession_id'].'>
      <button class="act submit btn btn-info mr-2" name="view">
      <i class="fas fa-pen"></i>
      </button>
      </form>
      
      <form method="POST" class="d-inline">
      <input action="" type="hidden" name="del_id" value='.$row['lession_id'].'>

      <button class="act submit btn btn-info bg-danger" name="delete">
      <i class="fas fa-trash"></i>
      </button>
      </form></td>
      </tr>';
    }
  }else{
    echo'<br><span class="m-2 fs-5 text-danger">No lessions are added.</span>';
  }
          
  echo'</tbody>
  </table>';
 }
?>
<!-- Script to delete lession -->
<?php
  if(isset($_REQUEST['delete'])){
    $delete_key = $_REQUEST['del_id'];
    $sql = "DELETE FROM lession where lession_id = $delete_key";
    if($conn->query($sql) == TRUE){
      echo'<meta http-equiv="refresh" content="0;URL=?deleted"/>';
    }else{
      echo'<span class="m-2 fs-5 text-danger">Unable to delete.</span>';
    }
  }
?>
<!-- Script to delete lession Ends here -->
<script>
    var path = window. location. pathname;
    var page = path. split("/"). pop();
    if(page.localeCompare("Landing.php")){
        document.getElementById("dynamicname").innerText = "Lessons"
    }
    if ( window.history.replaceState ) {
       window.history.replaceState( null, null, window.location.href );
    }
 </script>
</body>
</html>
<?php
include('includes/toggle.php');
?>
