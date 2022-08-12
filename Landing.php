<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Stylesheets/Landing.css">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="Icons/css/all.css"> -->
    <link href="Img/home.png" rel="icon">
    <!-- Fontawesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  

    <title>Landing.php</title>
  </head>
  <body>
    <!-- Navigation menu -->
    <?php include('includes/header.php');?>
    <!-- Navigation menu end -->

   <!-- Home menu start -->
   <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Stay hungry.<br>Stay Foolish.</h1>
      <h2>Everyone should learn how to code, It teaches you how to think.</h2>
      <a href="login.php" class="btn-get-started">Get Started</a>
    </div>
  </section>
   <!-- Home menu end -->
   <!-- Courses items Start-->
  
    <!-- Courses items End -->

    <!-- Footer section -->
   <?php include('includes/footer.php');?>
    <!-- Footer section end -->
    <script>
      if ( window.history.replaceState ) {
       window.history.replaceState( null, null, window.location.href );
    }
    </script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
  </body>

</html>

