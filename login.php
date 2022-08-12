<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="Stylesheets/Landing.css">
    <link rel="stylesheet" href="Stylesheets/register.css">
</head>
<body>  
  <?php
    session_start();
   include('includes/header.php');
   ?>
  <?php include('includes/connection.php');
    if(isset($_REQUEST['btn'])){
      $uemail = $_REQUEST['email'];
      $pass = $_REQUEST['pass'];
      if(empty($uemail) || empty($pass)){
        header('location:login.php?Empty= Please fill the form');
      }else{
        $sql = "SELECT * FROM student where semail = '$uemail' and spassword = '$pass'";

        $result = $conn->query($sql) or die("<span class='bg-danger'>Something went wrong.</span>");

        $row = $result->fetch_assoc();
        
        if($result->num_rows>0){
          $_SESSION['id'] = $row['id'];
          $_SESSION['uname'] = $row['sname'];
          // $including = true;
          header('Location:Users/Student.php');
        }else{
          $msg='<span class="bg-danger">Incorrect details</span>';
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
            <h2 class="myhead card-title text-center mb-5 fw-light">Welcome Back</h2>
            <form method="POST">
              <!-- If Both field are empty url will show message -->
              <?php
              if(@$_GET['Empty']==TRUE){
              ?>
              <div class="alert-light text-danger my-3"><?php echo $_GET['Empty'];?></div>
              <?php
              }?>
              <!-- Empty message close. -->
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="email" id="email" placeholder="Username" required>
                <label for="email">Email</label>
              </div>
              
              <hr>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="pass" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                <span class="fs-6"></span>
              </div>
              <div class="form-floating mb-3">
                <?php if(isset($msg)){echo $msg;}?>
              </div>
              <div class="d-grid mb-2">
                <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" name="btn"
                type="submit">Login</button>
              </div>

              <a class="d-block text-center mt-2 link" href="register.php">Don't have an account? Sign Up</a>
              <span class="d-block baf text-center mt-2">OR</span>
              <a class="d-block text-center mt-2 link" href="forget_password.php">Forget Password?</a>
              <!-- <a class="d-block text-center mt-2 link" href="forget_password.php">Login as admin</a> -->
              <hr class="my-4">
              <a class="d-block text-center mt-2 link" href="Admin/AdminLogin.php">Admin Login</a>

            </form>
           </div>
          </div>
        </div>
      </div>
    </div>
</body>
    
  <?php include('includes/footer.php');?>
  
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="icons/js/all.js"></script>
</body>
</html>