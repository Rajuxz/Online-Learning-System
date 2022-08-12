<?php
    include('includes/connection.php');
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_REQUEST['update'])){
        $email = $_SESSION['email'];
        $new_password = $_REQUEST['pass'];

        $sql = "UPDATE student set spassword = '$new_password' where semail = '$email'";

        $result = $conn->query($sql) or die("Couldnt connect to database");

        if($result){
            $msg = '<span class="fs-4 text-primary">Password Changed!</span>'.'<a href="login.php">Login Now</a>';
        }else{
            $msg  = '<span class="fs-4 text-primary">Failed!</span>'.'<a href="forget_password.php">Try Again</a>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Img/upd_pwd.jpg" rel="icon">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="forget_password.css">
    <title>Reset Password</title>
</head>
<body>
<div class="card border-dark mb-3 m-auto" style="max-width: 30rem; height:25rem;">
  <div class="card-header">Reset Password</div>
  <div class="card-body text-dark">
    <h5 class="card-title">Enter New Password:</h5>
    <form method="post" class="form-control" style="height:15rem;">
        <!-- <p class="msg"><//?php echo"$smth";?></p> -->
        <div class="input-group mb-3">
        <input type="password" name="pass" placeholder="Enter New Password" class="form-control" required>
        <button class="btn btn-outline-secondary" name="update" type="submit" id="send">Reset</button>
        </div>
       <?php if(isset($msg)){echo $msg;}?>
    </form>
  </div>
</div>
    <script>
      if ( window.history.replaceState ) {
       window.history.replaceState( null, null, window.location.href );
    }
    </script>
    <script src="js/bootstrap.js"></script>
    <script src="icons/js/all.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
</body>
</html>