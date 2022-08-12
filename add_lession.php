<?php
    include('includes/sidebar.php');
    include('includes/connection.php');

    $result = "";
    if(isset($_REQUEST['lessonIsSubmitted'])){
        $course_id = $_REQUEST['c_id'];
        $course_name = $_REQUEST['c_name'];
        $lession_name = $_REQUEST['lession_name'];
        $lession_desc = $_REQUEST['lession_desc'];
        /* Lession Link */
        $lession_link = $_FILES['l_video']['name'];
        $temp_link = $_FILES['l_video']['tmp_name'];

        $position = strpos($lession_link,".");
        $file_extension = substr($lession_link,$position+1);
        $file_extension = strtolower($file_extension);
        if(($file_extension!=="mp4")&&($file_extension!="ogg")&& ($file_extension!=="webm")){
            $msg = '<span class="bg-danger">Enter Video only.</span>';
        }else{

            
            $folder = './Videos/'.$lession_link;
            move_uploaded_file($temp_link,$folder);
            
            $sql = "INSERT into lession(lession_name,lession_desc,lession_link,course_id,course_name) Values('$lession_name','$lession_desc','$folder','$course_id','$course_name')";
            
            if($conn->query($sql)){
                $result = '<p class="fs-6" style="color:green;">Lession Successfully inserted.</p>';
            }else{
                $result = '<p class="fs-6" style="color:green;">Something went wrong.</p>';
            }
        }
    }
?>
<!-- Traditional way to insert stylesheet in php. -->
<style>
<?php
    include('Stylesheets/add_course_form.css');
?>
</style>
<!-- Form stuffs begins from here. -->
<div class="col-sm-6 mt-2 mx-3 jumbotron main-div">
    <form action="" method="post" class="c-form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="c_id" 
            value=<?php 
            if(isset($_SESSION['c_id'])){
                echo $_SESSION['c_id'];
                }else{echo"";}
                ?> readonly>
        </div>
        <div class="form-group">
            <label for="name">Course name</label>
            <input type="text" class="form-control" id="name" name="c_name"
            value="<?php
             if(isset($_SESSION['c_name'])){
                echo $_SESSION['c_name'];
                }
                else{echo"";}
                ?>" required>
        </div>
        <div class="form-group mt-3">
            <label for="details">Lesson Name</label>
            <input type="text" class="form-control" id="lession_name" name="lession_name" required>
        </div>
        <div class="form-group mt-3">
            <label for="name">Lesson Description</label>
            <textarea row="10" class="form-control" id="lession_desc" name="lession_desc" required></textarea>
        </div>
        <div class="form-group mt-3">
            <label for="file">Lesson Video</label>
            <input type="file" class="form-control" id="file" name="l_video" required>
            <?php if(isset($msg)){echo $msg;}?>
        </div>
        <div class="s-button mt-5">
            <a href="Lession.php" class="btn bg-secondary">Back</a>
            <button type="submit" class="btn btn-danger " id="lessonIsSubmitted" name="lessonIsSubmitted">Add Lession</button>
        </div>
        <div class="form-group">
            <?php
            if(isset($result)){
                echo"$result";
            }
            ?>
        </div>
     </form>
</div>
<script>
    var path = window. location. pathname;
    var page = path. split("/"). pop();
    if(page.localeCompare("Add_lession.php")){
        document.getElementById("dynamicname").innerText = "Add Lesson"
    }
    if ( window.history.replaceState ) {
       window.history.replaceState( null, null, window.location.href );
    }
</script>


<?php
    include('includes/toggle.php');
?>