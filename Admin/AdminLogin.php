<?php
include('../includes/connection.php');

if(!isset($_SESSION)){
    session_start();
}
if(isset($_REQUEST['btn'])){
    $email = $_REQUEST['email'];
    $password = $_REQUEST['pass'];
    $sql = "SELECT * FROM admin where email = '$email' AND password = '$password'";
    $result = $conn->query($sql) or die($conn->error);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['isAuthenticated'] = false;
    if($row){
        $_SESSION['name'] = $row['Name'];
        header('location:../Dashboard.php');
        // $_SESSION['isAutheticated'] = true;
    }
    else{
        $message = '<p class="text-light mt-5 bg-danger">Invalid Details.</p>';
     }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../Icons/css/all.css">
    <link rel="stylesheet" href="style.css">
    <title>Admin Login Portal</title>
</head>
<body>
<div class="login">
<?php
  if(@$_GET['Empty']==TRUE){
  ?>
  <div class="alert-light text-danger my-3"><?php echo $_GET['Empty'];?></div>
  <?php
   }?>
  <div class="heading">
    <h2>Admin</h2>
    <form action="#" method="POST">
      <div class="input-group input-group-lg">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input type="email" class="form-control" placeholder="Email" name="email" required>
          </div>

        <div class="input-group input-group-lg">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
          <input type="password" class="form-control" placeholder="Password" name="pass" required>
        </div>
        <button type="submit" name="btn" class="float">Login</button>
        <?php
            if(isset($message)){
                echo"$message";
            }
        ?>
       </form>
 		</div>
 </div>
 <script src="../js/bootstrap.js"></script>
 <script>
    if ( window.history.replaceState ) {
       window.history.replaceState( null, null, window.location.href );
    }
 </script>
</body>
</html>