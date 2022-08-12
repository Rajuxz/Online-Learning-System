<?php 
    include('includes/sidebar.php');
    include('includes/connection.php');   
?>  
<body>
    <!-- Update Lesson  script  ----------->
    <?php 
        if(isset($_REQUEST['update'])){
            $course_id = $_REQUEST['c_id'];
            $course_name = $_REQUEST['c_name'];

            $lesson_id = $_REQUEST['lesson_id'];
            $lesson_name = $_REQUEST['l_name'];
            $lesson_desc = $_REQUEST['l_desc'];

            $lesson_link = $_FILES['lesson_link']['name'];
            $temp_link = $_FILES['lesson_link']['tmp_name'];

            $position = strpos($lesson_link,".");
            $file_extension = substr($lesson_link,$position+1);
            $file_extension = strtolower($file_extension);

            if(($file_extension!=="mp4")&&($file_extension!="ogg")&& ($file_extension!=="webm")){
                $msg = '<span class="bg-danger">Enter Video only</span>';
            }else{

                
                $folder = './Videos/'.$lesson_link;
                move_uploaded_file($temp_link,$folder);
                
                $sql = "UPDATE lession set lession_id = '$lesson_id',lession_name='$lesson_name',lession_desc='$lesson_desc',course_id = '$course_id',course_name='$course_name',lession_link = '$folder' WHERE lession_id = '$lesson_id'";
                
                if($conn->query($sql) == TRUE){
                    $msg = '<span class="fs-6" style="color:green;">Lession Successfully updated.</span>';
                }else{
                    $msg = '<span class="fs-6" style="color:green;">Something went wrong.</span>';
                    
                }
            }
        }

    ?>
<!-- Update Lesson Script End here.. -->
<div class="col-sm-6 mt-2 mx-3 jumbotron main-div">
    <?php
        if(isset($_REQUEST['view'])){
            $edit_key = $_REQUEST['id'];
            $sql = "SELECT * FROM lession where lession_id = $edit_key";
            $result = $conn->query($sql) or die($conn->error);
            $row = $result->fetch_assoc();
        }
    ?>
    <form action="#" method="POST" enctype="multipart/form-data" class="c-form">
         
         <div class="form-group">
            <label for="cid">Course Id</label>
            <input type="text" class="form-control" id="cid" name="c_id" 
            value="<?php
                 if(isset($row['course_id'])){
                    echo $row['course_id'];
                    }
                    ?>" readonly>        
        </div>
        <div class="form-group mt-3">
            <label for="pass">Course Name</label>
            <input type="text" class="form-control" id="c_name" name="c_name" value="<?php 
                if(isset($row['course_name'])){
                 echo $row['course_name'];
                 }?>"
                  required>
            
        </div>
        <div class="form-group">
            <label for="lid">Lesson ID</label>
            <input type="text" class="form-control" id="lid" name="lesson_id" 
            value="<?php
                 if(isset($row['lession_id'])){
                    echo $row['lession_id'];
                    }
                    ?>" readonly>        
        </div>

        <div class="form-group">
            <label for="name">Lesson name</label>
            <input type="text" class="form-control" id="name" name="l_name"
             value="<?php 
                if(isset($row['lession_name'])){
                 echo $row['lession_name'];
                    }
                 ?>"
                  required>
            
        </div>
        <div class="form-group mt-3">
            <label for="l_desc">Lesson Description</label>
            <textarea row="10" class="form-control" id="l_desc" name="l_desc" required><?php
                     if(isset($row['lession_desc'])){
                        echo $row['lession_desc'];
                        }
                        ?></textarea>
        </div>
        <div class="form-group mt-3">
            <label for="lesson_link">Lesson Link</label>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe src="
                <?php
                    if(isset($row['lession_link'])){
                        echo $row['lession_link'];
                    }
                    ?>
                " frameborder="0" class="embed-responsive-item"></iframe>
            </div>
            <input type="file" class="form-control-file" name="lesson_link" id="l_video">
        </div>

        <div class="form-group mt-3">
            <?php
                if(isset($msg)){
                    echo "$msg";
                }
            ?>
        </div>
        <div class="s-button mt-5">
            <a href="Lession.php" class="btn bg-secondary">Back</a>
            <button type="submit" class="btn btn-danger " id="update" name="update">Update</button>
        </div>
    </form>
</div>

    <script>
        var path = window. location. pathname;
    var page = path. split("/"). pop();
    if(page.localeCompare("Landing.php")){
        document.getElementById("dynamicname").innerText = "Edit Lessons"
    }
    if ( window.history.replaceState ) {
       window.history.replaceState( null, null, window.location.href );
    }
    </script>
</body>

<?php
include('includes/toggle.php');
?>
