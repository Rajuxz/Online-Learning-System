<?php
  session_start();
  include('includes/connection.php');
function generateRandomNumber($n){
  $rand = "1234567890";
  $number = '';
  for($i=0;$i<$n;$i++){
    $number .= substr($rand, (rand()%(strlen($rand))), 1);
  }
  return intval($number);
}
if(isset($_REQUEST['proceed'])){
  $email = $_REQUEST['email'];
  $sql = "SELECT * from student where semail = '$email'";
  $result = $conn->query($sql)  or die("<span class='fs-4 bg-danger'>Error Connecting database!</span>");
  if($result ->num_rows>0){

    $to = $email;
    $otp = generateRandomNumber(4);
    $temp = $otp; //Copy to secondary variable .
    $body = "Please dont share this code with others.";
    $subject = "Your OTP to change Password is : ".$temp;
    $from = "noreply@mail.com";

    if(mail($to,$subject,$body,$from)){
      $_SESSION['OTP'] = $temp;
      $_SESSION['email'] = $to;
      $msg = '<span class="fs-5 bg-success">Email sent to your email address.</span>'.'<a href="update_password.php" class="fs-4 text-secondary">Proceed</a>';
    }else{
      $msg = '<span class="fs-5 bg-warning">Something went wrong.</span>';
    }
  }else{
    $msg = '<span class="fs-5 bg-warning text-light">No email-id Found!</span>';
  }
  // echo $email;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Img/forgetpw.png" rel="icon">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="Stylesheets/forget_password.css">
    <title>Forget Password?</title>
</head>
<body>
<div class="card border-dark mb-3 m-auto" style="max-width: 30rem; height:25rem;">
  <div class="card-header">Forget Password?</div>
  <div class="card-body text-dark">
    <h5 class="card-title">Enter your email address:</h5>
    <form method="post" class="form-control" style="height:15rem;">
      <div class="input-group mb-3">
        <input type="email" name="email" class="form-control" placeholder="Email Address" required>
        <button class="btn btn-outline-secondary" name="proceed" type="submit" id="send">Proceed</button>
      </div>
      <p class="msg"><?php if(isset($msg)){ echo"$msg";}?></p>
        <span class="login d-block mt-2">Back to <a id="link" href="login.php"> Login </a></span>
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