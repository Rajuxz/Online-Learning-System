<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="Stylesheets/Landing.css">
    <link rel="stylesheet" href="Stylesheets/register.css">
</head>
<body>  
  <?php include('includes/header.php'); ?>
  <?php include('includes/connection.php'); 
    $namerr = "";
    $numerr = "";
    $emailerr = "";
    $passerr = "";
    if(isset($_REQUEST['btn'])){
        $sname = $_REQUEST['uname'];
        $snum = $_REQUEST['ph'];
        $semail = $_REQUEST['mail'];
        $spass = $_REQUEST['psw'];
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
           $namerr = "";
           $check = mysqli_query($conn,"SELECT sname FROM student WHERE sname = '{$sname}'") or die($conn->error);
           
           if(mysqli_num_rows($select)>=1 or mysqli_num_rows($check)>0){
               $emailerr = "Email or username  already used.";
           }
          // else if(mysqli_num_rows($check)>0){
          //      $namerr = "Username is already in use.";
          //      //die("");
          //      header('location:register.php');
          //  }
          else{
               $sql = "INSERT INTO student(sname,sphone,semail,spassword) VALUES ('$sname','$snum','$semail','$spass')";
  
               if($conn->query($sql) == TRUE){
                    $msg = '<p class="fs-6" style="color:Green">Account Successfully Created.</p>';
                    header('Location:login.php');
                }
                else{
                   $msg = '<p class="fs-6" style="color:red">Something went wrong.</p>';
               }
           }
           
        }
  
    }
  ?>
  <body>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card flex-row my-1 border-0 shadow rounded-3 overflow-hidden">
          <div class="card-img-left d-none d-md-flex">
            <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body p-4 p-sm-5">
            <h2 class="myhead card-title text-center mb-4 fw-light">New Account?</h2>
            <form method="POST" id="form">
              
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="uname" id="username" placeholder="Username" required>
                <label for="username">Username</label>
                <span class="fs-6" style="color:red;"><?php // if(isset($namerr)){echo $namerr;}?></span>
              </div>
              
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="ph" id="number" placeholder="Phone" required>
                <label for="number">Phone</label>
                <span class="fs-6" style="color:red;"><?php if(isset($numerr)){echo $numerr;}?></span>
              </div>
              
              <hr>
              
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="mail" placeholder="Email address"required>
                <label for="email">Email address</label>
                <span class="fs-6" style="color:red;"><?php if(isset($emailerr)){echo $emailerr;}?></span>
              </div>

              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="psw" placeholder="Password" required>
                <label for="password">Password</label>
                <span class="fs-6" style="color:red;"><?php if(isset($passerr)){echo $passerr;}?></span>
              </div>

              <div class="d-grid mb-2">
                <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" name="btn" type="">Register</button>
              </div>

              <a class="d-block text-center mt-2 link" href="login.php">Have an account? Sign In</a>
              <div class="d-grid mb-2">
                <?php
                if(isset($msg)){
                  echo $msg;
                }
                ?>
              </div>
              <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<?php 
  $namerr = "";
  $numerr = "";
  $emailerr = "";
  $passerr = "";
  if(isset($_REQUEST['btn'])){
      $date = date('Y-m-d');
      $sname = $_REQUEST['uname'];
      $snum = $_REQUEST['ph'];
      $semail = $_REQUEST['mail'];
      $spass = $_REQUEST['psw'];
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
                  $msg = '<p class="fs-6" style="color:Green">Account Successfully Created.</p>';
              }
              else{
                 $msg = '<p class="fs-6" style="color:red">Something went wrong.</p>';
             }
         }
         
      }

  }

?>
  <!-- Footer end -->
  <script>
    //to prevent resubmitting form without clicking button
    if ( window.history.replaceState ) {
       window.history.replaceState( null, null, window.location.href );
    }
  </script>
    <script src="js/bootstrap.js"></script>
    <script src="icons/js/all.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    
</body>
</html>