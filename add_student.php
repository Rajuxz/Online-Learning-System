<?php
    include('includes/connection.php');
    include('includes/sidebar.php');
    $namerr = "";
    $numerr = "";
    $emailerr = "";
    $passerr = "";
    if(isset($_REQUEST['click'])){
        $date = date('Y-m-d');
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
           $emailerr = "";
           $select = mysqli_query($conn,"SELECT * FROM student WHERE semail = '$semail'");
           if(mysqli_num_rows($select)>=1){
               $emailerr = "Email is already used.";
           }else{
               $sql = "INSERT INTO student(sname,sphone,semail,spassword,e_date) VALUES ('$sname','$snum','$semail','$spass','$date')";

               if($conn->query($sql) == TRUE){
                    $msg = '<p class="fs-6" style="color:Green">Successfully inserted.</p>';
                }
                else{
                   $msg = '<p class="fs-6" style="color:red">Cannot added.</p>';
               }
           }
           
        }

    }
?>
<style>
    <?php 
        include('Stylesheets/student_add.css');
    ?>
</style>
<div class="col-sm-6 mt-2 mx-3 jumbotron main-div">
    <!-- <h3 class="text-start">Add student</h3> -->
    <form action="#" method="POST" class="s-form">
        <div class="form-group">
            <label for="name">Student name</label>
            <input type="text" class="form-control" id="name" name="s_name" required>
            <span class="fs-7" style="color:red;"><?php echo"$namerr"; ?></span>
        </div>
        <div class="form-group mt-3">
            <label for="number">Contact Number</label>
            <input type="number" class="form-control" id="number" name="s_num" required>
            <span class="fs-7" style="color:red;"><?php echo"$numerr";?></span>
        </div>
        <div class="form-group mt-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
            <span class="fs-7" style="color:red;"><?php echo"$emailerr";?></span>
        </div>
        <div class="form-group mt-3">
            <label for="pass">Password</label>
            <input type="password" class="form-control" id="pass" name="password" required>
            <span class="fs-7" style="color:red;"><?php echo"$passerr";?></span>
        </div>
        <div class="form-group mt-3">
            <?php
                if(isset($msg)){
                    echo"$msg";
                }
            ?>
        </div>
        <div class="s-button mt-5">
            <a href="student.php" class="btn bg-secondary">Cancel</a>
            <button type="submit" class="btn btn-danger " id="click" name="click">Add</button>
        </div>
    </form>
</div>
<script>
    //to prevent resubmitting form without clicking button
    if ( window.history.replaceState ) {
       window.history.replaceState( null, null, window.location.href );
    }
    var path = window. location. pathname;
    var page = path. split("/"). pop();
    console.log(page)
    if(page.localeCompare("Add_student.php")){
        document.getElementById("dynamicname").innerText = "Add Students";
    }
  </script>

<?php
    include('includes/toggle.php');
?>