<?php
    include('includes/connection.php');
    include('includes/sidebar.php');
    if(isset($_REQUEST['update'])){
        $id = $_REQUEST['id'];
        $course_name = $_REQUEST['c_name'];

        $course_details = $_REQUEST['c_details'];
        $course_category = $_REQUEST['c_category'];
        if(strlen($course_name)<2){
            $namerr ="Course name is too short.";
        }
        $sql = "UPDATE courses set c_name ='$course_name',c_details='$course_details',c_category ='$course_category' WHERE c_id = '$id'";

        if($conn->query($sql)){
            $msg = '<p class="fs-6" style="color:green;">Successfully inserted.</p>';
        }else{
            $msg = '<p class="fs-6" style="color:red;">Something went wrong.</p>';
        }
    }
?>
<style>
    <?php 
        include('Stylesheets/add_course_form.php');
    ?>
</style>
<?php
    if(isset($_REQUEST['view'])){
        $id = $_REQUEST['id'];

        $sql = "SELECT * FROM courses where c_id = '$id'";
        $result = $conn->query($sql) or die($conn->error);
        $row = $result->fetch_assoc();
    }
?>

<div class="col-sm-6 mt-2 mx-3 jumbotron main-div">
    <h3 class="text-start">Add new course</h3>
    <form action="" method="post" class="c-form" enctype="multipart/form-data">
        <div class="form-group">
            <!-- <label for="s_id">Course ID</label> -->
            <input type="hidden" class="form-control" name="id" id="s_id"
            value="<?php 
                if(isset($row['c_id'])){
                    echo $row['c_id'];
                }
            ?>"
            readonly>
        </div>
        <div class="form-group">
            <label for="name">Course name</label>
            <input type="text" class="form-control" id="name" name="c_name" 
            value="<?php
                if(isset($row['c_name'])){
                    echo $row['c_name'];
                }
            ?>"
            required>
        </div>
        <div class="form-group mt-3">
            <label for="details">Course Details</label>
            <textarea row=2 class="form-control" id="details" name="c_details" required><?php if(isset($row['c_details'])){echo $row['c_details'];}?></textarea>
        </div>
        <div class="form-group mt-3">
            <label for="name">Course Category</label>
            <input type="text" class="form-control" id="category" name="c_category" 
                value="<?php if(isset($row['c_category'])){echo $row['c_category'];}?>"
            required>
        </div>
        <!-- <div class="form-group mt-3">
            <label for="file">Image</label>
            <input type="file" class="form-control" id="file" name="c_image" required>
        </div> -->
        <div class="s-button mt-5">
            <a href="courses.php" class="btn bg-secondary">Back</a>
            <button type="submit" class="btn btn-danger " id="update" name="update">Update</button>
        </div>
        <div class="form-group mt-3">
            <?php
                if(isset($msg)){
                    echo "$msg";
                }
            ?>
        </div>
     </form>
</div>
<?php
    include('includes/toggle.php');
?>

