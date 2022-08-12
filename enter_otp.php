<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Img/OTP.webp" rel="icon">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="forget_password.css">
    <title>Validating OTP</title>
</head>
<body>
<div class="card border-dark mb-3 m-auto" style="max-width: 30rem; height:25rem;">
  <div class="card-header">Enter OTP</div>
  <div class="card-body text-dark">
    <h5 class="card-title">We've send you an OTP in email address you have provided.</h5>
    <form method="post" class="form-control" style="height:15rem;">
        <p class="msg"><?php echo"";?></p>
        <div class="input-group mb-3">
        <input type="text" name="otp" class="form-control" required>
        <button class="btn btn-outline-secondary" type="submit" name="send">Validate OTP</button>
        </div>
        <!-- <span class="login d-block mt-2">Back to <a id="link" href="login.php"> Login </a></span> -->

    </form>
  </div>
</div>

    <script src="js/bootstrap.js"></script>
    <script src="icons/js/all.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
</body>
</html>