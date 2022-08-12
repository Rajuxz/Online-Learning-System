<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="Img/info.webp" rel="icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="Stylesheets/Landing.css">
    <link rel="stylesheet" href="Icons/css/all.css">
    <link rel="stylesheet" href="Stylesheets/About.css">
    <title>About us</title>
</head>
<body>
    <!-- Header section -->
    <?php include('includes/header.php');?>
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="img/abt-bg.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>So who are we?</h3>
            <p class="fst-italic">
              We are group of IT student who are experts in respective field. We are providing free but good quality of education to those who are looking for extra knowledge.
            </p>
            <h4>Why us?</h4>
            <ul style="list-style-type:none;">
              <li><i class="fa-solid fa-circle-check"></i>Well managed courses from well trained instructors.</li>
              <li><i class="fa-solid fa-circle-check"></i>Virtual interaction between student and teacher if needed.</li>
              <li><i class="fa-solid fa-circle-check"></i>Weekly test to ensure understanding of student</li>
              <li><i class="fa-solid fa-circle-check"></i>Free platform.</li>
            </ul>
            <p>
            We help build life skills, knowledge, and confidence in students of all ages.
            </p>

          </div>
        </div>

      </div>
    </section>
    <br><br><br><br><br><br>
    <?php include('includes/footer.php');?>
    <!-- About section End -->
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
</body>
</html>