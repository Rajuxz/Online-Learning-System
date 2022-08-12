<?php
   include_once('../includes/connection.php');
   include('./utilities/head.php');
   include('./utilities/sidebar.php');
   include('./utilities/aside.php');
?>
<div class="container" style="height:80vh;overflow:scroll;">
    <div class="row">

        <div class="col-sm-3 border-right" >
            <span class="text-primary fw-bold">Lessons</span>
        <ul class="nav flex-column" id="playlist">

        <?php

        if(isset($_GET['course_id'])){
            $c_id = $_GET['course_id'];
            $sql = "SELECT * FROM lession where course_id = {$c_id}";
            $result = $conn->query($sql) or die("<span class='bg-danger'>Something Went Wrong!</span>");
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    echo'<li class=" mt-2 nav-item border-bottom py-2" movieurl='.str_replace("./","../",$row['lession_link']).' style="cursor:pointer">'.$row['lession_name'].'</li>';
                }
            ?>        
            </ul>
            </div>
            <div class="ms-auto col col-sm-8">
                <video src="" class="mt-2 w-75 ml-2" id="videoarea" controlslist="nodownload" controls></video>
            </div>
            <?php
          }else{
              echo'<span class="bg-danger">No Lessons found</span>';
            }
        }
        ?>
        </div>
        </div>
<?php include('./utilities/footer.php');?>