<?php
    include('includes/sidebar.php');
    include('includes/connection.php');

    $result = "";
    $namerr = "";
    if(isset($_REQUEST['click'])){
        $course_name = $_REQUEST['c_name'];

        $course_details = $_REQUEST['c_details'];
        $course_category = $_REQUEST['c_category'];
        if(strlen($course_name)<2){
            $namerr ="Course name is too short.";
        }
        $sql = "INSERT INTO courses(c_name,c_details,c_category) VALUES('$course_name','$course_details','$course_category')";

        if($conn->query($sql)){
            $result = '<p class="fs-6" style="color:green;">Successfully inserted.</p>';
        }else{
            $result = '<p class="fs-6" style="color:green;">Something went wrong.</p>';
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
    <!-- <h3 class="text-start">Add new course</h3> -->
    <form action="" method="post" class="c-form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Course name</label>
            <input type="text" class="form-control" id="name" name="c_name" required>
            <span class="fs-7" style="color:red;"><?php echo"$namerr";?></span>
        </div>
        <div class="form-group mt-3">
            <label for="details">Course Details</label>
            <textarea row=2 class="form-control" id="details" name="c_details" required></textarea>
        </div>
        <div class="form-group mt-3">
            <label for="name">Course Category</label>
            <input type="text" class="form-control" id="category" name="c_category" required>
        </div>
        <!-- <div class="form-group mt-3">
            <label for="file">Image</label>
            <input type="file" class="form-control" id="file" name="c_image" required>
        </div> -->
        <div class="s-button mt-5">
            <a href="courses.php" class="btn bg-secondary">Back</a>
            <button type="submit" class="btn btn-danger " id="click" name="click">Upload</button>
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
    var path = window.location.pathname;
    var page = path. split("/").pop();
    if(page.localeCompare("Add_course.php")){
        document.getElementById("dynamicname").innerText = "Add Courses";
    }
</script>
<?php
    include('includes/toggle.php');
?>