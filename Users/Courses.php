<?php
    include_once('../includes/connection.php');
   include('./utilities/head.php');
   include('./utilities/sidebar.php');
   include('./utilities/aside.php');
?>
          <div class="container" style="height:80vh; overflow:scroll;">
            <h2>Our courses</h2>
            <div class="row">
              <!--------Retriving course-------->
              <?php
            $sql = "SELECT * FROM courses";
            $result = $conn->query($sql) or die("Something went wrong");
            if($result->num_rows>0){
              while($row = $result->fetch_assoc()){
                $id = $row['c_id'];            
                
                    echo'<div class="card border-primary mb-3" style="width: 18rem;margin-left:10px;">
                     <div class="card-header">
                  
                  <h5 class="card-title">'.$row['c_name'].'</h5>
                  <small class="fw-bold text-dark-50">'.$row['c_category'].'</small>
                </div>
                <div class="card-body text-primary">
                  <p class="card-text">'.$row['c_details'].'</p>
                  <a href="Course.php?course_id='.$id.'" class="btn btn-primary">Enroll</a>
          </div>
        </div>';
        ?>
        <?php
              }  
            }else{
              echo'<span class="bg-warning text-light">No courses Found!</span>';
            }
            
            
            ?>
           
      </div>
    </div>
    <script>
    var path = window. location. pathname;
    var page = path. split("/"). pop();
    console.log(page)
    if(page.localeCompare("Student.php")){
        document.getElementById("dynamicname").innerText = "Students";
    }
</script>
<?php include('./utilities/footer.php');?>