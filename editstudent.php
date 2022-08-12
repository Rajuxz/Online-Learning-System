<?php 
    include('includes/connection.php');
    include('includes/sidebar.php');
?>
<!-- code to update student information. -->
<?php
    $namerr = "";
    $numerr = "";
    $emailerr = "";
    $passerr = "";
    if(isset($_REQUEST['update'])){
        $sid = $_REQUEST['s_id'];
        $sname = $_REQUEST['s_name'];
        $snum = $_REQUEST['s_num'];
        $semail = $_REQUEST['email'];
        $spass = $_REQUEST['password'];
        //check if length of input is too short.
        $number = intval($snum);
        if(strlen($sname)<3){
            $namerr = "Name is too short.";
        }else if(strlen((string)$number)<10 && !is_numeric($number)){
            $numerr = "Invalid number";
        }else if(!filter_var($semail,FILTER_VALIDATE_EMAIL)){
            $emailerr = "Invalid Email address.";
        }else if(strlen($spass)<5){
            $passerr = "Password is too short.";
        }else{
           //check if email is already exist in database.
           
               $sql = "UPDATE student SET id = '$sid',sname='$sname',sphone='$snum',semail='$semail',spassword='$spass' where id = '$sid'";

               if($conn->query($sql) == TRUE){
                    $msg = '<p class="fs-6" style="color:Green">Updated Successfully.</p>';
                }
                else{
                   $msg = '<p class="fs-6" style="color:red">Cannot Update.</p>';
               }
           
        }

    }
?>
<?php
    if(isset($_REQUEST['view'])){
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM student where id ='$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    } 
?>
<div class="col-sm-6 mt-2 mx-3 jumbotron main-div">
    <h3 class="text-start">Edit student</h3>
    <form action="#" method="POST" class="s-form">
    <div class="form-group">
            <!-- <label for="sid">Student ID</label> -->
            <input type="hidden" class="form-control" id="sid" name="s_id" value="<?php if(isset($row['id'])){echo $row['id'];}?>" readonly>
            <span class="fs-7" style="color:red;"><?php echo"$namerr"; ?></span>
        </div>
        <div class="form-group">
            <label for="name">Student name</label>
            <input type="text" class="form-control" id="name" name="s_name" value="<?php if(isset($row['sname'])){echo $row['sname'];}?>" required>
            <span class="fs-7" style="color:red;"><?php echo"$namerr"; ?></span>
        </div>
        <div class="form-group mt-3">
            <label for="number">Contact Number</label>
            <input type="number" class="form-control" id="number" name="s_num" value="<?php if(isset($row['sphone'])){echo $row['sphone'];}?>" required>
            <span class="fs-7" style="color:red;"><?php echo"$numerr";?></span>
        </div>
        <div class="form-group mt-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($row['semail'])){echo $row['semail'];}?>" required>
            <span class="fs-7" style="color:red;"><?php echo"$emailerr";?></span>
        </div>
        <div class="form-group mt-3">
            <label for="pass">Password</label>
            <input type="password" class="form-control" id="pass" name="password" value="<?php if(isset($row['spassword'])){echo $row['spassword'];}?>" required>
            <span class="fs-7" style="color:red;"><?php echo"$passerr";?></span>
        </div>
        <div class="form-group mt-3">
            <?php
                if(isset($msg)){
                    echo "$msg";
                }
            ?>
        </div>
        <div class="s-button mt-5">
            <a href="student.php" class="btn bg-secondary">Back</a>
            <button type="submit" class="btn btn-danger " id="update" name="update">Update</button>
        </div>
    </form>
</div>
<?php
    include('includes/toggle.php');
?>